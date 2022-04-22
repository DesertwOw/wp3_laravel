<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name:</th>
                            <th>Email:</th>
                        </tr>
                    </thead>
                    <table>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                            <a href="{{ url('/user/edit/'.$user->id) }}" class="btn btn-primary">Edit</a>
                            </td> 
                            <td>
                                <form action="{{ url('/user/delete/'.$user->id)}}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <x-button class="btn btn-danger">Delete</x-button>
                                </form>
                            </td>
                        <tr>
                        @empty
                        <tr>
                            <td colspan="6"> No User found</td>
                        </tr>
                        @endforelse
                    </table>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>