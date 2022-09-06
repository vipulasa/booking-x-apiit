<?php

namespace App\Http\Controllers\Admin\Helpers;

use Illuminate\Support\Str;

trait ListView
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get the model
        $model = $this->getModel();

        // check if the model exists or throw error
        if (!$model) {
            abort(404);
        }

        // get the paginated instance of the model data
        $data = $model
            ->newQuery()
            ->paginate(10);

        // take the class base name and make it plural
        $name = Str::plural(strtolower(class_basename($model)));

        // check if a view exists for this model name
        if (!view()->exists("admin.template.index")) {
            abort(404);
        }

        // return the data to the view with the model, name and data
        return view("admin.template.index", [
            'model' => $model,
            'name' => $name,
            'data' => $data,
            'fields' => $this->getFields()
        ]);
    }

    /**
     * Get model fields
     */
    private function getFields(){
        return isset($this->fields) && $this->fields ? $this->fields : $this->getModel()->getFillable();
    }

    /**
     * Get the class model
     */
    private function getModel()
    {
        // check if the controller has a model property and return an instance of it
        return isset($this->model) && $this->model ? (new $this->model) : null;
    }
}
