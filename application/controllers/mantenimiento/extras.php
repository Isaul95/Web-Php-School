<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class extras extends CI_Controller {

	   public function __construct(){
	 	 parent::__construct();
	 	 $this->load->model("Extras_model");
	 }
/* =========================== CONTROLADOR -- extrasS ===================================*/
	
	public function index(){
		  $data = array('extras' => $this->Extras_model->getextras()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/extras/list', $data);
		$this->load->view('layouts/footer'); 
	}

	 public function agregar(){
	 	   

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/extras/add');
		$this->load->view('layouts/footer'); 
	}

	public function store(){

		$Nombre_de_Extras = $this->input->post("nombre");
		$Precio_de_Extras = $this->input->post("precio");
		$Descripcion_de_Extras = $this->input->post("descripcion");
		//$Fecha_caducidad = $this->input->post("caducidad");
	

   $this->form_validation->set_rules("nombre","Nombre del Extra","required|is_unique[extras.nombre]");
   $this->form_validation->set_rules("precio", "Precio del extra", "required");
   $this->form_validation->set_rules("descripcion", "Descripcion del Extra", "required"); 
      
      if ($this->form_validation->run()) {

      	 $data = array(
      	 	'nombre' => $Nombre_de_Extras, 
			'precio' => $Precio_de_Extras, 
			'descripcion' => $Descripcion_de_Extras,
			
			//'Fecha_caducidad' => $Fecha_caducidad,
		);
		    if ($this->Extras_model->guardar($data)) {
		    	redirect(base_url()."mantenimiento/extras");
		    }  else{
		    	$this->session->set_flashdata("error", " ERROR: NO SE GUARDARON LOS DATOS");
		    	  redirect(base_url()."mantenimiento/extras/add");
		       }
        }
           else{
           	   $this->agregar();
           }  
	}  

	  public function edit($id_extra){

	 	$data = array(
			'extras' => $this->Extras_model->getBebida($id_extra) 
		);

	 	$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/extras/editex', $data);
		$this->load->view('layouts/footer'); 
	 }

	 public function update(){

	 	$idProductos = $this->input->post("idProductos");
	 	$Nombre_de_Extras = $this->input->post("nombre");
	 	$Precio_de_Extras = $this->input->post("precio");
		$Descripcion_de_Extras = $this->input->post("descripcion");
         
        $data = array(
        	'nombre' => $Nombre_de_Extras, 
			'precio' => $Precio_de_Extras, 
			'descripcion' => $Descripcion_de_Extras,
		);

		if ($this->Extras_model->update($idProductos, $data)) {
			  redirect(base_url()."mantenimiento/extras");
		} else{
                $this->session->set_flashdata("error", " ERROR: NO SE ACTUALIZARÓN LOS DATOS");
		    	  redirect(base_url()."mantenimiento/extras/editex".$idProductos);
		}
	 }

	 public function delete($id_extra){
	 	$data = array(
	 		'id_extra' => $id_extra, 
	 	);

	 	$this->Extras_model->delete($data);
			redirect(base_url()."mantenimiento/extras");
  // https://www.youtube.com/watch?v=3mdQdjc-dhA&list=PLsk-U_4GoSVMz3OzYGN7ZJWOm-rx2FvwS&index=14   --------ELIMINAR
	 }

	 public function edit2($id_Productos){

	 	$data = array(
			'productos' => $this->Productos_model->getProducto($id_Productos) 
		);

	 	$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/edit2', $data);
		$this->load->view('layouts/footer'); 
	 }
}









