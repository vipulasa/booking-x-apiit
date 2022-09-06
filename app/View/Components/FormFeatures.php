<?php

namespace App\View\Components;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class FormFeatures extends Component
{
    public $value;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value = [], $required = false)
    {
        $this->value = is_null($value) ? [] : $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-features', [
            'value' => $this->value,
            'required' => $this->required,
        ]);
    }
}
