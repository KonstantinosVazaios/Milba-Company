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
    public $pcs = NULL;
    public $finalPrice = NULL;
    public $notes = NULL;


    public function mount()
    {
        $this->watersports = Sport::with('prices')->get();
        $this->prices = collect();
        $this->selectedPaymentMethod = "CASH";
        $this->pcs = 1;

        if ($this->watersports->count() == 0) return;
        $this->selectedWatersport = $this->watersports->first();

        if ($this->selectedWatersport->prices->count() == 0) return;
        $this->prices = $this->selectedWatersport->prices;
        $this->selectedPrice = $this->selectedWatersport->prices->first();
        $this->finalPrice = $this->selectedPrice->price * $this->pcs;
    }

    public function render()
    {
        return view('livewire.create-order');
    }


    public function selectSport($sportId)
    {
        if (!is_null($sportId)) {
            $this->selectedWatersport = $this->watersports->where('id', $sportId)->first();
            
            if (!$this->selectedWatersport) return;

            $this->prices = $this->selectedWatersport->prices;
            $this->selectedPrice = $this->selectedWatersport->prices->first();
            $this->pcs = 1;
            $this->finalPrice = $this->selectedPrice->price * $this->pcs;
        }
    }

    public function selectPrice($priceId)
    {
        if (!is_null($priceId)) {
            $this->selectedPrice =$this->selectedWatersport->prices->where('id', $priceId)->first();
            $this->finalPrice = $this->selectedPrice->price * $this->pcs;
        }
    }

    public function selectPaymentMethod($paymentMethod)
    {
        if (!is_null($paymentMethod) && ($paymentMethod == 'CASH' || $paymentMethod == 'CARD')) {
            $this->selectedPaymentMethod = $paymentMethod;
        }
    }

    public function updatedPcs($pcs)
    {
       if ($pcs) $this->finalPrice = $this->selectedPrice->price * (int)$pcs;
    }

    public function submit()
    {
        $order = Order::create([
            'sport_id' => $this->selectedWatersport->id,
            'duration' => $this->selectedPrice->duration,
            'price' => $this->finalPrice,
            'payment_method' => $this->selectedPaymentMethod,
            'notes' => $this->notes
        ]);
        
        $order->load('sport:id,title');

        $data = [
            "Order" => $order->id,
            "Activity" => $order->sport->title,
            "Offer" => $order->duration,
            "Price" => $this->selectedWatersport->billed_individually ? $this->selectedPrice->price : $order->price,
            'Payment Method' => $order->payment_method
        ];

        if ($this->selectedWatersport->billed_individually) {
            $data[$this->selectedWatersport->billed_individually] = $this->pcs;
            $data['Final Price'] = $order->price;
        }

        if ($order->notes) {
            $data['Notes'] = $order->notes;
        }

        OrderCreated::dispatch($data);
 
        $this->reset(['notes']);

        $this->alert('success', 'Επιτυχία!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => "Η παραγγελία καταχωρήθηκε επιτυχώς",
        ]);
        
    }


}
