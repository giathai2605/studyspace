<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class TestcaseTemplate implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $data = [
            ['NameFunction', 'Input', 'InputDetail', 'ExpectOutput', 'SortNumber'],
            ['Sum', '2, 3', '2, 3', '5', '1'],
            ['Sub', '2, 3', '2, 3', '-1', '2'],
            ['Mul', '2, 3', '2, 3', '6', '3'],
            ['Mod', '2, 3', '2,3', '2', '5'],
            ['Exp', '2, 3', '2,3', '8', '6'],
            ];
        return collect($data);
    }
}
