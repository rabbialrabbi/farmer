<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cyearen Model
 *
 * @method \App\Model\Entity\Cyearen newEmptyEntity()
 * @method \App\Model\Entity\Cyearen newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cyearen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cyearen get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cyearen findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cyearen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cyearen[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cyearen|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cyearen saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cyearen[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cyearen[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cyearen[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cyearen[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CyearenTable extends Table
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

        $this->setTable('cyearen');
        $this->setDisplayField('CyearOID');
        $this->setPrimaryKey('CyearOID');
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
            ->integer('CyearOID')
            ->allowEmptyString('CyearOID', null, 'create');

        $validator
            ->integer('Slno')
            ->allowEmptyString('Slno');

        $validator
            ->integer('Cyear')
            ->allowEmptyString('Cyear');

        return $validator;
    }
}
