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
 * @property mixed webLayout
 */
class AboutUsController extends Controller
{
    public function index()
    {
        $data['contacts'] = $this->load->model('ContactUs')->all();
        $view = $this->view->render('aboutUs/list', $data);
        $title = $this->html->setTitle('Contact Us ');
        return $this->Layout->render($view, $title);

    }

    public function contactlist($id)
    {
        $data['contacts'] = $this->load->model('ContactUs')->viewContactUs($id);
        $view = $this->view->render('aboutUs/view', $data);
        $title = $this->html->setTitle('Contact Us ');
        return $this->Layout->render($view, $title);
    }


    public function delete($id)
    {
        $contactModel = $this->load->model('ContactUs');

        $contactModel->delete($id);
        $json['success'] = ' Category Has Been Deleted Successfully';
        return $this->json($json);
    }


    private function isValid(){
        $this->validator->required('name', 'برجاء ادخال البريد الالكترونى');
        $this->validator->required('email')->email('email');
        $this->validator->required('subject', 'برجاء اخيار الغرض من الرسالة');
        $this->validator->required('message', 'برجاء كتابة نص الرسالة');
        $this->validator->required('reCode')->match('reCode', 'validCode', 'برجاء كتابة كود صحيح');
        return $this->validator->passes();
    }

    public function aboutView()
    {

        $data['aboutUs'] = $this->load->model('ContactUs')->viewAboutList();
        $view = $this->view->render('aboutUs/listAboutUs', $data);
        $title = $this->html->setTitle('Contact Us ');
        return $this->Layout->render($view, $title);
    }

    public function addabout() {
        return $this->formAbout();
    }

    public function addaboutdata()
    {
        $json = [];

        $this->load->model('ContactUs')->createAbout();
        $json['success'] = ' About Details Has Been Created Successfully';
        $json['redirectTo'] = $this->url->link('admin/about');
        $this->session->set('message', ' About Has Been Created Successfully');

        return $this->json($json);
    }

    




    public function editabout($id)
    {
        $aboutModel = $this->load->model('ContactUs')->viewAboutById($id);

        $aboutModel = $this->ToArray($aboutModel);


        $about = $aboutModel['id'];

        return $this->formAbout($about);
    }
    
    
    public function updateabout($id)
    {

        $json = [];

        

            $this->load->model('ContactUs')->updateAbout($id);

            $json['success'] = ' About Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('admin/about');
        

        return $this->json($json);
    }


    private function formAbout($abouts = null)
    {
        if ($abouts) {
            // editing form
            $data['target'] = 'edit-about-' . $abouts;

            $data['action'] = $this->url->link('/admin/about/update/' . $abouts);


            $data['buttonTitle'] = 'Update Brands ';
        } else {
            // adding form
            $data['target'] = 'add-about-form';

            $data['action'] = $this->url->link('/admin/about/adddata');

            $data['heading'] = 'Add New Brands';

            $data['buttonTitle'] = 'Add New Brands';

        }
        $aboutModel = $this->load->model('ContactUs')->viewAboutById($abouts);

        $aboutModel = $this->ToArray($aboutModel)  ;

        $data['address']    = $aboutModel['address'];
        $data['mobile1']    = $aboutModel['mobile1'];
        $data['mobile2']    = $aboutModel['mobile2'];
        $data['phone1']     = $aboutModel['phone1'];
        $data['phone2']     = $aboutModel['phone2'];
        $data['fax']        = $aboutModel['fax'];
        $data['email']      = $aboutModel['email'];
        $data['web']        = $aboutModel['web'];
        return $this->view->render('/aboutUs/formAboutUs', $data);
    }


//        ---------------------------------------------
//                      In View Page
//        ----------------------------------------------
    public function aboutUs()
    {
        $data['productFiltersTop']         = $this->load->model('MainPage')->selectBySlideNameNavbar(11, 1);
        $data['companyLogo'] = $this->load->model('OurCompany')->all();
        $data['ourInfo'] = $this->load->model('ContactUs')->viewAboutList();
        $title  = $this->html->setTitle('حول الشركة | شركة الحرية للتوريدات  ');
        $view   = $this->view->render('aboutUs/aboutUs', $data);
        return $this->webLayout->render($view, $title);
    }

    public function contactUs()
    {
        $data['productFiltersTop']         = $this->load->model('MainPage')->selectBySlideNameNavbar(11, 1);
        $data['ourInfo'] = $this->load->model('ContactUs')->viewAboutList();
        $data['code'] = mt_rand(1234, 9999);
        $title  = $this->html->setTitle('اتصل بنا | شركة الحرية للتوريدات  ');
        $view   = $this->view->render('aboutUs/contactUs', $data);
        return $this->webLayout->render($view, $title);
    }


    public function insert()
    {
        $json = [];
        if($this->isValid()){
            $this->load->model('ContactUs')->create();
            $json['success'] = ' تم استلام رسالتك بنجاح شكرا لتواصلكم معنا';
            $json['redirectTo'] = $this->url->link('contact/us');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }




}