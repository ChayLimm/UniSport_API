<?php

namespace App\Http\Controllers;
use App\Models\Segment;
use App\Models\Checkpoint;
use Illuminate\Http\Request;

class CheckpointController extends Controller
{
    public function deleteCheckpoint($id){
        $checkpoint = Checkpoint::find($id);
    
        if ($checkpoint) {
            $checkpoint->delete(); 
            return response()->json(['Delete successfully']);
        }
        return response()->json(['ID not found']);

    }
    
    public function getCheckpoint(){
        $result =Checkpoint::all();
        return response()->json($result);
    }
   public function getCheckpointBySegmentID($id){
        try { 
            $checkpoints = Segment::find($id);
            $data = $checkpoints->checkpoint;
            return response()->json($data);}
            catch(\Exception $e){
                return response()->json($e->getMessage());
            }
        }
    
        public function createCheckpoint(Request $request){
            try{
                $request->validate([
                    'segment_id' => 'required|exists:segments,id',
                    'participant_id' => 'nullable|exists:participants,id',
                    'checkpoint_time' => 'required',
                ]);
                
                $checkpoints = Checkpoint::create($request->all());
                return response()->json($checkpoints);
            }catch(\Exception $e){
                return response()->json($e->getMessage());  
            }
        }
        public function updateCheckpoint(Request $request){
            try{
                $validated = $request->validate([
                    'id'=> 'required',
                    'segment_id' => 'required|exists:segments,id',
                    'participant_id' => 'required|exists:participants,id',
                    'checkpoint_time' => 'required',
                ]);

                $checkpoints = Checkpoint::find($validated['id']);
                $checkpoints->update($validated );
                return response()->json($checkpoints);
            }catch(\Exception $e){
                return response()->json($e->getMessage());  
            }
        }
}
