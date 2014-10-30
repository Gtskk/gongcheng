<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_projects extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'created' => array(
				'type' => 'DATETIME',
			),
			'created' => array(
				'type' => 'DATETIME',
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('projects');
		$this->db->query('ALTER TABLE gts_projects ADD CONSTRAINT fk_author FOREIGN KEY (author) REFERENCES gts_users(id)');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE gts_projects DROP FOREIGN KEY fk_author');
		$this->dbforge->drop_table('projects');
	}
}