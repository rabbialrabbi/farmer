<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smsdesmanagement Model
 *
 * @method \App\Model\Entity\Smsdesmanagement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Smsdesmanagement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Smsdesmanagement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesmanagement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsdesmanagement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsdesmanagement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesmanagement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesmanagement findOrCreate($search, callable $callback = null, $options = [])
 */
class SmsdesmanagementTable extends Table
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

        $this->setTable('smsdesmanagement');
        $this->setDisplayField('SmsDesMngOID');
        $this->setPrimaryKey('SmsDesMngOID');
        
         $this->belongsTo('smscontent', [
            'foreignKey' => 'SmsContentOID',
            'joinType' => 'INNER'
        ]);
         
          $this->belongsTo('farmerapi', [
            'foreignKey' => 'FarmerID',
            'bindingKey' =>'OID',  
            'joinType' => 'INNER'
        ]);                   
        
          $this->belongsTo('smsdesattachment', [
            'foreignKey' => 'desattachID',
            'bindingKey' =>'desattachmentid',  
            'joinType' => 'INNER'
        ]);                   
          
        
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
            ->allowEmptyString('SmsDesMngOID', null, 'create');

        $validator
            ->requirePresence('SmsContentOID', 'create')
            ->notEmptyString('SmsContentOID');

        $validator
            ->requirePresence('FarmerOID', 'create')
            ->notEmptyString('FarmerOID');

        $validator
            ->date('SendingDate')
            ->requirePresence('SendingDate', 'create')
            ->notEmptyDate('SendingDate');

        $validator
            ->integer('CreatedBY')
            ->requirePresence('CreatedBY', 'create')
            ->notEmptyString('CreatedBY');

        $validator
            ->date('CreatedDate')
            ->requirePresence('CreatedDate', 'create')
            ->notEmptyDate('CreatedDate');

        return $validator;
    }
}
