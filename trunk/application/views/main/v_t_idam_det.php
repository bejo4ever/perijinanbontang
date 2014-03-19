<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4 class="container">IZIN DEPO AIR MINUM</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var idam_det_componentItemTitle="Izin Depo Air Minum";
		var idam_det_dataStore;
		var idam_det_syaratDataStore;
		
		var idam_det_shorcut;
		var idam_det_contextMenu;
		var idam_det_gridSearchField;
		var idam_det_gridPanel;
		var idam_det_formPanel;
		var idam_det_formWindow;
		var idam_det_searchWindow;
		
		var det_idam_idField;
		var det_idam_idam_idField;
		var det_idam_jenisField;
		var det_idam_tanggalField;
		var det_idam_namausahaField;
		var det_idam_jenisusahaField;
		var det_idam_alamatusahaField;
		var det_idam_nospkpField;
		var det_idam_statusField;
		var det_idam_keteranganField;
		var det_idam_bapField;
		var det_idam_baptanggalField;
		var det_idam_kelengkapanField;
		var det_idam_terimaField;
		var det_idam_terimatanggalField;
		var det_idam_skField;
		var det_idam_berlakuField;
		var det_idam_kadaluarsaField;
		var det_idam_nomorregField;
		
		var idam_det_dbTask = 'CREATE';
		var idam_det_dbTaskMessage = 'Tambah';
		var idam_det_dbPermission = 'CRUD';
		var idam_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function idam_det_switchToGrid(){
			idam_det_formPanel.setDisabled(true);
			idam_det_gridPanel.setDisabled(false);
			idam_det_formWindow.hide();
		}
		
		function idam_det_switchToForm(){
			idam_det_gridPanel.setDisabled(true);
			idam_det_formPanel.setDisabled(false);
			idam_det_formWindow.show();
		}
		
		function idam_det_confirmAdd(){
			idam_det_dbTask = 'CREATE';
			idam_det_dbTaskMessage = 'created';
			idam_det_resetForm();
			idam_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			idam_det_syaratDataStore.load();
			idam_det_switchToForm();
		}
		
		function idam_det_confirmUpdate(){
			if(idam_det_gridPanel.selModel.getCount() == 1) {
				idam_det_dbTask = 'UPDATE';
				idam_det_dbTaskMessage = 'updated';
				idam_det_switchToForm();
				idam_det_setForm();
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
		
		function idam_det_confirmDelete(){
			if(idam_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, idam_det_delete);
			}else if(idam_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, idam_det_delete);
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
		
		function idam_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(idam_det_dbPermission)==false && pattC.test(idam_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(idam_det_confirmFormValid()){
					var array_idam_cek_id=new Array();
					var array_idam_cek_syarat_id=new Array();
					var array_idam_cek_status=new Array();
					var array_idam_cek_keterangan=new Array();
					
					if(idam_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<idam_det_syaratDataStore.getCount();i++){
							array_idam_cek_id.push(idam_det_syaratDataStore.getAt(i).data.idam_cek_id);
							array_idam_cek_syarat_id.push(idam_det_syaratDataStore.getAt(i).data.idam_cek_syarat_id);
							array_idam_cek_status.push(idam_det_syaratDataStore.getAt(i).data.idam_cek_status);
							array_idam_cek_keterangan.push(idam_det_syaratDataStore.getAt(i).data.idam_cek_keterangan);
						}
					}
					
					var params = idam_det_formPanel.getForm().getValues();
					params.ijin_id = 22;
					params.action = idam_det_dbTask;
					params.idam_cek_id = array_idam_cek_id;
					params.idam_cek_syarat_id = array_idam_cek_syarat_id;
					params.idam_cek_status = array_idam_cek_status;
					params.idam_cek_keterangan = array_idam_cek_keterangan;
					params = Ext.encode(params);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_idam_det/switchAction',
						params: {
							action : idam_det_dbTask,
							params : params
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									idam_det_dataStore.reload();
									idam_det_resetForm();
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave, function(){
										window.scrollTo(0,0);
									});
									idam_det_switchToGrid();
									idam_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function idam_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(idam_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = idam_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< idam_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_idam_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_idam_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									idam_det_dataStore.reload();
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
		
		function idam_det_refresh(){
			idam_det_dbListAction = "GETLIST";
			idam_det_gridSearchField.reset();
			idam_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			idam_det_dataStore.proxy.extraParams.query = "";
			idam_det_dataStore.currentPage = 1;
			idam_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function idam_det_confirmFormValid(){
			return idam_det_formPanel.getForm().isValid();
		}
		
		function idam_det_resetForm(){
			idam_det_dbTask = 'CREATE';
			idam_det_dbTaskMessage = 'create';
			idam_det_formPanel.getForm().reset();
			det_idam_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function idam_det_setForm(){
			idam_det_dbTask = 'UPDATE';
            idam_det_dbTaskMessage = 'update';
			
			var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
			idam_det_formPanel.loadRecord(record);
			det_idam_idField.setValue(record.data.det_idam_id);
			det_idam_idam_idField.setValue(record.data.det_idam_idam_id);
			det_idam_jenisField.setValue(record.data.det_idam_jenis);
			det_idam_nospkpField.setValue(record.data.idam_sertifikatpkp);
			det_idam_kadaluarsaField.setValue(record.data.det_idam_kadaluarsa);
			if(record.data.det_idam_retribusi != 0){
				idam_det_retribusiField.setValue({ idam_retribusi : ['1'] });
			}else{
				idam_det_retribusiField.setValue({ idam_retribusi : ['0'] });
			}
			idam_det_retibusiNilaiField.setValue(record.data.det_idam_retribusi);
			
			idam_det_syaratDataStore.proxy.extraParams = { 
				idam_id : record.data.det_idam_idam_id,
				idam_det_id : record.data.det_idam_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			idam_det_syaratDataStore.load();
		}
		
		function idam_det_showSearchWindow(){
			idam_det_searchWindow.show();
		}
		
		function idam_det_printExcel(outputType){
			var searchText = "";
			
			if(idam_det_dataStore.proxy.extraParams.query!==null){searchText = idam_det_dataStore.proxy.extraParams.query;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_idam_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					currentAction : idam_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('../print/t_idam_det_list.xls');
							}else{
								window.open('../print/t_idam_det_list.html','idam_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		idam_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'idam_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_idam_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_idam_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_idam_id', type : 'int', mapping : 'det_idam_id' },
				{ name : 'det_idam_idam_id', type : 'int', mapping : 'det_idam_idam_id' },
				{ name : 'det_idam_jenis', type : 'int', mapping : 'det_idam_jenis' },
				{ name : 'det_idam_jenis_nama', type : 'string', mapping : 'det_idam_jenis_nama' },
				{ name : 'det_idam_tanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_tanggal' },
				{ name : 'det_idam_status', type : 'int', mapping : 'det_idam_status' },
				{ name : 'det_idam_keterangan', type : 'string', mapping : 'det_idam_keterangan' },
				{ name : 'det_idam_bap', type : 'string', mapping : 'det_idam_bap' },
				{ name : 'det_idam_baptanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_baptanggal' },
				{ name : 'det_idam_kelengkapan', type : 'int', mapping : 'det_idam_kelengkapan' },
				{ name : 'det_idam_terima', type : 'string', mapping : 'det_idam_terima' },
				{ name : 'det_idam_terimatanggal', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_terimatanggal' },
				{ name : 'det_idam_sk', type : 'string', mapping : 'det_idam_sk' },
				{ name : 'det_idam_berlaku', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_berlaku' },
				{ name : 'det_idam_kadaluarsa', type : 'date', dateFormat : 'Y-m-d', mapping : 'det_idam_kadaluarsa' },
				{ name : 'det_idam_nomorreg', type : 'string', mapping : 'det_idam_nomorreg' },
				{ name : 'det_idam_lulussurvey', type : 'int', mapping : 'det_idam_lulussurvey' },
				{ name : 'det_idam_proses', type : 'string', mapping : 'det_idam_proses' },
				{ name : 'idam_usaha', type : 'string', mapping : 'idam_usaha' },
				{ name : 'idam_jenisusaha', type : 'string', mapping : 'idam_jenisusaha' },
				{ name : 'idam_alamat', type : 'string', mapping : 'idam_alamat' },
				{ name : 'idam_sertifikatpkp', type : 'string', mapping : 'idam_sertifikatpkp' },
				{ name : 'lamaproses', type : 'string', mapping : 'lamaproses' },
				{ name : 'det_idam_retribusi', type : 'float', mapping : 'det_idam_retribusi' },
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
		idam_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						idam_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						idam_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						idam_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						idam_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						idam_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						idam_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						idam_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						idam_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var idam_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : idam_det_confirmAdd
		});
		var idam_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : idam_det_confirmUpdate
		});
		var idam_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : idam_det_confirmDelete
		});
		var idam_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : idam_det_refresh
		});
		var idam_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : idam_det_showSearchWindow
		});
		var idam_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				idam_det_printExcel('PRINT');
			}
		});
		var idam_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				idam_det_printExcel('EXCEL');
			}
		});
		var idam_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : idam_det_confirmUpdate
		});
		var idam_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : idam_det_confirmDelete
		});
		var idam_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : idam_det_refresh
		});
		idam_det_contextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				idam_det_contextMenuEdit,idam_det_contextMenuDelete,'-',idam_det_contextMenuRefresh
			]
		});
		
		idam_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : idam_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						idam_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						idam_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		/* Start ContextMenu For Action Column */
		var idam_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_idam_det/switchAction',
					params: {
						idamdet_id : record.get('det_idam_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/idam_buktipenerimaan.html');
					}
				});
			}
		});
		var idam_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_idam_det/switchAction',
					params: {
						idamdet_id : record.get('det_idam_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/idam_sk.html');
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
		var idam_det_bap_printCM = Ext.create('Ext.menu.Item',{
			text : 'Berita Acara Pemeriksaan',
			tooltip : 'Cetak Berita Acara Pemeriksaan',
			handler : function(){
				var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_idam_det/switchAction',
					params: {
						idamdet_id : record.get('det_idam_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/idam_lembarkontrol.html');
					}
				});
			}
		});
		var idam_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_idam_det/switchAction',
					params: {
						idamdet_id : record.get('det_idam_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/idam_lembarkontrol.html');
					}
				});
			}
		});
		var idam_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				idam_det_bp_printCM,idam_det_lk_printCM,idam_det_bap_printCM,idam_det_sk_printCM
			]
		});
		
		function idam_det_ubahProses(proses){
			var record = idam_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_idam_det/switchAction',
				params: {
					idamdet_id : record.get('det_idam_id'),
					idamdet_nosk : record.get('det_idam_sk'),
					permohonan_id : record.get('permohonan_id'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					idam_det_dataStore.reload();
					idam_det_gridPanel.getSelectionModel().deselectAll();
				}
			});
		}
		
		var idam_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						idam_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						idam_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						idam_det_ubahProses('Ditolak');
					}
				}
			]
		});
		
		/* End ContextMenu For Action Column */
		idam_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'idam_det_gridPanel',
			constrain : true,
			store : idam_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'idam_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			multiSelect : true,
			keys : idam_det_shorcut,
			columns : [
				{
					text : 'Jenis',
					dataIndex : 'det_idam_jenis_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Tanggal',
					dataIndex : 'det_idam_tanggal',
					width : 80,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Nama Pemohon',
					dataIndex : 'pemohon_nama',
					width : 150,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 200,
					sortable : false,
					flex : 1
				},
				{
					text : 'No. Telp',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Tempat Lahir',
					dataIndex : 'pemohon_tempatlahir',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal Lahir',
					dataIndex : 'pemohon_tanggallahir',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Pendidikan',
					dataIndex : 'pemohon_pendidikan',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tahun Lulus',
					dataIndex : 'pemohon_tahunlulus',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Usaha',
					dataIndex : 'idam_usaha',
					width : 150,
					sortable : false
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_idam_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Tanggal Berlaku',
					dataIndex : 'det_idam_berlaku',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Tanggal Kadaluarsa',
					dataIndex : 'det_idam_kadaluarsa',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y'),
					hidden : true
				},
				{
					text : 'Nomor Reg',
					dataIndex : 'det_idam_nomorreg',
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
					dataIndex : 'det_idam_proses',
					width : 125,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					text : 'Action',
					width:50,
					hideable: false,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							idam_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							idam_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					width:50,
					text : 'Proses',
					hideable: false,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							idam_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Cetak',
					width:50,
					hideable: false,
					items: [{
						iconCls: 'icon16x16-print',
						tooltip: 'Cetak Dokumen',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							idam_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				idam_det_addButton,
				idam_det_gridSearchField,
				idam_det_refreshButton,
				idam_det_printButton,
				idam_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : idam_det_dataStore,
				displayInfo : true
			})/* ,
			listeners : {
				afterrender : function(){
					idam_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			} */
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_idam_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_idam_id',
			fieldLabel : 'Id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_idam_idam_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_idam_idam_id',
			fieldLabel : 'Id Idam',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
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
		det_idam_jenisField = Ext.create('Ext.form.ComboBox',{
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
						det_idam_sklamaField.show();
						det_idam_namausahaField.disable();
						det_idam_jenisusahaField.disable();
						det_idam_alamatusahaField.disable();
						det_idam_nospkpField.disable();
					}else{
						det_idam_sklamaField.hide();
						det_idam_namausahaField.enable();
						det_idam_jenisusahaField.enable();
						det_idam_alamatusahaField.enable();
						det_idam_nospkpField.enable();
					}
				}
			}
		});
		det_idam_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_idam_lama',
			fieldLabel : 'Nomor SK Lama',
			store : idam_det_dataStore,
			displayField : 'det_idam_sk',
			valueField : 'det_idam_idam_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_idam_sklamaField.getStore();
				var val = det_idam_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_idam_sk : val};
				store.load();
				det_idam_sklamaField.expand();
				det_idam_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_idam_sk}<br>Nama Usaha : {idam_usaha}<br>Alamat : {idam_alamat}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					idam_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					idam_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					idam_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					idam_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					idam_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					idam_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					idam_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					idam_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					idam_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					idam_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					idam_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					idam_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					idam_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					idam_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					idam_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					idam_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					idam_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					idam_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
					det_idam_namausahaField.setValue(rec.get('idam_usaha'));
					det_idam_jenisusahaField.setValue(rec.get('idam_jenisusaha'));
					det_idam_alamatusahaField.setValue(rec.get('idam_alamat'));
					det_idam_nospkpField.setValue(rec.get('idam_sertifikatpkp'));
				}
			}
		});
		det_idam_tanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_idam_namausahaField = Ext.create('Ext.form.TextField',{
			name : 'det_idam_namausaha',
			fieldLabel : 'Nama Usaha',
			maxLength : 50
		});
		det_idam_jenisusahaField = Ext.create('Ext.form.TextField',{
			name : 'det_idam_jenisusaha',
			fieldLabel : 'Jenis Usaha',
			maxLength : 50
		});
		det_idam_alamatusahaField = Ext.create('Ext.form.TextField',{
			name : 'det_idam_alamatusaha',
			fieldLabel : 'Alamat Usaha',
			maxLength : 100
		});
		det_idam_nospkpField = Ext.create('Ext.form.TextField',{
			name : 'det_idam_nospkp',
			fieldLabel : 'Nomor SPKP',
			maxLength : 50
		});
		det_idam_statusField = Ext.create('Ext.form.ComboBox',{
			name : 'det_idam_status',
			fieldLabel : 'Status',
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
		det_idam_keteranganField = Ext.create('Ext.form.TextArea',{
			name : 'det_idam_keterangan',
			fieldLabel : 'Keterangan',
			maxLength : 255
		});
		det_idam_bapField = Ext.create('Ext.form.TextField',{
			name : 'det_idam_bap',
			fieldLabel : 'Nomor BAP',
			maxLength : 50
		});
		det_idam_baptanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_idam_baptanggal',
			fieldLabel : 'Tanggal BAP',
			format : 'd-m-Y'
		});
		det_idam_kelengkapanField = Ext.create('Ext.form.ComboBox',{
			name : 'det_idam_kelengkapan',
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
		det_idam_terimaField = Ext.create('Ext.form.TextField',{
			name : 'det_idam_terima',
			fieldLabel : 'Penerima',
			maxLength : 50
		});
		det_idam_terimatanggalField = Ext.create('Ext.form.field.Date',{
			name : 'det_idam_terimatanggal',
			fieldLabel : 'Tanggal Terima',
			format : 'd-m-Y'
		});
		det_idam_skField = Ext.create('Ext.form.TextField',{
			name : 'det_idam_sk',
			fieldLabel : 'Nomor SK',
			maxLength : 255,
			hidden : true
		});
		det_idam_berlakuField = Ext.create('Ext.form.field.Date',{
			name : 'det_idam_berlaku',
			fieldLabel : 'Tanggal Berlaku',
			format : 'd-m-Y',
			hidden : true
		});
		det_idam_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
			format : 'd-m-Y'
		});
		det_idam_nomorregField = Ext.create('Ext.form.TextField',{
			name : 'det_idam_nomorreg',
			fieldLabel : 'Nomor Reg',
			maxLength : 50,
			hidden : true
		});
		idam_det_syaratDataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_idam_det/switchAction',
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
				{ name : 'idam_cek_id', type : 'int', mapping : 'idam_cek_id' },
				{ name : 'idam_cek_syarat_id', type : 'int', mapping : 'idam_cek_syarat_id' },
				{ name : 'idam_cek_idamdet_id', type : 'int', mapping : 'idam_cek_idamdet_id' },
				{ name : 'idam_cek_idam_id', type : 'int', mapping : 'idam_cek_idam_id' },
				{ name : 'idam_cek_status', type : 'boolean', mapping : 'idam_cek_status' },
				{ name : 'idam_cek_keterangan', type : 'string', mapping : 'idam_cek_keterangan' },
				{ name : 'idam_cek_syarat_nama', type : 'string', mapping : 'idam_cek_syarat_nama' }
				]
		});
		var det_idam_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_idam_syaratGrid = Ext.create('Ext.grid.Panel',{
			store : idam_det_syaratDataStore,
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
					dataIndex : 'idam_cek_id',
					width : 100,
					hidden : true,
					hideable: false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'idam_cek_syarat_nama',
					width : 300,
					sortable : false,
					editor : {
						xtype : 'textfield',
						readOnly : true
					}
				},
				{
					xtype: 'checkcolumn',
					text: 'Ada?',
					dataIndex: 'idam_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'idam_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		var idam_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : idam_det_save
		});
		var idam_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				idam_det_resetForm();
				idam_det_switchToGrid();
			}
		});
		/* START DATA PEMOHON */
		var idam_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var idam_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var idam_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var idam_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var idam_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var idam_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var idam_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var idam_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
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
		var idam_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
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
		var idam_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
			name : 'pemohon_nik',
			fieldLabel : 'NIK',
			pageSize : 15,
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : 'c_m_pemohon/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'pemohon_id'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'GETLIST' }
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
				var store = idam_det_pemohon_nikField.getStore();
				var val = idam_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'GETLIST',query : val};
				store.load();
				idam_det_pemohon_nikField.expand();
				idam_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					idam_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					idam_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					idam_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					idam_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					idam_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					idam_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					idam_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					idam_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					idam_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					idam_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					idam_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					idam_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					idam_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					idam_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					idam_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					idam_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					idam_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					idam_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var idam_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var idam_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var idam_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var idam_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var idam_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var idam_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var idam_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var idam_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		var idam_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '5. Data Pendukung',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				det_idam_nospkpField,
				det_idam_terimaField,
				det_idam_terimatanggalField,
				det_idam_kelengkapanField,
				det_idam_bapField,
				det_idam_baptanggalField,
				det_idam_statusField,
				det_idam_keteranganField,
				det_idam_skField,
				det_idam_berlakuField,
				det_idam_kadaluarsaField,
				det_idam_nomorregField
			]
		});
		/* END DATA PEMOHON */
		/* START DATA RETRIBUSI */
		var idam_det_retribusiField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 'idam_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 'idam_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.idam_retribusi == 1){
						idam_det_retibusiNilaiField.show();
						idam_det_retibusiTanggalField.show();
					}else{
						idam_det_retibusiNilaiField.hide();
						idam_det_retibusiTanggalField.hide();
					}
				}
			}
		});
		var idam_det_retibusiNilaiField = Ext.create('Ext.form.TextField',{
			name : 'permohonan_retribusi',
			fieldLabel : 'Nominal Retribusi ',
			maxLength : 100,
			hidden : true,
			value : 0
		});
		idam_det_retibusiTanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_retribusi_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			hidden : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		var idam_det_retribusifieldset = Ext.create('Ext.form.FieldSet',{
			title : '6. Data Retribusi',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				idam_det_retribusiField,
				idam_det_retibusiNilaiField,
				idam_det_retibusiTanggalField
			]
		});
		/* END DATA RETRIBUSI */
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
		idam_det_formPanel = Ext.create('Ext.form.Panel', {
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
					xtype : 'fieldset',
					title : '1. Data Permohonan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						det_idam_idField,
						det_idam_idam_idField,
						permohonan_idField,
						det_idam_jenisField,
						det_idam_sklamaField,
						det_idam_tanggalField
					]
				},{
					xtype : 'fieldset',
					title : '2. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						idam_det_pemohon_idField,
						idam_det_pemohon_nikField,
						idam_det_pemohon_namaField,
						idam_det_pemohon_alamatField,
						idam_det_pemohon_telpField,
						idam_det_pemohon_npwpField,
						idam_det_pemohon_rtField,
						idam_det_pemohon_rwField,
						idam_det_pemohon_kelField,
						idam_det_pemohon_kecField,
						idam_det_pemohon_straField,
						idam_det_pemohon_surattugasField,
						idam_det_pemohon_pekerjaanField,
						idam_det_pemohon_tempatlahirField,
						idam_det_pemohon_tanggallahirField,
						idam_det_pemohon_user_idField,
						idam_det_pemohon_pendidikanField,
						idam_det_pemohon_tahunlulusField
					]
				},{
					xtype : 'fieldset',
					title : '3. Data Usaha',
					columnWidth : 0.5,
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						/* det_idam_namausahaField,
						det_idam_jenisusahaField,
						det_idam_alamatusahaField, */
						perusahaan_idField,
						perusahaan_npwpField,
						perusahaan_namaField,
						perusahaan_noaktaField,
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
						perusahaan_jusaha_idField
					]
				},{
					xtype : 'fieldset',
					title : '4. Data Kelengkapan',
					columnWidth : 0.5,
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						det_idam_syaratGrid
					]
				},idam_det_pendukungfieldset,idam_det_retribusifieldset,
				Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
			],
			buttons : [idam_det_saveButton,idam_det_cancelButton]
		});
		idam_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'idam_det_formWindow',
			renderTo : 'idam_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + idam_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [idam_det_formPanel]
		});
/* End FormPanel declaration */
	<?php if(@$_SESSION['IDHAK'] == 2){ ?>
		idam_det_lk_printCM.hide();
		idam_det_bap_printCM.hide();
		idam_det_sk_printCM.hide();
		idam_det_pendukungfieldset.hide();
		idam_det_gridPanel.columns[16].setVisible(false);
		idam_det_gridPanel.columns[17].setVisible(false);
	<?php } ?>
});
</script>
<div id="idam_detSaveWindow"></div>
<div class="container col-md-12" id="idam_detGrid"></div>