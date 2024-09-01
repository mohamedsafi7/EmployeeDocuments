@extends('layouts.app')
@section('content')
<div style="max-width: 800px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
<h2 style="text-align: center; margin-bottom: 20px;">Employee Profile</h2>
<p><strong>Name:</strong> {{ $employee->name }}</p>
<p><strong>Email:</strong> {{ $employee->email }}</p>
<p><strong>Address:</strong> {{ $employee->address }}</p>
<p><strong>City:</strong> {{ $employee->city }}</p>
<p><strong>Phone:</strong> {{ $employee->phone }}</p>
<p><strong>CIN:</strong> {{ $employee->cin }}</p>
</div>
@endsection