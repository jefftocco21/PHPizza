<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Topping;

class ToppingDropdown extends Component
{
    public function render()
    {
        return view('components.topping-dropdown',[
            'toppings' => Topping::all(),
            'currentTopping' => Topping::firstWhere('slug', request('topping'))
        ]);
    }
}
