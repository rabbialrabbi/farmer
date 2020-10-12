<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smsdesattachmentdetail Model
 *
 * @method \App\Model\Entity\Smsdesattachmentdetail newEmptyEntity()
 * @method \App\Model\Entity\Smsdesattachmentdetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Smsdesattachmentdetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SmsdesattachmentdetailTable extends Table
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

        $this->setTable('smsdesattachmentdetail');
        $this->setDisplayField('desattachdeatailsid');
        $this->setPrimaryKey('desattachdeatailsid');
        
        $this->belongsTo('smsdesattachment', [
            'foreignKey' => 'desattachid',
            'bindingKey' => 'desattachID',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('farmerapi', [
            'foreignKey' => 'farmeroid',
            'joinType' => 'INNER',
            'bindingKey' => 'oid'
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
            ->integer('desattachdeatailsid')
            ->allowEmptyString('desattachdeatailsid');

        $validator
            ->integer('desattachid')
            ->allowEmptyString('desattachid');

        $validator
            ->integer('farmeroid')
            ->allowEmptyString('farmeroid');

        return $validator;
    }
}
