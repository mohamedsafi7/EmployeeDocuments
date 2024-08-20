@extends('layouts.app')

@section('content')
<div class="container">
<h1>Select an Employee</h1>
    <ul>
        @foreach ($employees as $employee)
            <li>
                <a href="{{ route('employees.show', $employee->id) }}">
                    {{ $employee->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
