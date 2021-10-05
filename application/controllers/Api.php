<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/RESTController.php';
use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function users_get()
    {
        // Users from a data store e.g. database
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            // Check if the users data store contains users
            if ( $users )
            {
                // Set the response and exit
                $this->response( $users, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No users were found'
                ], 404 );
            }
        }
        else
        {
            if ( array_key_exists( $id, $users ) )
            {
                $this->response( $users[$id], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found'
                ], 404 );
            }
        }
    }

    /*
        User
            create
            get
            get_all users
            validate email
            deactivate user
        Groups
            create
            get group details
            get group members
            get group permissions
            add users to group
            remove users from group
            assign permission to group
            remove permission from group
        Permission
            create permission
            update permission name
            check if user has permission.
            get users list of permissions.
            get list of all permissions
            get user's list of group memberships
            get all users and their permissions
            delete permission
        Sections.
            Create section
            update section details
            get section
            get list of sections
            get list of topics in section
            get count of topics in section
            get count of posts in section
            get list of sub sections
            move section under another section
            delete section
        Topic
            Create topic
            update topic title
            move topic to new section
            get topic 
            get topic author
            get count of posts in topic
            get topic nav path
            get 3 similar topic titles
            freeze topic
            delete topic
        Post
            Create post
            update post content
            delete post
            hide post
            unhide post

    */
}