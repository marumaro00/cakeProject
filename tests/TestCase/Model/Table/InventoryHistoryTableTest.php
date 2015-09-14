<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventoryHistoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventoryHistoryTable Test Case
 */
class InventoryHistoryTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventory_history',
        'app.item',
        'app.item_category',
        'app.item_type',
        'app.inventory',
        'app.location',
        'app.unit',
        'app.unit_type',
        'app.item_point',
        'app.supplier',
        'app.supplier_item',
        'app.supplier_detail',
        'app.inventory_history_type'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InventoryHistory') ? [] : ['className' => 'App\Model\Table\InventoryHistoryTable'];
        $this->InventoryHistory = TableRegistry::get('InventoryHistory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InventoryHistory);

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
