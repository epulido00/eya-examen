<?php

namespace App\Http\Livewire;

use App\Models\Ship;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{

    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.search', [
            'ships' => Ship::orWhere('full_name', 'like', '%' . $this->search . '%')
                ->orwhere('email', 'like', '%' . $this->search . '%')
                ->orwhere('telephone', 'like', '%' . $this->search . '%')
                ->orwhere('content', 'like', '%' . $this->search . '%')
                ->paginate(2)
        ]);
    }
}
