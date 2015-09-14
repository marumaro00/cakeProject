<?php
namespace App\Model\Table;

use App\Model\Entity\SupplierDetail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplierDetail Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Supplier
 */
class SupplierDetailTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('supplier_detail');
        $this->displayField('supplier_id');
        $this->primaryKey('supplier_id');
        $this->belongsTo('Supplier', [
            'foreignKey' => 'supplier_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
		$validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
			
        $validator
            ->requirePresence('street', 'create')
            ->notEmpty('street');
            
        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city');
            
        $validator
            ->allowEmpty('country');
            
        $validator
            ->allowEmpty('postal_code');
            
        $validator
            ->allowEmpty('remarks');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['supplier_id'], 'Supplier'));
        return $rules;
    }
}
