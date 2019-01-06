<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property string $Date
 * @property string $Transaction_type
 * @property string $Order_ID
 * @property string $Product_Details
 * @property string $Total_product_charges
 * @property string $Total_promotional_rebates
 * @property string $Amazon_fees
 * @property string $Other
 * @property string $Total
 */
class Payment extends Entity
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
        'Date' => true,
        'Transaction_type' => true,
        'Order_ID' => true,
        'Product_Details' => true,
        'Total_product_charges' => true,
        'Total_promotional_rebates' => true,
        'Amazon_fees' => true,
        'Other' => true,
        'Total' => true
    ];
}
