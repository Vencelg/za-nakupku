<div class="w-60 h-full shadow-md bg-white" id="sidenavSecExample">
    <div class="pt-4 pb-2 px-6">
        <a href="#!">
            <div class="flex">
                <div class="grow ml-3">
                    <p class="transition duration-200 ease-in-out text-sm font-semibold text-gray-800
                        hover:text-green-600">{{auth()->user()->name}}</p>
                </div>
            </div>
        </a>
    </div>
    <hr class="my-2">
    <ul class="relative" style="height: 91%">
        <li class="relative">
            <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition duration-300 ease-in-out"
               href="/" data-mdb-ripple="true" data-mdb-ripple-color="success">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-3" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                          d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                </svg>
                <span>Home</span>
            </a>
        </li>
        <li class="relative" id="sidenavSecEx2">
            <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition duration-300 ease-in-out
                cursor-pointer"
               data-mdb-ripple="true" data-mdb-ripple-color="success" data-bs-toggle="collapse"
               data-bs-target="#collapseSidenavSecEx2" aria-expanded="false" aria-controls="collapseSidenavSecEx2">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-3" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                    <path fill="currentColor"
                          d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z"></path>
                </svg>
                <span>Categories</span>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                          d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                </svg>
            </a>
            <ul class="relative accordion-collapse collapse" id="collapseSidenavSecEx2"
                aria-labelledby="sidenavSecEx2" data-bs-parent="#sidenavSecExample">
                <li class="relative">
                    <a href="/categories"
                       class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700
                           text-ellipsis whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition
                           duration-300 ease-in-out"
                       data-mdb-ripple="true" data-mdb-ripple-color="success">List</a>
                </li>
                <li class="relative">
                    <a href="#!"
                       class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700
                           text-ellipsis whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition
                           duration-300 ease-in-out"
                       data-mdb-ripple="true" data-mdb-ripple-color="success">Create</a>
                </li>
            </ul>
        </li>
        <li class="relative" id="sidenavSecEx3">
            <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition duration-300 ease-in-out
                cursor-pointer"
               data-mdb-ripple="true" data-mdb-ripple-color="success" data-bs-toggle="collapse"
               data-bs-target="#collapseSidenavSecEx3" aria-expanded="false" aria-controls="collapseSidenavSecEx3">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-3" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                          d="M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64 64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65 64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32 32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72 0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48 48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256 0z"></path>
                </svg>
                <span>Listings</span>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                          d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                </svg>
            </a>
            <ul class="relative accordion-collapse collapse" id="collapseSidenavSecEx3"
                aria-labelledby="sidenavSecEx3" data-bs-parent="#sidenavSecExample">
                <li class="relative">
                    <a href="#!"
                       class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700
                           text-ellipsis whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition
                           duration-300 ease-in-out"
                       data-mdb-ripple="true" data-mdb-ripple-color="success">List</a>
                </li>
                <li class="relative">
                    <a href="#!"
                       class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700
                           text-ellipsis whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition
                           duration-300 ease-in-out"
                       data-mdb-ripple="true" data-mdb-ripple-color="success">Create</a>
                </li>
            </ul>
        </li>
        <li class="relative" id="sidenavXxEx2">
            <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition duration-300 ease-in-out
                cursor-pointer"
               data-mdb-ripple="true" data-mdb-ripple-color="success" data-bs-toggle="collapse"
               data-bs-target="#collapseSidenavXxEx2" aria-expanded="false" aria-controls="collapseSidenavXxEx2">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments"
                     class="w-3 h-3 mr-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="currentColor"
                          d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path>
                </svg>
                <span>Payments</span>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                          d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                </svg>
            </a>
            <ul class="relative accordion-collapse collapse" id="collapseSidenavXxEx2"
                aria-labelledby="sidenavXxEx2" data-bs-parent="#sidenavSecExample">
                <li class="relative">
                    <a href="#!"
                       class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700
                           text-ellipsis whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition
                           duration-300 ease-in-out"
                       data-mdb-ripple="true" data-mdb-ripple-color="success">List</a>
                </li>
                <li class="relative">
                    <a href="#!"
                       class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700
                           text-ellipsis whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition
                           duration-300 ease-in-out"
                       data-mdb-ripple="true" data-mdb-ripple-color="success">Create</a>
                </li>
            </ul>
        </li>
        <li class="relative" id="sidenavXxEx3">
            <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition duration-300 ease-in-out
                cursor-pointer"
               data-mdb-ripple="true" data-mdb-ripple-color="success" data-bs-toggle="collapse"
               data-bs-target="#collapseSidenavXxEx3" aria-expanded="false" aria-controls="collapseSidenavXxEx3">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-3" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                          d="M496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM464 96H345.94c-21.38 0-32.09 25.85-16.97 40.97l32.4 32.4L288 242.75l-73.37-73.37c-12.5-12.5-32.76-12.5-45.25 0l-68.69 68.69c-6.25 6.25-6.25 16.38 0 22.63l22.62 22.62c6.25 6.25 16.38 6.25 22.63 0L192 237.25l73.37 73.37c12.5 12.5 32.76 12.5 45.25 0l96-96 32.4 32.4c15.12 15.12 40.97 4.41 40.97-16.97V112c.01-8.84-7.15-16-15.99-16z"></path>
                </svg>
                <span>Users</span>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                          d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                </svg>
            </a>
            <ul class="relative accordion-collapse collapse" id="collapseSidenavXxEx3"
                aria-labelledby="sidenavXxEx3" data-bs-parent="#sidenavSecExample">
                <li class="relative">
                    <a href="#!"
                       class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700
                           text-ellipsis whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition
                           duration-300 ease-in-out"
                       data-mdb-ripple="true" data-mdb-ripple-color="success">List</a>
                </li>
                <li class="relative">
                    <a href="#!"
                       class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700
                           text-ellipsis whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition
                           duration-300 ease-in-out"
                       data-mdb-ripple="true" data-mdb-ripple-color="success">Create</a>
                </li>
            </ul>
        </li>
        <li class="absolute bottom-1 w-full">
            <hr class="my-2">
                <form action="{{route('logout')}}" method="post" class="w-full">
                    @csrf
                    <button type="submit" class="lex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap rounded hover:text-green-600 hover:bg-green-50 transition duration-300 ease-in-out
                w-full flex" data-mdb-ripple="true" data-mdb-ripple-color="success">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 mr-3" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                  d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                        </svg>
                        Logout
                    </button>
                </form>
        </li>
    </ul>
</div>