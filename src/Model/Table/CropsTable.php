<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Crops Model
 *
 * @method \App\Model\Entity\Crop newEmptyEntity()
 * @method \App\Model\Entity\Crop newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Crop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Crop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Crop findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Crop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Crop[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Crop|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Crop saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Crop[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Crop[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Crop[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Crop[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CropsTable extends Table
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

        $this->setTable('crops');
        $this->setDisplayField('cropsOID');
        $this->setPrimaryKey('cropsOID');
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
            ->integer('cropsOID')
            ->allowEmptyString('cropsOID', null, 'create');

        $validator
            ->scalar('CropsNameEn')
            ->maxLength('CropsNameEn', 255)
            ->allowEmptyString('CropsNameEn');
        
        $validator
            ->scalar('CropsNameBn')
            ->maxLength('CropsNameBn', 255)
            ->allowEmptyString('CropsNameBn');
        return $validator;
    }
}
