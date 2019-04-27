<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\I18n\Date;
use Cake\I18n\Time;

use Cake\Event\Event;
use ArrayObject;
use Cake\Datasource\EntityInterface;

/**
 * PayPeriods Model
 *
 * @method \App\Model\Entity\PayPeriod get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayPeriod newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayPeriod[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayPeriod|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayPeriod|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayPeriod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayPeriod[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayPeriod findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PayPeriodsTable extends Table
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

        $this->setTable('pay_periods');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->dateTime('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->dateTime('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

        $validator
            ->integer('contractors_used')
            ->allowEmpty('contractors_used');

        $validator
            ->integer('jobs_completed')
            ->allowEmpty('jobs_completed');

        $validator
            ->integer('jobs_cancelled')
            ->allowEmpty('jobs_cancelled');

        $validator
            ->integer('jobs_pending')
            ->allowEmpty('jobs_pending');

        $validator
            ->date('calculated')
            ->requirePresence('calculated', 'create')
            ->notEmpty('calculated');

        $validator
            ->scalar('status')
            ->allowEmpty('status');

        return $validator;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        $data['calculated'] = $time = new Time('now', 'America/New_York');
    }

}
