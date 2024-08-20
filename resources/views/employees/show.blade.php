@extends('layouts.app')

@section('content')
<div class="container">
<h1>{{ $employee->name }}</h1>
    <p>Email: {{ $employee->email }}</p>
    <p>Position: {{ $employee->position }}</p>

    <h2>Choose Document</h2>
    <form action="{{ route('employees.generateDocument', $employee->id) }}" method="POST">
        @csrf
        <label for="document">Document Type:</label>
        <select name="document" id="document" required>
            <option value="conge">Demande de Congé</option>
            <option value="mission">Ordre de Mission</option>
            <option value="stage">Demande de Stage</option>
        </select>
        <button type="submit">Generate Document</button>
    </form>
</div>
@endsection
