<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Library\CrudPanel\Traits\Update;
use Illuminate\Http\Request;
use App\Models\Participant;
use Log;
class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(
            Participant::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $validated = request()->validate([
            'race_id' => 'required|integer',
            'bib_number' => 'required|string',
            'username' => 'required|string',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|string|in:male,female,other',
            'description' => 'nullable|string',
        ]);
       
        $data = Participant::create(attributes: $validated);
        Log::info('data to response'. $data);
        return response()->json($data, 201); 
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'race_id' => 'required|string',
                'bib_number' => 'required|string',
                'username' => 'required|string|max:255|unique:participants,username',
                'age' => 'required|integer',
                'gender' => 'required|string|in:male,female,other',
            ]);
    
            // Create the participant
            Participant::create($validated);
    
            return response()->json(['message' => 'Participant created successfully.'], 201);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

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
        //
    }

    public function getCheckpointByID(string $id){
        try{       
            $checkpoints = Participant::find( $id )->checkpoint();
            return response()->json(data: $checkpoints);
        }    catch (\Exception $e) {
            return response()->json(['error'=> $e->getMessage()]);
        }
    }
 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        try {
            $validated = $request->validate([
                'id'=> 'required',
                'race_id' => 'required|int',
                'bib_number' => 'required|string',
                'username' => 'required|string|max:255',
                'age' => 'required|integer',
                'gender' => 'required|string|in:male,female,other',
            ]);
            // Create the participant
            $target = Participant::find($validated['id'] );    
            $target->update($validated);
            return response()->json( $target,200);
    
        } catch (\Exception $e) {
            return response()->json(data: ['error' => $e->getMessage()]);
        }
    }

    /**x
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {                
            $participant = Participant::findOrFail($id);
            $participant->delete();
                        
            return response()->json(['message' => 'Participant created successfully.'], 201);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}

