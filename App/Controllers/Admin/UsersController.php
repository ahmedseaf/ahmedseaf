<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;

use System\Controller;

class UsersController extends Controller
{

    public function index() {

     // pred($this->load->model('Users')->all());
        $title = $this->html->setTitle('Users ');
        $data['users'] = $this->load->model('Users')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;

        $view = $this->view->render('admin/users/list', $data);
        return $this->Layout->render($view, $title);
    }



    public function add() {

        return $this->form();

    }


    public function submit()
    {

        $json = [];

        if($this->isValid()){
            $this->load->model('Users')->create();
            $json['success'] = ' Users Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/users');
            $this->session->set('message', ' Users Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }






    public function edit($id)
    {
        $UsersModel = $this->load->model('Users');
       // pred($UsersModel);
        if (! $UsersModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $users = $UsersModel->get($id);

        return $this->form($users);
    }



    private function form($users = null)
    {
        if ($users) {
            // editing form
            $data['target'] = 'edit-users-' . $users->id;

            $data['action'] = $this->url->link('/admin/users/save/' . $users->id);

            $data['heading'] = 'Edit <b>' . $users->firstname . ' '  . $users->lastname . '</b>';

            $data['buttonTitle'] = 'Update Users ';
        } else {
            // adding form
            $data['target'] = 'add-users-form';

            $data['action'] = $this->url->link('/admin/users/submit');

            $data['heading'] = 'Add New Users';

            $data['buttonTitle'] = 'Add New Users';

        }

        $users = (array) $users ;

        $data['fname']  = array_get($users, 'firstname');
        $data['lname']  = array_get($users, 'lastname');
        $data['email']  = array_get($users, 'email');
        $data['status'] = array_get($users, 'status', 'Enabled');
        $data['group']  = array_get($users, 'users_group_id');
        $data['image']  = array_get($users, 'image');
        $data['gender'] = array_get($users, 'gender', 'Male');
        //$data['birthday'] = array_get($users, 'birthday');

//        $data['birthday'] = '';
//        if (! empty($users['birthday'])) {
//            $data['birthday'] = date('d-m-Y', $users['birthday']);
//        }

        $data['birthday'] = '';

        if (! empty($users['birthday'])) {
            $data['birthday'] =  $users['birthday'];
        }


        $data['image'] = '';
        if(! empty($users['image'])) {
            $data['image'] = $this->url->link('public/images/'. $users['image']);
        }

        $data['users_groups'] = $this->load->model('UsersGroups')->all();

        return $this->view->render('/admin/users/form', $data);
    }



    public function save($id)
    {

        $json = [];

        if ($this->isValid($id)) {
            // it means there are no errors in form validation
            //pred($_POST);
            $this->load->model('Users')->update($id);

            $json['success'] = ' Users Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('admin/users');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();

        }

        return $this->json($json);
    }



    public function delete($id)
    {
        $usersModel = $this->load->model('Users');

        if (! $usersModel->exists($id) OR $id == 1) {
            return $this->url->redirectTo('/404');
        }

        $usersModel->delete($id);

        $json['success'] = 'Users Has Been Deleted Successfully';

        return $this->json($json);
    }



    private function isValid($id = null){
        $this->validator->required('first_name', 'First Name  Name Is Required');
        $this->validator->required('last_name', 'Last Name  Name Is Required');
        $this->validator->required('email')->email('email');
        // for duplicate email Address
       // $this->validator->unique('email', ['users', 'email', 'id', $id]);
        $this->validator->required('birthday', 'Birthday  Name Is Required');

        if(is_null($id)) {
            $this->validator->required('password')->minLen('password', 3)->match('password', 'r_password', 'Confirm Password Should Match Password');
            $this->validator->requiredFile('image')->image('image');
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }



}