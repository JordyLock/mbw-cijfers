@yield('{{ $group->name }}')
@extends('layouts.app')

@section('description')
    <div class="push-50-t push-15 clearfix">
        <h1 class="h2 push-5-t animated zoomIn">{{ $group->name }}</h1>
    </div>
@endsection

@section('content')
            <div class="block-content">
                <div class="row" group-id="{{ $group->id }}">
                    @foreach($students as $student)
                        <div class="col-md-4">
                            <div class="block-header bg-secondary">
                                <a href="{{route('grades.show', ['id' => $student->id])}}">
                                    <i class="fa fa-circle text-success"></i>
                                    <div class=""><small>{{ $student->name }}</small></div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END People -->

@endsection
