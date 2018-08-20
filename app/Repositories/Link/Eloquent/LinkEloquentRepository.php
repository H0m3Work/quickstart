<?php 

namespace App\Repositories\Link\Eloquent;

use App\Repositories\Link\LinkRepositoryInterface;
use App\Repositories\EloquentRepository;

class LinkEloquentRepository extends EloquentRepository implements LinkRepositoryInterface
{
	public function getModel()
	{
		return \App\Models\Link::class;
	}

	public function getAllLinks($id = false, $title = false, $url = false)
	{
		$query = $this->_model->select('title', 'url', 'description');

		if ($id) {
			$query->orderBy('id', 'desc');
		}

		if ($title) {
			$query->orderBy('title', 'asc');
		}

		if ($url) {
			$query->orderBy('url', 'asc');
		}

		return $query->get();
	}
}
