<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventoryTable Test Case
 */
class InventoryTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventory',
        'app.item',
        'app.item_category',
        'app.item_type',
        'app.item_point',
        'app.unit',
        'app.unit_type',
        'app.supplier',
        'app.supplier_item',
        'app.supplier_detail',
        'app.location',
        'app.adjustment_type'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Inventory') ? [] : ['className' => 'App\Model\Table\InventoryTable'];
        $this->Inventory = TableRegistry::get('Inventory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inventory);

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
