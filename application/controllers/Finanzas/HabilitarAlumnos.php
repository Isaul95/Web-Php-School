<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HabilitarAlumnos extends CI_Controller {

		 private $permisos;
	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_DarAccesoAlumnos");
		 $this->permisos = $this->backend_lib->control();
	 }

	 // VISTA DONDE SE PRESENTA LOS CONTADORES  (CUADRITOS) SE MANDAN VARIABLES ALA VISTA ESAS VARIABLES CONTIENEN EL NUMERO DE REGISTROS Y SE PRESENTA EN EL CUADRO
	public function index(){

		$data = array(
		'countAlumnosConBaucher' => $this->Modelo_DarAccesoAlumnos->rowcount("alta_baucher_banco"),
 );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Finanzas/VistaContadorAlumnosConBaucher', $data);
		$this->load->view('layouts/footer');
	}



// ESTA VISTA PRESENTA LA LISTA DE ALUMNOS K YA SUBIERON SU BAUCHER Y SE PASA A CHECKEN PARA DARLES ACCESO A ELEGIR SUS MATERIAS
		public function Vista_HabilitarAlumnoDespuesDeSubirBaucher(){

			$this->load->view('layouts/header');
			$this->load->view('layouts/aside');
		   $this->load->view('admin/Vistas_Finanzas/VistaHabilitarAlumno');
			$this->load->view('layouts/footer');
		}


		public function listaDeAlumnosConBaucherRegistrado(){

			$posts = $this->Modelo_DarAccesoAlumnos->obtenerListaDeAlumnosConBaucherRegistrado();
			echo json_encode($posts);
		}


public function verBaucher($id_alta_baucher_banco){
	$consulta = $this->Modelo_DarAccesoAlumnos->getBaucherId($id_alta_baucher_banco);
	$archivo = $consulta['archivo'];
	$img = $consulta['nombre_archivo'];
	header("Content-type: application/pdf");
	header("Content-Disposition: inline; filename=$img.pdf");
	print_r($archivo);
}






public function marcarParaRegistro(){

	// if ($this->input->is_ajax_request()) {

		// $this->form_validation->set_rules('name', 'Name', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		// if ($this->form_validation->run() == FALSE) {
		// 	$data = array('responce' => 'error', 'message' => validation_errors());
		// } else {
			$ajax_data = $this->input->post();
			if ($this->Modelo_DarAccesoAlumnos->insert_entry($ajax_data)) {
				$data = array('responce' => 'success', 'message' => 'Alumno habilitado correctamente...!');
			} else {
				$data = array('responce' => 'error', 'message' => 'Fallo habilitar alumno...!');
			}
		// }

		echo json_encode($data);
	// } else {
	// 	echo "no inserto toy en el else";
	// }

}






	public function generaPdfRcibo(){


		error_reporting(0);

		/*
		 * To change this template, choose Tools | Templates
		 * and open the template in the editor.
		 */

		include_once('src/phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
		include_once("src/phpjasperxml_0.9d/class/PHPJasperXML.inc.php");
		// include_once ('setting.php');

		// SE HACE LA CONECION PARA CADA HOJA DE ESTAS
		$server = "localhost";
		$user = "root";
		$pass = "";
		$db = "cesvi_webapp";


		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("parameter1"=>1);
		// $PHPJasperXML->load_xml_file("report1_prueba.jrxml"); recibo_cesvi
		$PHPJasperXML->load_xml_file("src/ReportesPDF_Cesvi_jrxml/recibo_cesvi.jrxml");


		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file



	}







}  // Fin del controller
