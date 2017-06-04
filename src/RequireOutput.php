<?php

namespace Craven;

class RequireOutput
{

	protected $uniqueKey = '';
	protected $contents = '';

	public function setUniqueKey($key)
	{
		$this->uniqueKey = $key;
	}

	public function append($contents)
	{
		if (empty($contents) || !$contents) return false;
		$this->contents .= $contents;
	}

	public function getUniqueKey()
	{
		if (empty($this->uniqueKey)) {
			$this->uniqueKey = sha1($this->contents);
		}
		return $this->uniqueKey;
	}

	public function getContents()
	{
		return $this->contents;
	}

}