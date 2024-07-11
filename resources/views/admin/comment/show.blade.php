@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div
            class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark max-w-md">
            <div
                class="antialiased border-b border-stroke py-4 px-6.5 dark:border-strokedark flex justify-between items-center">
                <h3 class="font-bold text-xl text-black dark:text-white">Chi tiết bình luận</h3>
            </div>
            @foreach ($comments as $comment)
                <div class="flex" style="margin: 1rem">
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ asset($comment->avatar) }}"
                             alt="">
                    </div>
                    <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <strong
                            class="text-black dark:text-white">{{ $comment->firstname }} {{ $comment->lastname }}</strong>
                        <span
                            class="text-xs text-gray-400"> {{  date('H:i:s d-m-Y ', strtotime($comment->created_at)) }}</span>
                        <p class="text-sm text-black dark:text-white">
                            {{ $comment->Content }}
                        </p>
                        @if(isset($comment->Image))
                        <img src="{{ asset($comment->Image) }}" alt=""
                             class="block object-cover w-20 h-20 rounded-md object-cover my-2">
                        @endif

                        <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs mt-2">Trả lời</h4>

                        @if(count((array)$comment->replyContent) == 0)
                            @foreach ($replyComments as $reply)
                                <div class="space-y-4">
                                    <div class="flex">
                                        @if(isset($reply->avatar))
                                            <div class="flex-shrink-0 mr-3">
                                                <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8"
                                                     src="{{ asset($reply->avatar) }}" alt="">
                                            </div>
                                        @endif
                                        <div
                                            class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                            <strong
                                                class="text-black dark:text-white">{{ $reply->firstname }} {{ $reply->lastname }}</strong>
                                            <span
                                                class="text-xs text-gray-400">{{  date('H:i:s d-m-Y ', strtotime($reply->created_at)) }}</span>
                                            <p class="text-xs sm:text-sm mb-2 dark:text-white">
                                                {{ $reply->Content }}
                                            </p>
                                            @if ($reply->Image)
                                                <img src="{{ $reply->Image }}" alt=""
                                                     class="block object-cover w-20 h-20 rounded-md object-cover my-2">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
