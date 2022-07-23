<?php

namespace App\Http\Livewire;

use App\Models\need_regulations;
use App\Models\need_professions;
use App\Models\need_regulations_regulation_profession;
use Livewire\Component;

class GetProfession extends Component
{

		public $regulation_id;

    public function get_profession($regulation_id)
    {
        $professions_ids = need_regulations_regulation_profession::select('professions_id')->where('regulations_id', $regulation_id)->get();
				return need_professions::whereIn('id', $professions_ids)->get();
    }

		public function mount($regulation_id)
		{
			$this->regulation_id = $regulation_id;
		}

    public function render()
    {
        return view('livewire.get-profession', [
						
            'professions' => $this->get_profession($this->regulation_id)
        ]);
    }
}
