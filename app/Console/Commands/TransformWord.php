<?php

namespace App\Console\Commands;

use App\Utilities\CsvAdapter;
use App\Utilities\FileOutput;
use App\Utilities\StringUtil;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class TransformWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transform:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Take input from console and transform the word into uppercase, alternate lowercase 
        uppercase,add comma after every character from the words and store the result in CSV';

    /**
     * String utilities.
     *
     * @var StringUtil $stringUtil
     */
    protected $stringUtil;

    /**
     * Create a new command instance.
     *
     * @param StringUtil $stringUtil string utility
     */
    public function __construct(StringUtil $stringUtil)
    {
        parent::__construct();
        $this->stringUtil = $stringUtil;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $words = $this->ask('Please enter some string?');

            $this->_validateInput($words);

            $this->_convertToUppercase($words);

            $this->_convertToAlternateLowercaseAndUppercase($words);

            $this->_writeIntoFile($words);
        } catch (\Exception $exception) {
            exit($exception->getMessage());
        }
    }

    /**
     * Validate input. Input must be string.
     *
     * @param $input
     */
    private function _validateInput($input)
    {
        if ((int) $input) {
            $this->error("Only string is allow.");
            return;
        }
    }

    /**
     * Convert words to uppercase.
     *
     * @param string $words
     *
     * @return string
     */
    private function _convertToUppercase(string $words)
    {
        $uppercaseWords = $this->stringUtil->uppercase($words);

        $this->info($uppercaseWords);

        return $uppercaseWords;
    }

    /**
     * Convert words to uppercase.
     *
     * @param string $words
     *
     * @return string
     */
    private function _convertToAlternateLowercaseAndUppercase(string $words)
    {
        $alternateUppercaseLowercaseWords = $this->stringUtil->alternateLowercaseUppercase($words);

        $this->info($alternateUppercaseLowercaseWords);

        return $alternateUppercaseLowercaseWords;
    }

    /**
     * Write the words into file.
     *
     * @param string $words
     */
    private function _writeIntoFile(string $words)
    {
        $wordsWithComma = $this->stringUtil->addCommaAfterEveryCharacter($words);

        $csvAdapter = new CsvAdapter();
        $fileOutput = new FileOutput($csvAdapter);

        $fileName = Str::slug($words) . '.csv';
        $filePath = base_path();

        $this->info($fileOutput->create($wordsWithComma, $filePath, $fileName));
    }
}
