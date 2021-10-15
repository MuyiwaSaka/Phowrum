<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_install_aauth extends CI_Migration{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {

//===========================
//         GROUPS
//===========================
        //drop table if it exist.
        $this->dbforge->drop_table('aauth_groups', TRUE);
        $this->dbforge->add_field("`id` int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("`name` varchar(100)");
        $this->dbforge->add_field("`definition` text");
//create table and assign primary key
        $this->dbforge->add_key('id', TRUE);
        $attributes = array('ENGINE'=>'InnoDB','CHARSET'=>'utf8','AUTO_INCREMENT'=>'4');        
        $this->dbforge->create_table('aauth_groups',FALSE, $attributes);

        //dump data for Aauth Groups.
        $data = [
            [
                'id'=> 1,  'name'=>'Admin',  'definition'=>'Super Admin Group'
            ],
            [
                'id'=> 1,   'name'=>'Moderators',   'definition'=>'MOderator Access Group'
            ],
            [
                'id'=> 1,   'name'=>'Basic',    'definition'=>'Basic Access Group'
            ]
        ] ;
		$this->db->insert_batch('aauth_groups', $data);

//===========================
//         PERMISSIONS
//===========================
                //Delete table perms if it exists. 
        $this->dbforge->drop_table('aauth_perms', TRUE);
        $this->dbforge->add_field("`id` int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("`name` varchar(100)");
        $this->dbforge->add_field("`definition` text");
        //create table and assign primary key
        $this->dbforge->add_key('id',TRUE);
        $attributes = array('ENGINE'=>'InnoDB','CHARSET'=>'utf8');        
        $this->dbforge->create_table('aauth_perms',FALSE, $attributes);


//===========================
//         GROUP PERMISSIONS
//===========================
        //Delete table perm to group if it exists. 
            $this->dbforge->drop_table('aauth_perm_to_group', TRUE);
            $this->dbforge->add_field("`perm_id` int(11) unsigned NOT NULL");
            $this->dbforge->add_field("`group_id` int(11) unsigned NOT NULL");
        //create table 
        $this->dbforge->add_key(array('perm_id','group_id'),TRUE);
        $attributes = array('ENGINE'=>'InnoDB','CHARSET'=>'utf8');        
        $this->dbforge->create_table('aauth_perm_to_group',FALSE, $attributes);

//===========================
//         USER PERMISSIONS
//===========================
        //Delete table perm to group if it exists. 
        $this->dbforge->drop_table('aauth_perm_to_user', TRUE);
        $this->dbforge->add_field("`user_id` int(11) unsigned NOT NULL");
        //create table 
        $this->dbforge->add_key(array('perm_id','user_id'), TRUE);
        $attributes = array('ENGINE'=>'InnoDB','CHARSET'=>'utf8');        
        $this->dbforge->create_table('aauth_perm_to_user',FALSE, $attributes);


//===========================
//         PRIVATE MESSAGES
//===========================
          //drop table if it exist.
          $this->dbforge->drop_table('aauth_pms', TRUE);
          $this->dbforge->add_field("`id` int(11) unsigned NOT NULL AUTO_INCREMENT");
          $this->dbforge->add_field("`sender_id` int(11) unsigned NOT NULL");
          $this->dbforge->add_field("`receiver_id` int(11) unsigned NOT NULL");
          $this->dbforge->add_field("`title` varchar(255) NOT NULL");
          $this->dbforge->add_field("`message` text");
          $this->dbforge->add_field("`date_sent` datetime DEFAULT NULL");
          $this->dbforge->add_field("`date_read` datetime DEFAULT NULL");
          $this->dbforge->add_field("`pm_deleted_sender` int(1) DEFAULT NULL");
          $this->dbforge->add_field("`pm_deleted_receiver` int(1) DEFAULT NULL");

          //create table and assign primary key
          $this->dbforge->add_key('id',TRUE);
          $this->dbforge->add_key(['full_index'=>['id','sender_id','receiver_id','date_read']]);
          $this->dbforge->create_table('aauth_pms');
//===========================
//          USERS TABLE
//===========================
            //drop table if it exist.
        $this->dbforge->drop_table('aauth_users', TRUE);
        $this->dbforge->add_field("`id` int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("`email` varchar(100) COLLATE utf8_general_ci NOT NULL");
        $this->dbforge->add_field("`pass` varchar(60) COLLATE utf8_general_ci NOT NULL");
        $this->dbforge->add_field("`username` varchar(100) COLLATE utf8_general_ci");
        $this->dbforge->add_field("`banned` tinyint(1) DEFAULT '0'");
        $this->dbforge->add_field("`last_login` datetime DEFAULT NULL");
        $this->dbforge->add_field("`last_activity` datetime DEFAULT NULL");
        $this->dbforge->add_field("`date_created` datetime DEFAULT NULL");
        $this->dbforge->add_field("`forgot_exp` text COLLATE utf8_general_ci");
        $this->dbforge->add_field("`remember_time` datetime DEFAULT NULL");
        $this->dbforge->add_field("`remember_exp` text COLLATE utf8_general_ci");
        $this->dbforge->add_field("`verification_code` text COLLATE utf8_general_ci");
        $this->dbforge->add_field("`totp_secret` varchar(16) COLLATE utf8_general_ci DEFAULT NULL");
        $this->dbforge->add_field("`ip_address` text COLLATE utf8_general_ci");

        //create table and assign primary key
        $this->dbforge->add_key('id');
        $attributes = array(  'ENGINE' => 'InnoDB',   'AUTO_INCREMENT' => 2  );
        $this->dbforge->create_table('aauth_users',FALSE,$attributes);

        //Seed the db with original user.
        $this->db->insert_batch([
            
            [
            'id'=>'1', 
              'email'=>'admin@example.com', 
              'pass' => '$2y$10$h19Lblcr6amOIUL1TgYW2.VVZOhac/e1kHMgAwCubMTlYXZrL0wS2', 
              'username' => 'Admin',
              'banned' => '0',
               'last_login' =>null, 
               'last_activity' => null, 
               'date_created' => null, 
               'forgot_exp' => null,
               'remember_time'=> null, 
               'remember_exp' =>  null, 
               'verification_code' => null,
               'totp_secret' =>  null,
               'ip_address' => '0'  
          ]
        ]);
//===========================
//          USER GROUP
//===========================
          //drop table if it exist.
          $this->dbforge->drop_table('aauth_user_to_group', TRUE);
          $this->dbforge->add_field("`user_id` int(11) unsigned NOT NULL");
          $this->dbforge->add_field("`group_id` int(11) unsigned NOT NULL");
            //create table and assign primary key
          $this->dbforge->add_key(array('user_id','group_id'),TRUE);
          $this->dbforge->create_table('aauth_user_to_group');

            //Seed the db with original user.
            $this->db->insert_batch([                
               [      'user_id' => '1',    'group_id' =>'3'              ],
               [      'user_id' => '1',      'group_id' =>'1'            ],
            ]);
//===========================
//          USER VARIABLES
//===========================

            //drop table if it exist.
        $this->dbforge->drop_table('aauth_user_variables', TRUE);
        $this->dbforge->add_field("`id` int(11) unsigned NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("`user_id` int(11) unsigned NOT NULL");
        $this->dbforge->add_field("`data_key` varchar(100) NOT NULL");
        $this->dbforge->add_field("`value` text");
        //create table and assign primary key
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('aauth_user_variables');

//===========================
//          SUBGROUPS
//===========================
          //drop table if it exist.
          $this->dbforge->drop_table('aauth_group_to_group', TRUE);
          $this->dbforge->add_field("`group_id` int(11) unsigned NOT NULL");
          $this->dbforge->add_field("`subgroup_id` int(11) unsigned NOT NULL");
        //create table and assign primary key
          $this->dbforge->add_key(array('group_id','subgroup_id'));
          $attributes = array('ENGINE'=>'InnoDB','CHARSET'=>'utf8');
          $this->dbforge->create_table('aauth_group_to_group');
//===========================
//          LOGIN ATTEMPTS
//===========================
            //drop table if it exist.
        $this->dbforge->drop_table('aauth_login_attempts', TRUE);
        $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("`ip_address` varchar(39) DEFAULT '0'");
        $this->dbforge->add_field("`timestamp` datetime DEFAULT NULL");
        $this->dbforge->add_field("`login_attempts` tinyint(2) DEFAULT '0'");
        //create table and assign primary key
        $this->dbforge->add_key('id', TRUE);
        $attributes = array('ENGINE'=>'InnoDB','CHARSET'=>'latin1');
        $this->dbforge->create_table('aauth_login_attempts');
    }

    public function down()
    {
        $this->dbforge->drop_table('aauth_groups', TRUE);
        $this->dbforge->drop_table('aauth_perms', TRUE);
        $this->dbforge->drop_table('aauth_perm_to_group', TRUE);
        $this->dbforge->drop_table('aauth_perm_to_user', TRUE);

        $this->dbforge->drop_table('aauth_pms', TRUE);
        $this->dbforge->drop_table('aauth_users', TRUE);
        $this->dbforge->drop_table('aauth_user_to_group', TRUE);
        $this->dbforge->drop_table('aauth_user_variables', TRUE);
        $this->dbforge->drop_table('aauth_group_to_group', TRUE);
        $this->dbforge->drop_table('aauth_login_attempts', TRUE);
    }
}