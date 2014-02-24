<?php if(!defined('BASEPATH')) exit('Forbidden.');

class App_model extends CI_Model{
	
	public $table_name='';
	public $column_primary='';
	public $column_order='';
	public $column_unique='';
	public $primary_filter='intval';
	
	function __construct(){
		parent::__construct();
	}
	
	/* Fungsi untuk mengecek session apakah masih terisi atau sudah hangus */
	public function __checkSession($key = null){
		if($key != ''){
			return @$_SESSION[$key];
		}else{
			return @$_SESSION['USERID'];
		}
	}
	
	public function __listCore($sql, $params){
		extract($params);
		$total_rows = $this->__getNumRows($sql);
		$query = $this->db->query($sql);
		$query_result = $query->result();
		
		if(@$return_type == 'array'){
			$result = array($total_rows,$query_result);
		}else if(@$return_type == 'json'){
			$result = array($total_rows,$query_result);
			$result = json_encode($result);
		}else{
			$json_result = json_encode($query_result);
			$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		}
		return $result;
	}
	
	/* Fungsi untuk mengecek value dalam kolom unik sudah digunakan atau belum (return true jika sudah digunakan) */
	public function __checkCodeExisting($dataValue, $primaryValue){
		if($this->column_unique != ''){
			$this->db->where('lower('.$this->column_unique.')', strtolower($dataValue[$this->column_unique]));
			$this->db->where($this->column_primary . ' != ', $primaryValue);
			$res = $this->db->get($this->table_name);
			if($res->num_rows() > 0){
				return true;
			}
		}else{
			return true;
		}
		return false;
	}
	
	public function __getNumRows($sql){
		$sqli="";
		$sqls="";
		$split_order=preg_split("/ORDER/i",$sql);
		$sqls=$split_order[0];
		$split_order=preg_split("/LIMIT/i",$sql);
		$sqls=$split_order[0];
		$split_sql=preg_split("/FROM/i",$sqls);
		$sqli.="SELECT count(1) as jumlah ";
		for($i=1;$i<sizeof($split_sql);$i++){
			$sqli.=' FROM '.$split_sql[$i];
		}
		$rs=$this->db->query($sqli);
		if($rs->num_rows()){
			$row=$rs->row();
			return $row->jumlah;
		}else{
			return 0;
		}
	}
	
	public function __insert($dataValue, $table=FALSE, $return_type = FALSE){
		$table = ($table!=FALSE) ? $table : $this->table_name ;
		$result = 'fail';
		if($this->__checkCodeExisting($dataValue, 0)){
			$this->db->set($dataValue)->insert($table);
			if($this->db->affected_rows()){			
				$result = 'success';
				if($return_type == 'insertId'){
					$result = $this->db->insert_id();
				}
			}
		}else{
			$result = 'duplicateCode';
		}
		return $result;
	}
	
	public function __update($dataValue, $id, $table=FALSE, $return_type = FALSE, $prim=FALSE){
		$table = ($table!=FALSE) ? $table : $this->table_name ;
		$prim = ($prim!=FALSE) ? $prim : $this->column_primary ;
		$result = 'fail';		
		if($this->__checkCodeExisting($dataValue, $id)){
			$filter = $this->primary_filter;
			$this->db->set($dataValue)->where($prim, $filter($id))->update($table);
			if($this->db->affected_rows()){			
				$result = 'success';
				if($return_type == 'updateId'){
					$result = $id;
				}
			}
		}else{
			$result = 'duplicateCode';
		}
        return $result;
    }
	
