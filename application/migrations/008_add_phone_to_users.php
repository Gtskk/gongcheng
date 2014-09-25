<?php
class Migration_Add_phone_to_users extends CI_Migration {

	public function up()
	{
		$fields = (array(
			'display_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => 20
			)
		));
		$this->dbforge->add_column('users', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('users', 'display_name');
		$this->dbforge->drop_column('users', 'phone');
	}
}