<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemPointTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemPointTable Test Case
 */
class ItemPointTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_point',
        'app.item',
        'app.item_category',
        'app.item_type',
        'app.inventory',
        'app.location',
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
        $config = TableRegistry::exists('ItemPoint') ? [] : ['className' => 'App\Model\Table\ItemPointTable'];
        $this->ItemPoint = TableRegistry::get('ItemPoint', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemPoint);

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
