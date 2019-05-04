@extends('layouts.app')

@section('content')
    <p class="h4">Create New Student</p>

    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('students.update', ['id' => $student->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')

                <div class="form-row col-md-6">
                    <div class="form-group col-md-12">
                        <label for="idNum">ID Number</label>
                        <input type="number" class="form-control" id="idNum" name="id_number" value={{$student->id_number}} placeholder="ID Number">
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" value={{$student->lname}} placeholder="Last Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" value={{$student->fname}} placeholder="First Name">
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname" value={{$student->mname}} placeholder="Middle Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">Birth Date</label>
                        <input type="date" class="form-control" id="dob" name="date_of_birth" value={{$student->date_of_birth}} placeholder="Birth Date">
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-12">
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="location.href='{{ url('students/'.$student->id) }}'">Back</button>
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection