<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smscontent Model
 *
 * @method \App\Model\Entity\Smscontent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Smscontent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Smscontent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Smscontent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smscontent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Smscontent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Smscontent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Smscontent findOrCreate($search, callable $callback = null, $options = [])
 */
class SmscontentTable extends Table
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

        $this->setTable('smscontent');
        $this->setDisplayField('SmsContentOID');
        $this->setPrimaryKey('SmsContentOID');           
        
          $this->belongsTo('codelistdetailA', [
            'foreignKey' => 'SuggestionTypeID',
            'bindingKey' =>'ListItemID',  
            'joinType' => 'INNER',
            'className' =>'codelistdetail'  
        ]);       
          
        $this->belongsTo('codelistdetailB', [
            'foreignKey' => 'SMSTypeID',
            'bindingKey' =>'ListItemID',  
            'joinType' => 'INNER',
            'className' =>'codelistdetail'  
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
             ->integer('SmsContentOID')
             ->requirePresence('SmsContentOID', 'create')
            ->notEmptyString('SmsContentOID');

        $validator
            ->integer('SMSNo')
            ->requirePresence('SMSNo', 'create')
            ->notEmptyString('SMSNo');

        $validator
            ->integer('SMSSlNo')
            ->requirePresence('SMSSlNo', 'create')
            ->notEmptyString('SMSSlNo');

        $validator
            ->integer('MonthID')
            ->requirePresence('MonthID', 'create')
            ->notEmptyString('MonthID');

        $validator
            ->integer('CYearNo')
            ->requirePresence('CYearNo', 'create')
            ->notEmptyString('CYearNo');

        $validator
            ->integer('SMSTypeID')
            ->requirePresence('SMSTypeID', 'create')
            ->allowEmptyString('SMSTypeID');
      
        $validator
            ->integer('SuggestionTypeID')
            ->requirePresence('SuggestionTypeID', 'create')
            ->allowEmptyString('SuggestionTypeID');
      
        $validator
            ->scalar('CNote')
            ->maxLength('CNote', 200)
            ->requirePresence('CNote', 'create')
            ->notEmptyString('CNote');
       
        return $validator;
    }
}
