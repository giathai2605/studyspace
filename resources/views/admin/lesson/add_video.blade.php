@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Thêm video mới cho <a href="#" class="font-bold dark:text-white">{{ $lesson->LessonName }}</a>
                </h3>
            </div>
            <form id="formAddLessonVideo" method="post"
                  action="{{ route('lesson.store-video', ['id' => $lesson->id]) }}"
                  data-url="{{ route('lesson.store-video', ['id' => $lesson->id]) }}"
                  data-redirect="{{ route('lesson.detail', ['id' => $lesson->id]) }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="grid gap-5.5 p-6.5">
                    <div>
                        <label class="mb-3 block font-medium text-black dark:text-white">
                            ID bài học <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" placeholder="#{{ $lesson->id }}" disabled="" name="LessonID"
                               value="{{ $lesson->id }}"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div>
                        <label class="mb-3 block font-medium text-black dark:text-white">
                            Tiêu đề video <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" placeholder="Nhập tiêu đề video" name="Title"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div>
                        <label class="mb-3 block font-medium text-black dark:text-white">
                            Video <span class="text-meta-1">*</span>
                        </label>
                        <input type="file" placeholder="Tải lên file" name="LessonLinkUrl"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
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
