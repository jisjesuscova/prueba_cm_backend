<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alliance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AllianceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alliances = Alliance::select('id', 'alliance')
             ->orderByDesc('id')
             ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $alliances
        ], 200);
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
        try {
            $alliance = Alliance::create([
                'status_id' => 1,
                'rut' => $request->rut,
                'name' => $request->name,
                'alias' => $request->alias,
                'contact' => $request->contact,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);

            return response()->json([
                'success' => true,
                'data' => $alliance
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashier $cashier)
    {
        return response()->json([
            'success' => true,
            'data' => $cashier
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cashier = Cashier::find($id);
        $cashier->branch_office_id = $request->branch_office_id;
        $cashier->cashier = $request->cashier;
        $cashier->save();

        return response()->json([
            'success' => true,
            'data' => $cashier
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cashier $cashier)
    {
        $cashier->delete();

        return response()->json([
            'success' => true,
            'data' => $cashier
        ], 200);
    }
}
