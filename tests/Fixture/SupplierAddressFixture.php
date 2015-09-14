<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SupplierAddressFixture
 *
 */
class SupplierAddressFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'supplier_address';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'supplier_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'street' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'city' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'country' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'postal_code' => ['type' => 'string', 'length' => 16, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['supplier_id'], 'length' => []],
            'supplier_address_ibfk_1' => ['type' => 'foreign', 'columns' => ['supplier_id'], 'references' => ['supplier', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'street' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'country' => 'Lorem ipsum dolor sit amet',
            'postal_code' => 'Lorem ipsum do'
        ],
    ];
}
