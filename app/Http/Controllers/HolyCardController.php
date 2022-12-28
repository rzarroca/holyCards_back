<?php

namespace App\Http\Controllers;

use App\Models\holyCard;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HolyCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        return response()->json([
            'status' => 'success',
            'data' => holyCard::all(['id', 'name', 'is_active'])
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        //
    } */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\holyCard  $holyCard
     * @return \Illuminate\Http\Response
     */
    public function show(holyCard $holyCard)
    {
        $this->authorize('view', User::class);

        return response()->json([
            'status' => 'success',
            'data' => $holyCard
        ], 200);
    }

    /**
     * Display the list of reservations of a holyCard.
     *
     * @param  \App\Models\holyCard  $holyCard
     * @return \Illuminate\Http\Response
     */
    public function showHolyCardReservations(holyCard $holyCard)
    {
        $this->authorize('view', User::class);

        return response()->json([
            'status' => 'success',
            'data' => $holyCard->reservations()
                ->where(function ($query) {
                    $query
                        ->where('start_date', '>=', Carbon::now()->format('Y-m-d'))
                        ->orWhere('end_date', '>=', Carbon::now()->format('Y-m-d'));
                })
                ->orderBy('start_date', 'asc')
                ->get(),
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\holyCard  $holyCard
     * @return \Illuminate\Http\Response
     */
    /* public function edit(holyCard $holyCard)
    {
        //
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\holyCard  $holyCard
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, holyCard $holyCard)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\holyCard  $holyCard
     * @return \Illuminate\Http\Response
     */
    /* public function destroy(holyCard $holyCard)
    {
        //
    } */
}
