@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(session()->has('message'))
                    <p class="alert alert-info">{{ session()->get('message') }}</p>
                @endif

                <h2>{{ $checkList['name'] }}</h2>
                <p>{{ $checkList['description'] }}</p>
                <form action="{{ route('updateList', ['name' => $checkList['name']]) }}" method="post">
                    @csrf
                    @foreach($checkListParams as $param)
                        <div class="form-check">
                            <label>
                                <span>Title:</span><input type="text" name="title[{{ $param['id'] }}]" value="{{ $param['title'] }}">
                            </label>
                            <label>
                                <span>Description</span><input type="text" name="description[{{ $param['id'] }}]" value="{{ $param['description'] }}">
                            </label>
                            <label>
                                <span>Order:</span><input type="number" name="order[{{ $param['id'] }}]" value="{{ $param['order'] }}">
                            </label>
                        </div>
                    @endforeach
                    <button class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
