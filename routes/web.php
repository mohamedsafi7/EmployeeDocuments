<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Http\Request;

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
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $number_of_days = \Carbon\Carbon::parse($end_date)->diffInDays(\Carbon\Carbon::parse($start_date));

            return view('documents.leave-request-result', compact('employee', 'start_date', 'end_date', 'number_of_days'));
        } elseif ($documentType == 'mission') {
            $mission_object = $request->input('mission_object');
            $mission_purpose = $request->input('mission_purpose');
            $mission_address = $request->input('mission_address');
            $transport_means = $request->input('transport_means');
            $accommodation_address = $request->input('accommodation_address');
            $current_date = \Carbon\Carbon::now()->format('d/m/Y');

            return view('documents.ordre-de-mission-result', compact(
                'employee',
                'mission_object',
                'mission_purpose',
                'start_date',
                'end_date',
                'mission_address',
                'transport_means',
                'accommodation_address',
                'current_date'
            ));
        }

        // Handle other document types if needed...
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
