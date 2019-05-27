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

        // Replace Amazone '--' '---' with NULL
        $this->addBehavior('HyphenNull');
        $this->addBehavior('Timestamp');

        $this->setTable('payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    protected $_accessible = [
        '*' => false,
    ];

    public function beforeSave($event, $entity, $options) {



        if(isset($entity->total_product_charges) or isset($entity->other)){
            // Create Total amount
            $entity->total = (
                (float)str_replace('$','',$entity->total_product_charges)+
                (float)str_replace('$','',$entity->amazon_fees)+
                (float)str_replace('$','',$entity->refund_admin_fee)+
                (float)str_replace('$','',$entity->refund_referral_fee)+
                (float)str_replace('$','',$entity->refund_product_charge)+
                (float)str_replace('$','',$entity->other)
            );
        }
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
            ->scalar('date')
            ->maxLength('date', 254)
            ->allowEmpty('date');

        $validator
            ->scalar('transaction_type')
            ->maxLength('transaction_type', 254)
            ->allowEmpty('transaction_type');

        $validator
            ->scalar('order_id')
            ->maxLength('order_id', 254)
            ->allowEmpty('order_id');



        $validator
            ->scalar('total_product_charges')
            ->maxLength('total_product_charges', 254)
            ->allowEmpty('total_product_charges');

        $validator
            ->scalar('total_promotional_rebates')
            ->maxLength('total_promotional_rebates', 254)
            ->allowEmpty('total_promotional_rebates');

        $validator
            ->scalar('amazon_fees')
            ->maxLength('Amazon_fees', 254)
            ->allowEmpty('Amazon_fees');

        $validator
            ->scalar('other')
            ->maxLength('other', 254)
            ->allowEmpty('other');

        $validator
            ->scalar('total')
            ->maxLength('total', 254)
            ->allowEmpty('total');

        return $validator;
    }


}
