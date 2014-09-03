<?php
class Migration_Add_archive_to_articles extends CI_Migration {

	public function up()
	{
		$fields = array(
			'template' => array(
				'type' => 'INT',
				'constraint' => '25'
			),
		);
		$this->dbforge->add_column('pages', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('pages', 'template');
	}
}