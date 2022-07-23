<?php

use App\Models\StudentMark;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Student Management System</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('marks.create') }}"> Add Mark</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Maths</th>
                <th>Scienc</th>
                <th>History</th>
                <th>Term</th>
                <th>Total Marks</th>
                <th>Created On</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($marks as $mark)
            <tr>
                <td>{{ $mark->id }}</td>
                <td>{{ $mark->student->name }}</td>
                <td>{{ $mark->maths }}</td>
                <td>{{ $mark->science }}</td>
                <td>{{ $mark->history }}</td>
                <td>{{ StudentMark::TERMS[$mark->term] }}</td>
                <td>{{ $mark->maths + $mark->science + $mark->history }}</td>
                <td>{{ date('M j, Y g:i a', strtotime($mark->created_at)) }}</td>
                <td>
                    <form action="{{ route('marks.destroy',$mark->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('marks.edit',$mark->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $marks->links() !!}
</body>

</html>