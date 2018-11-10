@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include ('layouts.message')

                <p>Check lists</p>
                @if (empty($checkLists) || empty($checkLists->items()))
                    @guest
                        <p class="alert alert-danger">Authorize to manager yours lists</p>
                    @else
                        <p class="alert alert-info"><a href="{{ route('index') }}">Create </a>your first list</p>
                    @endguest
                @else
                    <ul class="list-group">
                        @foreach ($checkLists as $checkList)
                            <li class="list-group-item"><a
                                        href="{{ route('list.show', ['name' => $checkList->name]) }}">Title: {{ $checkList->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    {{ $checkLists->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
