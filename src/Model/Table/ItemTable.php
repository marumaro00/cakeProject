<?php
namespace App\Model\Table;

use App\Model\Entity\Item;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Item Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ItemCategory
 * @property \Cake\ORM\Association\BelongsTo $ItemType
 * @property \Cake\ORM\Association\HasMany $Inventory
 * @property \Cake\ORM\Association\BelongsToMany $Supplier
 */
class ItemTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item');
        $this->displayField('code');
        $this->primaryKey('id');
        $this->belongsTo('ItemCategory', [
            'foreignKey' => 'category_id'
        ]);
        $this->belongsTo('ItemType', [
            'foreignKey' => 'item_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Inventory', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
		$this->hasOne('ItemPoint', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
		$this->belongsTo('Unit', [
            'foreignKey' => 'store_unit',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Supplier', [
            'foreignKey' => 'item_id',
            'targetForeignKey' => 'supplier_id',
			'through'=>'SupplierItem',
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['category_id'], 'ItemCategory'));
		$rules->add($rules->existsIn(['store_unit'], 'Unit'));
        $rules->add($rules->existsIn(['item_type_id'], 'ItemType'));
        return $rules;
    }
}
