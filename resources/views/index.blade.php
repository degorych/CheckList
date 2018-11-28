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

                @php
                    $counter = old('check-list-counter') ?? 1;
                @endphp

                <input type="hidden" id="counter" name="check-list-counter" value="{{ $counter }}">

                <div class="form-group row">
                    <label for="check-list-color" class="col-sm-4 control-label">Select background color:</label>
                    <div id="color-selector" class="col-sm-6">
                        <input id="check-list-color" type="hidden" name="check-list-color">
                    </div>
                </div>
                <div id="items" class="form-group">

                    @for ($i = 0; $i < $counter; $i++)
                        <div class="card">
                            <div class="card-body item-card">
                                <div class="row">
                                    <label class="col item-container">
                                        <input type="checkbox" name="item-is-done[{{ $i }}]">
                                        <span class="checkmark"></span>
                                        <input type="text" class="form-control-plaintext form-control-lg item-title checkmark"
                                               name="item-title[{{ $i }}]"
                                               value="{{ old("item-title.$i") ?? '' }}" placeholder="Enter title">
                                        <input type="text" class="form-control-plaintext item-description"
                                               name="item-description[{{ $i }}]"
                                               value="{{ old("item-description.$i") ?? '' }}" placeholder="Enter description">
                                        <input type="hidden" name="item-order[{{ $i }}]" value="{{ $i }}">
                                    </label>
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
