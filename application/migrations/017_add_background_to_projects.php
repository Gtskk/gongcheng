<?php
class Migration_Add_background_to_projects extends CI_Migration {

	public function up()
	{
		$fields = array(
			'background' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
		);
		$this->dbforge->add_column('projects', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('projects', 'background');
	}
}