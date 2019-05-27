<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contractor Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $nickname
 * @property string $amazon_id
 * @property int $type_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Amazon $amazon
 * @property \App\Model\Entity\Type $type
 */
class Contractor extends Entity
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
        'technician_id' => true,
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'nickname' => true,
        'role_id' => true,
        'created' => true,
        'modified' => true,
        'amazon' => true,
        'deduction_percent' => true,
        'type' => true
    ];
}
