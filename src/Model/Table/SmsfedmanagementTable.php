<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smsfedmanagement Model
 *
 * @method \App\Model\Entity\Smsfedmanagement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Smsfedmanagement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Smsfedmanagement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Smsfedmanagement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsfedmanagement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsfedmanagement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Smsfedmanagement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Smsfedmanagement findOrCreate($search, callable $callback = null, $options = [])
 */
class SmsfedmanagementTable extends Table
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

        $this->setTable('smsfedmanagement');
        $this->setDisplayField('SmsFedMngOID');
        $this->setPrimaryKey('SmsFedMngOID');
//        
        $this->belongsTo('farmerapi', [
            'foreignKey' => 'FarMobileNo',
            'bindingKey' =>'phone',  
            'joinType' => 'LEFT'
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
            ->allowEmptyString('SmsFedMngOID', null, 'create');

        $validator
            ->requirePresence('SMSID', 'create')
            ->notEmptyString('SMSID');

        $validator
            ->scalar('FarMobileNo')
            ->maxLength('FarMobileNo', 13)
            ->requirePresence('FarMobileNo', 'create')
            ->notEmptyString('FarMobileNo');

        $validator
            ->date('FedDate')
            ->requirePresence('FedDate', 'create')
            ->notEmptyDate('FedDate');

        $validator
            ->scalar('FedBackSMS')
            ->maxLength('FedBackSMS', 300)
            ->requirePresence('FedBackSMS', 'create')
            ->notEmptyString('FedBackSMS');

        $validator
            ->integer('CreatedBy')
            ->requirePresence('CreatedBy', 'create')
            ->notEmptyString('CreatedBy');

        $validator
            ->date('CreatedDate')
            ->requirePresence('CreatedDate', 'create')
            ->notEmptyDate('CreatedDate');

        return $validator;
    }
}
