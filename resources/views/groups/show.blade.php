@yield('{{ $group->name }}')
@extends('layouts.app')

@section('description')
    <div class="push-50-t push-15 clearfix">
        <h1 class="h2 push-5-t animated zoomIn">{{ $group->name }}</h1>
    </div>
@endsection

@section('content')
                   <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Naam</th>
                          <th>Student ID</th>
                          @foreach($students as $student)
                          @foreach($student->grades as $grade)
                          <th>{{$grade->test_name}}</th>
                          @endforeach
                          @endforeach
                        </tr>
                      </thead>
                      @foreach($students as $student)
                      <tbody>
                        <tr>
                          <td>{{$student->name}}</td>
                          <td>{{$student->id}}</td>
                          @foreach($student->grades as $grade)
                          <td>{{$grade->grade}}</td>
                          @endforeach
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
        <!-- END People -->

@endsection
