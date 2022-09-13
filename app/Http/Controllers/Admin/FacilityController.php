<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Models\Hotel\Facility;
use App\Models\Category;

class FacilityController extends Controller
{
    use ListView;

    protected $model = Facility::class;

    protected $fields = [
        'hotel_id',
        'title',
        'sort_order',
        'status',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFacilityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacilityRequest $request)
    {
        // get the model
        $model = $this->getModel();

        // check if there is a value in the features attribute and if so, convert it to an array
        if ($request->has('features')) {
            $request->merge([
                'features' => explode(',', $request->features)
            ]);
        }

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
            ->route('admin.facilities.index')
            ->with('success', 'Facility created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel\Facility  $dining
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        return view('admin.facilities.form', [
            'model' => $facility,
            'categories' => (new Category())->where('status', 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacilityRequest  $request
     * @param  \App\Models\Hotel\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacilityRequest $request, Facility $facility)
    {
        // check if there is a value in the features attribute and if so, convert it to an array
        if ($request->has('features')) {
            $request->merge([
                'features' => explode(',', $request->features)
            ]);
        }

        // update the model
        $facility->update($request->all());

        // redirect to the index page
        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Facility updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Facility deleted successfully');
    }
}
