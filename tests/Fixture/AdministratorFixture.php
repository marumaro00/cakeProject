<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdministratorFixture
 *
 */
class AdministratorFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'administrator';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'admin_id' => ['type' => 'biginteger', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'admin_username' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'admin_password' => ['type' => 'string', 'length' => 18, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'admin_role' => ['type' => 'biginteger', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['admin_id'], 'length' => []],
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
            'admin_id' => '',
            'admin_username' => 'Lorem ips',
            'admin_password' => 'Lorem ipsum dolo',
            'admin_role' => ''
        ],
    ];
}
