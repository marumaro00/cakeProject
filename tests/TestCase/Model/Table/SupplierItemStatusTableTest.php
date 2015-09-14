<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierItemStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierItemStatusTable Test Case
 */
class SupplierItemStatusTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplier_item_status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupplierItemStatus') ? [] : ['className' => 'App\Model\Table\SupplierItemStatusTable'];
        $this->SupplierItemStatus = TableRegistry::get('SupplierItemStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierItemStatus);

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
}
