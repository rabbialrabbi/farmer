<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tunion Model
 *
 * @method \App\Model\Entity\Tunion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tunion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tunion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tunion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tunion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tunion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tunion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tunion findOrCreate($search, callable $callback = null, $options = [])
 */
class TunionTable extends Table
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

        $this->setTable('tunion');
        $this->setDisplayField('UnionOID');
        $this->setPrimaryKey('UnionOID');
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
            ->integer('UnionOID')
            ->allowEmptyString('UnionOID', null, 'create');

        $validator
            ->scalar('UnionName')
            ->maxLength('UnionName', 200)
            ->requirePresence('UnionName', 'create')
            ->notEmptyString('UnionName');

        $validator
            ->integer('UnionID')
            ->requirePresence('UnionID', 'create')
            ->notEmptyString('UnionID');
                 
        return $validator;
    }
}
