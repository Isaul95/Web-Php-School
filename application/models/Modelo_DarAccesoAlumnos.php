<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_DarAccesoAlumnos extends CI_Model { // INICIO DEL MODELO


  // ***************************  INSERTAR BAUCHE TABLA **********************
  public function insert_baucher($data){

          return $this->db->insert('alta_baucher_banco', $data);
      }


	/* -------------------------------------------------------------------------- */
	/*                              LISRA DE Alumnos                              */
	/* -------------------------------------------------------------------------- */
      //
      // public function get_entries()
      //   {
      //       $query = $this->db->get('cod');
      //       return $query->result();
      //   }



    // public function obteneridnull($mesa){
    //
    //     $this->db->select(" CONCAT(alu.nombres, ' ', alu.apellido_paterno, ' ', alu.apellido_materno) As Nombre_Completo, ban.nombre_archivo, alu.numero_control");
    //     $this->db->from("alumnos alu");
    //      $this->db->join("alta_baucher_banco ban","alu.numero_control = ban.numero_control");
    //
    //     $resultados = $this->db->get();
    //     return $resultados->row_array();
    // }

//  SELECT  CONCAT(alu.nombres, ' ', alu.apellido_paterno, ' ', alu.apellido_materno) As
//  Nombre_Completo, ban.nombre_archivo, alu.numero_control
//  FROM alumnos alu
//  INNER JOIN alta_baucher_banco ban ON alu.numero_control = ban.numero_control











    //
    // public function getArchivoId($id){
    //   $query = $this->db->query("select * FROM cod where id=?", array($id));
    //   return $query->row_array();
    //   }




    /*=====  METODO PARA HACER EL CONTEO DE LAS VENTAS, USERS, ETC..  =====*/
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

  public function obtenerListaDeAlumnosConBaucherRegistrado(){
     $this->db->select("CONCAT(alu.nombres, ' ', alu.apellido_paterno, ' ', alu.apellido_materno) As nombre_completo, ban.id_alta_baucher_banco, ban.fecha_registro, ban.nombre_archivo, alu.numero_control, , hab.estatus_acceso");
     $this->db->from("alumnos alu");
     $this->db->join("alta_baucher_banco ban","alu.numero_control = ban.numero_control");
     $this->db->join("habilitar_accesoalumnos hab","alu.numero_control = hab.numero_control",'LEFT');

      $resultados = $this->db->get();
      return $resultados->result();
  }


// Se recupera el baucher k se dio de alta para mostrarselo al ADMIN para corroborar k si sea
  public function getBaucherId($id_alta_baucher_banco){
    $query = $this->db->query("select * FROM alta_baucher_banco where id_alta_baucher_banco=?", array($id_alta_baucher_banco));
    return $query->row_array();
    }



    public function insert_entry($data){

              return $this->db->insert('habilitar_accesoalumnos', $data);
          }

          public function getTipoDePagos(){
        		$resultados = $this->db->get("tipos_de_pagos");
        		return $resultados->result();
        	}



  } // FIN / CIERRE DEL MODELO
