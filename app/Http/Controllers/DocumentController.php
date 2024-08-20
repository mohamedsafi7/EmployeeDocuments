<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;


class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }
    public function showDocumentSelectionForm()
    {
        return view('documents.select');
    }

    public function handleDocumentRequest(Request $request)
    {
        $documentType = $request->input('document');
        
        if (in_array($documentType, ['demande_de_conge', 'ordre_de_mission'])) {
            return redirect()->route('documents.form', ['type' => $documentType]);
        }

        return redirect()->route('documents.select')->withErrors('Invalid document type selected.');
    }

    public function showDocumentForm($type)
    {
        if ($type === 'demande_de_conge') {
            return view('documents.leave-request');
        }
        if ($type === 'ordre_de_mission') {
            return view('documents.ordre-de-mission');
        }
    }
    public function requestDocument(Request $request)
    {
        $user = Auth::user();
        $document = $request->input('document');

        // Here, you could generate the document with the user's name.
        // For simplicity, we'll return a view with the document type and user's name.
        
        return view('documents.show', [
            'document' => $document,
            'name' => $user->name,
        ]);
    }


    public function selectDocument(Request $request)
    {
        $document = Document::find($request->document_id);
        return view('documents.show', compact('document'));
    }
    public function showDemandeDeConge()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Pass the user's name to the view
        return view('documents.demande_de_conge', ['name' => $user->name]);
    }

    public function showLeaveRequestForm()
    {
        return view('documents.leave-request');
    }

    public function submitLeaveRequest(Request $request)
    {
        $request->validate([
            'number_of_days' => 'required|integer|min:1',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $user = Auth::user();
        
        return view('documents.leave-request-result', [
            'user' => $user,
            'number_of_days' => $request->input('number_of_days'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);
    }
    public function submitOrdreDeMission(Request $request)
{
    $user = auth()->user();

    $data = [
        'name' => $user->name,
        'address' => $user->address,
        'postal_code' => $user->postal_code,
        'city' => $user->city,
        'email' => $user->email,
        'phone' => $user->phone,
        'company_name' => '[Nom de l\'entreprise]',
        'company_address' => '[Adresse de l\'entreprise]',
        'company_postal_code_city' => '[Code Postal, Ville]',
        'mission_object' => $request->mission_object,
        'mission_purpose' => $request->mission_purpose,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'mission_address' => $request->mission_address,
        'transport_means' => $request->transport_means,
        'accommodation_address' => $request->accommodation_address,
        'current_date' => now()->format('d/m/Y'),
        'city' => '[Ville]',
    ];

    return view('documents.ordre-de-mission-result', $data);
}
public function showMission()
{
    return view('documents.ordre-de-mission-result');
}

}

