@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('layouts.message')

                <h2>{{ $checkList['name'] }}</h2>
                <p>{{ $checkList['description'] }}</p>
                <form action="{{ route('done', ['name' => $checkList['name']]) }}" method="post">
                    @csrf
                    @foreach($checkListParams as $param)
                        <div class="form-check">
                            <label>
                                <input type="checkbox" {{ $param['is_done'] ? 'checked' : '' }} name="is-done[{{ $param['id'] }}]">
                                <span class="label-text">{{ $param['title'] }}</span>
                            </label>
                            <p>Description: {{ $param['description'] }}</p>
                        </div>
                    @endforeach
                    <button class="btn btn-success">Save</button>
                    <a href="{{ route('list.edit', ['name' => $checkList['name']]) }}"
                       class="btn btn-info">Edit</a>
                </form>
            </div>
        </div>
    </div>
@endsection
