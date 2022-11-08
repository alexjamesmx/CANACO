<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demodatatable_model extends CI_Model {

    /**
     * [get_munis description]
     * @param  [type] $limit       [description]
     * @param  [type] $offset      [description]
     * @param  [type] $searchValue [description]
     * @param  [type] $columnName  [description]
     * @param  [type] $orderColumn [description]
     * @return [type]              [description]
     */
    function get_munis($limit, $offset, $searchValue, $columnName, $orderColumn)
    {
        $cmd = "SELECT * FROM municipios ";

        if ($searchValue != '') {
            $cmd .= " WHERE nombre_municipio LIKE '%$searchValue%'";
        }

        $cmd.= " ORDER BY $columnName $orderColumn ";
        
        
        $cmd .= " LIMIT $limit, $offset ";        
        

        $query = $this->db->query($cmd);

        return $query;
    }

    function get_all_munis()
    {
        $cmd = "SELECT * FROM municipios ";        

        $query = $this->db->query($cmd);

        return $query;
    }

}

/* End of file Demodatatable_model.php */
/* Location: ./application/models/Demodatatable_model.php */
