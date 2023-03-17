@extends('layout.app')
@section('content')
    <x-navigation/>
    <main style="margin-top: 40px">
        <div class="xl:ml-[240px]">
            <div class="mx-auto w-full">
                <div class="w-full h-full" style="">
                    <h1 class="text-4xl px-12 py-6 font-bold border-b-2 border-gray-800">Create</h1>
                    <div class="px-12 pt-6">
                        <form id="createForm" action="{{route('category.store')}}" method="POST">
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
                                    >Category name
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                    @error('name')
                                    <div class="text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="code"
                                        aria-label="code"
                                        id="code"
                                        name="code"
                                        aria-describedby="basic-addon1"
                                        data-te-input-showcounter="true"
                                        maxlength="20"
                                    />
                                    <label
                                        for="code"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Category code
                                    </label>
                                    <div
                                        class="absolute w-full text-sm text-neutral-500 dark:text-neutral-200"
                                        data-te-input-helper-ref></div>
                                </div>
                                @error('code')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 pb-2 w-full">
                                <select id="icon" name="icon" data-te-select-init data-te-select-filter="true"
                                        class="w-full">
                                    <option value="null" selected >Choose icon...</option>
                                    @foreach($icons as $icon)
                                        <option value="{{$icon}}">{{$icon}}</option>
                                    @endforeach
                                </select>
                                <label data-te-select-label-ref>Category icon</label>
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
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
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
