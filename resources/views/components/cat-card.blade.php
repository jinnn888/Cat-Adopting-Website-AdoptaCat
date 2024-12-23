@props([
'cat' => null,
'favourite' => false
])
<div class='w-[230px]  h-[150px] rounded bg-white border'>
    <!-- Fixed width instead of w-fit -->
    <div class='flex flex-col space-y-2'>
        <img class='object-cover h-[200px] w-[200px]' src="{{ $cat->images->isNotEmpty() ? Storage::url($cat->images->first()->image): '' }}" alt="cat">
        <div class='flex flex-col space-y-2 text-gray-800 text-sm p-3'>
            <div class='flex flex-col space-y-4'>
                <span class='text-lg font-medium md:text-xl'>{{ $cat ? $cat->breed : '' }} </span>
                <span>₱{{ $cat->adoption_fee }}</span>
            </div>
            <hr class='w-full my-2'>
            <div class='flex flex-row space-x-2 justify-center py-2'>
                <a href="{{ route('home.cats.show', $cat->id) }}" class='bg-gray-800 text-white p-2 cursor-pointer'>Check me out</a>
                @if(!$favourite)
                <form action="{{ route('favourites.store') }}" method='POST'>
                    @csrf
                    <input name='cat_id' type="hidden" value='{{ $cat->id }}'>
                    <button class="underline text-sm text-gray-500 p-2">
                        &lt;3
                    </button>
                </form>
                @endif
                @if($favourite)
                <form  action="{{ route('favourites.destroy', $cat->id) }}" method='POST'>
                    @csrf
                    {{-- @method('DELETE') --}}
                    <input name='cat_id' type="hidden" value='{{ $cat->id }}'>
                    <button type='submit' class="underline text-sm text-gray-500 p-2">
                        Unfavourite
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
