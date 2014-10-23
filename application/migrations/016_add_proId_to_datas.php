<?php
class Migration_Add_proId_to_datas extends CI_Migration {

	public function up()
	{
		$fields = (array(
			'proId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'default' => 1,
			),
		));
		$this->dbforge->add_column('datas', $fields);
		$this->db->query('ALTER TABLE gts_datas ADD CONSTRAINT fk_proId FOREIGN KEY (proId) REFERENCES gts_projects(id)');
	}

	public function down()
	{
		$this->dbforge->drop_column('datas', 'proId');
		$this->db->query('ALTER TABLE `gts_datas` DROP FOREIGN KEY fk_proId');
	}
}