<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Codelist Entity
 *
 * @property int $CodeListID
 * @property string|null $CodeListCode
 * @property string|null $CodeListNameEnglish
 * @property string|null $CodeListNameBangla
 * @property string|null $Note
 * @property string|null $RecordStatus
 * @property string|null $RecordVersion
 * @property string|null $UserAccess
 * @property \Cake\I18n\FrozenTime|null $AccessDate
 */
class Codelist extends Entity
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
        'CodeListCode' => true,
        'CodeListNameEnglish' => true,
        'CodeListNameBangla' => true,
        'Note' => true,
        'RecordStatus' => true,
        'RecordVersion' => true,
        'UserAccess' => true,
        'AccessDate' => true,
    ];
}
