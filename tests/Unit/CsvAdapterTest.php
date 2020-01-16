<?php

use App\Utilities\CsvAdapter;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class CsvAdapterTest extends TestCase
{
    /** @test */
    public function it_should_create_a_new_csv_file()
    {
        $content = 'Test Content';
        $path = base_path();
        $filename = 'testfile.csv';

        $csvAdapter = new CsvAdapter();
        $csvAdapter->create($content, $path, $filename);

        $this->assertTrue(file_exists($path . '/' . $filename));

        unlink($path . '/' . $filename);
    }

    /** @test */
    public function it_should_write_correct_content_into_csv_file()
    {
        $content = 'Test Content';
        $path = base_path();
        $filename = 'testfile.csv';

        $csvAdapter = new CsvAdapter();
        $csvAdapter->create($content, $path, $filename);

        $this->assertEquals($content, File::get(base_path('testfile.csv')));

        unlink($path . '/' . $filename);
    }
}