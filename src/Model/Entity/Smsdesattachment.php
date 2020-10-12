<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Smsdesattachment Entity
 *
 * @property int $smsdesattachmentOID
 * @property string|null $desattachID
 * @property \Cake\I18n\FrozenTime|null $attachDate
 * @property int|null $smscontantoid
 * @property \Cake\I18n\FrozenTime|null $sendingdate
 * @property int|null $divisionoid
 * @property int|null $regionoid
 * @property int|null $districtoid
 * @property int|null $upazillaoid
 */
class Smsdesattachment extends Entity
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
        'desattachID' => true,
        'attachDate' => true,
        'smscontantoid' => true,
        'sendingdate' => true,
        'divisionoid' => true,
        'regionoid' => true,
        'districtoid' => true,
        'upazillaoid' => true,
        'projectid' => true,
        'groupid' => true,
        'unionoid' => true,
        'fromdate' => true,
        'todate' => true,
        'SMSTypeID' => true,
        'SuggestionTypeID' => true,
        'smslanguage' => true
    ];
}
