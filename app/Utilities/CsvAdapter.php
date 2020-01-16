<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class CsvAdapter implements AdapterInterface
{
    /**
     * Output words into the CSV.
     *
     * @param $contents
     * @param string $path
     * @param string $filename
     *
     * @return bool|int
     */
    public function create($contents, string $path, string $filename)
    {
        $fp = fopen($path . '/' . $filename,"w");

        $result = fwrite($fp, $contents);

        fclose($fp);

        return $result ? "CSV Created!" : "Failed to create CSV";
    }
}
