<?php
namespace App\Model\Table;

use App\Model\Entity\SupplierItem;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplierItem Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Supplier
 * @property \Cake\ORM\Association\BelongsTo $Item
 */
class SupplierItemTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('supplier_item');
        $this->displayField('supplier_id');
        $this->primaryKey(['supplier_id', 'item_id']);
        $this->belongsTo('Supplier', [
            'foreignKey' => 'supplier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Item', [
            'foreignKey' => 'item_id',
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
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['item_id'], 'Item'));
        return $rules;
    }
}
