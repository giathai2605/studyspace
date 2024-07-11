<?php

namespace App\Imports;

use App\Models\Lesson;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LessonImport implements ToModel, WithStartRow
{
    // Biến cờ để kiểm tra xem đang ở dòng đầu tiên hay không
    private $isFirstRow = true;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // Nếu đang ở dòng đầu tiên (tiêu đề), trả về null để không tạo mô hình
        if ($this->isFirstRow) {
            $this->isFirstRow = false; // Đặt cờ false để không kiểm tra dòng đầu tiên nữa
            return null;
        }

        return new Lesson([
            'CourseChapterId' => $row[0],
            'LessonName' => $row[2],
            'LessonDescription' => $row[3],
            'SortNumber' => $row[4],
            'Status' => $row[5],
        ]);
    }

    /**
     * Trả về số dòng bắt đầu nhập (1-indexed)
     *
     * @return int
     */
    public function startRow(): int
    {
        return 1; // Bắt đầu nhập từ dòng thứ 2 (bỏ qua dòng đầu tiên)
    }
}
{
}
