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
                <form action="" id="check-list-create">
                    <div class="check-list-head">
                        <input type="textarea" name="check-list-name" placeholder="Enter checklist name">
                        <input type="text" name="check-list-description" placeholder="Enter checklist description">
                        <label>Select background color:</label>
                        <input type="color" name="check-list-color">

                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description">
                        <input type="checkbox" name="is-done">
                        <input type="number" class="item-order" placeholder="Order" name="item-order">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description">
                        <input type="checkbox" name="is-done">
                        <input type="number" class="item-order" placeholder="Order" name="item-order">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description">
                        <input type="checkbox" name="is-done">
                        <input type="number" class="item-order" placeholder="Order" name="item-order">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description">
                        <input type="checkbox" name="is-done">
                        <input type="number" class="item-order" placeholder="Order" name="item-order">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description">
                        <input type="checkbox" name="is-done">
                        <input type="number" class="item-order" placeholder="Order" name="item-order">
                    </div>
                </form>
            </section>
        </div>
    </div>
<span>hey</span>
@endsection
