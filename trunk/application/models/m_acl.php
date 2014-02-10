<?php
class M_acl extends App_model{
	var $mainSql = "SELECT 
				id,
				nama,
				link,
				defaultusergroup,
				status,
				order,
				level,
				parent,
				groupmenu_id,
				publik,
				keterangan,
				link_baru
				FROM acl 
			WHERE id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'acl';
        $this->column_primary = 'id';
        $this->column_order = 'id ASC';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					nama LIKE '%".$searchText."%' OR 
					link LIKE '%".$searchText."%' OR 
					defaultusergroup LIKE '%".$searchText."%' OR 
					status LIKE '%".$searchText."%' OR 
					order LIKE '%".$searchText."%' OR 
					level LIKE '%".$searchText."%' OR 
					parent LIKE '%".$searchText."%' OR 
					groupmenu_id LIKE '%".$searchText."%' OR 
					publik LIKE '%".$searchText."%' OR 
					keterangan LIKE '%".$searchText."%' OR 
					link_baru LIKE '%".$searchText."%'
					)
			";
		}
				if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
	function search($params){
		extract($params);
		
		$sql = $this->mainSql;
		
		if(@$nama != ''){
			$sql .= " AND nama LIKE '%".$nama."%' ";
		}
		if(@$link != ''){
			$sql .= " AND link LIKE '%".$link."%' ";
		}
		if(@$defaultusergroup != ''){
			$sql .= " AND defaultusergroup LIKE '%".$defaultusergroup."%' ";
		}
		if(@$status != ''){
			$sql .= " AND status LIKE '%".$status."%' ";
		}
		if(@$order != ''){
			$sql .= " AND order LIKE '%".$order."%' ";
		}
		if(@$level != ''){
			$sql .= " AND level LIKE '%".$level."%' ";
		}
		if(@$parent != ''){
			$sql .= " AND parent LIKE '%".$parent."%' ";
		}
		if(@$groupmenu_id != ''){
			$sql .= " AND groupmenu_id LIKE '%".$groupmenu_id."%' ";
		}
		if(@$publik != ''){
			$sql .= " AND publik LIKE '%".$publik."%' ";
		}
		if(@$keterangan != ''){
			$sql .= " AND keterangan LIKE '%".$keterangan."%' ";
		}
		if(@$link_baru != ''){
			$sql .= " AND link_baru LIKE '%".$link_baru."%' ";
		}
		if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
	function printExcel($params){
		extract($params);
		if(@$currentAction == "GETLIST"){
			$result = $this->getList($params);
		}else if(@$currentAction == "SEARCH"){
			$result = $this->search($params);
		}
		return $result;
	}
	
}