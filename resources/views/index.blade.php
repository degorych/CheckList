@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @include('layouts.error')

            <form method="post" action="{{ route('list.store') }}" id="check-list-create"
                  class="col-lg-7 form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="check-list-title" class="col-sm-2 control-label">Title:</label>
                    <div class="col-sm-10">
                        <input type="text" id="check-list-title" class="form-control" name="check-list-title"
                               placeholder="Enter checklist name" value="{!! old('check-list-title') !!}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="check-list-description" class="col-sm-2 control-label">Description:</label>
                    <div class="col-sm-10">
                            <textarea type="text" id="check-list-description" class="form-control"
                                      name="check-list-description"
                                      placeholder="Enter checklist description">{!! old('check-list-description') !!}</textarea>
                    </div>
                </div>

                <input type="hidden" id="counter" name="check-list-counter" value="1">

                <div class="form-group row">
                    <label for="check-list-color" class="col-sm-5 control-label">Select background color:</label>
                    <div class="col-sm-2">
                        <input id="check-list-color" type="color" name="check-list-color">
                    </div>
                </div>
                <div id="items" class="form-group">

                    @php
                        $counter = old('check-list-counter') ?? 1;
                    @endphp

                    @for ($i = 0; $i < $counter; $i++)
                        <div class="card">
                            <div class="card-body item-card">
                                <div class="row">
                                    <div class="form-check checkbox-ver-mar">
                                        <input type="checkbox">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control-plaintext form-control-lg"
                                               name="item-title[{{ $i }}]"
                                               placeholder="Title"
                                               value="{{ old("item-title.$i") }}">
                                        <input type="text" class="form-control-plaintext"
                                               name="item-description[{{ $i }}]"
                                               placeholder="Description"
                                               value="{{ old("item-description.$i") }}">
                                        <input type="hidden" name="item-order[{{ $i }}]" value="{{ $i }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
                <button class="btn btn-success">Send</button>
                <a href="" id="item-add" class="btn btn-info">Add</a>
            </form>
        </div>
    </div>
@endsection
