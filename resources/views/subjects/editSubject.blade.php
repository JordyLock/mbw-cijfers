@extends('layouts.app')

@section('content')

    <div class="container">

        <form method="POST" action="/vak/{{$subject->id}}">

        @csrf
        {{ method_field('PUT')}}
            <div class="form-group">
                <p>Vak: </p>
                <input class="form-control" value="{{$subject->name}}" type="text" name="name" required>
            </div>
                <a href="/vak" class="btn btn-danger">Ga terug</a>
            <button type="submit" class="btn btn-primary">
                {{__('Pas aan') }}
            </button>
        </form>
    </div>
@endsection
