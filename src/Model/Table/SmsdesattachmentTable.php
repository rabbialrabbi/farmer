<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smsdesattachment Model
 *
 * @method \App\Model\Entity\Smsdesattachment newEmptyEntity()
 * @method \App\Model\Entity\Smsdesattachment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesattachment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesattachment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Smsdesattachment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Smsdesattachment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesattachment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesattachment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsdesattachment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsdesattachment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Smsdesattachment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Smsdesattachment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Smsdesattachment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SmsdesattachmentTable extends Table
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

        $this->setTable('smsdesattachment');
        $this->setDisplayField('desattachID');
        $this->setPrimaryKey('desattachID');
        
       $this->belongsTo('smsdesattachmentdetail', [
            'foreignKey' => 'desattachID',
            'belongsto' =>'desattachid',
            'joinType' => 'INNER'
        ]);
         
        $this->belongsTo('Smscontent', [
            'foreignKey' => 'smscontantoid',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('divisions', [
            'foreignKey' => 'divisionoid',
            'bindingkey' =>'DivisionOid',
            'joinType' => 'INNER'
        ]);
         $this->belongsTo('regions', [
            'foreignKey' => 'regionoid',
            'joinType' => 'INNER'
        ]);
         $this->belongsTo('districts', [
            'foreignKey' => 'districtoid',
            'joinType' => 'INNER'
        ]);
           $this->belongsTo('upazilla', [
            'foreignKey' => 'upazillaoid',
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
            ->decimal('desattachID')
            ->allowEmptyString('desattachID');

        $validator
            ->dateTime('fromdate')
            ->allowEmptyDateTime('fromdate');
        $validator
            ->dateTime('todate')
            ->allowEmptyDateTime('todate');
        $validator
            ->dateTime('attachDate')
            ->allowEmptyDateTime('attachDate');
  
        $validator
            ->integer('smscontantoid')
            ->allowEmptyString('smscontantoid');

        $validator
            ->dateTime('sendingdate')
            ->allowEmptyDateTime('sendingdate');       
        $validator
            ->integer('regionoid')
            ->allowEmptyString('regionoid');

        $validator
            ->integer('districtoid')
            ->allowEmptyString('districtoid');

        $validator
            ->integer('upazillaoid')
            ->allowEmptyString('upazillaoid');

        return $validator;
    }
}
