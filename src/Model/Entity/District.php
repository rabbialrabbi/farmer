<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * District Entity
 *
 * @property int $DistrictOID
 * @property string $DistrictName
 * @property int|null $DistrictID
 * @property int|null $RegionOID
 * @property int|null $DivisionOID
 */
class District extends Entity
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
        'DistrictName' => true,
        'DistrictID' => true,
        'RegionOID' => true,
        'DivisionOID' => true,
    ];
}
