<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_jianliRecords extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'num' => array(
				'type' => 'INT',
			),
			'time' => array(
				'type' => 'TIMESTAMP',
			),
			'huningtuliang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'tanluodu' => array(
				'type' => 'INT',
			),
			'guanzhuGood' => array(
				'type' => 'CHAR',
				'default' => 0
			),
			'daoguanlikongdishendu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'baguanqiandaoguanmaishen' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'baguanmeijiechangdu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'baguanjieshu' => array(
				'type' => 'INT',
			),
			'baguanchangdu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'baguanhoudaoguanmaishen' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'baguanGood' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('jianliRecords');
	}

	public function down()
	{
		$this->dbforge->drop_table('jianliRecords');
	}
}