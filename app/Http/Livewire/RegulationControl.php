<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;

use App\Models\need_regulations;
use App\Models\need_regulation_issuers;
use App\Models\need_regulation_types;
use App\Models\need_professions;

use Livewire\Component;

use Illuminate\Http\Request;

class RegulationControl extends Component
{

	public function regulations_list()
	{
		return need_regulations::where('regulation_status', '0')->paginate(25);
	}

	public function regulations_list_all_count()
	{
		return need_regulations::where('regulation_status', '0')->count();
	}

	public function regulation_issuers_unique()
	{
		return need_regulation_issuers::all()->unique();
	}

	public function regulation_types_unique()
	{
		return need_regulation_types::all()->unique();
	}

	public function need_professions_unique()
	{
		return need_professions::all()->unique();
	}

	public function regulations_search($request, $pagination)
	{
		Log::info('NOVA PESQUISA >> '. PHP_EOL . PHP_EOL . PHP_EOL);

		# third step is check is one of the fields has genenic value
		if ($request->filter_keyword == '')
		{ $filter_keyword = '%%'; }
		else { $filter_keyword = '%' . $request->filter_keyword . '%'; }

		if ($request->regulation_issuer == 'Todos os emissores')
		{ $regulation_issuer = '%%'; }
		else { $regulation_issuer = $request->regulation_issuer; }

		if ($request->regulation_type == 'Todos os tipos')
		{ $regulation_type = '%%'; }
		else { $regulation_type = $request->regulation_type; }

		if ($request->professions_name == 'Todas as profissões')
		{ $profession = '%%'; }
		else {
			$profession = need_professions::
				select('id')->
				where('name', 'like', $request->professions_name)->
				get()[0]['id'];
		}
		 
		$regulation_interval = $request->regulation_interval;
		if (strpos($regulation_interval, ' até ') == false)
		{
			$regulation_interval_from = $regulation_interval;
			$regulation_interval_to = $regulation_interval;
		}
		else {
			$regulation_interval_from = trim(explode(' até ', $regulation_interval)[0]);
			$regulation_interval_to = trim(explode(' até ', $regulation_interval)[1]);
		}

		# combined results for fields in sql eloquent paginated by 25;
		if ($pagination)
		{
			// result for synopsis result
			$result_synopsis = need_regulations::
				select(
					'need_regulations.id',
					'regulation_number', 
					'regulation_type', 
					'regulation_timestamp', 
					'regulation_synopsis',
					'regulation_issuer',
					'regulation_full_content',
					'created_at', 
					'created_by_id', 
					'regulation_link', 
					'regulations_id', 
					'professions_id'
				)->
				leftJoin('need_regulations_regulation_profession', 'need_regulations.id', '=', 'regulations_id')->
				where('regulation_synopsis', 'like', $filter_keyword )->
				where('regulation_issuer', 'like', $regulation_issuer )->
				where('regulation_type', 'like', $regulation_type )->
				where('professions_id', 'like', $profession)->
				whereBetween('regulation_timestamp', [$regulation_interval_from, $regulation_interval_to])->
				where('regulation_status', '0');
				
				// result full content
				$resut_full_content = need_regulations::
				select(
					'need_regulations.id',
					'regulation_number', 
					'regulation_type', 
					'regulation_timestamp', 
					'regulation_synopsis',
					'regulation_issuer',
					'regulation_full_content',
					'created_at', 
					'created_by_id', 
					'regulation_link', 
					'regulations_id', 
					'professions_id'
				)->
				leftJoin('need_regulations_regulation_profession', 'need_regulations.id', '=', 'regulations_id')->
				where('regulation_full_content', 'like', $filter_keyword )->
				where('regulation_issuer', 'like', $regulation_issuer )->
				where('regulation_type', 'like', $regulation_type )->
				where('professions_id', 'like', $profession)->
				whereBetween('regulation_timestamp', [$regulation_interval_from, $regulation_interval_to])->
				where('regulation_status', '0');
				
				$result = $result_synopsis->union($resut_full_content)->paginate(25);
		}
		else {
			// result for synopsis result
			$result_synopsis = need_regulations::
				select(
					'need_regulations.id',
					'regulation_number', 
					'regulation_type', 
					'regulation_timestamp', 
					'regulation_synopsis',
					'regulation_issuer',
					'regulation_full_content',
					'created_at', 
					'created_by_id', 
					'regulation_link', 
					'regulations_id', 
					'professions_id'
				)->
				leftJoin('need_regulations_regulation_profession', 'need_regulations.id', '=', 'regulations_id')->
				where('regulation_synopsis', 'like', $filter_keyword )->
				where('regulation_issuer', 'like', $regulation_issuer )->
				where('regulation_type', 'like', $regulation_type )->
				where('professions_id', 'like', $profession)->
				whereBetween('regulation_timestamp', [$regulation_interval_from, $regulation_interval_to])->
				where('regulation_status', '0');
				
				// result full content
				$resut_full_content = need_regulations::
				select(
					'need_regulations.id',
					'regulation_number', 
					'regulation_type', 
					'regulation_timestamp', 
					'regulation_synopsis',
					'regulation_issuer',
					'regulation_full_content',
					'created_at', 
					'created_by_id', 
					'regulation_link', 
					'regulations_id', 
					'professions_id'
				)->
				leftJoin('need_regulations_regulation_profession', 'need_regulations.id', '=', 'regulations_id')->
				where('regulation_full_content', 'like', $filter_keyword )->
				where('regulation_issuer', 'like', $regulation_issuer )->
				where('regulation_type', 'like', $regulation_type )->
				where('professions_id', 'like', $profession)->
				whereBetween('regulation_timestamp', [$regulation_interval_from, $regulation_interval_to])->
				where('regulation_status', '0');
				
				$result = $result_synopsis->union($resut_full_content)->count();
		}

		return $result;
	}

	public function render(Request $request)
	{
		# starting search function
		# first step is to check if there is null or generic values for fields
		$keyword_flag = $request->filter_keyword == null || $request->filter_keyword == '';
		$issuer_flag = $request->regulation_issuer == null || $request->regulation_issuer == 'Todos os emissores';
		$type_flag = $request->regulation_type == null || $request->regulation_type == 'Todos os tipos';
		$profession_flag = $request->professions_name == null || $request->professions_name == 'Todas as profissões';
		$interval_flag = $request->regulation_interval == null || $request->regulation_interval == '';

		# second step is return generic result for null or combined generic field values
		if ($issuer_flag && $type_flag && $profession_flag && $keyword_flag && $interval_flag)
		{
			return view('livewire.regulation-control', [
				'object_list' => $this->regulations_list(),
				'object_list_count' => $this->regulations_list_all_count(),
				'regulation_issuers' => $this->regulation_issuers_unique(),
				'regulation_types' => $this->regulation_types_unique(),
				'professions' => $this->need_professions_unique(),
			]);
		}
		else
		{
			return view('livewire.regulation-control', [
				'object_list' => $this->regulations_search($request, 25),
				'object_list_count' => $this->regulations_search($request, null),
				'regulation_issuers' => $this->regulation_issuers_unique(),
				'regulation_types' => $this->regulation_types_unique(),
				'professions' => $this->need_professions_unique(),
			]);
		}
		
	}
}
