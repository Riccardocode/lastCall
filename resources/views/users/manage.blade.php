@extends('layout2')

@section('content')
    
<header>
    <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Users
    </h1>
</header>
<table class="w-full table-auto rounded-sm">
    <tbody>
        @unless ($users->isEmpty())
            @foreach ($users as $user)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/users/{{ $user->id }}">
                            {{ $user->firstname }} {{ $user->lastname }}
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/users/{{ $user->id }}/edit">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                      
                        <form action="/users/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="text-red-500">
                                <i class="fa-solid fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="border-grey-300">
                <td class="px-4 py-8 border-t border-b border-grey-300 text-lg">
                    <p class="text-center">No Users found</p>
                </td>
            </tr>
        @endUnless
    </tbody>
</table>


@endsection 
