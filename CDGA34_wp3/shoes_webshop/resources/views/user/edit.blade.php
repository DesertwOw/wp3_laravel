<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update user') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <x-validation-errors class="mb-4" :errors="$errors"/>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{url('/user/edit/'.$id->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="name" :value="__('Name:')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$id->name"  />
                    </div>
                    <div>
                        <x-label for="email" :value="__('Email: ')" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$id->email"/>
                    </div>
                    <x-button class="ml-3">
                        {{ __('Update user!') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>