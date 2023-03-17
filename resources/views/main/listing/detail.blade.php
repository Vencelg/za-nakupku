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

                        <form id="updateForm" action="{{ route('listing.update', ['id' => $listing->id]) }}"
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
                                    value="{{$listing->id}}"
                                />
                                <label
                                    for="id"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >Listing ID
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
                                        placeholder="Listing_id"
                                        aria-label="Listing_id"
                                        id="Listing_id"
                                        name="Listing_id"
                                        aria-describedby="basic-addon1"
                                        value="{{$listing->user_id}}"
                                    />
                                    <label
                                        for="Listing_id"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing User ID
                                    </label>
                                </div>
                                @error('Listing_id')
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
                                        value="{{$listing->category_id}}"
                                    />
                                    <label
                                        for="category_id"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing Category ID
                                    </label>
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
                                        value="{{$listing->name}}"
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
        maxlength="2000">{{$listing->info}}</textarea>
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
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="price"
                                        aria-label="price"
                                        id="price"
                                        name="price"
                                        aria-describedby="basic-addon1"
                                        value="{{$listing->price}}"
                                    />
                                    <label
                                        for="price"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing Price
                                    </label>
                                </div>
                                @error('price')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8 pb-2 w-full">
                                <select name="verified_status" data-te-select-init class="w-full">
                                    <option {{$listing->status == 0 ? "selected" : ""}} value="0">0 - Ended</option>
                                    <option {{$listing->status == 1 ? "selected" : ""}} value="1">1 - Ending
                                        Soon
                                    </option>
                                    <option {{!$listing->status == 2 ? "selected" : ""}} value="2">2 - Active
                                    </option>
                                </select>
                                <label data-te-select-label-ref>Listing Status</label>
                            </div>
                            <div class="mb-8">
                                <div
                                    class="relative items-stretch"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="ending"
                                        aria-label="ending"
                                        id="ending"
                                        name="ending"
                                        aria-describedby="basic-addon1"
                                        value="{{$listing->ending}}"
                                    />
                                    <label
                                        for="ending"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                    >Listing Ending (Y-m-d H:i:s)
                                    </label>
                                </div>
                                @error('ending')
                                <div class="text-red-500 mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-8 pb-2 w-full">
                                <select name="verified_status" data-te-select-init class="w-full">
                                    <option {{$listing->sold ? "selected" : ""}} value="true">True</option>
                                    <option {{!$listing->sold ? "selected" : ""}} value="false">False
                                    </option>
                                </select>
                                <label data-te-select-label-ref>Listing is Sold</label>
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
                                        value="{{$listing->phone_number}}"
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
                                        value="{{$listing->location}}"
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
                                    value="{{$listing->created_at}}"
                                />
                                <label
                                    for="created_at"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >Listing Created at
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
                                    value="{{$listing->updated_at}}"
                                />
                                <label
                                    for="updated_at"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >Listing Updated at
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
                                    value="{{$listing->deleted_at ?? " "}}"
                                />
                                <label
                                    for="deleted_at"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200"
                                >Listing Deleted at
                                </label>
                            </div>
                        </form>
                        <form id="restoreForm" action="{{ route('listing.restore', ['id' => $listing->id]) }}"
                              method="GET">@csrf</form>
                        <form id="softDeleteForm" action="{{ route('listing.softDelete', ['id' => $listing->id]) }}"
                              method="GET">@csrf</form>
                        <form id="deleteForm" action="{{ route('listing.delete', ['id' => $listing->id]) }}"
                              method="GET">@csrf</form>
                    </div>
                    <div class="xl:ml-12 xs:flex xs:flex-col xs:px-12 xs:m-auto xs:gap-4">
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
                            @if($listing->deleted_at)
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

                    @for($i = 0; $i < count($listing->listingImages); $i++)
                        <div
                            data-te-modal-init
                            class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                            id="deleteImageModal{{$i}}"
                            tabindex="-1"
                            aria-labelledby="deleteImageModal{{$i}}Label"
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
                                            Delete Image
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
                                        <a href="{{route('listing-image.delete', ['listingId' => $listing->id, 'imageId' => $listing->listingImages[$i]->id ])}}">
                                            <button
                                                type="button"
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
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <h1 class="text-4xl px-12 py-6 font-bold border-t-2 border-b-2 border-gray-800 mt-6">Images</h1>

                <div class="my-6 px-12">
                    <div
                        id="carouselExampleCaptions"
                        class="relative"
                        data-te-carousel-init
                        data-te-carousel-slide>
                        <div
                            class="absolute right-0 bottom-0 left-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                            data-te-carousel-indicators>
                            @for($j = 0; $j < count($listing->listingImages); $j++)
                                <button
                                    type="button"
                                    data-te-target="#carouselExampleCaptions"
                                    data-te-slide-to="{{$j}}"
                                    {{$j == 0 ? "data-te-carousel-active" : ""}}
                                    class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                    {{$j == 0 ? "aria-current=\"true\"" : ""}}
                                    aria-label="Slide {{$j+1}}"></button>
                            @endfor
                        </div>
                        <div
                            class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                            @for($k = 0; $k < count($listing->listingImages); $k++)
                                <div
                                    class="relative float-left {{$k != 0 ? "hidden" : ""}} -mr-[100%] w-full
                                    transition-transform
                                    duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    {{$k == 0 ? "data-te-carousel-active" : ""}}
                                    data-te-carousel-item
                                    style="backface-visibility: hidden">
                                    <a href="{{ $listing->listingImages[$k]->url }}" target="_blank">
                                        <div class="block w-full bg-neutral-100" style="background-image: url({{$listing->listingImages[$k]->url}}); background-position: center; height:
                                    30rem; background-repeat: no-repeat"></div>
                                    </a>
                                    <div
                                        class="absolute inset-x-[15%] bottom-5 py-5 text-center text-white md:block">
                                        <button
                                            type="button"
                                            class="inline-block rounded bg-red-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                         hover:bg-red-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,
                         202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba
                         (59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700-700
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                            data-te-toggle="modal"
                                            data-te-target="#deleteImageModal{{$k}}"
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            Delete
                                        </button>
                                    </div>
                                </div>

                            @endfor
                        </div>
                        <button
                            class="hover:bg-neutral-100 hover:bg-opacity-40 absolute top-0 bottom-0
                            left-0 z-[1]
                            flex
                            w-[15%]
                            items-center
                            justify-center
                            border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150
                            ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90
                            hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none
                            motion-reduce:transition-none"
                            type="button"
                            data-te-target="#carouselExampleCaptions"
                            data-te-slide="prev">
    <span class="inline-block h-8 w-8">
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
            d="M15.75 19.5L8.25 12l7.5-7.5"/>
      </svg>
    </span>
                            <span
                                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                            >Previous</span
                            >
                        </button>
                        <button
                            class="hover:bg-neutral-100 hover:bg-opacity-40 absolute top-0 bottom-0 right-0 z-[1]
                            flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black
                            opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)]
                            hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black
                            focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                            type="button"
                            data-te-target="#carouselExampleCaptions"
                            data-te-slide="next">
    <span class="inline-block h-8 w-8">
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
            d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
      </svg>
    </span>
                            <span
                                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                            >Next</span
                            >
                        </button>
                    </div>
                </div>
                <form id="addImagesForm" action="{{route('listing-image.store', ['listingId' => $listing->id])}}"
                      method="post"
                      enctype="multipart/form-data"
                      class="flex
                justify-start flex-col px-12 pt-6">
                    @csrf
                    <div class="mb-3 w-full">
                        <label
                            for="formFileMultiple"
                            class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                        >Add more images</label
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
                </form>
                <div class="px-12 pt-1 pb-4">
                    <button
                        type="submit"
                        form="addImagesForm"
                        data-te-ripple-init
                        data-te-ripple-color="light"
                        class="inline-block rounded bg-info px-6 pt-2.5 pb-2 text-xs font-medium uppercase
                        leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
                         hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700
                         active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] w-full">
                        Add images
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
