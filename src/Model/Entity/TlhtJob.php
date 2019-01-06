<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TlhtJob Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $order_created_time
 * @property int $service_order_id
 * @property string $job_id
 * @property string $service_asin
 * @property string $job_name
 * @property string $job_status
 * @property \Cake\I18n\FrozenDate $appointment_date
 * @property \Cake\I18n\FrozenTime $appointment_start_time
 * @property \Cake\I18n\FrozenTime $appointment_end_time
 * @property int $product_order_id
 * @property string $product_asin
 * @property string $product_name
 * @property int $product_quantity_purchased
 * @property string $product_order_status
 * @property string $technician
 * @property int $buyer_phone_number
 * @property string $ship_address_line_1
 * @property string $ship_address_line_2
 * @property int $ship_postal_code
 * @property string $ship_city
 * @property string $coverage_area
 * @property int $buyer_id
 * @property string $defect
 *
 * @property \App\Model\Entity\ServiceOrder $service_order
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\ProductOrder $product_order
 * @property \App\Model\Entity\Buyer $buyer
 */
class TlhtJob extends Entity
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
        'order_created_time' => true,
        'service_order_id' => true,
        'job_id' => true,
        'service_asin' => true,
        'job_name' => true,
        'job_status' => true,
        'appointment_date' => true,
        'appointment_start_time' => true,
        'appointment_end_time' => true,
        'product_order_id' => true,
        'product_asin' => true,
        'product_name' => true,
        'product_quantity_purchased' => true,
        'product_order_status' => true,
        'technician' => true,
        'buyer_phone_number' => true,
        'ship_address_line_1' => true,
        'ship_address_line_2' => true,
        'ship_postal_code' => true,
        'ship_city' => true,
        'coverage_area' => true,
        'buyer_id' => true,
        'defect' => true,
        'service_order' => true,
        'job' => true,
        'product_order' => true,
        'buyer' => true
    ];
}
