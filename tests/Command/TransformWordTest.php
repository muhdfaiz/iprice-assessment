<?php

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class TransformWordTest extends TestCase
{
    /** @test */
    public function it_should_only_accept_string_for_the_input()
    {
        $this->artisan('transform:word')
            ->expectsQuestion('Please enter some string?', '2313123')
            ->expectsOutput('Only string is allow.');
    }

    /** @test */
    public function it_should_transform_the_input_to_uppercase()
    {
        $this->artisan('transform:word')
            ->expectsQuestion('Please enter some string?', 'hello world')
            ->expectsOutput('HELLO WORLD');
    }

    /** @test */
    public function it_should_transform_the_input_to_alternate_lowercase_and_uppercase()
    {
        $this->artisan('transform:word')
            ->expectsQuestion('Please enter some string?', 'hello world')
            ->expectsOutput('hElLo wOrLd');
    }

    /** @test */
    public function it_should_write_csv_created_to_stdout_when_success()
    {
        $this->artisan('transform:word')
            ->expectsQuestion('Please enter some string?', 'hello world')
            ->expectsOutput('CSV Created!');

        $this->assertEquals('h,e,l,l,o, ,w,o,r,l,d', File::get(base_path('hello-world.csv')));
    }

    /** @test */
    public function it_should_write_each_character_as_column_in_csv_file()
    {
        $this->artisan('transform:word')
            ->expectsQuestion('Please enter some string?', 'hello world');

        $this->assertEquals('h,e,l,l,o, ,w,o,r,l,d', File::get(base_path('hello-world.csv')));
    }

    /** @test */
    public function csv_file_name_should_be_based_on_the_input_combine_separated_with_hypen()
    {
        $this->artisan('transform:word')
            ->expectsQuestion('Please enter some string?', 'hello world');

        $this->assertTrue(file_exists(base_path('hello-world.csv')));
    }

    /** @test */
    public function it_should_write_the_csv_file_in_root_project_folder()
    {
        $this->artisan('transform:word')
            ->expectsQuestion('Please enter some string?', 'hello world');

        $this->assertTrue(file_exists(base_path('hello-world.csv')));
    }
}
