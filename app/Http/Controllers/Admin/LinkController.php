<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LinksExport;
use App\Exports\InvoicesExport;
use Illuminate\Support\Collection;

class LinkController extends Controller
{
	public function excelPage()
	{
		return view('excel');
	}

    public function downloadExcel($type)
	{
		return Excel::download(new LinksExport, 'links.xlsx');
		// return (new Collection(Link::all()))->downloadExcel(
		// 	'links.xlsx',
		// 	$writerType = null,
		// 	$headings = true
		// );
	}
}
