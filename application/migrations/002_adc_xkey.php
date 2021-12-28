<?php
class Migration_Adc_Xkey extends CI_Migration
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
              'api_key' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '255',
              ),
              'level' => array(
                 'type' => 'int',
                 'constraint' => '2',
              ),
              'ignore_limits' => array(
                'type' => 'int',
                'constraint' => '1',
             ),
             'is_private_key' => array(
                'type' => 'int',
                'constraint' => '1',
             ),
             'ip_addresses' => array(
                'type' => 'text',
             ),
             'date_created' => array(
                'type' => 'date',
              ),
              'api_key_activated' => array(
                'type' => 'ENUM("yes","no")',
                'default' => 'yes',
             ),          	
           )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('keys');

        $data = array('user_id' => '1','api_key' => 'crud@2022','api_key_activated' => 'yes');
        $this->db->insert('keys', $data);
		
		   
    }

    public function down()
    {
        $this->dbforge->drop_table('keys');
    }
}