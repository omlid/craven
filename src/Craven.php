<?php

namespace Craven;

use Craven\RequireStore;

class Craven
{

    public static function compile($repo) { return self::concatenate($repo); }
    public static function output($repo) { return self::concatenate($repo); }

    public static function concatenate($repo)
    {
        $require = self::getRequireInstance();
        $repo = $require->find($repo);
        if ($repo->isEmpty()) {
            return;
        }

        return $repo->concatenate();
    }

    public static function attach($files, $repo)
    {
        if (is_scalar($files)) {
            $files = array($files);
        }
        if (!is_array($files)) {
            throw new \Exception('First argument provided in Craven::require is not scalar or an array');
        }
        $require = self::getRequireInstance();
        $require->addFiles($files, $repo);
        return true;
    }

    protected static function getRequireInstance()
    {
        static $require = null;
        if ($require === null) {
            $require = new RequireStore();
        }
        return $require;
    }

}
