<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Farmerapi Entity
 *
 * @property int $OID
 * @property int $FarmerID
 * @property string $FarmerName
 * @property string $FarmerMobileNo
 * @property int $DivisionID
 * @property string $DivisionName
 * @property int $RegionID
 * @property string $RegionName
 * @property int $DistrictID
 * @property string $DistrictName
 * @property int $UpazillaID
 * @property string $UpazillaName
 * @property int $UnionID
 * @property string $UnionName
 * @property int $CategoryID
 * @property string $CategoryName
 * @property int $ProjectID
 * @property string $ProjectName
 * @property int $GroupID
 * @property string $GroupName
 * @property int $CreatedBy
 * @property \Cake\I18n\FrozenDate $CreateDate
 */
class Farmerapi extends Entity
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
        'FarmerID' => true,
        'FarmerName' => true,
        'FarmerMobileNo' => true,
        'DivisionID' => true,
        'DivisionName' => true,
        'RegionID' => true,
        'RegionName' => true,
        'DistrictID' => true,
        'DistrictName' => true,
        'UpazillaID' => true,
        'UpazillaName' => true,
        'UnionID' => true,
        'UnionName' => true,
        'CategoryID' => true,
        'CategoryName' => true,
        'ProjectID' => true,
        'ProjectName' => true,
        'GroupID' => true,
        'GroupName' => true,
        'CreatedBy' => true,
        'CreateDate' => true,
    ];
}
