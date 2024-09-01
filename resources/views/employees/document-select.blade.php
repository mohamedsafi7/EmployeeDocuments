@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Select Document for {{ $employee->name }}</h1>
    <form action="{{ route('employees.generateDocument', $employee->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="document">Document Type:</label>
            <select name="document" id="document" class="form-control">
                <option value="conge">Demande de Congé</option>
                <option value="mission">Ordre de Mission</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
    </form>
</div>
@endsection