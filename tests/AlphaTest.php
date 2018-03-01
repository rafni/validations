<?php

namespace Rafni\Validations\Tests;

use Tests\TestCase;
use Illuminate\Validation\Factory as Validator;
use Rafni\Validations\Rules\Alpha;

final class AlphaTest extends TestCase
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
            ['value' => new Alpha]
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
                ->makeValidator('AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúÜüVvWwXxYyZz- ')
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
                ->makeValidator('¡hello!, ¿how are you? - \'\\')
                ->fails();
        
        $this->assertTrue($result);
    }
}
