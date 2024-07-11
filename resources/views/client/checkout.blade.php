@extends('client.layouts.main')
@section('content')
    <div class="">
        <div class="row">
            {{--            <aside class="col-1 ml-5">--}}
            {{--                --}}{{-- <div class="toggle">--}}
            {{--                    <div class="logo">--}}
            {{--                        <h2>Asmr--}}
            {{--                            <span class="danger">Prog</span>--}}
            {{--                        </h2>--}}
            {{--                    </div>--}}

            {{--                </div> --}}
            {{--                <!-- Status of sidebar1 -->--}}
            {{--                <div class="sidebar1">--}}
            {{--                    <a href="#">--}}
            {{--                        <span class="material-symbols-outlined">--}}
            {{--                            home--}}
            {{--                            </span>--}}
            {{--                        <h3>Dashboard</h3>--}}
            {{--                    </a>--}}
            {{--                    <a href="#">--}}
            {{--                        <span class="material-symbols-outlined">--}}
            {{--                            javascript--}}
            {{--                            </span>--}}
            {{--                        <h3>User</h3>--}}
            {{--                    </a>--}}
            {{--                    <a href="#">--}}
            {{--                        <span class="material-symbols-outlined">--}}
            {{--                            css--}}
            {{--                            </span>--}}
            {{--                        <h3>History</h3>--}}
            {{--                    </a>--}}
            {{--                    <a href="#">--}}
            {{--                        <span class="material-symbols-outlined">--}}
            {{--                            html--}}
            {{--                            </span>--}}
            {{--                        <h3>Analytics</h3>--}}
            {{--                    </a>--}}
            {{--                    <a href="#">--}}
            {{--                        <span class="material-symbols-outlined">--}}
            {{--                            php--}}
            {{--                            </span>--}}
            {{--                        <h3>Analytics</h3>--}}
            {{--                    </a>--}}
            {{--                    <a href="#" style="display: none">--}}
            {{--                        <span class="material-symbols-outlined">--}}
            {{--                            html--}}
            {{--                            </span>--}}
            {{--                        <h3>Tickets</h3>--}}
            {{--                        --}}{{-- <span class="message-count">27</span> --}}
            {{--                    </a>--}}

            {{--                </div>--}}
            {{--            </aside>--}}
            <div class="col-8 mx-auto mt-5">
                <div class="bg-white rounded-md shadow-md">
                    <div class="flex items-center justify-between border-b px-5">
                        <h3 class="font-semibold py-4 text-base text-gray-500"> Khóa học của bạn
                            ({{ countLessonInCourse($data -> id) }} Bài học)</h3>
                        <a class="btn btn-primary rounded-md" href="{{ route('detail.courses',['id'=>$data->id]) }}">Quay lại</a>
                    </div>
                    <div class="divide-y">
                        <div class="flex items-start space-x-6 relative py-7 px-6">
                            <div class="h-28 overflow-hidden relative rounded-md w-44">
                                <img src="{{ asset($data->ImageData) }}" alt=""
                                     class="absolute w-full h-full inset-0 object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <a href="#" class="md:text-lg font-semibold line-clamp-2 mb-2">
                                    Tên khóa học: {{ $data->CourseName }} </a>
                                <a href="#" class="font-medium block text-sm"> Tác giả: {{ $data->author }}</a>
                                <div class="flex items-center mt-7 space-x-2 text-sm font-medium">
                                    <div> {{ $data->RegisterCount }} Số người đăng ký</div>
                                </div>
                            </div>
                            <h5 class="font-semibold text-black text-xl">
                                @if ($data->Discount != 0)
                                    <del class="text-gray-400">{{ format_currency($data->Price) }}</del>
                                    {{ format_currency($data->Price - ($data->Price * $data->Discount) / 100) }}
                                @else
                                    {{ format_currency($data->Price) }}
                                @endif
                            </h5>
{{--                            <h5 class="absolute bottom-9 font-semibold right-4 text-blue text-blue-500"> Xóa </h5>--}}
                        </div>

                        @php
                            $total = $data->Price - ($data->Price * $data->Discount) / 100;
                        @endphp

                        <div class="border-t mt-5 pt-6 space-y-6">

                            <div class="flex justify-between px-6">
                                <div class="flex-1 min-w-0">
                                    <h1 class="text-lg font-medium"> Tổng thanh toán </h1>
                                </div>
                                <h5 class="font-semibold text-black text-xl"> {{ format_currency($total) }}</h5>
                            </div>

                            <div class="px-6 pb-5">
                                <h1 class="font-semibold mt-5 mb-4 text-lg"> Chọn phương thức thanh toán </h1>
                                {{--                                <div class="grid grid-cols-2 md:gap-6 gap-3 mt-2">--}}
                                {{-- <form action="{{route('payment.vnpay')}}" method="POST">
                                    @csrf
                                    <button type="submit" style="background-color:#005CAA;"
                                        class="w-full text-white flex gap-3 font-medium items-center justify-center py-3 rounded-md hover:text-white"
                                         name="redirect">
                                        <img class=" block h-10 "
                                            src="https://vnpayqr.vn/wp-content/uploads/2021/10/Untitled-1-02-01.png"
                                            alt="vnpay">
                                    </button>
                                </form> --}}
                                <form action="{{route('payment.momo')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="total_momo" value="{{$total}}" id="">
                                    <input type="hidden" name="course_id" value="{{$data->id}}" id="">
                                    <button type="submit" style="background-color:#BA2E84;"
                                            class="w-full text-white flex gap-3 font-medium items-center justify-center py-3 rounded-md hover:text-white"
                                            name="payUrl">
                                        <img class=" block h-10"
                                             src="https://lina.tokyo/wp-content/uploads/2020/09/momo-logo.jpg"
                                             alt="MOMO">
                                    </button>
                                </form>
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
