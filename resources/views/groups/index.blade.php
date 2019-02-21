@extends('layouts.app')

@section('title', 'Groups')

@section('description')
    <div class="push-50-t push-15 clearfix">
        <h1 class="h2 push-5-t animated zoomIn">Groups</h1>
    </div>
@endsection

@section('content')


    <div class="content cotent-boxed">
        <h2>Groups</h2>
        <div class="row">
            <!-- Project -->

            <!-- END Project -->

            @isset($groups)
                @foreach($groups as $group)
                    <div class="col-sm-6 col-lg-3" team-id="{{ $group->group_id }}">
                        <div class="block">
                            <div class="block-header bg-secondary">
                                <h3 class="h4 font-w600 push-5">
                                    <a class="text-white" href="{{route('group.show', ['id' => $group->id])}}">{{ $group->name }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset

        </div>
    </div>

@endsection
