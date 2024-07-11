{{--@extends('admin.dashboard.layouts.master')--}}
{{--@section('content')--}}
{{--    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">--}}
{{--        <div class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">--}}
{{--            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">--}}
{{--                <h3 class="font-bold text-xl text-black dark:text-white">--}}
{{--                    Update permission--}}
{{--                </h3>--}}
{{--            </div>--}}
{{--            <form data-redirect="{{ route('permissions.index') }}" id="permissionFormEdit"--}}
{{--                  data-url="{{ route('permissions.update', $permission->id) }}"--}}
{{--                  action="{{ route('permissions.update', $permission->id) }}"--}}
{{--                  method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="grid gap-5.5 p-6.5">--}}
{{--                    <div>--}}
{{--                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">--}}
{{--                            Permission name <span class="text-meta-1">*</span>--}}
{{--                        </label>--}}
{{--                        <input type="text" placeholder="Permission name" name="name"--}}
{{--                               value="{{ old('name') ? old('name') : $permission->name }}"--}}
{{--                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="flex justify-end mb-4 mr-6 gap-3">--}}
{{--                    <button type="submit"--}}
{{--                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">--}}
{{--                        Update--}}
{{--                    </button>--}}

{{--                    <button type="reset"--}}
{{--                            class="px-6 py-3 text-white bg-danger rounded-md hover:bg-opacity-90 transition">--}}
{{--                        Reset--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
