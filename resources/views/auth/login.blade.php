@extends('layout.app')
@section('content')
    <section class="h-screen">
        <div class="h-full w-10/12 m-auto">
            <div
                class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between xs:content-center">
                <div
                    class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                    <img
                        src="{{asset('images/logo-no-background.png')}}"
                        class="w-full"
                        alt="Sample image"/>
                </div>
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                    @if(session('error'))
                        <div class="bg-red-500 text-white text-center rounded-lg p-3 mb-2">
                            {{session('error')}}
                        </div>
                    @endif
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <!-- Email input -->
                        <div class="relative mb-6" data-te-input-wrapper-init>
                            <input
                                type="email"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem]
                                px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 @error('email') border-red-500 @enderror"
                                id="email"
                                name="email"
                                placeholder="Email address"/>
                            <label
                                for="email"
                                class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                            >Email address
                            </label>
                            @error('email')
                            <div class="text-red-500 mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="relative mb-6" data-te-input-wrapper-init>
                            <input
                                type="password"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem]
                                px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0  @error('email') border-red-500 @enderror"
                                id="password"
                                name="password"
                                placeholder="Password"/>
                            <label
                                for="password"
                                class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                            >Password
                            </label>
                            @error('password')
                            <div class="text-red-500 mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-6 flex items-center justify-between">
                            <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                <input
                                    class="relative float-left mt-[0.15rem] mr-[6px] -ml-[1.5rem] h-[1.125rem]
                                    w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid
                                    border-neutral-300 dark:border-neutral-600 outline-none
                                    before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem]
                                    before:scale-0 before:rounded-full before:bg-transparent
                                    before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-['']
                                     checked:border-green-500 dark:checked:border-green-500 checked:bg-green-500
                                     dark:checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:ml-[0.25rem] checked:after:-mt-px checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-t-0 checked:after:border-l-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:ml-[0.25rem] checked:focus:after:-mt-px checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-t-0 checked:focus:after:border-l-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                                    type="checkbox"
                                    value="true"
                                    id="remember_me"
                                    name="remember_me"
                                />
                                <label
                                    class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                    for="remember_me">
                                    Remember me
                                </label>
                                @error('remember_me')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center lg:text-left">
                            <button
                                type="submit"
                                class="inline-block rounded bg-green-500 px-7 pt-3 pb-2.5 text-sm font-medium
                                uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition
                                duration-150 ease-in-out hover:bg-green-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-green-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-green-500 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
