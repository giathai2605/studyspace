<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class CourseTemplate implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = [
            ['Course Code', 'Category ID' , 'Course Name', 'CourseSub Title', 'Slug', 'Price', 'Discount', 'Intro Video Link'],
            ['Laravel Basics', 2 , 'Laravel Basics', 'Laravel Basics', 'laravel-basics', '100000', '0.1', 'https://www.youtube.com/watch?v=ImtZ5yENzgE'],
            ['Vue.js Fundamentals' , 3, 'Vue.js Fundamentals', 'Vue.js Fundamentals', 'vue-js-fundamentals', '100000', '0.1', 'https://www.youtube.com/watch?v=ImtZ5yENzgE'],
            // Thêm các dòng dữ liệu khác tương tự
        ];

        // Trả về một Collection chứa dữ liệu
        return collect($data);
    }
}
