@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 50px auto; padding: 20px; border: 2px solid #333; border-radius: 10px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 20px;">Ordre de Mission</h2>

    <div style="margin-bottom: 20px;">
        <p><strong>Objet:</strong> {{ $mission_object }}</p>
    </div>

    <div style="margin-bottom: 20px;">
        <p>Par la présente, l'entreprise <strong>Commune Taliouine</strong> confie à son collaborateur <strong>Monsieur/Madame {{ $name }}</strong>, habitant au <strong>{{ $address }}</strong> et agissant en tant que <strong>POSITION</strong>, la mission de <strong>{{ $mission_object }}</strong>. Cette mission a pour but de <strong>{{ $mission_purpose }}</strong>. Elle aura lieu du <strong>{{ \Carbon\Carbon::parse($mission_start_date)->format('d/m/Y') }}</strong> au <strong>{{ \Carbon\Carbon::parse($mission_end_date)->format('d/m/Y') }}</strong>.</p>
    </div>

    <div style="margin-bottom: 20px;">
        <p>Le déplacement du salarié aura lieu entre son lieu de travail/lieu de résidence familial et le lieu de sa mission, situé au <strong>{{ $mission_address }}</strong>.</p>
    </div>

    <div style="margin-bottom: 20px;">
        <p>Pour son voyage aller-retour, le salarié utilisera les moyens de transports suivants : <strong>{{ $transport_means }}</strong>.</p>
    </div>

    <div style="margin-bottom: 20px;">
        <p>Pendant sa mission, le salarié résidera au <strong>{{ $accommodation_address }}</strong>. Pour effectuer les trajets entre son lieu de séjour et le lieu de sa mission, il utilisera les moyens de transport suivants : <strong>{{ $transport_means }}</strong>.</p>
    </div>

    <div style="margin-bottom: 20px;">
        <p>Les frais de déplacement seront intégralement remboursés par la commune, sous réserve de présentation desdites factures.</p>
    </div>

    <div style="margin-bottom: 20px;">
        <p>Fait à <strong>Taliouine</strong>, le <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong>.</p>
    </div>

    <div style="text-align: right;">
        <p><strong>Signature</strong></p>
    </div>

    <div style="text-align: center; margin-top: 40px;">
        <button onclick="window.print()" style="background-color: #6c757d; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Print Ordre de Mission</button>
    </div>
</div>
@endsection
