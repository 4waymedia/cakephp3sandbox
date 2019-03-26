<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TlhtJobs Model
 *
 * @property \App\Model\Table\ServiceOrdersTable|\Cake\ORM\Association\BelongsTo $ServiceOrders
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\ProductOrdersTable|\Cake\ORM\Association\BelongsTo $ProductOrders
 * @property \App\Model\Table\BuyersTable|\Cake\ORM\Association\BelongsTo $Buyers
 *
 * @method \App\Model\Entity\TlhtJob get($primaryKey, $options = [])
 * @method \App\Model\Entity\TlhtJob newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TlhtJob[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TlhtJob|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TlhtJob|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TlhtJob patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TlhtJob[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TlhtJob findOrCreate($search, callable $callback = null, $options = [])
 */
class TlhtJobsTable extends Table
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

        $this->setTable('tlht_jobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ServiceOrders', [
            'foreignKey' => 'service_order_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProductOrders', [
            'foreignKey' => 'product_order_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Buyers', [
            'foreignKey' => 'buyer_id'
        ]);
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
            ->dateTime('order_created_time')
            ->requirePresence('order_created_time', 'create')
            ->notEmpty('order_created_time');

        $validator
            ->scalar('service_asin')
            ->maxLength('service_asin', 15)
            ->requirePresence('service_asin', 'create')
            ->notEmpty('service_asin');

        $validator
            ->scalar('job_name')
            ->maxLength('job_name', 100)
            ->requirePresence('job_name', 'create')
            ->notEmpty('job_name');

        $validator
            ->scalar('job_status')
            ->maxLength('job_status', 20)
            ->requirePresence('job_status', 'create')
            ->notEmpty('job_status');

        $validator
            ->date('appointment_date')
            ->requirePresence('appointment_date', 'create')
            ->notEmpty('appointment_date');

        $validator
            ->dateTime('appointment_start_time')
            ->requirePresence('appointment_start_time', 'create')
            ->notEmpty('appointment_start_time');

        $validator
            ->dateTime('appointment_end_time')
            ->requirePresence('appointment_end_time', 'create')
            ->notEmpty('appointment_end_time');

        $validator
            ->scalar('product_asin')
            ->maxLength('product_asin', 20)
            ->requirePresence('product_asin', 'create')
            ->notEmpty('product_asin');

        $validator
            ->scalar('product_name')
            ->maxLength('product_name', 100)
            ->requirePresence('product_name', 'create')
            ->notEmpty('product_name');

        $validator
            ->integer('product_quantity_purchased')
            ->requirePresence('product_quantity_purchased', 'create')
            ->notEmpty('product_quantity_purchased');

        $validator
            ->scalar('product_order_status')
            ->maxLength('product_order_status', 32)
            ->requirePresence('product_order_status', 'create')
            ->notEmpty('product_order_status');

        $validator
            ->scalar('technician')
            ->maxLength('technician', 100)
            ->requirePresence('technician', 'create')
            ->notEmpty('technician');

        $validator
            ->integer('buyer_phone_number')
            ->allowEmpty('buyer_phone_number');

        $validator
            ->scalar('ship_address_line_1')
            ->maxLength('ship_address_line_1', 64)
            ->requirePresence('ship_address_line_1', 'create')
            ->notEmpty('ship_address_line_1');

        $validator
            ->scalar('ship_address_line_2')
            ->maxLength('ship_address_line_2', 64)
            ->allowEmpty('ship_address_line_2');

        $validator
            ->integer('ship_postal_code')
            ->requirePresence('ship_postal_code', 'create')
            ->notEmpty('ship_postal_code');

        $validator
            ->scalar('ship_city')
            ->maxLength('ship_city', 32)
            ->requirePresence('ship_city', 'create')
            ->notEmpty('ship_city');

        $validator
            ->scalar('coverage_area')
            ->maxLength('coverage_area', 64)
            ->allowEmpty('coverage_area');

        $validator
            ->scalar('defect')
            ->maxLength('defect', 64)
            ->allowEmpty('defect');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['service_order_id'], 'ServiceOrders'));
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        $rules->add($rules->existsIn(['product_order_id'], 'ProductOrders'));
        $rules->add($rules->existsIn(['buyer_id'], 'Buyers'));

        return $rules;
    }
}
