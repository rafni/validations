<?php

namespace Rafni\Validations\Tests\Countries\Spain;

use Tests\TestCase;
use Illuminate\Validation\Factory as Validator;
use Rafni\Validations\Rules\Countries\Spain\Phone;

final class PhoneTest extends TestCase
{
    /**
     * @param string $value
     */
    protected function makeValidator($value)
    {
        return app(Validator::class)->make(
            ['value' => $value],
            ['value' => new Phone]
        );
    }
    
    public function testValidSpanishPhone(): void
    {
        $result = $this
                ->makeValidator('+34600000000')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testValidSpanishPhoneWithSpacesSeparator(): void
    {
        $result = $this
                ->makeValidator('+34 600 00 00 00')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testValidSpanishPhoneWithDashesSeparator(): void
    {
        $result = $this
                ->makeValidator('+34-600-00-00-00')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testValidSpanishPhoneWithoutPrefix(): void
    {
        $result = $this
                ->makeValidator('600000000')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testValidSpanishPhoneWithSpacesWithoutPrefix(): void
    {
        $result = $this
                ->makeValidator('600 00 00 00')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testValidSpanishPhoneWithDashesWithoutPrefix(): void
    {
        $result = $this
                ->makeValidator('600-00-00-00')
                ->passes();
        
        $this->assertTrue($result);
    }
    
    /**
     * @return void
     */
    public function testInvalidSpanishPhonePrefix(): void
    {
        $result = $this
                ->makeValidator('+35 600000000')
                ->passes();
        
        $this->assertFalse($result);
    }
    
    /**
     * @return void
     */
    public function testInvalidSpanishPhone(): void
    {
        $result = $this
                ->makeValidator('+34 325421456')
                ->passes();
        
        $this->assertFalse($result);
    }
}
