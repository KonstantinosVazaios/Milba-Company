<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Events\OrderCreated;
use App\Models\Sport;
use App\Models\Price;
use App\Models\Order;

class CreateOrder extends Component
{
    use LivewireAlert;

    public $watersports;
    public $prices;

    public $selectedWatersport = NULL;
    public $selectedPrice = NULL;
    public $selectedPaymentMethod = NULL;


    protected $rules = [
        'selectedWatersport' => ['required', 'numeric'],
        'selectedPrice' => ['required', 'numeric'],
        'selectedPaymentMethod' => ['required']
    ];

    public function mount()
    {
        $this->watersports = Sport::all();
        $this->prices = collect();
    }

    public function render()
    {
        return view('livewire.create-order');
    }

    public function updatedSelectedWatersport($watersport)
    {
        if (!is_null($watersport)) {
            $this->prices = Price::where('sport_id', $watersport)->get();
        }
    }

    public function submit()
    {
        $validated = $this->validate();
        
        $sportExists = Sport::find($this->selectedWatersport);
        if (!$sportExists) return;

        $priceExists = $sportExists->prices()->find($this->selectedPrice);
        if (!$priceExists) return;

        $isPaymentMethodValid = $this->selectedPaymentMethod == 'CARD' || $this->selectedPaymentMethod == 'CASH';
        if (!$isPaymentMethodValid) return;

        $order = Order::create([
            'sport_id' => $this->selectedWatersport,
            'duration' => $priceExists->duration,
            'price' => $priceExists->price,
            'payment_method' => $this->selectedPaymentMethod,
        ]);

        $order->load('sport:id,title');
        OrderCreated::dispatch($order);

        $this->reset(['selectedWatersport', 'selectedPrice', 'selectedPaymentMethod']);

        $this->alert('success', 'Επιτυχία!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => "Η παραγγελία καταχωρήθηκε επιτυχώς",
        ]);
        
    }


}
