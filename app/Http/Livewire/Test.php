<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $modal = false;
    public function render()
    {
        return view('livewire.test');
    }

    public function  test()
    {
        $this->modal = true;
    }

    public function  close()
    {
        $this->modal = false;
    }
}
