<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierAddressTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierAddressTable Test Case
 */
class SupplierAddressTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplier_address',
        'app.supplier',
        'app.item',
        'app.item_category',
        'app.inventory',
        'app.item_inventory',
        'app.supplier_item'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupplierAddress') ? [] : ['className' => 'App\Model\Table\SupplierAddressTable'];
        $this->SupplierAddress = TableRegistry::get('SupplierAddress', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierAddress);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
