@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Cập nhật bài học
                </h3>
            </div>
            <form id="formEditLesson" action="{{  route('lesson.update',['id' =>$lesson->id]) }}"
                  data-redirect="{{route('lesson.index')}}"
                  data-url="{{  route('lesson.update',['id' =>$lesson->id]) }}" method="POST">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Tên bài học <span class="text-meta-1">*</span>
                            </label>
                            <input name="LessonName" type="text" placeholder="Nhập tên bài học"
                                   class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                   value="{{ old('LessonName') ? old('LessonName') : $lesson->LessonName }}"/>
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Số thứ tự <span class="text-meta-1">*</span>
                            </label>
                            <input name="SortNumber" type="number" placeholder="Nhập số thứ tự"
                                   class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                   value="{{$lesson->SortNumber}}" min="0"/>
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Tên chương <span class="text-meta-1">*</span>
                            </label>
                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                                <select name="CourseChapterId"
                                        class="relative z-20 w-full px-5 py-3 transition bg-transparent border rounded-lg outline-none appearance-none border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option value="">Chọn chương</option>
                                    @foreach ($course_chapter as $item)
                                        <option
                                            value="{{ $item->id }}" <?= $item->id == $lesson->CourseChapterId ? "Selected" : "" ?>>{{ $item->ChapterName }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute z-30 -translate-y-1/2 top-1/2 right-4">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                  fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Trạng thái <span class="text-meta-1">*</span>
                            </label>
                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                                <select name="Status"
                                        class="relative z-20 w-full px-5 py-3 transition bg-transparent border rounded-lg outline-none appearance-none border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option value="">Chọn trạng thái</option>
                                    <option @if($lesson->Status == 1) selected @endif value="1">Hoạt động</option>
                                    <option @if($lesson->Status == 0) selected @endif value="0">Không hoạt động</option>
                                </select>
                                <span class="absolute z-30 -translate-y-1/2 top-1/2 right-4">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                  fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Mô tả
                        </label>
                        <textarea rows="6" placeholder="Nhập mô tả" name="LessonDescription"
                                  class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ old('LessonDescription') ? old('LessonDescription') : $lesson->LessonDescription }}</textarea>
                    </div>
                </div>
                <div class="flex justify-end mb-4 mr-6 gap-3">
                    <button type="submit"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Cập nhật
                    </button>

                    <button type="reset"
                            class="px-6 py-3 text-white bg-danger rounded-md hover:bg-opacity-90 transition">
                        Nhập lại
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
