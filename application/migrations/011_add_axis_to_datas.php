<?php
class Migration_Add_axis_to_datas extends CI_Migration {

	public function up()
	{
		$fields = (array(
			'x_axis' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			),
			'y_axis' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,1',
			)
		));
		$this->dbforge->add_column('datas', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('datas', 'x_axis');
		$this->dbforge->drop_column('datas', 'y_axis');
	}
}