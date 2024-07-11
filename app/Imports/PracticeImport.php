<?php

namespace App\Imports;

use App\Models\PracticeLessons;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class PracticeImport implements ToModel, WithStartRow
{
    // Biến cờ để kiểm tra xem đang ở dòng đầu tiên hay không
    private $isFirstRow = true;
    private $lessonID;

    public function __construct($lessonID)
    {
        $this->lessonID = $lessonID;
    }

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

        return new PracticeLessons([
            'LessonID' => $this->lessonID,
            'Problem' => $row[0],
            'ProblemDetail' => $row[1],
            'Explain' => $row[2],
            'Suggest' => $row[3],
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
