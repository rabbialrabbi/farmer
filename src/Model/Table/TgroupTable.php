<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tgroup Model
 *
 * @method \App\Model\Entity\Tgroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tgroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tgroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tgroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tgroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tgroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tgroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tgroup findOrCreate($search, callable $callback = null, $options = [])
 */
class TgroupTable extends Table
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

        $this->setTable('tgroup');
        $this->setDisplayField('GroupOID');
        $this->setPrimaryKey('GroupOID');
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
            ->integer('GroupOID')
            ->allowEmptyString('GroupOID', null, 'create');

        $validator            
            ->requirePresence('GroupName', 'create')
            ->notEmptyString('GroupName');

        $validator
            ->integer('GroupID')
            ->requirePresence('GroupID', 'create')
            ->notEmptyString('GroupID');
       

        return $validator;
    }
}
