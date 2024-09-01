<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;


// Redirect the root URL to the login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Profile routes (protected by auth middleware)
Route::middleware('auth')->group(function () {


   

// List all employees
Route::get('/employees', function () {
    $employees = Employee::all();
    return view('employees.index', compact('employees'));
})->name('employees.index');

// Show a specific employee
Route::get('/employees/{id}', function ($id) {
    $employee = Employee::findOrFail($id);
    return view('employees.show', compact('employee'));
})->name('employees.show');

// Select document for a specific employee
Route::get('/employees/{id}/document', function ($id) {
    $employee = Employee::findOrFail($id);
    return view('employees.document-select', compact('employee'));
})->name('employees.selectDocument');

// Generate document based on user selection
Route::post('/employees/{id}/document', function (Request $request, $id) {
    $employee = Employee::findOrFail($id);
    $documentType = $request->input('document');

    if ($documentType == 'conge') {
        // Validate request data for 'Demande de Congé'
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Convert start and end dates to Carbon instances
        $start_date = \Carbon\Carbon::parse($validatedData['start_date']);
        $end_date = \Carbon\Carbon::parse($validatedData['end_date']);

        // Calculate number of days of leave, including the start date
        $number_of_days = $start_date->diffInDays($end_date) + 1;

        // Pass validated data to the view
        return view('documents.leave-request-result', compact('employee', 'start_date', 'end_date', 'number_of_days'));

    } elseif ($documentType == 'mission') {
        // Validate request data for 'Ordre de Mission'
        $validatedData = $request->validate([
            'mission_object' => 'required|string',
            'mission_purpose' => 'required|string',
            'mission_start_date' => 'required|date',
            'mission_address' => 'required|string',
            'transport_means' => 'required|string',
            'accommodation_address' => 'required|string',
            'mission_end_date' => 'required|date|after_or_equal:mission_start_date',
        ]);

        // Extract required data for the mission
        $mission_object = $validatedData['mission_object'];
        $mission_purpose = $validatedData['mission_purpose'];
        $mission_start_date = \Carbon\Carbon::parse($validatedData['mission_start_date']);
        $mission_end_date = \Carbon\Carbon::parse($validatedData['mission_end_date']);
        $mission_address = $validatedData['mission_address'];
        $transport_means = $validatedData['transport_means'];
        $accommodation_address = $validatedData['accommodation_address'];
        
        // Employee details
        $name = $employee->name; // Assuming you have a 'name' column in your employees table
        $address = $employee->address; // Assuming you have an 'address' column in your employees table

        // Pass data to the view
        return view('documents.ordre-de-mission-result', compact('name', 'address', 'mission_object', 'mission_purpose', 'mission_start_date', 'mission_end_date', 'mission_address', 'transport_means', 'accommodation_address'));
    }

    // Handle other document types if needed...
    return redirect()->back()->with('error', 'Invalid document type selected.');
})->name('employees.generateDocument');




    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // DocumentController routes
    Route::get('/documents/select', [DocumentController::class, 'showDocumentSelectionForm'])->name('documents.select');
    Route::post('/documents/request', [DocumentController::class, 'handleDocumentRequest'])->name('documents.request');
    Route::get('/documents/{type}', [DocumentController::class, 'showDocumentForm'])->name('documents.form');
    Route::get('/documents', [DocumentController::class, 'index'])->name('dashboard');
    Route::get('/documents/leave-request', [DocumentController::class, 'showLeaveRequestForm'])->name('documents.leave-request-form');
    Route::post('/documents/submit-leave-request', [DocumentController::class, 'submitLeaveRequest'])->name('documents.submit-leave-request');
    Route::post('/documents/ordre-de-mission', [DocumentController::class, 'submitOrdreDeMission'])->name('documents.submit-ordre-de-mission');

});

// Include Breeze authentication routes
require __DIR__.'/auth.php';
