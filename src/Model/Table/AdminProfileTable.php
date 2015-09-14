<?php
namespace App\Model\Table;

use App\Model\Entity\AdminProfile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdminProfile Model
 *
 */
class AdminProfileTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('admin_profile');
        $this->displayField('admin_id');
        $this->primaryKey('admin_id');
		$this->belongsTo('Admin', [
            'className' => 'Admin',
			'foreignKey' => 'admin_id',
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
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');
            
        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');
            
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
