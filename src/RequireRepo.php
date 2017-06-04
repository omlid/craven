<?php

namespace Omlid\Craven;

use Omlid\Craven\RequireOutput;
use Omlid\Craven\Helpers\FileReader;

class RequireRepo
{

	protected $name;
	protected $files = array();

	public function __construct($name = null)
	{
		$this->name = $name;
	}

	public function add($file)
	{
		$this->files[] = $file;
	}

	public function isEmpty()
	{
		return empty($this->files);
	}

	public function concatenate()
	{
		$reader = new FileReader();
		$output = new RequireOutput();

		$names = array();
		foreach ($this->files as $file) {
			$output->append($reader->read($file));
			$names[] = $reader->getUniqueName($file);
		}

		$output->setUniqueKey(sha1(implode('__',$names)));

		return $output;
	}

}