<?php

namespace App\Utilities;

interface FileOutputInterface
{
    /**
     * Write the contents into the file.
     *
     * @param $contents
     * @param string $path
     * @param string $filename
     *
     * @return void
     */
    public function create($contents, string $path, string $filename);
}
