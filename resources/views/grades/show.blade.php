@yield('{{ $student->name }}')
@extends('layouts.app')

@section('description')
    <div class="push-50-t push-15 clearfix">
        <h1 class="h2 push-5-t animated zoomIn">{{ $student->name }}</h1>
    </div>
@endsection

@section('content')
            <div class="block-content">
                <div class="row" student-id="{{ $student->id }}">
                    @foreach($grades as $grade)
                        <div class="col-md-4">
                            <div class="block-header bg-secondary">
                                <i class="fa fa-circle text-success"></i>
                                <ul>
                                    <li>{{ $grade->subject }}</li>
                                    <li>{{ $grade->grade }}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END People -->

@endsection
