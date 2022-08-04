<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use App\Events\OrderCreated;
use App\Models\Order;
use Carbon\Carbon;

class Orders extends Component
{
    use LivewireAlert, WithPagination;

    protected $listeners = [
        'confirmDelete',
        'confirmPrint'
    ];

    public $selectedId;

    public function render()
    {
        return view('livewire.orders', [
            'orders' => Order::whereDate('created_at', Carbon::today())->orderBy('created_at', 'DESC')->with('sport:id,title')->simplePaginate(75),
        ]);
    }

    public function delete($id)
    {
        $this->selectedId = $id;

        $this->alert('warning', 'Είστε σίγουρος οτι θέλετε να διαγράψετε την Παραγγελία;', [
            'position' => 'center',
            'timer' => 7000,
            'toast' => false,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Διαγραφή',
            'cancelButtonText' => 'Ακύρωση',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'onConfirmed' => 'confirmDelete' 
        ]);
    }

    public function confirmDelete()
    {
        $id = $this->selectedId;
        
        $order = Order::find($id);
        if (!$order) return;

        $order->delete();

        $this->alert('success', 'Επιτυχία!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => "Η παραγγελία διαγράφθηκε",
        ]);
    }

    public function print($id)
    {
        $this->selectedId = $id;

        $this->alert('info', 'Aποστολή παραγγελίας για εκτύπωση', [
            'position' => 'center',
            'timer' => 7000,
            'toast' => false,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Εκτύπωση',
            'cancelButtonText' => 'Ακύρωση',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'onConfirmed' => 'confirmPrint' 
        ]);
    }

    public function confirmPrint()
    {
        $order = Order::find($this->selectedId);
        $order->load('sport');

        $data = [
            "Order" => $order->id,
            "Activity" => $order->sport->title,
            "Offer" => $order->duration,
            "Price" => $order->price,
            'Payment Method' => $order->payment_method,
            'Notes' => $order->notes
        ];

        // if ($order->sport->billed_individually) {
        //     $data[$order->sport->billed_individually] = $this->pcs;
        //     $data['Τελική Τιμή'] = $order->price;
        // }

        OrderCreated::dispatch($data);

        $this->alert('success', 'Επιτυχία!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => "Η παραγγελία στάθληκε για εκτύπωση επιτυχώς",
        ]);
    }
}
