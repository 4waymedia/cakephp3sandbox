<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusinessesUsers Model
 *
 * @property \App\Model\Table\BusinessesTable|\Cake\ORM\Association\BelongsTo $Businesses
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\BusinessesUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusinessesUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusinessesUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusinessesUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessesUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessesUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessesUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessesUser findOrCreate($search, callable $callback = null, $options = [])
 */
class BusinessesUsersTable extends Table
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

        $this->setTable('businesses_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Businesses', [
            'foreignKey' => 'business_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->date('first_pay_period_date')
            ->allowEmpty('first_pay_period_date');

        $validator
            ->scalar('business_name')
            ->maxLength('business_name', 64)
            ->allowEmpty('business_name');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 16)
            ->allowEmpty('phone_number');

        $validator
            ->scalar('address_1')
            ->maxLength('address_1', 32)
            ->allowEmpty('address_1');

        $validator
            ->scalar('address_2')
            ->maxLength('address_2', 32)
            ->allowEmpty('address_2');

        $validator
            ->scalar('city')
            ->maxLength('city', 32)
            ->allowEmpty('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 2)
            ->allowEmpty('state');

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
        $rules->add($rules->existsIn(['business_id'], 'Businesses'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
