@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div
            class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark max-w-md">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark flex justify-between items-center">
                <h3 class="font-bold text-xl text-black dark:text-white">
                    Chi tiết chương học
                </h3>
                <a href="{{ route('chapter.index') }}"
                   class="inline-flex items-center justify-center rounded-md bg-primary py-3 px-8 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                    Quay lại
                </a>
            </div>
            <form data-redirect="{{ route('chapter.index') }}" id="chapterFormEdit"
                  data-url="{{ route('chapter.update', $chapter->id) }}"
                  action="{{ route('chapter.update', $chapter->id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-5.5 p-6.5">
                    <div>
                        <label class="mb-3 block font-medium text-black dark:text-white">
                            Tên khóa học <span class="text-meta-1">*</span>
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="CourseID"
                                    class="relative z-20 w-full appearance-none rounded-lg border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                            <?= $course->id == $chapter->CourseID ? "Selected" : "" ?> disabled>{{ $course->CourseName }}</option>
                                @endforeach
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
                    </div>

                    <div>
                        <label class="mb-3 block font-medium text-black dark:text-white">
                            Tên chương học <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" placeholder="Chương học" name="ChapterName"
                               value="{{ old('ChapterName') ? old('ChapterName') : $chapter->ChapterName }}" disabled
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>

                    <input type="number" placeholder="Lesson count" name="ChapterLessonCount" hidden
                           value="{{ old('ChapterLessonCount') ? old('ChapterLessonCount') : $chapter->ChapterLessonCount }}"
                           class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>

                    <div>
                        <label class="mb-3 block font-medium text-black dark:text-white">
                            Số thứ tự <span class="text-meta-1">*</span>
                        </label>
                        <input type="number" placeholder="Số thứ tự" name="SortNumber"
                               value="{{ old('SortNumber') ? old('SortNumber') : $chapter->SortNumber }}" disabled
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                    </div>
                </div>
            </form>

            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                <div class="flex flex-col gap-10">
                    <div
                        class="rounded-md border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-xl font-bold text-black dark:text-white">
                                Danh sách bài học
                            </h4>
                            <a href="{{ route('lesson.createWithChapterId',$chapter->id) }}"
                               class="inline-flex items-center justify-center rounded-md bg-primary py-3 px-8 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                                Thêm mới
                            </a>
                        </div>
                        <div class="max-w-full overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                <tr class="text-left bg-gray-2 dark:bg-meta-4">
                                    <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                                        Tên bài học
                                    </th>
                                    <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                                        Tạo lúc
                                    </th>
                                    <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                                        Cập nhật lúc
                                    </th>
                                    <th class="min-w-[50px] py-4 px-4 font-medium text-black dark:text-white">
                                        Thời lượng video
                                    </th>
                                    <th class="min-w-[50px] py-4 px-4 font-medium text-black dark:text-white">
                                        Số video
                                    </th>
                                    <th class="min-w-[220px] py-4 px-4  font-medium text-black dark:text-white">
                                        Mô tả
                                    </th>
                                    <th class="px-4 py-4 font-medium text-black dark:text-white">
                                        Hành động
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($lessons as $lesson)
                                    <tr>
                                        <td class="border-b border-[#eee] py-5 px-4  dark:border-strokedark">
                                            <h5 class="text-xs font-medium text-black dark:text-white">{{ $lesson->LessonName }}</h5>
                                        </td>
                                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                            <p class="text-xs font-medium text-black dark:text-white">
                                                {{ date('h:i d/m/Y', strtotime($lesson->created_at)) }}
                                            </p>
                                        </td>
                                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                            <p class="text-xs text-black dark:text-white">
                                                {{ date('h:i d/m/Y', strtotime($lesson->updated_at)) }}
                                            </p>
                                        </td>
                                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                            <p class="text-xs text-black dark:text-white">
                                                {{ $lesson->VideoTime }}
                                            </p>
                                        </td>
                                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                            <p class="text-xs inline-flex px-3 py-1 font-medium rounded-full bg-success bg-opacity-10 text-success">
                                                @php
                                                    $totalVideo = DB::table('lesson_videos')->where('LessonID', $lesson->id)->whereNull('deleted_at')->count();
                                                @endphp
                                                {{ $totalVideo }}
                                            </p>
                                        <td class="border-b border-[#eee] py-5 px-4  dark:border-strokedark">
                                            <h5 class="text-xs font-medium text-black dark:text-white">
                                                {{ $lesson->LessonDescription }}
                                            </h5>
                                        </td>
                                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                            <div class="flex items-center space-x-3.5">
                                                <a class="hover:text-primary"
                                                   href="{{ route('practice.index',['id' => $lesson->id])}}">
                                                    <svg class="fill-current text-success" width="18" height="18"
                                                         viewBox="0 0 18 18"
                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                            fill=""/>
                                                        <path
                                                            d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                            fill=""/>
                                                    </svg>
                                                </a>
                                                <a class="hover:text-primary"
                                                   href="{{ route('lesson.detail',['id' =>$lesson->id]) }}">
                                                    <svg class="text-black dark:text-white" width="18" height="18"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round"
                                                              d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"/>
                                                    </svg>
                                                </a>
                                                <a class="hover:text-primary"
                                                   href="{{ route('lesson.edit',['id' =>$lesson->id]) }}">
                                                    <svg class="text-warning" width="18" height="18"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                    </svg>
                                                </a>
                                                <form class="deleteLesson" data-redirect="{{ route('lesson.index') }}"
                                                      method="GET"
                                                      data-url="{{ route('lesson.destroy', $lesson->id) }}">
                                                    @csrf
                                                    <button type="submit" class="hover:text-primary"
                                                            style="margin-top: 5px;">
                                                        <svg class="fill-current text-danger" width="18" height="18"
                                                             viewBox="0 0 18 18"
                                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                                                fill=""/>
                                                            <path
                                                                d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                                                fill=""/>
                                                            <path
                                                                d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                                                fill=""/>
                                                            <path
                                                                d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                                                fill=""/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination__laravel">
                                {{ $lessons->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
