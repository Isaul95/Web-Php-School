<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_Profesores extends CI_Model { // INICIO DEL MODELO


      	/* -------------------------------------------------------------------------- */
      	/*                                Fetch Records                               */
      	/* -------------------------------------------------------------------------- */


      public function get_entries()
        {
            $query = $this->db->get('cod');
            return $query->result();
        }


        public function obtenerprofesores(){
                $this->db->select("id_profesores, nombres, edad, sexo , direccion,ciudad_radicando,nacionalidad,telefono_celular,
                correo,estado_civil,nivel_de_estudios,titulado,cedula,ocupacion,tipo_de_trabajo,universidad_procedente,experiencia_docente,trabajos_anteriores");
            $this->db->from("profesores");
            $resultados = $this->db->get();
            return $resultados->result();
            }




// ***************************  INICIO FUNCTION PARA INSRTAR  ************************************
public function insert_entry($data)
    {
        return $this->db->insert('profesores', $data);
    }

    // public function insertarDoc($data){  // SI INSERTa bien
    //   return $this->db->insert("cod", $data);
    //     // return $this->db->insert_id();
    //   }



    // public function getArchivoId($id){  //DE ESTA FORMA SOLO SE REGRESA EL PURO ARCHIVOI COMO BIANRIO
    //   $query = $this->db->query("select archivo FROM cod where id=?", array($id));
    //   $q =  $query->row_array();
    //    return $q['archivo'];
    //
    //   }


    public function getArchivoId($id){
      $query = $this->db->query("select * FROM profesores where id_profesores=?", array($id));
      return $query->row_array();
      }



      public function update($data){
        return $this->db->update('profesores', $data, array('id_profesores' => $data['id_profesores']));
    }


    
      public function delete_entry($id)
          {
              return $this->db->delete('profesores', array('id_profesores' => $id));
          }

          public function single_entry($id)
          {
              $this->db->select('id_profesores, nombres, edad, sexo , direccion,ciudad_radicando,nacionalidad,telefono_celular,
              correo,estado_civil,nivel_de_estudios,titulado,cedula,ocupacion,tipo_de_trabajo,universidad_procedente,experiencia_docente,trabajos_anteriores');
              $this->db->from('profesores');
              $this->db->where('id_profesores', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }



  } // FIN / CIERRE DEL MODELO
