<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\need_regulations;

class Regulations extends Component
{
	public function need_regulations_list()
	{
		return need_regulations::select()->paginate(200);
	}

	public function need_regulations_list_count()
	{
		return need_regulations::all()->unique()->count();
	}
	
	public function render()
	{
		return view('livewire.regulations', [
			'object_list' => $this->need_regulations_list(),
			'object_list_count' => $this->need_regulations_list_count(),
		]);
	}
}
