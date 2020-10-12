<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Smsmanagement Entity
 *
 * @property int $SmsMgmOID
 * @property int $FarmerOID
 * @property int $SMSContentOID
 * @property int $SMSFedManOID
 * @property int $CreatedBY
 * @property \Cake\I18n\FrozenDate $CreatedDate
 */
class Smsmanagement extends Entity
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
        'FarmerOID' => true,
        'SmsContentOID' => true,
        'SmsFedMngOID' => true,
        'SMSBody' => true,
        'CreatedBY' => true,
        'CreatedDate' => true,
    ];
}
