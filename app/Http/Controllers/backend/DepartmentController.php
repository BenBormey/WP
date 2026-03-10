<?php

namespace App\Http\Controllers\backend;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB; 

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
              $departments = Department::orderBy('created_at', 'desc')->paginate(5);

    return view("backend.settings.departments.index", [
        'departments' => $departments
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
{
    // Example code
    $code = 'deptcode';

    // Get current date and time
    $currentDateTime = now(); // Laravel's helper for the current date and time

    // Format the datetime to include in the code
    $formattedDateTime = $currentDateTime->format('YmdHis'); // Example: 20241209...

    // Generate a random string
    $randomString = strtoupper(substr(md5(uniqid($code, true)), 0, 6)); // Example...

    // Combine formatted date, time, and random string
    $randomCode = 'DPT' . $formattedDateTime . '-' . $randomString;

    return view("backend.settings.departments.create")->with('randomCode', $randomCode);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $validated = $request->validate([
        'department_code' => 'required|string|max:50',
        'department_name' => 'required',
        'decription'     => 'required',
        'status'          => 'required'
    ],
    [
    'department_code.required' => 'ត្រូវបញ្ចូលលេខកូដ Department',
    'department_name.required' => 'ត្រូវបញ្ចូលឈ្មោះ Department',
    'decription.required'     => 'ត្រូវបញ្ចូលពិពណ៌នា',
    'status.required'          => 'ត្រូវជ្រើសរើស Status'
]
 );

    Department::create($validated);

    return redirect()->route('departments.index');

    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $department = Department::find($id);
           return view('backend.settings.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
{
    $department = Department::find($id);
    // dd($department->department_id);
    return view("backend.settings.departments.edit", compact('department'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $validated = $request->validate([
        'department_code' => 'required|string|max:50',
        'department_name' => 'required',
        'decription'     => 'required',
        'status'          => 'required'
    ]);

    $department = Department::findOrFail($id);
    $department->update($validated);

    return redirect()->route('departments.index')
                     ->with('success', 'Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $department = Department::find($id);

    // Delete it
    $department->delete();

    // Redirect back with success message
    return redirect()->route('departments.index')
                     ->with('success', 'Department deleted successfully!');
    }
}
