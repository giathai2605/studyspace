<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
            Input Fields
        </h3>
    </div>
    <div class="flex flex-col gap-5.5 p-6.5">
        <div>
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Default Input
            </label>
            <input type="text" placeholder="Default Input"
                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
        </div>

        <div>
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Active Input
            </label>
            <input type="text" placeholder="Active Input"
                class="w-full rounded-lg border-[1.5px] border-primary bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-form-input" />
        </div>

        <div>
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Disabled label
            </label>
            <input type="text" placeholder="Disabled label" disabled=""
                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary dark:disabled:bg-black" />
        </div>
    </div>
</div>
