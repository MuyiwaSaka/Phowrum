<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_forum extends CI_Migration {

	public function up() {

		## Create Table ci_sessions
		$this->dbforge->add_field(array(
			'session_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => FALSE,
				'default' => '0',

			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => 16,
				'null' => FALSE,
				'default' => '0',

			),
			'user_agent' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => FALSE,

			),
			'last_activity' => array(
				'type' => 'INT',
				'constraint' => 1,
				'unsigned' => TRUE,
				'null' => FALSE,
				'default' => '0',

			),
			'user_data' => array(
				'type' => 'TEXT',
				'null' => FALSE,

			),
		));
		$this->dbforge->add_key("session_id",true);
		$this->dbforge->create_table("ci_sessions", TRUE);
		$this->db->query('ALTER TABLE  `ci_sessions` ENGINE = InnoDB');

		## Create Table login_attempts
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
				'auto_increment' => TRUE
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => FALSE,

			),
			'login' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => FALSE,

			),
			'`time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->create_table("login_attempts", TRUE);
		$this->db->query('ALTER TABLE  `login_attempts` ENGINE = InnoDB');

		## Create Table ph_sections
		$this->dbforge->add_field(array(
			'section_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
				'auto_increment' => TRUE
			),
			'section_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 25,
				'null' => FALSE,

			),
			'parent_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => TRUE,

			),
		));
		$this->dbforge->add_key("section_id",true);
		$this->dbforge->create_table("ph_sections", TRUE);
		$this->db->query('ALTER TABLE  `ph_sections` ENGINE = MyISAM');

		## Create Table ph_topics
		$this->dbforge->add_field(array(
			'topic_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
				'auto_increment' => TRUE
			),
			'topic_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 140,
				'null' => FALSE,

			),
			'author_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,

			),
			'section_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,

			),
			'`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ',
			'`modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ',
		));
		$this->dbforge->add_key("topic_id",true);
		$this->dbforge->create_table("ph_topics", TRUE);
		$this->db->query('ALTER TABLE  `ph_topics` ENGINE = MyISAM');

		## Create Table user_autologin
		$this->dbforge->add_field(array(
			'key_id' => array(
				'type' => 'CHAR',
				'constraint' => 32,
				'null' => FALSE,

			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
				'default' => '0',

			),
			'user_agent' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => FALSE,

			),
			'last_ip' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => FALSE,

			),
			'`last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		));
		$this->dbforge->add_key("user_id",true);
		$this->dbforge->create_table("user_autologin", TRUE);
		$this->db->query('ALTER TABLE  `user_autologin` ENGINE = InnoDB');

		## Create Table user_profiles
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,

			),
			'country' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => TRUE,

			),
			'website' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE,

			),
			'insta_user' => array(
				'type' => 'VARCHAR',
				'constraint' => 140,
				'null' => TRUE,

			),
			'fb_user' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE,

			),
			'twitter_user' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE,

			),
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->create_table("user_profiles", TRUE);
		$this->db->query('ALTER TABLE  `user_profiles` ENGINE = InnoDB');

		## Create Table users
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => FALSE,

			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,

			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => FALSE,

			),
			'activated' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'null' => FALSE,
				'default' => '1',

			),
			'banned' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'null' => FALSE,
				'default' => '0',

			),
			'ban_reason' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE,

			),
			'new_password_key' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE,

			),
			'new_password_requested' => array(
				'type' => 'DATETIME',
				'null' => TRUE,

			),
			'new_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE,

			),
			'new_email_key' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE,

			),
			'last_ip' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => FALSE,

			),
			'`last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ',
			'`created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ',
			'`modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->create_table("users", TRUE);
		$this->db->query('ALTER TABLE  `users` ENGINE = InnoDB');
	 }

	public function down()	{
		### Drop table ci_sessions ##
		$this->dbforge->drop_table("ci_sessions", TRUE);
		### Drop table login_attempts ##
		$this->dbforge->drop_table("login_attempts", TRUE);
		### Drop table ph_sections ##
		$this->dbforge->drop_table("ph_sections", TRUE);
		### Drop table ph_topics ##
		$this->dbforge->drop_table("ph_topics", TRUE);
		### Drop table user_autologin ##
		$this->dbforge->drop_table("user_autologin", TRUE);
		### Drop table user_profiles ##
		$this->dbforge->drop_table("user_profiles", TRUE);
		### Drop table users ##
		$this->dbforge->drop_table("users", TRUE);

	}
}