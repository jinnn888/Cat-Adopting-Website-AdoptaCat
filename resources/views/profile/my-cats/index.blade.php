@extends('welcome')
@section('content')
<div>
    <div class='p-4'>
        <h1 class='text-lg font-medium'>My Cats</h1>

        <div>
            <table class="w-full">
                <thead class='border bg-gray-50'>
                    <th class='border-r p-2'>Name</th>
                    <th class='border-r p-2'>Breed</th>
                    <th class='border-r p-2'>Date</th>
                    <th class='p-2'>Actions</th>
                </thead>
                <tbody>
                    @foreach ($cats as $cat)
                        <tr class='border'>
                            <td class='border-r p-2'>{{ $cat->name }}</td>
                            <td class='border-r p-2'>{{ $cat->breed}}</td>
                            <td class='border-r p-2'>{{ $cat->created_at->format('F d, Y') }}</td>
                            <td class='p-2'>
                                <a href="{{ route('cats.edit', $cat->id) }}" class='text-blue-700 text-sm'>Edit</a>
                                <a href="{{ route('cats.image.edit', $cat->id) }}" class='text-blue-700 text-sm'>Images</a>
                                <a href="" class='text-red-700 text-sm'>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>         

            <div class="mt-4">
                {{ $cats->links() }}
            </div>

        </div>
    </div>





</div>
@endsection
