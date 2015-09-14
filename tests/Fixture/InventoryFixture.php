<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InventoryFixture
 *
 */
class InventoryFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'inventory';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'item_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reference_date' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP(6)', 'comment' => '', 'precision' => null],
        'location_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'previous_quantity' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'adjustment' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'adjustment_type' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'location_id' => ['type' => 'index', 'columns' => ['location_id'], 'length' => []],
            'adjustment_type' => ['type' => 'index', 'columns' => ['adjustment_type'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['item_id', 'reference_date'], 'length' => []],
            'inventory_ibfk_1' => ['type' => 'foreign', 'columns' => ['location_id'], 'references' => ['item', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'inventory_ibfk_2' => ['type' => 'foreign', 'columns' => ['adjustment_type'], 'references' => ['location', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'reference_date' => 1440691756,
            'location_id' => 1,
            'previous_quantity' => 1,
            'quantity' => 1,
            'adjustment' => 1,
            'adjustment_type' => 1
        ],
    ];
}
