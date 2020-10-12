<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tunion Entity
 *
 * @property int $UnionOID
 * @property string $UnionName
 * @property int $UnionID
 * @property int $UpazillaOID
 */
class Tunion extends Entity
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
        'UnionName' => true,
        'UnionID' => true,
        'UpazillaOID' => true,
    ];
}
