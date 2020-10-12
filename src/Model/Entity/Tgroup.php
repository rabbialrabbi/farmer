<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tgroup Entity
 *
 * @property int $OID
 * @property int $GroupName
 * @property int $GroupID
 * @property int $UpazillaOID
 * @property int $CategoryOID
 * @property int $ProjectOID
 */
class Tgroup extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'GroupName' => true,
        'GroupID' => true,       
    ];
}
