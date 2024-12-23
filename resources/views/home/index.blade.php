@extends('welcome')

@section('content')

<div>
	<div class='flex flex-col-reverse xl:flex-row justify-between items-center p-3 '>
		
		<div class='flex-grow text-center space-y-4'>
			<h1 class='text-4xl lg:text-5xl font-bold text-gray-800 leading-tight'>Find Your Purr-fect Companion, One Meow at a Time</h1>
			<p class='text-gray-600 text-lg'>Adopt adorable cats for companionship, events, or therapy sessions. Flexible plans and a variety of lovable breeds to choose from!</p>
			
			<div class='mt-4 p-4 '>
				<a class='hover:bg-gray-900 duration-200 bg-gray-800 text-white p-4 w-fit' href="#cats" >Explore Cats</a>
				
			</div>
			
		</div>
		
		<div>
			<img class='w-[250px] sm:w-[300px]  md:w-[600px]' src="{{ asset('images/cat-hero_11zon.png') }}" alt="Hero Cat Image">
		</div>
		
	</div>
</div>

{{-- Cat Section --}}
<section id="cats">
	<div class='py-12'>
		
		<div class='text-center'>
			<h1 class='text-4xl sm:text-2xl text-gray-800 font-medium'>Meet Our Cats</h1>
		</div>
		<p class="p-4 text-gray-600 text-center mb-12">
			Browse our adorable cats and find the purr-fect companion for your needs.
		</p>
		<form action="{{ route('home') }}" method='GET'>
			@csrf
			<div class='w-full p-2  bg-gray-100 rounded flex flex-row  justify-center items-center gap-2'>
				<select name="search" id="search" class='rounded shadow-sm'>
					<option value="" disabled selected>Filter by breed</option>
					<option value="all">All</option>
					<option value="siamese">Siamese</option>
					<option value="persian">Persian</option>
					<option value="maine Coon">Maine Coon</option>
					<option value="ragdoll">Ragdoll</option>
					<option value="bengal">Bengal</option>
					<option value="sphynx">Sphynx</option>
					<option value="british Shorthair">British Shorthair</option>
					<option value="abyssinian">Abyssinian</option>
					<option value="birman">Birman</option>
					<option value="oriental Shorthair">Oriental Shorthair</option>
				</select>
				
				<button class='p-2 bg-gray-800 text-white rounded '>Search</button>
				
			</div>
		</form>
		
		<div class='p-12 justify-center gap-4 flex flex-row flex-wrap '>
			@foreach ($cats as $cat)
			@php
			$favourite = auth()->check() ? auth()->user()->favourites()->where('cat_id', $cat->id)->exists(): false ;
			@endphp
			<x-cat-card :cat="$cat" :favourite='$favourite'/>
			@endforeach
		</div>
	</div>
</section>


@endsection