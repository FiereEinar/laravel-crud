<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class InputField extends Component
{
    public string $name;
    public string $label;
    public string $value;
    public string $type;
    public string $input;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $label, string $value = '', string $type = 'text', string $input = 'input')
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
        $this->input = $input;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
