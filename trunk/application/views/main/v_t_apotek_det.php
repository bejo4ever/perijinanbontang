<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4 class="container">IZIN APOTEK</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var apotek_det_componentItemTitle="Izin Apotek";
		var apotek_det_dataStore;
		
		var apotek_det_shorcut;
		var apotek_det_contextMenu;
		var apotek_det_gridSearchField;
		var apotek_det_gridPanel;
		var apotek_det_formPanel;
		var apotek_det_formWindow;
		var apotek_det_searchPanel;
		var apotek_det_searchWindow;
		
		var det_apotek_idField;
		var det_apotek_apotek_idField;
		var det_apotek_jenisField;
		var det_apotek_sklamaField;
		var det_apotek_surveylulusField;
		var det_apotek_namaField;
		var det_apotek_alamatField;
		var det_apotek_telpField;
		var det_apotek_spField;
		var det_apotek_ktpField;
		var det_apotek_tempatlahirField;
		var det_apotek_tanggallahirField;
		var det_apotek_pekerjaanField;
		var det_apotek_npwpField;
		var det_apotek_straField;
		var det_apotek_pendidikanField;
		var det_apotek_tahunlulusField;
		var det_apotek_terimaField;
		var det_apotek_terimatanggalField;
		var det_apotek_tanggalField;
		var det_apotek_kelengkapanField;
		var det_apotek_bapField;
		var det_apotek_skField;
		var det_apotek_baptanggalField;
		var det_apotek_berlakuField;
		var det_apotek_kadaluarsaField;
		var det_apotek_keputusanField;
		var det_apotek_keteranganField;
		var det_apotek_jarakField;
		var det_apotek_rracikField;
		var det_apotek_radminField;
		var det_apotek_rkerjaField;
		var det_apotek_rtungguField;
		var det_apotek_rwcField;
		var det_apotek_airField;
		var det_apotek_listrikField;
		var det_apotek_apkField;
		var det_apotek_apkukuranField;
		var det_apotek_jendelaField;
		var det_apotek_limbahField;
		var det_apotek_baksampahField;
		var det_apotek_parkirField;
		var det_apotek_papannamaField;
		var det_apotek_pengelolaField;
		var det_apotek_pendampingField;
		var det_apotek_asistenField;
		var det_apotek_luasField;
		var det_apotek_statustanahField;
		var det_apotek_sewalamaField;
		var det_apotek_sewaawalField;
		var det_apotek_sewaakhirField;
		var det_apotek_shnomorField;
		var det_apotek_shtahunField;
		var det_apotek_shgssuField;
		var det_apotek_shtanggalField;
		var det_apotek_shanField;
		var det_apotek_aktanoField;
		var det_apotek_aktatahunField;
		var det_apotek_aktanotarisField;
		var det_apotek_aktaanField;
		var det_apotek_ckutipanField;
		var det_apotek_ckecField;
		var det_apotek_ctanggalField;
		var det_apotek_cpetokField;
		var det_apotek_cpersilField;
		var det_apotek_ckelasField;
		var det_apotek_canField;
		var det_apotek_sppihak1Field;
		var det_apotek_sppihak2Field;
		var det_apotek_spnomorField;
		var det_apotek_sptanggalField;
		var det_apotek_notarisField;
		
		var apotek_namaField;
		var apotek_alamatField;
		var apotek_telpField;
		var apotek_kelField;
		var apotek_kecField;
		var apotek_kepemilikanField;
		var apotek_pemilikField;
		var apotek_pemilikalamatField;
		var apotek_pemiliknpwpField;
		var apotek_siupField;
		
		var apotek_det_dbTask = 'CREATE';
		var apotek_det_dbTaskMessage = 'Tambah';
		var apotek_det_dbPermission = 'CRUD';
		var apotek_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function apotek_det_switchToGrid(){
			apotek_det_formPanel.setDisabled(true);
			apotek_det_gridPanel.setDisabled(false);
			apotek_det_formWindow.hide();
		}
		
		function apotek_det_switchToForm(){
			apotek_det_gridPanel.setDisabled(true);
			apotek_det_formPanel.setDisabled(false);
			apotek_det_formWindow.show();
		}
		
		function apotek_det_confirmAdd(){
			apotek_det_dbTask = 'CREATE';
			apotek_det_dbTaskMessage = 'created';
			apotek_det_resetForm();
			apotek_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			apotek_det_syaratDataStore.load();
			apotek_det_perlengkapanDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETPERLENGKAPAN'
			};
			apotek_det_perlengkapanDataStore.load();
			apotek_det_switchToForm();
		}
		
		function apotek_det_confirmUpdate(){
			if(apotek_det_gridPanel.selModel.getCount() == 1) {
				apotek_det_dbTask = 'UPDATE';
				apotek_det_dbTaskMessage = 'updated';
				apotek_det_switchToForm();
				apotek_det_setForm();
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
		
		function apotek_det_confirmDelete(){
			if(apotek_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, apotek_det_delete);
			}else if(apotek_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, apotek_det_delete);
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
		
		function apotek_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(apotek_det_dbPermission)==false && pattC.test(apotek_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(apotek_det_confirmFormValid()){
					var array_apotek_cek_id=new Array();
					var array_apotek_cek_syarat_id=new Array();
					var array_apotek_cek_status=new Array();
					var array_apotek_cek_keterangan=new Array();
					if(apotek_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<apotek_det_syaratDataStore.getCount();i++){
							array_apotek_cek_id.push(apotek_det_syaratDataStore.getAt(i).data.apotek_cek_id);
							array_apotek_cek_syarat_id.push(apotek_det_syaratDataStore.getAt(i).data.apotek_cek_syarat_id);
							array_apotek_cek_status.push(apotek_det_syaratDataStore.getAt(i).data.apotek_cek_status);
							array_apotek_cek_keterangan.push(apotek_det_syaratDataStore.getAt(i).data.apotek_cek_keterangan);
						}
					}
					
					var array_apotek_ket_id=new Array();
					var array_apotek_ket_perlengkapanid=new Array();
					var array_apotek_ket_status=new Array();
					var array_apotek_ket_jumlah=new Array();
					if(apotek_det_perlengkapanDataStore.getCount() > 0){
						for(var i=0;i<apotek_det_perlengkapanDataStore.getCount();i++){
							array_apotek_ket_id.push(apotek_det_perlengkapanDataStore.getAt(i).data.apotek_ket_id);
							array_apotek_ket_perlengkapanid.push(apotek_det_perlengkapanDataStore.getAt(i).data.apotek_ket_perlengkapanid);
							array_apotek_ket_status.push(apotek_det_perlengkapanDataStore.getAt(i).data.apotek_ket_status);
							array_apotek_ket_jumlah.push(apotek_det_perlengkapanDataStore.getAt(i).data.apotek_ket_jumlah);
						}
					}
					
					var asisten_id = new Array();
					var asisten_nama = new Array();
					var asisten_sik = new Array();
					var asisten_lulus = new Array();
					var asisten_alamat = new Array();
					if(det_apotek_asisten_dataStore.getCount() > 0){
						for(var i=0;i<det_apotek_asisten_dataStore.getCount();i++){
							asisten_id.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_id);
							asisten_nama.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_nama);
							asisten_sik.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_sik);
							asisten_lulus.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_lulus);
							asisten_alamat.push(det_apotek_asisten_dataStore.getAt(i).data.asisten_alamat);
						}
					}
					
					var params = apotek_det_formPanel.getForm().getValues();
					params.ijin_id = 25;
					params.action = apotek_det_dbTask;
					params.apotek_cek_id = array_apotek_cek_id;
					params.apotek_cek_syarat_id = array_apotek_cek_syarat_id;
					params.apotek_cek_status = array_apotek_cek_status;
					params.apotek_cek_keterangan = array_apotek_cek_keterangan;
					params.apotek_ket_id = array_apotek_ket_id;
					params.apotek_ket_perlengkapanid = array_apotek_ket_perlengkapanid;
					params.apotek_ket_status = array_apotek_ket_status;
					params.apotek_ket_jumlah = array_apotek_ket_jumlah;
					params.asisten_id = asisten_id;
					params.asisten_nama = asisten_nama;
					params.asisten_sik = asisten_sik;
					params.asisten_lulus = asisten_lulus;
					params.asisten_alamat = asisten_alamat;
					
					params = Ext.encode(params);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_apotek_det/switchAction',
						params: {
							action : apotek_det_dbTask,
							params : params
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									apotek_det_dataStore.reload();
									apotek_det_resetForm();
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave, function(){
										window.scrollTo(0,0);
									});
									apotek_det_switchToGrid();
									apotek_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function apotek_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(apotek_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = apotek_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< apotek_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_apotek_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_apotek_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									apotek_det_dataStore.reload();
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
		
		function apotek_det_refresh(){
			apotek_det_dbListAction = "GETLIST";
			apotek_det_gridSearchField.reset();
			apotek_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			apotek_det_dataStore.proxy.extraParams.query = "";
			apotek_det_dataStore.currentPage = 1;
			apotek_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function apotek_det_confirmFormValid(){
			return apotek_det_formPanel.getForm().isValid();
		}
		
		function apotek_det_resetForm(){
			apotek_det_dbTask = 'CREATE';
			apotek_det_dbTaskMessage = 'create';
			apotek_det_formPanel.getForm().reset();
			det_apotek_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function apotek_det_setForm(){
			apotek_det_dbTask = 'UPDATE';
            apotek_det_dbTaskMessage = 'update';
			
			var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
			apotek_det_formPanel.loadRecord(record);
			det_apotek_idField.setValue(record.data.det_apotek_id);
			det_apotek_apotek_idField.setValue(record.data.det_apotek_apotek_id);
			det_apotek_jenisField.setValue(record.data.det_apotek_jenis);
			if(record.data.det_apotek_retribusi != 0){
				apotek_det_retribusiField.setValue({ apotek_retribusi : ['1'] });
			}else{
				apotek_det_retribusiField.setValue({ apotek_retribusi : ['0'] });
			}
			apotek_det_retibusiNilaiField.setValue(record.data.det_apotek_retribusi);
			
			apotek_det_syaratDataStore.proxy.extraParams = { 
				apotek_id : record.data.det_apotek_apotek_id,
				apotek_det_id : record.data.det_apotek_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			apotek_det_syaratDataStore.load();
			apotek_det_perlengkapanDataStore.proxy.extraParams = { 
				apotek_id : record.data.det_apotek_apotek_id,
				apotek_det_id : record.data.det_apotek_id,
				currentAction : 'update',
				action : 'GETPERLENGKAPAN'
			};
			apotek_det_perlengkapanDataStore.load();
			det_apotek_asisten_dataStore.proxy.extraParams = { 
				apotek_id : record.data.det_apotek_apotek_id,
				apotek_det_id : record.data.det_apotek_id,
				currentAction : 'update',
				action : 'GETASISTEN'
			};
			det_apotek_asisten_dataStore.load();
		}
		
		function apotek_det_showSearchWindow(){
			apotek_det_searchWindow.show();
		}
		
		function apotek_det_printExcel(outputType){
			var searchText = "";
			if(apotek_det_dataStore.proxy.extraParams.query!==null){searchText = apotek_det_dataStore.proxy.extraParams.query;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_apotek_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					currentAction : apotek_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('../print/t_apotek_det_list.xls');
							}else{
								window.open('../print/t_apotek_det_list.html','apotek_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		apotek_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'apotek_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_apotek_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_apotek_id', type : 'int', mapping : 'det_apotek_id' },
				{ name : 'det_apotek_apotek_id', type : 'int', mapping : 'det_apotek_apotek_id' },
				{ name : 'det_apotek_jenis', type : 'int', mapping : 'det_apotek_jenis' },
				{ name : 'det_apotek_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_tanggal' },
				{ name : 'det_apotek_surveylulus', type : 'int', mapping : 'det_apotek_surveylulus' },
				{ name : 'det_apotek_nama', type : 'string', mapping : 'det_apotek_nama' },
				{ name : 'det_apotek_alamat', type : 'string', mapping : 'det_apotek_alamat' },
				{ name : 'det_apotek_telp', type : 'string', mapping : 'det_apotek_telp' },
				{ name : 'det_apotek_sp', type : 'string', mapping : 'det_apotek_sp' },
				{ name : 'det_apotek_ktp', type : 'string', mapping : 'det_apotek_ktp' },
				{ name : 'det_apotek_tempatlahir', type : 'string', mapping : 'det_apotek_tempatlahir' },
				{ name : 'det_apotek_tanggallahir', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_tanggallahir' },
				{ name : 'det_apotek_pekerjaan', type : 'string', mapping : 'det_apotek_pekerjaan' },
				{ name : 'det_apotek_npwp', type : 'string', mapping : 'det_apotek_npwp' },
				{ name : 'det_apotek_stra', type : 'string', mapping : 'det_apotek_stra' },
				{ name : 'det_apotek_pendidikan', type : 'string', mapping : 'det_apotek_pendidikan' },
				{ name : 'det_apotek_tahunlulus', type : 'int', mapping : 'det_apotek_tahunlulus' },
				{ name : 'det_apotek_terima', type : 'string', mapping : 'det_apotek_terima' },
				{ name : 'det_apotek_terimatanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_terimatanggal' },
				{ name : 'det_apotek_kelengkapan', type : 'int', mapping : 'det_apotek_kelengkapan' },
				{ name : 'det_apotek_bap', type : 'string', mapping : 'det_apotek_bap' },
				{ name : 'det_apotek_sk', type : 'string', mapping : 'det_apotek_sk' },
				{ name : 'det_apotek_baptanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_baptanggal' },
				{ name : 'det_apotek_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_berlaku' },
				{ name : 'det_apotek_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_kadaluarsa' },
				{ name : 'det_apotek_keputusan', type : 'int', mapping : 'det_apotek_keputusan' },
				{ name : 'det_apotek_keterangan', type : 'string', mapping : 'det_apotek_keterangan' },
				{ name : 'det_apotek_jarak', type : 'int', mapping : 'det_apotek_jarak' },
				{ name : 'det_apotek_rracik', type : 'int', mapping : 'det_apotek_rracik' },
				{ name : 'det_apotek_radmin', type : 'int', mapping : 'det_apotek_radmin' },
				{ name : 'det_apotek_rkerja', type : 'int', mapping : 'det_apotek_rkerja' },
				{ name : 'det_apotek_rtunggu', type : 'int', mapping : 'det_apotek_rtunggu' },
				{ name : 'det_apotek_rwc', type : 'int', mapping : 'det_apotek_rwc' },
				{ name : 'det_apotek_air', type : 'string', mapping : 'det_apotek_air' },
				{ name : 'det_apotek_listrik', type : 'string', mapping : 'det_apotek_listrik' },
				{ name : 'det_apotek_apk', type : 'int', mapping : 'det_apotek_apk' },
				{ name : 'det_apotek_apkukuran', type : 'string', mapping : 'det_apotek_apkukuran' },
				{ name : 'det_apotek_jendela', type : 'int', mapping : 'det_apotek_jendela' },
				{ name : 'det_apotek_limbah', type : 'int', mapping : 'det_apotek_limbah' },
				{ name : 'det_apotek_baksampah', type : 'int', mapping : 'det_apotek_baksampah' },
				{ name : 'det_apotek_parkir', type : 'int', mapping : 'det_apotek_parkir' },
				{ name : 'det_apotek_papannama', type : 'int', mapping : 'det_apotek_papannama' },
				{ name : 'det_apotek_pengelola', type : 'int', mapping : 'det_apotek_pengelola' },
				{ name : 'det_apotek_pendamping', type : 'int', mapping : 'det_apotek_pendamping' },
				{ name : 'det_apotek_asisten', type : 'int', mapping : 'det_apotek_asisten' },
				{ name : 'det_apotek_luas', type : 'int', mapping : 'det_apotek_luas' },
				{ name : 'det_apotek_statustanah', type : 'int', mapping : 'det_apotek_statustanah' },
				{ name : 'det_apotek_sewalama', type : 'int', mapping : 'det_apotek_sewalama' },
				{ name : 'det_apotek_sewaawal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_sewaawal' },
				{ name : 'det_apotek_sewaakhir', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_sewaakhir' },
				{ name : 'det_apotek_shnomor', type : 'string', mapping : 'det_apotek_shnomor' },
				{ name : 'det_apotek_shtahun', type : 'int', mapping : 'det_apotek_shtahun' },
				{ name : 'det_apotek_shgssu', type : 'string', mapping : 'det_apotek_shgssu' },
				{ name : 'det_apotek_shtanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_shtanggal' },
				{ name : 'det_apotek_shan', type : 'string', mapping : 'det_apotek_shan' },
				{ name : 'det_apotek_aktano', type : 'string', mapping : 'det_apotek_aktano' },
				{ name : 'det_apotek_aktatahun', type : 'int', mapping : 'det_apotek_aktatahun' },
				{ name : 'det_apotek_aktanotaris', type : 'string', mapping : 'det_apotek_aktanotaris' },
				{ name : 'det_apotek_aktaan', type : 'string', mapping : 'det_apotek_aktaan' },
				{ name : 'det_apotek_ckutipan', type : 'string', mapping : 'det_apotek_ckutipan' },
				{ name : 'det_apotek_ckec', type : 'string', mapping : 'det_apotek_ckec' },
				{ name : 'det_apotek_ctanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_ctanggal' },
				{ name : 'det_apotek_cpetok', type : 'string', mapping : 'det_apotek_cpetok' },
				{ name : 'det_apotek_cpersil', type : 'string', mapping : 'det_apotek_cpersil' },
				{ name : 'det_apotek_ckelas', type : 'string', mapping : 'det_apotek_ckelas' },
				{ name : 'det_apotek_can', type : 'string', mapping : 'det_apotek_can' },
				{ name : 'det_apotek_sppihak1', type : 'string', mapping : 'det_apotek_sppihak1' },
				{ name : 'det_apotek_sppihak2', type : 'string', mapping : 'det_apotek_sppihak2' },
				{ name : 'det_apotek_spnomor', type : 'string', mapping : 'det_apotek_spnomor' },
				{ name : 'det_apotek_sptanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_apotek_sptanggal' },
				{ name : 'det_apotek_notaris', type : 'string', mapping : 'det_apotek_notaris' },
				
				{ name : 'apotek_nama', type : 'string', mapping : 'apotek_nama' },
				{ name : 'apotek_alamat', type : 'string', mapping : 'apotek_alamat' },
				{ name : 'apotek_telp', type : 'string', mapping : 'apotek_telp' },
				{ name : 'apotek_kel', type : 'string', mapping : 'apotek_kel' },
				{ name : 'apotek_kec', type : 'string', mapping : 'apotek_kec' },
				{ name : 'apotek_kepemilikan', type : 'int', mapping : 'apotek_kepemilikan' },
				{ name : 'apotek_pemilik', type : 'string', mapping : 'apotek_pemilik' },
				{ name : 'apotek_pemilikalamat', type : 'string', mapping : 'apotek_pemilikalamat' },
				{ name : 'apotek_pemiliknpwp', type : 'string', mapping : 'apotek_pemiliknpwp' },
				{ name : 'apotek_siup', type : 'string', mapping : 'apotek_siup' },
				{ name : 'det_apotek_proses', type : 'string', mapping : 'det_apotek_proses' },
				{ name : 'lamaproses', type : 'string', mapping : 'lamaproses' },
				{ name : 'det_apotek_retribusi', type : 'int', mapping : 'det_apotek_retribusi' },
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
				{ name : 'det_apotek_proses', type : 'string', mapping : 'det_apotek_proses' },
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
		apotek_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						apotek_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						apotek_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						apotek_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						apotek_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						apotek_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						apotek_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						apotek_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						apotek_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var apotek_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : apotek_det_confirmAdd
		});
		var apotek_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : apotek_det_confirmUpdate
		});
		var apotek_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : apotek_det_confirmDelete
		});
		var apotek_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : apotek_det_refresh
		});
		var apotek_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : apotek_det_showSearchWindow
		});
		var apotek_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				apotek_det_printExcel('PRINT');
			}
		});
		var apotek_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				apotek_det_printExcel('EXCEL');
			}
		});
		
		var apotek_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : apotek_det_confirmUpdate
		});
		var apotek_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : apotek_det_confirmDelete
		});
		var apotek_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : apotek_det_refresh
		});
		apotek_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'apotek_det_contextMenu',
			items: [
				apotek_det_contextMenuEdit,apotek_det_contextMenuDelete,'-',apotek_det_contextMenuRefresh
			]
		});
		
		apotek_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : apotek_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						apotek_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						apotek_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/* Start ContextMenu For Action Column */
		var apotek_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/apotek_buktipenerimaan.html');
					}
				});
			}
		});
		var apotek_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/apotek_sk.html');
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
		var apotek_det_si_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Ijin',
			tooltip : 'Cetak Surat Ijin',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKSI'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/apotek_si.html');
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
		var apotek_det_bap_printCM = Ext.create('Ext.menu.Item',{
			text : 'Berita Acara Penerimaan',
			tooltip : 'Cetak Berita Acara Pemeriksaan',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/apotek_lembarkontrol.html');
					}
				});
			}
		});
		var apotek_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/apotek_lembarkontrol.html');
					}
				});
			}
		});
		var apotek_det_lampiran_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lampiran',
			tooltip : 'Cetak Lampiran',
			hidden : true,
			handler : function(){
				var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_apotek_det/switchAction',
					params: {
						apotekdet_id : record.get('det_apotek_id'),
						action : 'CETAKLAMPIRAN'
					},success : function(){
						window.open('../print/apotek_lampiran.html');
					}
				});
			}
		});
		var apotek_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				apotek_det_bp_printCM,apotek_det_lampiran_printCM,apotek_det_lk_printCM,apotek_det_bap_printCM,apotek_det_si_printCM,apotek_det_sk_printCM
			]
		});
		function apotek_det_ubahProses(proses){
			var record = apotek_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_apotek_det/switchAction',
				params: {
					apotekdet_id : record.get('det_apotek_id'),
					apotekdet_nosk : record.get('det_apotek_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					apotek_det_dataStore.reload();
				}
			});
		}
		
		var apotek_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						apotek_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						apotek_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						apotek_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		apotek_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'apotek_det_gridPanel',
			constrain : true,
			store : apotek_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'apotek_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : {forceFit:true},
			multiSelect : true,
			keys : apotek_det_shorcut,
			columns : [
				{
					text : 'Jenis',
					dataIndex : 'det_apotek_jenis',
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
					dataIndex : 'det_apotek_tanggal',
					width : 80,
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
					width : 100,
					sortable : false,
					flex : 1
				},
				{
					text : 'Telp',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Surat Penugasan',
					dataIndex : 'pemohon_surattugas',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'NIK',
					dataIndex : 'pemohon_nik',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tempat Lahir',
					dataIndex : 'det_apotek_tempatlahir',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tgl Lahir',
					dataIndex : 'det_apotek_tanggallahir',
					width : 100,
					hidden : true,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'NPWP',
					dataIndex : 'det_apotek_npwp',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'STRA',
					dataIndex : 'det_apotek_stra',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Pendidikan',
					dataIndex : 'det_apotek_pendidikan',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tahun Lulus',
					dataIndex : 'det_apotek_tahunlulus',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Nama Apotek',
					dataIndex : 'apotek_nama',
					width : 150,
					sortable : false
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_apotek_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal Berlaku',
					dataIndex : 'det_apotek_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tanggal Kadaluarsa',
					dataIndex : 'det_apotek_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Lama Proses',
					dataIndex : 'lamaproses',
					width : 80,
					sortable : false
				},
				{
					text : 'Status',
					dataIndex : 'det_apotek_proses',
					width : 125,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					text : 'Action',
					width:50,
					hideable : false,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							apotek_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							apotek_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Proses',
					width:40,
					hideable : false,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							apotek_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Cetak',
					width:40,
					hideable : false,
					items: [{
						iconCls: 'icon16x16-print',
						tooltip: 'Cetak Dokumen',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							apotek_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				apotek_det_addButton,
				apotek_det_gridSearchField,
				apotek_det_refreshButton,
				apotek_det_printButton,
				apotek_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : apotek_det_dataStore,
				displayInfo : true
			})/* ,
			listeners : {
				afterrender : function(){
					apotek_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			} */
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_apotek_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_apotek_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/
		});
		det_apotek_apotek_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_apotek_apotek_id',
			fieldLabel : 'Id',
			hidden : true,
			allowNegatife : false,
			blankText : '0',
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
		det_apotek_jenisField = Ext.create('Ext.form.ComboBox',{
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
						det_apotek_sklamaField.show();
					}else{
						det_apotek_sklamaField.hide();
					}
				}
			}
		});
		det_apotek_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_lama',
			fieldLabel : 'Nomor SK Lama',
			store : apotek_det_dataStore,
			displayField : 'det_apotek_sk',
			valueField : 'det_apotek_apotek_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_apotek_sklamaField.getStore();
				var val = det_apotek_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_apotek_sk : val};
				store.load();
				det_apotek_sklamaField.expand();
				det_apotek_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_apotek_sk}<br>Nama Apotek : {apotek_nama}<br>Alamat : {apotek_alamat}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					apotek_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					apotek_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					apotek_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					apotek_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					apotek_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					apotek_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					apotek_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					apotek_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					apotek_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					apotek_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					apotek_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					apotek_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					apotek_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					apotek_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					apotek_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					apotek_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					apotek_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					apotek_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
					
					apotek_namaField.setValue(rec.get('apotek_nama'));
					apotek_alamatField.setValue(rec.get('apotek_alamat'));
					apotek_telpField.setValue(rec.get('apotek_telp'));
					apotek_kelField.setValue(rec.get('apotek_kel'));
					apotek_kecField.setValue(rec.get('apotek_kec'));
					apotek_kepemilikanField.setValue(rec.get('apotek_kepemilikan'));
					apotek_pemilikField.setValue(rec.get('apotek_pemilik'));
					apotek_pemilikalamatField.setValue(rec.get('apotek_pemilikalamat'));
					apotek_pemiliknpwpField.setValue(rec.get('apotek_pemiliknpwp'));
					apotek_siupField.setValue(rec.get('apotek_siup'));
					det_apotek_jarakField.setValue(rec.get('det_apotek_jarak'));
					det_apotek_rracikField.setValue(rec.get('det_apotek_rracik'));
					det_apotek_radminField.setValue(rec.get('det_apotek_radmin'));
					det_apotek_rkerjaField.setValue(rec.get('det_apotek_rkerja'));
					det_apotek_rtungguField.setValue(rec.get('det_apotek_rtunggu'));
					det_apotek_rwcField.setValue(rec.get('det_apotek_rwc'));
					det_apotek_airField.setValue(rec.get('det_apotek_air'));
					det_apotek_listrikField.setValue(rec.get('det_apotek_listrik'));
					det_apotek_apkField.setValue(rec.get('det_apotek_apk'));
					det_apotek_apkukuranField.setValue(rec.get('det_apotek_apkukuran'));
					det_apotek_jendelaField.setValue(rec.get('det_apotek_jendela'));
					det_apotek_limbahField.setValue(rec.get('det_apotek_limbah'));
					det_apotek_baksampahField.setValue(rec.get('det_apotek_baksampah'));
					det_apotek_parkirField.setValue(rec.get('det_apotek_parkir'));
					det_apotek_papannamaField.setValue(rec.get('det_apotek_papannama'));
					det_apotek_pengelolaField.setValue(rec.get('det_apotek_pengelola'));
					det_apotek_pendampingField.setValue(rec.get('det_apotek_pendamping'));
					det_apotek_asistenField.setValue(rec.get('det_apotek_asisten'));
					det_apotek_luasField.setValue(rec.get('det_apotek_luas'));
					det_apotek_statustanahField.setValue(rec.get('det_apotek_statustanah'));
					det_apotek_sewalamaField.setValue(rec.get('det_apotek_sewalama'));
					det_apotek_sewaawalField.setValue(rec.get('det_apotek_sewaawal'));
					det_apotek_sewaakhirField.setValue(rec.get('det_apotek_sewaakhir'));
					det_apotek_shnomorField.setValue(rec.get('det_apotek_shnomor'));
					det_apotek_shtahunField.setValue(rec.get('det_apotek_shtahun'));
					det_apotek_shgssuField.setValue(rec.get('det_apotek_shgssu'));
					det_apotek_shtanggalField.setValue(rec.get('det_apotek_shtanggal'));
					det_apotek_shanField.setValue(rec.get('det_apotek_shan'));
					det_apotek_aktanoField.setValue(rec.get('det_apotek_aktano'));
					det_apotek_aktatahunField.setValue(rec.get('det_apotek_aktatahun'));
					det_apotek_aktanotarisField.setValue(rec.get('det_apotek_aktanotaris'));
					det_apotek_aktaanField.setValue(rec.get('det_apotek_aktaan'));
					det_apotek_ckutipanField.setValue(rec.get('det_apotek_ckutipan'));
					det_apotek_ckecField.setValue(rec.get('det_apotek_ckec'));
					det_apotek_ctanggalField.setValue(rec.get('det_apotek_ctanggal'));
					det_apotek_cpetokField.setValue(rec.get('det_apotek_cpetok'));
					det_apotek_cpersilField.setValue(rec.get('det_apotek_cpersil'));
					det_apotek_ckelasField.setValue(rec.get('det_apotek_ckelas'));
					det_apotek_canField.setValue(rec.get('det_apotek_can'));
					det_apotek_sppihak1Field.setValue(rec.get('det_apotek_sppihak1'));
					det_apotek_sppihak2Field.setValue(rec.get('det_apotek_sppihak2'));
					det_apotek_spnomorField.setValue(rec.get('det_apotek_spnomor'));
					det_apotek_sptanggalField.setValue(rec.get('det_apotek_sptanggal'));
					det_apotek_notarisField.setValue(rec.get('det_apotek_notaris'));
				}
			}
		});
		det_apotek_surveylulusField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_surveylulus',
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
		det_apotek_namaField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		det_apotek_alamatField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_alamat',
			fieldLabel : 'Alamat',
			maxLength : 50
		});
		det_apotek_telpField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_telp',
			fieldLabel : 'Telp',
			maxLength : 20
		});
		det_apotek_spField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_sp',
			fieldLabel : 'Surat Penugasan',
			maxLength : 50
		});
		det_apotek_ktpField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_ktp',
			fieldLabel : 'NIK',
			maxLength : 20
		});
		det_apotek_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		det_apotek_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		det_apotek_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		det_apotek_npwpField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		det_apotek_straField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_stra',
			fieldLabel : 'STRA',
			maxLength : 50
		});
		det_apotek_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 20
		});
		det_apotek_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maskRe : /([0-9]+)$/
		});
		det_apotek_terimaField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_terima',
			fieldLabel : 'Penerima Berkas',
			maxLength : 50
		});
		det_apotek_terimatanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_terimatanggal',
			fieldLabel : 'Tanggal Terima',
			format : 'd-m-Y'
		});
		det_apotek_tanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			readOnly : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_apotek_kelengkapanField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_kelengkapan',
			fieldLabel : 'Kelengkapan',
			store : new Ext.data.ArrayStore({
				fields : ['kelengkapan_id', 'kelengkapan_nama'],
				data : [[1,'LENGKAP'],[2,'TIDAK LENGKAP']]
			}),
			displayField : 'kelengkapan_nama',
			valueField : 'kelengkapan_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_bapField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_bap',
			fieldLabel : 'BAP',
			maxLength : 50
		});
		det_apotek_skField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 50,
			hidden : true
		});
		det_apotek_baptanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_baptanggal',
			fieldLabel : 'Tanggal BAP',
			format : 'd-m-Y'
		});
		det_apotek_berlakuField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y',
			hidden : true
		});
		det_apotek_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_kadaluarsa',
			fieldLabel : 'Tanggal Kadaluarsa',
			format : 'd-m-Y'
		});
		det_apotek_keputusanField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_keputusan',
			fieldLabel : 'Keputusan',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'DISETUJUI'],[2,'DITOLAK'],[3,'DITANGGUHKAN']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_keteranganField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_keterangan',
			fieldLabel : 'Keterangan',
			maxLength : 255
		});
		det_apotek_jarakField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_jarak',
			fieldLabel : 'Jarak apotek terdekat',
			maskRe : /([0-9]+)$/
		});
		det_apotek_rracikField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_rracik',
			fieldLabel : 'Ruang Racik',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_radminField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_radmin',
			fieldLabel : 'Ruang Admin',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_rkerjaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_rkerja',
			fieldLabel : 'Ruang Kerja',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_rtungguField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_rtunggu',
			fieldLabel : 'Ruang Tunggu',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_rwcField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_rwc',
			fieldLabel : 'Kamar Mandi',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_airField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_air',
			fieldLabel : 'Sumber Air',
			maxLength : 20
		});
		det_apotek_listrikField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_listrik',
			fieldLabel : 'Penerangan',
			maxLength : 20
		});
		det_apotek_apkField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_apk',
			fieldLabel : 'Jumlah Alat Pemadam kebakaran',
			maskRe : /([0-9]+)$/
		});
		det_apotek_apkukuranField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_apkukuran',
			fieldLabel : 'Ukuran Alat Pemadam',
			maxLength : 20
		});
		det_apotek_jendelaField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_jendela',
			fieldLabel : 'Jumlah Jendela',
			maskRe : /([0-9]+)$/
		});
		det_apotek_limbahField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_limbah',
			fieldLabel : 'Pembuangan Limbah',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_baksampahField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_baksampah',
			fieldLabel : 'Bak Sampah',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_parkirField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_parkir',
			fieldLabel : 'Tempat Parkir',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_papannamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_papannama',
			fieldLabel : 'Papan Nama',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'ADA'],[2,'TIDAK ADA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_pengelolaField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_pengelola',
			fieldLabel : 'Jumlah Apoteker Pengelola',
			maskRe : /([0-9]+)$/
		});
		det_apotek_pendampingField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_pendamping',
			fieldLabel : 'Jumlah Pendamping',
			maskRe : /([0-9]+)$/
		});
		det_apotek_asistenField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_asisten',
			fieldLabel : 'Jumlah Asisten',
			maskRe : /([0-9]+)$/
		});
		det_apotek_luasField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_luas',
			fieldLabel : 'Luas',
			maskRe : /([0-9]+)$/
		});
		det_apotek_statustanahField = Ext.create('Ext.form.ComboBox',{
			name : 'det_apotek_statustanah',
			fieldLabel : 'Status Tanah',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'Hak Milik'],[2,'Hak Pakai'],[3,'Hak Guna Bangunan'],[4,'Hak Milik Adat/Tanah Yayasan'],[5,'Tanah Negara'],[6,'Sewa']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		det_apotek_sewalamaField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_sewalama',
			fieldLabel : 'Lama Sewa',
			maskRe : /([0-9]+)$/
		});
		det_apotek_sewaawalField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_sewaawal',
			fieldLabel : 'det_apotek_sewaawal',
			maxLength : 0
		});
		det_apotek_sewaawalField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_sewaawal',
			fieldLabel : 'Awal Sewa',
			format : 'd-m-Y'
		});
		det_apotek_sewaakhirField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_sewaakhir',
			fieldLabel : 'det_apotek_sewaakhir',
			maxLength : 0
		});
		det_apotek_sewaakhirField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_sewaakhir',
			fieldLabel : 'Akhir Sewa',
			format : 'd-m-Y'
		});
		det_apotek_shnomorField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_shnomor',
			fieldLabel : 'No. Sertifikat',
			maxLength : 50
		});
		det_apotek_shtahunField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_shtahun',
			fieldLabel : 'Tahun',
			maskRe : /([0-9]+)$/
		});
		det_apotek_shgssuField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_shgssu',
			fieldLabel : 'GS/SU No.',
			maxLength : 50
		});
		det_apotek_shtanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_shtanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_apotek_shanField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_shan',
			fieldLabel : 'Atas Nama',
			maxLength : 50
		});
		det_apotek_aktanoField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_aktano',
			fieldLabel : 'Nomor Akta',
			maxLength : 50
		});
		det_apotek_aktatahunField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_aktatahun',
			fieldLabel : 'Tahun',
			maskRe : /([0-9]+)$/
		});
		det_apotek_aktanotarisField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_aktanotaris',
			fieldLabel : 'Notaris',
			maxLength : 50
		});
		det_apotek_aktaanField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_aktaan',
			fieldLabel : 'Atas Nama',
			maxLength : 50
		});
		det_apotek_ckutipanField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_ckutipan',
			fieldLabel : 'Kutipan Letter C',
			maxLength : 255
		});
		det_apotek_ckecField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_ckec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		det_apotek_ctanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_ctanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_apotek_cpetokField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_cpetok',
			fieldLabel : 'Petok',
			maxLength : 50
		});
		det_apotek_cpersilField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_cpersil',
			fieldLabel : 'Persil',
			maxLength : 50
		});
		det_apotek_ckelasField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_ckelas',
			fieldLabel : 'Kelas',
			maxLength : 50
		});
		det_apotek_canField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_can',
			fieldLabel : 'Atas Nama',
			maxLength : 50
		});
		det_apotek_sppihak1Field = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_sppihak1',
			fieldLabel : 'Pihak Pertama',
			maxLength : 50
		});
		det_apotek_sppihak2Field = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_sppihak2',
			fieldLabel : 'Pihak Kedua',
			maxLength : 50
		});
		det_apotek_spnomorField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_spnomor',
			fieldLabel : 'Nomor Perjanjian',
			maxLength : 50
		});
		det_apotek_sptanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_apotek_sptanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y'
		});
		det_apotek_notarisField = Ext.create('Ext.form.TextField',{
			name : 'det_apotek_notaris',
			fieldLabel : 'Notaris',
			maxLength : 50
		});
		
		/* field apotek */
		
		apotek_namaField = Ext.create('Ext.form.TextField',{
			name : 'apotek_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		apotek_alamatField = Ext.create('Ext.form.TextField',{
			name : 'apotek_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		apotek_telpField = Ext.create('Ext.form.TextField',{
			name : 'apotek_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		apotek_kelField = Ext.create('Ext.form.TextField',{
			name : 'apotek_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		apotek_kecField = Ext.create('Ext.form.TextField',{
			name : 'apotek_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		apotek_kepemilikanField = Ext.create('Ext.form.ComboBox',{
			name : 'apotek_kepemilikan',
			fieldLabel : 'Kepemilikan',
			store : new Ext.data.ArrayStore({
				fields : ['kepemilikan_id', 'kepemilikan_nama'],
				data : [[1,'MILIK SENDIRI'],[2,'KEPEMILIKAN ORANG LAIN']]
			}),
			displayField : 'kepemilikan_nama',
			valueField : 'kepemilikan_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		apotek_pemilikField = Ext.create('Ext.form.TextField',{
			name : 'apotek_pemilik',
			fieldLabel : 'Pemilik',
			maxLength : 50
		});
		apotek_pemilikalamatField = Ext.create('Ext.form.TextField',{
			name : 'apotek_pemilikalamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		apotek_pemiliknpwpField = Ext.create('Ext.form.TextField',{
			name : 'apotek_pemiliknpwp',
			fieldLabel : 'NPWP Pemilik',
			maxLength : 50
		});
		apotek_siupField = Ext.create('Ext.form.TextField',{
			name : 'apotek_siup',
			fieldLabel : 'SIUP',
			maxLength : 50
		});
		/* end field apotek */
		
		apotek_det_syaratDataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_det/switchAction',
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
				{ name : 'apotek_cek_id', type : 'int', mapping : 'apotek_cek_id' },
				{ name : 'apotek_cek_syarat_id', type : 'int', mapping : 'apotek_cek_syarat_id' },
				{ name : 'apotek_cek_apotekdet_id', type : 'int', mapping : 'apotek_cek_apotekdet_id' },
				{ name : 'apotek_cek_apotek_id', type : 'int', mapping : 'apotek_cek_apotek_id' },
				{ name : 'apotek_cek_status', type : 'boolean', mapping : 'apotek_cek_status' },
				{ name : 'apotek_cek_keterangan', type : 'string', mapping : 'apotek_cek_keterangan' },
				{ name : 'apotek_cek_syarat_nama', type : 'string', mapping : 'apotek_cek_syarat_nama' }
				]
		});
		var det_apotek_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_apotek_syaratGrid = Ext.create('Ext.grid.Panel',{
			store : apotek_det_syaratDataStore,
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
					dataIndex : 'apotek_cek_id',
					width : 100,
					hidden : true,
					hideable : false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'apotek_cek_syarat_nama',
					width : 200,
					sortable : false,
					editor : {
						xtype : 'textfield',
						readOnly : true
					}
				},
				{
					xtype: 'checkcolumn',
					text: 'Ada?',
					dataIndex: 'apotek_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'apotek_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		apotek_det_perlengkapanDataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_det/switchAction',
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
					action : 'GETPERLENGKAPAN'
				}
			}),
			fields : [
				{ name : 'apotek_ket_id', type : 'int', mapping : 'apotek_ket_id' },
				{ name : 'apotek_ket_perlengkapanid', type : 'int', mapping : 'apotek_ket_perlengkapanid' },
				{ name : 'apotek_ket_perlengkapannama', type : 'string', mapping : 'apotek_ket_perlengkapannama' },
				{ name : 'apotek_ket_status', type : 'boolean', mapping : 'apotek_ket_status' },
				{ name : 'apotek_ket_jumlah', type : 'int', mapping : 'apotek_ket_jumlah' }
				]
		});
		var det_apotek_perlengkapanGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_apotek_perlengkapanGrid = Ext.create('Ext.grid.Panel',{
			store : apotek_det_perlengkapanDataStore,
			loadMask : true,
			width : '95%',
			plugins : [
				Ext.create('Ext.grid.plugin.CellEditing', {
					clicksToEdit: 1
				})
			],
			selType: 'cellmodel',
			columns : [
				{
					text : 'Perlengkapan',
					dataIndex : 'apotek_ket_perlengkapannama',
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
					dataIndex: 'apotek_ket_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Jumlah',
					dataIndex : 'apotek_ket_jumlah',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		
		/* START asisten DOKUMEN */
		var det_apotek_asisten_dataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_apotek_det/switchAction',
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
					action : 'GETASISTEN'
				}
			}),
			fields : [
				{ name : 'asisten_id', type : 'int', mapping : 'asisten_id' },
				{ name : 'asisten_nama', type : 'string', mapping : 'asisten_nama' },
				{ name : 'asisten_sik', type : 'string', mapping : 'asisten_sik' },
				{ name : 'asisten_lulus', type : 'string', mapping : 'asisten_lulus' },
				{ name : 'asisten_alamat', type : 'string', mapping : 'asisten_alamat' }
			]
		});
		function det_apotek_asisten_addHandler(){
			det_apotek_asisten_roleRowEditor.cancelEdit();
			var data_det_apotekDetail = {
				asisten_id : 0,
				asisten_nama : '',
				asisten_sik : '',
				asisten_lulus : '',
				asisten_alamat : ''
			};
			det_apotek_asisten_dataStore.insert(0, data_det_apotekDetail);
			det_apotek_asisten_roleRowEditor.startEdit(0, 0);
		}
		function det_apotek_asisten_deleteHandler(){
			var sm = det_apotek_asisten_gridPanel.getSelectionModel();
			det_apotek_asisten_roleRowEditor.cancelEdit();
			det_apotek_asisten_dataStore.remove(sm.getSelection());
			if (det_apotek_asisten_dataStore.getCount() > 0) {
				sm.select(0);
			}
		}
		det_apotek_asisten_addEditor = Ext.create('Ext.Button',{
			text: globalAddButtonTitle,
			iconCls: 'icon16x16-add',
			handler : det_apotek_asisten_addHandler
		});
		det_apotek_asisten_deleteEditor = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : det_apotek_asisten_deleteHandler
		});
		var det_apotek_asisten_roleRowEditor = Ext.create('Ext.grid.plugin.RowEditing', {
			clicksToMoveEditor : 1,
			autoCancel : false
		});
		det_apotek_asisten_gridPanel = Ext.create('Ext.grid.Panel',{
			title : 'Data Asisten',
			constrain : true,
			store : det_apotek_asisten_dataStore,
			loadMask : true,
			height : 150,
			plugins: [det_apotek_asisten_roleRowEditor],
            enableColLock : false,
			selModel : Ext.selection.Model(),
			multiSelect : false,
			tbar: [det_apotek_asisten_addEditor,det_apotek_asisten_deleteEditor],
			columns : [
				{
					text : 'Nama',
					dataIndex : 'asisten_nama',
					width : 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Nomor SIK',
					dataIndex: 'asisten_sik',
					width: 100,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Tahun Lulus',
					dataIndex: 'asisten_lulus',
					width: 70,
					sortable : false,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				},
				{
					text : 'Alamat',
					dataIndex: 'asisten_alamat',
					width: 200,
					sortable : false,
					flex : 1,
					editor : Ext.create('Ext.form.TextField',{
						maxLength : 50
					})
				}
			]
		});
		
		/* END asisten DOKUMEN */
		var apotek_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : apotek_det_save
		});
		var apotek_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				apotek_det_resetForm();
				apotek_det_switchToGrid();
			}
		});
		/* START DATA PEMOHON */
		var apotek_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var apotek_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var apotek_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var apotek_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var apotek_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var apotek_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var apotek_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var apotek_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
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
		var apotek_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
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
		var apotek_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
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
				var store = apotek_det_pemohon_nikField.getStore();
				var val = apotek_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				apotek_det_pemohon_nikField.expand();
				apotek_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					apotek_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					apotek_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					apotek_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					apotek_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					apotek_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					apotek_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					apotek_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					apotek_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					apotek_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					apotek_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					apotek_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					apotek_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					apotek_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					apotek_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					apotek_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					apotek_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					apotek_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					apotek_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var apotek_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			maxLength : 50
		});
		var apotek_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			maxLength : 50
		});
		var apotek_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var apotek_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var apotek_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var apotek_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var apotek_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var apotek_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		var ipmbl_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '8. Data Pendukung',
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				det_apotek_surveylulusField,
				det_apotek_terimaField,
				det_apotek_terimatanggalField,
				det_apotek_kelengkapanField,
				det_apotek_bapField,
				det_apotek_baptanggalField,
				det_apotek_keputusanField,
				det_apotek_keteranganField,
				det_apotek_skField,
				det_apotek_berlakuField,
				det_apotek_kadaluarsaField
			]
		});
		/* END DATA PEMOHON */
		/* START DATA RETRIBUSI */
		var apotek_det_retribusiField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 'apotek_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 'apotek_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.apotek_retribusi == 1){
						apotek_det_retibusiNilaiField.show();
					}else{
						apotek_det_retibusiNilaiField.hide();
					}
				}
			}
		});
		var apotek_det_retibusiNilaiField = Ext.create('Ext.form.TextField',{
			name : 'permohonan_retribusi',
			fieldLabel : 'Nominal Retribusi ',
			maxLength : 100,
			hidden : true,
			value : 0
		});
		apotek_det_retibusiTanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_retribusi_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			hidden : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		var apotek_det_retribusifieldset = Ext.create('Ext.form.FieldSet',{
			title : '6. Data Retribusi',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				apotek_det_retribusiField,
				apotek_det_retibusiNilaiField,
				apotek_det_retibusiTanggalField
			]
		});
		/* END DATA RETRIBUSI */
		apotek_det_formPanel = Ext.create('Ext.form.Panel', {
			disabled : true,
			frame : true,
			layout : {
				type : 'form',
				padding : 5
			},
			defaultType : 'textfield',
			defaults : {anchor : '95%'},
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
								det_apotek_idField,
								det_apotek_apotek_idField,
								permohonan_idField,
								det_apotek_jenisField,
								det_apotek_sklamaField,
								det_apotek_tanggalField
							]
						},
						{
							xtype : 'fieldset',
							title : '2. Data Pemohon',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								apotek_det_pemohon_idField,
								apotek_det_pemohon_nikField,
								apotek_det_pemohon_namaField,
								apotek_det_pemohon_alamatField,
								apotek_det_pemohon_telpField,
								apotek_det_pemohon_npwpField,
								apotek_det_pemohon_rtField,
								apotek_det_pemohon_rwField,
								apotek_det_pemohon_kelField,
								apotek_det_pemohon_kecField,
								apotek_det_pemohon_straField,
								apotek_det_pemohon_surattugasField,
								apotek_det_pemohon_pekerjaanField,
								apotek_det_pemohon_tempatlahirField,
								apotek_det_pemohon_tanggallahirField,
								apotek_det_pemohon_user_idField,
								apotek_det_pemohon_pendidikanField,
								apotek_det_pemohon_tahunlulusField
							]
						},
						{
							xtype : 'fieldset',
							title : '3. Data Apotek',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								apotek_namaField,
								apotek_alamatField,
								apotek_telpField,
								apotek_kelField,
								apotek_kecField,
								apotek_kepemilikanField,
								apotek_pemilikField,
								apotek_pemilikalamatField,
								apotek_pemiliknpwpField,
								apotek_siupField,
								det_apotek_jarakField,
								det_apotek_rracikField,
								det_apotek_radminField,
								det_apotek_rkerjaField,
								det_apotek_rtungguField,
								det_apotek_rwcField,
								det_apotek_airField,
								det_apotek_listrikField,
								det_apotek_apkField,
								det_apotek_apkukuranField,
								det_apotek_jendelaField,
								det_apotek_limbahField,
								det_apotek_baksampahField,
								det_apotek_parkirField,
								det_apotek_papannamaField,
								det_apotek_pengelolaField,
								det_apotek_pendampingField,
								det_apotek_asistenField,
							]
						},
						{
							xtype : 'fieldset',
							title : '4. Data Perlengkapan Apotek',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_apotek_perlengkapanGrid
							]
						},
						{
							xtype : 'fieldset',
							title : '5. Data Bangunan',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_apotek_luasField,
								det_apotek_statustanahField,
								det_apotek_sewalamaField,
								det_apotek_sewaawalField,
								det_apotek_sewaakhirField,
								det_apotek_shnomorField,
								det_apotek_shtahunField,
								det_apotek_shgssuField,
								det_apotek_shtanggalField,
								det_apotek_shanField,
								det_apotek_aktanoField,
								det_apotek_aktatahunField,
								det_apotek_aktanotarisField,
								det_apotek_aktaanField,
								det_apotek_ckutipanField,
								det_apotek_ckecField,
								det_apotek_ctanggalField,
								det_apotek_cpetokField,
								det_apotek_cpersilField,
								det_apotek_ckelasField,
								det_apotek_canField,
								det_apotek_sppihak1Field,
								det_apotek_sppihak2Field,
								det_apotek_spnomorField,
								det_apotek_sptanggalField,
								det_apotek_notarisField,
							]
						},
						{
							xtype : 'fieldset',
							title : '6. Data Ceklist',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_apotek_syaratGrid
							]
						},
						{
							xtype : 'fieldset',
							title : '7. Data Asisten',
							checkboxToggle : false,
							collapsible : false,
							layout :'form',
							items : [
								det_apotek_asisten_gridPanel
							]
						},
						ipmbl_det_pendukungfieldset,apotek_det_retribusifieldset,
						Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
					],
				}
			],
			buttons : [apotek_det_saveButton,apotek_det_cancelButton]
		});
		apotek_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'apotek_det_formWindow',
			renderTo : 'apotek_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + apotek_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [apotek_det_formPanel]
		});
/* End FormPanel declaration */
	<?php if(@$_SESSION['IDHAK'] == 2){ ?>
		apotek_det_lk_printCM.hide();
		apotek_det_bap_printCM.hide();
		apotek_det_si_printCM.hide();
		apotek_det_sk_printCM.hide();
		ipmbl_det_pendukungfieldset.hide();
		apotek_det_gridPanel.columns[19].setVisible(false);
		apotek_det_gridPanel.columns[20].setVisible(false);
	<?php } ?>
});
</script>
<div id="apotek_detSaveWindow"></div>
<div class="container col-md-12" id="apotek_detGrid"></div>