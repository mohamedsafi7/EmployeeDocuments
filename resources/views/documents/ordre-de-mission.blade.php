@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Ordre de Mission</h2>

    <div class="mb-3">
        <p><strong>Objet:</strong> {{ $mission_object }}</p>
    </div>

    <div class="mb-3">
        <p>Par la présente, l'entreprise <strong>Commune Taliouine</strong> confie à son collaborateur <strong>Monsieur/Madame {{ $employee->name }}</strong>, habitant au <strong>{{ $employee->address }}</strong> et agissant en tant que <strong>POSITION</strong>, la mission de <strong>{{ $mission_object }}</strong>. Cette mission a pour but de <strong>{{ $mission_purpose }}</strong>. Elle aura lieu du <strong>{{ \Carbon\Carbon::parse($start_date)->format('d/m/Y') }}</strong> au <strong>{{ \Carbon\Carbon::parse($end_date)->format('d/m/Y') }}</strong>.</p>
    </div>

    <div class="mb-3">
        <p>Le déplacement du salarié aura lieu entre son lieu de travail/lieu de résidence familial et le lieu de sa mission, situé au <strong>{{ $mission_address }}</strong>.</p>
    </div>

    <div class="mb-3">
        <p>Pour son voyage aller-retour, le salarié utilisera les moyens de transports suivants : <strong>{{ $transport_means }}</strong>.</p>
    </div>

    <div class="mb-3">
        <p>Pendant sa mission, le salarié résidera au <strong>{{ $accommodation_address }}</strong>. Pour effectuer les trajets entre son lieu de séjour et le lieu de sa mission, il utilisera les moyens de transport suivants : <strong>{{ $transport_means }}</strong>.</p>
    </div>

    <div class="mb-3">
        <p>Les frais de déplacement seront intégralement remboursés par la commune, sous réserve de présentation desdites factures.</p>
    </div>

    <div class="mb-3">
        <p>Fait à <strong>Taliouine</strong>, le <strong>{{ $current_date }}</strong>.</p>
    </div>

    <div class="text-right">
        <p><strong>Signature</strong></p>
    </div>

    <div class="text-center mt-5">
        <button onclick="window.print()" class="btn btn-secondary">Print Ordre de Mission</button>
    </div>
</div>
@endsection
