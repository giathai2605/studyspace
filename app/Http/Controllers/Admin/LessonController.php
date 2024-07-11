<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\LessonImport;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Http\Requests\LessonRequest;
use App\Models\Chapter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Vimeo\Vimeo;


class LessonController extends Controller
{
    protected $lesson;
    protected $lessonVideo;

    public function __construct()
    {
        $this->middleware('permission:lesson.index', ['only' => ['index']]);
        $this->middleware('permission:lesson.create', ['only' => ['create', 'store', 'import']]);
        $this->middleware('permission:lesson.update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:lesson.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:lesson.show', ['only' => ['show']]);
        $this->middleware('permission:lesson.add-video', ['only' => ['addVideos', 'storeVideos']]);
        $this->middleware('permission:lessonVideo.destroy', ['only' => ['destroyVideo']]);

        $this->lesson = new Lesson();
        $this->lessonVideo = new LessonVideo();
    }

    public function index()
    {
        $lessons = $this->lesson->join('course_chapters', 'course_chapters.id', '=', 'lessons.CourseChapterId')->select('lessons.*', 'course_chapters.ChapterName')->orderBy('course_chapters.id', 'desc')->paginate(10);
        return view('admin.lesson.index', compact('lessons'));
    }

    public function create(string $idChapter = null)
    {
        $course_chapter = Chapter::all();
        return view('admin.lesson.create', compact('course_chapter', 'idChapter'));
    }

    public function store(LessonRequest $request)
    {
        // validate sortnumber trong cùng 1 coursechapterid không được trùng nhau
        $sortnumber = $request->input('SortNumber');
        $coursechapterid = $request->input('CourseChapterId');
        $check = DB::table('lessons')->where('SortNumber', $sortnumber)->where('CourseChapterId', $coursechapterid)->first();
        if ($check) {
            Session::flash('error', 'Sort Number is already exist');
            $err = 'Sort number already exists in Lesson';
            return response()->json(['message' => $err], 422);
        }
        $data = $request->except('_token');
        $data['VideoTime'] = 0;
        $data['CourseID'] = DB::table('course_chapters')->where('id', $data['CourseChapterId'])->value('CourseID');
        try {
            $this->lesson->fill($data);
            $this->lesson->save();
            Session::flash('success', 'Add lesson successfully');
            return redirect()->route('lesson.index');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function import(Request $request)
    {
        $file = $request->file('excel_file');
        $this->validate($request, [
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new LessonImport, $file);
            return redirect()->route('lesson.index')->with('success', 'Data Imported!');
        } catch (Exception $e) {
            return redirect()->route('lesson.index')->with('error', 'Error importing data: ');
        }
    }
    public function edit($id)
    {
        $lesson = $this->lesson->find($id);
        $course_chapter = Chapter::all();
        if ($lesson) {
            return view('admin.lesson.edit', compact(['lesson', 'course_chapter']));
        } else {
            Session::flash('error', 'Not found lesson');
            return redirect()->route('lesson.index');
        }
    }

    public function update($id, LessonRequest $request)
    {
        $lesson = Lesson::findOrFail($id);
        if ($lesson) {
            $data = $request->except('_token');
            try {
                $lesson->update($data);
                Session::flash('success', 'Update lesson successfully');
                return redirect()->route('lesson.edit', $id);
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Not found lesson');
            return redirect()->route('lesson.index');
        }
    }

    public function destroy($id)
    {
        $lesson = $this->lesson->find($id);
        if ($lesson) {
            try {
                $lesson->delete();
                Session::flash('success', 'Delete lesson successfully');
                return redirect()->route('lesson.index');
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Not found lesson');
            return redirect()->route('lesson.index');
        }
    }

    public function addVideos($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('admin.lesson.add_video', compact('lesson'));
    }

    public function storeVideos($id, LessonRequest $request)
    {
        $client_id = "060bb83eb495016a17ee4e7794eb88fa3dbf34fc";
        $client_secret = "x8cBpQBeNcLaxeGKhHEipNaBflguA+p0FhT8BkZRCphs/Zf6ZuImd4WI2LSoeNLLj2QW75W5QewW3XWyxHOx/wdrzFfq2tc1Lw9OnuUumTv8JsW+5cSeS3C1sKn+nNDy";
        $access_token = "6546838990e48ef2dd286cad8ac41f0f";
        $lesson = Lesson::findOrFail($id);
        if ($lesson) {
            $data = $request->except('_token');
            $data['LessonID'] = $id;
            try {
               $client = new \Vimeo\Vimeo($client_id, $client_secret, $access_token);
                $uri = $client->upload($request->file('LessonLinkUrl')->getPathName(), array(
                    'name' => $data['Title'],
                    'title' => $data['Title'],
                ));
                $video_data = $client->request($uri . '?fields=embed.html');
                $video_embed_code = $video_data['body']['embed']['html'];
                // Chuyển đổi video_embed_code thành đường dẫn URL của video
                $video_link = getVideoUrlFromEmbedCode($video_embed_code);
                $this->lessonVideo->LessonLinkUrl = $video_link;
                $this->lessonVideo->Title = $data['Title'];
                $this->lessonVideo->LessonID = $data['LessonID'];
                $this->lessonVideo->save();
                Session::flash('success', 'Thêm video thành công!');
                return redirect()->route('lesson.add-video', $id);
            } catch (\Exception $e) {
                dd($e);
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Không tìm thấy bài học');
            return redirect()->route('lesson.index');
        }
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $videos = LessonVideo::where('LessonID', $id)->get();
        return view('admin.lesson.detail', compact('lesson', 'videos'));
    }

    public function destroyVideo($id)
    {
        $lessonVideo = $this->lessonVideo->find($id);
        if ($lessonVideo) {
            try {

                // Xóa video Vimeo
                // $client_id = "060bb83eb495016a17ee4e7794eb88fa3dbf34fc";
                // $client_secret = "x8cBpQBeNcLaxeGKhHEipNaBflguA+p0FhT8BkZRCphs/Zf6ZuImd4WI2LSoeNLLj2QW75W5QewW3XWyxHOx/wdrzFfq2tc1Lw9OnuUumTv8JsW+5cSeS3C1sKn+nNDy";
                // $access_token = "6546838990e48ef2dd286cad8ac41f0f";
                // $client = new \Vimeo\Vimeo($client_id, $client_secret, $access_token);
                // $client->request($lessonVideo->LessonLinkUrl, [], 'DELETE');
                $lessonVideo->delete();
                Session::flash('success', 'Xóa video thành công!');
                return redirect()->back();
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Không tìm thấy video');
            return redirect()->route('lesson.index');
        }
    }
}