	public function __delete($ids, $table=FALSE){
		$table = ($table!=FALSE) ? $table : $this->table_name ;
		$filter = $this->primary_filter;
        $ids = ! is_array($ids) ? array($ids) : $ids;
        foreach ($ids as $id) {
            $id = $filter($id);
            if ($id) {
                $this->db->where($this->column_primary, $id)->limit(1)->delete($table);
            }
        }
		if($this->db->affected_rows()){
			return 'success';
		}else{
			return 'fail';
		}
	}
	public function get_by ($key, $val = FALSE, $orwhere = FALSE, $single = FALSE, $order=FALSE) {
        
        // Limit results
        if ($val == TRUE) {
            $this->db->where(htmlentities($key), htmlentities($val));
        }
        else {
			if(!is_array($key)){
				$this->db->where($key);
			} else {
				$key = array_map('htmlentities', $key);
				$where_method = $orwhere == TRUE ? 'or_where' : 'where';
				$this->db->$where_method($key);
			}           
        }
		if($order == FALSE){
			$order = $this->column_order;
		}
        count($this->db->ar_orderby) || $this->db->order_by($this->table_name . "." . $order);
        // Return results
        $single == FALSE || $this->db->limit(1);
        $method = $single ? 'row_array' : 'result_array';
        return $this->db->get($this->table_name)->$method();
    }
	function get_join_by($data,$key=FALSE,$single=FALSE,$column=FALSE,$order=FALSE){ //Zulmi Adi Rizki 23 Juli 2013
		foreach($data as $row){
			$join_key	= (isset($row["join_key2"])) ? ($row["join_key2"]) : ($row["join_key"]);
			if(isset($row["join_type"])){
				$this->db->join($row["join_table"],$row["table"].".".$row["join_key"]."=".$row["join_table"].".".$join_key, $row["join_type"]);
			} else {
				$this->db->join($row["join_table"],$row["table"].".".$row["join_key"]."=".$row["join_table"].".".$join_key);
			}
		}
		if($key == TRUE){
			if(!is_array($key)){
				$this->db->where($key);
			} else {
				$key = array_map('htmlentities', $key);
				$this->db->where($key);
			}
		}
		if($order == FALSE){
			$order = $this->column_order;
		}
		count($this->db->ar_orderby) || $this->db->order_by($this->table_name . "." . $order);
		// count($this->db->ar_orderby) || $this->db->order_by($this->column_order);
		$this->db->select($column == FALSE ? "*" : $column)->from($this->table_name);
		$single == FALSE || $this->db->limit(1);
		$method = $single ? 'row_array' : 'result_array';
		return $this->db->get()->$method();
	}
	public function __insertlog($user, $pemohon, $permohonan, $aktifitas){
		$data = array(
			"log_tanggal"=>date('Y-m-d H:i:s'),
			"log_user"=>$user,
			"log_pemohon"=>$pemohon,
			"log_permohonan"=>$permohonan,
			"log_aktifitas"=>$aktifitas
		);
		$this->db->insert('t_log', $data);
	}
	 public function save($data, $id = FALSE) {
        
        if ($id == FALSE) {
            
            // This is an insert
            $this->db->set($data)->insert($this->table_name);
        }
        else {
            if(!is_array($id)){
				$filter = $this->primary_filter;
				$this->db->set($data)->where($this->column_primary, $filter($id))->update($this->table_name);
			} else {
				$filter = $this->primary_filter;
				$this->db->set($data)->where($id)->update($this->table_name);
				/*
				update tidak berdasarkan primary key tetapi, menggunakan kolom lain contoh : save($data,array("NAMA_KOLOM"=>"coba"));
				*/
				//Zulmi Adi Rizki 19 Juli 2013
			}
            // This is an update
        }
        
        // Return the ID
        return $id == FALSE ? $this->db->insert_id() : $id;
    }
	public function delete($id){
        
        $filter = $this->primary_filter; 
		$id = $filter($id);
		if ($id) {
			$this->db->where($this->column_primary, $id)->delete($this->table_name);
		}
    }
	 public function get_all ($ids = FALSE){
        
        // Set flag - if we passed a single ID we should return a single record
        $single = $ids == FALSE || is_array($ids) ? FALSE : TRUE;
        
        // Limit results to one or more ids
        if ($ids !== FALSE) {
            
            // $ids should always be an array
            is_array($ids) || $ids = array($ids); 
            
            // Sanitize ids
            $filter = $this->primaryFilter;
            $ids = array_map($filter, $ids); 
            
            $this->db->where_in($this->primary_key, $ids);
        }
        
        // Set order by if it was not already set
        count($this->db->ar_orderby) || $this->db->order_by($this->table_name . "." . $this->column_order);
        
        // Return results
        $single == FALSE || $this->db->limit(1);
        $method = $single ? 'row_array' : 'result_array';
        return $this->db->get($this->table_name)->$method();
    }
	
