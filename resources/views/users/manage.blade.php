@extends('layout')

@section('content')

    <section class="adminSection">
        <h1 class="reveal animationShow">
            Manage Users
        </h1>
        <div class="allCardsContainer">
            <ul class="lg:grid lg:grid-cols-2">
                @unless ($users->isEmpty())
                    @foreach ($users as $user)
                        <li id="userLi" class="adminContent reveal animationScale">
                            <a id="nameUser" href="/users/{{ $user->id }}">
                                {{ $user->firstname }} {{ $user->lastname }}
                            </a>
                            {{-- <a href="/users/{{ $user->id }}/edit">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a> --}}

                            {{-- <form action="/users/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="text-red-500">
                                <i class="fa-solid fa-trash"></i>Delete
                            </button>
                        </form> --}}

                            <section class="iconsDashboard">
                                {{-- Edit button container --}}
                                <div>
                                    <a href=""><i class="fa-solid fa-pen-to-square icon"></i></a>
                                </div>

                                {{-- View button container
                                <div>
                                    <a href=""><i class="fa-solid fa-pencil icon"></i></a>
                                </div> --}}

                                {{-- Delete button container --}}
                                <div>
                                    <a href=""><i class="fa-solid fa-trash icon"></i></a>
                                </div>
                            </section>
                        </li>
                    @endforeach
            </ul>
                @else
                    <p class="text-center">No Users found</p>
                @endUnless
                <div class="mt-6 p-4 reveal animationLeft">
                    {{ $users->links() }}
                </div>
    </section>



@endsection
