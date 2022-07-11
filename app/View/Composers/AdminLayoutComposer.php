<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Models\Sport;

class AdminLayoutComposer
{
    protected $watersports;
 
    public function __construct()
    {
        $this->watersports = Sport::all();
    }
 
    public function compose(View $view)
    {
        $view->with('watersports', $this->watersports);
    }
}