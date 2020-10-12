<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Upazilla Entity
 *
 * @property int $UpazillaOID
 * @property string $UpazillaName
 * @property int $UpazillaID
 * @property int $DistrictOID
 */
class Upazilla extends Entity
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
        'UpazillaName' => true,
        'UpazillaID' => true,
        'DistrictOID' => true,
    ];
}
