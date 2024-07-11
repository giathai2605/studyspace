<?php

namespace App\Exports;

use App\Models\Courses;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChapterTemplate implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $courses = Courses::select('id', 'CourseName')->get();

        // Tạo một collection chứa các dòng dữ liệu cho mẫu Excel
        $data = collect();

        // Dòng tiêu đề
        $data->push(['CourseID', 'CourseName', 'ChapterName', 'ChapterLessonCount', 'SortNumber']);

        // Dữ liệu từ danh sách khóa học
        foreach ($courses as $course) {
            $data->push([$course->id, $course->CourseName, '', '', '']);
        }

        return $data;
    }

}
