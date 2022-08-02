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
    public $data = [];

    protected $listeners = [
        'confirmDelete'
    ];

    public function mount()
    {
        $this->terminations = EndofdayModel::orderBy('created_at', 'desc')->whereNotNull('datetime_to')->get();
    }

    public function render()
    {
        return view('livewire.endofday');
    }

    public function show($id)
    {
        $termination = EndofdayModel::find($id);

        if (!$termination) return;

        $this->data = $this->getData($termination);

        $this->dispatchBrowserEvent('showStatistics');
    }

    public function print($id)
    {
        $termination = EndofdayModel::find($id);

        if (!$termination) return;
        
        $data = $this->getData($termination);

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
        
        $termination->delete();

        $this->alert('success', 'Επιτυχία!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => "Το Κλείσιμο Ημέρας διαγράφθηκε",
        ]);
    }

    public function getData(EndofdayModel $termination)
    {
        $total = Order::where('created_at', '>=', $termination->datetime_from)->where('created_at', '<=', $termination->datetime_to)->sum('price');
        $totalCash = Order::where('payment_method', 'CASH')->where('created_at', '>=', $termination->datetime_from)->where('created_at', '<=', $termination->datetime_to)->sum('price');
        $totalCredit = Order::where('payment_method', 'CARD')->where('created_at', '>=', $termination->datetime_from)->where('created_at', '<=', $termination->datetime_to)->sum('price');
        $sports = Order::where('created_at', '>=', $termination->datetime_from)->where('created_at', '<=', $termination->datetime_to)->with('sport')->get()->groupBy('sport.title')->map->sum('price');

        $data = array(
            "ΑΠΟ" => (new \Carbon\Carbon($termination->datetime_from))->format('d/m/Y H:i'),
            "ΜΕΧΡΙ" => (new \Carbon\Carbon($termination->datetime_to))->format('d/m/Y H:i'),
            "ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ" => $total . '€',
            "ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ ΜΕΤΡΗΤΑ" => $totalCash . '€',
            "ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ ΚΑΡΤΑ" => $totalCredit . '€'
        );

        foreach ($sports as $sportTitle => $income) {
            $data[$sportTitle] = $income . '€';
        }

        return $data;
    }
}
