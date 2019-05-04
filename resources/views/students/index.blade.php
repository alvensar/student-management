@extends('layouts.app')

@section('content')
    <div>
        <span class="float-left"><p class="h4">Students List</p></span>
        <span class="float-right">
            <button type="button" class="btn btn-outline-info btn-sm" onclick="location.href='{{ url('students/create') }}'"> Create</button>
        </span>
    </div>
    
    @if (count($students) > 1)
    <div class="mt-5">
        <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID Number</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($students as $index => $student)
                <tr>
                <th scope="row">{{$index + $students->firstItem()}}</th>
                    <td>{{$student->id_number}}</td>
                    <td>{{$student->lname}}</td>
                    <td>{{$student->fname}}</td>
                    <td>{{$student->mname}}</td>
                    <td>
                        <a href="/students/{{$student->id}}" class="text-info">View</a>
                        <a href="/students/{{$student->id}}/edit" class="text-info">| Edit</a>
                    </td>
                </tr>
            @endforeach
          <tr>
        </tbody>
      </table>
      <small>{{$students->links()}}</small>
    </div>
    
    @else
        <p>No student record(s)</p>
    @endif
@endsection