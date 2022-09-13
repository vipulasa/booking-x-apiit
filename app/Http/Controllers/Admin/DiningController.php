<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiningRequest;
use App\Http\Requests\UpdateDiningRequest;
use App\Models\Hotel\Dining;
use App\Models\Category;

class DiningController extends Controller
{
    use ListView;

    protected $model = Dining::class;

    protected $fields = [
        'hotel_id',
        'title',
        'sort_order',
        'status',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiningRequest $request)
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
            ->route('admin.dinings.index')
            ->with('success', 'Dining created successfully');
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
        return view('admin.dinings.form', [
            'model' => $dining,
            'categories' => (new Category())->where('status', 1)->get()
        ]);
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
        // check if there is a value in the features attribute and if so, convert it to an array
        if ($request->has('features')) {
            $request->merge([
                'features' => explode(',', $request->features)
            ]);
        }

        // update the model
        $dining->update($request->all());

        // redirect to the index page
        return redirect()
            ->route('admin.dinings.index')
            ->with('success', 'Dining updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel\Dining  $dining
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dining $dining)
    {
        $dining->delete();

        return redirect()
            ->route('admin.dinings.index')
            ->with('success', 'Dining deleted successfully');
    }
}
