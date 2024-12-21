@props([
	'cat' => null
])
<div class='w-fit p-2 rounded bg-gray-50 border'>
    <div class='flex flex-col space-y-4'>
        <img class='object-cover w-[250px] md:w-[300px] md:h-[250px]' 
        src="{{ $cat->images->isNotEmpty() ? Storage::url($cat->images->first()->image): '' }}" 
        alt="cat">

        {{-- <i class="fas fa-heart text-gray-500 text-end cursor-pointer p-2"></i> --}}

        <div class='flex flex-col space-y-2 text-gray-800 text-sm items-center'>
            <span class='text-lg md:text-xl'>{{ $cat ? $cat->breed : '' }} </span>
            <span>₱{{ $cat->adoption_fee }}</span>
            <a href="{{ route('home.cats.show', $cat->id) }}" class='bg-gray-800 text-white p-2 cursor-pointer'>Check me out</a>
            <button class='underline text-sm text-gray-500 p-2'>Add to favourites</button>
        </div>
    </div>
</div>
