<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Farmerapi Model
 *
 * @method \App\Model\Entity\Farmerapi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Farmerapi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Farmerapi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Farmerapi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Farmerapi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Farmerapi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Farmerapi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Farmerapi findOrCreate($search, callable $callback = null, $options = [])
 */
class FarmerapiTable extends Table
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

        $this->setTable('farmerapi');
        $this->setDisplayField('OID');
        $this->setPrimaryKey('OID');
        
       $this->hasMany('smsdesattachmentdetail', [
            'foreignKey' => 'OID',
            'bindingKey' => 'farmeroid',
            'joinType' => 'INNER'
        ]);
          $this->belongsTo('Districts', [
            'foreignKey' => 'districtoid',
            'bindingKey' =>'DistrictOID', 
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
            ->allowEmptyString('OID', null, 'create');

        $validator
            ->integer('FarmerID')
            ->requirePresence('FarmerID', 'create')
            ->notEmptyString('FarmerID');

        $validator
            ->scalar('FarmerName')
            ->maxLength('FarmerName', 300)
            ->requirePresence('FarmerName', 'create')
            ->notEmptyString('FarmerName');

        $validator
            ->scalar('FarmerMobileNo')
            ->maxLength('FarmerMobileNo', 13)
            ->requirePresence('FarmerMobileNo', 'create')
            ->notEmptyString('FarmerMobileNo');

        $validator
            ->integer('DivisionID')
            ->requirePresence('DivisionID', 'create')
            ->notEmptyString('DivisionID');

        $validator
            ->scalar('DivisionName')
            ->maxLength('DivisionName', 200)
            ->requirePresence('DivisionName', 'create')
            ->notEmptyString('DivisionName');

        $validator
            ->integer('RegionID')
            ->requirePresence('RegionID', 'create')
            ->notEmptyString('RegionID');

        $validator
            ->scalar('RegionName')
            ->maxLength('RegionName', 300)
            ->requirePresence('RegionName', 'create')
            ->notEmptyString('RegionName');

        $validator
            ->integer('DistrictID')
            ->requirePresence('DistrictID', 'create')
            ->notEmptyString('DistrictID');

        $validator
            ->scalar('DistrictName')
            ->maxLength('DistrictName', 300)
            ->requirePresence('DistrictName', 'create')
            ->notEmptyString('DistrictName');

        $validator
            ->integer('UpazillaID')
            ->requirePresence('UpazillaID', 'create')
            ->notEmptyString('UpazillaID');

        $validator
            ->scalar('UpazillaName')
            ->maxLength('UpazillaName', 300)
            ->requirePresence('UpazillaName', 'create')
            ->notEmptyString('UpazillaName');

        $validator
            ->integer('UnionID')
            ->requirePresence('UnionID', 'create')
            ->notEmptyString('UnionID');

        $validator
            ->scalar('UnionName')
            ->maxLength('UnionName', 200)
            ->requirePresence('UnionName', 'create')
            ->notEmptyString('UnionName');

        $validator
            ->integer('CategoryID')
            ->requirePresence('CategoryID', 'create')
            ->notEmptyString('CategoryID');

        $validator
            ->scalar('CategoryName')
            ->maxLength('CategoryName', 200)
            ->requirePresence('CategoryName', 'create')
            ->notEmptyString('CategoryName');

        $validator
            ->integer('ProjectID')
            ->requirePresence('ProjectID', 'create')
            ->notEmptyString('ProjectID');

        $validator
            ->scalar('ProjectName')
            ->maxLength('ProjectName', 200)
            ->requirePresence('ProjectName', 'create')
            ->notEmptyString('ProjectName');

        $validator
            ->integer('GroupID')
            ->requirePresence('GroupID', 'create')
            ->notEmptyString('GroupID');

        $validator
            ->scalar('GroupName')
            ->maxLength('GroupName', 200)
            ->requirePresence('GroupName', 'create')
            ->notEmptyString('GroupName');

        $validator
            ->integer('CreatedBy')
            ->requirePresence('CreatedBy', 'create')
            ->notEmptyString('CreatedBy');

        $validator
            ->date('CreateDate')
            ->requirePresence('CreateDate', 'create')
            ->notEmptyDate('CreateDate');

        return $validator;
    }
}
