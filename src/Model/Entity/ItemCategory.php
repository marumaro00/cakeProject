<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemCategory Entity.
 */
class ItemCategory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'lft' => true,
        'rght' => true,
        'parent_id' => true,
        'parent_item_category' => true,
        'child_item_category' => true,
    ];
}
