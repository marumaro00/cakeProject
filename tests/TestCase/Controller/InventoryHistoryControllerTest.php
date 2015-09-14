<?php
namespace App\Test\TestCase\Controller;

use App\Controller\InventoryHistoryController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\InventoryHistoryController Test Case
 */
class InventoryHistoryControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
