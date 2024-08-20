@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-wrapper">
        <h2>Select Document</h2>
        <form action="{{ route('employees.generateDocument', $employee->id) }}" method="GET">
        @csrf
            <div class="form-group">
                <label for="document">Choose Document:</label>
                <select name="document" id="document" class="form-control">
                    <option value="demande_de_conge">Demande de Congé</option>
                    <option value="ordre_de_mission">Ordre de Mission</option>
                    <!-- Add more document options as needed -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Generate Document</button>
        </form>
    </div>
</div>

<style>
    .form-wrapper {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        max-width: 600px;
        margin: 40px auto;
        background-color: #f9f9f9;
    }

    .form-wrapper h2 {
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    .form-group .form-control {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        font-size: 16px;
        width: 300px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004d99;
    }
</style>
@endsection
