<?php
namespace App\Model\Table;

use App\Model\Entity\AdminImage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * AdminImage Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Admin
 */
class AdminImageTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('admin_image');
        $this->displayField('admin_id');
        $this->primaryKey('admin_id');
        $this->belongsTo('Admin', [
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
            ->add('admin_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('admin_id', 'create');
            
        $validator
            ->allowEmpty('directory');
            
        $validator
            ->requirePresence('file_size', 'create')
            ->notEmpty('file_size');
            
        $validator
            ->requirePresence('file_path', 'create')
            ->notEmpty('file_path');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->requirePresence('file_type', 'create')
            ->notEmpty('file_type');

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
        $rules->add($rules->existsIn(['admin_id'], 'Admin'));
        return $rules;
    }
	
	 public function uploadFile($path = array(), $filetoupload = null) {
        if (!$filetoupload) {
            return false;
        }
        $dir = new Folder($path, true, 755);
        $tmp_file = new File($filetoupload['tmp_name']);
        if (!$tmp_file->exists()) {
            return false;
        }
        $file = new File($dir->path . DS . $filetoupload['name']);
        if (!$tmp_file->copy($dir->pwd() . DS . $filetoupload['name'])) {
            return false;
        }
        $file->close();
        $tmp_file->delete();
        return true;
    }
}
