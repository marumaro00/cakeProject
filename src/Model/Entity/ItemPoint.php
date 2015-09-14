<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemPoint Entity.
 */
class ItemPoint extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'reorder_point' => true,
        'reorder_quantity' => true,
        'alert_point' => true,
        'item' => true,
    ];
}
