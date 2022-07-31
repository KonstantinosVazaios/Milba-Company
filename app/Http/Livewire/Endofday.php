<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Endofday as EndofdayModel;
use App\Models\Order;
use App\Events\DayEnded;

class Endofday extends Component
{
    use LivewireAlert;

    public $terminations;

    public $selectedId;
    public $total;
    public $totalCash;
    public $totalCredit;
    public $sports;


    protected $listeners = [
        'confirmDelete'
    ];

    public function mount()
    {
        $this->terminations = EndofdayModel::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.endofday');
    }

    public function show($id)
    {
        $termination = EndofdayModel::find($id);

        if (!$termination) return;

        $this->getData($termination);
    }

    public function print($id)
    {
        $termination = EndofdayModel::find($id);

        if (!$termination) return;
        
        $this->getData($termination);

        $data = array(
            "ΑΠΟ" => (new \Carbon\Carbon($termination->datetime_from))->format('d/m/Y H:i'),
            "ΜΕΧΡΙ" => (new \Carbon\Carbon($termination->datetime_to))->format('d/m/Y H:i'),
            "ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ" => $this->total,
            "ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ ΜΕΤΡΗΤΑ" => $this->totalCash,
            "ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ ΚΑΡΤΑ" => $this->totalCredit
        );

        foreach ($this->sports as $sportTitle => $income) {
            $data[$sportTitle] = $income;
        }

        DayEnded::dispatch($data);

        $this->alert('success', 'Επιτυχία!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => "Το Κλείσιμο Ημέρας στάλθηκε για εκτύπωση",
        ]);
    }

    public function delete($id)
    {
        $this->selectedId = $id;

        $this->alert('warning', 'Είστε σίγουρος οτι θέλετε να διαγράψετε τo Κλεισιμο Ημέρας;', [
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
        
        $termination = EndofdayModel::find($id);
        if (!$termination) return;
        
        $this->terminations = $this->terminations->filter(function($termination) use($id) {
            return $termination->id != $id;
        });
        
        // $termination->delete();

        $this->alert('success', 'Επιτυχία!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => "Το Κλείσιμο Ημέρας διαγράφθηκε",
        ]);
    }

    public function getData(EndofdayModel $termination)
    {
        $this->total = Order::whereBetween('created_at', [$termination->datetime_from, $termination->datetime_to])->sum('price');
        $this->totalCash = Order::where('payment_method', 'CASH')->whereBetween('created_at', [$termination->datetime_from, $termination->datetime_to])->sum('price');
        $this->totalCredit = Order::where('payment_method', 'CARD')->whereBetween('created_at', [$termination->datetime_from, $termination->datetime_to])->sum('price');
        $this->sports = Order::whereBetween('created_at', [$termination->datetime_from, $termination->datetime_to])->with('sport')->get()->groupBy('sport.title')->map->sum('price');
    }
}
