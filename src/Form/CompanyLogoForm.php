<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Core\Configure;

/**
 * CompanyLogo Form.
 */
class CompanyLogoForm extends Form
{
    /**
     * Builds the schema for the modeless form
     *
     * @param Schema $schema From schema
     * @return $this
     */
    protected function _buildSchema(Schema $schema)
    {
        return $schema;
    }

    /**
     * Form validation builder
     *
     * @param Validator $validator to use against the form
     * @return Validator
     */
    protected function _buildValidator(Validator $validator)
    {
        return $validator;
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @return bool
     */
    protected function _execute(array $data)
    {
		$path = Configure::read('Interface.path');
		if (!$data) {
            return false;
        }
        $dir = new Folder($path, true, 755);
        $tmp_file = new File($data['tmp_name']);
        if (!$tmp_file->exists()) {
            return false;
        }
		$extension = pathinfo($data['name'], PATHINFO_EXTENSION);
		$name = md5($data['name']) . "." .$extension;
        $file = new File($dir->path . DS . $data['name']);
        if (!$tmp_file->copy($dir->pwd() . DS . $name)) {
            return false;
        }
		Configure::write('Company.logo',$dir->path . DS . $name);
		Configure::dump('Company', 'default', ['Company']);
        $file->close();
        $tmp_file->delete();
		
        return true;
    }
}
