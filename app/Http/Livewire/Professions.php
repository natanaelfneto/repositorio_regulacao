<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\need_professions;

class Professions extends Component
{
	public function need_professions_list()
	{
		return need_professions::all()->unique();
	}

	public function need_profesions_list_count()
	{
		return need_professions::all()->unique()->count();
	}
	
	public function render()
	{
		return view('livewire.professions', [
			'object_list' => $this->need_professions_list(),
			'object_list_count' => $this->need_profesions_list_count(),
		]);
	}
}
