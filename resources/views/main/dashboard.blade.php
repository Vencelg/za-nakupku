@extends('layout.app')
@section('content')
    <x-navigation/>
    <!--Main layout-->
    <main style="margin-top: 40px">
        <div class="xl:ml-[240px]">
            <div
                class="text-center text-neutral-700 dark:bg-neutral-700 dark:text-neutral-200 h-[90vh] flex
                justify-center items-center flex-col">
                <h2 class="mb-4 text-4xl font-semibold">ZaNákupku Administration Panel</h2>
                <h4 class="mb-6 text-xl font-semibold text-green-500">Welcome</h4>
            </div>
        </div>
    </main>
@endsection
