<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4 class="container">IZIN USAHA JASA KONSTRUKSI</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujk_det_componentItemTitle="Ijin Usaha Jasa Konstruksi";
		var iujk_det_dataStore;
		
		var iujk_det_shorcut;
		var iujk_det_contextMenu;
		var iujk_det_gridSearchField;
		var iujk_det_gridPanel;
		var iujk_det_formPanel;
		var iujk_det_formWindow;
		var iujk_det_searchPanel;
		var iujk_det_searchWindow;
		
		var det_iujk_idField;
		var det_iujk_iujk_idField;
		var det_iujk_jenisField;
		var det_iujk_sklamaField;
		var det_iujk_tanggalField;
		var det_iujk_namaField;
		var det_iujk_nomorregField;
		var det_iujk_rekomnomorField;
		var det_iujk_rekomtanggalField;
		var det_iujk_berlakuField;
		var det_iujk_kadaluarsaField;
		var det_iujk_pj1Field;
		var det_iujk_pj2Field;
		var det_iujk_pj3Field;
		var det_iujk_pjteknisField;
		var det_iujk_pjtbuField;
		var det_iujk_surveylulusField;
		
		var iujk_perusahaanField;
		var iujk_alamatField;
		var iujk_direkturField;
		var iujk_golonganField;
		var iujk_kualifikasiField;
		var iujk_bidangusahaField;
		var iujk_rtField;
		var iujk_rwField;
		var iujk_kelurahanField;
		var iujk_kotaField;
		var iujk_propinsiField;
		var iujk_teleponField;
		var iujk_kodeposField;
		var iujk_faxField;
		var iujk_npwpField;
		
		var iujk_det_dbTask = 'CREATE';
		var iujk_det_dbTaskMessage = 'Tambah';
		var iujk_det_dbPermission = 'CRUD';
		var iujk_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function iujk_det_switchToGrid(){
			iujk_det_formPanel.setDisabled(true);
			iujk_det_gridPanel.setDisabled(false);
			iujk_det_formWindow.hide();
		}
		
		function iujk_det_switchToForm(){
			iujk_det_gridPanel.setDisabled(true);
			iujk_det_formPanel.setDisabled(false);
			iujk_det_formWindow.show();
		}
		
		function iujk_det_confirmAdd(){
			iujk_det_dbTask = 'CREATE';
			iujk_det_dbTaskMessage = 'created';
			iujk_det_resetForm();
			iujk_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			iujk_det_syaratDataStore.load();
			iujk_det_switchToForm();
		}
		
		function iujk_det_confirmUpdate(){
			if(iujk_det_gridPanel.selModel.getCount() == 1) {
				iujk_det_dbTask = 'UPDATE';
				iujk_det_dbTaskMessage = 'updated';
				iujk_det_switchToForm();
				iujk_det_setForm();
			}else{
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalNoSelection,
					buttons : Ext.MessageBox.OK,
					animEl : 'save',
					icon : Ext.MessageBox.WARNING
				});
			}
		}
		
		function iujk_det_confirmDelete(){
			if(iujk_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, iujk_det_delete);
			}else if(iujk_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, iujk_det_delete);
			}else{
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalNoSelection,
					buttons : Ext.MessageBox.OK,
					animEl : 'save',
					icon : Ext.MessageBox.WARNING
				});
			}
		}
		
		function iujk_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(iujk_det_dbPermission)==false && pattC.test(iujk_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(iujk_det_confirmFormValid()){
					var array_iujk_cek_id=new Array();
					var array_iujk_cek_syarat_id=new Array();
					var array_iujk_cek_status=new Array();
					var array_iujk_cek_keterangan=new Array();
					
					if(iujk_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<iujk_det_syaratDataStore.getCount();i++){
							array_iujk_cek_id.push(iujk_det_syaratDataStore.getAt(i).data.iujk_cek_id);
							array_iujk_cek_syarat_id.push(iujk_det_syaratDataStore.getAt(i).data.iujk_cek_syarat_id);
							array_iujk_cek_status.push(iujk_det_syaratDataStore.getAt(i).data.iujk_cek_status);
							array_iujk_cek_keterangan.push(iujk_det_syaratDataStore.getAt(i).data.iujk_cek_keterangan);
						}
					}
					var params = iujk_det_formPanel.getForm().getValues();
					params.ijin_id = 22;
					params.action = iujk_det_dbTask;
					params.iujk_cek_id = array_iujk_cek_id;
					params.iujk_cek_syarat_id = array_iujk_cek_syarat_id;
					params.iujk_cek_status = array_iujk_cek_status;
					params.iujk_cek_keterangan = array_iujk_cek_keterangan;
					params.perusahaan_kualifikasi_nama = perusahaan_kualifikasi_idField.getRawValue();
					params.perusahaan_propinsi_nama = perusahaan_propinsi_idField.getRawValue();
					params.perusahaan_kabkota_nama = perusahaan_kabkota_idField.getRawValue();
					params.perusahaan_kecamatan_nama = perusahaan_kecamatan_idField.getRawValue();
					params.perusahaan_desa_nama = perusahaan_desa_idField.getRawValue();
					params = Ext.encode(params);
					
					/* START BIDANG */
					<?php
					foreach($bidang AS $sub_bidang){ 
						$nm_bid = strtolower($sub_bidang->bidang);
						$nm_bid_nospc = str_replace(' ','', $nm_bid);
						
						echo "if(iujk_".$nm_bid_nospc."_checkbox.getValue() == true){iujk_bidang".$nm_bid_nospc." = 1;}else{iujk_bidang".$nm_bid_nospc." = 0;}";
						echo "var iujk_bidang".$nm_bid_nospc."_proyek = iujk_bidang".$nm_bid_nospc."_proyekField.getValue();";
						echo "var iujk_bidang".$nm_bid_nospc."_tahun = iujk_bidang".$nm_bid_nospc."_tahunField.getValue();";
						echo "var iujk_bidang".$nm_bid_nospc."_nilai = iujk_bidang".$nm_bid_nospc."_nilaiField.getValue();";
						
						foreach($bidangsub as $sub_bidangsub){
						if($sub_bidangsub->bidang_jasa_id == $sub_bidang->id){
						$subid = $sub_bidangsub->id;
						echo "if(iujk_bidang".$nm_bid_nospc."_sub".$subid."Field.getValue() == true){iujk_bidang".$nm_bid_nospc."_sub".$subid." = 1;}else{iujk_bidang".$nm_bid_nospc."_sub".$subid." = 0;}";
						}
						}
					}
					?>
					/* END BIDANG */
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujk_det/switchAction',
						params: {
							action : iujk_det_dbTask,
							params : params,
							<?php
							foreach($bidang AS $sub_bidang){ 
								$nm_bid = strtolower($sub_bidang->bidang);
								$nm_bid_nospc = str_replace(' ','', $nm_bid);
								echo "iujk_bidang".$nm_bid_nospc." : iujk_bidang".$nm_bid_nospc.",";
								echo "iujk_bidang".$nm_bid_nospc."_proyek : iujk_bidang".$nm_bid_nospc."_proyek,";
								echo "iujk_bidang".$nm_bid_nospc."_tahun : iujk_bidang".$nm_bid_nospc."_tahun,";
								echo "iujk_bidang".$nm_bid_nospc."_nilai : iujk_bidang".$nm_bid_nospc."_nilai,";
								
								foreach($bidangsub as $sub_bidangsub){
								if($sub_bidangsub->bidang_jasa_id == $sub_bidang->id){
								$subid = $sub_bidangsub->id;
								echo "iujk_bidang".$nm_bid_nospc."_sub".$subid." : iujk_bidang".$nm_bid_nospc."_sub".$subid.",";
								}
								}
							}
							?>
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujk_det_dataStore.reload();
									iujk_det_resetForm();
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave, function(){
										window.scrollTo(0,0);
									});
									iujk_det_switchToGrid();
									iujk_det_gridPanel.getSelectionModel().deselectAll();
									break;
								case 'duplicateCode':
									Ext.MessageBox.show({
										title : 'Warning',
										msg : globalFailedDuplicateCode,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										icon : Ext.MessageBox.WARNING
									});
									break;
								case 'sessionExpired':
									Ext.MessageBox.show({
										title : 'Warning',
										msg : globalSessionExpiredMessage,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										icon : Ext.MessageBox.WARNING,
										fn : function(btn){
											window.location="../index.php";
										}
									});
									break;
								default:
									Ext.MessageBox.show({
										title : 'Warning',
										msg : globalFailedSave,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										icon : Ext.MessageBox.WARNING
									});
									break;
							}
						},
						failure: function(response){
							ajaxWaitMessage.hide();
							var result=response.responseText;
							Ext.MessageBox.show({
								title : 'Error',
								msg : globalFailedConnection,
								buttons : Ext.MessageBox.OK,
								animEl : 'database',
								icon : Ext.MessageBox.ERROR
							});
						}
					});
				}else{
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalInvalidForm,
						buttons : Ext.MessageBox.OK,
						animEl : 'save',
						icon : Ext.MessageBox.WARNING
					});
				}
			}
		}
		
		function iujk_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(iujk_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = iujk_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< iujk_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_iujk_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_iujk_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									iujk_det_dataStore.reload();
									break;
								default:
									Ext.MessageBox.show({
										title : 'Warning',
										msg : globalFailedDelete,
										buttons : Ext.MessageBox.OK,
										animEl : 'save',
										icon : Ext.MessageBox.WARNING
									});
									break;
							}
						},
						failure: function(response){
							ajaxWaitMessage.hide();
							var result=response.responseText;
							Ext.MessageBox.show({
								title : 'Error',
								msg : globalFailedConnection,
								buttons : Ext.MessageBox.OK,
								animEl : 'database',
								icon : Ext.MessageBox.ERROR
							});
						}
					});
				}
			}
		}
		
		function iujk_det_refresh(){
			iujk_det_dbListAction = "GETLIST";
			iujk_det_gridSearchField.reset();
			iujk_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			iujk_det_dataStore.proxy.extraParams.query = "";
			iujk_det_dataStore.currentPage = 1;
			iujk_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function iujk_det_confirmFormValid(){
			return iujk_det_formPanel.getForm().isValid();
		}
		
		function iujk_det_resetForm(){
			iujk_det_dbTask = 'CREATE';
			iujk_det_dbTaskMessage = 'create';
			iujk_det_formPanel.getForm().reset();
			det_iujk_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function iujk_det_setForm(){
			iujk_det_dbTask = 'UPDATE';
            iujk_det_dbTaskMessage = 'update';
			
			var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
			iujk_det_formPanel.loadRecord(record);
			det_iujk_idField.setValue(record.data.det_iujk_id);
			det_iujk_iujk_idField.setValue(record.data.det_iujk_iujk_id);
			det_iujk_jenisField.setValue(record.data.det_iujk_jenis);
			det_iujk_tanggalField.setValue(record.data.det_iujk_tanggal);
			if(record.data.det_iujk_retribusi != 0){
				iujk_det_retribusiField.setValue({ iujk_retribusi : ['1'] });
			}else{
				iujk_det_retribusiField.setValue({ iujk_retribusi : ['0'] });
			}
			iujk_det_retibusiNilaiField.setValue(record.data.det_iujk_retribusi);
			var iujkdet_id = record.data.det_iujk_id;
			Ext.Ajax.request({
				url : 'c_t_iujk_det/getBidang',
				params : {
					iujkdet_id : iujkdet_id
				}, success : function(response){
					var bidang = Ext.decode(response.responseText);
					
					Ext.Ajax.request({
						url : 'c_t_iujk_det/getSubBidang',
						params : {
							iujkdet_id : iujkdet_id
						}, success : function(response){
							var subbidang = Ext.decode(response.responseText);
						
							for (var eachbidang in bidang) {
								objectbidang = bidang[eachbidang];
								
								for(var eachsubbidang in subbidang){
									objectsubbidang = subbidang[eachsubbidang];
									/* start setting the values */
									<?php
									foreach($bidang AS $sub_bidang){
										$nm_bid = strtolower($sub_bidang->bidang);
										$nm_bid_nospc = str_replace(' ','', $nm_bid);
										
										echo "if(objectbidang.bidang == '". $sub_bidang->bidang ."' && objectbidang.iujkbidang_id != null){";
											echo "iujk_".$nm_bid_nospc."_checkbox.setValue(true);";
											echo "iujk_bidang".$nm_bid_nospc."_proyekField.setValue(objectbidang.nama_proyek);";
											echo "iujk_bidang".$nm_bid_nospc."_tahunField.setValue(objectbidang.tahun_proyek);";
											echo "iujk_bidang".$nm_bid_nospc."_nilaiField.setValue(objectbidang.nilai_proyek);";
										echo "}";
										
										foreach($bidangsub as $sub_bidangsub){
											if($sub_bidangsub->bidang_jasa_id == $sub_bidang->id){
												$subid = $sub_bidangsub->id;
												echo "if(objectsubbidang.id == ". $subid ." && objectsubbidang.iujk_id != null ){";
													echo "iujk_bidang".$nm_bid_nospc."_sub".$subid."Field.setValue(true);";
												echo "}";
											}
										}
										
									}
									
									?>
									/* end setting the values */
									
								}
							}
						}
					});
				}
			});
			
			iujk_det_syaratDataStore.proxy.extraParams = { 
				iujk_id : record.data.det_iujk_iujk_id,
				iujk_det_id : record.data.det_iujk_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			iujk_det_syaratDataStore.load();
		}
		
		function iujk_det_showSearchWindow(){
			iujk_det_searchWindow.show();
		}
		
		function iujk_det_printExcel(outputType){
			var searchText = "";
			if(iujk_det_dataStore.proxy.extraParams.query!==null){searchText = iujk_det_dataStore.proxy.extraParams.query;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujk_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					currentAction : iujk_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('../print/t_iujk_det_list.xls');
							}else{
								window.open('../print/t_iujk_det_list.html','iujk_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
							}
						break;
						default:
							Ext.MessageBox.show({
							title : 'Warning',
							msg : globalFailedPrint,
							buttons : Ext.MessageBox.OK,
							animEl : 'save',
							icon : Ext.MessageBox.WARNING
						});
						break;
					}
				},
				failure: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					Ext.MessageBox.show({
						title : 'Error',
						msg : globalFailedConnection,
						buttons : Ext.MessageBox.OK,
						animEl : 'database',
						icon : Ext.MessageBox.ERROR
					});
				}
			});
		}
