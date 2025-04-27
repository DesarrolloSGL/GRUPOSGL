<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Jenssegers\Agent\Agent;

class Quotations extends Component
{
    public function render()
    {
        $agent = new Agent();
        return view('livewire.admin.quotations',compact('agent'));
    }
}
