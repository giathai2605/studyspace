@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Thêm vai trò mới
                </h3>
            </div>
            <form id="roleFormCreate" data-redirect="{{ route('roles.index') }}" action="{{ route('roles.store') }}"
                method="POST" data-url="{{ route('roles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-5.5 p-6.5">
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Tên vai trò <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" placeholder="Tên vai trò" name="name" value="{{ old('name') }}"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                    </div>

                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Tên quyền
                        </label>
                        <div class="flex flex-wrap">
                            <div class="w-full text-center" style="padding: 5px">
                                {{-- <input type="checkbox" id="selectAll" class="rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/> --}}
                                {{-- <label for="selectAll" class="text-red" style="font-weight: bold">
                                    Chọn / Bỏ chọn tất cả
                                </label> --}}

                                <label class="aiz-switch aiz-switch-success mb-0 flex gap-4">
                                    <input id="selectAll" onchange="update_course_status(this)" type="checkbox">
                                    <span></span>
                                    <p class="font-bold">Chọn / Bỏ chọn tất cả</p>
                                </label>
                            </div>
                            @foreach (config('permissions') as $key => $value)
                                <div class="w-1/4" style="padding: 5px">
                                    {{-- <input type="checkbox" name="permissions[]" id="{{ $key }}"
                                           value="{{ $key }}"
                                           class="checkbox-item rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/> --}}
                                    <label class="aiz-switch aiz-switch-success mb-0 flex gap-4">
                                        <input id="{{ $key }}" name="permissions[]" value="{{ $key }}"
                                            class="checkbox-item" type="checkbox">
                                        <span></span>
                                        <label for="{{ $key }}">{{ $value }}</label>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mb-4 mr-6 gap-3">
                    <button type="submit"
                        class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Thêm mới
                    </button>

                    <button type="reset" class="px-6 py-3 text-white bg-danger rounded-md hover:bg-opacity-90 transition">
                        Nhập lại
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('selectAll');
            const permissionCheckboxes = document.querySelectorAll('.checkbox-item');

            selectAllCheckbox.addEventListener('change', function() {
                permissionCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            permissionCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    selectAllCheckbox.checked = Array.from(permissionCheckboxes).every(function(
                        checkbox) {
                        return checkbox.checked;
                    });
                });
            });
        });
    </script>
@endsection
