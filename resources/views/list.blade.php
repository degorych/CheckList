@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Check lists</p>

                <ul class="list-group">
                    @foreach ($checkLists as $checkList)
                        <li class="list-group-item"><a href="{{ route('list.show', ['name' => $checkList->name]) }}">Title: {{ $checkList->name }}</a></li>
                    @endforeach
                </ul>

                {{ $checkLists->links() }}
            </div>
        </div>
    </div>
@endsection