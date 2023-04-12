<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $leads = Lead::all();

        $eventAll = Lead::pluck('event');
        $event = collect( $eventAll )->unique();

        $leads = Lead::where([
            ['firstName', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('firstName', 'LIKE', '%' . $s . '%')
                        ->orWhere('lastName', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }],
            [function ($query) use ($request) {
                if (($e = $request->e)) {
                    $query->orWhere('event', 'LIKE', '%' . $e . '%')
                        ->get();
                }
            }]
        ])->orderBy('created_at', 'desc')->paginate(15);

        return view('list', compact('leads', 'event'));
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
        //
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
