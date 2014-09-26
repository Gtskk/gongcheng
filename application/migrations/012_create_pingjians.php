<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_pingjians extends CI_Migration {

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
			'shikuai' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'kaikong_zhuangdingbiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'kaikong_zhuangdibiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'kaikong_hutongbiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'kaikong_jitaibiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'kaikong_zhuantouchangdu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'kaikong_shuipingduizhong' => array(
				'type' => 'CHAR',
				'default' => 0,
			),
			'kaikong_kaizhuanshijian' => array(
				'type' => 'DATETIME',
			),
			'kaikong_jianli' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'default' => '',
			),
			'chengkong_zhuganchang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'chengkong_zhuanjuzongchang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'chengkong_jiyuci' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'chengkong_zongkongshendu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'chengkong_yujiruyanbiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'chengkong_yiciqingkongnijiangbizhong' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'chengkong_shijiruyanbiaogao' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'chengkong_jianli' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'gjgza_zhujinguige' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'gjgza_jiaqiangjinguige' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'gjgza_jiamiluoxuanjin' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'gjgza_jiamichangdu' => array(
				'type' => 'INT',
				'constraint' => '10',
			),
			'gjgza_feimiluoxuanjin' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'gjgza_zhihutongdiaojin' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'gjgza_quanjinlongjieshu' => array(
				'type' => 'INT',
				'constraint' => '10',
			),
			'gjgza_banquanjinlongchangdu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,6',
			),
			'gjgza_dajiehoulongchangdu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'gjgza_dilongchang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'gjgza_leijizonglongshu' => array(
				'type' => 'INT',
				'constraint' => '10',
			),
			'gjgza_jianli' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'gjgza_jianliqianzi' => array(
				'type' => 'CHAR',
			),
			'ecqk_nijiangbizhong' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'ecqk_chenzha' => array(
				'type' => 'INT',
				'constraint' => '10',
			),
			'ecqk_qingkonghoukongshen' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'ecqk_jianli' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'shuanguanzhu_daoguanjukongdijuli' => array(
				'type' => 'INT',
				'constraint' => '10',
			),
			'shuanguanzhu_shuanqiangdu' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'shuanguanzhu_tanluodu' => array(
				'type' => 'INT',
				'constraint' => '10',
			),
			'shuanguanzhu_shuanshijiliang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'shuanguanzhu_shuanlilunliang' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'shuanguanzhu_chongyingxishu' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'shuanguanzhu_shuanmianduihutongjuli' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'shuanguanzhu_shuanmianduijitaijuli' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'shuanguanzhu_guanzhushijian' => array(
				'type' => 'DATETIME',
			),
			'shuanguanzhu_jianli' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'extra' => array(
				'type' => 'TEXT',
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('pingjians');
	}

	public function down()
	{
		$this->dbforge->drop_table('pingjians');
	}
}