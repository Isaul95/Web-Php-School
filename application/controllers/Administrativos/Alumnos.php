<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

		 private $permisos;
	   public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
		  // $this->permisos = $this->backend_lib->control();
	 	 $this->load->model("Modelo_Alumnos");
	 }


	public function index(){

		$data  = array(
			'permisos' => $this->permisos,
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Administrativos/VistaAlumnos',$data);
		$this->load->view('layouts/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                               Insert Records                               */
	/* -------------------------------------------------------------------------- */

	public function insertaralumno(){

		if ($this->input->is_ajax_request()) {
			
			$this->form_validation->set_rules('numero_control', 'numero_control', 'required');
			$this->form_validation->set_rules('nombres', 'nombres', 'required');
			$this->form_validation->set_rules('apellido_paterno', 'apellido_paterno', 'required');
			$this->form_validation->set_rules('apellido_materno', 'apellido_materno', 'required');
			$this->form_validation->set_rules('direccion', 'direccion', 'required');
			$this->form_validation->set_rules('municipio_direccion', 'municipio_direccion', 'required');
			$this->form_validation->set_rules('estado_direccion', 'estado_direccion', 'required');
			$this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required');
			$this->form_validation->set_rules('fecha_inscripcion', 'fecha_inscripcion', 'required');
			$this->form_validation->set_rules('localidad', 'localidad', 'required');
			$this->form_validation->set_rules('municipio_localidad', 'estado_localidad', 'required');
			$this->form_validation->set_rules('estado_civil', 'estado_civil', 'required');
			$this->form_validation->set_rules('sexo', 'sexo', 'required');
			$this->form_validation->set_rules('tipo_escuela_nivel_medio_superior', 'tipo_escuela_nivel_medio_superior', 'required');
			$this->form_validation->set_rules('institucion', 'institucion', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('telefono', 'telefono', 'required');
			$this->form_validation->set_rules('facebook', 'facebook', 'required');
			$this->form_validation->set_rules('twitter', 'twitter', 'required');
			$this->form_validation->set_rules('instagram', 'instagram', 'required');
			/*$this->form_validation->set_rules('universidad_procedente', 'universidad_procedente', 'required');
			$this->form_validation->set_rules('experiencia_docente', 'experiencia_docente', 'required');
			*/

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$this->load->library('upload', $config);
                
				if (!$this->upload->do_upload("acta_nacimiento")&&!$this->upload->do_upload("certificado_bachillerato")&&
				!$this->upload->do_upload("curp")&&!$this->upload->do_upload("certificado_medico")) {
					$data = array('response' => "error", 'message' => $this->upload->display_errors());
				} else {
					//ACTA
	  $file_name = $_FILES['acta_nacimiento']['name'];
		$file_size = $_FILES['acta_nacimiento']['size'];
		$file_tmp = $_FILES['acta_nacimiento']['tmp_name'];
		$file_type = $_FILES['acta_nacimiento']['type'];

		$imagen_temporal = $file_tmp;
		$tipo = $file_type;

		$fp= fopen($imagen_temporal, 'r+b');
		$binario = fread($fp, filesize($imagen_temporal));
		fclose($fp);
/// CERTIFICADO
$file_name_certi = $_FILES['certificado_bachillerato']['name'];
		$file_size_certi = $_FILES['certificado_bachillerato']['size'];
		$file_tmp_certi = $_FILES['certificado_bachillerato']['tmp_name'];
		$file_type_certi = $_FILES['certificado_bachillerato']['type'];

		$imagen_temporal_certi = $file_tmp_certi;
		$tipo_certi = $file_type_certi;

		$fp_certi = fopen($imagen_temporal_certi, 'r+b');
		$binario_certi = fread($fp_certi, filesize($imagen_temporal_certi));
		fclose($fp_certi);
		//CURP
		$file_name_curp = $_FILES['curp']['name'];
		$file_size_curp = $_FILES['curp']['size'];
		$file_tmp_curp = $_FILES['curp']['tmp_name'];
		$file_type_curp = $_FILES['curp']['type'];

		$imagen_temporal_curp = $file_tmp_curp;
		$tipo_curp = $file_type_curp;

		$fp_curp = fopen($imagen_temporal_curp, 'r+b');
		$binario_curp = fread($fp_curp, filesize($imagen_temporal_curp));
		fclose($fp_curp);
		//CERTIFICADO MEDICO
		$file_name_certim= $_FILES['certificado_medico']['name'];
		$file_size_certim = $_FILES['certificado_medico']['size'];
		$file_tmp_certim = $_FILES['certificado_medico']['tmp_name'];
		$file_type_certim = $_FILES['certificado_medico']['type'];

		$imagen_temporal_certim = $file_tmp_certim;
		$tipo_certim = $file_type_certim;

		$fp_certim = fopen($imagen_temporal_certim, 'r+b');
		$binario_certim = fread($fp_certim, filesize($imagen_temporal_certim));
		fclose($fp_certim);

		$ajax_data = $this->input->post();
		$ajax_data['acta_nacimiento'] = $binario; // Documento pdf
		$ajax_data['nombre_acta'] = $this->upload->data('file_name'); // name file

		$ajax_data['certificado_bachillerato'] = $binario_certi; // Documento pdf
		$ajax_data['nombre_certificado_bachillerato'] = $file_name_certi;//$this->upload->data('file_name_certi'); // name file

		$ajax_data['curp'] = $binario_curp; // Documento pdf
		$ajax_data['nombre_curp'] = $file_name_curp;//$this->upload->data('file_name_curp'); // name file
		
		$ajax_data['certificado_medico'] = $binario_certim; // Documento pdf
		$ajax_data['nombre_certificado_medico'] = $file_name_certim;//$this->upload->data('file_name_certim'); // name file

					if ($this->Modelo_Alumnos->insert_entry($ajax_data)) {
						$data = array('response' => "success", 'message' => "Datos agregados correctamente...!");
					} else {
						$data = array('response' => "error", 'message' => "Error al agregar datos...!");
					}
				}
			}
			echo json_encode($data);
		} else {
			echo "No se permite este acceso directo...!!!";
		}

	}
	public function insertaralumnocomousuario(){

		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nombres', 'nombres', 'required');
			$this->form_validation->set_rules('apellidos', 'apellido_paterno', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('telefono', 'telefono', 'required');
			$this->form_validation->set_rules('username', 'facebook', 'required');
		
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} 
				 else {

	             	$ajax_data = $this->input->post();
					if ($this->Modelo_Alumnos->insert_entry_alumno_como_usuario($ajax_data)) {
						$data = array('response' => "success", 'message' => "Se agrega como usuario");
					} else {
						$data = array('response' => "error", 'message' => "Error al agregar datos...!");
					}
				}
			
			echo json_encode($data);
		} else {
			echo "No se permite este acceso directo...!!!";
		}

	}
	
	
	public function updatealumno(){
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
			
					if ($this->Modelo_Alumnos->update($data)) {
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

	public function veralumno()
	{
		$posts = $this->Modelo_Alumnos->obteneralumnos();
		echo json_encode($posts);
	}




	public function verArchivoalumno($id){
		$consulta = $this->Modelo_Alumnos->getArchivoId($id);
		$archivo = $consulta['curriculum'];
		$img = $consulta['nombre_archivo'];
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=$img.pdf");
		print_r($archivo);

	}


	public function editaralumno(){
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');
			if ($post = $this->Modelo_Alumnos->single_entry($edit_id)) {
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

public function eliminaralumno()
{
	if ($this->input->is_ajax_request()) {

		$del_id = $this->input->post('del_id');
		if ($this->Modelo_Alumnos->delete_entry($del_id)) {
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