<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiningRequest;
use App\Http\Requests\UpdateDiningRequest;
use App\Models\Hotel\Dining;

class DiningController extends Controller
{
    use ListView;

    protected $model = Dining::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiningRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Http\Response
     */
    public function show(Dining $dining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Http\Response
     */
    public function edit(Dining $dining)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiningRequest  $request
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiningRequest $request, Dining $dining)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dining $dining)
    {
        //
    }
}
