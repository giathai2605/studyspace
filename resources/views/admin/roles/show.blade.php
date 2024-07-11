@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex justify-between items-center border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Chi tiết vai trò
                </h3>
                <a href="{{ route('roles.index') }}"
                   class="inline-flex items-center justify-center rounded-md bg-primary py-3 px-8 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                    Trở về
                </a>
            </div>
            <div class="grid gap-5.5 p-6.5">
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Tên vai trò
                        </label>
                        <input type="text" placeholder="Role name" name="name" disabled
                               value="{{ old('name') ? old('name') : $role->name }}"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>

                    <div class="w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Tên bảo vệ
                        </label>
                        <input type="text" placeholder="Guard name" name="guard_name" disabled
                               value="{{ old('guard_name') ? old('guard_name') : $role->guard_name }}"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                </div>

                <div>
                    <label class="mb-3 block text-md font-medium text-black dark:text-white">
                        Tên quyền
                    </label>
                    <div class="flex flex-wrap">
                        @foreach(config('permissions') as $key => $value)
                            <div class="w-1/4" style="padding: 5px">
                                {{-- <input type="checkbox" name="permissions[]" id="{{ $key }}" disabled
                                       value="{{ $key }}" @if(in_array($key, $permissions)) checked @endif
                                       class="rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                <label for="{{ $key }}">{{ $value }}</label> --}}
                                <label class="aiz-switch aiz-switch-success mb-0 flex gap-4">
                                    <input id="{{ $key }}" name="permissions[]" value="{{ $key }}" @if(in_array($key, $permissions)) checked @endif
                                        class="checkbox-item" type="checkbox" disabled>
                                    <span></span>
                                    <label for="{{ $key }}">{{ $value }}</label>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
