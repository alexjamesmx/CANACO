<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Requerimiento_model extends CI_Model
{
    public function create($entry, $return_id = false)
    {
        try {
            $this->db->insert('requerimientos', $entry);
            return $return_id ? $this->db->insert_id() : true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function estoy_completo($id)
    {
        $this->db
            ->from('usuarios')
            ->where('usuario_id', $id);
        $query = $this->db->get();
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function new_nomatch($data, $keyword)
    {
        try {

            $existe = $this->db->query(
                "SELECT * FROM nomatch WHERE status='1' and keyword='" . $keyword . "' "
            );
            if ($existe->num_rows() !== 0) {

                return $this->db->query("UPDATE nomatch 
                SET veces_buscado = veces_buscado + 1 
                WHERE usuario_id = '" . $data['usuario_id'] . "'");
            } else {
                $this->db->insert('nomatch', $data);
                return $this->db->insert_id();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function new_nomatch_detalle($data)
    {
        try {
            $query = $this->db->get_where('nomatch_detalle', array('busca' => $data['busca']));
            if ($query->num_rows() == 0) {
                $this->db->insert('nomatch_detalle', $data);
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function is_nomatch($data, $keyword)
    {
        try {
            $this->db
                ->where('keyword', $keyword)
                ->update('nomatch', $data);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function get_nomatch($id)
    {
        $query = $this->db->query(
            "SELECT * FROM nomatch WHERE status='1' AND  usuario_id NOT IN ('" . $id . "') ORDER BY date_nomatch desc limit 10"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }


    public function traer_coti($id)
    {
        $this->db->where('opneg_id', $id);
        $query = $this->db->get('oportunidades_negocio');
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function is_requerimiento($usuario_id, $busqueda)
    {
        try {
            $this->db->where('usuario_id', $usuario_id);
            $this->db->where('busq_nec', $busqueda);

            $query = $this->db->get('keywords_comercio');

            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_mis_requerimientos($usuario_id)
    {
        try {
            $this->db->where('usuario_id', $usuario_id);
            $query = $this->db->get('requerimientos');
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //la funcion get_interesados es igual a get_mis_requerimientos, pero trae la cantidad de personas interesadas en ese requerimiento
    public function get_interesados($usuario_id)
    {
        $query = $this->db->query(
            "SELECT * , 
            req_id AS id,
            (SELECT COUNT(*) FROM estatus_req WHERE requerimiento_id=id AND estatus='18') AS interesados
            FROM requerimientos 
            JOIN evaluacion_req  ON evaluacion_req.id_req=requerimientos.req_id 
            WHERE  requerimientos.usuario_id='" .
                $usuario_id .
                "'  order by requerimientos.req_id desc"
        );
        if ($query->num_rows() === 0) {
            $query = $this->db->query(
                "SELECT * , 
                req_id AS id, 
                (SELECT COUNT(*) FROM estatus_req WHERE requerimiento_id=id AND estatus='18')AS interesados 
                FROM requerimientos  
                WHERE estatus is NULL and usuario_id='" .
                    $usuario_id .
                    "' order by requerimientos.req_id desc"
            );

            return $query->num_rows() >= 1 ? $query->result() : null;
        }
        return $query->result();

        // return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function get_interesados_activos($usuario_id)
    {
        $query = $this->db->query(
            "SELECT * , 
            req_id AS id, 
            (SELECT COUNT(*) FROM estatus_req WHERE requerimiento_id=id AND estatus='18')AS interesados 
            FROM requerimientos  
            WHERE estatus is NULL and usuario_id='" .
                $usuario_id .
                "' order by requerimientos.req_id desc"
        );

        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    public function get_myreq_number_a($id)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos WHERE estatus is NULL  AND  usuario_id='" .
                $id .
                "' order by requerimientos.fecha_req ASC "
        );
        return $query->num_rows();
    }
    public function get_myreq_number($id)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos WHERE   usuario_id='" . $id . "' order by requerimientos.fecha_req DESC"
        );
        return $query->num_rows();
    }

    public function get_lista_interesados($req_id)
    {
        $query = $this->db->query(
            "SELECT *,comercios.usuario_id AS miid FROM estatus_req,oportunidades_negocio,comercios, usuarios, requerimientos WHERE oportunidades_negocio.requerimiento_id='" .
                $req_id .
                "' and estatus_req.estatus='18' AND oportunidades_negocio.opneg_id=estatus_req.opnegocio_id and  requerimientos.req_id=oportunidades_negocio.requerimiento_id and oportunidades_negocio.comercio_id=comercios.negocio_id AND comercios.usuario_id=usuarios.usuario_id"
        );

        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function get_lista_detalles($req_id)
    {
        $query = $this->db->query(
            "SELECT * FROM detalles_req, comercios WHERE detalles_req.req_id='" .
                $req_id .
                "' and detalles_req.id_cliente=comercios.negocio_id ORDER BY fecha_detalle desc"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function cancelar_requerimiento($req_id, $estatus, $comentario)
    {
        try {
            $query = $this->db->query(
                "update requerimientos set comentarios_req='" .
                    $comentario .
                    "' where req_id='" .
                    $req_id .
                    "'"
            );
            $query2 = $this->db->query(
                "update requerimientos set estatus='" .
                    $estatus .
                    "' where req_id='" .
                    $req_id .
                    "'"
            );
            $query3 = $this->db->query(
                "update estatus_req set estatus='" .
                    $estatus .
                    "' where requerimiento_id='" .
                    $req_id .
                    "'"
            );
            $fecha = date("YmdHis");

            $query4 = $this->db->query(
                "update requerimientos set fecha_fin_req='" .
                    $fecha .
                    "' where req_id='" .
                    $req_id .
                    "'"
            );

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_un_requerimiento($req_id)
    {
        try {
            $this->db->where('req_id', $req_id);
            $query = $this->db->get('requerimientos');
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function cuantos_aplicaron($req_id)
    {
        try {
            $this->db->where('requerimiento_id', $req_id);
            $query = $this->db->get('estatus_req');
            return $query->num_rows();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_requerimiento_publico()
    {
        try {
            $this->db->from('requerimientos');
            $this->db->join(
                'usuarios',
                'usuarios.usuario_id=requerimientos.usuario_id'
            );
            $this->db->join(
                'comercios',
                'usuarios.usuario_id=comercios.usuario_id'
            );
            $this->db->where('notificados_req', 3);

            $this->db->order_by('fecha_req', 'desc');
            $query = $this->db->get();
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_requerimiento_publico_filter($search)
    {
        try {
            $this->db->from('requerimientos');
            $this->db->join(
                'usuarios',
                'usuarios.usuario_id=requerimientos.usuario_id'
            );
            $this->db->join(
                'comercios',
                'usuarios.usuario_id=comercios.usuario_id'
            );

            $this->db->where('notificados_req', 3);
            $this->db->like('busq_nec', $search);
            $this->db->order_by('fecha_req', 'desc');
            $query = $this->db->get();
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_info($id)
    {
        $query = $this->db->query(
            "SELECT * FROM USUARIOS,COMERCIOS WHERE usuarios.usuario_id='" .
                $id .
                "' "
        );
        return $query->result();
    }

    public function get_detalles_req($req_id)
    {
        $query = $this->db->query(
            "SELECT * FROM detalles_req WHERE req_id='" . $req_id . "' "
        );

        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    // public function get_detalles_req_personal($req_id, $id_clinte)
    // {
    //     $query = $this->db->query(
    //         "SELECT * FROM detalles_req WHERE req_id='" .
    //             $req_id .
    //             "' and id_cliente='" .
    //             $id_cliente .
    //             "' "
    //     );

    //     return $query->num_rows() >= 1 ? $query->result() : null;
    // }

    public function actualiza_elegido($data, $id)
    {
        try {
            $this->db->where('req_id', $id);
            $this->db->update('requerimientos', $data);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualiza_opneg($id)
    {
        try {
            $data = ['seleccionado' => 1];
            $this->db->where('opneg_id', $id);
            $this->db->update('oportunidades_negocio', $data);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function clear_opneg($id)
    {
        try {
            $data = ['seleccionado' => 0];
            $this->db->where('requerimiento_id', $id);
            $this->db->update('oportunidades_negocio', $data);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function es_elegido($id)
    {
        try {
            $query = $this->db->query(
                'SELECT * FROM requerimientos WHERE req_id="' . $id . '"'
            );
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function reqresueltos($id)
    {
        $query = $this->db->query(" SELECT * FROM requerimientos WHERE requerimientos.usuario_elegido = '" . $id . "'");
        return $query->num_rows();
    }



    public function reqigno()
    {

        $query = $this->db->query(
            'SELECT * FROM requerimientos inner JOIN oportunidades_negocio ON oportunidades_negocio.requerimiento_id=requerimientos.req_id INNER JOIN estatus_req ON estatus_req.opnegocio_id = oportunidades_negocio.opneg_id INNER JOIN usuarios ON usuarios.usuario_id= requerimientos.usuario_id INNER JOIN comercios ON comercios.usuario_id=usuarios.usuario_id WHERE fecha_req < NOW() - INTERVAL 72 HOUR AND estatus_req.estatus=17'
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    public function delete_requerimiento($data)
    {
        return
            $this->db
            ->where('req_id', $data['req_id'])
            ->set($data)
            ->update('requerimientos');
    }
    public function get_nomatch_detalle($id, $nomatch_id)
    {
        return $this->db
            ->where('usuario_id', $id)
            ->where('nomatch_id', $nomatch_id)
            ->get('nomatch_detalle')->result_array()[0];
    }
    public function get_nomatch_profile($id)
    {
        return $this->db
            ->where('usuario_id', $id)
            ->get('comercios')->result_array()[0];
    }
}
