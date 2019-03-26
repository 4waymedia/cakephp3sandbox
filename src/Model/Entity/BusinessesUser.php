<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BusinessesUser Entity
 *
 * @property int $id
 * @property int $business_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $first_pay_period_date
 * @property string $business_name
 * @property string $phone_number
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $state
 *
 * @property \App\Model\Entity\Business $business
 * @property \App\Model\Entity\User $user
 */
class BusinessesUser extends Entity
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
        'business_id' => true,
        'user_id' => true,
        'first_pay_period_date' => true,
        'business_name' => true,
        'phone_number' => true,
        'address_1' => true,
        'address_2' => true,
        'city' => true,
        'state' => true,
        'business' => true,
        'user' => true
    ];
}
