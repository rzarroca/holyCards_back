<?php

namespace App\Http\Controllers;

use App\Models\HolyCardReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HolyCardReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', HolyCardReservation::class);

        return response()->json([
            'status' => 'success',
            'data' => HolyCardReservation::where('start_date', '>=', Carbon::now()->format('Y-m-d'))
                ->orWhere('end_date', '>=', Carbon::now()->format('Y-m-d'))
                ->orderBy('created_at', 'desc')
                ->paginate(20)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
