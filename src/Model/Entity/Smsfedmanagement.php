<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Smsfedmanagement Entity
 *
 * @property int $OID
 * @property int $SMSID
 * @property string $FarMobileNo
 * @property \Cake\I18n\FrozenDate $FedDate
 * @property string $FedBackSMS
 * @property int $CreatedBy
 * @property \Cake\I18n\FrozenDate $CreatedDate
 */
class Smsfedmanagement extends Entity
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
        'SMSID' => true,
        'FarMobileNo' => true,
        'FedDate' => true,
        'FedBackSMS' => true,
        'CreatedBy' => true,
        'CreatedDate' => true,
    ];
}
