<?php
namespace App\Model\Table;

use App\Model\Entity\Inventory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventory Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\BelongsTo $Item
 */
class InventoryTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('inventory');
        $this->displayField('item_id');
        $this->primaryKey('item_id');
        $this->belongsTo('Item', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Location', [
            'foreignKey' => 'location_id'
        ]);
		$this->belongsTo('AdjustmentType', [
            'foreignKey' => 'adjustment_type'
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
            ->add('adjustment', 'valid', ['rule' => 'numeric'])
            ->requirePresence('adjustment', 'create')
            ->notEmpty('adjustment');
            
        $validator
            ->add('adjustment_type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('adjustment_type', 'create')
            ->notEmpty('adjustment_type');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['location_id'], 'Item'));
        return $rules;
    }
	
	public function adjust($id, $quantity, $type = 1, $location = NULL)
	{
		if($this->query()
					->insert(['item_id','reference_date','adjustment','adjustment_type','location_id'])
					->values(['item_id' => $id,
							  'reference_date' => null,
							  'adjustment' => $quantity,
							  'adjustment_type' => $type,
							  'location_id' => $location
							 ])
					->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
