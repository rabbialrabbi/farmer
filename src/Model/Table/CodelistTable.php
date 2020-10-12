<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Codelist Model
 *
 * @method \App\Model\Entity\Codelist newEmptyEntity()
 * @method \App\Model\Entity\Codelist newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Codelist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Codelist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Codelist findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Codelist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Codelist[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Codelist|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Codelist saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Codelist[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Codelist[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Codelist[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Codelist[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CodelistTable extends Table
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

        $this->setTable('codelist');
        $this->setDisplayField('CodeListID');
        $this->setPrimaryKey('CodeListID');
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
            ->allowEmptyString('CodeListID', null, 'create');

        $validator
            ->scalar('CodeListCode')
            ->maxLength('CodeListCode', 100)
            ->allowEmptyString('CodeListCode');

        $validator
            ->scalar('CodeListNameEnglish')
            ->maxLength('CodeListNameEnglish', 100)
            ->allowEmptyString('CodeListNameEnglish');

        $validator
            ->scalar('CodeListNameBangla')
            ->maxLength('CodeListNameBangla', 100)
            ->allowEmptyString('CodeListNameBangla');

        $validator
            ->scalar('Note')
            ->maxLength('Note', 300)
            ->allowEmptyString('Note');

        $validator
            ->scalar('RecordStatus')
            ->maxLength('RecordStatus', 100)
            ->allowEmptyString('RecordStatus');

        $validator
            ->scalar('RecordVersion')
            ->maxLength('RecordVersion', 100)
            ->allowEmptyString('RecordVersion');

        $validator
            ->scalar('UserAccess')
            ->maxLength('UserAccess', 100)
            ->allowEmptyString('UserAccess');

        $validator
            ->dateTime('AccessDate')
            ->allowEmptyDateTime('AccessDate');

        return $validator;
    }
}
