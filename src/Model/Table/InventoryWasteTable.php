<?php
namespace App\Model\Table;

use App\Model\Entity\InventoryWaste;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InventoryWaste Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Item
 */
class InventoryWasteTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('inventory_waste');
        $this->displayField('item_id');
        $this->primaryKey('item_id');
        $this->belongsTo('Item', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
		$this->belongsTo('InventoryWasteType', [
            'foreignKey' => 'waste_type',
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
            ->add('quantity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');
            
        $validator
            ->add('waste_type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('waste_type', 'create')
            ->notEmpty('waste_type');

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
		$rules->add($rules->existsIn(['waste_type'], 'InventoryWasteType'));
        return $rules;
    }
}
