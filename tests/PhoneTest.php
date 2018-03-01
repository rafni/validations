<?php

namespace Rafni\Validations\Tests;

use Tests\TestCase;
use Illuminate\Validation\Factory as Validator;
use Rafni\Validations\Rules\Phone;

final class PhoneTest extends TestCase
{   
    /**
     * @return void
     */
    public function testInternationalPhoneValid(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '+34 600000000'],
            ['value' => new Phone]
        );
        
        $this->assertTrue($validator->passes());
    }
    
    /**
     * @return void
     */
    public function testInternationalPhoneWithSpacesValid(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '+34 600 00 00 00'],
            ['value' => new Phone]
        );
        
        $this->assertTrue($validator->passes());
    }
    
    /**
     * @return void
     */
    public function testInternationalPhoneWithDashesValid(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '+34-600-00-00-00'],
            ['value' => new Phone]
        );
        
        $this->assertTrue($validator->passes());
    }
    
    /**
     * @return void
     */
    public function testPhoneWithoutPrefixValid(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '600000000'],
            ['value' => new Phone(null)]
        );
        
        $this->assertTrue($validator->passes());
    }
    
    /**
     * @return void
     */
    public function testPhoneWithSpacesWithoutPrefixValid(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '600 00 00 00'],
            ['value' => new Phone(null)]
        );
        
        $this->assertTrue($validator->passes());
    }
    
    /**
     * @return void
     */
    public function testPhoneWithDashesWithoutPrefixValid(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '600-00-00-00'],
            ['value' => new Phone(null)]
        );
        
        $this->assertTrue($validator->passes());
    }
    
    /**
     * @return void
     */
    public function testInternationalPhoneWithInvalidPrefix(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '+34 600000000'],
            ['value' => new Phone(35)]
        );
        
        $this->assertTrue($validator->fails());
    }
    
    /**
     * @return void
     */
    public function testPhoneWithoutPrefixInvalid(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '+34 600000000'],
            ['value' => new Phone(null)]
        );
        
        $this->assertTrue($validator->fails());
    }
    
    /**
     * @return void
     */
    public function testInvalidPhone(): void
    {
        $validator = app(Validator::class)->make(
            ['value' => '+34 325421456'],
            ['value' => new Phone]
        );
        
        $this->assertTrue($validator->fails());
    }
}
