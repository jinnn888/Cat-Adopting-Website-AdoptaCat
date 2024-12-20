@extends('welcome')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 p-4">
        <h1 class='font-medium'>Add New Purr</h1>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div>
                @if ($errors->hasAny())
                @foreach ($errors as $error)
                <p>{{ $error }}</p>
                {{-- expr --}}
                @endforeach
                {{-- expr --}}
                @endif
                <form action="{{ route('cats.update', $cat->id) }}" method='POST' enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    {{-- Name --}}
                    <div class='mb-3'>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $cat->name)" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    {{-- Breed --}}
                    <div>
                        <x-input-label for="breed" :value="__('Breed')" />
                        <x-text-input id="breed" class="block mt-1 w-full" type="text" name="breed" :value="old('breed', $cat->breed)"  />
                        <x-input-error :messages="$errors->get('breed')" class="mt-2" />
                    </div>
                    {{-- Age --}}
                    <div class='flex flex-row items-center space-x-2 mt-2'>
                        <div>
                            <x-input-label for="age" :value="__('Age')" />
                            <x-text-input id="age" class="block w-full" type="number" name="age" :value="old('age', $cat->age)"  />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>
                        {{-- Gender --}}
                        @php
                        $genders = ['male', 'female'];
                        @endphp
                        <div>
                            <x-input-label for="gender" :value="__('Gender')" />
                            <x-select :options="$genders" id="gender" name="gender" :selected="$cat->gender"/>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                    </div>
                    {{-- Description --}}
                    <div class='mb-3'>
                        <x-input-label for="gender" :value="__('Description')" />
                        {{-- <textarea name="" id=""></textarea> --}}
                        <x-textarea class='w-full' name='description' :old='old("description", $cat->description)'/>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    {{-- Temperament --}}
                    <div class='mb-3'>
                        <x-input-label for="temperament" :value="__('Temperament')" />
                        <x-text-input id="temperament" class="block mt-1 w-full" type="text" name="temperament" :value="old('temperament', $cat->temperament)"  placeholder='e.g. playful, calm, hyper' />
                        <x-input-error :messages="$errors->get('temperament')" class="mt-2" />
                    </div>
                    {{-- Adoption Fee --}}
                    <div class='mb-3'>
                        <x-input-label for="adoption_fee" :value="__('Adoption Fee')" />
                        <x-text-input id="adoption_fee" step='0.01' class="block mt-1 w-full" type="number" name="adoption_fee" :value="old('adoption_fee', $cat->adoption_fee)" />
                        <x-input-error :messages="$errors->get('adoption_fee')" class="mt-2" />
                    </div>
                    <x-primary-button type='submit'>Submit</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
