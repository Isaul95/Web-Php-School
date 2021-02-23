<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio_social extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_ProcesoFinal");
	 }

	public function index(){
		$numero_control =  $this->session->userdata('username');

		$data  = array(
			'permisos' => $this->permisos,
			'datosAlumnoProcesoFinal' => $this->Modelo_ProcesoFinal->obtenerDatosDelAlumnoProcFin($numero_control),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Alumno/VistaServicio_social',$data);
		$this->load->view('layouts/footer');
	}








}  // Fin del controller
