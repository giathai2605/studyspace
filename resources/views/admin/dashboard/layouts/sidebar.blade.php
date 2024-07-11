<aside :class="sidebarToggle ? 'translate-x-0 bg-white opacity-100' : '-translate-x-full'"
       class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden  duration-300 ease-linear lg:static lg:translate-x-0 lg:inset-y-0 dark:bg-black dark:text-white"
       @click.outside="sidebarToggle = false">

    <a class="toggle" href="{{ route('home') }}">
        <div class="logo">
            <img class="m-auto" src="{{ asset('img/logo2.svg')}}" width="80%" height="auto" alt="">
        </div>
        <div class="close" id="close-btn">
            <span class="material-symbols-outlined">
                close
            </span>

        </div>
    </a>
    <!-- Status of sidebar -->
    <div class="sidebar dark:bg-black dark:text-white" style="margin-bottom: 32px; overflow-y: scroll;">
        <a href="{{ route('admin.index') }}" class="flex">
            <span class="material-symbols-outlined dark:text-white">
                insights
            </span>
            <h3 class="dark:text-white">Thống kê</h3>
        </a>
        <div class="dropdrown" id="myDropdown">
            <a href="#" class="dropdown_select" data-nav-toggler onclick="toggleDropdown()">
                {{-- {{ route('users.admin') }} --}}
                <span class="material-symbols-outlined">
                    apps
                    </span>
                <h3 class="dark:text-white">Quản lý tài khoản</h3>
                <i class='bx bx-chevron-right' id="icon_right"></i>
            </a>
            <div class="dropdown_list">
                @can('users.admin')
                    <a href="{{ route('users.admin') }}" class="drop-item">
                    <span class="material-symbols-outlined dark:text-white">
                        admin_panel_settings
                    </span>
                        <h3 class="dark:text-white">Quản lý admin</h3>
                    </a>
                @endcan

                @can('users.staff')
                    <a href="{{ route('users.staff') }}" class="drop-item">
                    <span class="material-symbols-outlined dark:text-white">
                        support_agent
                    </span>
                        <h3 class="dark:text-white">Quản lý nhân viên</h3>
                    </a>
                @endcan

                @can('users.customer')
                    <a href="{{ route('users.customer') }}" class="drop-item">
                    <span class="material-symbols-outlined dark:text-white">
                        manage_accounts
                    </span>
                        <h3 class="dark:text-white">Quản lý khách hàng</h3>
                    </a>
                @endcan
            </div>
        </div>

        @can('comments.index')
            <a href="{{ route('comments.index') }}">
            <span class="material-symbols-outlined dark:text-white">
                mark_chat_unread
            </span>
                <h3 class="dark:text-white">Quản lý bình luận</h3>
                @if(App\Models\Comments::count() > 99)
                    <span class="message-count">99+</span>
                @else
                    <span
                        class="message-count">{{ App\Models\Comments::where('deleted_at', null)->count() + App\Models\ReplyComment::where('deleted_at', null)->count() }}</span>
                @endif
            </a>
        @endcan

        @can('roles.index')
            <a href="{{ route('roles.index') }}">
            <span class="material-symbols-outlined dark:text-white">
                verified_user
            </span>
                <h3 class="dark:text-white">Quản lý vai trò</h3>
            </a>
            {{--        <a href="{{ route('permissions.index') }}">--}}
            {{--            <span class="material-symbols-outlined dark:text-white">--}}
            {{--                encrypted--}}
            {{--            </span>--}}
            {{--            <h3 class="dark:text-white">Quản lý quyền</h3>--}}
            {{--        </a>--}}
        @endcan

        @can('category.index')
            <a href="{{ route('category.index') }}">
            <span class="material-symbols-outlined dark:text-white">
                category
            </span>
                <h3 class="dark:text-white">Quản lý danh mục</h3>
            </a>
        @endcan

        @can('courses.index')
            <a href="{{ route('courses.index') }}">
            <span class="material-symbols-outlined dark:text-white">
                auto_stories
            </span>
                <h3 class="dark:text-white">Quản lý khóa học</h3>
            </a>
        @endcan

        @can('chapter.index')
            <a href="{{ route('chapter.index') }}">
            <span class="material-symbols-outlined dark:text-white">
                menu_book
            </span>
                <h3 class="dark:text-white">Quản lý chương học</h3>
            </a>
        @endcan

        @can('lesson.index')
            <a href="{{ route('lesson.index') }}">
            <span class="material-symbols-outlined dark:text-white">
                play_lesson
            </span>
                <h3 class="dark:text-white">Quản lý bài học</h3>
            </a>
        @endcan

        {{-- <a href="{{ route('documents.index') }}">
            <span class="material-symbols-outlined dark:text-white">
                description
            </span>
            <h3 class="dark:text-white">Quản lý tài liệu</h3>
        </a> --}}

        @can('certificate.index')
            <a href="{{ route('certificate.index') }}">
            <span class="material-symbols-outlined dark:text-white">
                workspace_premium
            </span>
                <h3 class="dark:text-white">Quản lý chứng chỉ</h3>
            </a>
        @endcan
        <a href="{{ route('allOrders') }}">
            <span class="material-symbols-outlined">
                history
                </span>
            <h3 class="dark:text-white">Quản lý đơn hàng</h3>
        </a>
        {{--        <a href="{{ route('comments.index') }}">--}}
        {{--            <span class="material-symbols-outlined dark:text-white">--}}
        {{--                add--}}
        {{--            </span>--}}
        {{--            <h3 class="dark:text-white">Comments</h3>--}}
        {{--        </a>--}}
        {{-- <a href="#">
            <span class="material-symbols-outlined">
              logout
        </span>
            <h3>Logout</h3>
        </a> --}}
    </div>

</aside>
