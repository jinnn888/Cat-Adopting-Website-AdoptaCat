@props([
'cat' => null,
])
<div class='w-[250px] rounded bg-white border'> <!-- Fixed width instead of w-fit -->
    <div class='flex flex-col space-y-4'>
        <img class='object-cover w-full h-[250px]' src="{{ $cat->images->isNotEmpty() ? Storage::url($cat->images->first()->image): '' }}" alt="cat">
        <div class='flex flex-col space-y-2 text-gray-800 text-sm p-3'>
            <div class='flex flex-col space-y-4'>
                <span class='text-lg font-medium md:text-xl'>{{ $cat ? $cat->breed : '' }} </span>
                <span>₱{{ $cat->adoption_fee }}</span>
            </div>
            <hr class='w-full my-2'>
            <div class='flex flex-row space-x-2 justify-center py-2'>
                <a href="{{ route('home.cats.show', $cat->id) }}" class='bg-gray-800 text-white p-2 cursor-pointer'>Check me out</a>
            </div>
        </div>
    </div>
</div>
