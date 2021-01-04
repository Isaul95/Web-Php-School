<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AltaBaucherBanco extends CI_Controller {

		 private $permisos;
	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
		 $this->permisos = $this->backend_lib->control();
	 	 $this->load->model("Modelo_DarAccesoAlumnos");
	 }


	public function index(){

		$data = array(
			'permisos' => $this->permisos,
			'tipoDePagos' => $this->Modelo_DarAccesoAlumnos->getTipoDePagos(),
			'nombres' => $this->session->userdata('nombres'),
			'username' => $this->session->userdata('username'),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Alumno/VistaAlumnoSubirBaucher',$data);
		$this->load->view('layouts/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                               Insert Records                               */
	/* -------------------------------------------------------------------------- */

	public function insertarBaucherDelBanco(){

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('numero_control', 'Número de control', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload("archivo")) {
					$data = array('res' => "error", 'message' => $this->upload->display_errors());
				} else {
				  $file_name = $_FILES['archivo']['name'];
					$file_size = $_FILES['archivo']['size'];
					$file_tmp = $_FILES['archivo']['tmp_name'];
					$file_type = $_FILES['archivo']['type'];

					$imagen_temporal = $file_tmp;
					$tipo = $file_type;

					$fp = fopen($imagen_temporal, 'r+b');
					$binario = fread($fp, filesize($imagen_temporal));
					fclose($fp);

					$ajax_data = $this->input->post();
					$ajax_data['archivo'] = $binario; // Documento pdf
					$ajax_data['nombre_archivo'] = $this->upload->data('file_name'); // name file

					if ($this->Modelo_DarAccesoAlumnos->insert_baucher($ajax_data)) {
						$data = array('res' => "success", 'message' => "Archivo guardado correctamente...!");
					} else {
						$data = array('res' => "error", 'message' => "Error al guardado el archivo...!");
					}
				}
			}
			echo json_encode($data);
		} else {
			echo "No se permite este acceso directo...!!!";
		}
	}


		public function consultaCountAlumnos(){
					// $data['estatus'] = $this->input->post('estatus');
	 				$numero_control = $this->input->post('numero_control');
							if ($this->Modelo_DarAccesoAlumnos->consultaCountAlumnosXxx($numero_control)) {
								$data = array('responce' => 'success', 'message' => 'Ya Registro su Comprobante de pago...!!!');
							} else {
								// $data = array('responce' => 'error', 'message' => 'No ha realizado el Registro de su Comprobante de pago...!!!');
								$data = array('responce' => 'error');
							}
					echo json_encode($data);
		}


			public function verBaucher($numero_control){
				$consulta = $this->Modelo_DarAccesoAlumnos->getBaucherId($numero_control);
				$archivo = $consulta['archivo'];
				$img = $consulta['nombre_archivo'];
				header("Content-type: application/pdf");
				header("Content-Disposition: inline; filename=$img.pdf");
				print_r($archivo);
			}


		public function consultaHistDePagosXAlumnos($numero_control){
			// $numero_control = $this->input->post('numero_control');
			$posts = $this->Modelo_DarAccesoAlumnos->obtenerHistorialDePagosXAlumnos($numero_control);

			echo json_encode($posts);
		}


		public function verReciboFirmadoValidado($id_recibo_valido){
			$consulta = $this->Modelo_DarAccesoAlumnos->getReciboValidado($id_recibo_valido);
			$archivo = $consulta['archivo'];
			$img = $consulta['nombre_archivo'];
			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=$img.pdf");
			print_r($archivo);
		}



}  // Fin del controller
