<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Smscontent Entity
 *
 * @property int $OID
 * @property int $SMSNo
 * @property int $SMSSlNo
 * @property int $MonthID
 * @property int $CYearNo
 * @property int $SMSTypeID
 * @property string $SMSContentBody
 * @property int $SuggestionTypeID
 * @property int $SuggestionStatusID
 * @property string $CNote
 * @property int $CreatedBy
 * @property \Cake\I18n\FrozenDate $CreatedDate
 * @property int $VerifiedBy
 * @property \Cake\I18n\FrozenDate $VerifiedDate
 * @property int $SMSContentApiOID
 */
class Smscontent extends Entity
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
        'SmsContentOID'=>true,
        'SMSNo' => true,
        'SMSSlNo' => true,
        'MonthID' => true,
        'CYearNo' => true,
        'SMSTypeID' => true,
        'cropsOID'=>true,
        'SMSTypeID'=>true,
        'SuggestionTypeID'=>true,
        'SMSHeadingBan'=>true,
        'SMSHeadingEng'=>true,
        'SMSContentBodyBan'=>true,
        'SMSContentBodyEng'=>true,        
        'CNote' => true,
        'CreatedBy' => true,
        'CreatedDate' => true,
        'VerifiedBy' => true,
        'VerifiedDate' => true,
        'SMSContentApiOID' => true,
    ];
}
