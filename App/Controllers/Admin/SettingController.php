<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;

use System\Controller;

/**
 * @property mixed load
 * @property mixed html
 * @property mixed session
 * @property mixed view
 * @property mixed Layout
 * @property mixed validator
 * @property mixed url
 */
class SettingController extends Controller
{
    public function index() {

        $title = $this->html->setTitle('اعدادات الموقع');
        $data['settings'] = $this->load->model('Setting')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;
        $data['showSettings'] = $this->load->model('Setting')->all();

        $view = $this->view->render('admin/setting/list', $data);
        return $this->Layout->render($view, $title);
    }



    public function add() {

        return $this->form();

    }


    public function submit()
    {

        $json = [];

        if($this->isValid()){
            $this->load->model('Setting')->create();
            $json['success'] = ' Settings Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/setting');
            $this->session->set('message', '  Settings Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }






    public function edit($id)
    {
        $SettingModel = $this->load->model('Setting');

        if (! $SettingModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $settings = $SettingModel->get($id);
      
        return $this->form($settings);
    }



    private function form($settings = null)
    {
        if ($settings) {
            // editing form
            $data['target'] = 'edit-setting-' . $settings->id;

            $data['action'] = $this->url->link('/admin/setting/save/' . $settings->id);

            $data['heading'] = 'Edit <b>' . $settings->name . '</b>';

            $data['buttonTitle'] = 'Update Settings ';

        } else {
            // adding form
            $data['target'] = 'add-setting-form';

            $data['action'] = $this->url->link('/admin/setting/submit');

            $data['heading'] = 'Add New Settings';

            $data['buttonTitle'] = 'Add New Settings';


        }

        $settings = (array) $settings ;
//logo	fave_icon site_name	site_description keyword facebook twitter google youtube instgram linkedIn

        $data['image_logo'] = '';
        if(! empty($settings['logo'])) {$data['image_logo'] = $this->url->link('public/images/'. $settings['logo']);}

        $data['image_fave'] = '';
        if(! empty($settings['fave_icon'])) {$data['image_fave'] = $this->url->link('public/images/'. $settings['fave_icon']);}

        $data['site_name']              = array_get($settings, 'site_name');
        $data['site_description']       = array_get($settings, 'site_description');
        $data['keyword']                = array_get($settings, 'keyword');
        $data['facebook']               = array_get($settings, 'facebook');
        $data['twitter']                = array_get($settings, 'twitter');
        $data['google']                 = array_get($settings, 'google');
        $data['youtube']                = array_get($settings, 'youtube');
        $data['instgram']               = array_get($settings, 'instgram');
        $data['linkedIn']               = array_get($settings, 'linkedIn');

        return $this->view->render('/admin/setting/form', $data);
    }



    public function save($id)
    {

        $json = [];

        if ($this->isValid($id)) {
            // it means there are no errors in form validation

            $this->load->model('Setting')->update($id);

            $json['success'] = ' Settings Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('admin/setting');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }

    public function delete($id)
    {

        $json = [];
        $settings = $this->load->model('Setting');

        if (! $settings->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $settings->delete($id);
        $this->session->set('message', ' setting Has Been Deleted Successfully');
        $json['success'] = ' Settings Has Been Deleted Successfully';
        return ($this->json($json));
    }



    private function isValid($id = null){
        $this->validator->required('site_name'          , 'setting Name Is Required');
        $this->validator->required('site_description'   , 'setting Name Is Required');
        $this->validator->required('keyword'            , 'setting Name Is Required');


        if(is_null($id)) {
            $this->validator->requiredFile('image_logo')->image('image');
            $this->validator->requiredFile('image_fave')->image('image');
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }








}