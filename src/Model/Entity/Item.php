<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity.
 */
class Item extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'code' => true,
        'name' => true,
        'category_id' => true,
        'description' => true,
        'item_type_id' => true,
        'item_category' => true,
        'item_type' => true,
        'inventory' => true,
        'supplier' => true,
		'store_unit' => true,
		'item_point' => true
    ];
}
