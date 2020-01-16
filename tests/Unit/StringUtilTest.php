<?php

use App\Utilities\StringUtil;
use Tests\TestCase;

class StringUtilTest extends TestCase
{
    /** @test */
    public function it_should_transform_the_word_to_uppercase()
    {
        $strUtil = new StringUtil();

        $words = 'hello world';

        $expected = "HELLO WORLD";

        $actual = $strUtil->uppercase($words);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function it_should_transform_the_word_to_alternate_lowercase_and_uppercase()
    {
        $strUtil = new StringUtil();

        $words = 'hello world';

        $expected = "hElLo wOrLd";

        $actual = $strUtil->alternateLowercaseUppercase($words);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function it_should_transform_the_word_with_comma_after_every_character()
    {
        $strUtil = new StringUtil();

        $words = 'hello world';

        $expected = "h,e,l,l,o, ,w,o,r,l,d";

        $actual = $strUtil->addCommaAfterEveryCharacter($words);

        $this->assertEquals($expected, $actual);
    }
}
