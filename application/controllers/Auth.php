<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	 public function __construct(){ // crear constructor
	 	 parent::__construct();   // hereda
	 	 $this->load->model("Usuarios_model");
	 }
	
	       public function index(){ // LOGIN... si el usuario esta logueado ya no permitirle salirse regresar ala pagina anterior, si no forzarlo a k primero cierre sesionn
	       	     if ($this->session->userdata("login")) {
	       	     	  redirect(base_url()."dashboard");
	       	     }
	       	     else{
	       	     	$this->load->view('admin/login');
	       	     }   
	         }


	public function login(){  // crear la funcion de login
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		 $res = $this->Usuarios_model->login($username, $password);

		 if (!$res) { // evaluar el varlor encontrando de la tabla
		 	$this->session->set_flashdata("error", "Usuario y/o Contraseña incorrectos"); 
	          // HACIENDO EL ALERT PARA DATOS INCORRECTOS
		 	redirect(base_url());
		 }
		  else{    /*AKI ACIENDO CONSULTAS DESDE LA BD CON LOS DATOS SOLICITADOS*/
		  	$data = array(
		  		'id_user' => $res ->iD_user,
		  		  'nombres' => $res ->nombre, /*NECESITO ESTE PARAMETRO PARA TRAER DE LA BD EL NAME DEL USUARIO E IMPRIMIRLO UNA VEZ ACCEDIDO AL SISTEMA */
		  		'usuarios' => $res ->usuario, /* SON TABLAS DE MI BD*/
		  		'password' => $res ->password,
		  		 'login' => TRUE
		  		 );
		  	  $this->session->set_userdata($data);
		  	 redirect(base_url()."dashboard");
		  }
	}
            public function logout(){
            	$this->session->sess_destroy();
            	 redirect(base_url());
            }

}
