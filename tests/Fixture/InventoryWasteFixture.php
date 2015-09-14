<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InventoryWasteFixture
 *
 */
class InventoryWasteFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'inventory_waste';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'item_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reference_date' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP(6)', 'comment' => '', 'precision' => null],
        'quantity' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'waste_type' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'waste_type' => ['type' => 'index', 'columns' => ['waste_type'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['item_id', 'reference_date'], 'length' => []],
            'inventory_waste_ibfk_1' => ['type' => 'foreign', 'columns' => ['item_id'], 'references' => ['item', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'inventory_waste_ibfk_2' => ['type' => 'foreign', 'columns' => ['waste_type'], 'references' => ['inventory_waste_type', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'item_id' => 1,
            'reference_date' => 1441552386,
            'quantity' => 1,
            'waste_type' => 1
        ],
    ];
}
