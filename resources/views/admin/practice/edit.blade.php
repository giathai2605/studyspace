@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Cập nhật luyện tập
                </h3>
            </div>
            <form id="practiceEditCreate" data-redirect="{{ route('practice.index', $model->LessonID) }}" action="{{ route('practice.update', $model->id) }}"
                  method="post" data-url="{{ route('practice.update', $model->id) }}">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Vấn đề <span class="text-meta-1">*</span>
                        </label>
                        <input name="Problem" type="text" value="{{ $model->Problem }}" placeholder="Nhập vấn đề"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Chi tiết vấn đề <span class="text-meta-1">*</span>
                        </label>
                        <input name="ProblemDetail" type="text" value="{{ $model->ProblemDetail }}" placeholder="Nhập chi tiết vấn đề"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Giải thích <span class="text-meta-1">*</span>
                        </label>
                        <input name="Explain" type="text" value="{{ $model->Explain }}" placeholder="Nhập giải thích"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Gợi ý <span class="text-meta-1">*</span>
                        </label>
                        <input name="Suggest" type="text" value="{{ $model->Suggest }}" placeholder="Nhập gợi ý"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <input type="text" name="LessonID" value="{{ $model->LessonID }}" hidden >
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
