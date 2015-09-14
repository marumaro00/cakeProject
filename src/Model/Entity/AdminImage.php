<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdminImage Entity.
 */
class AdminImage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
		'admin_id' => true,
        'directory' => true,
        'file_size' => true,
        'file_path' => true,
        'name' => true,
        'file_type' => true,
        'admin' => true,
    ];
}
