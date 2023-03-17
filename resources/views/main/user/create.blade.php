@extends('layout.app')
@section('content')
    <x-navigation/>
    <main style="margin-top: 40px">
        <div class="xl:ml-[240px]">
            <div class="mx-auto w-full">
                <div class="w-full h-full" style="">
                    <h1 class="text-4xl px-12 py-6 font-bold border-b-2 border-gray-800">Create</h1>
                    <div class="px-12 pt-6">
                        <form id="createForm" action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch form-outline md-outline"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer form-control block min-h-[auto] w-full rounded border-0
                                        bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="firstname"
                                        aria-label="firstname"
                                        id="firstname"
                                        name="firstname"
                                        aria-describedby="basic-addon1"
                                        data-te-input-showcounter="true"
                                        maxlength="255"
                                    />
                                    <label
                                        for="firstname"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >User Firstname
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('firstname')
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
                                        placeholder="lastname"
                                        aria-label="lastname"
                                        id="lastname"
                                        name="lastname"
                                        aria-describedby="basic-addon1"
                                        data-te-input-showcounter="true"
                                        maxlength="255"
                                    />
                                    <label
                                        for="lastname"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >User Lastname
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('lastname')
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
                                    >User Name
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
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="email"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="email"
                                        aria-label="email"
                                        id="email"
                                        name="email"
                                        aria-describedby="basic-addon1"
                                        data-te-input-showcounter="true"
                                        maxlength="255"
                                    />
                                    <label
                                        for="email"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >User Email
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('email')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8 pb-2 w-full">
                                <select name="is_admin" data-te-select-init class="w-full">
                                    <option selected value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                                <label data-te-select-label-ref>User is Admin</label>
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
                                    >User Phone Number
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
                                    >User Location
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
                        </form>
                        <button
                            type="submit"
                            form="createForm"
                            class="inline-block rounded bg-green-600 px-6 pt-2.5 pb-2 text-xs font-medium uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                         hover:bg-green-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,
                         202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba
                         (59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-green-700
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] xs:w-full xl:w-auto"
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
