<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Endofday;

class EndofdayToggle extends Component
{
    public $day_has_started;

    public function mount()
    {
        $this->day_has_started = Setting::first()->day_has_started;
    }

    public function render()
    {
        return view('livewire.endofday-toggle');
    }

    public function startDay()
    {
        $datetime = date("Y-m-d H:i:s");
        Endofday::create(['datetime_from' => $datetime]);
        Setting::first()->update(['day_has_started' => true]);
        $this->day_has_started = true;
        $this->dispatchBrowserEvent('day_started');
    }

    public function endDay()
    {
        $datetime = date("Y-m-d H:i:s");
        Endofday::latest('created_at')->first()->update(['datetime_to' => $datetime]);
        Setting::first()->update(['day_has_started' => false]);
        $this->day_has_started = false;
        $this->dispatchBrowserEvent('day_ended');
    }
}
