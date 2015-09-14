<?php
namespace App\Test\TestCase\Form;

use App\Form\CompanyBannerForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\CompanyBannerForm Test Case
 */
class CompanyBannerFormTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->CompanyBanner = new CompanyBannerForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompanyBanner);

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
