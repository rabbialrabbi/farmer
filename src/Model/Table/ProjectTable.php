<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Project Model
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectTable extends Table
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

        $this->setTable('project');
        $this->setDisplayField('ProjectOID');
        $this->setPrimaryKey('ProjectOID');
        
        $this->belongsTo('upazilla', [
            'className' => 'upazilla',
            'foreignKey' => 'upazilla_oid',
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
            ->integer('ProjectOID')
            ->allowEmptyString('ProjectOID', null, 'create');

        $validator
            ->scalar('ProjectName')
            ->maxLength('ProjectName', 200)
            ->requirePresence('ProjectName', 'create')
            ->notEmptyString('ProjectName');

        $validator
            ->integer('ProjectOID')
            ->requirePresence('ProjectOID', 'create')
            ->notEmptyString('ProjectOID');

        $validator
            ->integer('upazilla_oid')
            ->requirePresence('upazilla_oid', 'create')
            ->notEmptyString('upazilla_oid');

        return $validator;
    }
}
