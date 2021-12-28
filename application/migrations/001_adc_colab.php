<?php
class Migration_Adc_Colab extends CI_Migration
{
    public function up()
    {

        $this->dbforge->add_field(
           array(
              'codigo' => array(
                 'type' => 'INT',
                 'constraint' => 11,
                 'unsigned' => true,
                 'auto_increment' => true
              ),
			    'nomecompleto' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '300',
              ),			 
              'cpf' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '20',
              ),
              'rg' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '20',
              ),
              'data_nasc' => array(
               'type' => 'date',
             ),
             'cep' => array(
               'type' => 'VARCHAR',
               'constraint' => '20',
            ),
            'endereco' => array(
               'type' => 'VARCHAR',
               'constraint' => '300',
            ),		
            'numero' => array(
               'type' => 'VARCHAR',
               'constraint' => '10',
            ),		
            'cidade' => array(
               'type' => 'VARCHAR',
               'constraint' => '300',
            ),		
            'estado' => array(
               'type' => 'VARCHAR',
               'constraint' => '2',
            ),		
           )
        );

        $this->dbforge->add_key('codigo', TRUE);
        $this->dbforge->create_table('users');
		
		   
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}