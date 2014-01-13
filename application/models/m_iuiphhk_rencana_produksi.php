<?php
class M_iuiphhk_rencana_produksi extends App_Model{
	var $mainSql = "SELECT 
				ID_RENCANA_PRODUKSI,
				ID_IUIPHHK,
				JENIS_PRODUKSI,
				KAPASITAS,
				KETERANGAN
				FROM iuiphhk_rencana_produksi 
			WHERE ID_RENCANA_PRODUKSI IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'iuiphhk_rencana_produksi';
        $this->column_primary = 'ID_RENCANA_PRODUKSI';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_IUIPHHK LIKE '%".$searchText."%' OR 
					JENIS_PRODUKSI LIKE '%".$searchText."%' OR 
					KAPASITAS LIKE '%".$searchText."%' OR 
					KETERANGAN LIKE '%".$searchText."%'
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
		
		if(@$ID_IUIPHHK != ''){
			$sql .= " AND ID_IUIPHHK LIKE '%".$ID_IUIPHHK."%' ";
		}
		if(@$JENIS_PRODUKSI != ''){
			$sql .= " AND JENIS_PRODUKSI LIKE '%".$JENIS_PRODUKSI."%' ";
		}
		if(@$KAPASITAS != ''){
			$sql .= " AND KAPASITAS LIKE '%".$KAPASITAS."%' ";
		}
		if(@$KETERANGAN != ''){
			$sql .= " AND KETERANGAN LIKE '%".$KETERANGAN."%' ";
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