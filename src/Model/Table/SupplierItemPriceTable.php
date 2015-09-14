<?php
namespace App\Model\Table;

use App\Model\Entity\SupplierItemPrice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplierItemPrice Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Item
 * @property \Cake\ORM\Association\BelongsTo $Supplier
 */
class SupplierItemPriceTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('supplier_item_price');
        $this->displayField('item_id');
        $this->primaryKey(['item_id', 'supplier_id']);
        $this->belongsTo('Item', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
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
            ->allowEmpty('reference_date', 'create');
            
        $validator
            ->add('price', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('price');

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
        $rules->add($rules->existsIn(['item_id'], 'Item'));
        $rules->add($rules->existsIn(['supplier_id'], 'Supplier'));
        return $rules;
    }
}
