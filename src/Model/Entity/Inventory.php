<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity.
 */
class Inventory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
		'item_id' => true,
        'reference_date' => true,
        'location_id' => true,
        'previous_quantity' => true,
        'quantity' => true,
        'adjustment' => true,
        'adjustment_type' => true,
        'item' => true,
        'location' => true,
    ];
}
