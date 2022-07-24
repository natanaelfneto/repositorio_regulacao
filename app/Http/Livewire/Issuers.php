<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\need_regulation_issuers;

class Issuers extends Component
{
	public function need_issuers_list()
	{
		return need_regulation_issuers::all()->unique();
	}

	public function need_issuers_list_count()
	{
		return need_regulation_issuers::all()->unique()->count();
	}
	
	public function render()
	{
		return view('livewire.issuers', [
			'object_list' => $this->need_issuers_list(),
			'object_list_count' => $this->need_issuers_list_count(),
		]);
	}
}
