<header class="is-transparent is-dark border-b backdrop-opacity-45"
        uk-sticky="cls-inactive: is-dark is-transparent border-b">
    <div class="header_inner rounded">
        {{--        <div class="left-side backdrop-opacity-90"></div>--}}
        <div class="right-side">
            <!---------------------- Header search box  ------------->
            <div class="header_search">
                <i class='bx bx-search'></i>
{{--                <form id="formSearch" data-url = "{{ route('search') }}" action="{{ route('search') }}">--}}
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <input data-asset="{{asset('')}}" data-url = "{{ route('search') }}" id="searchInput" value="" type="text" class="form-control rounded"
                           placeholder=" Quick search for anything.."
                           autocomplete="off"/>
{{--                </form>--}}
                <div uk-drop="mode: click;offset:10" class="header_search_dropdown">
                    <h4 class="search_title">Recently</h4>
                    <ul id="searchResults" style="overflow: scroll; height: auto; max-height: 400px">
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <img src="{{ asset('images/avatars/avatar-1.jpg') }}" alt=""--}}
{{--                                     class="list-avatar"/>--}}
{{--                                <div class="list-name">--}}
{{--                                    Erica Jones--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            {{-- <div>
                <input type="text" placeholder="Search..." class="input input-bordered border-solid border-2 border-sky-500 w-full max-w-xs" />
            </div> --}}

            <div>
                <!-- -------------------Cart------------ -->
                @if (Route::has('login'))
                    @auth
                        {{-- <a href="#" class="header_widgets">
                            <i  style="font-size:25px"class='bx bx-cart' ></i>
                        </a> --}}
                        <div uk-drop="mode: click" class="dropdown_cart">
                            <div class="cart-headline">
                                My Cart
                                <a href="#" class="checkout">Checkout</a>
                            </div>
                            <ul class="dropdown_cart_scrollbar" data-simplebar>
                                <li>
                                    <div class="cart_avatar">
                                        <img src="{{ asset('images/courses/img-1.jpg') }}" alt=""/>
                                    </div>
                                    <div class="cart_text">
                                        <h4>
                                            Learn Angular Beginner to
                                            Advanced Fundamentals
                                        </h4>
                                    </div>
                                    <div class="cart_price">
                                        <span> $12.99 </span>
                                        <button class="type">Remove</button>
                                    </div>
                                </li>
                            </ul>

                            <div class="cart_footer">
                                <p>Subtotal : $ 320</p>
                                <h1>Total : <strong> $ 320</strong></h1>
                            </div>
                        </div>

                        <!-- --------------------Notification------------- -->
                        {{--                        <a href="#" class="header_widgets">--}}
                        {{--                            <i style="font-size:25px" class='bx bx-bell'></i>--}}
                        {{--                        </a>--}}
                        {{--                        <div uk-drop="mode: click" class="header_dropdown">--}}
                        {{--                            <div class="drop_headline">--}}
                        {{--                                <h4>Notifications</h4>--}}
                        {{--                                <div class="btn_action">--}}
                        {{--                                    <div class="btn_action">--}}
                        {{--                                        <a href="#">--}}
                        {{--                                            <ion-icon name="settings-outline"--}}
                        {{--                                                      uk-tooltip="title: Notifications settings ; pos: left"></ion-icon>--}}
                        {{--                                        </a>--}}
                        {{--                                        <a href="#">--}}
                        {{--                                            <ion-icon name="checkbox-outline"--}}
                        {{--                                                      uk-tooltip="title: Mark as read all ; pos: left"></ion-icon>--}}
                        {{--                                        </a>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <ul class="dropdown_scrollbar" data-simplebar>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#">--}}
                        {{--                                        <div class="drop_avatar">--}}
                        {{--                                            <img src="{{ asset('images/avatars/avatar-1.jpg') }}" alt=""/>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="drop_content">--}}
                        {{--                                            <p>--}}
                        {{--                                                <strong>Adrian Mohani</strong>--}}
                        {{--                                                Like Your Comment On Course--}}
                        {{--                                                <span class="text-link">Javascript Introduction--}}
                        {{--                                        </span>--}}
                        {{--                                            </p>--}}
                        {{--                                            <span class="time-ago">--}}
                        {{--                                        2 hours ago--}}
                        {{--                                    </span>--}}
                        {{--                                        </div>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#">--}}
                        {{--                                        <div class="drop_avatar">--}}
                        {{--                                            <img src="{{ asset('images/avatars/avatar-2.jpg') }}" alt=""/>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="drop_content">--}}
                        {{--                                            <p>--}}
                        {{--                                                <strong>Stella Johnson</strong>--}}
                        {{--                                                Replay Your Comments in--}}
                        {{--                                                <span class="text-link">Programming for--}}
                        {{--                                            Games</span>--}}
                        {{--                                            </p>--}}
                        {{--                                            <span class="time-ago">--}}
                        {{--                                        9 hours ago--}}
                        {{--                                    </span>--}}
                        {{--                                        </div>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                            <a href="#" class="see-all">See all</a>--}}
                        {{--                        </div>--}}

                        {{--                        <!-- -----------------Messages------------- -->--}}
                        {{--                        <a href="#" class="header_widgets">--}}
                        {{--                            <i style="font-size:25px" class='bx bx-chat'></i>--}}
                        {{--                            <span> 2 </span>--}}
                        {{--                        </a>--}}
                        {{--                        <div uk-drop="mode: click" class="header_dropdown">--}}
                        {{--                            <div class="drop_headline">--}}
                        {{--                                <h4>Messages</h4>--}}
                        {{--                                <div class="btn_action">--}}
                        {{--                                    <a href="#">--}}
                        {{--                                        <ion-icon name="settings-outline"--}}
                        {{--                                                  uk-tooltip="title: Message settings ; pos: left"></ion-icon>--}}
                        {{--                                    </a>--}}
                        {{--                                    <a href="#">--}}
                        {{--                                        <ion-icon name="checkbox-outline"--}}
                        {{--                                                  uk-tooltip="title: Mark as read all ; pos: left"></ion-icon>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <ul class="dropdown_scrollbar" data-simplebar>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#">--}}
                        {{--                                        <div class="drop_avatar">--}}
                        {{--                                            <img src="{{ asset('images/avatars/avatar-1.jpg') }}" alt=""/>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="drop_content">--}}
                        {{--                                            <strong> John menathon </strong>--}}
                        {{--                                            <span class="time"> Sun </span>--}}
                        {{--                                            <p>--}}
                        {{--                                                Lorem ipsum dolor sit amet,--}}
                        {{--                                                consectetur--}}
                        {{--                                            </p>--}}
                        {{--                                        </div>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                            <a href="#" class="see-all">See all</a>--}}
                        {{--                        </div>--}}

                        <!-- ---------------------Profile------------------- -->
                        <a href="#">
                            <img src="{{ asset(auth() ->user() -> avatar) }}" class="header_widgets_avatar"
                                 alt=""/>
                        </a>
                        <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
                            <ul>
                                <li>
                                    <a href="{{ route('account.show', auth()->user()->id) }}" class="user">
                                        <div class="user_avatar">
                                            <img src="{{ asset(auth()->user()->avatar) }}" class="header_widgets_avatar" style="width: 100%; height: 100%" alt=""/>
                                        </div>
                                        <div class="user_name" style="margin-left: 15px">
                                            <div>{{ auth()->user()->firstName }} {{ auth()->user()->lastName }}</div>
                                            <span> {{ '@' . auth()->user()->username }} </span>
                                        </div>
                                    </a>
                                </li>
                                {{-- <li>
                                    <hr/>
                                </li> --}}
                                {{-- <li>
                                    <a href="#" class="is-link">
                                        <ion-icon name="rocket-outline" class="is-icon"></ion-icon>
                                        <span> Upgrade Membership </span>
                                    </a>
                                </li> --}}
                                {{-- <li>
                                    <hr/>
                                </li> --}}

                                <li>
                                    <a href="{{ route('account.show', auth()->user()->id) }}">
                                        <ion-icon name="person-circle-outline" class="is-icon"></ion-icon>
                                        My Account
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <ion-icon name="card-outline" class="is-icon"></ion-icon>
                                        Subscriptions
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#">
                                        <ion-icon name="color-wand-outline" class="is-icon"></ion-icon>
                                        My Billing
                                    </a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('account.edit', auth()->user()->id) }}">
                                        <ion-icon name="settings-outline" class="is-icon"></ion-icon>
                                        Account Settings
                                    </a>
                                </li>
                                @if(auth()->check())
                                    @if(auth()->user()->hasAnyRole(['Admin', 'IT - Support', 'Quality Manager', 'Censor', 'Supper Admin']))
                                        <li>
                                            <a href="{{ route('admin.index') }}">
                                                <ion-icon name="dashboard-outline" class="is-icon"></ion-icon>
                                                Admin Dashboard
                                            </a>
                                        </li>
                                    @endif
                                @endif
                                <li>
                                    <hr/>
                                </li>
                                {{-- <li>
                                    <a href="#" id="night-mode" class="btn-night-mode"
                                       onclick="UIkit.notification({ message: 'Hmm...  <strong> Night mode </strong> feature is not available yet. ' , pos: 'bottom-right'  })">
                                        <ion-icon name="moon-outline" class="is-icon"></ion-icon>
                                        Night mode
                                        <span class="btn-night-mode-switch">
                                    <span class="uk-switch-button"></span>
                                </span>
                                    </a>
                                </li> --}}

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            <ion-icon name="log-out-outline" class="is-icon"></ion-icon>
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="flex gap-4">
                            <a href="{{ route('login') }}"
                               class="rounded-md py-3 text-center font-medium text-white lg:px-8 xl:px-6 auth"
                               style="background-color: #007bff; color: white;">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="rounded-md border border-primary py-3 text-center font-medium text-primary lg:px-8 xl:px-6 auth"
                                   style="color: #007bff; border-color: #007bff;">
                                    Register
                                </a>
                            @endif
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>
