@extends('welcome')

@section('content')

<section id="cats">
	<div class='py-12'>
		<div class='text-center'>
			<h1 class='text-4xl sm:text-2xl text-gray-800 font-medium'>Your Favourite Cats</h1>
		</div>
		<p class="p-4 text-gray-600 text-center mb-12">
            Your chosen feline friend is waiting to bring love and joy into your life—why not make it official and give them the forever home they deserve today?
        </p>
        <div class='p-12 justify-center gap-4 flex flex-row flex-wrap '>
        		@foreach ($favourites as $cat)
        			@php
        				$favourited = auth()->user()->favourites()->where('cat_id', $cat->id)->exists();
        			@endphp
	       	 		<x-cat-card :cat="$cat" :favourite='$favourited'/>
        		@endforeach
        </div>
	</div>
</section>


@endsection