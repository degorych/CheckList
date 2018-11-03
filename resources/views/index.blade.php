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
                <form method="post" action="{{ route('newCheckList') }}" id="check-list-create">
                    @csrf
                    <div class="check-list-head">
                        <input type="textarea" class="form-control" name="check-list-name" placeholder="Enter checklist name">
                        <input type="text" class="form-control" name="check-list-description" placeholder="Enter checklist description">
                        <label>Select background color:</label>
                        <input type="color" name="check-list-color">

                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[]">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[]">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[]">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[]">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[]">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[]">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[]">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[]">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[]">
                    </div>

                    <button class="btn btn-info">Send</button>
                </form>
            </section>
        </div>
    </div>
@endsection
