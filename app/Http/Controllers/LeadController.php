<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Exports\LeadsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Lead;

class LeadController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $eventAll = Lead::pluck('event');
        $event = collect( $eventAll )->unique();
        $academicAll = Lead::pluck('academicBackground');
        $academic = collect( $academicAll )->unique();
        $xpAll = Lead::pluck('timeExperience');
        $xp = collect( $xpAll )->unique();
        $referAll = Lead::whereNotNull('refer')->pluck('refer');
        $refer = collect( $referAll )->unique();

        if (($request->print == "yes") and Auth::user()->type == 1) {
            return Excel::download(new LeadsExport, 'leads.xlsx');
        }

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
            }],
            [function ($query) use ($request) {
                if (($xp = $request->xp)) {
                    $query->orWhere('timeExperience', 'LIKE', '%' . $xp . '%')
                        ->get();
                }
            }],
            [function ($query) use ($request) {
                if (($a = $request->a)) {
                    $query->orWhere('academicBackground', 'LIKE', '%' . $a . '%')
                        ->get();
                }
            }],
            [function ($query) use ($request) {
                if (($refer = $request->refer)) {
                    $query->orWhere('refer', 'LIKE', '%' . $refer . '%')
                        ->get();
                }
            }],
        ])->orderBy('created_at', 'desc')->paginate(20);

        return view('list', compact('leads', 'event', 'academic', 'xp', 'refer'));
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
