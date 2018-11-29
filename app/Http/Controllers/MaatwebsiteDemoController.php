<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Agra;
use Maatwebsite\Excel\Facades\Excel;

class MaatwebsiteDemoController extends Controller
{
    public function importExport()
	{
		return view('importExport');
	}

	public function downloadExcel(Request $request, $type)
	{
		$data = Item::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function importExcel(Request $request)
	{

		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$insert = [];
			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $v) {
					if(!empty($v)){
						// foreach ($value as $v) {		
							$insert[] = [
								"CABANG" => $v["CABANG"][$key], "CIF" => $v["CIF"][$key], "NO_REK" => $v["NO_REK"][$key], "NASABAH" => $v["NASABAH"][$key],
								"GROUP_NASABAH" => $v["GROUP_NASABAH"][$key], "CUSTOMER_RATING" => $v["CUSTOMER_RATING"][$key], "PRODUK" => $v["PRODUK"][$key], "OWNERSHIP" => $v["OWNERSHIP"][$key],
								"PRIME" => $v["PRIME"][$key], "SEKTOR" => $v["SEKTOR"][$key], "BUC" => $v["BUC"][$key], "NIP_RM" => $v["NIP_RM"][$key],
								"NAMA_RM" => $v["NAMA_RM"][$key], "KOLEKTABILITAS" => $v["KOLEKTABILITAS"][$key], "RESTRU" => $v["RESTRU"][$key], "LIMIT" => $v["LIMIT"][$key],
								"BADE" => $v["BADE"][$key], "VALUTA" => $v["VALUTA"][$key], "KURS" => $v["KURS"][$key], "TANGGAL_PEMBUKAAN" => $v["TANGGAL_PEMBUKAAN"][$key],
								"TANGGAL_JATUH_TEMPO" => $v["TANGGAL_JATUH_TEMPO"][$key], "NILAI_RY" => $v["NILAI_RY"][$key], "RATE" => $v["RATE"][$key], "WRITE_OFF" => $v["WRITE_OFF"][$key],
								"STATUS_DOWNGRADE" => $v["STATUS_DOWNGRADE"][$key], "FAR" => $v["FAR"][$key], "JAMINAN" => $v["JAMINAN"][$key]


							];
						// }
					}
				}

				
				if(!empty($insert)){
					\DB::table('agras')->insert($insert);
					return back()->with('success','Insert Record successfully.');
				}

			}

		}

		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}
