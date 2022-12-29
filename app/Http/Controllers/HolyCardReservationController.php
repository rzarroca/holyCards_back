<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHolyCardReservationRequest;
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
     * @param  \App\Http\Requests\StoreHolyCardReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHolyCardReservationRequest $request)
    {
        list(
            'holy_card_id' => $id,
            'start_date' => $start_date,
            'end_date' => $end_date
        ) = $request->validated();

        if ($this->isReserved($id, $start_date, $end_date)) {
            return response()->json([
                'status' => 'error',
                'message' => 'there is a reservation already made on the dates selected'
            ], 409);
        }

        $newReservation = HolyCardReservation::create([
            'holy_card_id' => $id,
            'user_id' => auth()->user()->id,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $newReservation
        ], 200);
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

    private function isReserved($id, $start_date, $end_date)
    {
        $outerDatesExcluded = HolyCardReservation::where('holy_card_id', $id)
            ->where(
                fn ($query) => $query
                    ->whereBetween('start_date', [$start_date, $end_date])
                    ->orWhereBetween('end_date', [$start_date, $end_date])
            )
            ->exists();

        $datesIncluded = HolyCardReservation::where('holy_card_id', $id)
            ->whereDate('start_date', '<', $start_date)
            ->whereDate('end_date', '>', $end_date)
            ->exists();

        return $outerDatesExcluded or $datesIncluded;
    }
}
