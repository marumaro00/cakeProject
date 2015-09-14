<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SupplierItemFixture
 *
 */
class SupplierItemFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'supplier_item';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'supplier_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'item_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'item_id' => ['type' => 'index', 'columns' => ['item_id'], 'length' => []],
            'status' => ['type' => 'index', 'columns' => ['status'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['supplier_id', 'item_id'], 'length' => []],
            'supplier_item_ibfk_1' => ['type' => 'foreign', 'columns' => ['supplier_id'], 'references' => ['supplier', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'supplier_item_ibfk_2' => ['type' => 'foreign', 'columns' => ['item_id'], 'references' => ['item', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'supplier_item_ibfk_3' => ['type' => 'foreign', 'columns' => ['status'], 'references' => ['supplier_item_status', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'supplier_id' => 1,
            'item_id' => 1,
            'status' => 1
        ],
    ];
}
