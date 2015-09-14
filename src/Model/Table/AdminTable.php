<?php
namespace App\Model\Table;

use App\Model\Entity\Admin;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admin Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Designation
 */
class AdminTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('admin');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Designation', [
            'foreignKey' => 'designation_id',
            'joinType' => 'INNER'
        ]);
		$this->hasOne('AdminProfile', [
			'foreignKey' => 'admin_id',
			'className' => 'AdminProfile',
			'joinType' => 'INNER'
		]);
		$this->hasOne('AdminImage', [
			'foreignKey' => 'admin_id',
			'className' => 'AdminImage',
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');
            
        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');
            
        $validator
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['designation_id'], 'Designation'));
        return $rules;
    }
}
