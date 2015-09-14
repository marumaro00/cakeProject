<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InventoryWaste Entity.
 */
class InventoryWaste extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
		'item_id'=>true,
        'quantity' => true,
		'reference_date' => true,
        'waste_type' => true,
        'item' => true,
    ];
}
