<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Softsettings Model
 *
 * @method \App\Model\Entity\Softsetting newEmptyEntity()
 * @method \App\Model\Entity\Softsetting newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Softsetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Softsetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Softsetting findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Softsetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Softsetting[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Softsetting|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Softsetting saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Softsetting[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Softsetting[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Softsetting[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Softsetting[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SoftsettingsTable extends Table
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

        $this->setTable('softsettings');
        $this->setDisplayField('slno');
        $this->setPrimaryKey('slno');
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
            ->integer('slno')
            ->allowEmptyString('slno', null, 'create');

        $validator
            ->scalar('urldesc')
            ->maxLength('urldesc', 100)
            ->allowEmptyString('urldesc');

        $validator
            ->scalar('cuserName')
            ->maxLength('cuserName', 100)
            ->allowEmptyString('cuserName');

        $validator
            ->scalar('cuserpsw')
            ->maxLength('cuserpsw', 100)
            ->allowEmptyString('cuserpsw');

        $validator
            ->scalar('emeino')
            ->maxLength('emeino', 100)
            ->allowEmptyString('emeino');

        $validator
            ->date('createddate')
            ->allowEmptyDate('createddate');

        $validator
            ->date('updatedate')
            ->allowEmptyDate('updatedate');

        return $validator;
    }
}
