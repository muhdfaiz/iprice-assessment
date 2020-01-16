<?php

namespace App\Utilities;

interface AdapterInterface
{
    /**
     * Write the contents into the file.
     *
     * @param $contents
     * @param string $path
     * @param string $filename
     *
     * @return bool|int
     */
    public function create($contents, string $path, string $filename);
}
