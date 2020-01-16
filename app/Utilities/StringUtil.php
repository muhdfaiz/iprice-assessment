<?php

namespace App\Utilities;

class StringUtil
{
    /**
     * Transform the words into uppercase.
     * For example: hello world -> HELLO WORLD.
     *
     * @param string $words
     * @return string
     */
    public function uppercase(string $words)
    {
        return strtoupper($words);
    }

    /**
     * Transform the the words into alternate lowercase and uppercase.
     * For example: hello world -> hElLo wOrLd.
     *
     * @param string $words
     * @return string
     */
    public function alternateLowercaseUppercase(string $words)
    {
        return collect(str_split($words))->map(function ($character, $key) {
            return $key % 2 === 0 ? $character : strtoupper($character);
        })->implode("");
    }

    /**
     * Add comma after every character from the words.
     * For example: hello world -> h,e,l,l,o,
     *
     * @param string $words
     * @return string
     */
    public function addCommaAfterEveryCharacter(string $words)
    {
        return collect(str_split($words))->implode(",");
    }
}
