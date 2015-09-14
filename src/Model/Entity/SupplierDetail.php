<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SupplierDetail Entity.
 */
class SupplierDetail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'street' => true,
        'city' => true,
        'country' => true,
        'postal_code' => true,
        'remarks' => true,
        'supplier' => true,
    ];
}
