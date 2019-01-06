<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payments Model
 *
 * @method \App\Model\Entity\Payment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Payment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payment findOrCreate($search, callable $callback = null, $options = [])
 */
class PaymentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('Date')
            ->maxLength('Date', 254)
            ->allowEmpty('Date');

        $validator
            ->scalar('Transaction_type')
            ->maxLength('Transaction_type', 254)
            ->allowEmpty('Transaction_type');

        $validator
            ->scalar('Order_ID')
            ->maxLength('Order_ID', 254)
            ->allowEmpty('Order_ID');

        $validator
            ->scalar('Product_Details')
            ->maxLength('Product_Details', 254)
            ->allowEmpty('Product_Details');

        $validator
            ->scalar('Total_product_charges')
            ->maxLength('Total_product_charges', 254)
            ->allowEmpty('Total_product_charges');

        $validator
            ->scalar('Total_promotional_rebates')
            ->maxLength('Total_promotional_rebates', 254)
            ->allowEmpty('Total_promotional_rebates');

        $validator
            ->scalar('Amazon_fees')
            ->maxLength('Amazon_fees', 254)
            ->allowEmpty('Amazon_fees');

        $validator
            ->scalar('Other')
            ->maxLength('Other', 254)
            ->allowEmpty('Other');

        $validator
            ->scalar('Total')
            ->maxLength('Total', 254)
            ->allowEmpty('Total');

        return $validator;
    }
}
