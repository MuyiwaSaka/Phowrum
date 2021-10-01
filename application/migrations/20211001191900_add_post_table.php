<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_post_table extends CI_Migration {

	public function up() {

		## Create Table ph_topics
		$this->dbforge->add_field(array(
			'post_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
				'auto_increment' => TRUE
			),
            'topic_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
			),
			'post_title' => array(
				'type' => 'VARCHAR',
				'constraint' => 140,
				'null' => FALSE,

			),
			'author_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,

			),
			'post_status' => array(
				'type' => 'VARCHAR',
				'constraint' => 32,
				'null' => FALSE,
                'default' => 'visible',

			),
            'post_text' => array(
				'type' => 'LONGTEXT',
				'null' => FALSE,
			),
			'`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ',
			'`modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ',
		));
		$this->dbforge->add_key("post_id",true);
		$this->dbforge->create_table("posts", TRUE);
		$this->db->query('ALTER TABLE  `posts` ENGINE = MyISAM');


	 }

	public function down()	{
		### Drop table posts ##
		$this->dbforge->drop_table("posts", TRUE);
	}
}