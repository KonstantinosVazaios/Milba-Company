<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Price;

class UpdateWatersport extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'confirmDelete'
    ];

    public $watersport;
    public $title;
    public $billed_individually = NULL;

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
        'billed_individually' => ['nullable', 'string', 'max:255'],
    ];

    public $duration = NULL;
    public $price = NULL;
    public $prices;

    public function mount()
    {
        $this->title = $this->watersport->title;
        $this->billed_individually = $this->watersport->billed_individually;
        $this->prices = collect($this->watersport->prices->toArray());
    }

    public function render()
    {
        return view('livewire.update-watersport');
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

        $this->watersport->update([
            'title' => $validated['title'],
            'billed_individually' => $validated['billed_individually']
        ]);
        $watersport = $this->watersport;

        DB::table('prices')->where('sport_id', $watersport->id)->delete();

        $this->prices->map(function($price) use($watersport) {
            $watersport->prices()->create([
                'duration' => $price['duration'],
                'price' => $price['price']
            ]);
        });

        $this->alert('success', '????????????????!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => "???? ?????????????? ?????????????????????????? ????????????????",
        ]);
    }

    public function delete()
    {
        $this->alert('warning', '?????????? ???????????????? ?????? ???????????? ???? ???????????????????? ???? Watersport;', [
            'position' => 'center',
            'timer' => 7000,
            'toast' => false,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => '????????????????',
            'cancelButtonText' => '??????????????',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'onConfirmed' => 'confirmDelete' 
        ]);
    }

    public function confirmDelete()
    {
        $this->watersport->delete();
        return redirect('/admin');
    }
}
