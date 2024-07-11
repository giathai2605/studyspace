<?php

namespace App\Imports;

use App\Models\Courses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CoursesImport implements ToModel, WithStartRow
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

        return new Courses([
            'UserID' => auth()->id(),
            'CourseCode' => $row[0],
            'CategoryID' => (int)$row[1],
            'CourseName' => $row[2],
            'CourseSubTitle' => $row[3],
            'Slug' => $row[4],
            'Price' => (int)$row[5],
            'Discount' => (double)$row[6],
            'IntroVideoLink' => $row[7],
            'Status' => 0,
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
