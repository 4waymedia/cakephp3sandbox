<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccountPayment Entity
 *
 * @property int $id
 * @property int $account_id
 * @property int $contractor_id
 * @property string $job_id
 * @property string $Order_ID
 * @property float $amount
 * @property string $name
 *
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Contractor $contractor
 * @property \App\Model\Entity\Job $job
 */
class AccountPayment extends Entity
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
        'account_id' => true,
        'contractor_id' => true,
        'job_id' => true,
        'order_id' => true,
        'amount' => true,
        'name' => true,
        'account' => true,
        'contractor' => true,
        'job' => true
    ];
}
