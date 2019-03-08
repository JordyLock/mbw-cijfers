@extends('layouts.app')

@section('content')

<div class="container">
<form method="POST" action="{{ route('vak.store') }}">
		
	@csrf

		<div class="form-group">
			<p>Vak: </p>
			<input class="form-control" type="text" name="name">
		</div>
		<button type="submit" class="btn btn-primary">
			{{__('submit') }}
		</button>
	</form>
</div>
@endsection	