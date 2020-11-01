<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_RegistroPago extends CI_Model {

    public function getRegistroPago(){
        $this->db->select("id_registropago, alumno_nombre_completo, numero_control, carrera,semestre,fecha_registro");
    $this->db->from("finan_registro_de_pago");
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->result();
    }

    public function guardar($data){
          return $this->db->insert("categoria", $data);
       }

  /*   ======================  EDITAR  =========================  */
       public function getComida($id_comida){
             $this->db->where("id_comida",$id_comida);
             $resultado = $this->db->get("categoria");
             return $resultado->row();
        }
            public function update($id_comida, $data){
            $this->db->where("id_comida",$id_comida);
             return $this->db->update("categoria", $data);
        }

  public function delete($data){
           // $this->db->where("id_Productos",$id_Productos);
             return $this->db->delete("categoria", $data);

        }




}
