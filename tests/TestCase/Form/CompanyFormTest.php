<?php
namespace App\Test\TestCase\Form;

use App\Form\CompanyForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\CompanyForm Test Case
 */
class CompanyFormTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Company = new CompanyForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Company);

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
