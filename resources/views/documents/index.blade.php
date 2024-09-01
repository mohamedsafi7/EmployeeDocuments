@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-wrapper">
        <h2>Select Document</h2>
        <form action="{{ route('employees.generateDocument', $employee->id) }}" method="POST">
        @csrf
        <label for="document">Document Type:</label>
        <select name="document" id="document" required onchange="toggleFormFields()">
            <option value="conge">Demande de Congé</option>
            <option value="mission">Ordre de Mission</option>
            <option value="stage">Demande de Stage</option>
        </select>

        <!-- Demande de Congé Fields -->
        <div id="conge-fields" style="display: none;">
            <div class="form-group">
                <label for="number_of_days">Nombre de jours</label>
                <input id="number_of_days" type="number" class="form-control @error('number_of_days') is-invalid @enderror" name="number_of_days" value="{{ old('number_of_days') }}">
                @error('number_of_days')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="start_date">Date de début</label>
                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}">
                @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="end_date">Date de fin</label>
                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}">
                @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <!-- Ordre de Mission Fields -->
        <div id="mission-fields" style="display: none;">
            <div class="form-group">
                <label for="mission_object">Mission Object:</label>
                <input type="text" name="mission_object" class="form-control">
            </div>
            <div class="form-group">
                <label for="mission_purpose">Mission Purpose:</label>
                <input type="text" name="mission_purpose" class="form-control">
            </div>
            <div class="form-group">
                <label for="mission_address">Mission Address:</label>
                <input type="text" name="mission_address" class="form-control">
            </div>
            <div class="form-group">
                <label for="transport_means">Transport Means:</label>
                <input type="text" name="transport_means" class="form-control">
            </div>
            <div class="form-group">
                <label for="accommodation_address">Accommodation Address:</label>
                <input type="text" name="accommodation_address" class="form-control">
            </div>
            <div class="form-group">
                <label for="mission_start_date">Start Date:</label>
                <input type="date" name="mission_start_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="mission_end_date">End Date:</label>
                <input type="date" name="mission_end_date" class="form-control">
            </div>
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

<script>
    function toggleFormFields() {
        var documentType = document.getElementById('document').value;
        var congeFields = document.getElementById('conge-fields');
        var missionFields = document.getElementById('mission-fields');

        // Hide all fields initially
        congeFields.style.display = 'none';
        missionFields.style.display = 'none';

        if (documentType === 'conge') {
            congeFields.style.display = 'block';
        } else if (documentType === 'mission') {
            missionFields.style.display = 'block';
        }
    }

    // Run the function on page load to set the correct fields
    document.addEventListener('DOMContentLoaded', function () {
        toggleFormFields();
    });
</script>

@endsection
