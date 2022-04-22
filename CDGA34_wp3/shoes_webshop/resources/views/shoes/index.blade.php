<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List shoes') }}
        </h2>
    </x-slot>
    @if (session('message'))
        <div>{{ session('message')}} </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-success-status class="mb-4" :status="session('message')"/>

            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Model Name:</th>
                            <th>Manufacturer Brand:</th>
                            <th>Size:</th>
                            <th>Price:</th>
                            <th>Gender:</th>
                            <th>Select:</th>
                            <th>Edit:</th>
                            <th>Delete:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shoes as $shoe)
                            <tr>
                                <td>{{$shoe->model_name}}</td>
                                <td>{{$shoe->manufacturer_brand}}</td>
                                <td>{{$shoe->size}}</td>
                                <td>{{$shoe->price}}</td>
                                <td>{{$shoe->gender}}</td>
                                <td>
                                    <form action="{{url('addcart/'.$shoe->id)}}" method="POST">
                                    @csrf
                                        <input type="number" value="1" min="1" class="form-control" style="width:100px" name="">
                                        
                                        <br>

                                        <input class="btn btn-primary" type="submit" value="Add to Cart">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ url('/shoes/edit/'.$shoe->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('/shoes/delete/'.$shoe->id)}}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <x-button class="btn btn-danger">Delete</x-button>
                                    </form>
                                </td>                               
                            <tr>
                            @empty
                            <tr>
                                <td colspan="6"> No Shoe found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>