/* End function declaration */
/* Start DataStore declaration */
		iujk_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'iujk_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujk_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_iujk_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_iujk_id', type : 'int', mapping : 'det_iujk_id' },
				{ name : 'det_iujk_iujk_id', type : 'int', mapping : 'det_iujk_iujk_id' },
				{ name : 'det_iujk_jenis', type : 'int', mapping : 'det_iujk_jenis' },
				{ name : 'det_iujk_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujk_tanggal' },
				{ name : 'det_iujk_nama', type : 'string', mapping : 'det_iujk_nama' },
				{ name : 'det_iujk_nomorreg', type : 'string', mapping : 'det_iujk_nomorreg' },
				{ name : 'det_iujk_rekomnomor', type : 'string', mapping : 'det_iujk_rekomnomor' },
				{ name : 'det_iujk_rekomtanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujk_rekomtanggal' },
				{ name : 'det_iujk_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujk_berlaku' },
				{ name : 'det_iujk_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_iujk_kadaluarsa' },
				{ name : 'det_iujk_pj1', type : 'string', mapping : 'det_iujk_pj1' },
				{ name : 'det_iujk_pj2', type : 'string', mapping : 'det_iujk_pj2' },
				{ name : 'det_iujk_pj3', type : 'string', mapping : 'det_iujk_pj3' },
				{ name : 'det_iujk_pjteknis', type : 'string', mapping : 'det_iujk_pjteknis' },
				{ name : 'det_iujk_pjtbu', type : 'string', mapping : 'det_iujk_pjtbu' },
				{ name : 'det_iujk_surveylulus', type : 'int', mapping : 'det_iujk_surveylulus' },
				
				{ name : 'iujk_perusahaan', type : 'string', mapping : 'iujk_perusahaan' },
				{ name : 'iujk_alamat', type : 'string', mapping : 'iujk_alamat' },
				{ name : 'iujk_direktur', type : 'string', mapping : 'iujk_direktur' },
				{ name : 'iujk_golongan', type : 'string', mapping : 'iujk_golongan' },
				{ name : 'iujk_kualifikasi', type : 'string', mapping : 'iujk_kualifikasi' },
				{ name : 'iujk_bidangusaha', type : 'string', mapping : 'iujk_bidangusaha' },
				{ name : 'iujk_rt', type : 'int', mapping : 'iujk_rt' },
				{ name : 'iujk_rw', type : 'int', mapping : 'iujk_rw' },
				{ name : 'iujk_kelurahan', type : 'string', mapping : 'iujk_kelurahan' },
				{ name : 'iujk_kota', type : 'string', mapping : 'iujk_kota' },
				{ name : 'iujk_propinsi', type : 'string', mapping : 'iujk_propinsi' },
				{ name : 'iujk_telepon', type : 'string', mapping : 'iujk_telepon' },
				{ name : 'iujk_kodepos', type : 'string', mapping : 'iujk_kodepos' },
				{ name : 'iujk_fax', type : 'string', mapping : 'iujk_fax' },
				{ name : 'iujk_npwp', type : 'string', mapping : 'iujk_npwp' },
				{ name : 'det_iujk_proses', type : 'string', mapping : 'det_iujk_proses' },
				{ name : 'lamaproses', type : 'string', mapping : 'lamaproses' },
				{ name : 'det_iujk_proses', type : 'string', mapping : 'det_iujk_proses' },
				{ name : 'det_iujk_retribusi', type : 'int', mapping : 'det_iujk_retribusi' },
				{ name : 'permohonan_id', type : 'int', mapping : 'permohonan_id' },
				{ name : 'pemohon_id', type : 'int', mapping : 'pemohon_id' },
				{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
				{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
				{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
				{ name : 'pemohon_npwp', type : 'string', mapping : 'pemohon_npwp' },
				{ name : 'pemohon_rt', type : 'int', mapping : 'pemohon_rt' },
				{ name : 'pemohon_rw', type : 'int', mapping : 'pemohon_rw' },
				{ name : 'pemohon_kel', type : 'string', mapping : 'pemohon_kel' },
				{ name : 'pemohon_kec', type : 'string', mapping : 'pemohon_kec' },
				{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
				{ name : 'pemohon_stra', type : 'string', mapping : 'pemohon_stra' },
				{ name : 'pemohon_surattugas', type : 'string', mapping : 'pemohon_surattugas' },
				{ name : 'pemohon_pekerjaan', type : 'string', mapping : 'pemohon_pekerjaan' },
				{ name : 'pemohon_tempatlahir', type : 'string', mapping : 'pemohon_tempatlahir' },
				{ name : 'pemohon_tanggallahir', type : 'date', dateFormat : 'Y-m-d', mapping : 'pemohon_tanggallahir' },
				{ name : 'pemohon_user_id', type : 'int', mapping : 'pemohon_user_id' },
				{ name : 'pemohon_pendidikan', type : 'string', mapping : 'pemohon_pendidikan' },
				{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
				{ name : 'perusahaan_id', type : 'int', mapping : 'perusahaan_id' },
				{ name : 'perusahaan_npwp', type : 'string', mapping : 'perusahaan_npwp' },
				{ name : 'perusahaan_nama', type : 'string', mapping : 'perusahaan_nama' },
				{ name : 'perusahaan_noakta', type : 'string', mapping : 'perusahaan_noakta' },
				{ name : 'perusahaan_notaris', type : 'string', mapping : 'perusahaan_notaris' },
				{ name : 'perusahaan_tglakta', type : 'date', dateFormat : 'Y-m-d', mapping : 'perusahaan_tglakta' },
				{ name : 'perusahaan_bentuk_id', type : 'int', mapping : 'perusahaan_bentuk_id' },
				{ name : 'perusahaan_kualifikasi_id', type : 'int', mapping : 'perusahaan_kualifikasi_id' },
				{ name : 'perusahaan_alamat', type : 'string', mapping : 'perusahaan_alamat' },
				{ name : 'perusahaan_rt', type : 'int', mapping : 'perusahaan_rt' },
				{ name : 'perusahaan_rw', type : 'int', mapping : 'perusahaan_rw' },
				{ name : 'perusahaan_propinsi_id', type : 'int', mapping : 'perusahaan_propinsi_id' },
				{ name : 'perusahaan_kabkota_id', type : 'int', mapping : 'perusahaan_kabkota_id' },
				{ name : 'perusahaan_kecamatan_id', type : 'int', mapping : 'perusahaan_kecamatan_id' },
				{ name : 'perusahaan_desa_id', type : 'int', mapping : 'perusahaan_desa_id' },
				{ name : 'perusahaan_kodepos', type : 'string', mapping : 'perusahaan_kodepos' },
				{ name : 'perusahaan_telp', type : 'string', mapping : 'perusahaan_telp' },
				{ name : 'perusahaan_fax', type : 'string', mapping : 'perusahaan_fax' },
				{ name : 'perusahaan_stempat_id', type : 'int', mapping : 'perusahaan_stempat_id' },
				{ name : 'perusahaan_sperusahaan_id', type : 'int', mapping : 'perusahaan_sperusahaan_id' },
				{ name : 'perusahaan_usaha', type : 'string', mapping : 'perusahaan_usaha' },
				{ name : 'perusahaan_butara', type : 'string', mapping : 'perusahaan_butara' },
				{ name : 'perusahaan_bselatan', type : 'string', mapping : 'perusahaan_bselatan' },
				{ name : 'perusahaan_btimur', type : 'string', mapping : 'perusahaan_btimur' },
				{ name : 'perusahaan_bbarat', type : 'string', mapping : 'perusahaan_bbarat' },
				{ name : 'perusahaan_modal', type : 'float', mapping : 'perusahaan_modal' },
				{ name : 'perusahaan_merk', type : 'int', mapping : 'perusahaan_merk' },
				{ name : 'perusahaan_jusaha_id', type : 'int', mapping : 'perusahaan_jusaha_id' }
				]
		});
		kelurahan_dataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_public_function/get_kelurahan',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'id'
				},
				actionMethods : {
					read : 'POST'
				}
			}),
			fields : [
				{ name : 'id', type : 'int', mapping : 'id' },
				{ name : 'desa', type : 'string', mapping : 'desa' }
			]
		});
		kecamatan_dataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_public_function/get_kecamatan',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'id'
				},
				actionMethods : {
					read : 'POST'
				}
			}),
			fields : [
				{ name : 'id', type : 'int', mapping : 'id' },
				{ name : 'kecamatan', type : 'string', mapping : 'kecamatan' }
			]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		iujk_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						iujk_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						iujk_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						iujk_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						iujk_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						iujk_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						iujk_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						iujk_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						iujk_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var iujk_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : iujk_det_confirmAdd
		});
		var iujk_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : iujk_det_confirmUpdate
		});
		var iujk_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : iujk_det_confirmDelete
		});
		var iujk_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : iujk_det_refresh
		});
		var iujk_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : iujk_det_showSearchWindow
		});
		var iujk_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				iujk_det_printExcel('PRINT');
			}
		});
		var iujk_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				iujk_det_printExcel('EXCEL');
			}
		});
		
		var iujk_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : iujk_det_confirmUpdate
		});
		var iujk_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : iujk_det_confirmDelete
		});
		var iujk_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : iujk_det_refresh
		});
		iujk_det_contextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				iujk_det_contextMenuEdit,iujk_det_contextMenuDelete,'-',iujk_det_contextMenuRefresh
			]
		});
		
		iujk_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : iujk_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						iujk_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						iujk_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/* Start ContextMenu For Action Column */
		var iujk_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujk_det/switchAction',
					params: {
						iujkdet_id : record.get('det_iujk_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/iujk_buktipenerimaan.html');
					}
				});
			}
		});
		var iujk_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujk_det/switchAction',
					params: {
						iujkdet_id : record.get('det_iujk_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/iujk_sk.html');
								break;
							case 'nosk':
								Ext.MessageBox.alert('Warning.','Nomor SK Belum ditetapkan.');
								break;
							case 'notglkadaluarsa':
								Ext.MessageBox.alert('Warning.','Tanggal kadaluarsa belum ditetapkan.');
								break;
							default:
								Ext.MessageBox.show({
									title : 'Warning',
									msg : 'Cetak gagal',
									buttons : Ext.MessageBox.OK,
									animEl : 'save',
									icon : Ext.MessageBox.WARNING
								});
							break;
						}
					}
				});
			}
		});
		var iujk_det_rekom_printCM = Ext.create('Ext.menu.Item',{
			text : 'Rekomendasi',
			tooltip : 'Cetak Surat Rekomendasi',
			handler : function(){
				var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujk_det/switchAction',
					params: {
						iujkdet_id : record.get('det_iujk_id'),
						action : 'CETAKREKOMENDASI'
					},success : function(){
						window.open('../print/iujk_rekomendasi.html');
					}
				});
			}
		});
		var iujk_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_iujk_det/switchAction',
					params: {
						iujkdet_id : record.get('det_iujk_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/iujk_lembarkontrol.html');
					}
				});
			}
		});
		var iujk_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				iujk_det_bp_printCM,iujk_det_lk_printCM,iujk_det_rekom_printCM,iujk_det_sk_printCM
			]
		});
		function iujk_det_ubahProses(proses){
			var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_iujk_det/switchAction',
				params: {
					iujkdet_id : record.get('det_iujk_id'),
					iujkdet_nosk : record.get('det_iujk_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					iujk_det_dataStore.reload();
				}
			});
		}
		
		var iujk_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						iujk_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						iujk_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						iujk_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		iujk_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujk_det_gridPanel',
			constrain : true,
			store : iujk_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujk_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : {forceFit:true},
			multiSelect : true,
			keys : iujk_det_shorcut,
			columns : [
				{
					text : 'Jenis',
					dataIndex : 'det_iujk_jenis',
					width : 100,
					sortable : false,
					renderer : function(value){
						if(value == 1){
							return 'BARU';
						}else{
							return 'PERPANJANGAN';
						}
					}
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_iujk_tanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Nama',
					dataIndex : 'pemohon_nama',
					width : 150,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 150,
					sortable : false,
					flex : 1
				},
				{
					text : 'Telp',
					dataIndex : 'pemohon_telp',
					width : 150,
					sortable : false
				},
				{
					text : 'Perusahaan',
					dataIndex : 'iujk_perusahaan',
					width : 150,
					sortable : false
				},
				{
					text : 'Tgl Berlaku',
					dataIndex : 'det_iujk_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tgl Kadaluarsa',
					dataIndex : 'det_iujk_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_iujk_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Lama Proses',
					dataIndex : 'lamaproses',
					width : 100,
					sortable : false
				},
				{
					text : 'Status',
					dataIndex : 'det_iujk_proses',
					width : 125,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					text : 'Action',
					width:50,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							iujk_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							iujk_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Proses',
					width:45,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							iujk_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Cetak',
					width:50,
					items: [{
						iconCls: 'icon16x16-print',
						tooltip: 'Cetak Dokumen',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							iujk_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				iujk_det_addButton,
				iujk_det_gridSearchField,
				iujk_det_refreshButton,
				iujk_det_printButton,
				iujk_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujk_det_dataStore,
				displayInfo : true
			})/* ,
			listeners : {
				afterrender : function(){
					iujk_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			} */
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_iujk_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_iujk_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/
		});
		det_iujk_iujk_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_iujk_iujk_id',
			fieldLabel : 'Id ',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/
		});
		permohonan_idField = Ext.create('Ext.form.NumberField',{
			name : 'permohonan_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/
		});
		det_iujk_jenisField = Ext.create('Ext.form.ComboBox',{
			name : 'permohonan_jenis',
			fieldLabel : 'Jenis',
			store : new Ext.data.ArrayStore({
				fields : ['jenispermohonan_id', 'jenispermohonan_nama'],
				data : [[1,'BARU'],[2,'PERPANJANGAN']]
			}),
			displayField : 'jenispermohonan_nama',
			valueField : 'jenispermohonan_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true,
			listeners : {
				select : function(cmb, rec){
					if(cmb.getValue() == '2'){
						det_iujk_sklamaField.show();
					}else{
						det_iujk_sklamaField.hide();
					}
				}
			}
		});
		det_iujk_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_iujk_lama',
			fieldLabel : 'Nomor SK Lama',
			store : iujk_det_dataStore,
			displayField : 'det_iujk_sk',
			valueField : 'det_iujk_iujk_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_iujk_sklamaField.getStore();
				var val = det_iujk_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_iujk_sk : val};
				store.load();
				det_iujk_sklamaField.expand();
				det_iujk_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_iujk_sk}<br>Nama Usaha : {iujk_perusahaan}<br>Alamat : {iujk_alamat}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					iujk_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					iujk_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					iujk_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					iujk_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					iujk_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					iujk_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					iujk_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					iujk_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					iujk_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					iujk_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					iujk_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					iujk_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					iujk_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					iujk_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					iujk_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					iujk_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					iujk_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					iujk_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
					iujk_perusahaanField.setValue(rec.get('iujk_perusahaan'));
					iujk_alamatField.setValue(rec.get('iujk_alamat'));
					iujk_direkturField.setValue(rec.get('iujk_direktur'));
					iujk_golonganField.setValue(rec.get('iujk_golongan'));
					iujk_kualifikasiField.setValue(rec.get('iujk_kualifikasi'));
					iujk_bidangusahaField.setValue(rec.get('iujk_bidangusaha'));
					iujk_rtField.setValue(rec.get('iujk_rt'));
					iujk_rwField.setValue(rec.get('iujk_rw'));
					iujk_kelurahanField.setValue(rec.get('iujk_kelurahan'));
					iujk_kotaField.setValue(rec.get('iujk_kota'));
					iujk_propinsiField.setValue(rec.get('iujk_propinsi'));
					iujk_teleponField.setValue(rec.get('iujk_telepon'));
					iujk_kodeposField.setValue(rec.get('iujk_kodepos'));
					iujk_faxField.setValue(rec.get('iujk_fax'));
					iujk_npwpField.setValue(rec.get('iujk_npwp'));
					det_iujk_pj1Field.setValue(rec.get('det_iujk_pj1'));
					det_iujk_pj2Field.setValue(rec.get('det_iujk_pj2'));
					det_iujk_pj3Field.setValue(rec.get('det_iujk_pj3'));
					det_iujk_pjteknisField.setValue(rec.get('det_iujk_pjteknis'));
					det_iujk_pjtbuField.setValue(rec.get('det_iujk_pjtbu'));
				}
			}
		});
		det_iujk_tanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			readOnly : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_iujk_namaField = Ext.create('Ext.form.TextField',{
			name : 'det_iujk_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		det_iujk_nomorregField = Ext.create('Ext.form.TextField',{
			name : 'det_iujk_nomorreg',
			fieldLabel : 'Nomor Reg',
			maxLength : 50,
			hidden : true
		});
		det_iujk_rekomnomorField = Ext.create('Ext.form.TextField',{
			name : 'det_iujk_rekomnomor',
			fieldLabel : 'Nomor Rekom',
			maxLength : 255
		});
		det_iujk_rekomtanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_iujk_rekomtanggal',
			fieldLabel : 'Tanggal Rekom',
			format : 'd-m-Y'
		});
		det_iujk_berlakuField = Ext.create('Ext.form.field.Date',{
			name : 'det_iujk_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y',
			hidden : true
		});
		det_iujk_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
			format : 'd-m-Y'
		});
		det_iujk_pj1Field = Ext.create('Ext.form.TextField',{
			name : 'det_iujk_pj1',
			fieldLabel : 'Penanggung Jawab 1',
			maxLength : 50
		});
		det_iujk_pj2Field = Ext.create('Ext.form.TextField',{
			name : 'det_iujk_pj2',
			fieldLabel : 'Penanggung Jawab 2',
			maxLength : 50
		});
		det_iujk_pj3Field = Ext.create('Ext.form.TextField',{
			name : 'det_iujk_pj3',
			fieldLabel : 'Penanggung Jawab 3',
			maxLength : 50
		});
		det_iujk_pjteknisField = Ext.create('Ext.form.TextField',{
			name : 'det_iujk_pjteknis',
			fieldLabel : 'Penanggung Jawab Teknis',
			maxLength : 50
		});
		det_iujk_pjtbuField = Ext.create('Ext.form.TextField',{
			name : 'det_iujk_pjtbu',
			fieldLabel : 'No. PJT - BU',
			maxLength : 50
		});
		det_iujk_surveylulusField = Ext.create('Ext.form.ComboBox',{
			name : 'det_iujk_surveylulus',
			fieldLabel : 'Lulus Survey ?',
			store : new Ext.data.ArrayStore({
				fields : ['lulus_id', 'lulus_nama'],
				data : [[1,'LULUS'],[2,'TIDAK LULUS']]
			}),
			displayField : 'lulus_nama',
			valueField : 'lulus_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		/* field IUJK */
		iujk_perusahaanField = Ext.create('Ext.form.TextField',{
			name : 'iujk_perusahaan',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		iujk_alamatField = Ext.create('Ext.form.TextField',{
			name : 'iujk_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		iujk_direkturField = Ext.create('Ext.form.TextField',{
			name : 'iujk_direktur',
			fieldLabel : 'Direktur',
			maxLength : 50
		});
		iujk_golonganField = Ext.create('Ext.form.TextField',{
			name : 'iujk_golongan',
			fieldLabel : 'Golongan',
			maxLength : 50
		});
		iujk_kualifikasiField = Ext.create('Ext.form.TextField',{
			name : 'iujk_kualifikasi',
			fieldLabel : 'Kualifikasi',
			maxLength : 50
		});
		iujk_bidangusahaField = Ext.create('Ext.form.TextField',{
			name : 'iujk_bidangusaha',
			fieldLabel : 'Bidang Usaha',
			maxLength : 50
		});
		iujk_rtField = Ext.create('Ext.form.TextField',{
			name : 'iujk_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		iujk_rwField = Ext.create('Ext.form.TextField',{
			name : 'iujk_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		iujk_kelurahanField = Ext.create('Ext.form.TextField',{
			name : 'iujk_kelurahan',
			fieldLabel : 'Kelurahan'
		});
		iujk_kotaField = Ext.create('Ext.form.TextField',{
			name : 'iujk_kota',
			fieldLabel : 'Kota'
		});
		iujk_propinsiField = Ext.create('Ext.form.TextField',{
			name : 'iujk_propinsi',
			fieldLabel : 'Propinsi'
		});
		iujk_teleponField = Ext.create('Ext.form.TextField',{
			name : 'iujk_telepon',
			fieldLabel : 'Telepon',
			maxLength : 20
		});
		iujk_kodeposField = Ext.create('Ext.form.TextField',{
			name : 'iujk_kodepos',
			fieldLabel : 'Kodepos',
			maxLength : 7
		});
		iujk_faxField = Ext.create('Ext.form.TextField',{
			name : 'iujk_fax',
			fieldLabel : 'Fax',
			maxLength : 20
		});
		iujk_npwpField = Ext.create('Ext.form.TextField',{
			name : 'iujk_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		/* end field IUJK */
		
		iujk_det_syaratDataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_iujk_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETSYARAT'
				}
			}),
			fields : [
				{ name : 'iujk_cek_id', type : 'int', mapping : 'iujk_cek_id' },
				{ name : 'iujk_cek_syarat_id', type : 'int', mapping : 'iujk_cek_syarat_id' },
				{ name : 'iujk_cek_iujkdet_id', type : 'int', mapping : 'iujk_cek_iujkdet_id' },
				{ name : 'iujk_cek_iujk_id', type : 'int', mapping : 'iujk_cek_iujk_id' },
				{ name : 'iujk_cek_status', type : 'boolean', mapping : 'iujk_cek_status' },
				{ name : 'iujk_cek_keterangan', type : 'string', mapping : 'iujk_cek_keterangan' },
				{ name : 'iujk_cek_syarat_nama', type : 'string', mapping : 'iujk_cek_syarat_nama' }
				]
		});
		var det_iujk_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		/* START DATA PEMOHON */
		var iujk_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var iujk_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var iujk_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var iujk_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var iujk_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var iujk_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var iujk_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var iujk_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_kel',
			fieldLabel : 'Kelurahan',
			store : kelurahan_dataStore,
			displayField : 'desa',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					kelurahan_dataStore.load();
				}
			}
		});
		var iujk_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_kec',
			fieldLabel : 'Kecamatan',
			store : kecamatan_dataStore,
			displayField : 'kecamatan',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					kecamatan_dataStore.load();
				}
			}
		});
		var iujk_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_nik',
			fieldLabel : 'NIK',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_m_pemohon/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'pemohon_id'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'SEARCH' }
				}),
				fields : [
					{ name : 'pemohon_id', type : 'int', mapping : 'pemohon_id' },
					{ name : 'pemohon_nama', type : 'string', mapping : 'pemohon_nama' },
					{ name : 'pemohon_alamat', type : 'string', mapping : 'pemohon_alamat' },
					{ name : 'pemohon_telp', type : 'string', mapping : 'pemohon_telp' },
					{ name : 'pemohon_npwp', type : 'string', mapping : 'pemohon_npwp' },
					{ name : 'pemohon_rt', type : 'int', mapping : 'pemohon_rt' },
					{ name : 'pemohon_rw', type : 'int', mapping : 'pemohon_rw' },
					{ name : 'pemohon_kel', type : 'string', mapping : 'pemohon_kel' },
					{ name : 'pemohon_kec', type : 'string', mapping : 'pemohon_kec' },
					{ name : 'pemohon_nik', type : 'string', mapping : 'pemohon_nik' },
					{ name : 'pemohon_stra', type : 'string', mapping : 'pemohon_stra' },
					{ name : 'pemohon_surattugas', type : 'string', mapping : 'pemohon_surattugas' },
					{ name : 'pemohon_pekerjaan', type : 'string', mapping : 'pemohon_pekerjaan' },
					{ name : 'pemohon_tempatlahir', type : 'string', mapping : 'pemohon_tempatlahir' },
					{ name : 'pemohon_tanggallahir', type : 'date', dateFormat : 'Y-m-d', mapping : 'pemohon_tanggallahir' },
					{ name : 'pemohon_user_id', type : 'int', mapping : 'pemohon_user_id' },
					{ name : 'pemohon_pendidikan', type : 'string', mapping : 'pemohon_pendidikan' },
					{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
				]
			}),
			displayField : 'pemohon_nik',
			valueField : 'pemohon_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			onTriggerClick: function(event){
				var store = iujk_det_pemohon_nikField.getStore();
				var val = iujk_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				iujk_det_pemohon_nikField.expand();
				iujk_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					iujk_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					iujk_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					iujk_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					iujk_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					iujk_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					iujk_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					iujk_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					iujk_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					iujk_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					iujk_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					iujk_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					iujk_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					iujk_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					iujk_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					iujk_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					iujk_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					iujk_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					iujk_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var iujk_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			maxLength : 50,
			hidden : true
		});
		var iujk_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			maxLength : 50,
			hidden : true
		});
		var iujk_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var iujk_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var iujk_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var iujk_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var iujk_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var iujk_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		/* END DATA PEMOHON */
		det_iujk_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_iujk_syaratGrid',
			store : iujk_det_syaratDataStore,
			loadMask : true,
			width : '100%',
			plugins : [
				Ext.create('Ext.grid.plugin.CellEditing', {
					clicksToEdit: 1
				})
			],
			selType: 'cellmodel',
			columns : [
				{
					text : 'Id',
					dataIndex : 'iujk_cek_id',
					width : 100,
					hidden : true,
					hideable : false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'iujk_cek_syarat_nama',
					width : 250,
					sortable : false,
					editor : {
						xtype : 'textfield',
						readOnly : true
					}
				},
				{
					xtype: 'checkcolumn',
					text: 'Ada?',
					dataIndex: 'iujk_cek_status',
					width: 55,
					stopSelection: false,
					hidden : true
				},
				{
					text : 'Keterangan',
					dataIndex : 'iujk_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		var iujk_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : iujk_det_save
		});
		var iujk_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				iujk_det_resetForm();
				iujk_det_switchToGrid();
			}
		});
		var iujk_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '5. Data Pendukung',
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				det_iujk_surveylulusField,
				det_iujk_nomorregField,
				det_iujk_rekomnomorField,
				det_iujk_rekomtanggalField,
				det_iujk_berlakuField,
				det_iujk_kadaluarsaField
			]
		});
		/* START DATA RETRIBUSI */
		var iujk_det_retribusiField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 'iujk_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 'iujk_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.iujk_retribusi == 1){
						iujk_det_retibusiNilaiField.show();
					}else{
						iujk_det_retibusiNilaiField.hide();
					}
				}
			}
		});
		var iujk_det_retibusiNilaiField = Ext.create('Ext.form.TextField',{
			name : 'permohonan_retribusi',
			fieldLabel : 'Nominal Retribusi ',
			maxLength : 100,
			hidden : true,
			value : 0
		});
		iujk_det_retibusiTanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_retribusi_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			hidden : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		var iujk_det_retribusifieldset = Ext.create('Ext.form.FieldSet',{
			title : '6. Data Retribusi',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				iujk_det_retribusiField,
				iujk_det_retibusiNilaiField,
				iujk_det_retibusiTanggalField
			]
		});
		/* END DATA RETRIBUSI */
		/* START BIDANG */
		<?php 
		$bidangcheckbox = array();
		$bidangpanel = array();
		foreach($bidang AS $sub_bidang){ 
			$nm_bid = strtolower($sub_bidang->bidang);
			$nm_bid_nospc = str_replace(' ','', $nm_bid);
			$nm_bid_chk = 'iujk_' . $nm_bid_nospc . '_checkbox';
			$nm_bid_pnl = 'iujk_' . $nm_bid_nospc . '_panel';
			$bidangcheckbox[] = $nm_bid_chk;
			$bidangpanel[] = $nm_bid_pnl;
			
			echo "var iujk_bidang".$nm_bid_nospc."_proyekField = Ext.create('Ext.form.TextField',{
				fieldLabel : 'Proyek Bidang', maxLength : 50 });";
			echo "var iujk_bidang".$nm_bid_nospc."_tahunField = Ext.create('Ext.form.TextField',{
				fieldLabel : 'Tahun Proyek', maxLength : 50 });";
			echo "var iujk_bidang".$nm_bid_nospc."_nilaiField = Ext.create('Ext.form.TextField',{
				fieldLabel : 'Nilai Proyek', maxLength : 50 });";
			foreach($bidangsub as $sub_bidangsub){
			if($sub_bidangsub->bidang_jasa_id == $sub_bidang->id){
				$subid = $sub_bidangsub->id;
				echo "var iujk_bidang".$nm_bid_nospc."_sub".$subid."Field = Ext.create('Ext.form.Checkbox',{
					boxLabel  : '".$sub_bidangsub->nama."', inputValue: '1' });
					";
			}
			}
			
			echo "var ". $nm_bid_pnl. " = Ext.create('Ext.form.Panel', {";
			echo "bodyPadding: 10, height : 200, hidden : true,autoScroll:true, items: [ ";
				echo "iujk_bidang".$nm_bid_nospc."_proyekField,";
				echo "iujk_bidang".$nm_bid_nospc."_tahunField,";
				echo "iujk_bidang".$nm_bid_nospc."_nilaiField,";				
				foreach($bidangsub as $sub_bidangsub){
					if($sub_bidangsub->bidang_jasa_id == $sub_bidang->id){
						$subid = $sub_bidangsub->id;
						echo "iujk_bidang".$nm_bid_nospc."_sub".$subid."Field,";
					}
				}
			echo "] });
			";
			
			
			echo "var " . $nm_bid_chk . " = Ext.create('Ext.form.Checkbox',{";
			echo "boxLabel  : '" . ucwords($nm_bid) . "', inputValue: '1' ,
			listeners : {
				change : function(cmp, newVal, oldVal, e ){
					if(newVal == true){
						iujk_".$nm_bid_nospc."_panel.show();
					}else{
						iujk_".$nm_bid_nospc."_panel.hide();
					}
				}
			}
			}); ";
		} ?>
		/* END BIDANG */
		
		/* START DATA PERUSAHAAN */
		perusahaan_idField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_id',
			hidden : true
		});
		perusahaan_npwpField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_npwp',
			fieldLabel : 'NPWP/NPWPD',
			pageSize : 15,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_perusahaan/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'id'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'GETLIST' }
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'npwp', type : 'string', mapping : 'npwp' },
					{ name : 'nama', type : 'string', mapping : 'nama' },
					{ name : 'noakta', type : 'string', mapping : 'noakta' },
					{ name : 'notaris', type : 'string', mapping : 'notaris' },
					{ name : 'tglakta', type : 'date',dateFormat : 'Y-m-d', mapping : 'tglakta' },
					{ name : 'bentuk_id', type : 'int', mapping : 'bentuk_id' },
					{ name : 'kualifikasi_id', type : 'int', mapping : 'kualifikasi_id' },
					{ name : 'alamat', type : 'string', mapping : 'alamat' },
					{ name : 'rt', type : 'int', mapping : 'rt' },
					{ name : 'rw', type : 'int', mapping : 'rw' },
					{ name : 'propinsi_id', type : 'int', mapping : 'propinsi_id' },
					{ name : 'kabkota_id', type : 'int', mapping : 'kabkota_id' },
					{ name : 'kecamatan_id', type : 'int', mapping : 'kecamatan_id' },
					{ name : 'desa_id', type : 'int', mapping : 'desa_id' },
					{ name : 'kodepos', type : 'string', mapping : 'kodepos' },
					{ name : 'telp', type : 'string', mapping : 'telp' },
					{ name : 'fax', type : 'string', mapping : 'fax' },
					{ name : 'stempat_id', type : 'int', mapping : 'stempat_id' },
					{ name : 'sperusahaan_id', type : 'int', mapping : 'sperusahaan_id' },
					{ name : 'usaha', type : 'string', mapping : 'usaha' },
					{ name : 'butara', type : 'string', mapping : 'butara' },
					{ name : 'bselatan', type : 'string', mapping : 'bselatan' },
					{ name : 'btimur', type : 'string', mapping : 'btimur' },
					{ name : 'bbarat', type : 'string', mapping : 'bbarat' },
					{ name : 'modal', type : 'float', mapping : 'modal' },
					{ name : 'merk', type : 'int', mapping : 'merk' },
					{ name : 'jusaha_id', type : 'int', mapping : 'jusaha_id' }
				]
			}),
			displayField : 'npwp',
			valueField : 'id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			onTriggerClick: function(event){
				var store = perusahaan_npwpField.getStore();
				var val = perusahaan_npwpField.getRawValue();
				store.proxy.extraParams = {action : 'GETLIST',query : val};
				store.load();
				perusahaan_npwpField.expand();
				perusahaan_npwpField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NPWP : {npwp}<br>Nama : {nama}<br>Alamat : {alamat}</div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					perusahaan_idField.setValue(rec.get('id'));
					perusahaan_npwpField.setValue(rec.get('npwp'));
					perusahaan_namaField.setValue(rec.get('nama'));
					perusahaan_noaktaField.setValue(rec.get('noakta'));
					perusahaan_notarisField.setValue(rec.get('notaris'));
					perusahaan_tglaktaField.setValue(rec.get('tglakta'));
					perusahaan_bentuk_idField.setValue(rec.get('bentuk_id'));
					perusahaan_kualifikasi_idField.setValue(rec.get('kualifikasi_id'));
					perusahaan_alamatField.setValue(rec.get('alamat'));
					perusahaan_rtField.setValue(rec.get('rt'));
					perusahaan_rwField.setValue(rec.get('rw'));
					perusahaan_propinsi_idField.setValue(rec.get('propinsi_id'));
					perusahaan_kabkota_idField.setValue(rec.get('kabkota_id'));
					perusahaan_desa_idField.setValue(rec.get('desa_id'));
					perusahaan_kecamatan_idField.setValue(rec.get('kecamatan_id'));
					perusahaan_kodeposField.setValue(rec.get('kodepos'));
					perusahaan_telpField.setValue(rec.get('telp'));
					perusahaan_faxField.setValue(rec.get('fax'));
					perusahaan_stempat_idField.setValue(rec.get('stempat_id'));
					perusahaan_sperusahaan_idField.setValue(rec.get('sperusahaan_id'));
					perusahaan_usahaField.setValue(rec.get('usaha'));
					perusahaan_butaraField.setValue(rec.get('butara'));
					perusahaan_bselatanField.setValue(rec.get('bselatan'));
					perusahaan_btimurField.setValue(rec.get('btimur'));
					perusahaan_bbaratField.setValue(rec.get('bbarat'));
					perusahaan_modalField.setValue(rec.get('modal'));
					perusahaan_merkField.setValue(rec.get('merk'));
					perusahaan_jusaha_idField.setValue(rec.get('jusaha_id'));
				}
			}
		});
		perusahaan_namaField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_nama',
			fieldLabel : 'Nama',
			maxLength : 100
		});
		perusahaan_noaktaField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_noakta',
			fieldLabel : 'No. Akta',
			maxLength : 100
		});
		perusahaan_notarisField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_notaris',
			fieldLabel : 'Notaris',
			maxLength : 100
		});
		perusahaan_tglaktaField = Ext.create('Ext.form.field.Date',{
			name : 'perusahaan_tglakta',
			fieldLabel : 'Tgl Akta',
			format : 'd-m-Y',
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		perusahaan_bentuk_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_bentuk_id',
			fieldLabel : 'Bentuk',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_bentuk_perusahaan',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'nama', type : 'string', mapping : 'nama' }
				]
			}),
			displayField : 'nama',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_bentuk_idField.getStore().load();
				}
			}
		});
		perusahaan_kualifikasi_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_kualifikasi_id',
			fieldLabel : 'Kualifikasi',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_kualifikasi',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'kualifikasi', type : 'string', mapping : 'kualifikasi' }
				]
			}),
			displayField : 'kualifikasi',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_kualifikasi_idField.getStore().load();
				}
			}
		});
		perusahaan_alamatField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		perusahaan_rtField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_rt',
			fieldLabel : 'RT',
			maxLength : 10
		});
		perusahaan_rwField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_rw',
			fieldLabel : 'RW',
			maxLength : 10
		});
		perusahaan_propinsi_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_propinsi_id',
			fieldLabel : 'Propinsi',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_propinsi',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'propinsi', type : 'string', mapping : 'propinsi' }
				]
			}),
			displayField : 'propinsi',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_propinsi_idField.getStore().load();
				}
			}
		});
		perusahaan_kabkota_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_kabkota_id',
			fieldLabel : 'Kota',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_kabkota',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'kabkota', type : 'string', mapping : 'kabkota' }
				]
			}),
			displayField : 'kabkota',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_kabkota_idField.getStore().load();
				}
			}
		});
		perusahaan_desa_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_desa_id',
			fieldLabel : 'Desa',
			store : kelurahan_dataStore,
			displayField : 'desa',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local'
		});
		perusahaan_kecamatan_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_kecamatan_id',
			fieldLabel : 'Kecamatan',
			store : kecamatan_dataStore,
			displayField : 'kecamatan',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local'
		});
		perusahaan_kodeposField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_kodepos',
			fieldLabel : 'Kodepos',
			maxLength : 20
		});
		perusahaan_telpField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_telp',
			fieldLabel : 'Telp',
			maxLength : 50
		});
		perusahaan_faxField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_fax',
			fieldLabel : 'Fax',
			maxLength : 50
		});
		perusahaan_stempat_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_stempat_id',
			fieldLabel : 'Status Tempat',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_status_tempat',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'status', type : 'string', mapping : 'status' }
				]
			}),
			displayField : 'status',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_stempat_idField.getStore().load();
				}
			}
		});
		perusahaan_sperusahaan_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_sperusahaan_id',
			fieldLabel : 'Status Usaha',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_status_usaha',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'status', type : 'string', mapping : 'status' }
				]
			}),
			displayField : 'status',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_sperusahaan_idField.getStore().load();
				}
			}
		});
		perusahaan_usahaField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_usaha',
			fieldLabel : 'Usaha',
			maxLength : 100
		});
		perusahaan_butaraField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_butara',
			fieldLabel : 'Batas Utara',
			maxLength : 100
		});
		perusahaan_bselatanField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_bselatan',
			fieldLabel : 'Batas Selatan',
			maxLength : 100
		});
		perusahaan_btimurField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_btimur',
			fieldLabel : 'Batas Timur',
			maxLength : 100
		});
		perusahaan_bbaratField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_bbarat',
			fieldLabel : 'Batas Barat',
			maxLength : 100
		});
		perusahaan_modalField = Ext.create('Ext.form.TextField',{
			name : 'perusahaan_modal',
			fieldLabel : 'Modal',
			maxLength : 50
		});
		perusahaan_merkField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_merk',
			fieldLabel : 'Merk',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_merk',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'merk', type : 'string', mapping : 'merk' }
				]
			}),
			displayField : 'merk',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_merkField.getStore().load();
				}
			}
		});
		perusahaan_jusaha_idField = Ext.create('Ext.form.ComboBox',{
			name : 'perusahaan_jusaha_id',
			fieldLabel : 'Jenis Usaha',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_public_function/get_jenis_usaha',
					reader : {
						type : 'json',
						root : 'results',
						rootProperty : 'results',
						totalProperty : 'total',
						idProperty : 'id'
					},
					actionMethods : {
						read : 'POST'
					}
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'usaha', type : 'string', mapping : 'usaha' }
				]
			}),
			displayField : 'usaha',
			valueField : 'id',
			triggerAction : 'all',
			queryMode : 'local',
			listeners : {
				afterrender : function(){
					perusahaan_jusaha_idField.getStore().load();
				}
			}
		});
		/* END DATA PERUSAHAAN */
		iujk_det_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			fieldDefaults: {
				msgTarget: 'side'
			},
			layout : {
				type : 'vbox',
				align : 'stretch',
				padding : 5
			},
			items: [
				{
					xtype : 'container',
					layout : 'hbox',
					style : {borderWidth :'0px'},
					defaultType : 'textfield',
					defaults : {anchor : '95%'},
					layout : 'anchor',
					flex : 2,
					items : [
						{
							xtype : 'fieldset',
							title : '1. Data Permohonan',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_iujk_idField,
								det_iujk_iujk_idField,
								permohonan_idField,
								det_iujk_jenisField,
								det_iujk_sklamaField,
								det_iujk_tanggalField
							]
						},
						{
							xtype : 'fieldset',
							title : '2. Data Pemohon ',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								iujk_det_pemohon_idField,
								iujk_det_pemohon_nikField,
								iujk_det_pemohon_namaField,
								iujk_det_pemohon_alamatField,
								iujk_det_pemohon_telpField,
								iujk_det_pemohon_npwpField,
								iujk_det_pemohon_rtField,
								iujk_det_pemohon_rwField,
								iujk_det_pemohon_kelField,
								iujk_det_pemohon_kecField,
								iujk_det_pemohon_straField,
								iujk_det_pemohon_surattugasField,
								iujk_det_pemohon_pekerjaanField,
								iujk_det_pemohon_tempatlahirField,
								iujk_det_pemohon_tanggallahirField,
								iujk_det_pemohon_user_idField,
								iujk_det_pemohon_pendidikanField,
								iujk_det_pemohon_tahunlulusField
							]
						},
						{
							xtype : 'fieldset',
							title : '3. Data Perusahaan',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								/* iujk_perusahaanField,
								iujk_alamatField,
								iujk_kualifikasiField,
								iujk_rtField,
								iujk_rwField,
								iujk_kelurahanField,
								iujk_kotaField,
								iujk_propinsiField,
								iujk_teleponField,
								iujk_kodeposField,
								iujk_faxField,
								iujk_npwpField, */
								perusahaan_idField,
								perusahaan_npwpField,
								perusahaan_namaField,
								perusahaan_noaktaField,
								iujk_direkturField,
								iujk_golonganField,
								iujk_bidangusahaField,
								perusahaan_notarisField,
								perusahaan_tglaktaField,
								perusahaan_bentuk_idField,
								perusahaan_kualifikasi_idField,
								perusahaan_alamatField,
								perusahaan_rtField,
								perusahaan_rwField,
								perusahaan_propinsi_idField,
								perusahaan_kabkota_idField,
								perusahaan_kecamatan_idField,
								perusahaan_desa_idField,
								perusahaan_kodeposField,
								perusahaan_telpField,
								perusahaan_faxField,
								perusahaan_stempat_idField,
								perusahaan_sperusahaan_idField,
								perusahaan_usahaField,
								perusahaan_butaraField,
								perusahaan_bselatanField,
								perusahaan_btimurField,
								perusahaan_bbaratField,
								perusahaan_modalField,
								perusahaan_merkField,
								perusahaan_jusaha_idField,
								det_iujk_pj1Field,
								det_iujk_pj2Field,
								det_iujk_pj3Field,
								det_iujk_pjteknisField,
								det_iujk_pjtbuField,
								Ext.create('Ext.form.Label',{ html : '<b>Bidang Pekerjaan</b>'}),
								<?php
								for($i=0;$i<count($bidangcheckbox);$i++){
									echo $bidangcheckbox[$i].',';
									echo $bidangpanel[$i].',';
								}
								?>
							]
						},
						{
							xtype : 'fieldset',
							title : '4. Data Ceklist',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_iujk_syaratGrid
							]
						},
						iujk_det_pendukungfieldset,iujk_det_retribusifieldset,
						Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
					]
				}
			],
			buttons : [iujk_det_saveButton,iujk_det_cancelButton]
		});
		iujk_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_det_formWindow',
			renderTo : 'iujk_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + iujk_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [iujk_det_formPanel]
		});
/* End FormPanel declaration */
	<?php if(@$_SESSION['IDHAK'] == 2){ ?>
		iujk_det_lk_printCM.hide();
		iujk_det_rekom_printCM.hide();
		iujk_det_sk_printCM.hide();
		iujk_det_pendukungfieldset.hide();
		iujk_det_gridPanel.columns[11].setVisible(false);
		iujk_det_gridPanel.columns[12].setVisible(false);
	<?php } ?>
});
</script>
<div id="iujk_detSaveWindow"></div>
<div class="container col-md-12" id="iujk_detGrid"></div>