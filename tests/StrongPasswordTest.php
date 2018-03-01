<?php

namespace Rafni\Validations\Tests;

use Tests\TestCase;
use Illuminate\Validation\Factory as Validator;
use Rafni\Validations\Rules\StrongPassword;

final class StrongPasswordTest extends TestCase
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
            ['value' => new StrongPassword]
        );
    }
    
    /**
     * @return void
     */
    public function testPasswordWithoutUppercase(): void
    {
        $result = $this
                ->makeValidator('astmc4t@')
                ->passes();
        
        $this->assertFalse($result);
    }
    
    /**
     * @return void
     */
    public function testPasswordWithoutNumbers(): void
    {
        $result = $this
                ->makeValidator('astMcet@')
                ->passes();
        
        $this->assertFalse($result);
    }
    
    /**
     * @return void
     */
    public function testPasswordWithoutSpecialCharacters(): void
    {
        $result = $this
                ->makeValidator('astMcet0')
                ->passes();
        
        $this->assertFalse($result);
    }
    
    /**
     * @return void
     */
    public function testPasswordMinLengthInvalid(): void
    {
        $result = $this
                ->makeValidator('3stMce@')
                ->passes();
        
        $this->assertFalse($result);
    }
}
