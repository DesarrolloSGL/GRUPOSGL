<?php

namespace App\Http\Livewire\Home;

use App\Models\Event;
use Livewire\Component;
use App\Models\Product;


class Portrait extends Component
{
    public $name, $lastname, $phone, $email;
    public $register_success = false;
    public $my_name_6oDb0ciz1AXZeGh7;

    public function render()
    {
        return view('livewire.home.portrait');
    }

    public function registerEvent()
    {


        $validator = $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'my_name_6oDb0ciz1AXZeGh7' => 'nullable',
        ]);

        $event = new Event();
        $event->name = $this->name;
        $event->lastname = $this->lastname;
        $event->phone = $this->phone;
        $event->email = $this->email;
        $event->description = 'Desayuno importadores y exportadores exitosos Julio 2024';
        $event->status = 1;
        $event->saveOrFail();

        $this->register_success = true;
    }
}
