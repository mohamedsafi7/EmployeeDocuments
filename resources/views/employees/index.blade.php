@extends('layouts.app')

@section('head')
    <!-- Add Bootstrap CSS link in the head section -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
<div style="max-width: 800px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; margin-bottom: 20px;">Select an Employee</h2>
    <ul style="list-style: none; padding: 0;">
        @foreach ($employees as $employee)
            <li style="display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #ddd;">
                <a href="{{ route('employees.show', $employee->id) }}" style="text-decoration: none; color: #007bff;">
                    {{ $employee->name }}
                </a>
                <a href="{{ route('employees.profile', $employee->id) }}" style="background-color: #007bff; color: white; padding: 5px 10px; border-radius: 12px; text-decoration: none;">View</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
