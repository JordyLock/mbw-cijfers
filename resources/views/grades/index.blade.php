@extends('layouts.app')

@section('content')

<div class="container">
	
	<form method="POST" action="{{route('grades.store')}}">
		
	@csrf

		<input type="select" name="classname">

		<button type="submit" class="btn btn-primary">
			{{__('submit') }}
		</button>

	</form>

</div>

@endsection