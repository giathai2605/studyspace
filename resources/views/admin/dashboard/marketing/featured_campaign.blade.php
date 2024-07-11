<div
    class="col-span-12 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-6">
    <div class="flex items-start justify-between border-b border-stroke py-5 px-6 dark:border-strokedark">
        <div>
            <h2 class="mb-1.5 text-title-md2 font-bold text-black dark:text-white">
                Featured Campaigns
            </h2>
            <p class="text-sm font-medium">75% activity growth</p>
        </div>
        <div x-data="{ openDropDown: false }" class="relative">
            <button @click="openDropDown = !openDropDown">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-sm border border-stroke bg-white p-1.5 shadow-default dark:border-strokedark dark:bg-boxdark">
                <button
                    class="flex w-full items-center gap-2 rounded-sm py-1.5 px-4 text-left text-sm hover:bg-gray dark:hover:bg-meta-4">
                    <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_62_9787)">
                            <path
                                d="M15.55 2.97499C15.55 2.77499 15.475 2.57499 15.325 2.42499C15.025 2.12499 14.725 1.82499 14.45 1.52499C14.175 1.24999 13.925 0.974987 13.65 0.724987C13.525 0.574987 13.375 0.474986 13.175 0.449986C12.95 0.424986 12.75 0.474986 12.575 0.624987L10.875 2.32499H2.02495C1.17495 2.32499 0.449951 3.02499 0.449951 3.89999V14C0.449951 14.85 1.14995 15.575 2.02495 15.575H12.15C13 15.575 13.725 14.875 13.725 14V5.12499L15.35 3.49999C15.475 3.34999 15.55 3.17499 15.55 2.97499ZM8.19995 8.99999C8.17495 9.02499 8.17495 9.02499 8.14995 9.02499L6.34995 9.62499L6.94995 7.82499C6.94995 7.79999 6.97495 7.79999 6.97495 7.77499L11.475 3.27499L12.725 4.49999L8.19995 8.99999ZM12.575 14C12.575 14.25 12.375 14.45 12.125 14.45H2.02495C1.77495 14.45 1.57495 14.25 1.57495 14V3.87499C1.57495 3.62499 1.77495 3.42499 2.02495 3.42499H9.72495L6.17495 6.99999C6.04995 7.12499 5.92495 7.29999 5.87495 7.49999L4.94995 10.3C4.87495 10.5 4.92495 10.675 5.02495 10.85C5.09995 10.95 5.24995 11.1 5.52495 11.1H5.62495L8.49995 10.15C8.67495 10.1 8.84995 9.97499 8.97495 9.84999L12.575 6.24999V14ZM13.5 3.72499L12.25 2.49999L13.025 1.72499C13.225 1.92499 14.05 2.74999 14.25 2.97499L13.5 3.72499Z"
                                fill="" />
                        </g>
                        <defs>
                            <clipPath id="clip0_62_9787">
                                <rect width="16" height="16" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    Edit
                </button>
                <button
                    class="flex w-full items-center gap-2 rounded-sm py-1.5 px-4 text-left text-sm hover:bg-gray dark:hover:bg-meta-4">
                    <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.225 2.20005H10.3V1.77505C10.3 1.02505 9.70005 0.425049 8.95005 0.425049H7.02505C6.27505 0.425049 5.67505 1.02505 5.67505 1.77505V2.20005H3.75005C3.02505 2.20005 2.42505 2.80005 2.42505 3.52505V4.27505C2.42505 4.82505 2.75005 5.27505 3.22505 5.47505L3.62505 13.75C3.67505 14.775 4.52505 15.575 5.55005 15.575H10.4C11.425 15.575 12.275 14.775 12.325 13.75L12.75 5.45005C13.225 5.25005 13.55 4.77505 13.55 4.25005V3.50005C13.55 2.80005 12.95 2.20005 12.225 2.20005ZM6.82505 1.77505C6.82505 1.65005 6.92505 1.55005 7.05005 1.55005H8.97505C9.10005 1.55005 9.20005 1.65005 9.20005 1.77505V2.20005H6.85005V1.77505H6.82505ZM3.57505 3.52505C3.57505 3.42505 3.65005 3.32505 3.77505 3.32505H12.225C12.325 3.32505 12.425 3.40005 12.425 3.52505V4.27505C12.425 4.37505 12.35 4.47505 12.225 4.47505H3.77505C3.67505 4.47505 3.57505 4.40005 3.57505 4.27505V3.52505V3.52505ZM10.425 14.45H5.57505C5.15005 14.45 4.80005 14.125 4.77505 13.675L4.40005 5.57505H11.625L11.25 13.675C11.2 14.1 10.85 14.45 10.425 14.45Z"
                            fill="" />
                        <path
                            d="M8.00005 8.1001C7.70005 8.1001 7.42505 8.3501 7.42505 8.6751V11.8501C7.42505 12.1501 7.67505 12.4251 8.00005 12.4251C8.30005 12.4251 8.57505 12.1751 8.57505 11.8501V8.6751C8.57505 8.3501 8.30005 8.1001 8.00005 8.1001Z"
                            fill="" />
                        <path
                            d="M9.99994 8.60004C9.67494 8.57504 9.42494 8.80004 9.39994 9.12504L9.24994 11.325C9.22494 11.625 9.44994 11.9 9.77494 11.925C9.79994 11.925 9.79994 11.925 9.82494 11.925C10.1249 11.925 10.3749 11.7 10.3749 11.4L10.5249 9.20004C10.5249 8.87504 10.2999 8.62504 9.99994 8.60004Z"
                            fill="" />
                        <path
                            d="M5.97497 8.60004C5.67497 8.62504 5.42497 8.90004 5.44997 9.20004L5.62497 11.4C5.64997 11.7 5.89997 11.925 6.17497 11.925C6.19997 11.925 6.19997 11.925 6.22497 11.925C6.52497 11.9 6.77497 11.625 6.74997 11.325L6.57497 9.12504C6.57497 8.80004 6.29997 8.57504 5.97497 8.60004Z"
                            fill="" />
                    </svg>
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div x-data="{
        openTab: 1,
        activeClasses: 'bg-primary/[0.08] text-primary border-primary',
        inactiveClasses: 'border-stroke dark:border-strokedark',
    }" class="px-6 pt-6 pb-7.5">
        <!-- Featured Tab Buttons -->
        <div class="mb-5.5 flex flex-wrap items-center gap-3.5">
            <button
                class="inline-flex items-center gap-3 rounded-md border py-2 px-4.5 font-medium hover:border-primary hover:bg-primary/[0.08] hover:text-primary"
                @click.prevent="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_557_14701)">
                        <path
                            d="M17.9999 9.19956C18.0108 8.58084 17.9456 7.96308 17.8058 7.35962H9.18359V10.6996H14.2448C14.1489 11.2852 13.9331 11.8458 13.6105 12.3476C13.2878 12.8493 12.8649 13.282 12.3673 13.6195L12.3496 13.7314L15.076 15.8011L15.2648 15.8196C16.9993 14.2496 17.9996 11.9395 17.9996 9.19956"
                            fill="#4285F4" />
                        <path
                            d="M9.18357 18C11.6631 18 13.7447 17.2 15.2653 15.82L12.3672 13.6199C11.5918 14.15 10.551 14.52 9.18357 14.52C8.02225 14.5134 6.89255 14.1485 5.95475 13.4772C5.01696 12.8058 4.31869 11.8621 3.95903 10.78L3.8514 10.789L1.01654 12.9389L0.979492 13.0399C1.74299 14.5311 2.9147 15.7848 4.36361 16.6607C5.81251 17.5367 7.48149 18.0004 9.18393 18"
                            fill="#34A853" />
                        <path
                            d="M3.95909 10.7799C3.75822 10.2071 3.65457 9.60576 3.65226 9C3.65596 8.39523 3.75579 7.79471 3.94815 7.22006L3.94304 7.10075L1.07342 4.9162L0.979559 4.95995C0.335486 6.21312 0 7.59676 0 8.99991C0 10.4031 0.335486 11.7867 0.979559 13.0399L3.95909 10.7799Z"
                            fill="#FBBC05" />
                        <path
                            d="M9.18393 3.48001C10.4999 3.45999 11.7726 3.94027 12.735 4.82007L15.3268 2.34002C13.6645 0.811712 11.4631 -0.0268481 9.18393 1.57224e-05C7.48152 -0.000381223 5.81255 0.463308 4.36364 1.33923C2.91473 2.21516 1.74301 3.4688 0.979492 4.95996L3.94915 7.22007C4.31236 6.13809 5.01294 5.19513 5.95212 4.52412C6.89129 3.85311 8.02169 3.48792 9.18393 3.48001Z"
                            fill="#EB4335" />
                    </g>
                    <defs>
                        <clipPath id="clip0_557_14701">
                            <rect width="18" height="18" fill="white" />
                        </clipPath>
                    </defs>
                </svg>

                Google
            </button>

            <button
                class="inline-flex items-center gap-3 rounded-md border py-2 px-4.5 font-medium hover:border-primary hover:bg-primary/[0.08] hover:text-primary"
                @click.prevent="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses">
                <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.84172 17.9986V9.78978H8.4952L8.89246 6.59069H5.84172V4.54817C5.84172 3.62198 6.08943 2.99073 7.3686 2.99073L9 2.98995V0.128727C8.71772 0.0898825 7.74937 0.00280762 6.62277 0.00280762C4.27065 0.00280762 2.66034 1.4936 2.66034 4.2315V6.59078H0V9.78987H2.66026V17.9986L5.84172 17.9986Z"
                        fill="#3162C9" />
                </svg>

                Facebook
            </button>

            <button
                class="inline-flex items-center gap-3 rounded-md border py-2 px-4.5 font-medium hover:border-primary hover:bg-primary/[0.08] hover:text-primary"
                @click.prevent="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_557_14736)">
                        <path
                            d="M17.6906 5.4C17.6625 4.5 17.4938 3.85313 17.2969 3.2625C17.1 2.67188 16.7906 2.19375 16.3125 1.71562C15.8344 1.2375 15.3563 0.95625 14.7938 0.73125C14.2313 0.50625 13.6125 0.365625 12.6563 0.3375C11.6719 0.28125 11.3906 0.28125 9 0.28125C6.60938 0.28125 6.35625 0.28125 5.4 0.309375C4.44375 0.3375 3.85313 0.50625 3.2625 0.703125C2.67188 0.9 2.19375 1.2375 1.71563 1.71562C1.2375 2.19375 0.928125 2.67188 0.73125 3.2625C0.50625 3.825 0.365625 4.44375 0.3375 5.4C0.309375 6.35625 0.28125 6.60938 0.28125 9C0.28125 11.3906 0.28125 11.6438 0.309375 12.6C0.3375 13.5562 0.50625 14.1469 0.703125 14.7375C0.9 15.3281 1.20938 15.8063 1.6875 16.2844C2.16563 16.7625 2.67188 17.0719 3.23438 17.2688C3.79688 17.4656 4.41563 17.6344 5.37188 17.6625C6.32813 17.7188 6.58125 17.7188 8.97188 17.7188C11.3625 17.7188 11.6156 17.7188 12.5719 17.6906C13.5281 17.6625 14.1188 17.4937 14.7094 17.2969C15.3 17.1 15.7781 16.7906 16.2563 16.3125C16.7344 15.8344 17.0438 15.3281 17.2406 14.7656C17.4375 14.2031 17.6063 13.5844 17.6344 12.6281C17.6625 11.7281 17.6625 11.4469 17.6625 9.05625C17.6625 6.66563 17.7188 6.35625 17.6906 5.4ZM16.1156 12.5156C16.0875 13.3594 15.9188 13.8094 15.8063 14.1469C15.6375 14.5406 15.4406 14.85 15.1313 15.1312C14.8219 15.4406 14.5406 15.6094 14.1469 15.8063C13.8375 15.9187 13.3875 16.0875 12.5156 16.1156C11.6156 16.1156 11.3344 16.1156 9.02813 16.1156C6.72188 16.1156 6.4125 16.1156 5.5125 16.0875C4.66875 16.0594 4.21875 15.8906 3.88125 15.7781C3.4875 15.6094 3.17813 15.4125 2.89688 15.1031C2.5875 14.7937 2.41875 14.5125 2.22188 14.1188C2.10938 13.8094 1.94063 13.3594 1.9125 12.4875C1.9125 11.6156 1.9125 11.3344 1.9125 9C1.9125 6.66563 1.9125 6.38438 1.94063 5.48438C1.96875 4.64062 2.1375 4.19062 2.25 3.85312C2.41875 3.45937 2.61563 3.15 2.89688 2.86875C3.20625 2.55938 3.4875 2.39062 3.88125 2.22188C4.19063 2.10938 4.64063 1.94063 5.5125 1.9125C6.4125 1.88438 6.69375 1.88437 9.02813 1.88437C11.3625 1.88437 11.6438 1.88438 12.5438 1.9125C13.3875 1.94063 13.8375 2.10938 14.175 2.22188C14.5688 2.39062 14.8781 2.5875 15.1594 2.86875C15.4688 3.17812 15.6375 3.45937 15.8344 3.85312C15.9469 4.1625 16.1156 4.6125 16.1438 5.48438C16.1719 6.38438 16.1719 6.66563 16.1719 9C16.1719 11.3344 16.1438 11.6156 16.1156 12.5156Z"
                            fill="url(#paint0_linear_557_14736)" />
                        <path
                            d="M9.00068 4.52802C6.49756 4.52802 4.52881 6.55302 4.52881 8.99989C4.52881 11.503 6.55381 13.4718 9.00068 13.4718C11.4476 13.4718 13.5007 11.503 13.5007 8.99989C13.5007 6.49677 11.5038 4.52802 9.00068 4.52802ZM9.00068 11.9249C7.36943 11.9249 6.07568 10.603 6.07568 8.99989C6.07568 7.39677 7.39756 6.07489 9.00068 6.07489C10.6319 6.07489 11.9257 7.36864 11.9257 8.99989C11.9257 10.6311 10.6319 11.9249 9.00068 11.9249Z"
                            fill="url(#paint1_linear_557_14736)" />
                        <path
                            d="M13.6969 5.37196C14.2716 5.37196 14.7375 4.90604 14.7375 4.33134C14.7375 3.7566 14.2716 3.29071 13.6969 3.29071C13.1221 3.29071 12.6562 3.7566 12.6562 4.33134C12.6562 4.90604 13.1221 5.37196 13.6969 5.37196Z"
                            fill="url(#paint2_linear_557_14736)" />
                    </g>
                    <defs>
                        <linearGradient id="paint0_linear_557_14736" x1="3" y1="0.75" x2="15.375"
                            y2="17.25" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#5851DB" />
                            <stop offset="0.25" stop-color="#833AB4" />
                            <stop offset="0.479167" stop-color="#C13584" />
                            <stop offset="0.739583" stop-color="#E1306C" />
                            <stop offset="1" stop-color="#FD1D1D" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_557_14736" x1="5.92928" y1="4.76844" x2="12.2688"
                            y2="13.2575" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#5851DB" />
                            <stop offset="0.25" stop-color="#833AB4" />
                            <stop offset="0.479167" stop-color="#C13584" />
                            <stop offset="0.739583" stop-color="#E1306C" />
                            <stop offset="1" stop-color="#FD1D1D" />
                        </linearGradient>
                        <linearGradient id="paint2_linear_557_14736" x1="12.9811" y1="3.34666" x2="14.4577"
                            y2="5.31766" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#5851DB" />
                            <stop offset="0.25" stop-color="#833AB4" />
                            <stop offset="0.479167" stop-color="#C13584" />
                            <stop offset="0.739583" stop-color="#E1306C" />
                            <stop offset="1" stop-color="#FD1D1D" />
                        </linearGradient>
                        <clipPath id="clip0_557_14736">
                            <rect width="18" height="18" fill="white" />
                        </clipPath>
                    </defs>
                </svg>

                Instagram
            </button>

            <button
                class="inline-flex items-center gap-3 rounded-md border py-2 px-4.5 font-medium hover:border-primary hover:bg-primary/[0.08] hover:text-primary"
                @click.prevent="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses">
                <svg width="21" height="18" viewBox="0 0 21 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 1.55217C0 0.694956 0.695478 0 1.55374 0H18.8723C19.7301 0 20.4261 0.697565 20.4261 1.55217V16.4478C20.4261 17.305 19.7306 18 18.8723 18H1.55374C0.696 18 0 17.3024 0 16.4478V1.55217ZM1.4087 2.18296V15.817C1.4087 16.2355 1.76087 16.5913 2.19548 16.5913H18.2306C18.6678 16.5913 19.0174 16.2449 19.0174 15.817V2.18296C19.0174 1.76452 18.6652 1.4087 18.2306 1.4087H2.19548C1.75826 1.4087 1.4087 1.75513 1.4087 2.18296ZM2.11304 9.23113C2.11304 8.8007 2.43652 8.45217 2.84035 8.45217H6.31565C6.71739 8.45217 7.04296 8.79861 7.04296 9.23113V15.887H2.11252V9.23113H2.11304ZM7.74783 6.41687C7.74783 5.98487 8.0713 5.63478 8.47513 5.63478H11.9504C12.3522 5.63478 12.6777 5.98122 12.6777 6.41687V15.887H7.7473V6.41687H7.74783ZM13.3826 3.5953C13.3826 3.16539 13.7061 2.81687 14.1099 2.81687H17.5852C17.987 2.81687 18.3125 3.16644 18.3125 3.5953V15.8864H13.3821V3.5953H13.3826Z"
                        fill="#0080F7" />
                </svg>

                Seranking
            </button>
        </div>
        <!-- Featured Tab Buttons -->

        <div>
            <!-- Featured Table Titles -->
            <div class="grid gap-1 rounded bg-gray-2 py-2 px-4.5 dark:bg-graydark xsm:grid-cols-7 sm:grid-cols-5">
                <div class="xsm:col-span-3">
                    <h4 class="text-sm font-medium uppercase">
                        EMAIL TITLE
                    </h4>
                </div>
                <div class="xsm:col-span-2 sm:col-span-1">
                    <h4 class="text-sm font-medium uppercase">STATUS</h4>
                </div>
                <div class="xsm:col-span-2 sm:col-span-1">
                    <h4 class="text-sm font-medium uppercase xsm:text-right">
                        CONVERSION
                    </h4>
                </div>
            </div>
            <!-- Featured Table Titles -->

            <!-- Featured Tab Content One -->
            <div x-show="openTab === 1" class="mt-4.5 flex flex-col gap-6">
                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Best Headsets Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-8/[0.08] py-1 px-2.5 text-sm font-medium text-meta-8">In
                            Queue</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">0%(0)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            iPhone 14 Plus Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">37%(247)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Macbook Pro M1 Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">18%(6.4k)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Affiliation Program
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">12%(2.6K)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Google AdSense
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-primary/[0.08] py-1 px-2.5 text-sm font-medium text-primary">In
                            Draft</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">0.01%(1)</span>
                    </div>
                </div>
            </div>
            <!-- Featured Tab Content One -->

            <!-- Featured Tab Content Two -->
            <div x-show="openTab === 2" class="mt-4.5 flex flex-col gap-6">
                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            iPhone 14 Plus Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">37%(247)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Macbook Pro M1 Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">18%(6.4k)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Best Headsets Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-8/[0.08] py-1 px-2.5 text-sm font-medium text-meta-8">In
                            Queue</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">0%(0)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Google AdSense
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-primary/[0.08] py-1 px-2.5 text-sm font-medium text-primary">In
                            Draft</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">0.01%(1)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Affiliation Program
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">12%(2.6K)</span>
                    </div>
                </div>
            </div>
            <!-- Featured Tab Content Two -->

            <!-- Featured Tab Content Three -->
            <div x-show="openTab === 3" class="mt-4.5 flex flex-col gap-6">
                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Best Headsets Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-8/[0.08] py-1 px-2.5 text-sm font-medium text-meta-8">In
                            Queue</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">0%(0)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Affiliation Program
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">12%(2.6K)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Macbook Pro M1 Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">18%(6.4k)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Google AdSense
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-primary/[0.08] py-1 px-2.5 text-sm font-medium text-primary">In
                            Draft</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">0.01%(1)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            iPhone 14 Plus Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">37%(247)</span>
                    </div>
                </div>
            </div>
            <!-- Featured Tab Content Three -->

            <!-- Featured Tab Content Four -->
            <div x-show="openTab === 4" class="mt-4.5 flex flex-col gap-6">
                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            iPhone 14 Plus Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">37%(247)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Best Headsets Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-8/[0.08] py-1 px-2.5 text-sm font-medium text-meta-8">In
                            Queue</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">0%(0)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Google AdSense
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-primary/[0.08] py-1 px-2.5 text-sm font-medium text-primary">In
                            Draft</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">0.01%(1)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Affiliation Program
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">12%(2.6K)</span>
                    </div>
                </div>

                <!-- Featured Tab Content Item -->
                <div class="grid gap-1 px-4.5 xsm:grid-cols-7 sm:grid-cols-5">
                    <div class="xsm:col-span-3">
                        <h5
                            class="cursor-pointer font-medium text-sm text-black hover:text-primary dark:text-white dark:hover:text-primary">
                            Macbook Pro M1 Giveaway
                        </h5>
                    </div>
                    <div class="xsm:col-span-2 sm:col-span-1">
                        <span
                            class="inline-block rounded bg-meta-3/[0.08] py-1 px-2.5 text-sm font-medium text-meta-3">Sent</span>
                    </div>
                    <div class="xsm:col-span-2 xsm:text-right sm:col-span-1">
                        <span class="inline-block font-medium text-sm text-black dark:text-white">18%(6.4k)</span>
                    </div>
                </div>
            </div>
            <!-- Featured Tab Content Four -->
        </div>
    </div>
</div>
