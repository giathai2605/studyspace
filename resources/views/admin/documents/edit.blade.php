@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Cập nhật tài liệu
                </h3>
            </div>
            <form id="documentFormCreate" action="{{ route('documents.update',['id'=>$document->id]) }}" method="post"
                  data-url="{{ route('documents.update',['id'=>$document->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Tên tài liệu <span class="text-meta-1">*</span>
                        </label>
                        <input name="name" type="text" value="{{$document->name}}" placeholder="Nhập tên tài liệu"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                        @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Ảnh đại diện <span class="text-meta-1">*</span>
                        </label>
                        <input name="thumbnail" type="file" accept="image/*" value="{{$document->thumbnail}}"
                               class="w-full rounded-lg border border-stroke p-3 outline-none transition file:mr-4 file:rounded file:border-[0.5px] file:border-stroke file:bg-[#EEEEEE] file:py-1 file:px-2.5 file:text-sm file:font-medium focus:border-primary file:focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-strokedark dark:file:bg-white/30 dark:file:text-white"/>
                        @error('thumbnail')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Tệp tin <span class="text-meta-1">*</span>
                        </label>
                        <input name="file" type="file" accept="application/pdf" value="{{$document->file}}"
                               class="w-full rounded-lg border border-stroke p-3 outline-none transition file:mr-4 file:rounded file:border-[0.5px] file:border-stroke file:bg-[#EEEEEE] file:py-1 file:px-2.5 file:text-sm file:font-medium focus:border-primary file:focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-strokedark dark:file:bg-white/30 dark:file:text-white"/>
                        @error('file')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Chấp nhận <span class="text-meta-1">*</span>
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="status"
                                    class="relative z-20 w-full appearance-none rounded-lg border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option value="">Chọn chấp nhận</option>
                                <option value="1" <?= $document->status ? "selected" : "" ?>>Xuất bản</option>
                                <option value="0" <?= !$document->status ? "selected" : "" ?>>Không xuất bản</option>
                            </select>
                            <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
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
                        @error('status')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Nổi bật <span class="text-meta-1">*</span>
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="is_featured"
                                    class="relative z-20 w-full appearance-none rounded-lg border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option value="">Select featured</option>
                                <option value="1" <?= $document->is_featured ? "selected" : "" ?>>Nổi bật</option>
                                <option value="0" <?= !$document->is_featured ? "selected" : "" ?>>Không nổi bật
                                </option>
                            </select>
                            <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
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
                        @error('is_featured')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Mô tả <span class="text-meta-1">*</span>
                        </label>
                        <textarea rows="6" placeholder="Nhập mô tả" name="description"
                                  class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ $document->description }}</textarea>
                        @error('description')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
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
