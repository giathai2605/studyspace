@extends('admin.dashboard.layouts.master')
@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="flex flex-col gap-10">
        <div
        class="rounded-md border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="flex justify-between items-center mb-4">
            <h4 class="text-xl font-bold text-black dark:text-white">
                Chi tiết đánh giá
            </h4>
            <ul class="flex gap-2 text-sm">
                <li>
                    <a href="{{ route('courses.ratingManagement',['id' => $data->course->id]) }}"
                        class="inline-block py-2 px-4 rounded-md bg-primary text-white font-medium hover:bg-primarydark transition duration-200">
                        <i class="fas fa-chevron-left mr-2"></i>Quay lại
                    </a>
                </li>
        </div>
        <ul class="rating__detail pb-5">
            <li>
                <span class="font-semibold text-primary">Người đánh giá : </span>
                <a href="{{ route('users.profile',['id' => $data->user->id]) }}"
                    class="text-black font-bold dark:text-white hover:underline">
                    {{ $data->user->lastName }} {{ $data->user->firstName }}
                </a>
            </li>
            <li>
                <span class="font-semibold text-primary">Nội dung : </span>
                <span class="text-black dark:text-white">
                    {{ $data->Comment  != null ? $data->Comment : 'Không có nội dung' }}
                </span>
            </li>
            <li>
                <span class="font-semibold text-primary">Điểm đánh giá : </span>
                <span class="text-black">{{ $data->Rating }}</span>
            </li>
            <li>
                <span class="font-semibold text-primary">Phản hồi : </span>
                <span> {{  count_reply_rating($data->id) > 0 ? count_reply_rating($data->id) . ' lượt phản hồi' : 'Chưa có phản hồi' }}</span>
            </li>
            <li>
                <span class="font-semibold text-primary">Ngày đánh giá : </span>
                <span class="text-black"> {{  date('H:i d-m-Y', strtotime($data->created_at)) }}</span>
            </li>
        </div>


        <div
            class="rounded-md border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-bold text-black dark:text-white">
                            Danh sách phản hồi của đánh giá
                        </h4>

                    </div>
                    </thead>
                    <tbody>
                    <tr class="text-left bg-gray-2 dark:bg-meta-4">
                        <th class="py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                            STT
                        </th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                            Người phản hồi
                        </th>
                        <th class="py-4 px-4 font-medium text-black dark:text-white">
                            Nội dung
                        </th>
                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                            Ngày phản hồi
                        </th>
                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                            Hành động
                        </th>
                    </tr>
                    </tbody>
                    <tfoot>
                        @if (count($data->ReplyRating) == 0)
                        <td colspan="7" style="padding: 16px;" class="text-center">
                            <span class="font-medium text-sm text-center">Chưa có phản hồi !</span>
                        </td>
                    @endif
                    @foreach ($data->ReplyRating as $key => $value)
                    <tr>
                        <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                            {{ $key +1 }}
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11 flex flex-col">
                            <a href="{{ route('users.profile',['id' => $value->UserID]) }}" class="text-black dark:text-white">
                                {{ $value->lastName }} {{ $value->firstName }}
                            </a>
                            <span class="text-xs text-gray-400">{{ $value->email }}</span>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <p class="text-black dark:text-white">
                                {{ $value->Comment  != null ? $value->Comment : 'Không có nội dung' }}
                            </p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            {{  date('H:i d-m-Y', strtotime($value->created_at)) }}
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <form class="deleteReplyRating" data-redirect="{{ route('courses.ratingDetail', ['id' => $data->id]) }}"
                                method="POST"
                                data-url="{{ route('courses.deleteReplyRating', $value->id) }}">
                              @csrf
                              <button type="submit" class="hover:text-primary" style="margin-top: 5px;">
                                  <svg class="fill-current text-danger" width="18" height="18" viewBox="0 0 18 18"
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
                        </td>
                    </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
