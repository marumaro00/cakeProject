<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity.
 */
class Supplier extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'phone' => true,
        'email' => true,
        'remarks' => true,
        'item' => true,
        'supplier_detail' => true,
    ];
}
