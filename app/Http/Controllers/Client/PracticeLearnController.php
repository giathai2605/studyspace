<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\PracticeLessons;
use App\Models\TestCase;
use App\Models\UserCourse;
use App\Models\UserPractice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticeLearnController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(string $id)
    {
        $data = PracticeLessons::query()->with(['testcases', 'lesson'])->where('id', $id)->first();
        $userPractice = UserPractice::query()->where('UserID', auth()->id())->where('PracticeLessonID', $id)->first();
        return view('client.course-testcase', compact('data', 'userPractice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    private function convertStringArrayToIntegerArray($inputArray)
    {
        return array_map(function ($item) {
            return array_map('intval', explode(',', $item));
        }, $inputArray);
    }

    private function addParam($list)
    {
        $stringParam = "";
        foreach ($list as $item) {
            $stringParam = $stringParam . $item . ',';
        }
        return substr($stringParam, 0, -1);
    }

    private function showResponse($param, $expectedOutput, $output, $sortNumber, $status)
    {
        if ($status == "pass") {
            $color = "green";
        } else {
            $color = "red";
        }
        echo "
<div style='display: flex'>
    <div class='tab'>
        <button class='tablinks'>Testcase $sortNumber</button>
    </div>
        <table id='Testcase$sortNumber' class='tabContent' style='color:white; display: none'>
            <tr style='margin-bottom: 10px'>
                <th>Đầu vào</th>
                <th>$param</th>
            </tr>
            <tr>
                <th>Đầu ra mong muốn</th>
                <th>$expectedOutput</th>
            </tr>
            <tr>
                <th>Đầu ra thực tế</th>
                <th>$output</th>
            </tr>
            <tr>
                <th>Trạng thái</th>
                <th style='color: $color;font-weight: bold'>$status</th>
            </tr>
        </table>
        </div>
    <script>
    $(document).ready(function () {

        $('.tablinks').click(function () {
            var testNumber = $(this).text().replace(/\s/g, '');
            $('.tablinks').removeClass('active');
            $('.tabContent').css('display', 'none');
            $('#'+ testNumber).css('display', 'block');
            $(this).addClass('active');

        })
    })
</script>
";

    }

    public function compiler(Request $request)
    {
        // Lấy mã ngôn ngữ và mã nguồn từ request
        $language = strtolower($request->input('language'));
        $code = $request->input('code');
        $random = substr(md5(mt_rand()), 0, 7);
        $filePath = base_path('compiler/temp/temp') . $random . "." . $language;

        $testcases = TestCase::query()->where('PracticeLessonID', $request->input('idPractice'))->get();
        $expectedOutputs = [];
        $functionRuns = [];
        $inputs = [];

        foreach ($testcases as $testcase) {
            $expectedOutputs[] = $testcase->ExpectOutput;
            $functionRuns[] = $testcase->NameFunction;
            $inputs[] = $testcase->Input;
        }

//        return json_encode($inputs);
        $input = $this->convertStringArrayToIntegerArray($inputs);
        $errorDisplayed = false;

        foreach ($input as $key => $value) {
            if (empty($value)) {
                continue; // Bỏ qua và chuyển sang vòng lặp tiếp theo
            }
            $param = $this->addParam($value);
            $functionRun = $functionRuns[$key];
            $testcase = $testcases[$key];
            if ($language == "php" && !$errorDisplayed) {
                $errorDisplayed = $this->executePHP($filePath, $code, $functionRun, $param, $expectedOutputs[$key], $testcase);
            }

            if ($language == "c" && !$errorDisplayed) {
                $outputExe = $random . ".exe";
                $errorDisplayed = $this->executeC($filePath, $code, $functionRun, $param, $expectedOutputs[$key], $outputExe, $testcase);
            }

            if ($language == "js" && !$errorDisplayed) {
                $outputFile = base_path("compiler/temp/temp") . $random . ".js";
                $errorDisplayed = $this->executeJS($outputFile, $code, $functionRun, $param, $expectedOutputs[$key], $testcase);
            }
        }
    }

    private function executePHP($filePath, $code, $functionRun, $param, $expectedOutput, $testcase)
    {
        //kiểm tra xem nếu có input mới thực hiện
        if (!empty($param)) {
            $codeRunCompiler = $code . ";"
                . "echo " . $functionRun . "(" . "$param" . ")" . ";";
            $modifiedcodeRunCompiler = str_replace("?>", "", $codeRunCompiler);
            $finalCodeRun = $modifiedcodeRunCompiler . "?>";
        } else {
            $finalCodeRun = $code;
        }
        $programFile = fopen($filePath, "w");
        fwrite($programFile, $finalCodeRun);
        fclose($programFile);
        $output = shell_exec(base_path("compiler/php.exe") . " $filePath 2>&1");

        if (strpos($output, 'Parse error') !== false) {
            if (preg_match('/Parse error:(.*?) in/', $output, $matches)) {
                $syntaxError = trim($matches[1]);
                echo "Fail: " . htmlspecialchars($syntaxError);
                return true;
            }
        } elseif ($output == $expectedOutput) {
            $this->showResponse($param, $expectedOutput, $output, $testcase->SortNumber, "pass");
        } else {
            $this->showResponse($param, $expectedOutput, $output, $testcase->SortNumber, "fail");
        }

        unlink($filePath);
        return false;
    }

    private function executeC($filePath, $code, $functionRun, $param, $expectedOutput, $outputExe, $testcase)
    {
        if (!empty($param)) {
            $finalCodeRun = $code . ";"
                . "int main() {"
                . "    int result = " . $functionRun . "(" . "$param" . ");"
                . "    return result;"
                . "}";
        } else {
            $finalCodeRun = $code;
        }

        $programFile = fopen($filePath, "w");
        fwrite($programFile, $finalCodeRun);
        fclose($programFile);

        $compilerPath = "C:\Users\ADMIN\bin\gcc.exe";
        $command = "$compilerPath $filePath -o $outputExe 2>&1";
        exec($command, $output, $exitCode);

        if ($exitCode !== 0) {
            foreach ($output as $line) {
                if (preg_match('/error: (.+)/', $line, $matches)) {
                    $errorMessage = trim($matches[1]);
                    echo "Error: " . $errorMessage . " | ";
                }
            }
            return true;
        } else {
            $programOutput = [];
            exec("$outputExe", $programOutput, $exitCode);
            if (is_array($programOutput)) {
                $actualOutput = implode("\n", $programOutput);
            } else {
                $actualOutput = $programOutput;
            }
            if (is_string($expectedOutput) && $actualOutput !== '') {
                if (trim($actualOutput) == trim($expectedOutput)) {
                    $this->showResponse($param, $expectedOutput, $actualOutput, $testcase->SortNumber, "pass");
                } else {
                    $this->showResponse($param, $expectedOutput, $actualOutput, $testcase->SortNumber, "fail");
                }
            } else{
                if ($exitCode == $expectedOutput) {
                    $this->showResponse($param, $expectedOutput, $exitCode, $testcase->SortNumber, "pass");
                } else {
                    $this->showResponse($param, $expectedOutput, $exitCode, $testcase->SortNumber, "fail");
                }
            }

            // Kiểm tra loại dữ liệu của kết quả
//            if (is_array($programOutput)) {
//                $actualOutput = implode("\n", $programOutput);
//            } else {
//                $actualOutput = $programOutput;
//            }
//            // Kiểm tra loại dữ liệu và xử lý tương ứng
//            if (is_string($expectedOutput) && is_string($actualOutput)) {
//                if (trim($actualOutput) == trim($expectedOutput)) {
//                    $this->showResponse($param, $expectedOutput, $actualOutput, $testcase->SortNumber, "Pass");
//                } else {
//                    $this->showResponse($param, $expectedOutput, $actualOutput, $testcase->SortNumber, "Fail");
//                }
//            } else if (is_numeric($expectedOutput) && is_numeric($actualOutput)) {
//                if ($actualOutput == $expectedOutput) {
//                    $this->showResponse($param, $expectedOutput, $actualOutput, $testcase->SortNumber, "Pass");
//                } else {
//                    $this->showResponse($param, $expectedOutput, $actualOutput, $testcase->SortNumber, "Fail");
//                }
//            } else {
//                echo "Error: Unsupported data type for comparison.";
//            }
        }

        unlink($filePath);
        unlink($outputExe);
        return false;
    }

    private function executeJS($outputFile, $code, $functionRun, $param, $expectedOutput, $testcase)
    {
        if (!empty($param)) {
            $codeRunCompilerJS = $code . ";"
                . "var result = " . $functionRun . "(" . "$param" . ");"
                . "console.log(result)";
        } else {
            $codeRunCompilerJS = $code;
            $param = "";
        }

        file_put_contents($outputFile, $codeRunCompilerJS);

        $output = trim(shell_exec("\"" . base_path("compiler/node.exe") . "\" $outputFile 2>&1"));
        if (strpos($output, 'SyntaxError') !== false) {
            if (preg_match('/SyntaxError:(.*?)\n/', $output, $matches)) {
                $syntaxError = trim($matches[1]);
                echo "Error: Syntax error in your JavaScript code:<br>";
                echo "Fail: " . htmlspecialchars($syntaxError);
            } else {
                echo "Error: Syntax error in your JavaScript code (unknown).";
            }
            return true;
        } elseif (strpos($output, 'Fail') !== false) {
            if (preg_match('/Fail:(.*?)\n/', $output, $matches)) {
                $FailMessage = trim($matches[1]);
                echo "Fail: $FailMessage";
            } else {
                echo "Fail: $output";
            }
        } elseif ($output == $expectedOutput) {
            $this->showResponse($param, $expectedOutput, $output, $testcase->SortNumber, "pass");
        } else {
            $this->showResponse($param, $expectedOutput, $output, $testcase->SortNumber, "fail");
        }

        unlink($outputFile);
        return false;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function userPracticeSubmit(Request $request)
    {
        $checkLanguage = $request->selectedLanguage;
        if($checkLanguage == "c"){
            $idcheck = 1;
        }
        elseif ($checkLanguage == "php"){
            $idcheck = 2;
        }elseif ($checkLanguage == "js"){
            $idcheck = 3;
        }
        $model = new UserPractice();
        $model->fill($request->except('selectedLanguage'));
        $idPractice = $model->PracticeLessonID;
        $id = DB::table('practice_lessons')->where('id', $idPractice)->value('LessonID');
        //lấy id trong bảng Course theo $idPractice
        $idCourse = DB::table('lessons')->where('id', $id)->value('CourseID');
        //lấy category trong bảng Course theo $idCourse
        $categoryID = DB::table('courses')->where('id', $idCourse)->value('CategoryID');
        $exist = DB::table('practice_done_data')->where('PracticeLessonID', $idPractice)->where('UserID', auth()->user()->id)->first();
        if ($idcheck != $categoryID){
            //gửi json về view
            return response()->json([
                'success' => false,
                'message' => 'Ngôn ngữ không phù hợp với khóa học'
            ], 422);
        }
        if(!$exist){
            $model->save();
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Bạn đã hoàn thành bài này rồi, hãy thử với các ngôn ngữ khác nếu bạn muốn'
            ], 421);
        }
        $this->updateCompelete($idCourse, auth()->user()->id);
        $newPercent = UserCourse::query()->where('CourseID', $idCourse)->where('UserID', auth()->user()->id)->value('DonePercent');
        if ($newPercent == 100) {
            addCertificate($idCourse, auth()->user()->id);
            return response()->json([
                'success' => true,
                'message' => 'Bạn đã hoàn thành khóa học này, bạn có muốn xem chứng chỉ không',
                'url' =>    route('dashboard.showCertificate',auth()->user()->id)
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Bạn đã hoàn thành bài tập, bạn có muốn tiếp tục trở về trang học?',
            'url' =>    route('lesson-learn',$id)
        ]);
    }
    public function updateCompelete(string $CourseID, string $UserID)
    {
        $percent = CalculatePercentageUserComplete($CourseID, $UserID);
        $model = UserCourse::where('CourseID', $CourseID)->where('UserID', $UserID)->first();
        $model->DonePercent = $percent;
        if ($percent == 100) {
            $model->isDone = 1;
        }
        $model->save();
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
