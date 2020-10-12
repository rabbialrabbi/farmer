<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Softsetting Entity
 *
 * @property int $slno
 * @property string|null $urldesc
 * @property string|null $cuserName
 * @property string|null $cuserpsw
 * @property string|null $emeino
 * @property \Cake\I18n\FrozenDate|null $createddate
 * @property \Cake\I18n\FrozenDate|null $updatedate
 */
class Softsetting extends Entity
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
        'settingsdesc'=>true,
        'urldesc' => true,
        'cuserName' => true,
        'cuserpsw' => true,
        'emeino' => true,
        'createddate' => true,
        'updatedate' => true,
    ];
}
