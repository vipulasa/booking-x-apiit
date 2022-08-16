<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelect extends Component
{
    public $id;
    public $name;
    public $label;
    public $value;
    public $placeholder;
    public $help;
    public $required;
    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $label, $value, $placeholder = '', $options = [], $help = '', $required = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->help = $help;
        $this->required = $required;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-select', [
            'id' => $this->id,
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value,
            'placeholder' => $this->placeholder,
            'help' => $this->help,
            'required' => $this->required,
            'options' => $this->options,
        ]);
    }
}
