<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Division Entity
 *
 * @property int $DivisionOID
 * @property string $DivisionName
 * @property int $DivisionID
 */
class Division extends Entity
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
        'DivisionOID' => true,
        'DivisionName' => true,
        'DivisionID' => true,
        'country' => true,
        'statecode' => true,
        'label_bn' => true,
        'label_en' => true,
        'loc_lat' => true,
        'loc_lon' => true,
        'crops' => true,
        'status' => true,
        'upuser' => true,
        'useradd' => true,
        'createon' => true,
        'lastupdate' => true
    ];
}
