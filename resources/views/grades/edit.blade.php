@extends('layouts.app')

@section('content')

<div class="container">

    @if ($errors->any())
    	    <div class="alert alert-danger">
    	        <ul>
    	            @foreach ($errors->all() as $error)
    	                <li>{{ $error }}</li>
    	            @endforeach
    	        </ul>
    	    </div>
    @endif

    @if (session('message'))
    	<div class="alert alert-success">
    		<p>{{session('message')}}</p>
    	</div>
    @endif

<form method="POST" action="/docent/cijfer/update/{{$grade->id}}">

	@csrf
		<div class="form-group">
			<p>Student: </p>
			<select class="form-control" name="user_id">
				@foreach($users as $user)
                    @if ($grade->user_id == $user->id)
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    @else
          		        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
      			@endforeach
    		</select>
		</div>
		<div class="form-group">
			<p>Vak: </p>
			<input class="form-control" value="{{$grade->subject}}" type="text" name="subject" required>
		</div>
		<div class="form-group">
			<p>Toets naam: </p>
			<input class="form-control" value="{{$grade->test_name}}" type="text" name="test" required>
		</div>
		<div class="form-group">
			<p>Cijfer: </p>
			<input class="form-control" value="{{$grade->grade}}" type="number" name="grade" required>
		</div>
		<div class="form-group">
			<p>Omschrijving: </p>
			<input class="form-control" value="{{$grade->description}}" type="text" name="description" required>
		</div>
        <a href="/docent/cijfers" class="btn btn-danger">Ga terug</a>
		<button type="submit" class="btn btn-primary">
			{{__('Pas aan') }}
		</button>

	</form>
</div>
@endsection
