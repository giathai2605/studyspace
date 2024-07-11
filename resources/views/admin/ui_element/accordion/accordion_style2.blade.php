<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-4 py-4 dark:border-strokedark sm:px-6 xl:px-7.5">
        <h3 class="font-medium text-black dark:text-white">
            Accordions Style 2
        </h3>
    </div>

    <div class="p-4 sm:p-6 xl:p-12.5">
        <div class="flex flex-col gap-7.5">
            <!-- Accordion Item -->
            <div x-data="{ accordionOpen: false }" @click.outside="accordionOpen = false"
                class="rounded-md border border-stroke p-4 shadow-9 dark:border-strokedark dark:shadow-none md:p-6 xl:p-7.5">
                <button @click="accordionOpen = !accordionOpen" class="flex w-full items-center justify-between gap-2">
                    <div>
                        <h4 class="text-left text-title-xsm font-bold text-black dark:text-white sm:text-title-md">
                            Can I use TailGrids Pro for my clients projects?
                        </h4>
                    </div>

                    <div
                        class="flex h-9 w-full max-w-9 items-center justify-center rounded-full border border-primary dark:border-white">
                        <svg :class="accordionOpen && 'hidden'" class="fill-primary dark:fill-white" width="15"
                            height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.2969 6.51563H8.48438V1.70312C8.48438 1.15625 8.04688 0.773438 7.5 0.773438C6.95313 0.773438 6.57031 1.21094 6.57031 1.75781V6.57031H1.75781C1.21094 6.57031 0.828125 7.00781 0.828125 7.55469C0.828125 8.10156 1.26563 8.48438 1.8125 8.48438H6.625V13.2969C6.625 13.8438 7.0625 14.2266 7.60938 14.2266C8.15625 14.2266 8.53906 13.7891 8.53906 13.2422V8.42969H13.3516C13.8984 8.42969 14.2813 7.99219 14.2813 7.44531C14.2266 6.95312 13.7891 6.51563 13.2969 6.51563Z"
                                fill="" />
                        </svg>

                        <svg :class="accordionOpen === true ? 'block' : 'hidden'" class="fill-primary dark:fill-white"
                            width="15" height="3" viewBox="0 0 15 3" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.503 0.447144C13.446 0.447144 13.503 0.447144 13.503 0.447144H1.49482C0.925718 0.447144 0.527344 0.902427 0.527344 1.47153C0.527344 2.04064 0.982629 2.43901 1.55173 2.43901H13.5599C14.129 2.43901 14.5273 1.98373 14.5273 1.41462C14.4704 0.902427 14.0151 0.447144 13.503 0.447144Z"
                                fill="" />
                        </svg>
                    </div>
                </button>

                <div x-show="accordionOpen" class="mt-5 duration-200 ease-in-out">
                    <p class="max-w-[830px] font-medium">
                        There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration
                        in some form, by injected humour, or randomised words
                        which don't look even slightly believable. If you are
                        going to use a passage of Lorem Ipsum, you need to be
                        sure there isn't anything.
                    </p>
                </div>
            </div>

            <!-- Accordion Item -->
            <div x-data="{ accordionOpen: false }" @click.outside="accordionOpen = false"
                class="rounded-md border border-stroke p-4 shadow-9 dark:border-strokedark dark:shadow-none md:p-6 xl:p-7.5">
                <button @click="accordionOpen = !accordionOpen" class="flex w-full items-center justify-between gap-2">
                    <div>
                        <h4 class="text-left text-title-xsm font-bold text-black dark:text-white sm:text-title-md">
                            Which license type is suitable for me?
                        </h4>
                    </div>

                    <div
                        class="flex h-9 w-full max-w-9 items-center justify-center rounded-full border border-primary dark:border-white">
                        <svg :class="accordionOpen && 'hidden'" class="fill-primary dark:fill-white" width="15"
                            height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.2969 6.51563H8.48438V1.70312C8.48438 1.15625 8.04688 0.773438 7.5 0.773438C6.95313 0.773438 6.57031 1.21094 6.57031 1.75781V6.57031H1.75781C1.21094 6.57031 0.828125 7.00781 0.828125 7.55469C0.828125 8.10156 1.26563 8.48438 1.8125 8.48438H6.625V13.2969C6.625 13.8438 7.0625 14.2266 7.60938 14.2266C8.15625 14.2266 8.53906 13.7891 8.53906 13.2422V8.42969H13.3516C13.8984 8.42969 14.2813 7.99219 14.2813 7.44531C14.2266 6.95312 13.7891 6.51563 13.2969 6.51563Z"
                                fill="" />
                        </svg>

                        <svg :class="accordionOpen === true ? 'block' : 'hidden'" class="fill-primary dark:fill-white"
                            width="15" height="3" viewBox="0 0 15 3" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.503 0.447144C13.446 0.447144 13.503 0.447144 13.503 0.447144H1.49482C0.925718 0.447144 0.527344 0.902427 0.527344 1.47153C0.527344 2.04064 0.982629 2.43901 1.55173 2.43901H13.5599C14.129 2.43901 14.5273 1.98373 14.5273 1.41462C14.4704 0.902427 14.0151 0.447144 13.503 0.447144Z"
                                fill="" />
                        </svg>
                    </div>
                </button>

                <div x-show="accordionOpen" class="mt-5 duration-200 ease-in-out">
                    <p class="max-w-[830px] font-medium">
                        There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration
                        in some form, by injected humour, or randomised words
                        which don't look even slightly believable. If you are
                        going to use a passage of Lorem Ipsum, you need to be
                        sure there isn't anything.
                    </p>
                </div>
            </div>

            <!-- Accordion Item -->
            <div x-data="{ accordionOpen: false }" @click.outside="accordionOpen = false"
                class="rounded-md border border-stroke p-4 shadow-9 dark:border-strokedark dark:shadow-none md:p-6 xl:p-7.5">
                <button @click="accordionOpen = !accordionOpen" class="flex w-full items-center justify-between gap-2">
                    <div>
                        <h4 class="text-left text-title-xsm font-bold text-black dark:text-white sm:text-title-md">
                            Is Windy UI Well-documented?
                        </h4>
                    </div>

                    <div
                        class="flex h-9 w-full max-w-9 items-center justify-center rounded-full border border-primary dark:border-white">
                        <svg :class="accordionOpen && 'hidden'" class="fill-primary dark:fill-white" width="15"
                            height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.2969 6.51563H8.48438V1.70312C8.48438 1.15625 8.04688 0.773438 7.5 0.773438C6.95313 0.773438 6.57031 1.21094 6.57031 1.75781V6.57031H1.75781C1.21094 6.57031 0.828125 7.00781 0.828125 7.55469C0.828125 8.10156 1.26563 8.48438 1.8125 8.48438H6.625V13.2969C6.625 13.8438 7.0625 14.2266 7.60938 14.2266C8.15625 14.2266 8.53906 13.7891 8.53906 13.2422V8.42969H13.3516C13.8984 8.42969 14.2813 7.99219 14.2813 7.44531C14.2266 6.95312 13.7891 6.51563 13.2969 6.51563Z"
                                fill="" />
                        </svg>

                        <svg :class="accordionOpen === true ? 'block' : 'hidden'" class="fill-primary dark:fill-white"
                            width="15" height="3" viewBox="0 0 15 3" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.503 0.447144C13.446 0.447144 13.503 0.447144 13.503 0.447144H1.49482C0.925718 0.447144 0.527344 0.902427 0.527344 1.47153C0.527344 2.04064 0.982629 2.43901 1.55173 2.43901H13.5599C14.129 2.43901 14.5273 1.98373 14.5273 1.41462C14.4704 0.902427 14.0151 0.447144 13.503 0.447144Z"
                                fill="" />
                        </svg>
                    </div>
                </button>

                <div x-show="accordionOpen" class="mt-5 duration-200 ease-in-out">
                    <p class="max-w-[830px] font-medium">
                        There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration
                        in some form, by injected humour, or randomised words
                        which don't look even slightly believable. If you are
                        going to use a passage of Lorem Ipsum, you need to be
                        sure there isn't anything.
                    </p>
                </div>
            </div>

            <!-- Accordion Item -->
            <div x-data="{ accordionOpen: false }" @click.outside="accordionOpen = false"
                class="rounded-md border border-stroke p-4 shadow-9 dark:border-strokedark dark:shadow-none md:p-6 xl:p-7.5">
                <button @click="accordionOpen = !accordionOpen" class="flex w-full items-center justify-between gap-2">
                    <div>
                        <h4 class="text-left text-title-xsm font-bold text-black dark:text-white sm:text-title-md">
                            Do you provide support?
                        </h4>
                    </div>

                    <div
                        class="flex h-9 w-full max-w-9 items-center justify-center rounded-full border border-primary dark:border-white">
                        <svg :class="accordionOpen && 'hidden'" class="fill-primary dark:fill-white" width="15"
                            height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.2969 6.51563H8.48438V1.70312C8.48438 1.15625 8.04688 0.773438 7.5 0.773438C6.95313 0.773438 6.57031 1.21094 6.57031 1.75781V6.57031H1.75781C1.21094 6.57031 0.828125 7.00781 0.828125 7.55469C0.828125 8.10156 1.26563 8.48438 1.8125 8.48438H6.625V13.2969C6.625 13.8438 7.0625 14.2266 7.60938 14.2266C8.15625 14.2266 8.53906 13.7891 8.53906 13.2422V8.42969H13.3516C13.8984 8.42969 14.2813 7.99219 14.2813 7.44531C14.2266 6.95312 13.7891 6.51563 13.2969 6.51563Z"
                                fill="" />
                        </svg>

                        <svg :class="accordionOpen === true ? 'block' : 'hidden'" class="fill-primary dark:fill-white"
                            width="15" height="3" viewBox="0 0 15 3" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.503 0.447144C13.446 0.447144 13.503 0.447144 13.503 0.447144H1.49482C0.925718 0.447144 0.527344 0.902427 0.527344 1.47153C0.527344 2.04064 0.982629 2.43901 1.55173 2.43901H13.5599C14.129 2.43901 14.5273 1.98373 14.5273 1.41462C14.4704 0.902427 14.0151 0.447144 13.503 0.447144Z"
                                fill="" />
                        </svg>
                    </div>
                </button>

                <div x-show="accordionOpen" class="mt-5 duration-200 ease-in-out">
                    <p class="max-w-[830px] font-medium">
                        There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration
                        in some form, by injected humour, or randomised words
                        which don't look even slightly believable. If you are
                        going to use a passage of Lorem Ipsum, you need to be
                        sure there isn't anything.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
