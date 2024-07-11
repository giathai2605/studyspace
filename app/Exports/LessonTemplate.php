<?php

namespace App\Exports;

use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Courses;
use Maatwebsite\Excel\Concerns\FromCollection;

class LessonTemplate implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Lấy danh sách các khóa học từ bảng courses
        $chapters = Chapter::select('id', 'ChapterName')->get();

        // Tạo một collection chứa các dòng dữ liệu cho mẫu Excel
        $data = collect();

        // Dòng tiêu đề
        $data->push(['ChapterID', 'ChapterName', 'LessonName', 'LessonDescription', 'SortNumber', 'Status']);

        // Dữ liệu từ danh sách khóa học
        foreach ($chapters as $chapter) {
            $data->push([$chapter->id, $chapter->ChapterName, '', '', '', '']);
        }

        return $data;
    }
}
