<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Smsdesmanagement Entity
 *
 * @property int $OID
 * @property int $SMSContentOID
 * @property int $FarmerOID
 * @property \Cake\I18n\FrozenDate $SendingDate
 * @property int $CreatedBY
 * @property \Cake\I18n\FrozenDate $CreatedDate
 */
class Smsdesmanagement extends Entity
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
        'SmsContentOID' => true,
        'FarmerOID' => true,
        'SendingDate' => true,
        'CreatedBY' => true,
        'CreatedDate' => true,
    ];
}
