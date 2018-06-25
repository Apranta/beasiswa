<?php

require_once 'application\libraries\Smart\Smart.php';

class SmartTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->smart = new Smart();
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $this->assertTrue($this->smart->test());
        $this->assertFalse(!$this->smart->test());
    }
}