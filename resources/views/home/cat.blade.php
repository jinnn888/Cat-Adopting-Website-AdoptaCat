@extends('welcome')
@section('content')
@php
$image = $cat->images()->inRandomOrder()->first();
@endphp
<div class='bg-gray-50'>
    <div class='p-6 flex flex-col space-y-4'>
        <h2 class='mb-4 text-4xl font-bold text-gray-700'>{{ $cat->name }}</h2>
        <div class='flex flex-col lg:flex-row space-y-4 lg:space-x-4 lg:justify-between'>
            {{-- Cat Images --}}
            <div class="slider-wrapper flex flex-col items-center lg:flex-row space-y-4 lg:space-x-4">
                <div class='flex flex-col items-center p-4 space-y-2'>
                    {{-- Main Slider --}}
                    <div class="main-slider w-[300px] lg:w-[500px]">
                        @foreach($cat->images as $image)
                        <div>
                            <img class="w-[500px] h-[500px] object-cover rounded-lg lg:mx-auto" src="{{ Storage::url($image->image) }}" alt="cat image">
                        </div>
                        @endforeach
                    </div>
                    {{-- Thumbnail Slider --}}
                    <div class="thumbnail-slider w-[300px]  lg:w-[500px] space-x-2">
                        @foreach($cat->images as $image)
                        <div>
                            <img class="w-[300px] h-[100px] lg:w-[500px] object-cover rounded-md border-2 border-gray-300" src="{{ Storage::url($image->image) }}" alt="cat thumbnail">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Cat Details --}}
            <div class='bg-white rounded shadow-sm flex flex-col items-center text-gray-500 p-3 lg:border lg:w-[300px] lg:h-fit'>
                <h2 class='font-bold text-2xl'>₱{{ $cat->adoption_fee }}</h2>
                <hr class=' w-full my-2'>
                <div class='flex flex-row justify-between w-full p-2'>
                    <span>Breed </span>
                    <span>{{ $cat->breed }}</span>
                </div>
                <div class='flex flex-row justify-between w-full p-2'>
                    <span>Gender</span>
                    <span>{{ ucfirst($cat->gender) }}</span>
                </div>
                <div class='flex flex-row justify-between w-full p-2'>
                    <span>Temperament</span>
                    <span>{{ ucfirst($cat->temperament) }}</span>
                </div>
                <hr class=' w-full my-2'>
                {{-- Contact --}}
                <div class='flex flex-row justify-between w-full p-4 items-center space-x-2'>
                    <img src="https://placehold.co/50x50" class='rounded-full'>
                    <div class='flex-grow'>
                        <span class='block'>{{ $cat->user->name }}</span>
                        <span>{{ $cat->user->cats()->count() }} cats</span>
                    </div>
                </div>
                <div class='border p-4 border-gray-500 rounded'>
                    <span><i class="fas fa-envelope"></i>{{ $cat->user->email }}</span>
                </div>
            </div>
        </div>
        {{-- Description --}}
        <div class='lg:w-10/12 bg-white rounded shadow-sm flex flex-col items-center text-gray-500 p-2'>
            <h1 class='text-gray-700 font-bold text-2xl'>Detailed Description</h1>
            <p>{{ $cat->description }}</p>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('.main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.thumbnail-slider'
    });

    $('.thumbnail-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.main-slider',
        dots: true,
        focusOnSelect: true
    });
});

</script>
@endpush
