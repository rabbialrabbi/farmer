<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Upazilla Model
 *
 * @method \App\Model\Entity\Upazilla get($primaryKey, $options = [])
 * @method \App\Model\Entity\Upazilla newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Upazilla[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Upazilla|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Upazilla saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Upazilla patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Upazilla[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Upazilla findOrCreate($search, callable $callback = null, $options = [])
 */
class UpazillaTable extends Table
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

        $this->setTable('upazilla');
        $this->setDisplayField('Upazilla_oid');
        $this->setPrimaryKey('Upazilla_oid');
        
         $this->belongsTo('Districts', [
            'foreignKey' => 'DistrictOID',
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
            ->integer('UpazillaOID')
            ->allowEmptyString('UpazillaOID', null, 'create');

        $validator
            ->scalar('UpazillaName')
            ->maxLength('UpazillaName', 200)
            ->requirePresence('UpazillaName', 'create')
            ->notEmptyString('UpazillaName');

        $validator
            ->integer('UpazillaID')
            ->requirePresence('UpazillaID', 'create')
            ->notEmptyString('UpazillaID');

        $validator
            ->integer('DistrictOID')
            ->requirePresence('DistrictOID', 'create')
            ->notEmptyString('DistrictOID');

        return $validator;
    }
}
