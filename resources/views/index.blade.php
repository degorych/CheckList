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
                @if(session()->has('message'))
                    <p class="alert alert-info">{{ session()->get('message') }}</p>
                @endif
                <form method="post" action="{{ route('newCheckList') }}" id="check-list-create">
                    @csrf
                    <div class="check-list-head">
                        <input type="textarea" name="check-list-name" placeholder="Enter checklist name">
                        <input type="text" name="check-list-description" placeholder="Enter checklist description">
                        <label>Select background color:</label>
                        <input type="color" name="check-list-color">

                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[0]">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[0]">
                        <input type="checkbox" name="is-done[0]">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[0]">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[1]">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[1]">
                        <input type="checkbox" name="is-done[1]">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[1]">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[2]">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[2]">
                        <input type="checkbox" name="is-done[2]">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[2]">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[3]">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[3]">
                        <input type="checkbox" name="is-done[3]">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[3]">
                    </div>
                    <div class="check-list-item">
                        <input type="text" class="item-title" placeholder="Tile" name="item-title[4]">
                        <input type="text" class="item-descripton" placeholder="Description" name="item-description[4]">
                        <input type="checkbox" name="is-done[4]">
                        <input type="number" class="item-order" placeholder="Order" name="item-order[4]">
                    </div>
                    <button>Send</button>
                </form>
            </section>
        </div>
    </div>
@endsection
