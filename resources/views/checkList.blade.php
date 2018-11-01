@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Check lists</h2>
                <form>
                    @foreach($checkList as $listParams)
                        <div class="form-check">
                            <label>
                                <input type="checkbox" {{ $listParams['is_done'] ? 'checked' : '' }}><span
                                        class="label-text">{{ $listParams['title'] }}</span>
                            </label>
                            <p>Description: {{ $listParams['description'] }}</p>
                        </div>
                    @endforeach
                    <button>Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
