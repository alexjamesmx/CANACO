<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reg_user extends CI_Model
{
    public function create_comerce($data)
    {
        try {
            $this->db->insert('comercios', $data);
            $archivos_comercio['negocio_id'] = $this->db->insert_id();
            $this->db->insert('archivos_comercio', $archivos_comercio);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update_opnegocio($req_id, $estatus)
    {

        $this->db->set('estatus', $estatus);
        $this->db->where('req_id', $req_id);
        return $this->db->update('requerimientos');
    }

    public function update_status_req($op, $req_id, $estatus)
    {

        $this->db->set('estatus', $estatus);
        $this->db->where('requerimiento_id 	', $req_id);
        $this->db->where('opnegocio_id', $op);
        return $this->db->update('estatus_req');
    }
    public function create($data, $return_id)
    {
        try {
            $this->db->insert('usuarios', $data);
            $return_id = $this->db->insert_id();
            return $return_id;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function validar($usuario_id)
    {
        try {
            $q = $this->db
                ->set('validado', 1)
                ->where('usuario_id', $usuario_id)
                ->update('usuarios');
            return $q;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function get_name($id)
    {
        $query = $this->db->query(
            "SELECT * FROM usuarios WHERE usuario_id='" . $id . "' "
        );
        return $query->result_array();
    }
    public function get_comercio_data_by_userid($id)
    {
        $query = $this->db->query(
            "SELECT * FROM comercios WHERE usuario_id='" . $id . "' "
        );
        return $query->result_array()[0];
    }
    public function get_user_through_email($email_auth)
    {
        $query = $this->db->query(
            "SELECT * FROM usuarios WHERE email_auth='" . $email_auth . "' "
        );
        return $query->result_array();
    }
    public function get_name2($id)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, usuarios WHERE req_id='" . $id . "' and requerimientos.usuario_id=usuarios.usuario_id"
        );
        return $query->result();
    }
    public function check_mail($mail)
    {
        $query = $this->db->query(
            "SELECT * FROM usuarios WHERE email_auth='" . $mail . "' "
        );
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
    public function get_keyword_by_search_comercio($search_kw, $comercio_id)
    {
        try {
            $this->db->like('keyword', $search_kw);
            $this->db->where('comercio_id', $comercio_id);

            $query = $this->db->get('keywords_comercio');

            return $query->num_rows() > 0 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function traer_coti($id)
    {
        $this->db->where('opneg_id', $id);
        $query = $this->db->get('oportunidades_negocio');
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function get_list_users_by_keywords($search_kw)
    {
        try {
            $this->db->select('keywords_comercio.comercio_id');
            $this->db->select('tipoactividad_id');
            $this->db->select('tipo_actividad');
            $this->db->select('actividad');

            $this->db->select('tipo_transaccion');
            $this->db->select('negocio_logo');
            $this->db->select('nombre');
            $this->db->select('apellido1');
            $this->db->select('apellido2');
            $this->db->select('email_auth');
            $this->db->select('telefono_auth');

            $this->db->select('comercios.usuario_id');
            $this->db->select('negocio_nombre');
            $this->db->select('negocio_correo');
            $this->db->select('negocio_persona');
            $this->db->select('negocio_vent_whatsp');
            $this->db->select('negocio_vent_correo');
            $this->db->select('negocio_razon');
            $this->db->select('negocio_comp_correo');
            $this->db->select('negocio_comp_nombre');
            $this->db->select('afiliado_canaco');
            $this->db->select('negocio_calif');
            $this->db->select('negocio_rfc');
            $this->db->distinct();
            $this->db->like('keyword', $search_kw);
            $this->db->where('usuarios.estatus_id', '3');

            $this->db->distinct();
            $this->db->join('tipo_actividad', 'keywords_comercio.tipoactividad_id = tipo_actividad.tactividad_id');
            $this->db->join('actividad', 'tipo_actividad.actividad_id = actividad.actividad_id');
            $this->db->join('comercios', 'keywords_comercio.comercio_id = comercios.negocio_id');
            $this->db->join('usuarios', 'usuarios.usuario_id = comercios.usuario_id');

            $query = $this->db->get('keywords_comercio');

            return ($query->num_rows() >= 1) ? $query->result() : NULL;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function get_usuarios_by_keyword($search_kw)
    {
        try {
            $this->db->select('keywords_comercio.comercio_id');
            $this->db->select('tipoactividad_id');
            $this->db->select('tipo_actividad');
            $this->db->select('actividad');

            $this->db->select('tipo_transaccion');
            $this->db->select('negocio_logo');
            $this->db->select('nombre');
            $this->db->select('apellido1');
            $this->db->select('apellido2');
            $this->db->select('email_auth');
            $this->db->select('telefono_auth');

            $this->db->select('comercios.usuario_id');
            $this->db->select('negocio_nombre');
            $this->db->select('negocio_correo');
            $this->db->select('negocio_persona');
            $this->db->select('negocio_razon');
            $this->db->select('negocio_comp_correo');
            $this->db->select('negocio_comp_nombre');
            $this->db->select('afiliado_canaco');
            $this->db->select('negocio_calif');
            $this->db->select('negocio_rfc');
            $this->db->distinct();
            $this->db->like('keyword', $search_kw);
            $this->db->where('usuarios.estatus_id', '3');

            $this->db->distinct();
            $this->db->join('tipo_actividad', 'keywords_comercio.tipoactividad_id = tipo_actividad.tactividad_id');
            $this->db->join('actividad', 'tipo_actividad.actividad_id = actividad.actividad_id');
            $this->db->join('comercios', 'keywords_comercio.comercio_id = comercios.negocio_id');
            $this->db->join('usuarios', 'usuarios.usuario_id = comercios.usuario_id');

            $query = $this->db->get('keywords_comercio');

            return ($query->num_rows() >= 1) ? $query->result() : NULL;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_comername($id)
    {
        $query = $this->db->query(
            "SELECT * FROM comercios WHERE USUARIO_ID='" . $id . "' "
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }




    public function get_estatus_req($id)
    {
        $query = $this->db->query(
            "SELECT * FROM estatus_req WHERE opnegocio_id='" . $id . "' "
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function get_mis_requerimientos($idcom)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND requerimientos.usuario_id=comercios.usuario_id AND comercios.usuario_id=usuarios.usuario_id  AND oportunidades_negocio.comercio_id='" .
                $idcom .
                "' ORDER BY fecha_req desc "
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }


    public function get_mis_requerimientos_pagina($idcom, $pagina)
    {
        $off = ($pagina - 1) * 5;


        // $query = $this->db->query(
        //     "SELECT * FROM 
        //     requerimientos, 
        //     comercios, 
        //     oportunidades_negocio, 
        //     estatus_req, 
        //     usuarios 
        //     WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id
        //     AND oportunidades_negocio.requerimiento_id =requerimientos.req_id
        //     AND comercios.usuario_id = requerimientos.usuario_id 
        //     AND comercios.usuario_id = usuarios.usuario_id  
        //     AND estatus_req.requerimiento_id = requerimientos.req_id 
        //     AND oportunidades_negocio.comercio_id='" . $idcom . "' 
        //     ORDER BY req_id desc limit 5 offset " . $off . ""
        // );


        $query = $this->db->query("SELECT 
        requerimientos.req_id           as 'requerimientos_req_id', 
        requerimientos.busq_nec         as 'requerimientos_busq_nec', 
        requerimientos.qty              as 'requerimientos_qty', 
        requerimientos.entrega          as 'requerimientos_entrega', 
        requerimientos.especificaciones as 'requerimientos_especificaciones', 
        requerimientos.fecha_req        as 'requerimientos_fecha_req', 
        requerimientos.usuario_id       as 'requerimientos_usuario_id', 
        requerimientos.notificados_req  as 'requerimientos_notificados_req', 
        requerimientos.estatus          as 'requerimientos_estatus',
        requerimientos.comentarios_req  as 'requerimientos_comentarios_req', 
        requerimientos.usuario_elegido  as 'requerimientos_usuario_elegido', 
        requerimientos.req_calf_status  as 'requerimientos_req_calf_status', 
        requerimientos.promedio_eva     as 'requerimientos_promedio_eva', 
        requerimientos.republicado      as 'requerimientos_republicado', 
        requerimientos.fecha_fin_req    as 'requerimientos_fecha_fin_req', 
        
        oportunidades_negocio.opneg_id  as 'oportunidades_negocio_opneg_id',
        oportunidades_negocio.requerimiento_id  as 'oportunidades_negocio_requerimiento_id', 
        oportunidades_negocio.comercio_id  as 'oportunidades_negocio_comercio_id',
        oportunidades_negocio.fecha_inicio  as 'oportunidades_negocio_fecha_inicio',
        oportunidades_negocio.mensaje_correo  as 'oportunidades_negocio_mensaje_correo',
        oportunidades_negocio.mensaje_whats  as 'oportunidades_negocio_mensaje_whats', 
        oportunidades_negocio.mensaje_rechazo  as 'oportunidades_negocio_mensaje_rechazo', 
        oportunidades_negocio.mensaje_cancelado  as 'oportunidades_negocio_mensaje_cancelado', 
        oportunidades_negocio.respuesta_whatsapp  as 'oportunidades_negocio_respuesta_whatsapp', 
        oportunidades_negocio.respuesta_mail  as 'oportunidades_negocio_respuesta_mail',
        oportunidades_negocio.cotizacion_opng  as 'oportunidades_negocio_cotizacion_opng',
        oportunidades_negocio.seleccionado  as 'oportunidades_negocio_seleccionado',
        oportunidades_negocio.promedio_calif  as 'oportunidades_negocio_promedio_calif',

        comercios.*,

        -- estatus_req.opnegocio_id        as 'estatus_req_opnegocio_id', 
        -- estatus_req.estatus             as 'estatus_req_estatus', 
        -- estatus_req.fecha               as 'estatus_req_fecha',
        -- estatus_req.requerimiento_id    as 'estatus_req_requerimiento_id', 

        usuarios.*,c2.* from requerimientos   
        JOIN oportunidades_negocio on oportunidades_negocio.requerimiento_id = requerimientos.req_id 
        JOIN comercios          on comercios.negocio_id = oportunidades_negocio.comercio_id 
        -- JOIN estatus_req ON estatus_req.opnegocio_id = oportunidades_negocio.opneg_id 
        -- AND estatus_req.requerimiento_id = requerimientos.req_id 
        JOIN usuarios on usuarios.usuario_id = requerimientos.usuario_id 
        JOIN comercios as c2 on c2.usuario_id = requerimientos.usuario_id
        AND oportunidades_negocio.comercio_id='" . $idcom . "' 
        ORDER BY req_id desc limit 5 offset " . $off . "");

        // $query = $this->db->query(
        //     "SELECT * FROM 
        //     requerimientos, 
        //     comercios, 
        //     oportunidades_negocio, 
        //     estatus_req, 
        //     usuarios 
        //     WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id
        //     AND oportunidades_negocio.requerimiento_id =requerimientos.req_id
        //     AND comercios.usuario_id = requerimientos.usuario_elegido 
        //     AND comercios.usuario_id = usuarios.usuario_id  
        //     AND estatus_req.requerimiento_id = requerimientos.req_id 
        //     AND oportunidades_negocio.comercio_id='" . $idcom . "' 
        //     ORDER BY req_id desc limit 5 offset " . $off . ""
        // );
        return $query->num_rows() >= 1 ? $query->result_array() : null;
    }





    public function soy_afiliado($id)
    {

        $this->db->where('usuario_id', $id);
        $query = $this->db->get('comercios');
        return $query->num_rows() >= 1 ? $query->result() : null;
    }


    public function get_myreq_nr($idcom, $key)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND requerimientos.usuario_id=comercios.usuario_id AND comercios.usuario_id=usuarios.usuario_id AND estatus_req.estatus='" . $key . "'  AND comercio_id='" . $idcom . "' ORDER BY fecha_req desc"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }


    public function get_myreq_nr2($idcom, $key, $id)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND requerimientos.usuario_id=comercios.usuario_id AND comercios.usuario_id=usuarios.usuario_id AND estatus_req.estatus='" . $key . "'  AND comercio_id='" . $idcom . "' and requerimientos.usuario_elegido='" . $id . "' ORDER BY fecha_req desc"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }



    public function get_myop_number_nr($idcom, $status)
    {
        $query = $this->db->query(
            // "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND requerimientos.usuario_id=comercios.usuario_id AND comercios.usuario_id=usuarios.usuario_id  AND estatus_req.estatus='" . $status . "' AND comercio_id='" . $idcom . "'   "

            "SELECT * from requerimientos as req JOIN oportunidades_negocio as op_n on op_n.requerimiento_id = req.req_id where op_n.comercio_id = '" . $idcom . "' and req.estatus = '" . $status . "'"
        );
        return $query->num_rows();
    }


    public function get_mi_keywords_actividades($idcom)
    {
        $query = $this->db->query(
            " SELECT * FROM keywords_comercio INNER JOIN tipo_actividad on keywords_comercio.tipoactividad_id=tipo_actividad.tactividad_id INNER JOIN actividad on tipo_actividad.actividad_id=actividad.actividad_id WHERE comercio_id='" . $idcom . "'"
        );
        return $query->num_rows();
    }









    public function get_myop_number($idcom)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND requerimientos.usuario_id=comercios.usuario_id AND comercios.usuario_id=usuarios.usuario_id  AND comercio_id='" . $idcom . "'   "
        );
        return $query->num_rows();
    }

    public function get_myreq_number($id)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos WHERE estatus is NULL  AND  usuario_id='" . $id . "'"
        );
        return $query->num_rows();
    }


    public function cancelar_requerimiento($id, $status)
    {
        // $query = $this->db->query(
        //     "update estatus_req set estatus='" .
        //         $status .
        //         "' where opnegocio_id='" .
        //         $id .
        //         "'"
        // );

        return $this->db->query(
            "update requerimientos set estatus='" .
                $status .
                "' where req_id='" .
                $id .
                "'"
        ); //RETURN A BOOLEAN
    }

    public function get_medallas($id)
    {
        $query = $this->db->query('SELECT * FROM recompensas,insignia, medalla WHERE usuario="' . $id . '" GROUP BY medalla');
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
}

/* End of file Reg_user.php */
/* Location: ./application/models/Reg_user.php */
