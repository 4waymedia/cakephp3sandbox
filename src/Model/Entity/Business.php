<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Business Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $first_pay_period_date
 * @property string $business_name
 * @property string $phone_number
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $state
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\PayPeriod[] $pay_periods
 */
class Business extends Entity
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
        'user_id' => true,
        'default_percentage' => true,
        'first_pay_period_date' => true,
        'business_name' => true,
        'phone_number' => true,
        'address_1' => true,
        'address_2' => true,
        'city' => true,
        'state' => true,
        'users' => true,
        'pay_periods' => true
    ];
}
