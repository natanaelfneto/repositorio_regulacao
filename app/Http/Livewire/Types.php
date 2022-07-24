<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\need_regulation_types;

class Types extends Component
{
	public function need_issuers_list()
	{
		return need_regulation_types::all()->unique();
	}

	public function need_issuers_list_count()
	{
		return need_regulation_types::all()->unique()->count();
	}
	
	public function render()
	{
		return view('livewire.types', [
			'object_list' => $this->need_issuers_list(),
			'object_list_count' => $this->need_issuers_list_count(),
		]);
	}
}
