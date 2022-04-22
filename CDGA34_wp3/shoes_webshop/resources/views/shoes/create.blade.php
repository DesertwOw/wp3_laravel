<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add shoes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-success-status class="mb-4" :status="session('message')"/>

        <x-validation-errors class="mb-4" :errors="$errors"/>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('create.addshoe')}}" method="POST">
                    @csrf
                    <div>
                        <x-label for="model_name" :value="__('Model Name')" />
                        <x-input id="model_name" class="block mt-1 w-full" type="text" name="model_name" :value="old('model_name')" required autofocus />
                    </div>
                    <div>
                        <x-label for="manufacturer_brand" :value="__('Manufacturer Brand: ')" />
                        <x-input id="manufacturer_brand" class="block mt-1 w-full" type="text" name="manufacturer_brand" :value="old('manufacturer_brand')" required autofocus />
                    </div>
                    <div>
                        <x-label for="size" :value="__('Size')" />
                        <x-input id="size" class="block mt-1 w-full" type="text" name="size" :value="old('size')" required autofocus />
                    </div>
                    <div>
                        <x-label for="price" :value="__('Price')" />
                        <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus />
                    </div>
                    <div>
                        <x-label for="gender" :value="__('Gender')" />
                        <x-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autofocus />
                    </div>
                    <x-button class="ml-3">
                        {{ __('Add shoe!') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>