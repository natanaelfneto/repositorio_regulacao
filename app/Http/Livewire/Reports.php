<?php

namespace App\Http\Livewire;

use App\Models\need_professions;
use App\Models\need_regulation_types;
use App\Models\need_regulation_issuers;

use Illuminate\Http\Request;

use Livewire\Component;

class Reports extends Component
{
	public function get_professions_report()
	{
		$object_list = [];
		foreach (need_professions::all()->unique() as $object)
		{
			array_push($object_list, $object);
		}
		return $object_list;
	}
	public function get_regulation_types_report()
	{
		$object_list = [];
		foreach (need_regulation_types::all()->unique() as $object)
		{
			array_push($object_list, $object);
		}
		return $object_list;
	}
	public function get_regulation_issuers_report()
	{
		$object_list = [];
		foreach (need_regulation_issuers::all()->unique() as $object)
		{
			array_push($object_list, $object);
		}
		return $object_list;
	}
	public function get_regulation_timestamps_report()
	{
		$object_list = [
			'1900-1950',
			'1951-1960',
			'1961-1970',
			'1971-1980',
			'1981-1990',
			'1991-2000',
			'2001-2010',
			'2011-2020',
			'2021-2030'
		];
		return $object_list;
	}
	public function render(Request $request)
	{
		$graph = 'professions';
		if ($request->graph != null) {
			$graph = $request->graph;
		}
		return view('livewire.reports', [
			'object_list_professions' => $this->get_professions_report(),
			'object_list_regulations_types' => $this->get_regulation_types_report(),
			'object_list_regulations_issuers' => $this->get_regulation_issuers_report(),
			'object_list_regulations_timestamps' => $this->get_regulation_timestamps_report(),
			'graph' => $graph,
		]);
	}
}