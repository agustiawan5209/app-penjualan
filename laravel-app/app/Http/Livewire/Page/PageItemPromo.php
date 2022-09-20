<?php

namespace App\Http\Livewire\Page;

use App\Models\Promo;
use Livewire\Component;

class PageItemPromo extends Component
{
    public function render()
    {
        $promo = Promo::all();
        return view('livewire.page.page-item-promo',compact('promo'));
    }
}
