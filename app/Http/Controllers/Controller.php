<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\need_regulation_issuers;
use App\Models\need_regulation_types;
use App\Models\need_professions;
use App\Models\need_regulations;

use Illuminate\Http\Request;

class Controller extends BaseController
{
		public function index(){

			$issuer_names = [];
			foreach (need_regulation_issuers::all()->unique() as $regulation_issuer)
			{
				array_push($issuer_names, $regulation_issuer);
			}
			$regulation_issuers = $issuer_names;
			
			$regulation_professions = [];
			foreach (need_professions::all()->unique() as $regulation_profession)
			{
				array_push($regulation_professions, $regulation_profession);
			}
			$professions = $regulation_professions;

			$type_names = [];
			foreach (need_regulation_types::all()->unique() as $regulation_type)
			{
				array_push($type_names, $regulation_type);
			}
			$regulation_types = $type_names;
			
			return view(
				'index', [
					'regulation_issuers' => $regulation_issuers,
					'professions' => $professions,
					'regulation_types' => $regulation_types
				]
			);
		}

		public function professions_counter(Request $request)
		{
			$profession_name = $request->input( 'name' );
			if ($profession_name == 'Todas as profissões') {
				$profession_id = 'null';
				$result = need_regulations::
				select(
					'need_regulations.id',
					'regulations_id', 
					'professions_id'
				)->
				leftJoin('need_regulations_regulation_profession', 'need_regulations.id', '=', 'regulations_id')->
				where('professions_id', 'null')->
				where('regulation_status', '0')->
				count();
			}
			else {
				$profession_id = need_professions::select('id')->where('name', $profession_name)->get()[0]['id'];
				$result = need_regulations::
				select(
					'need_regulations.id',
					'regulations_id', 
					'professions_id'
				)->
				leftJoin('need_regulations_regulation_profession', 'need_regulations.id', '=', 'regulations_id')->
				where('professions_id', 'like', $profession_id)->
				where('regulation_status', '0')->
				count();
			}
			return $result;
		}

		public function types_regulations_count(Request $request)
		{
			$regulation_type_name = $request->input( 'name' );
			if ($regulation_type_name == 'Todos os tipos') {
				$result = need_regulations::
				where('regulation_type', 'null')->
				where('regulation_status', '0')->
				count();
			}
			else {
				$result = need_regulations::
				where('regulation_type', 'like', $regulation_type_name)->
				where('regulation_status', '0')->
				count();
			}
			return $result;
		}

	public function issuers_regulations_count(Request $request)
		{
			$regulation_issuer_name = $request->input( 'name' );
			if ($regulation_issuer_name == 'Todos os emissores') {
				$result = need_regulations::
				where('regulation_issuer', 'null')->
				where('regulation_status', '0')->
				count();
			}
			else {
				$result = need_regulations::
				where('regulation_issuer', 'like', $regulation_issuer_name)->
				where('regulation_status', '0')->
				count();
			}
			return $result;
		}

	public function timestamp_regulations_count(Request $request)
		{
			Log::info('intervalo>> '. $request->input( 'name' ));

			$from = trim(explode('-', $request->input( 'name' ))[0]);
			$to = trim(explode('-', $request->input( 'name' ))[1]);

			Log::info('from/to>> '. $from . '/' . $to);

			$regulation_interval_from = $from . '-01-01';
			$regulation_interval_to = $to . '-12-31';

			Log::info('from/to formatted>> '. $regulation_interval_from . '/' . $regulation_interval_to);

			$result = need_regulations::
			whereBetween('regulation_timestamp', [$regulation_interval_from, $regulation_interval_to])->
			where('regulation_status', '0')->
			count();
			
			return $result;
		}

		
}