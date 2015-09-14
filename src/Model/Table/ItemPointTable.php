<?php
namespace App\Model\Table;

use App\Model\Entity\ItemPoint;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemPoint Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Item
 */
class ItemPointTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item_point');
        $this->displayField('item_id');
        $this->primaryKey('item_id');
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
            ->add('reorder_point', 'valid', ['rule' => 'numeric'])
            ->requirePresence('reorder_point', 'create')
            ->notEmpty('reorder_point');
            
        $validator
            ->add('reorder_quantity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('reorder_quantity', 'create')
            ->notEmpty('reorder_quantity');
            
        $validator
            ->add('alert_point', 'valid', ['rule' => 'numeric'])
            ->requirePresence('alert_point', 'create')
            ->notEmpty('alert_point');

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
        return $rules;
    }
}
