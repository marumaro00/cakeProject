<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdminImageFixture
 *
 */
class AdminImageFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'admin_image';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'admin_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'file_directory' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_size' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_path' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_type' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'admin_id' => ['type' => 'index', 'columns' => ['admin_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'admin_id'], 'length' => []],
            'admin_image_ibfk_1' => ['type' => 'foreign', 'columns' => ['admin_id'], 'references' => ['administrator', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'id' => 1,
            'admin_id' => 1,
            'file_directory' => 'Lorem ipsum dolor sit amet',
            'file_size' => 'Lorem ipsum dolor sit amet',
            'file_path' => 'Lorem ipsum dolor sit amet',
            'file_name' => 'Lorem ipsum dolor sit amet',
            'file_type' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
