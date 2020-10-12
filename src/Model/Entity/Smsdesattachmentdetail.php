<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Smsdesattachmentdetail Entity
 *
 * @property int $smsdesattadetOID
 * @property string|null $desattachdeatailsid
 * @property string|null $desattachid
 * @property int|null $farmeroid
 */
class Smsdesattachmentdetail extends Entity
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
        'desattachdeatailsid' => true,
        'desattachid' => true,
        'farmeroid' => true,
    ];
}