	public function cuperusahaan($params){
		extract(get_object_vars($params));
		$dataperusahaan = array(
			'id'=>$perusahaan_id,
			'npwp'=>$perusahaan_npwp,
			'nama'=>$perusahaan_nama,
			'noakta'=>$perusahaan_noakta,
			'notaris'=>$perusahaan_notaris,
			'tglakta'=>$perusahaan_tglakta,
			'bentuk_id'=>$perusahaan_bentuk_id,
			'kualifikasi_id'=>$perusahaan_kualifikasi_id,
			'alamat'=>$perusahaan_alamat,
			'rt'=>$perusahaan_rt,
			'rw'=>$perusahaan_rw,
			'propinsi_id'=>$perusahaan_propinsi_id,
			'kabkota_id'=>$perusahaan_kabkota_id,
			'kecamatan_id'=>$perusahaan_kecamatan_id,
			'desa_id'=>$perusahaan_desa_id,
			'kodepos'=>$perusahaan_kodepos,
			'telp'=>$perusahaan_telp,
			'fax'=>$perusahaan_fax,
			'stempat_id'=>$perusahaan_stempat_id,
			'sperusahaan_id'=>$perusahaan_sperusahaan_id,
			'usaha'=>$perusahaan_usaha,
			'butara'=>$perusahaan_butara,
			'bselatan'=>$perusahaan_bselatan,
			'btimur'=>$perusahaan_btimur,
			'bbarat'=>$perusahaan_bbarat,
			'modal'=>$perusahaan_modal,
			'merk'=>$perusahaan_merk,
			'jusaha_id'=>$perusahaan_jusaha_id
		);
		if($perusahaan_id != 0){
			$resultperusahaan = $this->db->where('id', $perusahaan_id)->update('perusahaan', $dataperusahaan);
			$resultperusahaan = $perusahaan_id;
		}else{
			$this->db->insert('perusahaan', $dataperusahaan);
			$resultperusahaan = $this->db->insert_id();
		}
		return $resultperusahaan;
	}
	
	public function cupemohon($params){
		extract(get_object_vars($params));
		$datapemohon = array(
			'tahun'=>date('Y'),
			'nama'=>$pemohon_nama,
			'alamat'=>$pemohon_alamat,
			'telp'=>$pemohon_telp,
			'npwp'=>$pemohon_npwp,
			'rt'=>$pemohon_rt,
			'rw'=>$pemohon_rw,
			'desa_id'=>$pemohon_kel,
			'kecamatan_id'=>$pemohon_kec,
			'ktp'=>$pemohon_nik,
			'stra'=>$pemohon_stra,
			'surattugas'=>$pemohon_surattugas,
			'pekerjaan'=>$pemohon_pekerjaan,
			'tempatlahir'=>$pemohon_tempatlahir,
			'tgllahir'=>date('Y-m-d', strtotime($pemohon_tanggallahir)),
			'pendidikan'=>$pemohon_pendidikan,
			'tahunlulus'=>$pemohon_tahunlulus,
		);
		if($pemohon_id != 0){
			$resultpemohon = $this->db->where('id', $pemohon_id)->update('pemohon', $datapemohon);
			$resultpemohon = $pemohon_id;
		}else{
			$this->db->insert('pemohon', $datapemohon);
			$resultpemohon = $this->db->insert_id();
		}
		return $resultpemohon;
	}
	
}