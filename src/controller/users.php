<?php

namespace App\Controller;

final class users extends main
{

    function __construct()
    {
        parent::__construct();
    }

    function add()
    {
        $method = $this->http->getMethod();
        if ($method == 'GET') {
            $data = $this->view->render('users/add_users.twig', array());
            $this->http->response($data);
        } else if ($method == 'POST') {
            $username = $this->http->post('username');
            $insert   = $this->db->create('users',
                array('username' => $username));

            if ($insert) header('Location: /example/users');
        }
    }

    function delete()
    {

        $delete = $this->db->delete('users', []);
        if ($delete) header('Location: /example/users');
    }

    function get()
    {
        $users = $this->db->reader('users', array());
        $data  = $this->view->render('users/list_users.twig',
            array("users" => $users));
        $this->http->response($data);
    }
}