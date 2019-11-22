<?php 

namespace App\Controllers;

use System\Controller;

class HomeController extends Controller
{
    public function index()
    {

       //return $this->view->render('home');
        //$this->db;
  $this->db->data(['name' => 'ahmed'])->insert('users_groups');

//echo 'welcom';



       
    }
}