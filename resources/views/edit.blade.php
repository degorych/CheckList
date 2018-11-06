@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(session()->has('message'))
                    <p class="alert alert-info">{{ session()->get('message') }}</p>
                @endif

                @if(session()->has('error'))
                    <p class="alert alert-danger">{{ session()->get('error') }}</p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2>{{ $checkList['name'] }}</h2>
                <p>{{ $checkList['description'] }}</p>
                <form action="{{ route('list.update', ['name' => $checkList['name']]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-check">
                        <label>
                            <span>Check list title:</span><input type="text" name="check-list-title"
                                                                 value="{{ $checkList['name'] }}">
                        </label>
                        <label>
                            <span>Check list description:</span><textarea type="text"
                                                                          name="check-list-description">{{ $checkList['description'] }}</textarea>
                        </label>
                    </div>
                    @foreach($checkListParams as $param)
                        <div class="form-check">
                            <label>
                                <span>Title:</span><input type="text" name="item-title[{{ $param['id'] }}]"
                                                          value="{{ $param['title'] }}">
                            </label>
                            <label>
                                <span>Description</span><input type="text" name="item-description[{{ $param['id'] }}]"
                                                               value="{{ $param['description'] }}">
                            </label>
                            <label>
                                <span>Order:</span><input type="number" name="item-order[{{ $param['id'] }}]"
                                                          value="{{ $param['order'] }}">
                            </label>
                            <label>
                                <input type="checkbox"
                                       name="is_done[{{ $param['id'] }}]" {{ $param['is_done'] === 1 ? 'checked' : '' }}>
                                <span class="label-text">done</span>
                            </label>
                        </div>
                        <hr>
                    @endforeach
                    <button class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
