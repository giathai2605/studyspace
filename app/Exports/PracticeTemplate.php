<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class PracticeTemplate implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = [
            ['Problem', 'ProblemDetail', 'Explain', 'Suggest'],
            ['Tính tổng 2 số', 'Viết chương trình nhập vào 2 số nguyên và tính tổng của 2 số đó', 'Sử dụng toán tử + để tính tổng', ''],
            ['Tính hiệu 2 số', 'Viết chương trình nhập vào 2 số nguyên và tính hiệu của 2 số đó', 'Sử dụng toán tử - để tính hiệu', ''],
            ['Tính tích 2 số', 'Viết chương trình nhập vào 2 số nguyên và tính tích của 2 số đó', 'Sử dụng toán tử * để tính tích', ''],
            ['Tính thương 2 số', 'Viết chương trình nhập vào 2 số nguyên và tính thương của 2 số đó', 'Sử dụng toán tử / để tính thương', ''],
            ['Tính phần dư 2 số', 'Viết chương trình nhập vào 2 số nguyên và tính phần dư của 2 số đó', 'Sử dụng toán tử % để tính phần dư', ''],
            ['Tính lũy thừa 2 số', 'Viết chương trình nhập vào 2 số nguyên và tính lũy thừa của 2 số đó', 'Sử dụng hàm pow(x, y) để tính lũy thừa', ''],
            ['Tính căn bậc 2 của 1 số', 'Viết chương trình nhập vào 1 số nguyên và tính căn bậc 2 của số đó', 'Sử dụng hàm sqrt(x) để tính căn bậc 2', ''],
        ];
        return collect($data);
    }
}
