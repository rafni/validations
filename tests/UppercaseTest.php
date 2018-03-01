<?php

namespace Rafni\Validations\Tests;

use Tests\TestCase;
use Illuminate\Validation\Factory as Validator;
use Rafni\Validations\Rules\Uppercase;

final class UppercaseTest extends TestCase
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
            ['value' => new Uppercase]
        );
    }
    
    /**
     * Validates a valid string
     *
     * @return void
     */
    public function testValidUppercaseString(): void
    {
        $result = $this
                ->makeValidator('¡HELLO WORLD!')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * Validates a invalid string
     *
     * @return void
     */
    public function testInvalidUppercaseString(): void
    {
        $result = $this
                ->makeValidator('¡hello WORLD!')
                ->fails();
        
        $this->assertTrue($result);
    }
}
