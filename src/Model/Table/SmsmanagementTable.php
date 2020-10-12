<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smsmanagement Model
 *
 * @method \App\Model\Entity\Smsmanagement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Smsmanagement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Smsmanagement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Smsmanagement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsmanagement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsmanagement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Smsmanagement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Smsmanagement findOrCreate($search, callable $callback = null, $options = [])
 */
class SmsmanagementTable extends Table
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

        $this->setTable('smsmanagement');
        $this->setDisplayField('SmsMgmOID');
        $this->setPrimaryKey('SmsMgmOID');
        
          $this->belongsTo('smscontent', [            
            'foreignKey' => 'SmsContentOID',
            'joinType' => 'INNER'
        ]);
          
          $this->belongsTo('farmerapi', [            
            'foreignKey' => 'FarmerOID',
            'bindingkey' =>'OID',
            'joinType' => 'INNER'
        ]);
                           
          $this->belongsTo('smsfedmanagement', [            
            'foreignKey' => 'SmsFedMngOID',
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
            ->allowEmptyString('SmsMgmOID', null, 'create');

        $validator
            ->requirePresence('FarmerOID', 'create')
            ->notEmptyString('FarmerOID');

        $validator
            ->requirePresence('SMSContentOID', 'create')
            ->notEmptyString('SMSContentOID');

        $validator
            ->requirePresence('SmsFedMngOID', 'create')
            ->notEmptyString('SmsFedMngOID');

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
