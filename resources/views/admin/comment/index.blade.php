@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <div
            class="rounded-md border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                    <tr class="text-left bg-gray-2 dark:bg-meta-4">
                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                            Người bình luận
                        </th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                            Tên bài học
                        </th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                            Tên khóa học
                        </th>
                        <th class="min-w-[220px]py-4 px-4 font-medium text-black dark:text-white">
                            Nội dung bình luận
                        </th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                            Phương tiện đính kèm
                        </th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                            Số lượng trả lời
                        </th>
                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                            Hành động
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($comments) == 0)
                        <td colspan="7" style="padding: 16px; color:red" class="text-center">
                            <h1 class="font-medium text-2xl">Không có dữ liệu!</h1>
                        </td>
                    @endif
                    @foreach ($comments as $comment)
                        <tr>
                            <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                <a href="" class="font-medium text-black dark:text-white">
                                    {{ $comment->lastname }} {{ $comment->firstname }}
                                </a>
                                <p class="text-sm"> {{ '@' . $comment->username }}</p>
                            </td>
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                {{ $comment->LessonName }}
                            </td>
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                {{ $comment->CourseName }}
                            </td>
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p class="text-black dark:text-white">
                                    {{ $comment->Content }}
                                </p>
                            </td>
                            @if(isset($comment->Image))
                                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <img src="{{ asset($comment->Image) }}" alt="" class="block object-cover w-20 h-20">
                                </td>
                            @else
                                <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    Không có
                                </td>
                            @endif
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark ">
                                <p
                                    class="inline-flex px-3 py-1 mx-auto text-sm font-medium rounded-full bg-success bg-opacity-10 text-success">
                                    {{ App\Models\ReplyComment::where('CommentID', $comment->id)->count() }}
                                </p>
                            </td>
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <div class="flex items-center space-x-3.5">
                                    <a href="{{ route('comments.show',['id' => $comment->id]) }}"
                                       class="hover:text-primary">
                                        <svg class="text-success" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             style="width: 24px">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </a>

                                    <form class="deleteFormComment" data-redirect="{{ route('comments.index') }}"
                                          method="POST"
                                          data-url="{{ route('comments.destroy', $comment->id) }}">
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

                                    <form class="blockUser" method="GET" data-redirect="{{ route('users.index') }}"
                                          data-url="{{ route('users.block', ['id' => $comment->UserID]) }}">
                                        @csrf
                                        @if($comment->roleID != 1 && $comment->roleID != 6)
                                            <button class="hover:text-primary">
                                                <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                     style="width: 24px; margin-top: 5px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                                </svg>
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination__laravel">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function checkAndShowError(icon, title, text) {
                Swal.fire({
                    icon: icon,
                    title: title,
                    text: text
                });
            }

            $('.blockUser').submit(function (event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Xác nhận khóa tài khoản?',
                    text: 'Bạn có chắc chắn muốn khóa tài khoản này?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Có, khóa nó!',
                    cancelButtonText: 'Hủy bỏ'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = $(this).data('url');
                        var redirect = $(this).data('redirect');

                        $.ajax({
                            type: 'GET',
                            url: url,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                checkAndShowError('success', 'Thành công!', 'Khóa tài khoản thành công!');
                                window.location.href = redirect;
                            },
                            error: function (xhr, status, error) {
                                checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                            }
                        });
                    }
                });
            });

            $('.deleteFormComment').submit(function (event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Xác nhận xóa bình luận?',
                    text: 'Bạn có chắc chắn muốn xóa bình luận này?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Có, xóa nó!',
                    cancelButtonText: 'Hủy bỏ'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = $(this).data('url');
                        var redirect = $(this).data('redirect');

                        $.ajax({
                            type: 'GET',
                            url: url,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                checkAndShowError('success', 'Thành công!', 'Xóa bình luận thành công!');
                                window.location.href = redirect;
                            },
                            error: function (xhr, status, error) {
                                checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
