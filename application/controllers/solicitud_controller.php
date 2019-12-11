<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_controller extends CI_Controller {

  function __construct(){
    parent::__construct();
  }

	public function index()
	{
    if ($_SESSION['logged_in']) {
      $this->load->view('inicio');
      $this->load->view('nav');
      $this->load->view('Solicitud');
      $this->load->view('footer');
      $this->load->view('final');
    }else{
      $this->load->view('Login');
    }
	}

  public function informacionEquipo($id_equipo){
    $this->load->model('solicitud_model');
    //$info = $this->solicitud_model->buscarInfo($id_equipo, $_SESSION['id_usuario']);//obtiene toda la informacion del formulario
    //var_dump($info);
    $info_equipo = $this->solicitud_model->buscarInfo($id_equipo);//obtiene toda la informacion del formulario
    //var_dump($info);
    $info_usuario = $this->solicitud_model->infoUsuario($_SESSION['id_usuario']);
    $info = array_merge($info_usuario, $info_equipo);
    echo json_encode($info);
    //var_dump($info);
  }

}
