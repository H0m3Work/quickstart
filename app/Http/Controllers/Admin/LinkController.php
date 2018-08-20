<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LinksExport;
use App\Exports\InvoicesExport;
use App\Repositories\Link\LinkRepositoryInterface;

class LinkController extends Controller
{
	protected $linkRepository;

	public function __construct(LinkRepositoryInterface $linkRepository)
	{
		$this->linkRepository = $linkRepository;
	}

	public function index()
	{
		$links = $this->linkRepository->getAllLinks($id = false, $title = true);
		return view('links.index', compact('links'));
	}

	public function excel()
	{
		return view('links._excel');
	}

	public function import()
	{
		return ;
	}

    public function download()
	{
		return Excel::download(new LinksExport, 'links.xlsx');
	}

	public function create()
	{
		return view('links._add');
	}

	public function store(Request $request) 
	{
		$data = $request->all();
		$this->linkRepository->create($data);
		
		return redirect(route('links'));
	}

	public function destroy($id) 
	{
		
		return redirect(route('links'));
	}
}
