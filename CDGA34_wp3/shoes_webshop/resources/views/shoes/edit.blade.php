<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add shoes') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <x-validation-errors class="mb-4" :errors="$errors"/>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{url('/shoes/edit/'.$id->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="model_name" :value="__('Model Name')" />
                        <x-input id="model_name" class="block mt-1 w-full" type="text" name="model_name" :value="$id->model_name" required autofocus />
                    </div>
                    <div>
                        <x-label for="manufacturer_brand" :value="__('Manufacturer Brand: ')" />
                        <x-input id="manufacturer_brand" class="block mt-1 w-full" type="text" name="manufacturer_brand" :value="$id->manufacturer_brand" required autofocus />
                    </div>
                    <div>
                        <x-label for="size" :value="__('Size')" />
                        <x-input id="size" class="block mt-1 w-full" type="text" name="size" :value="$id->size" required autofocus />
                    </div>
                    <div>
                        <x-label for="price" :value="__('Price')" />
                        <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="$id->price" required autofocus />
                    </div>
                    <div>
                        <x-label for="gender" :value="__('Gender')" />
                        <x-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="$id->gender" required autofocus />
                    </div>
                    <x-button class="ml-3">
                        {{ __('Update shoe!') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>