<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ChapterTemplate;
use App\Exports\LessonTemplate;
use App\Exports\PracticeTemplate;
use App\Exports\TestcaseTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CourseTemplate;
class ExcelController extends Controller
{
    public function downloadCourseTemplate()
    {
        return Excel::download(new CourseTemplate, 'templateCourse.xlsx');
    }
    public function downloadChapterTemplate()
    {
        return Excel::download(new ChapterTemplate, 'templateChapter.xlsx');
    }
    public function downloadLessonTemplate()
    {
        return Excel::download(new LessonTemplate, 'templateLesson.xlsx');
    }
    public function downloadPracticeTemplate()
    {
        return Excel::download(new PracticeTemplate, 'templatePractice.xlsx');
    }
    public function downloadTestcaseTemplate()
    {
        return Excel::download(new TestcaseTemplate, 'downloadTestcaseTemplate.xlsx');
    }
}
