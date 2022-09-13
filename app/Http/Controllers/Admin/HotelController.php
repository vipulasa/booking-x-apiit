<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;
use App\Models\Category;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    use ListView;

    protected $model = Hotel::class;

    protected $fields = [
        'name',
        'url',
        'address',
        'phone',
        'sort_order',
        'status',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotelRequest $request)
    {
        // update the url attribute with the slug
        $request->merge([
            'url' => Str::slug($request->name)
        ]);

        // get the model
        $model = $this->getModel();

        // create a new instance of the model
        $model = $model
            ->newQuery()
            ->create($request->all());

        // check if the model was created
        if (!$model) {
            abort(500);
        }

        // redirect to the index page
        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Hotel created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.form', [
            'model' => $hotel,
            'categories' => (new Category())->where('status', 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHotelRequest  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {

        // update the url attribute with the slug
        $request->merge([
            'url' => Str::slug($request->name)
        ]);

        // update the model
        $hotel->update($request->all());

        // redirect to the index page
        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Hotel deleted successfully');
    }
}
