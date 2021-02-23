<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Titulacion extends CI_Controller {
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
		$this->load->view('admin/Vistas_Alumno/VistaTitulacion',$data);
		$this->load->view('layouts/footer');
	}


	//
	// public function insertarRespuestas(){
	//
	// 			$ajax_data = $this->input->post();
	// 			if ($this->Modelo_Evaluacion_Alum_docente->insert_RespuestasEvaluacionAlumnoA_docente($ajax_data)) {
	// 				$data = array('responce' => 'success', 'message' => 'Evaluación guardada correctamente...!');
	// 			} else {
	// 				$data = array('responce' => 'error', 'message' => 'Fallo al guardar...!');
	// 			}
	//
	// 		echo json_encode($data);
	//
	// }






}  // Fin del controller
