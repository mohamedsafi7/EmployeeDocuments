@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Demande de Congé</h2>

        <form method="POST" action="{{ route('documents.submit-leave-request', $employee->id) }}" class="bg-light p-4 rounded shadow">
            @csrf

            <div class="form-group">
                <label for="number_of_days">Nombre de jours</label>
                <input id="number_of_days" type="number" class="form-control @error('number_of_days') is-invalid @enderror" name="number_of_days" value="{{ old('number_of_days') }}" required>

                @error('number_of_days')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="start_date">Date de début</label>
                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required>

                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="end_date">Date de fin</label>
                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required>

                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-block">Soumettre la demande</button>
            </div>
        </form>
    </div>
</div>
@endsection
