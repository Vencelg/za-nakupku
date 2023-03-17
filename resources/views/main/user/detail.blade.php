@extends('layout.app')
@section('content')
    <x-navigation/>
    <main style="margin-top: 40px">
        <div class="xl:ml-[240px]">
            <div class="mx-auto w-full">
                <div class="w-full h-full" style="">
                    <h1 class="text-4xl px-12 py-6 font-bold border-b-2 border-gray-800">Detail</h1>
                    <div class="px-12 pt-6">
                        @if(session('success'))
                            <div
                                class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 py-5 px-6 text-base text-success-700"
                                role="alert">
  <span class="mr-2">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="h-5 w-5">
      <path
          fill-rule="evenodd"
          d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
          clip-rule="evenodd"/>
    </svg>
  </span>
                                {{session('success')}}
                            </div>
                        @endif

                        <form id="updateForm" action="{{ route('user.update', ['id' => $user->id]) }}"
                              method="POST">
                            @csrf
                            <div
                                class="relative items-stretch mb-8"
                                data-te-input-wrapper-init
                            >
                                <input
                                    type="text"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    placeholder="id"
                                    aria-label="id"
                                    id="id"
                                    name="id"
                                    aria-describedby="basic-addon1"
                                    disabled
                                    value="{{$user->id}}"
                                />
                                <label
                                    for="id"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >User ID
                                </label>
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="firstname"
                                        aria-label="firstname"
                                        id="firstname"
                                        name="firstname"
                                        aria-describedby="basic-addon1"
                                        value="{{$user->firstname}}"
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
                                        value="{{$user->lastname}}"
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
                                        type="email"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="email"
                                        aria-label="email"
                                        id="email"
                                        name="email"
                                        aria-describedby="basic-addon1"
                                        value="{{$user->email}}"
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
                                @error('lastname')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8 pb-2 w-full">
                                <select name="verified_status" data-te-select-init class="w-full">
                                    <option {{$user->email_verified_at ? "selected" : ""}} value="1">True</option>
                                    <option {{!$user->email_verified_at ? "selected" : ""}} value="0">False</option>
                                </select>
                                <label data-te-select-label-ref>User is Verified</label>
                            </div>
                            <div
                                class="relative items-stretch mb-8"
                                data-te-input-wrapper-init
                            >
                                <input
                                    type="text"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    placeholder="created_at"
                                    aria-label="created_at"
                                    id="created_at"
                                    name="created_at"
                                    aria-describedby="basic-addon1"
                                    disabled
                                    value="{{$user->email_verified_at ?? " "}}"
                                />
                                <label
                                    for="created_at"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >User Email Verified At
                                </label>
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
                                        value="{{$user->phone_number}}"
                                        data-te-input-showcounter="true"
                                        maxlength="255"
                                    />
                                    <label
                                        for="phone_number   "
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
                            <div class="mb-8 pb-2 w-full">
                                <select name="is_admin" data-te-select-init class="w-full">
                                    <option {{$user->is_admin ? "selected" : ""}} value="1">True</option>
                                    <option {{!$user->is_admin ? "selected" : ""}} value="0">False</option>
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
                                        placeholder="location"
                                        aria-label="location"
                                        id="location"
                                        name="location"
                                        aria-describedby="basic-addon1"
                                        value="{{$user->location}}"
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
                            <div
                                class="relative items-stretch mb-8"
                                data-te-input-wrapper-init
                            >
                                <input
                                    type="text"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    placeholder="created_at"
                                    aria-label="created_at"
                                    id="created_at"
                                    name="created_at"
                                    aria-describedby="basic-addon1"
                                    disabled
                                    value="{{$user->created_at}}"
                                />
                                <label
                                    for="created_at"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >User Created at
                                </label>
                            </div>
                            <div
                                class="relative items-stretch mb-8"
                                data-te-input-wrapper-init
                            >
                                <input
                                    type="text"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    placeholder="updated_at"
                                    aria-label="updated_at"
                                    id="updated_at"
                                    name="updated_at"
                                    aria-describedby="basic-addon1"
                                    disabled
                                    value="{{$user->updated_at}}"
                                />
                                <label
                                    for="updated_at"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >User Updated at
                                </label>
                            </div>
                            <div
                                class="relative items-stretch mb-8"
                                data-te-input-wrapper-init
                            >
                                <input
                                    type="text"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    placeholder="deleted_at"
                                    aria-label="deleted_at"
                                    id="deleted_at"
                                    aria-describedby="basic-addon1"
                                    disabled
                                    value="{{$user->deleted_at ?? " "}}"
                                />
                                <label
                                    for="deleted_at"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >User Deleted at
                                </label>
                            </div>
                        </form>
                        <form id="restoreForm" action="{{ route('user.restore', ['id' => $user->id]) }}"
                              method="GET">@csrf</form>
                        <form id="softDeleteForm" action="{{ route('user.softDelete', ['id' => $user->id]) }}"
                              method="GET">@csrf</form>
                        <form id="deleteForm" action="{{ route('user.delete', ['id' => $user->id]) }}"
                              method="GET">@csrf</form>
                    </div>
                    <div class="xl:ml-12 mb-6 xs:flex xs:flex-col xs:px-12 xs:m-auto xs:gap-4">
                        <!-- Update -->
                            <button
                                form="updateForm"
                                type="submit"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                class="inline-block rounded bg-info px-6 pt-2.5 pb-2 text-xs font-medium uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                                Update
                            </button>
                        <!-- Restore -->
                        <button
                            type="submit"
                            form="restoreForm"
                            @if($user->deleted_at)
                                class="inline-block rounded bg-green-600 px-6 pt-2.5 pb-2 text-xs font-medium uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                         hover:bg-green-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,
                         202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba
                         (59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-green-700
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                            @else
                                class="inline-block rounded bg-neutral-500 px-6 pt-2.5 pb-2 text-xs font-medium
                                uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                         hover:bg-neutral-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,
                         202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba
                         (59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-700
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                            disabled
                            @endif
                            data-te-toggle="modal"
                            data-te-target="#restoreModal"
                            data-te-ripple-init
                            data-te-ripple-color="light"
                        >
                            Restore
                        </button>
                        <!-- Soft Delete -->
                        <button
                            type="button"
                            class="inline-block rounded bg-red-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                         hover:bg-red-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,
                         202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba
                         (59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700-700
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                            data-te-toggle="modal"
                            data-te-target="#softDeleteModal"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Soft Delete
                        </button>
                        <div
                            data-te-modal-init
                            class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                            id="softDeleteModal"
                            tabindex="-1"
                            aria-labelledby="softDeleteModalLabel"
                            aria-modal="true"
                            role="dialog">
                            <div
                                data-te-modal-dialog-ref
                                class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                <div
                                    class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                                    <div
                                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                                        <h5
                                            class="text-xl font-medium leading-normal text-neutral-800"
                                            id="exampleModalScrollableLabel">
                                            Soft Delete
                                        </h5>
                                        <button
                                            type="button"
                                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                            data-te-modal-dismiss
                                            aria-label="Close">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="h-6 w-6">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div
                                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md p-4">
                                        <button
                                            type="button"
                                            class="inline-block rounded bg-primary-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                            data-te-modal-dismiss
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            Close
                                        </button>
                                        <button
                                            type="submit"
                                            form="softDeleteForm"
                                            class="ml-1 inline-block rounded bg-red-500 px-6 pt-2.5 pb-2 text-xs
                                            font-medium uppercase leading-normal text-white
                                            shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                                            hover:bg-red-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),
                                            0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-red-600
                                            focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,
                                            113,202,0.2)] focus:outline-none focus:ring-0 active:bg-red-700
                                            active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            Confirm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete -->
                        <button
                            type="button"
                            class="inline-block rounded bg-red-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                         hover:bg-red-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,
                         202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba
                         (59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700-700
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                            data-te-toggle="modal"
                            data-te-target="#deleteModal"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Delete
                        </button>
                        <div
                            data-te-modal-init
                            class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                            id="deleteModal"
                            tabindex="-1"
                            aria-labelledby="deleteModalLabel"
                            aria-modal="true"
                            role="dialog">
                            <div
                                data-te-modal-dialog-ref
                                class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                <div
                                    class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                                    <div
                                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 ">
                                        <h5
                                            class="text-xl font-medium leading-normal text-neutral-800 "
                                            id="exampleModalScrollableLabel">
                                            Delete
                                        </h5>
                                        <button
                                            type="submit"
                                            form="deleteForm"
                                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                            data-te-modal-dismiss
                                            aria-label="Close">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="h-6 w-6">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="relative p-4">
                                        <p><b>Warning:</b> this action cannot be undone</p>
                                    </div>
                                    <div
                                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4">
                                        <button
                                            type="button"
                                            class="inline-block rounded bg-primary-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                            data-te-modal-dismiss
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            Close
                                        </button>
                                        <button
                                            type="submit"
                                            form="deleteForm"
                                            class="ml-1 inline-block rounded bg-red-500 px-6 pt-2.5 pb-2 text-xs
                                            font-medium uppercase leading-normal text-white
                                            shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                                            hover:bg-red-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),
                                            0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-red-600
                                            focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,
                                            113,202,0.2)] focus:outline-none focus:ring-0 active:bg-red-700
                                            active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            Confirm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
