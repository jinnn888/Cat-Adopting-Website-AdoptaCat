@extends('welcome')
@section('content')
<div class='flex justify-center w-full items-center'>
    <div class=''>
        <div class='text-lg font-medium mb-4 flex flex-row items-center p-2'>
            My Cats <span><img class='w-[40px]'src="/images/cute.png" alt=""></span>
            <span><a href="{{ route('cats.create') }}" class='text-blue-500 italic font-light hover:underline text-md'>Add new cat here!</a></span>
            </div>
        <div>
            <table class=" rounded-lg shadow-sm text-sm lg:text-md">
                <thead class='border '>
                    <th class='font-light border-r p-2'>Image</th>
                    <th class='font-light border-r p-2'>Name</th>
                    <th class='font-light border-r p-2'>Breed</th>
                    <th class='font-light border-r p-2'>Date</th>
                    <th class='font-light p-2'></th>
                </thead>
                <tbody>
                    @foreach ($cats as $cat)
                    <tr class='border'>
                        <td class='font-light border-r p-2'><img class='w-[100px] object-cover' src="{{ Storage::url($cat->images->first()->image) }}" alt=""></td>
                        <td class='font-light border-r p-2'>{{ $cat->name }}</td>
                        <td class='font-light border-r p-2'>{{ Str::limit($cat->breed, 8) }}</td>
                        <td class='font-light border-r p-2'>{{ $cat->created_at->format('d/m/Y') }}</td>
                        <td class='p-2'>
                            {{-- <a href="{{ route('cats.edit', $cat->id) }}" class='text-blue-700 text-sm'>Edit</a>
                            <a href="{{ route('cats.image.edit', $cat->id) }}" class='text-blue-700 text-sm'>Images</a>
                            <a href="" class='text-red-700 text-sm'>Delete</a> --}}
                            <!-- Settings Dropdown -->
                            <div class="">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-800 bg-white hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                                            <div>Options</div>
                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('cats.edit', $cat->id)">
                                            <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('cats.image.edit', $cat->id)">
                                            <i class="fas fa-images"></i> {{ __('Images') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('cats.create')">
                                            <i class="fas fa-trash"></i> {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                            </div>
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
