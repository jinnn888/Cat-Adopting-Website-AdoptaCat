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
                    <table class='p-4'>
                        <thead class=''>
                            <th class='font-light text-gray-700 text-sm text-left'>Delete</th>
                            <th class='font-light text-gray-700 text-sm'>Change Order</th>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                            <tr>
                                <td class='rounded flex flex-row justify-between items-center'>
                                    <input class='rounded focus:ring-2  focus:ring-blue-500' type="checkbox" name='selected_images[]' value='{{ $image->id }}'>
                                </td>
								<td>
									
                                    <div>
	                                    <img class='w-[200px] h-[200px] mb-2 object-contain flex flex-col space-y-2' src="{{ Storage::url($image->image) }}" alt="">
     	                               <x-text-input type='number' name='position[{{ $image->id }}]' :value='$image->position'/>
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
                <x-primary-button type="submit" class='mt-4 w-fit'>save changes</x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection
