@extends('layouts.app')

@section('content')
    <p class="h4">Student's Details</p>

    <div class="card mt-4">
        <div class="card-header">
            <p>{{ $student->lname. ', '. $student->fname. ' '. $student->mname}}</p>
        </div>
        <div class="card-body">
            <p>ID #: <strong><u>{{ $student->id_number}}</u></strong></p>
            <p>First name: <strong>{{ $student->fname}}</strong></p>
            <p>Middle name: <strong>{{ $student->mname}}</strong></p>
            <p>Last name: <strong>{{ $student->lname}}</strong></p>
            <p>Date of Birth: <strong>{{ $student->date_of_birth}}</strong></p>

            
            
            <form action="{{ route('students.destroy', ['id' => $student->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('DELETE')
                <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href='{{ url('students/') }}'">Back</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="location.href='{{ url('students/'.$student->id.'/edit') }}'">Edit</button>
                <button type="submit" class="btn btn-danger btn-sm">delete</button>
            </form>
        </div>
    </div>
    
@endsection