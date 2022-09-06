<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationRequest;
use App\Http\Requests\UpdateAccommodationRequest;
use App\Models\Hotel\Accommodation;

class AccommodationController extends Controller
{
    use ListView;

    protected $model = Accommodation::class;

    protected $fields = [
        'hotel_id',
        'room_type',
        'occupancy',
        'sort_order',
        'status',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccommodationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccommodationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function show(Accommodation $accommodation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accommodation $accommodation)
    {
        return view('admin.accommodations.form', [
            'model' => $accommodation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccommodationRequest  $request
     * @param  \App\Models\Hotel\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccommodationRequest $request, Accommodation $accommodation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {
        //
    }
}
