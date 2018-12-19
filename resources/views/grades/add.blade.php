@extends('layouts.app')

@section('content')

<form method="POST" action="{{route('grades.store')}}">
		
	@csrf

		<input type="text" name="classnames">

		<button type="submit" class="btn btn-primary">
			{{__('submit') }}
		</button>

	</form>

@endsection	