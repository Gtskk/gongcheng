<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_project_datas extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'mac_id' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'type' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'radius' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'top_ref' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'length' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'ruyan_length' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'predict_ruyan' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'quanjin_length' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'kaizhuan_time' => array(
				'type' => 'DATETIME',
			),
			'chengzhuang_time' => array(
				'type' => 'DATETIME',
			),
			'hutong_heigthRef' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jitai_heightRef' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'zhuzhuangan' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'fuzhuangan' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'zhuantou' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'zhujinguige' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'hanjie_length' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jiajinguguige' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'jiamigujinguige' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'jiami_length' => array(
				'type' => 'INT',
			),
			'feimigujinguige' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'maoguchang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'zongkongshendu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'yuci' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'diaojinhutong' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'hangmianjitai' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'dajielongchang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'quanjinlongchang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,3',
			),
			'dilong' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'quanjindilong' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,3',
			),
			'hangqiangdu' => array(
				'type' => 'VARCHAR',
				'constraint' => '5',
			),
			'hangchaoguanliang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'hanglilunliang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,3',
			),
			'extra' => array(
				'type' => 'TEXT',
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('datas');
	}

	public function down()
	{
		$this->dbforge->drop_table('datas');
	}
}