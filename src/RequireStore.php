<?php

namespace Omlid\Craven;

use Omlid\Craven\RequireRepo;

class RequireStore
{

	protected $repos = array();

	public function getRepo($name)
	{
		if (isset($this->repos[$name])) {
			return $this->repos[$name];
		}
		return $this->createRepo($name);
	}

	public function createRepo($name)
	{
		$this->repos[$name] = new RequireRepo($name);
		return $this->repos[$name];
	}

	public function addFiles($files, $name)
	{
		$repo = $this->getRepo($name);
		foreach($files as $file) {
			$repo->add($file);
		}
		$this->repos[$name] = $repo;
	}

	public function find($repo)
	{
		return $this->getRepo($repo);
	}

}