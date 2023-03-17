<header>
    <!-- Sidenav -->
    <nav
        id="sidenav-1"
        class="fixed top-0 left-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] xl:data-[te-sidenav-hidden='false']:translate-x-0"
        data-te-sidenav-init
        data-te-sidenav-hidden="false"
        data-te-sidenav-mode-breakpoint-over="0"
        data-te-sidenav-mode-breakpoint-side="xl"
        data-te-sidenav-content="#content"
        data-te-sidenav-accordion="true">
        <ul
            class="relative m-0 list-none px-[0.2rem]"
            data-te-sidenav-menu-ref>
            <li class="relative">
                <a
                    class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0
                    .875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-green-400/10
                    hover:text-green-600 hover:outline-none focus:bg-green-400/10 focus:text-green-600
                    focus:outline-none
                    active:bg-green-400/10 active:text-green-600 active:outline-none
                    data-[te-sidenav-state-active]:text-green-600 data-[te-sidenav-state-focus]:outline-none
                    motion-reduce:transition-none"
                    href="{{route('dashboard')}}"
                    data-te-sidenav-link-ref
                    @if(url()->current() === route('dashboard'))
                        data-te-sidenav-state-active
                    @endif
                >
            <span
                class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300
                 [&>svg]:ease-linear group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                 group-active:[&>svg]:fill-green-600 group-[te-sidenav-state-active]:[&>svg]:fill-green-600
                 motion-reduce:[&>svg]:transition-none ">
              <i class="fa-solid fa-house"></i>
            </span>
                    <span>Dashboard</span></a
                >
            </li>
            <li class="relative">
                <a
                    class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0
                    .875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-green-400/10
                    hover:text-green-600 hover:outline-none focus:bg-green-400/10 focus:text-green-600
                    focus:outline-none
                    active:bg-green-400/10 active:text-green-600 active:outline-none
                    data-[te-sidenav-state-active]:text-green-600 data-[te-sidenav-state-focus]:outline-none
                    motion-reduce:transition-none"
                    data-te-sidenav-link-ref>
            <span
                class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300
                [&>svg]:ease-linear group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                group-active:[&>svg]:fill-green-600 group-[te-sidenav-state-active]:[&>svg]:fill-green-600
                motion-reduce:[&>svg]:transition-none">
              <i class="fa-solid fa-list"></i>
            </span>
                    <span>Categories</span>
                    <span
                        class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300
                        motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600
                        group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                        group-active:[&>svg]:fill-green-600
                         group-[te-sidenav-state-active]:[&>svg]:fill-green-600"
                        data-te-sidenav-rotate-icon-ref>
              <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
              </svg>
            </span>
                </a>
                <ul
                    class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                    data-te-sidenav-collapse-ref>
                    <li class="relative">
                        <a
                            href="{{route('category')}}"
                            class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6
                            text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear
                            hover:bg-green-400/10 hover:text-green-600 hover:outline-none focus:bg-green-400/10
                            focus:text-green-600 focus:outline-none active:bg-green-400/10 active:text-green-600
                            active:outline-none data-[te-sidenav-state-active]:text-green-600
                            data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
                            data-te-sidenav-link-ref
                        >List</a
                        >
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('category.create')}}"
                            class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6
                            text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear
                            hover:bg-green-400/10 hover:text-green-600 hover:outline-none focus:bg-green-400/10
                            focus:text-green-600 focus:outline-none active:bg-green-400/10 active:text-green-600
                            active:outline-none data-[te-sidenav-state-active]:text-green-600
                            data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                            data-te-sidenav-link-ref
                        >Create</a
                        >
                    </li>
                </ul>
            </li>
            <li class="relative">
                <a
                    class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0
                    .875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-green-400/10
                    hover:text-green-600 hover:outline-none focus:bg-green-400/10 focus:text-green-600
                    focus:outline-none
                    active:bg-green-400/10 active:text-green-600 active:outline-none
                    data-[te-sidenav-state-active]:text-green-600 data-[te-sidenav-state-focus]:outline-none
                    motion-reduce:transition-none "
                    data-te-sidenav-link-ref>
            <span
                class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300
                 [&>svg]:ease-linear group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                 group-active:[&>svg]:fill-green-600 group-[te-sidenav-state-active]:[&>svg]:fill-green-600
                 motion-reduce:[&>svg]:transition-none">
              <i class="fa-solid fa-gavel"></i>
            </span>
                    <span>Listings</span>
                    <span
                        class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300
                        motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600
                        group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                        group-active:[&>svg]:fill-green-600
                         group-[te-sidenav-state-active]:[&>svg]:fill-green-600 "
                        data-te-sidenav-rotate-icon-ref>
              <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
              </svg>
            </span>
                </a>
                <ul
                    class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                    data-te-sidenav-collapse-ref>
                    <li class="relative">
                        <a
                            href="{{route('listing')}}"
                            class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6
                            text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear
                            hover:bg-green-400/10 hover:text-green-600 hover:outline-none focus:bg-green-400/10
                            focus:text-green-600 focus:outline-none active:bg-green-400/10 active:text-green-600
                            active:outline-none data-[te-sidenav-state-active]:text-green-600
                            data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                            data-te-sidenav-link-ref
                        >List</a
                        >
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('listing.create')}}"
                            class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6
                            text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear
                            hover:bg-green-400/10 hover:text-green-600 hover:outline-none focus:bg-green-400/10
                            focus:text-green-600 focus:outline-none active:bg-green-400/10 active:text-green-600
                            active:outline-none data-[te-sidenav-state-active]:text-green-600
                            data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
                            data-te-sidenav-link-ref
                        >Create</a
                        >
                    </li>
                </ul>
            </li>
            <li class="relative">
                <a
                    class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0
                    .875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-green-400/10
                    hover:text-green-600 hover:outline-none focus:bg-green-400/10 focus:text-green-600
                    focus:outline-none
                    active:bg-green-400/10 active:text-green-600 active:outline-none
                    data-[te-sidenav-state-active]:text-green-600 data-[te-sidenav-state-focus]:outline-none
                    motion-reduce:transition-none"
                    data-te-sidenav-link-ref>
            <span
                class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300
                [&>svg]:ease-linear group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                group-active:[&>svg]:fill-green-600 group-[te-sidenav-state-active]:[&>svg]:fill-green-600
                motion-reduce:[&>svg]:transition-none">
              <i class="fa-solid fa-credit-card"></i>
            </span>
                    <span>Payments</span>
                    <span
                        class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300
                        motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600
                        group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                        group-active:[&>svg]:fill-green-600
                         group-[te-sidenav-state-active]:[&>svg]:fill-green-600"
                        data-te-sidenav-rotate-icon-ref>
              <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
              </svg>
            </span>
                </a>
                <ul
                    class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                    data-te-sidenav-collapse-ref>
                    <li class="relative">
                        <a
                            href="{{route('payment')}}"
                            class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6
                            text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear
                            hover:bg-green-400/10 hover:text-green-600 hover:outline-none focus:bg-green-400/10
                            focus:text-green-600 focus:outline-none active:bg-green-400/10 active:text-green-600
                            active:outline-none data-[te-sidenav-state-active]:text-green-600
                            data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
                            data-te-sidenav-link-ref
                        >List</a
                        >
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('payment.create')}}"
                            class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6
                            text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear
                            hover:bg-green-400/10 hover:text-green-600 hover:outline-none focus:bg-green-400/10
                            focus:text-green-600 focus:outline-none active:bg-green-400/10 active:text-green-600
                            active:outline-none data-[te-sidenav-state-active]:text-green-600
                            data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                            data-te-sidenav-link-ref
                        >Create</a
                        >
                    </li>
                </ul>
            </li>
            <li class="relative">
                <a
                    class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0
                    .875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-green-400/10
                    hover:text-green-600 hover:outline-none focus:bg-green-400/10 focus:text-green-600
                    focus:outline-none
                    active:bg-green-400/10 active:text-green-600 active:outline-none
                    data-[te-sidenav-state-active]:text-green-600 data-[te-sidenav-state-focus]:outline-none
                    motion-reduce:transition-none"
                    data-te-sidenav-link-ref>
            <span
                class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300
                [&>svg]:ease-linear group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                group-active:[&>svg]:fill-green-600 group-[te-sidenav-state-active]:[&>svg]:fill-green-600
                motion-reduce:[&>svg]:transition-none">
              <i class="fa-solid fa-users"></i>
            </span>
                    <span>Users</span>
                    <span
                        class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300
                        motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600
                        group-hover:[&>svg]:fill-green-600 group-focus:[&>svg]:fill-green-600
                        group-active:[&>svg]:fill-green-600
                         group-[te-sidenav-state-active]:[&>svg]:fill-green-600"
                        data-te-sidenav-rotate-icon-ref>
              <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
              </svg>
            </span>
                </a>
                <ul
                    class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                    data-te-sidenav-collapse-ref>
                    <li class="relative">
                        <a
                            href="{{route('user')}}"
                            class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6
                            text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear
                            hover:bg-green-400/10 hover:text-green-600 hover:outline-none focus:bg-green-400/10
                            focus:text-green-600 focus:outline-none active:bg-green-400/10 active:text-green-600
                            active:outline-none data-[te-sidenav-state-active]:text-green-600
                            data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
                            data-te-sidenav-link-ref
                        >List</a>
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('user.create')}}"
                            class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6
                            text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear
                            hover:bg-green-400/10 hover:text-green-600 hover:outline-none focus:bg-green-400/10
                            focus:text-green-600 focus:outline-none active:bg-green-400/10 active:text-green-600
                            active:outline-none data-[te-sidenav-state-active]:text-green-600
                            data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                            data-te-sidenav-link-ref
                        >Create</a
                        >
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- Sidenav -->

    <!-- Navbar -->
    <nav
        id="main-navbar"
        class="fixed top-0 right-0 left-0 flex w-full flex-nowrap items-center justify-between bg-white py-[0.6rem]
        text-gray-500 shadow-lg hover:text-gray-700 focus:text-gray-700 lg:flex-wrap lg:justify-start xl:pl-60 py-6"
        data-te-navbar-ref
        style="z-index: 100;">
        <!-- Container wrapper -->
        <div
            class="flex w-full flex-wrap items-center justify-between xl:justify-end px-4">
            <!-- Toggler -->
            <button
                data-te-sidenav-toggle-ref
                data-te-target="#sidenav-1"
                class="block border-0 bg-transparent px-2.5 text-gray-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 xl:hidden"
                aria-controls="#sidenav-1"
                aria-haspopup="true">
          <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="black"
                class="h-5 w-5">
              <path
                  fill-rule="evenodd"
                  d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                  clip-rule="evenodd"/>
            </svg>
          </span>
            </button>

            <!-- Right links -->
            <ul class="relative flex items-center">
                <!-- Avatar -->
                <li class="relative">
                    <a
                        class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out
                        motion-reduce:transition-none hover:text-green-600"
                        href="{{route('logout')}}"
                        role="button">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="pl-2">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
