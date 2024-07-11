@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Cập nhật kiểm thử
                </h3>
            </div>
            <form id="testcaseEditCreate" data-redirect="{{ route('testcase.index', $model->PracticeLessonID) }}"
                  action="{{ route('testcase.update', $model->id) }}"
                  data-url="{{ route('testcase.update', $model->id) }}">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Tên hàm <span class="text-meta-1">*</span>
                        </label>
                        <input name="NameFunction" type="text" value="{{ $model->NameFunction }}"
                               placeholder="Nhập tên hàm"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Đầu vào <span class="text-meta-1">*</span>
                        </label>
                        <input name="Input" type="text" value="{{ $model->Input }}" placeholder="Nhập đầu vào"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Chi tiết đầu vào <span class="text-meta-1">*</span>
                        </label>
                        <input name="InputDetail" type="text" value="{{ $model->InputDetail }}"
                               placeholder="Nhập chi tiết đầu vào"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Đầu ra mong đợi <span class="text-meta-1">*</span>
                        </label>
                        <input name="ExpectOutput" type="text" value="{{ $model->ExpectOutput }}"
                               placeholder="Nhập đầu ra mong đợi"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Số thứ tự <span class="text-meta-1">*</span>
                        </label>
                        <input name="SortNumber" min="0" type="number" value="{{ $model->SortNumber }}"
                               placeholder="Nhập số thứ tự"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <input type="text" name="PracticeLessonID" value="{{ $model->PracticeLessonID }}" hidden>
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
