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
    public function testResult()
    {
        $this->smart->fit(
            [
            'ipk' => 3.50,
            'prestasi_non_akademik' => 'Internasional',
            'penghasilan_orang_tua' => 1300000,
            'tanggungan_orang_tua' => 2
            ]
        );
        $result = $this->smart->result();
        $this->assertEquals($result, 88);
        $this->assertEquals($this->smart->predicate($result), "Layak");
    }
}