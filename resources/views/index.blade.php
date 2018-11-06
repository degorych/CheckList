@extends('layouts.app')

@section('content')

    <style>
        .check-list-head {
            width: 200px;
        }
        .check-list-head input {
            width: 200px;
            margin: 10px;
        }
        .check-list-item {
            margin: 10px;
        }
        .item-title {
            width: 200px;
        }
        .item-descripton {
            width: 400px;
        }
        .item-order {
            width: 55px;
        }

    </style>
    <div class="container">
        <div class="row">
            <section class="create-check-list-block">
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
                <form method="post" action="{{ route('list.store') }}" id="check-list-create">
                    @csrf
                    <div class="check-list-head">
                        <input type="text" class="form-control" name="check-list-title" placeholder="Enter checklist name" value="{!! old('check-list-name') !!}">
                        <textarea type="text" class="form-control" name="check-list-description" placeholder="Enter checklist description">{!! old('check-list-description') !!}</textarea>
                        <label>Select background color:</label>
                        <input type="color" name="check-list-color">

                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[]" value="{!! old('item-title.0') !!}">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[]" value="{!! old('item-description.0') !!}">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[]" value="{!! old('item-order.0') !!}">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[]" value="{!! old('item-title.1') !!}">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[]" value="{!! old('item-description.1') !!}">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[]" value="{!! old('item-order.1') !!}">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[]" value="{!! old('item-title.2') !!}">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[]" value="{!! old('item-description.2') !!}">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[]" value="{!! old('item-order.2') !!}">
                    </div>

                    <button class="btn btn-info">Send</button>
                </form>
            </section>
        </div>
    </div>
@endsection
