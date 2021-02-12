<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_HacerHorarioProfesor extends CI_Model { // INICIO DEL MODELO


      	/* -------------------------------------------------------------------------- */
      	/*                                Fetch Records                               */
        /* -------------------------------------------------------------------------- */
        public function delete_entry($profesor,$materia,$ciclo)
{
    return $this->db->delete('horarios_profesor', array('profesor' => $profesor,'materia' => $materia,'ciclo' => $ciclo));
}
        public function horario_asignado_al_profesor($profesor,$ciclo){
          $this->db->distinct();
          $this->db->select("horarios_profesor.profesor as profesor,
          horarios_profesor.materia as materia,
          horarios_profesor.semestre as semestre,
          horarios_profesor.ciclo as ciclo,
          materias.nombre_materia as nombre_materia,
          horarios_profesor.salon as salon,
          horarios_profesor.inicio as inicio,
          horarios_profesor.fin as fin ,horarios_profesor.ex_final as ex_final,
          concat
          (horarios_profesor.horario_inicio,' - ',
          horarios_profesor.horario_fin) as horario
          ");
          $this->db->from("horarios_profesor");
          $this->db->join("materias","materias.id_materia = horarios_profesor.materia");
          $this->db->where("horarios_profesor.profesor", $profesor);
          $this->db->where("horarios_profesor.ciclo", $ciclo);
          $resultados = $this->db->get();
          return $resultados->result();
          }
        public function insert_entry($data)
        {
            return $this->db->insert('horarios_profesor', $data);
        }


          public function insert_masvia_de_alumnos($opcion,$carrera,$semestre,$ciclo){

          return $this->db->query('insert into calificaciones (detalle, materia, profesor, ciclo, horario)
select de.id_detalle, hp.materia, hp.profesor, hp.ciclo, concat(hp.horario_inicio,'-',hp.horario_fin) from detalles de
         inner join carrera c on c.id_carrera = de.carrera
         inner join opciones op on op.id_opcion = de.opcion
         inner join horarios_profesor hp on hp.licenciatura = c.id_carrera
         inner join materias ma on ma.id_materia = hp.materia
         inner join profesores p on hp.profesor = p.id_profesores
         where hp.opcion_estudio =? and hp.licenciatura=? and hp.semestre=? and hp.ciclo =?',$opcion,$carrera,$semestre,$ciclo);
          }


        public function sepuede_agregar_materia($opcion_estudio,$semestre,$licenciatura,$profesor,$ciclo,$materia) {

          $this->db->select('*');
            $this->db->from('horarios_profesor');
            $this->db->where('opcion_estudio', $opcion_estudio);
            $this->db->where('semestre', $semestre);
            $this->db->where('licenciatura', $licenciatura);
            $this->db->where('profesor', $profesor);
            $this->db->where('ciclo', $ciclo);
            $this->db->where('materia', $materia);
            $query = $this->db->get();
            if (count($query->result()) > 0) {
                return $query->row();
            }
        }

        public function obtenermaterias($semestre,$especialidad){
            $this->db->distinct();
            $this->db->select("id_materia,nombre_materia");
            $this->db->from("materias");
            $this->db->where("semestre", $semestre);
            $this->db->where("especialidad", $especialidad);
            $resultados = $this->db->get();
            return $resultados->result();
            }
            public function obtenercarreras(){
              $this->db->distinct();
              $this->db->select("id_carrera,carrera_descripcion");
              $this->db->from("carrera");
              $resultados = $this->db->get();
              return $resultados->result();
              }
              public function obteneropciones(){
                $this->db->distinct();
                $this->db->select("id_opcion,descripcion");
                $this->db->from("opciones");
                $resultados = $this->db->get();
                return $resultados->result();
                }
                public function obtenerprofesores(){
                  $this->db->distinct();
                  $this->db->select("id_profesores,nombres");
                  $this->db->from("profesores");
                  $resultados = $this->db->get();
                  return $resultados->result();
                  }
                  public function obtenersemestres(){
                    $this->db->distinct();
                    $this->db->select("semestre,nombre");
                    $this->db->from("semestres");
                    $resultados = $this->db->get();
                    return $resultados->result();
                    }

            //select alumnos.numero_control as numero_control, concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as alumno,
          //detalles.cuatrimestre as cuatrimestre, carrera.carrera_descripcion as carrera_descripcion,
            //calificaciones.calificacion, calificaciones.tiempo_extension
            //from alumnos
            //inner join detalles on alumnos.numero_control = detalles.alumno
            //inner join carrera on detalles.carrera = carrera.id_carrera
             //inner join calificaciones on detalles.id_detalle = calificaciones.detalle
             //where estatus_alumno_activo = 1 and calificaciones.materia = 189

            public function alumnos_asignados_a_la_materia_del_profesor($materia){
                $this->db->distinct();
                $this->db->select("detalles.id_detalle as id_detalle,alumnos.numero_control as numero_control,
                concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as alumno,
                detalles.cuatrimestre as cuatrimestre, carrera.carrera_descripcion as carrera_descripcion,
                calificaciones.calificacion as calificacion, calificaciones.tiempo_extension as tiempo_extension");
                $this->db->from("alumnos");
                $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
                $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
                $this->db->join("calificaciones","detalles.id_detalle = calificaciones.detalle");
                $this->db->where("estatus_alumno_activo", "1");
                $this->db->where("materia", $materia);
                $resultados = $this->db->get();
                return $resultados->result();
                }

                public function alumnos_asignados_a_la_carrera_y_opcion_administrativo($carrera,$opcion){
                  $this->db->distinct();
                  $this->db->select("detalles.id_detalle as id_detalle,alumnos.numero_control as numero_control,
                  concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as alumno,
                  detalles.cuatrimestre as cuatrimestre, carrera.carrera_descripcion as carrera_descripcion");
                  $this->db->from("alumnos");
                  $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
                  $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
                  $this->db->where("estatus_alumno_activo", "1");
                  $this->db->where("detalles.carrera", $carrera);
                  $this->db->where("detalles.opcion", $opcion);
                  $resultados = $this->db->get();
                  return $resultados->result();
                  }
                  public function updatehorario($materia,$ciclo,$semestre,$profesor,$data){
                    return $this->db->update('horarios_profesor', $data, array('materia' => $materia,'ciclo'=> $ciclo,'semestre'=> $semestre,'profesor'=> $profesor));
                }
                public function single_entry($profesor,$materia,$ciclo)
                {
                  $this->db->select('profesores.nombres as nombres,
                  materias.nombre_materia as nombre_materia,
                  horarios_profesor.salon as salon,
                  horarios_profesor.inicio as inicio,
                  horarios_profesor.fin as fin,
                  horarios_profesor.ex_final as ex_final,
                  horarios_profesor.horario_inicio as horario_inicio,
                  horarios_profesor.horario_fin as horario_fin,
                  horarios_profesor.ciclo as ciclo,
                  horarios_profesor.semestre as semestre');
                    $this->db->from('horarios_profesor');
                    $this->db->join("materias","materias.id_materia = horarios_profesor.materia");
                    $this->db->join("profesores","profesores.id_profesores = horarios_profesor.profesor");
                    $this->db->where('horarios_profesor.profesor', $profesor);
                    $this->db->where('horarios_profesor.materia', $materia);
                    $this->db->where('horarios_profesor.ciclo', $ciclo);

                    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
                }
                public function sepuede_agregar_horario_materia($materia,$ciclo,$semestre,$horario)
                {
                  $this->db->select('*');
                    $this->db->from('horarios_profesor');
                    $this->db->where('ciclo', $ciclo);
                    $this->db->where('materia', $materia);
                    $this->db->where('semestre', $semestre);
                    $this->db->where('horario', $horario);
                    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
                }
                public function materias_iguales($materia,$ciclo,$semestre,$profesor,$tabla,$horario_inicio,$horario_fin){
                  if ($tabla == "horarios_profesor") {
                      //$this->db->select("SUM(total)");
                        //$this->db->from("venta");
                         $this->db->where("materia", $materia); /* SELECT SUM(`total`) FROM `venta` */
                         $this->db->where("ciclo", $ciclo);
                         $this->db->where("semestre", $semestre);
                         $this->db->where("horario_inicio", $horario_inicio);
                         $this->db->where("horario_fin", $horario_fin);
                         $this->db->where_not_in("profesor", $profesor);
                        }
                      $resultados = $this->db->get($tabla);
                      return $resultados->num_rows();
              }
              public function horarios_iguales($ciclo,$semestre,$tabla,$horario_inicio,$horario_fin){
                if ($tabla == "horarios_profesor") {
                    //$this->db->select("SUM(total)");
                      //$this->db->from("venta");
                       $this->db->where("ciclo", $ciclo);
                       $this->db->where("semestre", $semestre);
                       $this->db->where("horario_inicio", $horario_inicio);
                       $this->db->where("horario_fin", $horario_fin);
                       }
                    $resultados = $this->db->get($tabla);
                    return $resultados->num_rows();
            }

// ***************************  INICIO FUNCTION PARA INSRTAR  ************************************



      public function update($numero_control, $data){
        return $this->db->update('materias', $data, array('id_materia' => $numero_control));
    }



  } // FIN / CIERRE DEL MODELO
