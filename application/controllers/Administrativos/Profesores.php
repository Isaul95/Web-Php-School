<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends CI_Controller {

		 private $permisos;
	   public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
		  // $this->permisos = $this->backend_lib->control();
	 	 $this->load->model("Modelo_Profesores");
	 }


	public function index(){

		$data  = array(
			'permisos' => $this->permisos,
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Administrativos/VistaProfesores',$data);
		$this->load->view('layouts/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                               Insert Records                               */
	/* -------------------------------------------------------------------------- */

	public function insertarprofesor(){

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('nombres', 'nombre_profesor', 'required');
			$this->form_validation->set_rules('edad', 'edad_profesor', 'required');
			$this->form_validation->set_rules('sexo', 'sexo_profesor', 'required');
			$this->form_validation->set_rules('direccion', 'direccion_profesor', 'required');
			$this->form_validation->set_rules('ciudad_radicando', 'ciudad_profesor', 'required');
			$this->form_validation->set_rules('nacionalidad', 'nacionalidad_profesor', 'required');
			$this->form_validation->set_rules('telefono_celular', 'telefono_profesor', 'required');
			$this->form_validation->set_rules('correo', 'email_profesor', 'required');
			$this->form_validation->set_rules('estado_civil', 'estadocivil_profesor', 'required');
			$this->form_validation->set_rules('nivel_de_estudios', 'niveldeestudios_profesor', 'required');
			$this->form_validation->set_rules('titulado', 'titulado_profesor', 'required');
			$this->form_validation->set_rules('cedula', 'cedula_profesor', 'required');
			$this->form_validation->set_rules('ocupacion', 'ocupacion_profesor', 'required');
			$this->form_validation->set_rules('tipo_de_trabajo', 'tipodetrabajo_profesor', 'required');
			$this->form_validation->set_rules('universidad_procedente', 'universidadprocedente_profesor', 'required');
			$this->form_validation->set_rules('experiencia_docente', 'experiencia_profesor', 'required');
			$this->form_validation->set_rules('trabajos_anteriores', 'trabajosprevios_profesor', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload("curriculum")) {
					$data = array('res' => "error", 'message' => $this->upload->display_errors());
				} else {
	  $file_name = $_FILES['curriculum']['name'];
		$file_size = $_FILES['curriculum']['size'];
		$file_tmp = $_FILES['curriculum']['tmp_name'];
		$file_type = $_FILES['curriculum']['type'];

		$imagen_temporal = $file_tmp;
		$tipo = $file_type;

		$fp = fopen($imagen_temporal, 'r+b');
		$binario = fread($fp, filesize($imagen_temporal));
		fclose($fp);

		$ajax_data = $this->input->post();
		$ajax_data['curriculum'] = $binario; // Documento pdf
		$ajax_data['nombre_archivo'] = $this->upload->data('file_name'); // name file

					if ($this->Modelo_Profesores->insert_entry($ajax_data)) {
						$data = array('res' => "success", 'message' => "Datos agregados correctamente...!");
					} else {
						$data = array('res' => "error", 'message' => "Error al agregar datos...!");
					}
				}
			}
			echo json_encode($data);
		} else {
			echo "No se permite este acceso directo...!!!";
		}

	}
	
	public function updateprofesor(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nombres', 'nombre_profesor', 'required');
			$this->form_validation->set_rules('edad', 'edad_profesor', 'required');
			$this->form_validation->set_rules('sexo', 'sexo_profesor', 'required');
			$this->form_validation->set_rules('direccion', 'direccion_profesor', 'required');
			$this->form_validation->set_rules('ciudad_radicando', 'ciudad_profesor', 'required');
			$this->form_validation->set_rules('nacionalidad', 'nacionalidad_profesor', 'required');
			$this->form_validation->set_rules('telefono_celular', 'telefono_profesor', 'required');
			$this->form_validation->set_rules('correo', 'email_profesor', 'required');
			$this->form_validation->set_rules('estado_civil', 'estadocivil_profesor', 'required');
			$this->form_validation->set_rules('nivel_de_estudios', 'niveldeestudios_profesor', 'required');
			$this->form_validation->set_rules('titulado', 'titulado_profesor', 'required');
			$this->form_validation->set_rules('cedula', 'cedula_profesor', 'required');
			$this->form_validation->set_rules('ocupacion', 'ocupacion_profesor', 'required');
			$this->form_validation->set_rules('tipo_de_trabajo', 'tipodetrabajo_profesor', 'required');
			$this->form_validation->set_rules('universidad_procedente', 'universidadprocedente_profesor', 'required');
			$this->form_validation->set_rules('experiencia_docente', 'experiencia_profesor', 'required');
			$this->form_validation->set_rules('trabajos_anteriores', 'trabajosprevios_profesor', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload("curriculum")) {
					$data = array('responce' => "error", 'message' => $this->upload->display_errors());
				}else{
					$file_name = $_FILES['curriculum']['name'];
					$file_tmp = $_FILES['curriculum']['tmp_name'];
					
					$file = $_FILES["curriculum"]["tmp_name"];
  
	  if(!isset($file)) {
		$data = array('responce' => "error", 'message' => "Please select an pdf to upload");
	  } else {
		$fileSize = getimagesize($_FILES["curriculum"]["tmp_name"]);
  
		if ($fileSize) {
		  $img = file_get_contents($_FILES["curriculum"]["tmp_name"]);
		  $data['id_profesores'] = $this ->input->post('id_profesores');
					$data['nombres'] = $this ->input->post('nombres');
					$data['edad'] = $this ->input->post('edad');
					$data['sexo'] = $this ->input->post('sexo');
					$data['direccion'] = $this ->input->post('direccion');
					$data['ciudad_radicando'] = $this ->input->post('ciudad_radicando');
					$data['nacionalidad'] = $this ->input->post('nacionalidad');
					$data['telefono_celular'] = $this ->input->post('telefono_celular');
					$data['correo'] = $this ->input->post('correo');
					$data['estado_civil'] = $this ->input->post('estado_civil');
					$data['nivel_de_estudios'] = $this ->input->post('nivel_de_estudios');
					$data['titulado'] = $this ->input->post('titulado');
					$data['cedula'] = $this ->input->post('cedula');
					$data['ocupacion'] = $this ->input->post('ocupacion');
					$data['tipo_de_trabajo'] = $this ->input->post('tipo_de_trabajo');
					$data['universidad_procedente'] = $this ->input->post('universidad_procedente');
					$data['experiencia_docente'] = $this ->input->post('experiencia_docente');
					$data['trabajos_anteriores'] = $this ->input->post('trabajos_anteriores');
					$data['nombre_archivo'] = $this ->input->post($file_name);
					$data['curriculum'] = $this ->input->post($img);
			
					if ($this->Modelo_profesores->update($data)) {
						$data = array('responce' => "success", 'message' => "¡Periodo actualizado!");
					} else {
						$data = array('responce' => "error", 'message' => "No actualizado");
					}
					}
				}  
				
					
				}
				
				
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}

	/* -------------------------------------------------------------------------- */
	/*                                Fetch Records                               */
	/* -------------------------------------------------------------------------- */

	public function verprofesor()
	{
		$posts = $this->Modelo_Profesores->obtenerprofesores();
		echo json_encode($posts);
	}




	public function verArchivo($id){
		$consulta = $this->Modelo_Profesores->getArchivoId($id);
		$archivo = $consulta['curriculum'];
		$img = $consulta['nombre_archivo'];
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=$img.pdf");
		print_r($archivo);

	}


	public function editarprofesor(){
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');
			if ($post = $this->Modelo_Profesores->single_entry($edit_id)) {
				$data = array('responce' => "success", "post" => $post);
			}else{
				$data = array('responce' => "error", "failed to fetch");
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}


	/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */

public function eliminarprofesores()
{
	if ($this->input->is_ajax_request()) {

		$del_id = $this->input->post('del_id');
		if ($this->Modelo_Profesores->delete_entry($del_id)) {
			$data = array('responce' => "success");
		} else {
			$data = array('responce' => "error", 'message' => "No se pudo eliminar...!");
		}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}



}  // Fin del controller
function updateTeamLogo() {
	global $server, $db, $dbUser, $dbKey;
  
	try {
	  $conn = new PDO("mysql:host=" . $server . ";dbname=" . $db, $dbUser, $dbKey);
	  $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
	  $file = $_FILES["teamLogo"]["tmp_name"];
  
	  if(!isset($file)) {
		echo "Please select an image to upload";
	  } else {
		$fileSize = getimagesize($_FILES["teamLogo"]["tmp_name"]);
  
		if ($fileSize) {
		  $img = file_get_contents($_FILES["teamLogo"]["tmp_name"]);
		  $sql = $conn -> prepare("UPDATE Team SET (teamID, teamLogo) VALUES (:teamID, :teamLogo) WHERE teamID=:teamID");
		  $sql -> bindValue(":teamID", $_POST["teamID"]);
		  $sql -> bindValue(":teamLogo", $img);
  
		  $result = $sql -> execute();
  
		  if ($result == null) {
			echo "Error uploading image";
		  } else {
			echo "Image uploaded";
		  }
		} else {
		  echo "The file to be uploaded is not an image";
		}
	  }
	}
  
	catch(PDOException $e) {
	  echo "An error occured: " . $e -> getMessage();
	}
  
	$conn = null;
  }
  
  if (isset($_POST["updateTeam"])) {
	updateTeamLogo();
  }