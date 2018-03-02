<?php

namespace Rafni\Validations\Tests;

use Tests\TestCase;
use Illuminate\Validation\Factory as Validator;
use Rafni\Validations\Rules\NifNie;

final class NifNieTest extends TestCase
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
            ['value' => new NifNie]
        );
    }
    
    /**
     * @return void
     */
    public function testValidNif(): void
    {
        $result = $this
                ->makeValidator('52443594Y')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testInvalidNif(): void
    {
        $result = $this
                ->makeValidator('52423594Y')
                ->passes();
        
        $this->assertFalse($result);
    }
    
    /**
     * @return void
     */
    public function testValidNieX(): void
    {
        $result = $this
                ->makeValidator('X1100139A')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testValidNieY(): void
    {
        $result = $this
                ->makeValidator('Y8453071X')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testValidNieZ(): void
    {
        $result = $this
                ->makeValidator('Z4369818F')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testInvalidNie(): void
    {
        $result = $this
                ->makeValidator('Z4369819F')
                ->passes();
        
        $this->assertFalse($result);
    }
}
