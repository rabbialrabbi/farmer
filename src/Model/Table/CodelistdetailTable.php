<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Codelistdetail Model
 *
 * @method \App\Model\Entity\Codelistdetail newEmptyEntity()
 * @method \App\Model\Entity\Codelistdetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Codelistdetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Codelistdetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Codelistdetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Codelistdetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Codelistdetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Codelistdetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Codelistdetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Codelistdetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Codelistdetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Codelistdetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Codelistdetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CodelistdetailTable extends Table
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

        $this->setTable('codelistdetail');
        $this->setDisplayField('ListItemID');
        $this->setPrimaryKey('ListItemID');
        
           $this->belongsTo('codelist', [            
            'foreignKey' => 'CodeListID',
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
            ->integer('ListItemID')
            ->allowEmptyString('ListItemID', null, 'create');

        $validator
            ->integer('CodeListID')
            ->allowEmptyString('CodeListID');

        $validator
            ->scalar('ListItemCode')
            ->maxLength('ListItemCode', 100)
            ->allowEmptyString('ListItemCode');

        $validator
            ->scalar('ListItemNameEng')
            ->maxLength('ListItemNameEng', 100)
            ->allowEmptyString('ListItemNameEng');

        $validator
            ->scalar('ListItemNameBng')
            ->maxLength('ListItemNameBng', 100)
            ->allowEmptyString('ListItemNameBng');

        return $validator;
    }
}
