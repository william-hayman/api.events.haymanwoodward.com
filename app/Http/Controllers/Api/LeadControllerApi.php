<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Token;
use App\Http\Requests\StoreLeadRequest;

class LeadControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function token($token){
        $token = Token::where('hash', $token)->get();

        if(count($token) == 1){
            if($token[0]->limit > $token[0]->used && $token[0]->validate >= date("Y-m-d")){
                Token::where('id', $token[0]->id)->increment('used', 1);
                return true;
            }
            return false;
        }
        return false;
    }

    public function index(Request $request)
    {
        // $search = $request->get('search', '');
        return Lead::latest()->paginate();
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
    public function store(StoreLeadRequest $request)
    {
        

            $validated = $request->validated();

            if($this->token($request->header('Api-Token'))){
                return Lead::create($validated);
            }

            $returnData = array(
                'status' => 'error',
                'message' => 'Unauthorized'
            );
            return response()->json($returnData, 401);

    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
