<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Sport;

class CreateWatersport extends Component
{
    public $title = NULL;

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
    ];

    public $duration = NULL;
    public $price = NULL;
    public $prices;

    public function mount()
    {
        $this->prices = collect();
    }

    public function render()
    {
        return view('livewire.create-watersport');
    }

    public function addPrice()
    {
        $this->validatePrice();
        
        $this->prices->push([
            'duration' => $this->duration,
            'price' => $this->price
        ]);

        $this->reset(['duration', 'price']);
    }

    public function removePrice($key)
    {
        $this->prices->pull($key);
    }

    public function validatePrice()
    {
        $validator = Validator::make(array(
            'duration' => $this->duration,
            'price' => $this->price
        ), [
            'duration' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        return $validator->validated();
    }

    public function submit()
    {
        $validated = $this->validate();

        $watersport = Sport::create(['title' => $validated['title']]);

        $this->prices->map(function($price) use($watersport) {
            $watersport->prices()->create([
                'duration' => $price['duration'],
                'price' => $price['price']
            ]);
        });

        return redirect("/admin/watersports/{$watersport->id}")->with('success', 'Επιτυχής δημιουργία Watersport');
    }
}
