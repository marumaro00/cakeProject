<?php
namespace App\Test\TestCase\Form;

use App\Form\CompanyLogoForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\CompanyLogoForm Test Case
 */
class CompanyLogoFormTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->CompanyLogo = new CompanyLogoForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompanyLogo);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
