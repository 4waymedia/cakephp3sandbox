<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayPeriod Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property int $contractors_used
 * @property int $jobs_completed
 * @property int $jobs_cancelled
 * @property int $jobs_pending
 * @property \Cake\I18n\FrozenDate $calculated
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $status
 */
class PayPeriod extends Entity
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
        'start_date' => true,
        'end_date' => true,
        'contractors_used' => true,
        'jobs_completed' => true,
        'jobs_cancelled' => true,
        'jobs_pending' => true,
        'calculated' => true,
        'created' => true,
        'modified' => true,
        'status' => true
    ];
}
