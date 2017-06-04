<?php

namespace Omlid\Craven\Helpers;

class FileReader {
	public function read($file)
	{
		if (!$this->checkExists($file)) {
			error_log($file.' does not exist', E_USER_NOTICE);
			return false;
		}

		if (!$this->isReadable($file)) {
			throw new \Exception($file.' is not readable');
		}

		return file_get_contents($file);
	}

	public function getUniqueName($file)
	{
		if (!$this->isValid($file)) {
			return false;
		}
		$modified = filemtime($file);
		return $file.'@'.$modified;
	}

	public function getExtension($file)
	{
		$info = pathinfo($file);
		return $info['extension'];
	}

	protected function isValid($file)
	{
		return $this->checkExists($file) && $this->isReadable($file);
	}

	protected function checkExists($file)
	{
		if (!file_exists($file)) {
			return false;
		}
		return true;
	}

	protected function isReadable($file)
	{
		if (!is_readable($file)) {
			throw new Exception($file.' is not readable');
		}
		return true;
	}
}