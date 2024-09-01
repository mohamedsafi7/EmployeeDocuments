@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h1 style="text-align: center; margin-bottom: 20px;">Name: {{ $employee->name }}</h1>
    <p style="text-align: center; margin-bottom: 20px;">Email: {{ $employee->email }}</p>

    <h2 style="text-align: center; margin-bottom: 20px;">Choose Document</h2>
    <form action="{{ route('employees.generateDocument', $employee->id) }}" method="POST">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="document">Document Type:</label>
            <select name="document" id="document" required onchange="toggleFormFields()" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="conge">Demande de Congé</option>
                <option value="mission">Ordre de Mission</option>
                <option value="stage">Demande de Stage</option>
            </select>
        </div>

        <!-- Demande de Congé Fields -->
        <div id="conge-fields" style="display: none;">
            <div style="margin-bottom: 20px;">
                <label for="number_of_days">Nombre de jours</label>
                <input id="number_of_days" type="number" class="form-control @error('number_of_days') is-invalid @enderror" name="number_of_days" value="{{ old('number_of_days') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('number_of_days')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="start_date">Date de début</label>
                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="end_date">Date de fin</label>
                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <!-- Ordre de Mission Fields -->
        <div id="mission-fields" style="display: none;">
            <div style="margin-bottom: 20px;">
                <label for="mission_object">Mission Object:</label>
                <input type="text" name="mission_object" class="form-control @error('mission_object') is-invalid @enderror" value="{{ old('mission_object') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('mission_object')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 20px;">
                <label for="mission_purpose">Mission Purpose:</label>
                <input type="text" name="mission_purpose" class="form-control @error('mission_purpose') is-invalid @enderror" value="{{ old('mission_purpose') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('mission_purpose')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 20px;">
                <label for="mission_address">Mission Address:</label>
                <input type="text" name="mission_address" class="form-control @error('mission_address') is-invalid @enderror" value="{{ old('mission_address') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('mission_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 20px;">
                <label for="transport_means">Transport Means:</label>
                <input type="text" name="transport_means" class="form-control @error('transport_means') is-invalid @enderror" value="{{ old('transport_means') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('transport_means')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 20px;">
                <label for="accommodation_address">Accommodation Address:</label>
                <input type="text" name="accommodation_address" class="form-control @error('accommodation_address') is-invalid @enderror" value="{{ old('accommodation_address') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('accommodation_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 20px;">
                <label for="mission_start_date">Start Date:</label>
                <input type="date" name="mission_start_date" class="form-control @error('mission_start_date') is-invalid @enderror" value="{{ old('mission_start_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('mission_start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 20px;">
                <label for="mission_end_date">End Date:</label>
                <input type="date" name="mission_end_date" class="form-control @error('mission_end_date') is-invalid @enderror" value="{{ old('mission_end_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                @error('mission_end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Generate Document</button>
    </form>
</div>

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
