<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;

class Category extends Component
{

    public $title;
    public $subtitle;
    public $button;

    // public function mount($title,$subtitle)
    // {
    //     $this->title = $title;
    //     $this->subtitle = $subtitle;
    // }

    public function render()
    {
        return view('livewire.store.category');
    }
}
