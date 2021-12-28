<?php
class Migration_Adc_Salario extends CI_Migration
{
    public function up()
    {

        $this->dbforge->add_field(
           array(
              'id' => array(
                 'type' => 'INT',
                 'constraint' => 11,
                 'unsigned' => true,
                 'auto_increment' => true
              ),
			    'user_id' => array(
                 'type' => 'INT',
                 'constraint' => '11',
              ),			 
              'salario' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '255',
              ),           
              'salario_atual' => array(
                'type' => 'ENUM("yes","no")',
                'default' => 'yes',
             ), 
             'date_created' => array(
                'type' => 'date',
              ),               	
           )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('salario');

		
		   
    }

    public function down()
    {
        $this->dbforge->drop_table('salario');
    }
}