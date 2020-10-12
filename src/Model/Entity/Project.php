<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $OID
 * @property string $ProjectName
 * @property int $ProjectID
 * @property int $UpazillaOID
 */
class Project extends Entity
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
        'ProjectName' => true,
        'ProjectOID' => true,
        'upazilla_oid' => true,
        'upazillaName' => true,
    ];
}
