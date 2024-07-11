@extends('newclient.layouts.main')
@section('content')
    <div class="main_content">
        <div class="container">
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-md shadow-md">
                    <h3 class="border-b font-semibold px-5 py-4 text-base text-gray-500"> Your cources
                        ({{ $count }} lessons)</h3>
                    <div class="divide-y">
                        <div class="flex items-start space-x-6 relative py-7 px-6">
                            <div class="h-28 overflow-hidden relative rounded-md w-44">
                                <img src="{{ asset('public/images/courses/' . $data->ImageData) }}" alt=""
                                     class="absolute w-full h-full inset-0 object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <a href="course-intro-2.html" class="md:text-lg font-semibold line-clamp-2 mb-2">
                                    {{ $data->CourseName }} </a>
                                <a href="#" class="font-medium block text-sm"> {{ $data->author }}</a>
                                <div class="flex items-center mt-7 space-x-2 text-sm font-medium">
                                    <div> {{ $data->RegisterCount }} subscriber</div>
                                </div>
                            </div>
                            <h5 class="font-semibold text-black text-xl">
                                @if ($data->Discount != 0)
                                    <del class="text-gray-400">{{ $data->Price }}</del>
                                    {{ $data->Price - ($data->Price * $data->Discount) / 100 }} VNĐ
                                @else
                                    {{ $data->Price }} VNĐ
                                @endif
                            </h5>
                            <h5 class="absolute bottom-9 font-semibold right-4 text-blue text-blue-500"> Remove </h5>
                        </div>

                        @php
                            $total = $data->Price - ($data->Price * $data->Discount) / 100;
                        @endphp

                        <div class="border-t mt-5 pt-6 space-y-6">

                            <div class="flex justify-between px-6">
                                <div class="flex-1 min-w-0">
                                    <h1 class="text-lg font-medium"> Subtotal </h1>
                                </div>
                                <h5 class="font-semibold text-black text-xl"> {{ $total }} VNĐ</h5>
                            </div>

                            <div class="px-6 pb-5">
                                <h1 class="font-semibold mt-5 text-lg"> Choose payment method </h1>
                                <div class="grid grid-cols-2 md:gap-6 gap-3 mt-2">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
