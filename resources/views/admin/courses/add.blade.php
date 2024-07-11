@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div
            class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark max-w-md">
            <div class="flex justify-between border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white" style="padding-top: 1rem">
                    Thêm khóa học mới
                </h3>
                <div class="flex justify-end mb-4 mr-6 gap-3">

                    <button type="button" id="showImport"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Nhập Excel
                    </button>
                    <button type="button" id="showSimple"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Thêm mới thủ công
                    </button>

                </div>
            </div>
            <form style="display: none" id="coursesFormCreateImport" action="{{ route('courses.import') }}"
                  data-redirect="{{ route('courses.index') }}"
                  data-url="{{ route('courses.import') }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Nhập Excel <span class="text-meta-1">*</span>
                        </label>
                        <input type="file" name="excel_file" id="excel_file" placeholder="Select image data"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                        />
                    </div>
                </div>
                <div class="flex justify-end mb-4 mr-6 gap-3">
                    <button type="submit"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Nhập
                    </button>
                    <button type="reset"
                            class="px-6 py-3 text-white bg-danger rounded-md hover:bg-opacity-90 transition">
                        Nhập lại
                    </button>
                    <a type="button" href="{{ route('excel.downloadCourseTemplate') }}"
                       class="px-6 py-3 text-white bg-warning rounded-md hover:bg-opacity-90 transition">
                        Tải mẫu
                    </a>
                </div>

            </form>
            <form id="coursesFormCreateSimple" action="{{ route('courses.store') }}"
                  data-redirect="{{ route('courses.index') }}"
                  data-url="{{ route('courses.store') }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Danh mục khóa học <span class="text-meta-1">*</span>
                        </label>
                        <select name="CategoryID" id="CategoryID"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                            <option value="">Chọn danh mục khóa học</option>
                            @foreach($categories as $category)
                                <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <input name="UserID" value="{{ auth() -> id() }}" type="hidden">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Mã khóa học <span class="text-meta-1">*</span>
                            </label>
                            <input type="text" name="CourseCode" placeholder="Nhập mã khóa học"
                                   class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                   value="{{ old('CourseCode') }}"/>
                        </div>
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Tên khóa học <span class="text-meta-1">*</span>
                            </label>
                            <input type="text" name="CourseName" placeholder="Nhập tên khóa học"
                                   class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                   value="{{ old('CourseName') }}"/>
                        </div>
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Tiêu đề phụ khóa học <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="CourseSubTitle" placeholder="Nhập tiêu đề phụ khóa học"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ old('CourseSubTitle') }}"/>
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Đường dẫn <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="Slug" placeholder="Nhập đường dẫn"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ old('Slug') }}"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Giá tiền <span class="text-meta-1">*</span>
                        </label>
                        <input type="number" name="Price" placeholder="Nhập giá tiền"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ old('Price') }}" min="0"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Khuyến mãi
                        </label>
                        <input type="number" name="Discount" placeholder="Nhập khuyến mãi"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               @if (trim(old('Discount')) == "") value="0" @else value="{{ old('Discount') }}"
                               @endif min="0"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Ảnh dữ liệu <span class="text-meta-1">*</span>
                        </label>
                        <input type="file" name="ImageData"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ old('ImageData') }}"/>
                    </div>
                    {{--                    <div class="mb-4.5">--}}
                    {{--                        <label class="mb-2.5 block text-black dark:text-white">--}}
                    {{--                            Lesson count <span class="text-meta-1">*</span>--}}
                    {{--                        </label>--}}
                    {{--                        <input type="text" name="LessonCount" placeholder="Enter lesson count"--}}
                    {{--                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                               value="{{ old('LessonCount') }}"/>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="mb-4.5">--}}
                    {{--                        <label class="mb-2.5 block text-black dark:text-white">--}}
                    {{--                            Chapter count <span class="text-meta-1">*</span>--}}
                    {{--                        </label>--}}
                    {{--                        <input type="text" name="ChapterCount" placeholder="Enter chapter count"--}}
                    {{--                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                               value="{{ old('ChapterCount') }}"/>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="mb-4.5">--}}
                    {{--                        <label class="mb-2.5 block text-black dark:text-white">--}}
                    {{--                            Register count <span class="text-meta-1">*</span>--}}
                    {{--                        </label>--}}
                    {{--                        <input type="text" name="RegisterCount" placeholder="Enter register count"--}}
                    {{--                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                               value="{{ old('RegisterCount') }}"/>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="mb-4.5">--}}
                    {{--                        <label class="mb-2.5 block text-black dark:text-white">--}}
                    {{--                            Done count <span class="text-meta-1">*</span>--}}
                    {{--                        </label>--}}
                    {{--                        <input type="text" name="DoneCount" placeholder="Enter done count"--}}
                    {{--                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                               value="{{ old('DoneCount') }}"/>--}}
                    {{--                    </div>--}}

                    <div class="">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Video mô tả <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="IntroVideoLink" placeholder="Nhập đường dẫn video mô tả"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ old('IntroVideoLink') }}"/>
                    </div>
                </div>

                <div class="flex justify-end mb-4 mr-6 gap-3">
                    <button type="submit"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Thêm mới
                    </button>
                    <button type="reset"
                            class="px-6 py-3 text-white bg-danger rounded-md hover:bg-opacity-90 transition">
                        Nhập lại
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
