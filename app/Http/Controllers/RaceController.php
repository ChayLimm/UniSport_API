<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use App\Models\Race;

class RaceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(data: Race::all());

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
            if (!$request->has('status')) {
                $request->merge(['status' => Race::STATUS_PENDING]);
            }
            $valitdated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'nullable|string|in:' . implode(',', [Race::STATUS_PENDING, Race::STATUS_IN_PROGRESS, Race::STATUS_COMPLETED]),  // Validate status

            ]);


            Race::create($valitdated);
            return response("Create succesfully");

        } catch (\Exception $e) {
            return response()->json(data: ['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(data: Race::find($id));
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
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            Race::findOrFail($id)->update($validated);
            return response('Update succesfully');

        }catch (\Exception $e) {
            return response()->json(data: ['error'=> $e->getMessage()]);
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            Race::destroy($id);
            return response("deleted succesfully");

        } catch (\Exception $e) {
            return response()->json(data: ['error' => $e->getMessage()]);

        }

    }
    public function startRace($id)
    {
        try {
            $race = Race::findOrFail($id);
            $race->start_time = now();
            $race->status = Race::STATUS_IN_PROGRESS;
            $race->save();
            return response('Started successfully at ' . $race->start_time);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
    public function endRace($id)
    {
        try {
            $race = Race::findOrFail($id);
            $race->end_time = now();
            $race->status = Race::STATUS_COMPLETED;
            $race->save();
            return response('Ended successfully at ' . $race->end_time);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
    public function showParticipant($id){
        try {
            $participants = Participant::where('race_id', $id)->get();
            
            // If participants are found, return them as a JSON response
            if ($participants->isEmpty()) {
                return response()->json(['message' => 'No participants found for this race.'], 404);
            }
    
            return response()->json($participants);
        } catch (\Exception $e) {
            // Handle any errors that occur
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
