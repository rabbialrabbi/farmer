<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Districts Model
 *
 * @method \App\Model\Entity\District get($primaryKey, $options = [])
 * @method \App\Model\Entity\District newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\District[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\District|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\District saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\District patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\District[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\District findOrCreate($search, callable $callback = null, $options = [])
 */
class DistrictsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('districts');
        $this->setDisplayField('DistrictOID');
        $this->setPrimaryKey('DistrictOID');
        
        $this->belongsTo('Regions', [
            'foreignKey' => 'RegionOID',
            'belongsto' =>'RegionOID',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('divisions', [
            'foreignKey' => 'DivisionOID',
            'belongsto' =>'DivisionOID',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator {
        $validator
                ->integer('DistrictOID')
                ->allowEmptyString('DistrictOID', null, 'create');

        $validator
                ->scalar('DistrictName')
                ->maxLength('DistrictName', 100)
                ->requirePresence('DistrictName', 'create')
                ->notEmptyString('DistrictName');

        $validator
                ->integer('DistrictID')
                ->allowEmptyString('DistrictID');

        $validator
                ->integer('RegionOID')
                ->allowEmptyString('RegionOID');

        $validator
                ->integer('DivisionOID')
                ->allowEmptyString('DivisionOID');

        return $validator;
    }

}
