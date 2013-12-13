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
		if($key != null){
			return @$_SESSION[$key];
		}else{
			return @$_SESSION['PERIJINAN_USERNAME'];
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
	
	public function __update($dataValue, $id, $table=FALSE, $return_type = FALSE){
		$table = ($table!=FALSE) ? $table : $this->table_name ;
		$result = 'fail';
		if($this->__checkCodeExisting($dataValue, $id)){
			$filter = $this->primary_filter;
			$this->db->set($dataValue)->where($this->column_primary, $filter($id))->update($table);
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
	
}