@extends('welcome')
@section('content')
{{--
$table->id();
$table->string('name');// Cat's name
$table->foreignId('user_id')->constrained()->cascadeOnDelete();
$table->integer('age')->nullable(); // Cat's age (in years)
$table->string('breed')->nullable(); // Cat's breed
$table->enum('gender', ['male', 'female'])->nullable(); // Cat's gender
$table->boolean('is_adopted')->default(false);
$table->text('description')->nullable(); // Short description or bio
$table->string('temperament')->nullable();// Cat's temperament (e.g., playful, calm)
$table->boolean('available')->default(true); // Availability for rental
$table->string('image')->nullable(); // Path to cat's image
$table->decimal('price', 8, 2)->nullable(); // Price for renting (e.g., per day)
$table->timestamps();
--}}
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
                <form action="{{ route('cats.store') }}" method='POST' enctype="multipart/form-data">
                    @csrf
                    {{-- Name --}}
                    <div class='mb-3'>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    {{-- Breed --}}
                    <div>
                        <x-input-label for="breed" :value="__('Breed')" />
                        <x-text-input id="breed" class="block mt-1 w-full" type="text" name="breed" :value="old('breed')"  />
                        <x-input-error :messages="$errors->get('breed')" class="mt-2" />
                    </div>
                    {{-- Age --}}
                    <div class='flex flex-row items-center space-x-2 mt-2'>
                        <div>
                            <x-input-label for="age" :value="__('Age')" />
                            <x-text-input id="age" class="block w-full" type="number" name="age" :value="old('age')"  />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>
                        {{-- Gender --}}
                        @php
                        $genders = ['male', 'female'];
                        @endphp
                        <div>
                            <x-input-label for="gender" :value="__('Gender')" />
                            <x-select :options="$genders" id="gender" name="gender" />
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                    </div>
                    {{-- Description --}}
                    <div class='mb-3'>
                        <x-input-label for="gender" :value="__('Description')" />
                        {{-- <textarea name="" id=""></textarea> --}}
                        <x-textarea class='w-full' name='description' :old='old("description")'/>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    {{-- Temperament --}}
                    <div class='mb-3'>
                        <x-input-label for="temperament" :value="__('Temperament')" />
                        <x-text-input id="temperament" class="block mt-1 w-full" type="text" name="temperament" :value="old('temperament')"  placeholder='e.g. playful, calm, hyper' />
                        <x-input-error :messages="$errors->get('temperament')" class="mt-2" />
                    </div>
                    {{-- Adoption Fee --}}
                    <div class='mb-3'>
                        <x-input-label for="adoption_fee" :value="__('Adoption Fee')" />
                        <x-text-input id="adoption_fee" step='0.01' class="block mt-1 w-full" type="number" name="adoption_fee" :value="old('adoption_fee')" />
                        <x-input-error :messages="$errors->get('adoption_fee')" class="mt-2" />
                    </div>
                    {{-- Image --}}
                    <div id="previewContainer" class="flex flex-wrap gap-2">
                         <!-- Image previews will be dynamically added here -->
                    </div>
                    <div class="mb-3">
                        <x-input-label for="images" :value="__('Images')" />
                        <x-text-input id="images" class="block mt-1 w-full" type="file" name="images[]" multiple accept=".jpg,.jpeg,.png" />
                        <x-input-error :messages="$errors->get('images.*')" class="mt-2" />
                    </div>
                    <x-primary-button type='submit'>Submit</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
    $(document).ready(function () {
        // Function to preview images
        function previewImages(event) {
            var input = event.target;
            var previewContainer = $('#previewContainer');
            previewContainer.html(''); // Clear previous previews
            
            if (input.files) {
                Array.from(input.files).forEach((file) => {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $('<img>')
                            .attr('src', e.target.result)
                            .addClass('w-24 h-24 object-cover rounded shadow border');
                        previewContainer.append(img);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        // Bind change event to file input
        $('#images').on('change', function (event) {
            previewImages(event);
        });
    });
</script>
@endpush

@endsection
