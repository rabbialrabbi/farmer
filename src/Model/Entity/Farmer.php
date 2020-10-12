<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Farmer Entity
 *
 * @property int $OID
 * @property string $FarmerName
 * @property string $FarmerAdd
 * @property string $FarMob
 * @property int $DivisionID
 * @property int $RegionID
 * @property int $DistrictID
 * @property int $UpazillaID
 * @property int $UnionID
 * @property int $CategoryID
 * @property int $ProjectID
 * @property int $GroupID
 * @property int $CreatedBy
 * @property \Cake\I18n\FrozenDate $CreatedDate
 */
class Farmer extends Entity
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
        'FarmerName' => true,
        'FarmerAdd' => true,
        'FarMob' => true,
        'DivisionOID' => true,
        'RegionOID' => true,
        'DistrictOID' => true,
        'UpazillaOID' => true,
        'UnionOID' => true,
        'CategoryOID' => true,
        'ProjectOID' => true,
        'GroupOID' => true,
        'CreatedBy' => true,
        'CreatedDate' => true,
    ];
}
