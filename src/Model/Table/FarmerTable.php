<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Farmer Model
 *
 * @method \App\Model\Entity\Farmer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Farmer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Farmer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Farmer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Farmer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Farmer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Farmer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Farmer findOrCreate($search, callable $callback = null, $options = [])
 */
class FarmerTable extends Table
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

        $this->setTable('farmer');
        $this->setDisplayField('FarmerOID');
        $this->setPrimaryKey('FarmerID');
        
         $this->belongsTo('Districts', [
            'foreignKey' => 'DistrictOID',
            'bindingKey' =>'DistrictOID', 
            'joinType' => 'INNER'
        ]);
         
        $this->belongsTo('Upazilla', [
            'foreignKey' => 'UpazillaOID',
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
            ->allowEmptyString('FarmerOID', null, 'create')
            ->add('FarmerOID', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('FarmerName')
            ->maxLength('FarmerName', 200)
            ->requirePresence('FarmerName', 'create')
            ->notEmptyString('FarmerName');

        $validator
            ->scalar('FarmerAdd')
            ->maxLength('FarmerAdd', 3000)
            ->requirePresence('FarmerAdd', 'create')
            ->notEmptyString('FarmerAdd');

        $validator
            ->scalar('FarMob')
            ->maxLength('FarMob', 13)
            ->requirePresence('FarMob', 'create')
            ->notEmptyString('FarMob');

        $validator
            ->integer('DivisionID')
            ->requirePresence('DivisionID', 'create')
            ->notEmptyString('DivisionID');

        $validator
            ->integer('RegionID')
            ->requirePresence('RegionID', 'create')
            ->notEmptyString('RegionID');

        $validator
            ->integer('DistrictID')
            ->requirePresence('DistrictID', 'create')
            ->notEmptyString('DistrictID');

        $validator
            ->integer('UpazillaID')
            ->requirePresence('UpazillaID', 'create')
            ->notEmptyString('UpazillaID');

        $validator
            ->integer('UnionID')
            ->requirePresence('UnionID', 'create')
            ->notEmptyString('UnionID');

        $validator
            ->integer('CategoryID')
            ->requirePresence('CategoryID', 'create')
            ->notEmptyString('CategoryID');

        $validator
            ->integer('ProjectID')
            ->requirePresence('ProjectID', 'create')
            ->notEmptyString('ProjectID');

        $validator
            ->integer('GroupID')
            ->requirePresence('GroupID', 'create')
            ->notEmptyString('GroupID');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['OID']));

        return $rules;
    }
}
