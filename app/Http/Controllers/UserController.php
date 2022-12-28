<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $this->authorize('view', User::class);

        return response()->json([
            'status' => 'success',
            'data' => auth()->user(),
        ], 200);
    }

    /**
     * Display the list of reservations of a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserReservations()
    {
        $this->authorize('view', User::class);

        return response()->json([
            'status' => 'success',
            'data' => auth()->user()->reservations()
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, $id)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function destroy($id)
    {
        //
    } */
}
