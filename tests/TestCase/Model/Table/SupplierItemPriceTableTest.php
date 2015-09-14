<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierItemPriceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierItemPriceTable Test Case
 */
class SupplierItemPriceTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplier_item_price',
        'app.item',
        'app.item_category',
        'app.item_type',
        'app.inventory',
        'app.location',
        'app.adjustment_type',
        'app.item_point',
        'app.unit',
        'app.unit_type',
        'app.supplier',
        'app.supplier_item',
        'app.supplier_detail'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupplierItemPrice') ? [] : ['className' => 'App\Model\Table\SupplierItemPriceTable'];
        $this->SupplierItemPrice = TableRegistry::get('SupplierItemPrice', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierItemPrice);

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
