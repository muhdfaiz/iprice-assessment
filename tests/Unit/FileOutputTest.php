<?php

use App\Utilities\CsvAdapter;
use App\Utilities\FileOutput;
use Tests\TestCase;
use Illuminate\Support\Facades\File;

class FileOutputTest extends TestCase
{
    /** @test */
    public function it_should_create_a_new_file()
    {
        $csvAdapter = new CsvAdapter();
        $fileOutput = new FileOutput($csvAdapter);

        $content = 'Test Content';
        $path = base_path();
        $filename = 'testfile.csv';

        $fileOutput->create($content, $path, $filename);

        $this->assertTrue(file_exists($path . '/' . $filename));

        unlink($path . '/' . $filename);
    }

    /** @test */
    public function it_should_write_correct_content()
    {
        $csvAdapter = new CsvAdapter();
        $fileOutput = new FileOutput($csvAdapter);

        $content = 'Test Content';
        $path = base_path();
        $filename = 'testfile.csv';

        $fileOutput->create($content, $path, $filename);

        $this->assertEquals($content, File::get(base_path('testfile.csv')));

        unlink($path . '/' . $filename);
    }
}
