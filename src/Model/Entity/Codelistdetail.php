<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Codelistdetail Entity
 *
 * @property int $ListItemID
 * @property int|null $CodeListID
 * @property string|null $ListItemCode
 * @property string|null $ListItemNameEng
 * @property string|null $ListItemNameBng
 */
class Codelistdetail extends Entity
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
        'CodeListID' => true,
        'ListItemCode' => true,
        'ListItemNameEng' => true,
        'ListItemNameBng' => true,
    ];
}
