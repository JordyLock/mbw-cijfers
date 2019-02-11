@extends('layouts.app')

@section('content')

<div class="container">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Vak</th>
          <th scope="col">Cijfer</th>
          <th scope="col">Toets</th>
          <th scope="col">Omschrijving</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($grades as $grade)
          <tr>
            <td>{{$grade->subject}}</td>
            <td>{{$grade->grade}}</td>
            <td>{{$grade->test_name}}</td>
            <td>{{$grade->description}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

</div>

@endsection
