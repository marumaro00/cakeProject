<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * Company Form.
 */
class CompanyForm extends Form
{
    /**
     * Builds the schema for the modeless form
     *
     * @param Schema $schema From schema
     * @return $this
     */
    protected function _buildSchema(Schema $schema)
    {
        $schema->addField('name', 'string');
		$schema->addField('address', 'string');
		$schema->addField('contact', 'string');
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
        $validator->add('name', 'length', [
                'rule' => ['minLength', 5],
                'message' => 'A name is required'
            ]);
		
		$validator->add('contact', 'length', [
                'rule' => ['minLength', 5],
                'message' => 'A name is required'
            ]);
		$validator->add('address', 'length', [
                'rule' => ['minLength', 5],
                'message' => 'A name is required'
            ]);
		return $validator;
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @return bool
     */
    protected function _execute(array $data)
    {
		Configure::write('Company.name',$data['name']);
		Configure::write('Company.address',$data['address']);
		Configure::write('Company.contact',$data['contact']);
		Configure::dump('Company', 'default', ['Company']);
        return true;
    }
}
