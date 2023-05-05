<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-4xl flex items-center justify-center h-screen">
            <div class="text-center items-center">
                <div class="m-6 overflow-hidden shadow-xl sm:rounded-lg ">
                    <div>"Your Account is waiting for approval..."</div>
                    </br></br>
                    <div>{!!\Illuminate\Foundation\Inspiring::quote()!!}</div>
                </div>
            </div>
        </div>

</x-app-layout>

