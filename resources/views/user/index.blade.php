<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left">
                {{ __('User') }}
            </h2>
            <div class="italic text-sm text-right float-right">
                Logged in :{{Auth::user()->name}}</br>
                {{config("global.newusermail")}}
            </div>
        </div>
    </x-slot>

  @livewire ('user.user-table');

    {{--<div class="py-4">
        <div class="max-w-10xl mx-auto"> --}}{{--breedte van tabel, centreren op ruimte--}}{{--
            <div >



                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full overflow-hidden rounded-md">
                                <thead  class="bg-gray-200 text-gray-800 ">
                                <tr>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                         wire:click="sortBy('name')">
                                        <a>User
                                            --}}{{--@include('includes._sort-icon',['field'=>'name'])--}}{{--
                                        </a>
                                    </th>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                         wire:click="sortBy('email')">
                                        <a>Email
                                            --}}{{--@include('includes._sort-icon',['field'=>'email'])--}}{{--
                                        </a>
                                    </th>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                         wire:click="sortBy('email_verified_at')">
                                        <a>Email Verified?
                                            --}}{{--@include('includes._sort-icon',['field'=>'email_verified_at'])--}}{{--
                                        </a>
                                    </th>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                         wire:click="sortBy('email')">
                                        <a>role
                                            --}}{{--@include('includes._sort-icon',['field'=>'role'])--}}{{--
                                        </a>
                                    </th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Company</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Approved_by</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Approved_at</th>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Notify Me</th>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Admin?</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>

                                <tbody>
                                @forelse($users as $user)

                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">

                                        <td class="px-6 mt-2 " >{{$user->name}}</td>
                                        <td class="px-6 mt-2 " >{{$user->email}}</td>
                                        <td class="px-6 mt-2 " >{{$user->email_verified_at}}</td>
                                        <td class="px-6 mt-2 " >{{$user->roles->pluck('name')->implode('-')}}</td>
                                        <td class="px-6 mt-2 " >{{$user->company->name}}</td>
                                        <td class="px-6 mt-2 ">
                                            @if (($user->approved_by)== "")
                                                not approved yet
                                                @else {{$user->approved_by}}
                                            @endif
                                        </td>

                                        <td class="px-6 mt-2 ">{{$user->approved_at}}</td>

                                        <td class="text-center">
                                           <div>@livewire('toggle-button', ['model' => $user, 'field' => 'notify'], key($user->id))</div>
                                        </td>
                                        <td class="text-center">
                                            <div>@livewire('admin-button', ['model' => $user, 'field' => 'admin'], key($user->id))</div>
                                        </td>
                                        <td>
                                            <x-jet-button>
                                                <a href="{{url('/user/'.$user->id.'/approve')}}"                                                >
                                                    Approve
                                                </a>
                                            </x-jet-button>
                                        </td>
                                        <td>
                                            <x-jet-button>
                                                <a href="{{route('user.edit',$user->id)}}"                                                >
                                                    Edit
                                                </a>
                                            </x-jet-button>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
                                        colspan="7">
                                        <div class="flex items-center justify-center py-8 text-2xl text-gray-400">
                                            Sorry, No data found....
                                        </div>
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            --}}{{--{{$users->links()}}--}}{{--
            @if (session()->has('message'))
                <div class="bg-green-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert"
                     x-data="{open: true}"
                     x-init="setTimeout(()=>(open=false),750)"
                     x-show="open"
                     x-transition:leave.duration.1000>
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>--}}



</x-app-layout>
