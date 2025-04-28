<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
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
    public function create()
    {
        //
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'race_id' => 'required|string',
                'bib_number' => 'required|string',
                'username' => 'required|string|max:255',
                'age' => 'required|integer',
                'gender' => 'required|string|in:male,female,other',
            ]);
            // Create the participant
            Participant::updateOrCreate(
                ['id' => $id],
                $validated
            );    
            return response()->json(['message' => 'Participant created successfully.'], 201);
    
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

