<?php

namespace App\Utilities;

class FileOutput implements FileOutputInterface
{
    /**
     * File Adapter
     *
     * @var AdapterInterface $adapter
     */
    protected $adapter;

    /**
     * FileOutput constructor.
     *
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Write the contents into the file.
     *
     * @param $contents
     * @param string $path
     * @param string $filename
     *
     * @return string
     */
    public function create($contents, string $path, string $filename)
    {
        return $this->adapter->create($contents, $path, $filename);
    }
}
