<?php

namespace Rafni\Validations\Tests;

use Tests\TestCase;
use Illuminate\Validation\Factory as Validator;
use Rafni\Validations\Rules\HexadecimalColor;

final class HexadecimalColorTest extends TestCase
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
            ['value' => new HexadecimalColor]
        );
    }
    
    /**
     * Validates a valid hexadecimal color
     *
     * @return void
     */
    public function testValidColor(): void
    {
        $result = $this->makeValidator('#fff')->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * Validates a invalid hexadecimal color
     *
     * @return void
     */
    public function testInvalidColor(): void
    {
        $result = $this->makeValidator('red')->fails();
        
        $this->assertTrue($result);
    }
}
