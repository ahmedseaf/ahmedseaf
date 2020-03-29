<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;

use System\Controller;

class UsersGroupsController extends Controller
{

    public function index() {

       // pre($this->load->model('UsersGroups')->get(2));
        $title = $this->html->setTitle('Users Groups');
        $data['usersGroups'] = $this->load->model('UsersGroups')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;

        $view = $this->view->render('admin/users-groups/list', $data);
        return $this->Layout->render($view, $title);
    }



    public function add() {

        return $this->form();

    }


    public function submit()
    {

        $json = [];

        if($this->isValid()){
            $this->load->model('UsersGroups')->create();
            $json['success'] = ' Users Groups Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/users-groups');
            $this->session->set('message', ' Users Groups Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }


    private function isValid(){
         $this->validator->required('name', 'Users Groups Name Is Required');
         return $this->validator->passes();
    }

    public function edit($id)
    {
        $UsersGroupsModel = $this->load->model('UsersGroups');

        if (! $UsersGroupsModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $users_group = $UsersGroupsModel->get($id);

        return $this->form($users_group);
    }



    private function form($users_group = null)
    {
        if ($users_group) {
            // editing form
            $data['target'] = 'edit-users-groups-' . $users_group->id;

            $data['action'] = $this->url->link('/admin/users-groups/save/' . $users_group->id);

            $data['heading'] = 'Edit <b>' . $users_group->name . '</b>';

            $data['buttonTitle'] = 'Update Users Group';
        } else {
            // adding form
            $data['target'] = 'add-users-groups-form';

            $data['action'] = $this->url->link('/admin/users-groups/submit');

            $data['heading'] = 'Add New Users Groups';

            $data['buttonTitle'] = 'Add New Users Group';

        }

        $data['name'] = $users_group ? $users_group->name : null;

        $data['users_group_pages'] = $users_group ? $users_group->pages : [];

        $data['pages'] = $this->getPermissionPages();

        return $this->view->render('/admin/users-groups/form', $data);
    }



    public function save($id)
    {
        $json = [];

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('UsersGroups')->update($id);

            $json['success'] = ' Users Groups Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('admin/users-groups');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }



    public function delete($id)
    {
        $categoriesModel = $this->load->model('UsersGroups');

        if (! $categoriesModel->exists($id) OR $id == 1) {
            return $this->url->redirectTo('/404');
        }

        $categoriesModel->delete($id);

        $json['success'] = 'Users Groups Has Been Deleted Successfully';

        return $this->json($json);
    }


    private function getPermissionPages(){
        $permission = [];

        foreach ($this->route->routes() AS $route) {
           if(strpos($route['url'], '/admin') === 0 ){
               $permission[] = $route['url'];
           }
        }
        return $permission;
    }

}