@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Vak</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{$subject->name}}</td>
                <td><a href="/vak/{{$subject->id}}/edit" class="btn btn-secondary">Pas aan</a> 
					<a class="btn btn-danger"
						onclick="event.preventDefault();  document.getElementById('delete-subject').submit(); return confirm('Weet je het zeker?');">Verwijder
					</a>
                    <form id="delete-subject" 
						action="{{ route('vak.destroy', ['id' => $subject->id]) }}" 
						method="POST"
                        style="display: none;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection