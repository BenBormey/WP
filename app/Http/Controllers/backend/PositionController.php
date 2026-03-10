<?php

namespace App\Http\Controllers\backend;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

 
      $positions = Position::orderBy('created_at', 'desc')->paginate(5);

return view("backend.settings.positions.index", [
    'positions' => $positions
]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $departments = Department::all();

    return view('backend.settings.positions.create',[
        'departments'=>$departments
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'position_title'=>'required',
        'department_id'=>'required'
    ]);

    Position::create([
        'position_title'=>$request->position_title,
        'description'=>$request->description,
        'level'=>$request->level,
        'department_id'=>$request->department_id,
        'is_managerial'=>$request->is_managerial
    ]);

    return redirect('/positions')
            ->with('success','Position created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        $departments = Department::all();

        return view('backend.settings.positions.edit',[
            'position'=>$position,
            'departments'=>$departments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $position = Position::findOrFail($id);

        $position->update([

            'position_title'=>$request->position_title,
            'description'=>$request->description,
            'level'=>$request->level,
            'department_id'=>$request->department_id,
            'is_managerial'=>$request->is_managerial

        ]);

        return redirect('/positions')
                ->with('success','Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           $position = Position::findOrFail($id);

        $position->delete();

        return redirect('/positions')
                ->with('success','Position deleted successfully');
    }
}
