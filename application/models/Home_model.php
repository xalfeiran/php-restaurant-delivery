<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Home_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function GetPlaces()
	{
		$query = $this->db->where('state!=','MX')
						  ->order_by('city')
			 	  		  ->get('vac_ciudades');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}	
	}

	public function GetPlacesIATA()
	{
		$query = $this->db->where('state!=','MX')
						  ->order_by('city')
						  ->select('iatacode')
			 	  		  ->get('vac_ciudades');
		if($query->num_rows() > 0)
		{
			$rows = array();
			foreach( $query->result_array() as $row){
				array_push($rows, $row['iatacode']);
			}
			return $rows;
		}	
	}

	public function ApplyFilters($filtros, $iatacode)
	{

		$sql = 'SELECT
		  vac_sitios.*, (
		    3959 * acos (
		      cos ( radians(ciudad.lng) )
		      * cos( radians( coords_lat ) )
		      * cos( radians( coords_lng ) - radians(ciudad.lat) )
		      + sin ( radians(ciudad.lng) )
		      * sin( radians( coords_lat ) )
		    )
		  ) AS distance
		FROM vac_sitios
		inner join vac_ciudades ciudad on vac_sitios.state=ciudad.state 
		where ';

		if(count($filtros)>0){
			for($i=0;$i<count($filtros);$i++){
				$sql .= ' vaccine_types like "' . $filtros[$i] . '" and ';
			}
		}
		$sql .= ' vaccine_types not like "%unknown%" and ciudad.iatacode="' . $iatacode . '"
		having distance<30 order by distance asc limit 0,10';
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}	
	}

	public function getJsonLocation($state){
		$this->db->where('state',$state);
		$query = $this->db->get('vac_sitios');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}	
	}

	public function GetOrigenes()
	{

		$query = $this->db->where('state','MX')
						  ->order_by('city')
			 	  		  ->get('vac_ciudades');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}	
	}

	public function GetMarcasVacunas()
	{

		$query = $this->db->order_by('marca')
			 	  		  ->get('vac_marcas');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}	
	}

	public function hitr($origen, $destino){
		// incrementar el contador de clic en origen
		$sql = "UPDATE vac_ciudades SET clicks = clicks +1 where iatacode=?";
		$query = $this->db->query($sql,array($origen));

		// incrementar el contador de clic en destino
		$sql = "UPDATE vac_ciudades SET clicks = clicks +1 where iatacode=?";
		$query = $this->db->query($sql,array($destino));
	}

	public function log_signin($shortname, $version, $os )
	{
		$data = array(
            'shortname' 	=> $shortname,
            'version' 		=> $version,
            'os' 			=> $os,
            'updated' 		=> $date = gmdate('Y-m-d H:i:s')	
        );
		
		// actualiza la info
        $this->db->replace('cunop_bitacoraingresos', $data);
	}

	public function TestUpdate($os)
	{
		$query=$this->db->get('cunop_empresas');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			if($os=='iphone')
				return $row->updateios;
			else
				return $row->updateandroid;
		}
		else
			return false;
	}
}