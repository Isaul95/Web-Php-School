<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_DarAccesoAlumnos extends CI_Model { // INICIO DEL MODELO

  /* -------------------------------------------------------------------------- */
	/*                            INSERTAR BAUCHE TABLA                           */
	/* -------------------------------------------------------------------------- */
  public function insert_baucher($data){
          return $this->db->insert('alta_baucher_banco', $data);
      }

	/* -------------------------------------------------------------------------- */
	/*        METODO PARA HACER EL CONTEO DE LAS VENTAS, USERS, ETC..             */
	/* -------------------------------------------------------------------------- */
    public function rowcount($tabla){
        if ($tabla == "alta_baucher_banco") {
      // $this->db->select("COUNT(*)");
        // $this->db->from("alta_baucher_banco");
         // $this->db->where("estado", "cancelado"); /* SELECT SUM(`total`) FROM `venta` */
        }
      $resultados = $this->db->get($tabla);
      return $resultados->num_rows();

    }



// 1.- Se obtiene el nombre completo de la tabla de alumnos y el no control
// 2.- Se obt. id de la tabla de los baucher y la fecha en k se subio el baucher


// public function obtenerListaDeAlumnosConBaucherRegistrado(){
//    $this->db->select("CONCAT(alu.nombres, ' ', alu.apellido_paterno, ' ', alu.apellido_materno) As nombre_completo, ban.id_alta_baucher_banco, ban.fecha_registro, ban.nombre_archivo, alu.numero_control, , hab.estatus_acceso");
//    $this->db->from("alumnos alu");
//    $this->db->join("alta_baucher_banco ban","alu.numero_control = ban.numero_control");
//    $this->db->join("habilitar_accesoalumnos hab","alu.numero_control = hab.numero_control",'LEFT');
//
//     $resultados = $this->db->get();
//     return $resultados->result();
// }


  public function obtenerListaDeAlumnosConBaucherRegistrado(){
     $this->db->select("CONCAT(alu.nombres, ' ', alu.apellido_paterno, ' ', alu.apellido_materno) As nombre_completo, ban.id_alta_baucher_banco, ban.fecha_registro, alu.numero_control, alu.estatus, car.carrera_descripcion");
     $this->db->from("alumnos alu");
     $this->db->join("alta_baucher_banco ban","alu.numero_control = ban.numero_control");
     $this->db->join("detalles det ","alu.numero_control = det.alumno");
     $this->db->join("carrera car","car.id_carrera = det.carrera");

      $resultados = $this->db->get();
      return $resultados->result();
  }


// Se recupera el baucher k se dio de alta para mostrarselo al ADMIN para corroborar k si sea
  public function getBaucherId($numero_control){
    $query = $this->db->query("select * FROM alta_baucher_banco where numero_control=?", array($numero_control));
    return $query->row_array();
    }

    //    ===========================   here star  ==========================================
    public function update($numero_control, $data){
      $this->db->where("numero_control",$numero_control);
       return $this->db->update("alumnos", $data);
      }

      // public function update($numero_control){
      //     return $this->db->update('alumnos', $numero_control, array('numero_control' => $numero_control['numero_control']));
      // }

//    ===========================   here star  ==========================================






    public function insert_entry($data){

              return $this->db->insert('datos_recibo', $data);
          }

          public function getTipoDePagos(){
        		$resultados = $this->db->get("tipos_de_pagos");
        		return $resultados->result();
        	}



  } // FIN / CIERRE DEL MODELO
