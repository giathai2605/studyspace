<?php
switch ($item->roleID) {
    case 1:
        $slug = "admin";
        break;
    case 2:
    case 3:
        $slug = "staff";
        break;
    case 4:
        $slug = "customer";
        break;
}
?>
@extends('client.layouts.main')
@section('content')
<style>
    .edit-user{
        background-color: #FFF;
            border-radius: 15px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            transition: all 0.5s ease;
            padding: 40px;
    }

    .update-btn{
        color: #FFF;
        background-color: #3c50e0;
    }

    .reset-btn{
        color: #FFF;
        background-color: #d34053;
    }

    .text-meta-1 {
        color: #d34053;
    }
</style>
<main class="main_content">
    <div class="container">
        <div class="edit-user">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white text-xl">
                    Update user
                </h3>
            </div>
            <form data-redirect="{{ route('account.show', $item->id) }}" id="accountEdit"
                  data-url="{{ route('account.update', $item->id) }}" action="{{ route('account.update', $item->id) }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-6.5 space-y-5">
                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row mt-12">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white font-bold">
                                First name <span class="text-meta-1">*</span>
                            </label>
                            <input name="firstName" value="{{ $item->firstName }}" type="text"
                                   class="w-full rounded-full border-[1.5px] border-stroke bg-transparent shadow-lg py-3 px-5 font-medium  transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white font-bold">
                                Last name <span class="text-meta-1">*</span>
                            </label>
                            <input name="lastName" value="{{ $item->lastName }}" type="text"
                                   class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 shadow-md px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                        </div>
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white font-bold">
                            Email <span class="text-meta-1">*</span>
                        </label>
                        <input value="{{ $item->email }}" name="email" type="email" disabled
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 shadow-md px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                        <input value="{{ $item->email }}" name="email" type="email" hidden
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 shadow-md px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white font-bold">
                            Username <span class="text-meta-1">*</span>
                        </label>
                        <input name="username" type="text" value="{{ $item->username }}"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 shadow-md px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white font-bold">
                            Phone <span class="text-meta-1">*</span>
                        </label>
                        <input name="phone" type="text" value="{{ $item->phone }}"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 shadow-md px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white font-bold">
                            Image
                        </label>
                        <input name="avatar" type="file"
                               class="w-full rounded-lg border border-stroke p-3 outline-none transition file:mr-4 file:rounded file:border-[0.5px] file:border-stroke file:bg-[#EEEEEE] file:py-1 file:px-2.5 file:text-sm file:font-medium focus:border-primary file:focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-strokedark dark:file:bg-white/30 dark:file:text-white"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white font-bold">
                            Birthday <span class="text-meta-1">*</span>
                        </label>
                        <input name="birthday" type="date" value="{{ $item->birthday }}"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 shadow-md px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white font-bold">
                            Address <span class="text-meta-1">*</span>
                        </label>
                        <input name="address" type="text" value="{{ $item->address }}"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 shadow-md px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>

                    <div class="">
                        <label class="mb-2.5 block text-black dark:text-white font-bold">
                            Gender <span class="text-meta-1">*</span>
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="gender"
                                    class="relative z-20 w-full appearance-none rounded-lg border border-stroke bg-transparent py-3 shadow-md px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option {{ $item->gender == 1 ? 'selected' : '' }} value="1">Male</option>
                                <option {{ $item->gender == 0 ? 'selected' : '' }} value="0">Female</option>
                            </select>
                        </div>
                    </div>
                    <input type="text" name="userStatusID" value="1" hidden>
                    <input type="text" name="password" value="{{ $item->password }}" hidden>
                    <input type="text" name="roleID" id="" value="{{ $item->roleID }}" hidden>

                </div>
                <div class="flex justify-end mb-4 mr-6 gap-3 mt-12">
                    <button type="submit"
                            class="update-btn px-6 py-3 shadow-md text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Update
                    </button>

                    <button type="reset"
                            class="reset-btn px-6 py-3 shadow-md text-white bg-danger rounded-md hover:bg-opacity-90 transition">
                        Reset
                    </button>
                </div>
            </form>
        </div>
        </div>
    </main>
@endsection
