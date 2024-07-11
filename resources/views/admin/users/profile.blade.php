@extends('admin..dashboard.layouts.master')
@section('content')
<div class="p-4 mx-auto max-w-screen-3xl ">

    <div class="mx-auto">
        <!-- ====== Profile Section Start -->
        <div
            class="overflow-hidden bg-white border rounded-md border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="relative z-20 h-35 md:h-65">
                <img src="{{ asset($profile->avatar) }}" alt="profile cover"
                    class="object-cover object-center w-full h-full rounded-tl-sm rounded-tr-sm" />
            </div>
            <div class="px-4 pb-6 text-center lg:pb-8 xl:pb-11.5">
                <div class="relative z-30 w-full p-1 mx-auto -mt-22 bg-white/20 backdrop-blur sm:p-3">
                    <div class="relative drop-shadow-2">
                        <img src="{{ asset($profile->avatar) }}" alt="profile" class="border"
                            style="border-radius:50%;width:150px; height:150px;display:block;margin:0 auto;object-fit:cover" />
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="mb-1.5 text-2xl font-medium text-black dark:text-white">
                        {{ $profile->lastName }} {{ $profile->firstName }}
                    </h3>
                    <p class="font-medium">{{ '@' . $profile->username }}</p>
                    <p class="font-medium">Giới tính: {{ $profile->gender == 1 ? 'Nam' : 'Nữ' }}</p>
                    <p class="font-medium">Email: {{ $profile->email }}</p>
                    <p class="font-medium">Số điện thoại: {{ $profile->phone }}</p>
                    <p class="font-medium">Tiểu sử: {{ $profile->description }}</p>
                    <div
                        class="mx-auto mt-4.5 mb-5.5 grid  grid-cols-3 rounded-md border border-stroke py-2.5 shadow-1 dark:border-strokedark dark:bg-[#37404F]">
                        <div class="flex flex-col items-center justify-center gap-1 px-4 border-r border-stroke dark:border-strokedark xsm:flex-row"
                            style="white-space:nowrap">
                            <span class="text-sm">Đã tham gia </span>
                            <span class="font-semibold text-black dark:text-white ">{{ $coursesAttended }} </span>
                            <span class="text-sm">khóa học</span>
                        </div>
                        <div
                            class="flex flex-col items-center justify-center gap-1 px-4 border-r border-stroke dark:border-strokedark xsm:flex-row">
                            <span class="text-sm">Hoàn thành</span>
                            <span class="font-semibold text-black dark:text-white">{{ $isDoneCourse }} </span>
                            <span class="text-sm">khóa học</span>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-1 px-4 xsm:flex-row">
                            <span class="text-sm">Gia nhập</span>
                            <span class="font-semibold text-black dark:text-white">
                                {{ $profile->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ====== Profile Section End -->

    <!-- Vẽ biểu đồ -->



</div>
</div>
@endsection
