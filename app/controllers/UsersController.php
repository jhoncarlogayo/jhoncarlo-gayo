<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: StudentsController
 * 
 * Automatically generated via CLI.
 */
class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }
public function index()
    {
        $data['users'] = $this->UsersModel->all();

        $this->call->view('users/index', $data);
    }
    
   public function create()
   {
        if($this->io->method()== 'post')
            {
            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $email = $this->io->post('email');

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        );

       if ($this->UsersModel->insert($data)) {
            redirect();
       } else {
         echo "Error";
       }
    } else {
            $this->call->view('users/create');
        }        
    }

    public function update($id)
    {
        $user = $this-> UsersModel->find($id);
    if(!$user)
    {
        echo "User not found dahil wala kang luxury car.";
        return;
    }
        if($this->io->method()=='post')
        {
            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $email = $this->io->post('email');

            $data=array('first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email);

            if($this->UsersModel->update($id, $data))
            {
                redirect();
            }
            else {
                echo "error dahil kurap ka!";
            }
        }
        else
        {
            $data['user'] = $user;
            $this->call->view('users/update', $data);
        }
    }

    function delete($id)
    {
        if($this->UsersModel->delete($id))
        {
            redirect();
        }
        else{
            echo "Error! Are you sure you want to delete record?";
        }
    }
    
}