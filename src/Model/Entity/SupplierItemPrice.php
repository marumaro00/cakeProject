<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SupplierItemPrice Entity.
 */
class SupplierItemPrice extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
		'supplier_id' => true,
		'item_id' => true,
		'reference_date' => true,
        'price' => true,
        'item' => true,
        'supplier' => true,
    ];
}
