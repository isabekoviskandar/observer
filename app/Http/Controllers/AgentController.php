<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentStoreRequest;
use App\Models\Agent;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::where('parent_id', 0)->get();
        return view('main' , compact('agents'));
    }

    public function store(AgentStoreRequest $request)
    {
        Agent::create($request->all());
        return back();
    }

    public function destroy($id)
    {
        // dd(123);
        $agent = Agent::findOrFail($id);
        $agent->delete(); // Instance method to delete the record
        return back()->with('success', 'Agent deleted successfully.');
    }
    
}
