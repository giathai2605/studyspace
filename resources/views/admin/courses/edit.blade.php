@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div
            class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark max-w-md">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Cập nhật khóa học
                </h3>
            </div>
            <form action="{{ route('courses.update', ['id' => $detail->id]) }}"
                  data-redirect="{{ route('courses.index') }}"
                  id="coursesFormEdit" data-url="{{ route('courses.update', $detail->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Danh mục khóa học <span class="text-meta-1">*</span>
                        </label>
                        <select name="CategoryID" id="CategoryID"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($category->id == $detail->CategoryID) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <input type="text" name="UserID" placeholder="Enter your userid"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ $detail->UserID }}" hidden/>
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Mã khóa học <span class="text-meta-1">*</span>
                            </label>
                            <input type="text" name="CourseCode" placeholder="Nhập mã khóa học"
                                   class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                   value="{{ $detail->CourseCode }}"/>
                        </div>
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Tên khóa học <span class="text-meta-1">*</span>
                            </label>
                            <input type="text" name="CourseName" placeholder="Nhập tên khóa học"
                                   class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                   value="{{ $detail->CourseName }}"/>
                        </div>
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Tiêu đề phụ khóa học <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="CourseSubTitle" placeholder="Nhập tiêu đề phụ khóa học"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ $detail->CourseSubTitle }}"/>
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Đường dẫn <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="Slug" placeholder="Nhập đường dẫn"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ $detail->Slug }}"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Giá tiền <span class="text-meta-1">*</span>
                        </label>
                        <input type="number" name="Price" placeholder="Nhập giá tiền"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ $detail->Price }}"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Khuyến mãi <span class="text-meta-1">*</span>
                        </label>
                        <input type="number" name="Discount" placeholder="Nhập khuyến mãi"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ $detail->Discount }}"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Ảnh dữ liệu <span class="text-meta-1">*</span>
                        </label>
                        <input type="file" name="ImageData"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ $detail->ImageData }}"/>

                    </div>

                    {{--                    <input type="text" name="LessonCount" placeholder="Enter lesson count"--}}
                    {{--                           class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                           value="{{ $detail->LessonCount }} " hidden/>--}}
                    {{--                    <input type="text" name="ChapterCount" placeholder="Enter chapter count"--}}
                    {{--                           class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                           value="{{ $detail->ChapterCount }} " hidden/>--}}
                    {{--                    <div class="mb-4.5">--}}
                    {{--                        <label class="mb-2.5 block text-black dark:text-white">--}}
                    {{--                            Time lesson total <span class="text-meta-1">*</span>--}}
                    {{--                        </label>--}}
                    {{--                        <input type="text" name="TimeLessonTotal" placeholder="Select timelessontotal"--}}
                    {{--                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                               value="{{ $detail->TimeLessonTotal }} "/>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="mb-4.5">--}}
                    {{--                        <label class="mb-2.5 block text-black dark:text-white">--}}
                    {{--                            Register count <span class="text-meta-1">*</span>--}}
                    {{--                        </label>--}}
                    {{--                        <input type="text" name="RegisterCount" placeholder="Select registercount"--}}
                    {{--                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                               value="{{ $detail->RegisterCount }} "/>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="mb-4.5">--}}
                    {{--                        <label class="mb-2.5 block text-black dark:text-white">--}}
                    {{--                            Done count <span class="text-meta-1">*</span>--}}
                    {{--                        </label>--}}
                    {{--                        <input type="text" name="DoneCount" placeholder="Select donecount"--}}
                    {{--                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"--}}
                    {{--                               value="{{ $detail->DoneCount }} "/>--}}
                    {{--                    </div>--}}
                    <div class="">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Video mô tả <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="IntroVideoLink" placeholder="Nhập đường dẫn video mô tả"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               value="{{ $detail->IntroVideoLink }}"/>
                    </div>
                </div>
                <div class="flex justify-end mb-4 mr-6 gap-3">
                    <button type="submit"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Cập nhật
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
