<style>
	.checked{
		background-image:url(../assets/images/icons/check.png) !important;
	}
</style>
<h4 class="container">IZIN MINUMAN BERALKOHOL</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var simb_det_componentItemTitle="Izin Minuman Beralkohol";
		var simb_det_dataStore;
		
		var simb_det_shorcut;
		var simb_det_contextMenu;
		var simb_det_gridSearchField;
		var simb_det_gridPanel;
		var simb_det_formPanel;
		var simb_det_formWindow;
		var simb_det_searchPanel;
		var simb_det_searchWindow;
		
		var det_simb_idField;
		var det_simb_simb_idField;
		var det_simb_jenisField;
		var det_simb_tanggalField;
		var det_simb_pemohon_idField;
		var det_simb_nomorregField;
		var det_simb_prosesField;
		var det_simb_skField;
		var det_simb_berlakuField;
		var det_simb_kadaluarsaField;
		var det_simb_penerimaField;
		var det_simb_tanggalterimaField;
		var det_simb_keteranganField;
		
		var simb_det_dbTask = 'CREATE';
		var simb_det_dbTaskMessage = 'Tambah';
		var simb_det_dbPermission = 'CRUD';
		var simb_det_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function simb_det_switchToGrid(){
			simb_det_formPanel.setDisabled(true);
			simb_det_gridPanel.setDisabled(false);
			simb_det_formWindow.hide();
		}
		
		function simb_det_switchToForm(){
			simb_det_gridPanel.setDisabled(true);
			simb_det_formPanel.setDisabled(false);
			simb_det_formWindow.show();
		}
		
		function simb_det_confirmAdd(){
			simb_det_dbTask = 'CREATE';
			simb_det_dbTaskMessage = 'created';
			simb_det_resetForm();
			simb_det_syaratDataStore.proxy.extraParams = { 
				currentAction : 'create',
				action : 'GETSYARAT'
			};
			simb_det_syaratDataStore.load();
			simb_det_switchToForm();
		}
		
		function simb_det_confirmUpdate(){
			if(simb_det_gridPanel.selModel.getCount() == 1) {
				simb_det_dbTask = 'UPDATE';
				simb_det_dbTaskMessage = 'updated';
				simb_det_switchToForm();
				simb_det_setForm();
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
		
		function simb_det_confirmDelete(){
			if(simb_det_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, simb_det_delete);
			}else if(simb_det_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, simb_det_delete);
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
		
		function simb_det_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(simb_det_dbPermission)==false && pattC.test(simb_det_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(simb_det_confirmFormValid()){
					var array_simb_cek_id=new Array();
					var array_simb_cek_syarat_id=new Array();
					var array_simb_cek_status=new Array();
					var array_simb_cek_keterangan=new Array();
					if(simb_det_syaratDataStore.getCount() > 0){
						for(var i=0;i<simb_det_syaratDataStore.getCount();i++){
							array_simb_cek_id.push(simb_det_syaratDataStore.getAt(i).data.simb_cek_id);
							array_simb_cek_syarat_id.push(simb_det_syaratDataStore.getAt(i).data.simb_cek_syarat_id);
							array_simb_cek_status.push(simb_det_syaratDataStore.getAt(i).data.simb_cek_status);
							array_simb_cek_keterangan.push(simb_det_syaratDataStore.getAt(i).data.simb_cek_keterangan);
						}
					}
					var params = simb_det_formPanel.getForm().getValues();
					params.ijin_id = 27;
					params.action = simb_det_dbTask;
					params.simb_cek_id = array_simb_cek_id;
					params.simb_cek_syarat_id = array_simb_cek_syarat_id;
					params.simb_cek_status = array_simb_cek_status;
					params.simb_cek_keterangan = array_simb_cek_keterangan;
					params = Ext.encode(params);
					
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_simb_det/switchAction',
						params: {
							action : simb_det_dbTask,
							params : params
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									simb_det_dataStore.reload();
									simb_det_resetForm();
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave, function(){
										window.scrollTo(0,0);
									});
									simb_det_switchToGrid();
									simb_det_gridPanel.getSelectionModel().deselectAll();
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
		
		function simb_det_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(simb_det_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = simb_det_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< simb_det_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.det_simb_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_simb_det/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									simb_det_dataStore.reload();
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
		
		function simb_det_refresh(){
			simb_det_dbListAction = "GETLIST";
			simb_det_gridSearchField.reset();
			simb_det_dataStore.proxy.extraParams = { action : 'GETLIST' };
			simb_det_dataStore.proxy.extraParams.query = "";
			simb_det_dataStore.currentPage = 1;
			simb_det_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function simb_det_confirmFormValid(){
			return simb_det_formPanel.getForm().isValid();
		}
		
		function simb_det_resetForm(){
			simb_det_dbTask = 'CREATE';
			simb_det_dbTaskMessage = 'create';
			simb_det_formPanel.getForm().reset();
			det_simb_idField.setValue(0);
			window.scrollTo(0,0);
		}
		
		function simb_det_setForm(){
			simb_det_dbTask = 'UPDATE';
            simb_det_dbTaskMessage = 'update';
			
			var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
			simb_det_formPanel.loadRecord(record);
			det_simb_idField.setValue(record.data.det_simb_id);
			det_simb_simb_idField.setValue(record.data.det_simb_simb_id);
			det_simb_jenisField.setValue(record.data.det_simb_jenis);
			det_simb_tanggalField.setValue(record.data.det_simb_tanggal);
			if(record.data.det_simb_retribusi != 0){
				simb_det_retribusiField.setValue({ simb_retribusi : ['1'] });
			}else{
				simb_det_retribusiField.setValue({ simb_retribusi : ['0'] });
			}
			simb_det_retibusiNilaiField.setValue(record.data.det_simb_retribusi);
			simb_det_syaratDataStore.proxy.extraParams = { 
				simb_id : record.data.det_simb_simb_id,
				simb_det_id : record.data.det_simb_id,
				currentAction : 'update',
				action : 'GETSYARAT'
			};
			simb_det_syaratDataStore.load();
		}
		
		function simb_det_showSearchWindow(){
			simb_det_searchWindow.show();
		}
		
		function simb_det_printExcel(outputType){
			var searchText = "";
			if(simb_det_dataStore.proxy.extraParams.query!==null){searchText = simb_det_dataStore.proxy.extraParams.query;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_simb_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					currentAction : simb_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('../print/t_simb_det_list.xls');
							}else{
								window.open('../print/t_simb_det_list.html','simb_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		simb_det_dataStore = Ext.create('Ext.data.Store',{
			id : 'simb_det_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_simb_det/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'det_simb_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'det_simb_id', type : 'int', mapping : 'det_simb_id' },
				{ name : 'det_simb_simb_id', type : 'string', mapping : 'det_simb_simb_id' },
				{ name : 'det_simb_jenis', type : 'int', mapping : 'det_simb_jenis' },
				{ name : 'det_simb_tanggal', type : 'string', mapping : 'det_simb_tanggal' },
				{ name : 'det_simb_pemohon_id', type : 'int', mapping : 'det_simb_pemohon_id' },
				{ name : 'det_simb_nomorreg', type : 'string', mapping : 'det_simb_nomorreg' },
				{ name : 'det_simb_proses', type : 'string', mapping : 'det_simb_proses' },
				{ name : 'lamaproses', type : 'string', mapping : 'lamaproses' },
				{ name : 'det_simb_sk', type : 'string', mapping : 'det_simb_sk' },
				{ name : 'det_simb_berlaku', type : 'string', mapping : 'det_simb_berlaku' },
				{ name : 'det_simb_kadaluarsa', type : 'string', mapping : 'det_simb_kadaluarsa' },
				{ name : 'det_simb_penerima', type : 'string', mapping : 'det_simb_penerima' },
				{ name : 'det_simb_tanggalterima', type : 'string', mapping : 'det_simb_tanggalterima' },
				{ name : 'det_simb_keterangan', type : 'string', mapping : 'det_simb_keterangan' },
				{ name : 'simb_per_npwp', type : 'string', mapping : 'simb_per_npwp' },
				{ name : 'simb_per_nama', type : 'string', mapping : 'simb_per_nama' },
				{ name : 'simb_per_akta', type : 'string', mapping : 'simb_per_akta' },
				{ name : 'simb_per_bentuk', type : 'int', mapping : 'simb_per_bentuk' },
				{ name : 'simb_per_alamat', type : 'string', mapping : 'simb_per_alamat' },
				{ name : 'simb_per_kel', type : 'string', mapping : 'simb_per_kel' },
				{ name : 'simb_per_kec', type : 'string', mapping : 'simb_per_kec' },
				{ name : 'simb_per_kota', type : 'string', mapping : 'simb_per_kota' },
				{ name : 'simb_per_telp', type : 'string', mapping : 'simb_per_telp' },
				{ name : 'simb_jenis', type : 'string', mapping : 'simb_jenis' },
				{ name : 'simb_status', type : 'int', mapping : 'simb_status' },
				{ name : 'simb_jenisusaha', type : 'string', mapping : 'simb_jenisusaha' },
				{ name : 'simb_panjang', type : 'int', mapping : 'simb_panjang' },
				{ name : 'simb_lebar', type : 'int', mapping : 'simb_lebar' },
				{ name : 'simb_alamat', type : 'string', mapping : 'simb_alamat' },
				{ name : 'simb_kel', type : 'string', mapping : 'simb_kel' },
				{ name : 'simb_kec', type : 'string', mapping : 'simb_kec' },
				{ name : 'simb_bentuk', type : 'int', mapping : 'simb_bentuk' },
				{ name : 'simb_lokasi', type : 'int', mapping : 'simb_lokasi' },
				{ name : 'simb_gangguan', type : 'int', mapping : 'simb_gangguan' },
				{ name : 'simb_batasutara', type : 'string', mapping : 'simb_batasutara' },
				{ name : 'simb_batastimur', type : 'string', mapping : 'simb_batastimur' },
				{ name : 'simb_batasselatan', type : 'string', mapping : 'simb_batasselatan' },
				{ name : 'simb_batasbarat', type : 'string', mapping : 'simb_batasbarat' },
				{ name : 'det_simb_retribusi', type : 'int', mapping : 'det_simb_retribusi' },
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
		simb_det_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						simb_det_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						simb_det_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						simb_det_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						simb_det_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						simb_det_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						simb_det_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						simb_det_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						simb_det_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var simb_det_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : simb_det_confirmAdd
		});
		var simb_det_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : simb_det_confirmUpdate
		});
		var simb_det_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : simb_det_confirmDelete
		});
		var simb_det_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : simb_det_refresh
		});
		var simb_det_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : simb_det_showSearchWindow
		});
		var simb_det_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				simb_det_printExcel('PRINT');
			}
		});
		var simb_det_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				simb_det_printExcel('EXCEL');
			}
		});
		
		var simb_det_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : simb_det_confirmUpdate
		});
		var simb_det_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : simb_det_confirmDelete
		});
		var simb_det_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : simb_det_refresh
		});
		simb_det_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'simb_det_contextMenu',
			items: [
				simb_det_contextMenuEdit,simb_det_contextMenuDelete,'-',simb_det_contextMenuRefresh
			]
		});
		
		var simb_det_bp_printCM = Ext.create('Ext.menu.Item',{
			text : 'Bukti Penerimaan',
			tooltip : 'Cetak Bukti Penerimaan',
			handler : function(){
				var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_simb_det/switchAction',
					params: {
						simbdet_id : record.get('det_simb_id'),
						action : 'CETAKBP'
					},success : function(){
						window.open('../print/simb_buktipenerimaan.html');
					}
				});
			}
		});
		var simb_det_sk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Surat Keputusan',
			tooltip : 'Cetak Surat Keputusan',
			handler : function(){
				var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_simb_det/switchAction',
					params: {
						simbdet_id : record.get('det_simb_id'),
						action : 'CETAKSK'
					},success : function(response){
						var result = response.responseText;
						switch(result){
							case 'success':
								window.open('../print/simb_sk.html');
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
		var simb_det_bap_printCM = Ext.create('Ext.menu.Item',{
			text : 'Rekomendasi',
			tooltip : 'Cetak Rekomendasi',
			handler : function(){
				var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_simb_det/switchAction',
					params: {
						simbdet_id : record.get('det_simb_id'),
						action : 'CETAKREKOMENDASI'
					},success : function(){
						window.open('../print/simb_rekomendasi.html');
					}
				});
			}
		});
		var simb_det_lk_printCM = Ext.create('Ext.menu.Item',{
			text : 'Lembar Kontrol',
			tooltip : 'Cetak Lembar Kontrol',
			handler : function(){
				var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_simb_det/switchAction',
					params: {
						simbdet_id : record.get('det_simb_id'),
						action : 'CETAKLEMBARKONTROL'
					},success : function(){
						window.open('../print/simb_lembarkontrol.html');
					}
				});
			}
		});
		var simb_det_printContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				simb_det_bp_printCM,simb_det_lk_printCM,simb_det_bap_printCM,simb_det_sk_printCM
			]
		});
		function simb_det_ubahProses(proses){
			var record = simb_det_gridPanel.getSelectionModel().getSelection()[0];
			Ext.Ajax.request({
				waitMsg: 'Please wait...',
				url: 'c_t_simb_det/switchAction',
				params: {
					simbdet_id : record.get('det_simb_id'),
					simbdet_nosk : record.get('det_simb_sk'),
					proses : proses,
					action : 'UBAHPROSES'
				},success : function(){
					simb_det_dataStore.reload();
				}
			});
		}
		
		var simb_det_prosesContextMenu = Ext.create('Ext.menu.Menu',{
			items: [
				{
					text : 'Selesai, belum diambil',
					tooltip : 'Ubah Menjadi Selesai, belum diambil',
					handler : function(){
						simb_det_ubahProses('Selesai, belum diambil');
					}
				},
				{
					text : 'Selesai, sudah diambil',
					tooltip : 'Ubah Menjadi Selesai, sudah diambil',
					handler : function(){
						simb_det_ubahProses('Selesai, sudah diambil');
					}
				},
				{
					text : 'Ditolak',
					tooltip : 'Ubah Menjadi Ditolak',
					handler : function(){
						simb_det_ubahProses('Ditolak');
					}
				}
			]
		});
		simb_det_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : simb_det_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						simb_det_dataStore.proxy.extraParams = { action : 'GETLIST'};
						simb_det_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		simb_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'simb_det_gridPanel',
			constrain : true,
			store : simb_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'simb_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						simb_det_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : simb_det_shorcut,
			columns : [
				{
					text : 'Jenis Permohonan',
					dataIndex : 'det_simb_jenis',
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
					dataIndex : 'det_simb_tanggal',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
				{
					text : 'Pemohon',
					dataIndex : 'pemohon_nama',
					width : 200,
					sortable : false
				},
				{
					text : 'Alamat',
					dataIndex : 'pemohon_alamat',
					width : 100,
					flex : 1,
					sortable : false
				},
				{
					text : 'Telp',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'Perusahaan',
					dataIndex : 'simb_per_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Nomor SK',
					dataIndex : 'det_simb_sk',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Berlaku',
					dataIndex : 'det_simb_berlaku',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Kadaluarsa',
					dataIndex : 'det_simb_kadaluarsa',
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
					dataIndex : 'det_simb_proses',
					width : 125,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					text : 'Action',
					hideable : false,
					width:50,
					items: [{
						iconCls: 'icon16x16-edit',
						tooltip: 'Ubah Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							simb_det_confirmUpdate();
						}
					},{
						iconCls: 'icon16x16-delete',
						tooltip: 'Hapus Data',
						handler: function(grid, rowIndex){
							grid.getSelectionModel().select(rowIndex);
							simb_det_confirmDelete();
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Proses',
					hideable : false,
					width:50,
					items: [{
						iconCls : 'checked',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							simb_det_prosesContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				},
				{
					xtype:'actioncolumn',
					text : 'Cetak',
					hideable : false,
					width:50,
					items: [{
						iconCls: 'icon16x16-print',
						tooltip: 'Cetak Dokumen',
						handler: function(grid, rowIndex, colIndex, node, e) {
							e.stopEvent();
							simb_det_printContextMenu.showAt(e.getXY());
							return false;
						}
					}]
				}
			],
			tbar : [
				simb_det_addButton,
				simb_det_gridSearchField,
				simb_det_refreshButton,
				simb_det_printButton,
				simb_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : simb_det_dataStore,
				displayInfo : true
			})/* ,
			listeners : {
				afterrender : function(){
					simb_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			} */
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_simb_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_simb_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/
		});
		det_simb_simb_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_simb_simb_id',
			fieldLabel : 'Id <font color=red>*</font>',
			allowBlank : false,
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
		det_simb_jenisField = Ext.create('Ext.form.ComboBox',{
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
						det_simb_sklamaField.show();
					}else{
						det_simb_sklamaField.hide();
					}
				}
			}
		});
		det_simb_sklamaField = Ext.create('Ext.form.ComboBox',{
			name : 'det_simb_lama',
			fieldLabel : 'Nomor SK Lama',
			store : simb_det_dataStore,
			displayField : 'det_simb_sk',
			valueField : 'det_simb_simb_id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			hidden : true,
			onTriggerClick: function(event){
				var store = det_simb_sklamaField.getStore();
				var val = det_simb_sklamaField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',det_simb_sk : val};
				store.load();
				det_simb_sklamaField.expand();
				det_simb_sklamaField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">SK : {det_simb_sk}<br>Nama Praktek : {simb_nama}<br>Alamat : {simb_alamat}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					// simb_det_pemohon_idField.setValue(rec.get('pemohon_id'));
				}
			}
		});
		det_simb_tanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_tanggal',
			fieldLabel : 'Tanggal <font color=red>*</font>',
			format : 'd-m-Y',
			readOnly : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		det_simb_pemohon_idField = Ext.create('Ext.form.NumberField',{
			name : 'det_simb_pemohon_id',
			fieldLabel : 'det_simb_pemohon_id',
			allowNegatife : false,
			blankText : '0',
			hidden : true,
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_simb_nomorregField = Ext.create('Ext.form.TextField',{
			name : 'det_simb_nomorreg',
			fieldLabel : 'det_simb_nomorreg',
			hidden : true,
			maxLength : 255
		});
		det_simb_prosesField = Ext.create('Ext.form.TextField',{
			name : 'det_simb_proses',
			fieldLabel : 'det_simb_proses',
			hidden : true,
			maxLength : 255
		});
		det_simb_skField = Ext.create('Ext.form.TextField',{
			name : 'det_simb_sk',
			fieldLabel : 'det_simb_sk',
			hidden : true,
			maxLength : 255
		});
		det_simb_berlakuField = Ext.create('Ext.form.field.Date',{
			name : 'det_simb_berlaku',
			fieldLabel : 'Berlaku',
			hidden : true,
			format : 'd-m-Y'
		});
		det_simb_kadaluarsaField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_kadaluarsa',
			fieldLabel : 'Kadaluarsa',
			format : 'd-m-Y'
		});
		det_simb_penerimaField = Ext.create('Ext.form.TextField',{
			name : 'det_simb_penerima',
			fieldLabel : 'Penerima',
			maxLength : 255
		});
		det_simb_tanggalterimaField = Ext.create('Ext.form.field.Date',{
			name : 'det_simb_tanggalterima',
			fieldLabel : 'Tanggal Terima',
			format : 'd-m-Y'
		});
		det_simb_keteranganField = Ext.create('Ext.form.TextArea',{
			name : 'det_simb_keterangan',
			fieldLabel : 'Keterangan',
			maxLength : 255
		});
		
		simb_per_npwpField = Ext.create('Ext.form.TextField',{
			name : 'simb_per_npwp',
			fieldLabel : 'NPWP/NPWPD',
			maxLength : 50
		});
		simb_per_namaField = Ext.create('Ext.form.TextField',{
			name : 'simb_per_nama',
			fieldLabel : 'Nama Perusahaan',
			maxLength : 50
		});
		simb_per_aktaField = Ext.create('Ext.form.TextField',{
			name : 'simb_per_akta',
			fieldLabel : 'Akta Pendirian',
			maxLength : 50
		});
		simb_per_bentukField = Ext.create('Ext.form.ComboBox',{
			name : 'simb_per_bentuk',
			fieldLabel : 'Bentuk Perusahaan',
			store : new Ext.data.ArrayStore({
				fields : ['bentuk_id', 'bentuk_nama'],
				data : [[1,'PT'],[2,'BUMN'],[3,'KOPERASI'],[4,'CV'],[5,'PERSEKUTUAN FIRMA'],[6,'PERUSAHAAN PERORANGAN']]
			}),
			displayField : 'bentuk_nama',
			valueField : 'bentuk_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_per_alamatField = Ext.create('Ext.form.TextField',{
			name : 'simb_per_alamat',
			fieldLabel : 'Alamat',
			maxLength : 200
		});
		simb_per_kelField = Ext.create('Ext.form.TextField',{
			name : 'simb_per_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		simb_per_kecField = Ext.create('Ext.form.TextField',{
			name : 'simb_per_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		simb_per_kotaField = Ext.create('Ext.form.TextField',{
			name : 'simb_per_kota',
			fieldLabel : 'Kota',
			maxLength : 50
		});
		simb_per_telpField = Ext.create('Ext.form.TextField',{
			name : 'simb_per_telp',
			fieldLabel : 'Telepon',
			maxLength : 20
		});
		simb_jenisField = Ext.create('Ext.form.TextField',{
			name : 'simb_jenis',
			fieldLabel : 'Jenis Perusahaan',
			maxLength : 50
		});
		simb_statusField = Ext.create('Ext.form.ComboBox',{
			name : 'simb_status',
			fieldLabel : 'Status Tempat Usaha',
			store : new Ext.data.ArrayStore({
				fields : ['status_id', 'status_nama'],
				data : [[1,'MILIK SENDIRI'],[2,'SEWA'],[3,'KONTRAK'],[4,'LAINNYA']]
			}),
			displayField : 'status_nama',
			valueField : 'status_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_jenisusahaField = Ext.create('Ext.form.TextField',{
			name : 'simb_jenisusaha',
			fieldLabel : 'Jenis Usaha',
			maxLength : 50
		});
		simb_panjangField = Ext.create('Ext.form.TextField',{
			name : 'simb_panjang',
			fieldLabel : 'Panjang Tempat Usaha',
			maskRe : /([0-9]+)$/
		});
		simb_lebarField = Ext.create('Ext.form.TextField',{
			name : 'simb_lebar',
			fieldLabel : 'Lebar Tempat Usaha',
			maskRe : /([0-9]+)$/
		});
		simb_alamatField = Ext.create('Ext.form.TextField',{
			name : 'simb_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		simb_kelField = Ext.create('Ext.form.TextField',{
			name : 'simb_kel',
			fieldLabel : 'Kelurahan',
			maxLength : 50
		});
		simb_kecField = Ext.create('Ext.form.TextField',{
			name : 'simb_kec',
			fieldLabel : 'Kecamatan',
			maxLength : 50
		});
		simb_bentukField = Ext.create('Ext.form.ComboBox',{
			name : 'simb_bentuk',
			fieldLabel : 'Bentuk',
			store : new Ext.data.ArrayStore({
				fields : ['bentuk_id', 'bentuk_nama'],
				data : [[1,'PERMANEN'],[2,'SEMI PERMANEN']]
			}),
			displayField : 'bentuk_nama',
			valueField : 'bentuk_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_lokasiField = Ext.create('Ext.form.ComboBox',{
			name : 'simb_lokasi',
			fieldLabel : 'Indeks Lokasi',
			store : new Ext.data.ArrayStore({
				fields : ['lokasi_id', 'lokasi_nama'],
				data : [[1,'KAWASAN INDUSTRI'],[2,'ZONA INDUSTRI'],[3,'KAWASAN CAMPURAN']]
			}),
			displayField : 'lokasi_nama',
			valueField : 'lokasi_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_gangguanField = Ext.create('Ext.form.ComboBox',{
			name : 'simb_gangguan',
			fieldLabel : 'Indeks Gangguan',
			store : new Ext.data.ArrayStore({
				fields : ['gangguan_id', 'gangguan_nama'],
				data : [[1,'BESAR'],[2,'SEDANG'],[3,'KECIL']]
			}),
			displayField : 'gangguan_nama',
			valueField : 'gangguan_id',
			queryMode : 'local',
			triggerAction : 'all',
			forceSelection : true
		});
		simb_batasutaraField = Ext.create('Ext.form.TextField',{
			name : 'simb_batasutara',
			fieldLabel : 'Batas Utara',
			maxLength : 100
		});
		simb_batastimurField = Ext.create('Ext.form.TextField',{
			name : 'simb_batastimur',
			fieldLabel : 'Batas Timur',
			maxLength : 100
		});
		simb_batasselatanField = Ext.create('Ext.form.TextField',{
			name : 'simb_batasselatan',
			fieldLabel : 'Batas Selatan',
			maxLength : 100
		});
		simb_batasbaratField = Ext.create('Ext.form.TextField',{
			name : 'simb_batasbarat',
			fieldLabel : 'Batas Barat',
			maxLength : 100
		});
		var simb_det_pemohon_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_id'
		});
		var simb_det_pemohon_namaField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_nama',
			fieldLabel : 'Nama',
			maxLength : 50
		});
		var simb_det_pemohon_alamatField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_alamat',
			fieldLabel : 'Alamat',
			maxLength : 100
		});
		var simb_det_pemohon_telpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_telp',
			fieldLabel : 'Telp',
			maxLength : 20,
			maskRe : /([0-9]+)$/
		});
		var simb_det_pemohon_npwpField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_npwp',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		var simb_det_pemohon_rtField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rt',
			fieldLabel : 'RT',
			maskRe : /([0-9]+)$/
		});
		var simb_det_pemohon_rwField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_rw',
			fieldLabel : 'RW',
			maskRe : /([0-9]+)$/
		});
		var simb_det_pemohon_kelField = Ext.create('Ext.form.ComboBox',{
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
		var simb_det_pemohon_kecField = Ext.create('Ext.form.ComboBox',{
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
		var simb_det_pemohon_nikField = Ext.create('Ext.form.ComboBox',{
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
				var store = simb_det_pemohon_nikField.getStore();
				var val = simb_det_pemohon_nikField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',pemohon_nik : val};
				store.load();
				simb_det_pemohon_nikField.expand();
				simb_det_pemohon_nikField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">NIK : {pemohon_nik}<br>Nama : {pemohon_nama}<br>Alamat : {pemohon_alamat}<br>Telp : {pemohon_telp}<br></div>',
				'</tpl>'
			),
			listeners : {
				select : function(cmb, record){
					var rec=record[0];
					simb_det_pemohon_idField.setValue(rec.get('pemohon_id'));
					simb_det_pemohon_nikField.setValue(rec.get('pemohon_nik'));
					simb_det_pemohon_namaField.setValue(rec.get('pemohon_nama'));
					simb_det_pemohon_alamatField.setValue(rec.get('pemohon_alamat'));
					simb_det_pemohon_telpField.setValue(rec.get('pemohon_telp'));
					simb_det_pemohon_npwpField.setValue(rec.get('pemohon_npwp'));
					simb_det_pemohon_rtField.setValue(rec.get('pemohon_rt'));
					simb_det_pemohon_rwField.setValue(rec.get('pemohon_rw'));
					simb_det_pemohon_kelField.setValue(rec.get('pemohon_kel'));
					simb_det_pemohon_kecField.setValue(rec.get('pemohon_kec'));
					simb_det_pemohon_straField.setValue(rec.get('pemohon_stra'));
					simb_det_pemohon_surattugasField.setValue(rec.get('pemohon_surattugas'));
					simb_det_pemohon_pekerjaanField.setValue(rec.get('pemohon_pekerjaan'));
					simb_det_pemohon_tempatlahirField.setValue(rec.get('pemohon_tempatlahir'));
					simb_det_pemohon_tanggallahirField.setValue(rec.get('pemohon_tanggallahir'));
					simb_det_pemohon_user_idField.setValue(rec.get('pemohon_user_id'));
					simb_det_pemohon_pendidikanField.setValue(rec.get('pemohon_pendidikan'));
					simb_det_pemohon_tahunlulusField.setValue(rec.get('pemohon_tahunlulus'));
				}
			}
		});
		var simb_det_pemohon_straField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_stra',
			fieldLabel : 'STRA',
			hidden : true,
			maxLength : 50
		});
		var simb_det_pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_surattugas',
			fieldLabel : 'Surat Tugas',
			hidden : true,
			maxLength : 50
		});
		var simb_det_pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pekerjaan',
			fieldLabel : 'Pekerjaan',
			maxLength : 50
		});
		var simb_det_pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tempatlahir',
			fieldLabel : 'Tempat Lahir',
			maxLength : 50
		});
		var simb_det_pemohon_tanggallahirField = Ext.create('Ext.form.field.Date',{
			name : 'pemohon_tanggallahir',
			fieldLabel : 'Tanggal Lahir',
			format : 'd-m-Y'
		});
		var simb_det_pemohon_user_idField = Ext.create('Ext.form.Hidden',{
			name : 'pemohon_user_id',
		});
		var simb_det_pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_pendidikan',
			fieldLabel : 'Pendidikan',
			maxLength : 50
		});
		var simb_det_pemohon_tahunlulusField = Ext.create('Ext.form.TextField',{
			name : 'pemohon_tahunlulus',
			fieldLabel : 'Tahun Lulus',
			maxLength : 4,
			maskRe : /([0-9]+)$/
		});
		
		simb_det_syaratDataStore = Ext.create('Ext.data.Store',{
			id : 'simb_det_syaratDataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_simb_det/switchAction',
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
				{ name : 'simb_cek_id', type : 'int', mapping : 'simb_cek_id' },
				{ name : 'simb_cek_syarat_id', type : 'int', mapping : 'simb_cek_syarat_id' },
				{ name : 'simb_cek_simbdet_id', type : 'int', mapping : 'simb_cek_simbdet_id' },
				{ name : 'simb_cek_simb_id', type : 'int', mapping : 'simb_cek_simb_id' },
				{ name : 'simb_cek_status', type : 'boolean', mapping : 'simb_cek_status' },
				{ name : 'simb_cek_keterangan', type : 'string', mapping : 'simb_cek_keterangan' },
				{ name : 'simb_cek_syarat_nama', type : 'string', mapping : 'simb_cek_syarat_nama' }
				]
		});
		var det_simb_syaratGridEditor = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});
		det_simb_syaratGrid = Ext.create('Ext.grid.Panel',{
			id : 'det_simb_syaratGrid',
			store : simb_det_syaratDataStore,
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
					dataIndex : 'simb_cek_id',
					width : 100,
					hidden : true,
					hideable: false,
					sortable : false
				},
				{
					text : 'Syarat',
					dataIndex : 'simb_cek_syarat_nama',
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
					dataIndex: 'simb_cek_status',
					width: 55,
					stopSelection: false
				},
				{
					text : 'Keterangan',
					dataIndex : 'simb_cek_keterangan',
					width : 100,
					sortable : false,
					editor: 'textfield',
					flex : 1
				}
			]
		});
		var simb_det_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : simb_det_save
		});
		var simb_det_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				simb_det_resetForm();
				simb_det_switchToGrid();
			}
		});
		
		var simb_det_pendukungfieldset = Ext.create('Ext.form.FieldSet',{
			title : '5. Data Pendukung',
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				simb_jenisField,
				simb_statusField,
				simb_jenisusahaField,
				simb_panjangField,
				simb_lebarField,
				simb_alamatField,
				simb_kelField,
				simb_kecField,
				simb_bentukField,
				simb_lokasiField,
				simb_gangguanField,
				simb_batasutaraField,
				simb_batastimurField,
				simb_batasselatanField,
				simb_batasbaratField,
				det_simb_skField,
				det_simb_berlakuField,
				det_simb_penerimaField,
				det_simb_tanggalterimaField,
				det_simb_keteranganField,
				det_simb_kadaluarsaField,
			]
		});
		/* START DATA RETRIBUSI */
		var simb_det_retribusiField = Ext.create('Ext.form.RadioGroup',{
			fieldLabel : 'Retribusi ',
			vertical : false,
			items : [
				{ boxLabel : 'Gratis', name : 'simb_retribusi', inputValue : '0', checked : true},
				{ boxLabel : 'Bayar', name : 'simb_retribusi', inputValue : '1'}
			],
			listeners : {
				change : function(com, newval, oldval, e){
					if(newval.simb_retribusi == 1){
						simb_det_retibusiNilaiField.show();
					}else{
						simb_det_retibusiNilaiField.hide();
					}
				}
			}
		});
		var simb_det_retibusiNilaiField = Ext.create('Ext.form.TextField',{
			name : 'permohonan_retribusi',
			fieldLabel : 'Nominal Retribusi ',
			maxLength : 100,
			hidden : true,
			value : 0
		});
		simb_det_retibusiTanggalField = Ext.create('Ext.form.field.Date',{
			name : 'permohonan_retribusi_tanggal',
			fieldLabel : 'Tanggal',
			format : 'd-m-Y',
			hidden : true,
			value : new Date('<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>')
		});
		var simb_det_retribusifieldset = Ext.create('Ext.form.FieldSet',{
			title : '6. Data Retribusi',
			columnWidth : 0.5,
			checkboxToggle : false,
			collapsible : false,
			layout :'form',
			items : [
				simb_det_retribusiField,
				simb_det_retibusiNilaiField,
				simb_det_retibusiTanggalField
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
		simb_det_formPanel = Ext.create('Ext.form.Panel', {
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
						det_simb_idField,
						det_simb_simb_idField,
						permohonan_idField,
						det_simb_jenisField,
						det_simb_tanggalField,
						det_simb_pemohon_idField,
						det_simb_nomorregField,
						det_simb_prosesField,
					]
				},
				{
					xtype : 'fieldset',
					title : '2. Data Pemohon',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						simb_det_pemohon_idField,
						simb_det_pemohon_nikField,
						simb_det_pemohon_namaField,
						simb_det_pemohon_alamatField,
						simb_det_pemohon_telpField,
						simb_det_pemohon_npwpField,
						simb_det_pemohon_rtField,
						simb_det_pemohon_rwField,
						simb_det_pemohon_kelField,
						simb_det_pemohon_kecField,
						simb_det_pemohon_straField,
						simb_det_pemohon_surattugasField,
						simb_det_pemohon_pekerjaanField,
						simb_det_pemohon_tempatlahirField,
						simb_det_pemohon_tanggallahirField,
						simb_det_pemohon_user_idField,
						simb_det_pemohon_pendidikanField,
						simb_det_pemohon_tahunlulusField
					]
				},
				{
					xtype : 'fieldset',
					title : '3. Data Perusahaan',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						/* simb_per_npwpField,
						simb_per_namaField,
						simb_per_aktaField,
						simb_per_bentukField,
						simb_per_alamatField,
						simb_per_kelField,
						simb_per_kecField,
						simb_per_kotaField,
						simb_per_telpField, */
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
				},
				{
					xtype : 'fieldset',
					title : '4. Data Ceklist',
					checkboxToggle : false,
					collapsible : false,
					layout :'form',
					items : [
						det_simb_syaratGrid
					]
				},
				simb_det_pendukungfieldset, simb_det_retribusifieldset,
				Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })
			],
			buttons : [simb_det_saveButton,simb_det_cancelButton]
		});
		simb_det_formWindow = Ext.create('Ext.window.Window',{
			id : 'simb_det_formWindow',
			renderTo : 'simb_detSaveWindow',
			title : globalFormAddEditTitle + ' ' + simb_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [simb_det_formPanel]
		});
/* End FormPanel declaration */
	<?php if(@$_SESSION['IDHAK'] == 2){ ?>
		simb_det_lk_printCM.hide();
		simb_det_bap_printCM.hide();
		simb_det_sk_printCM.hide();
		simb_det_pendukungfieldset.hide();
		simb_det_gridPanel.columns[11].setVisible(false);
		simb_det_gridPanel.columns[12].setVisible(false);
	<?php } ?>
});
</script>
<div id="simb_detSaveWindow"></div>
<div class="container col-md-12" id="simb_detGrid"></div>