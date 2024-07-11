<div class="flex h-full flex-col border-l border-stroke dark:border-strokedark lg:w-4/5">
    <!-- ====== Inbox List Start -->
    <div class="flex flex-col-reverse justify-between gap-6 py-4.5 pl-4 pr-4 sm:flex-row lg:pl-10 lg:pr-7.5">
        <div class="flex items-center gap-4">
            <label for="checkboxAll" class="flex cursor-pointer select-none items-center font-medium">
                <div class="relative">
                    <input type="checkbox" id="checkboxAll" class="tableCheckbox sr-only" />
                    <div
                        class="box flex h-5 w-5 items-center justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2 text-white dark:border-strokedark dark:bg-boxdark-2">
                        <span class="opacity-0">
                            <svg width="14" height="14" viewBox="0 0 10 10">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.62796 2.20602C8.79068 2.36874 8.79068 2.63256 8.62796 2.79528L4.04463 7.37861C3.88191 7.54133 3.61809 7.54133 3.45537 7.37861L1.37204 5.29528C1.20932 5.13256 1.20932 4.86874 1.37204 4.70602C1.53476 4.5433 1.79858 4.5433 1.96129 4.70602L3.75 6.49473L8.03871 2.20602C8.20142 2.0433 8.46524 2.0433 8.62796 2.20602Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
            </label>

            <button>
                <svg class="fill-danger" width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.753 2.47499H11.5874V1.99687C11.5874 1.15312 10.9124 0.478119 10.0687 0.478119H7.90303C7.05928 0.478119 6.38428 1.15312 6.38428 1.99687V2.47499H4.21865C3.40303 2.47499 2.72803 3.14999 2.72803 3.96562V4.80937C2.72803 5.42812 3.09365 5.93437 3.62803 6.15937L4.07803 15.8906C4.13428 16.8187 4.86553 17.5219 5.79365 17.5219H12.1218C13.0499 17.5219 13.8093 16.7906 13.8374 15.8906L14.3437 6.13124C14.878 5.90624 15.2437 5.37187 15.2437 4.78124V3.93749C15.2437 3.14999 14.5687 2.47499 13.753 2.47499ZM7.67803 1.99687C7.67803 1.85624 7.79053 1.74374 7.93115 1.74374H10.0968C10.2374 1.74374 10.3499 1.85624 10.3499 1.99687V2.47499H7.70615V1.99687H7.67803ZM4.02178 3.96562C4.02178 3.85312 4.10615 3.74062 4.24678 3.74062H13.753C13.8655 3.74062 13.978 3.82499 13.978 3.96562V4.80937C13.978 4.92187 13.8937 5.03437 13.753 5.03437H4.24678C4.13428 5.03437 4.02178 4.94999 4.02178 4.80937V3.96562ZM12.1499 16.2562H5.8499C5.59678 16.2562 5.3999 16.0594 5.3999 15.8344L4.9499 6.29999H13.078L12.628 15.8344C12.5999 16.0594 12.403 16.2562 12.1499 16.2562Z"
                        fill="" />
                    <path
                        d="M8.9999 8.74686C8.6624 8.74686 8.35303 9.02811 8.35303 9.39373V13.7531C8.35303 14.0906 8.63428 14.4 8.9999 14.4C9.3374 14.4 9.64678 14.1187 9.64678 13.7531V9.36561C9.64678 9.02811 9.3374 8.74686 8.9999 8.74686Z"
                        fill="" />
                    <path
                        d="M11.6157 9.28124C11.2782 9.25311 10.9688 9.53436 10.9407 9.87186L10.772 13.1062C10.7438 13.4437 11.0251 13.7531 11.3626 13.7812H11.3907C11.7282 13.7812 12.0095 13.5281 12.0095 13.1906L12.1782 9.95624C12.2345 9.59061 11.9532 9.30936 11.6157 9.28124Z"
                        fill="" />
                    <path
                        d="M6.35624 9.28124C6.01874 9.30936 5.73749 9.59061 5.76561 9.95624L5.96249 13.2187C5.99061 13.5562 6.27186 13.8094 6.58124 13.8094H6.60936C6.94686 13.7812 7.22811 13.5 7.19999 13.1344L7.03124 9.87186C7.00311 9.53436 6.69374 9.25311 6.35624 9.28124Z"
                        fill="" />
                </svg>
            </button>

            <button>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.2425 11.024C16.3108 10.6923 16.1139 10.3513 15.7681 10.2587C15.4364 10.1904 15.0954 10.3872 15.0028 10.733C14.5958 12.5593 13.455 14.1273 11.8475 15.0554C8.65669 16.8976 4.58423 15.8064 2.74204 12.6156C0.899853 9.42483 1.99107 5.35236 5.18183 3.51018C7.54446 2.14611 10.4688 2.3738 12.5973 4.03532L11.1853 4.23348C10.8227 4.28044 10.5904 4.60939 10.6477 4.93357C10.6655 5.0207 10.6833 5.10784 10.7115 5.15655C10.838 5.37576 11.0723 5.50031 11.3478 5.47117L14.2729 5.08139C14.6355 5.03442 14.8678 4.70547 14.8105 4.38129L14.4207 1.45617C14.3738 1.09357 14.0448 0.861306 13.7206 0.918566C13.358 0.965531 13.1258 1.29449 13.183 1.61866L13.3428 3.02033C10.8189 1.06754 7.35007 0.796926 4.52466 2.42818C0.749331 4.60786 -0.572129 9.46278 1.62162 13.2625C3.81537 17.0622 8.65622 18.3593 12.4559 16.1655C14.3801 15.0546 15.7672 13.182 16.2425 11.024Z"
                        fill="#98A6AD" />
                </svg>
            </button>

            <div x-data="{ openDropDown: false }" class="relative text-right">
                <button @click="openDropDown = !openDropDown">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.25 11.25C3.49264 11.25 4.5 10.2426 4.5 9C4.5 7.75736 3.49264 6.75 2.25 6.75C1.00736 6.75 0 7.75736 0 9C0 10.2426 1.00736 11.25 2.25 11.25Z"
                            fill="#98A6AD" />
                        <path
                            d="M9 11.25C10.2426 11.25 11.25 10.2426 11.25 9C11.25 7.75736 10.2426 6.75 9 6.75C7.75736 6.75 6.75 7.75736 6.75 9C6.75 10.2426 7.75736 11.25 9 11.25Z"
                            fill="#98A6AD" />
                        <path
                            d="M15.75 11.25C16.9926 11.25 18 10.2426 18 9C18 7.75736 16.9926 6.75 15.75 6.75C14.5074 6.75 13.5 7.75736 13.5 9C13.5 10.2426 14.5074 11.25 15.75 11.25Z"
                            fill="#98A6AD" />
                    </svg>
                </button>
                <div x-show="openDropDown" @click.outside="openDropDown = false"
                    class="absolute left-0 top-full z-40 w-40 space-y-1 rounded border border-stroke bg-white p-2 shadow dark:border-strokedark dark:bg-boxdark">
                    <button class="w-full rounded py-2 px-3 text-left text-sm hover:bg-gray-2 dark:hover:bg-graydark">
                        Edit
                    </button>
                    <button class="w-full rounded py-2 px-3 text-left text-sm hover:bg-gray-2 dark:hover:bg-graydark">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <div class="relative">
            <input type="text" placeholder="Search for user, email address..."
                class="block w-full bg-transparent pl-7 pr-25 font-medium outline-none" />
            <span class="absolute left-0 top-1/2 -translate-y-1/2">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.25 3C5.3505 3 3 5.3505 3 8.25C3 11.1495 5.3505 13.5 8.25 13.5C11.1495 13.5 13.5 11.1495 13.5 8.25C13.5 5.3505 11.1495 3 8.25 3ZM1.5 8.25C1.5 4.52208 4.52208 1.5 8.25 1.5C11.9779 1.5 15 4.52208 15 8.25C15 11.9779 11.9779 15 8.25 15C4.52208 15 1.5 11.9779 1.5 8.25Z"
                        fill="#637381" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.9572 11.9572C12.2501 11.6643 12.7249 11.6643 13.0178 11.9572L16.2803 15.2197C16.5732 15.5126 16.5732 15.9874 16.2803 16.2803C15.9874 16.5732 15.5126 16.5732 15.2197 16.2803L11.9572 13.0178C11.6643 12.7249 11.6643 12.2501 11.9572 11.9572Z"
                        fill="#637381" />
                </svg>
            </span>
            <button class="absolute right-0 top-1/2 -translate-y-1/2">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3018_1095)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.25 3C8.25 3.41421 7.91421 3.75 7.5 3.75L2.25 3.75C1.83578 3.75 1.5 3.41421 1.5 3C1.5 2.58579 1.83578 2.25 2.25 2.25L7.5 2.25C7.91421 2.25 8.25 2.58579 8.25 3Z"
                            fill="#637381" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.5 3C16.5 3.41421 16.1642 3.75 15.75 3.75L10.5 3.75C10.0858 3.75 9.75 3.41421 9.75 3C9.75 2.58579 10.0858 2.25 10.5 2.25L15.75 2.25C16.1642 2.25 16.5 2.58579 16.5 3Z"
                            fill="#637381" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.75 9C9.75 9.41421 9.41421 9.75 9 9.75L2.25 9.75C1.83579 9.75 1.5 9.41421 1.5 9C1.5 8.58579 1.83579 8.25 2.25 8.25L9 8.25C9.41421 8.25 9.75 8.58579 9.75 9Z"
                            fill="#637381" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.5 9C16.5 9.41421 16.1642 9.75 15.75 9.75L12 9.75C11.5858 9.75 11.25 9.41421 11.25 9C11.25 8.58579 11.5858 8.25 12 8.25L15.75 8.25C16.1642 8.25 16.5 8.58579 16.5 9Z"
                            fill="#637381" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.75 15C6.75 15.4142 6.41421 15.75 6 15.75L2.25 15.75C1.83578 15.75 1.5 15.4142 1.5 15C1.5 14.5858 1.83578 14.25 2.25 14.25L6 14.25C6.41421 14.25 6.75 14.5858 6.75 15Z"
                            fill="#637381" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.5 15C16.5 15.4142 16.1642 15.75 15.75 15.75L9 15.75C8.58579 15.75 8.25 15.4142 8.25 15C8.25 14.5858 8.58579 14.25 9 14.25L15.75 14.25C16.1642 14.25 16.5 14.5858 16.5 15Z"
                            fill="#637381" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.5 -3.27835e-08C7.91421 -1.46777e-08 8.25 0.335786 8.25 0.75L8.25 5.25C8.25 5.66421 7.91421 6 7.5 6C7.08579 6 6.75 5.66421 6.75 5.25L6.75 0.75C6.75 0.335786 7.08579 -5.08894e-08 7.5 -3.27835e-08Z"
                            fill="#637381" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 6C12.4142 6 12.75 6.33579 12.75 6.75L12.75 11.25C12.75 11.6642 12.4142 12 12 12C11.5858 12 11.25 11.6642 11.25 11.25L11.25 6.75C11.25 6.33579 11.5858 6 12 6Z"
                            fill="#637381" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6 12C6.41421 12 6.75 12.3358 6.75 12.75L6.75 17.25C6.75 17.6642 6.41421 18 6 18C5.58579 18 5.25 17.6642 5.25 17.25L5.25 12.75C5.25 12.3358 5.58579 12 6 12Z"
                            fill="#637381" />
                    </g>
                    <defs>
                        <clipPath id="clip0_3018_1095">
                            <rect width="18" height="18" fill="white"
                                transform="translate(18) rotate(90)" />
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
    </div>

    <div class="h-full">
        <table class="h-full w-full table-auto">
            <thead>
                <tr class="flex border-y border-stroke dark:border-strokedark">
                    <th class="w-[65%] py-6 pl-4 pr-4 lg:pl-10 xl:w-1/4">
                        <label for="checkbox-1" class="flex cursor-pointer select-none items-center font-medium">
                            <div class="relative">
                                <input type="checkbox" id="checkbox-1" class="tableCheckbox sr-only" />
                                <div
                                    class="box mr-4 flex h-5 w-5 items-center justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2 text-white dark:border-strokedark dark:bg-boxdark-2">
                                    <span class="opacity-0">
                                        <svg width="14" height="14" viewBox="0 0 10 10">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.62796 2.20602C8.79068 2.36874 8.79068 2.63256 8.62796 2.79528L4.04463 7.37861C3.88191 7.54133 3.61809 7.54133 3.45537 7.37861L1.37204 5.29528C1.20932 5.13256 1.20932 4.86874 1.37204 4.70602C1.53476 4.5433 1.79858 4.5433 1.96129 4.70602L3.75 6.49473L8.03871 2.20602C8.20142 2.0433 8.46524 2.0433 8.62796 2.20602Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            Sender
                        </label>
                    </th>
                    <th class="hidden w-3/5 py-6 px-4 xl:block">
                        <p class="text-left font-medium">Subject</p>
                    </th>
                    <th class="w-[35%] py-6 pl-4 pr-4 lg:pr-10 xl:w-[20%]">
                        <p class="text-right font-medium">Date</p>
                    </th>
                </tr>
            </thead>
            <tbody class="block h-full max-h-full overflow-auto py-4">
                <tr class="flex cursor-pointer items-center hover:bg-whiten dark:hover:bg-boxdark-2">
                    <td class="w-[65%] py-4 pl-4 pr-4 lg:pl-10 xl:w-1/4">
                        <label for="checkbox-2"
                            class="flex cursor-pointer select-none items-center text-sm font-medium sm:text-base">
                            <div class="relative">
                                <input type="checkbox" id="checkbox-2" class="tableCheckbox sr-only" />
                                <div
                                    class="box mr-4 flex h-5 w-5 items-center justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2 text-white dark:border-strokedark dark:bg-boxdark-2">
                                    <span class="opacity-0">
                                        <svg width="14" height="14" viewBox="0 0 10 10">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.62796 2.20602C8.79068 2.36874 8.79068 2.63256 8.62796 2.79528L4.04463 7.37861C3.88191 7.54133 3.61809 7.54133 3.45537 7.37861L1.37204 5.29528C1.20932 5.13256 1.20932 4.86874 1.37204 4.70602C1.53476 4.5433 1.79858 4.5433 1.96129 4.70602L3.75 6.49473L8.03871 2.20602C8.20142 2.0433 8.46524 2.0433 8.62796 2.20602Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <span class="pr-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1034 3.81714C11.4703 3.07397 12.53 3.07397 12.8968 3.81714L14.8577 7.7896C15.0032 8.08445 15.2844 8.28891 15.6098 8.33646L19.9964 8.97763C20.8163 9.09747 21.1431 10.1053 20.5495 10.6835L17.3769 13.7735C17.1411 14.0033 17.0334 14.3344 17.0891 14.6589L17.8376 19.0231C17.9777 19.8401 17.1201 20.4631 16.3865 20.0773L12.4656 18.0153C12.1742 17.8621 11.8261 17.8621 11.5347 18.0153L7.61377 20.0773C6.88014 20.4631 6.02259 19.8401 6.16271 19.0231L6.91122 14.6589C6.96689 14.3344 6.85922 14.0033 6.62335 13.7735L3.45082 10.6835C2.85722 10.1053 3.18401 9.09747 4.00392 8.97763L8.39051 8.33646C8.71586 8.28891 8.99704 8.08445 9.14258 7.7896L11.1034 3.81714Z"
                                        fill="#FFD02C" />
                                </svg>
                            </span>
                            Musharof Chowdhury
                        </label>
                    </td>
                    <td class="hidden w-3/5 p-4 xl:block">
                        <p>
                            Some note & Lorem Ipsum available alteration in
                            some form.
                        </p>
                    </td>
                    <td class="w-[35%] py-4 pl-4 pr-4 lg:pr-10 xl:w-[20%]">
                        <p class="text-right text-xs xl:text-base">
                            17 Oct, 2024
                        </p>
                    </td>
                </tr>
                <tr class="flex cursor-pointer items-center hover:bg-whiten dark:hover:bg-boxdark-2">
                    <td class="w-[65%] py-4 pl-4 pr-4 lg:pl-10 xl:w-1/4">
                        <label for="checkbox-3"
                            class="flex cursor-pointer select-none items-center text-sm font-medium sm:text-base">
                            <div class="relative">
                                <input type="checkbox" id="checkbox-3" class="tableCheckbox sr-only" />
                                <div
                                    class="box mr-4 flex h-5 w-5 items-center justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2 text-white dark:border-strokedark dark:bg-boxdark-2">
                                    <span class="opacity-0">
                                        <svg width="14" height="14" viewBox="0 0 10 10">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.62796 2.20602C8.79068 2.36874 8.79068 2.63256 8.62796 2.79528L4.04463 7.37861C3.88191 7.54133 3.61809 7.54133 3.45537 7.37861L1.37204 5.29528C1.20932 5.13256 1.20932 4.86874 1.37204 4.70602C1.53476 4.5433 1.79858 4.5433 1.96129 4.70602L3.75 6.49473L8.03871 2.20602C8.20142 2.0433 8.46524 2.0433 8.62796 2.20602Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <span class="pr-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1034 3.81714C11.4703 3.07397 12.53 3.07397 12.8968 3.81714L14.8577 7.7896C15.0032 8.08445 15.2844 8.28891 15.6098 8.33646L19.9964 8.97763C20.8163 9.09747 21.1431 10.1053 20.5495 10.6835L17.3769 13.7735C17.1411 14.0033 17.0334 14.3344 17.0891 14.6589L17.8376 19.0231C17.9777 19.8401 17.1201 20.4631 16.3865 20.0773L12.4656 18.0153C12.1742 17.8621 11.8261 17.8621 11.5347 18.0153L7.61377 20.0773C6.88014 20.4631 6.02259 19.8401 6.16271 19.0231L6.91122 14.6589C6.96689 14.3344 6.85922 14.0033 6.62335 13.7735L3.45082 10.6835C2.85722 10.1053 3.18401 9.09747 4.00392 8.97763L8.39051 8.33646C8.71586 8.28891 8.99704 8.08445 9.14258 7.7896L11.1034 3.81714Z"
                                        fill="#E5E7EE" />
                                </svg>
                            </span>
                            Naimur Rahman
                        </label>
                    </td>
                    <td class="hidden w-3/5 p-4 xl:block">
                        <p>
                            Lorem Ipsum available alteration in some form.
                        </p>
                    </td>
                    <td class="w-[35%] py-4 pl-4 pr-4 lg:pr-10 xl:w-[20%]">
                        <p class="text-right text-xs xl:text-base">
                            25 Nov, 2024
                        </p>
                    </td>
                </tr>
                <tr class="flex cursor-pointer items-center hover:bg-whiten dark:hover:bg-boxdark-2">
                    <td class="w-[65%] py-4 pl-4 pr-4 lg:pl-10 xl:w-1/4">
                        <label for="checkbox-4"
                            class="flex cursor-pointer select-none items-center text-sm font-medium sm:text-base">
                            <div class="relative">
                                <input type="checkbox" id="checkbox-4" class="tableCheckbox sr-only" />
                                <div
                                    class="box mr-4 flex h-5 w-5 items-center justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2 text-white dark:border-strokedark dark:bg-boxdark-2">
                                    <span class="opacity-0">
                                        <svg width="14" height="14" viewBox="0 0 10 10">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.62796 2.20602C8.79068 2.36874 8.79068 2.63256 8.62796 2.79528L4.04463 7.37861C3.88191 7.54133 3.61809 7.54133 3.45537 7.37861L1.37204 5.29528C1.20932 5.13256 1.20932 4.86874 1.37204 4.70602C1.53476 4.5433 1.79858 4.5433 1.96129 4.70602L3.75 6.49473L8.03871 2.20602C8.20142 2.0433 8.46524 2.0433 8.62796 2.20602Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <span class="pr-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1034 3.81714C11.4703 3.07397 12.53 3.07397 12.8968 3.81714L14.8577 7.7896C15.0032 8.08445 15.2844 8.28891 15.6098 8.33646L19.9964 8.97763C20.8163 9.09747 21.1431 10.1053 20.5495 10.6835L17.3769 13.7735C17.1411 14.0033 17.0334 14.3344 17.0891 14.6589L17.8376 19.0231C17.9777 19.8401 17.1201 20.4631 16.3865 20.0773L12.4656 18.0153C12.1742 17.8621 11.8261 17.8621 11.5347 18.0153L7.61377 20.0773C6.88014 20.4631 6.02259 19.8401 6.16271 19.0231L6.91122 14.6589C6.96689 14.3344 6.85922 14.0033 6.62335 13.7735L3.45082 10.6835C2.85722 10.1053 3.18401 9.09747 4.00392 8.97763L8.39051 8.33646C8.71586 8.28891 8.99704 8.08445 9.14258 7.7896L11.1034 3.81714Z"
                                        fill="#E5E7EE" />
                                </svg>
                            </span>
                            Juhan Ahamed
                        </label>
                    </td>
                    <td class="hidden w-3/5 p-4 xl:block">
                        <p>
                            Lorem Ipsum available alteration in some form.
                        </p>
                    </td>
                    <td class="w-[35%] py-4 pl-4 pr-4 lg:pr-10 xl:w-[20%]">
                        <p class="text-right text-xs xl:text-base">
                            25 Nov, 2024
                        </p>
                    </td>
                </tr>
                <tr class="flex cursor-pointer items-center hover:bg-whiten dark:hover:bg-boxdark-2">
                    <td class="w-[65%] py-4 pl-4 pr-4 lg:pl-10 xl:w-1/4">
                        <label for="checkbox-5"
                            class="flex cursor-pointer select-none items-center text-sm font-medium sm:text-base">
                            <div class="relative">
                                <input type="checkbox" id="checkbox-5" class="tableCheckbox sr-only" />
                                <div
                                    class="box mr-4 flex h-5 w-5 items-center justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2 text-white dark:border-strokedark dark:bg-boxdark-2">
                                    <span class="opacity-0">
                                        <svg width="14" height="14" viewBox="0 0 10 10">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.62796 2.20602C8.79068 2.36874 8.79068 2.63256 8.62796 2.79528L4.04463 7.37861C3.88191 7.54133 3.61809 7.54133 3.45537 7.37861L1.37204 5.29528C1.20932 5.13256 1.20932 4.86874 1.37204 4.70602C1.53476 4.5433 1.79858 4.5433 1.96129 4.70602L3.75 6.49473L8.03871 2.20602C8.20142 2.0433 8.46524 2.0433 8.62796 2.20602Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <span class="pr-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1034 3.81714C11.4703 3.07397 12.53 3.07397 12.8968 3.81714L14.8577 7.7896C15.0032 8.08445 15.2844 8.28891 15.6098 8.33646L19.9964 8.97763C20.8163 9.09747 21.1431 10.1053 20.5495 10.6835L17.3769 13.7735C17.1411 14.0033 17.0334 14.3344 17.0891 14.6589L17.8376 19.0231C17.9777 19.8401 17.1201 20.4631 16.3865 20.0773L12.4656 18.0153C12.1742 17.8621 11.8261 17.8621 11.5347 18.0153L7.61377 20.0773C6.88014 20.4631 6.02259 19.8401 6.16271 19.0231L6.91122 14.6589C6.96689 14.3344 6.85922 14.0033 6.62335 13.7735L3.45082 10.6835C2.85722 10.1053 3.18401 9.09747 4.00392 8.97763L8.39051 8.33646C8.71586 8.28891 8.99704 8.08445 9.14258 7.7896L11.1034 3.81714Z"
                                        fill="#E5E7EE" />
                                </svg>
                            </span>
                            Mahbub Hasan
                        </label>
                    </td>
                    <td class="hidden w-3/5 p-4 xl:block">
                        <p>
                            Lorem Ipsum available alteration in some form.
                        </p>
                    </td>
                    <td class="w-[35%] py-4 pl-4 pr-4 lg:pr-10 xl:w-[20%]">
                        <p class="text-right text-xs xl:text-base">
                            19 Dec, 2024
                        </p>
                    </td>
                </tr>
                <tr class="flex cursor-pointer items-center hover:bg-whiten dark:hover:bg-boxdark-2">
                    <td class="w-[65%] py-4 pl-4 pr-4 lg:pl-10 xl:w-1/4">
                        <label for="checkbox-6"
                            class="flex cursor-pointer select-none items-center text-sm font-medium sm:text-base">
                            <div class="relative">
                                <input type="checkbox" id="checkbox-6" class="tableCheckbox sr-only" />
                                <div
                                    class="box mr-4 flex h-5 w-5 items-center justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2 text-white dark:border-strokedark dark:bg-boxdark-2">
                                    <span class="opacity-0">
                                        <svg width="14" height="14" viewBox="0 0 10 10">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.62796 2.20602C8.79068 2.36874 8.79068 2.63256 8.62796 2.79528L4.04463 7.37861C3.88191 7.54133 3.61809 7.54133 3.45537 7.37861L1.37204 5.29528C1.20932 5.13256 1.20932 4.86874 1.37204 4.70602C1.53476 4.5433 1.79858 4.5433 1.96129 4.70602L3.75 6.49473L8.03871 2.20602C8.20142 2.0433 8.46524 2.0433 8.62796 2.20602Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <span class="pr-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1034 3.81714C11.4703 3.07397 12.53 3.07397 12.8968 3.81714L14.8577 7.7896C15.0032 8.08445 15.2844 8.28891 15.6098 8.33646L19.9964 8.97763C20.8163 9.09747 21.1431 10.1053 20.5495 10.6835L17.3769 13.7735C17.1411 14.0033 17.0334 14.3344 17.0891 14.6589L17.8376 19.0231C17.9777 19.8401 17.1201 20.4631 16.3865 20.0773L12.4656 18.0153C12.1742 17.8621 11.8261 17.8621 11.5347 18.0153L7.61377 20.0773C6.88014 20.4631 6.02259 19.8401 6.16271 19.0231L6.91122 14.6589C6.96689 14.3344 6.85922 14.0033 6.62335 13.7735L3.45082 10.6835C2.85722 10.1053 3.18401 9.09747 4.00392 8.97763L8.39051 8.33646C8.71586 8.28891 8.99704 8.08445 9.14258 7.7896L11.1034 3.81714Z"
                                        fill="#E5E7EE" />
                                </svg>
                            </span>
                            Shafiq Hammad
                        </label>
                    </td>
                    <td class="hidden w-3/5 p-4 xl:block">
                        <p>
                            Lorem Ipsum available alteration in some form.
                        </p>
                    </td>
                    <td class="w-[35%] py-4 pl-4 pr-4 lg:pr-10 xl:w-[20%]">
                        <p class="text-right text-xs xl:text-base">
                            20 Dec, 2024
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex items-center justify-between border-t border-stroke p-4 dark:border-strokedark sm:px-6">
        <p class="text-base font-medium text-black dark:text-white md:text-lg">
            1-5 of 29
        </p>
        <div class="flex items-center justify-end space-x-3">
            <button
                class="flex h-7.5 w-7.5 items-center justify-center rounded border border-stroke bg-whiten hover:border-primary hover:bg-primary hover:text-white">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.25 10C14.8023 10 15.25 9.55228 15.25 9C15.25 8.44771 14.8023 8 14.25 8L14.25 10ZM3.75 9L3.04289 8.29289C2.65237 8.68342 2.65237 9.31658 3.04289 9.70711L3.75 9ZM8.29289 14.9571C8.68342 15.3476 9.31658 15.3476 9.70711 14.9571C10.0976 14.5666 10.0976 13.9334 9.70711 13.5429L8.29289 14.9571ZM9.7071 4.45711C10.0976 4.06658 10.0976 3.43342 9.7071 3.04289C9.31658 2.65237 8.68342 2.65237 8.29289 3.04289L9.7071 4.45711ZM14.25 8L3.75 8L3.75 10L14.25 10L14.25 8ZM9.70711 13.5429L4.4571 8.29289L3.04289 9.70711L8.29289 14.9571L9.70711 13.5429ZM4.4571 9.70711L9.7071 4.45711L8.29289 3.04289L3.04289 8.29289L4.4571 9.70711Z"
                        fill="currentColor" />
                </svg>
            </button>
            <button
                class="flex h-7.5 w-7.5 items-center justify-center rounded border border-stroke bg-whiten hover:border-primary hover:bg-primary hover:text-white">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3.75 8C3.19772 8 2.75 8.44772 2.75 9C2.75 9.55229 3.19772 10 3.75 10V8ZM14.25 9L14.9571 9.70711C15.3476 9.31658 15.3476 8.68342 14.9571 8.29289L14.25 9ZM9.70711 3.04289C9.31658 2.65237 8.68342 2.65237 8.29289 3.04289C7.90237 3.43342 7.90237 4.06658 8.29289 4.45711L9.70711 3.04289ZM8.29289 13.5429C7.90237 13.9334 7.90237 14.5666 8.29289 14.9571C8.68342 15.3476 9.31658 15.3476 9.70711 14.9571L8.29289 13.5429ZM3.75 10H14.25V8H3.75V10ZM8.29289 4.45711L13.5429 9.70711L14.9571 8.29289L9.70711 3.04289L8.29289 4.45711ZM13.5429 8.29289L8.29289 13.5429L9.70711 14.9571L14.9571 9.70711L13.5429 8.29289Z"
                        fill="currentColor" />
                </svg>
            </button>
        </div>
    </div>
    <!-- ====== Inbox List End -->
</div>
