@extends('welcome')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 p-4">
        <h1 class='font-medium'>Edit Images</h1>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form action="{{ route('cats.image.update', $cat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <!-- Delete images section -->
                <div class='flex flex-col space-y-4'>
                    <table>
                        <thead>
                            <th class='font-light text-gray-700 text-sm text-left'>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($cat->images as $image)
                            <tr>
                                <td class='flex flex-row justify-between items-center'>
                                    <input type="checkbox" name='selected_images[]' value='{{ $image->id }}'>
                                    <div>
	                                    <img class='w-[200px] h-[200px] object-contain' src="{{ Storage::url($image->image) }}" alt="">
     	                               <x-text-input type='number'/>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Add images section -->
                <div>
                    <x-input-label>Add Images</x-input-label>
                    <input type="file" multiple name='images[]'>
                </div>
                <x-primary-button type="submit" class='w-fit'>Publish changes</x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection
