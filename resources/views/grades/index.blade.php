@extends('layouts.app')

@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
@endif


@section('content')

<div class="container">

	@if (session('message'))
		<div class="alert alert-success">
			<p>{{session('message')}}</p>
		</div>
	@endif

	<table class="table">
      <thead>
        <tr>
		  <th scope="col">Student</th>
          <th scope="col">Vak</th>
          <th scope="col">Cijfer</th>
          <th scope="col">Toets</th>
          <th scope="col">Omschrijving</th>
		  <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($grades as $grade)
          <tr>
			<td>{{$grade->users->name}}</td>
            <td>{{$grade->subject}}</td>
            <td>{{$grade->grade}}</td>
            <td>{{$grade->test_name}}</td>
            <td>{{$grade->description}}</td>
			<td><a href="/docent/cijfer/wijzig/{{$grade->id}}" class="btn btn-secondary">Pas aan</a> <a href="/docent/cijfer/verwijder/{{$grade->id}}" class="btn btn-danger">Verwijder</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection