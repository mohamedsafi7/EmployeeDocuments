@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Select Document for {{ $employee->name }}</h2>
    <form action="{{ route('employees.generateDocument', $employee->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="document">Document Type:</label>
            <select name="document" id="document" class="form-control" onchange="showFields(this.value)">
                <option value="">Select Document</option>
                <option value="conge">Demande de Congé</option>
                <option value="mission">Ordre de Mission</option>
            </select>
        </div>

        <!-- Demande de Congé Fields -->
        <div id="conge-fields" style="display: none;">
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control">
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
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Generate Document</button>
    </form>
</div>

<script>
    function showFields(value) {
        document.getElementById('conge-fields').style.display = value === 'conge' ? 'block' : 'none';
        document.getElementById('mission-fields').style.display = value === 'mission' ? 'block' : 'none';
    }
</script>
@endsection
