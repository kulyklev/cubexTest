<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Requests\StoreBid;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreBidRequestTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->rules = (new StoreBid())->rules();
        $this->validator = $this->app['validator'];
    }

    /**
     * Testing validness of messageTheme field in StoreBid.
     * @test
     *
     * @return void
     */
    public function testValidMessageTheme()
    {
        $this->assertTrue($this->validateField('messageTheme', 'msg'));
        $this->assertTrue($this->validateField('messageTheme', 'This is the message theme'));
        $this->assertFalse($this->validateField('messageTheme', ''));
        $this->assertFalse($this->validateField('messageTheme', null));
    }

    /**
     * Testing upload of message field in StoreBid.
     * @test
     *
     * @return void
     */
    public function testValidMessage()
    {
        $this->assertTrue($this->validateField('message', 'msg'));
        $this->assertTrue($this->validateField('message', 'This is message'));
        $this->assertFalse($this->validateField('message', ''));
        $this->assertFalse($this->validateField('message', null));
    }

    protected function getFieldValidator($field, $value)
    {
        return $this->validator->make(
            [$field => $value],
            [$field => $this->rules[$field]]
        );
    }

    protected function validateField($field, $value)
    {
        return $this->getFieldValidator($field, $value)->passes();
    }
}
