<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 *
 */
class PaymentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Date' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'Transaction_type' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'order_id' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'Product_Details' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'Total_product_charges' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'Total_promotional_rebates' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'Amazon_fees' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'Other' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'Total' => ['type' => 'string', 'fixed' => true, 'length' => 254, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'Date' => 'Lorem ipsum dolor sit amet',
                'Transaction_type' => 'Lorem ipsum dolor sit amet',
                'order_id' => 'Lorem ipsum dolor sit amet',
                'Product_Details' => 'Lorem ipsum dolor sit amet',
                'Total_product_charges' => 'Lorem ipsum dolor sit amet',
                'Total_promotional_rebates' => 'Lorem ipsum dolor sit amet',
                'Amazon_fees' => 'Lorem ipsum dolor sit amet',
                'Other' => 'Lorem ipsum dolor sit amet',
                'Total' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
