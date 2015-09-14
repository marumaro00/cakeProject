<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SupplierItemPriceFixture
 *
 */
class SupplierItemPriceFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'supplier_item_price';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'item_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'supplier_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reference_date' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP(6)', 'comment' => '', 'precision' => null],
        'price' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'supplier_id' => ['type' => 'index', 'columns' => ['supplier_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['item_id', 'supplier_id', 'reference_date'], 'length' => []],
            'supplier_item_price_ibfk_1' => ['type' => 'foreign', 'columns' => ['item_id'], 'references' => ['item', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'supplier_item_price_ibfk_2' => ['type' => 'foreign', 'columns' => ['supplier_id'], 'references' => ['supplier', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'supplier_id' => 1,
            'reference_date' => 1441822324,
            'price' => ''
        ],
    ];
}
