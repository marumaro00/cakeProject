<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaxingScheme Entity.
 */
class TaxingScheme extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'rate' => true,
    ];
}
