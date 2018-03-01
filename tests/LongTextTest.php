<?php

namespace Rafni\Validations\Tests;

use Tests\TestCase;
use Illuminate\Validation\Factory as Validator;
use Rafni\Validations\Rules\LongText;

final class LongTextTest extends TestCase
{
    /**
     * @var \Illuminate\Validation\Validator 
     */
    protected $validator;
    
    /**
     * @param string $value
     */
    protected function makeValidator($value)
    {
        return app(Validator::class)->make(
            ['value' => $value],
            ['value' => new LongText]
        );
    }
    
    /**
     * Validates a valid string
     *
     * @return void
     */
    public function testStringAllValidCharacters(): void
    {
        $result = $this
                ->makeValidator('0123456789AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúÜüVvWwXxYyZz-:;,.-_!¡?¿\'"€@* ')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * Validates a invalid string
     *
     * @return void
     */
    public function testStringAnyInvalidCharacters(): void
    {
        $result = $this
                ->makeValidator('¡hello!, ¿how are you?. This is a test - \'\\ [notice]')
                ->fails();
        
        $this->assertTrue($result);
    }
}
