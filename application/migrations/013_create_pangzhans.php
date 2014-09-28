<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_pangzhans extends CI_Migration {

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
			'project_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
			),
			'riqi' => array(
				'type' => 'DATE',
			),
			'qihou' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'work_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
			),
			'pangzhanbuwei' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'zhuangjing' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'pangzhanjianlikaishishijian' => array(
				'type' => 'DATE',
			),
			'pangzhanjianlijieshushijian' => array(
				'type' => 'DATE',
			),
			'sg_zjArrive' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'sg_shanggangzheng' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'sg_machineArrive' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'sg_materialCheck' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'sg_hunningtuDoc' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'sg_tiaojianReq' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'jl_shuangshejiqiangdu' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'jl_kongdibiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jl_kongkoubiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jl_shejishuanmianbiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jl_daoguanchangdu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jl_lilunshuanshouguan' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jl_lilunshuanliang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jl_shuanshikuai' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'jl_shuanmianbiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'jl_chongyingxishu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'que_weifanqiangzhixing' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'que_yingxiangzhiliang' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'chuliyijiang' => array(
				'type' => 'TEXT',
			),
			'extra' => array(
				'type' => 'TEXT',
			),
			'shigongqiye' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'default' => '',
			),
			'jianliqiye' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'default' => '',
			),
			'xiangmujinglibu' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'default' => '',
			),
			'xiangmujianlijigou' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'default' => '',
			),
			'zhijianyuan' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'default' => '',
			),
			'pangzhanjianli' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'default' => '',
			),
			'zhijianyuanqianziriqi' => array(
				'type' => 'DATE',
			),
			'jianliqianziriqi' => array(
				'type' => 'DATE',
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('pangzhans');
	}

	public function down()
	{
		$this->dbforge->drop_table('pangzhans');
	}
}