@extends('layout.app')
@section('content')
    <x-navigation/>
    <main style="margin-top: 40px">
        <div class="xl:ml-[240px]">
            <div class="mx-auto w-full">
                <div class="w-full h-full" style="">
                    <h1 class="text-4xl px-12 py-6 font-bold border-b-2 border-gray-800">Create</h1>
                    <div class="px-12 pt-6">
                        <form id="createForm" action="{{route('listing.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0
                                        bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200
                                        ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100
                                        motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="user_id"
                                        aria-label="user_id"
                                        id="user_id"
                                        name="user_id"
                                        aria-describedby="basic-addon1"
                                    />
                                    <label
                                        for="user_id"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing User ID
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('user_id')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="category_id"
                                        aria-label="category_id"
                                        id="category_id"
                                        name="category_id"
                                        aria-describedby="basic-addon1"
                                    />
                                    <label
                                        for="category_id"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing Category ID
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('category_id')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="name"
                                        aria-label="name"
                                        id="name"
                                        name="name"
                                        aria-describedby="basic-addon1"
                                        data-te-input-showcounter="true"
                                        maxlength="255"
                                    />
                                    <label
                                        for="name"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing Name
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('name')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <div class="relative w-full" data-te-input-wrapper-init>
    <textarea
        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
        id="info"
        name="info"
        rows="3"
        placeholder="Listing Info" data-te-input-showcounter="true"
        maxlength="2000"></textarea>
                                    <label
                                        for="info"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                    >Listing Info</label
                                    >
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="number"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="price"
                                        aria-label="price"
                                        id="price"
                                        name="price"
                                        aria-describedby="basic-addon1"
                                        value="15"
                                        min="15"
                                    />
                                    <label
                                        for="amount"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing Price
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('price')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative mb-3"
                                    data-te-datepicker-init
                                    data-te-input-wrapper-init>
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="Listing Ending Date"
                                        name="ending_date"
                                        id="ending_date"
                                    />
                                    <label
                                        for="ending_date"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                    >Listing Ending Date</label
                                    >
                                </div>
                                @error('ending_date')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative mb-3"
                                    id="timepicker-with-button"
                                    data-te-format24="true"
                                    data-te-inline="true"
                                    data-te-timepicker-init
                                    data-te-input-wrapper-init>
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="ending_time"
                                        name="ending_time"
                                    />
                                    <label
                                        for="ending_time"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                    >Listing Ending Time</label
                                    >
                                    <button
                                        tabindex="0"
                                        type="button"
                                        class="timepicker-toggle-button absolute right-2.5 top-5 ml-auto h-4 w-4
                                        -translate-x-1/2 -translate-y-1/2 cursor-pointer border-none bg-transparent
                                        fill-neutral-700 outline-none transition-all duration-[300ms]
                                        ease-[cubic-bezier(0.25,0.1,0.25,1)] hover:text-[#3b71ca] focus:text-[#3b71ca]
                                         dark:fill-white dark:hover:fill-[#3b71ca] dark:focus:fill-[#3b71ca]"
                                        data-te-toggle="timepicker-with-button"
                                        data-te-timepicker-toggle-button>
    <span data-te-timepicker-icon>
      <i class="fa-regular fa-clock"></i>
    </span>
                                    </button>
                                </div>
                                @error('ending_time')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="phone_number"
                                        aria-label="phone_number"
                                        id="phone_number"
                                        name="phone_number"
                                        aria-describedby="basic-addon1"
                                        data-te-input-showcounter="true"
                                        maxlength="255"
                                    />
                                    <label
                                        for="phone_number"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing Phone Number
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('phone_number')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="location"
                                        aria-label="location"
                                        id="location"
                                        name="location"
                                        aria-describedby="basic-addon1"
                                        data-te-input-showcounter="true"
                                        maxlength="255"
                                    />
                                    <label
                                        for="location"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing Location
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('location')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <div class="mb-3 w-full">
                                    <label
                                        for="formFileMultiple"
                                        class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                                    >Listing Images</label
                                    >
                                    <input
                                        class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent"
                                        type="file"
                                        id="images[]"
                                        name="images[]"
                                        multiple/>
                                </div>
                                @error('images')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </form>
                        <button
                            type="submit"
                            form="createForm"
                            class="inline-block rounded bg-green-600 px-6 pt-2.5 pb-2 text-xs font-medium uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                         hover:bg-green-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,
                         202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba
                         (59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-green-700
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] mb-8 xs:w-full xl:w-auto"
                            data-te-ripple-init
                            data-te-ripple-color="light"
                        >
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
