<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PaymentTerm Entity.
 */
class PaymentTerm extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'days' => true,
        'description' => true,
    ];
}
