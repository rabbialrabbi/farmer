<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smscontentapi Model
 *
 * @method \App\Model\Entity\Smscontentapi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Smscontentapi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Smscontentapi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Smscontentapi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smscontentapi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smscontentapi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Smscontentapi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Smscontentapi findOrCreate($search, callable $callback = null, $options = [])
 */
class SmscontentapiTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('smscontentapi');
        $this->setDisplayField('SmsContentOID');
        $this->setPrimaryKey('SmsContentOID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->allowEmptyString('SmsContentOID', null, 'create');

        $validator
            ->integer('SMSNo')
            ->requirePresence('SMSNo', 'create')
            ->notEmptyString('SMSNo');

        $validator
            ->scalar('SMSContentBody')
            ->maxLength('SMSContentBody', 300)
            ->requirePresence('SMSContentBody', 'create')
            ->notEmptyString('SMSContentBody');

        $validator
            ->integer('CreatedBy')
            ->requirePresence('CreatedBy', 'create')
            ->notEmptyString('CreatedBy');

        return $validator;
    }
}
