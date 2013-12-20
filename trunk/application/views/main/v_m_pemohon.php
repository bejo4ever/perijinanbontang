<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var pemohon_componentItemTitle="PEMOHON";
		var pemohon_dataStore;
		
		var pemohon_shorcut;
		var pemohon_contextMenu;
		var pemohon_gridSearchField;
		var pemohon_gridPanel;
		var pemohon_formPanel;
		var pemohon_formWindow;
		var pemohon_searchPanel;
		var pemohon_searchWindow;
		
		var pemohon_idField;
		var pemohon_namaField;
		var pemohon_alamatField;
		var pemohon_telpField;
		var pemohon_npwpField;
		var pemohon_rtField;
		var pemohon_rwField;
		var pemohon_kelField;
		var pemohon_kecField;
		var pemohon_nikField;
		var pemohon_straField;
		var pemohon_surattugasField;
		var pemohon_pekerjaanField;
		var pemohon_tempatlahirField;
		var pemohon_tanggallahirField;
		var pemohon_user_idField;
		var pemohon_pendidikanField;
		var pemohon_tahunlulusField;
				
		var pemohon_namaSearchField;
		var pemohon_alamatSearchField;
		var pemohon_telpSearchField;
		var pemohon_npwpSearchField;
		var pemohon_rtSearchField;
		var pemohon_rwSearchField;
		var pemohon_kelSearchField;
		var pemohon_kecSearchField;
		var pemohon_nikSearchField;
		var pemohon_straSearchField;
		var pemohon_surattugasSearchField;
		var pemohon_pekerjaanSearchField;
		var pemohon_tempatlahirSearchField;
		var pemohon_tanggallahirSearchField;
		var pemohon_user_idSearchField;
		var pemohon_pendidikanSearchField;
		var pemohon_tahunlulusSearchField;
				
		var pemohon_dbTask = 'CREATE';
		var pemohon_dbTaskMessage = 'Tambah';
		var pemohon_dbPermission = 'CRUD';
		var pemohon_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function pemohon_switchToGrid(){
			pemohon_formPanel.setDisabled(true);
			pemohon_gridPanel.setDisabled(false);
			pemohon_formWindow.hide();
		}
		
		function pemohon_switchToForm(){
			pemohon_gridPanel.setDisabled(true);
			pemohon_formPanel.setDisabled(false);
			pemohon_formWindow.show();
		}
		
		function pemohon_confirmAdd(){
			pemohon_dbTask = 'CREATE';
			pemohon_dbTaskMessage = 'created';
			pemohon_resetForm();
			pemohon_switchToForm();
		}
		
		function pemohon_confirmUpdate(){
			if(pemohon_gridPanel.selModel.getCount() == 1) {
				pemohon_dbTask = 'UPDATE';
				pemohon_dbTaskMessage = 'updated';
				pemohon_switchToForm();
				pemohon_setForm();
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
		
		function pemohon_confirmDelete(){
			if(pemohon_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, pemohon_delete);
			}else if(pemohon_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, pemohon_delete);
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
		
		function pemohon_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(pemohon_dbPermission)==false && pattC.test(pemohon_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(pemohon_confirmFormValid()){
					var pemohon_idValue = '';
					var pemohon_namaValue = '';
					var pemohon_alamatValue = '';
					var pemohon_telpValue = '';
					var pemohon_npwpValue = '';
					var pemohon_rtValue = '';
					var pemohon_rwValue = '';
					var pemohon_kelValue = '';
					var pemohon_kecValue = '';
					var pemohon_nikValue = '';
					var pemohon_straValue = '';
					var pemohon_surattugasValue = '';
					var pemohon_pekerjaanValue = '';
					var pemohon_tempatlahirValue = '';
					var pemohon_tanggallahirValue = '';
					var pemohon_user_idValue = '';
					var pemohon_pendidikanValue = '';
					var pemohon_tahunlulusValue = '';
										
					pemohon_idValue = pemohon_idField.getValue();
					pemohon_namaValue = pemohon_namaField.getValue();
					pemohon_alamatValue = pemohon_alamatField.getValue();
					pemohon_telpValue = pemohon_telpField.getValue();
					pemohon_npwpValue = pemohon_npwpField.getValue();
					pemohon_rtValue = pemohon_rtField.getValue();
					pemohon_rwValue = pemohon_rwField.getValue();
					pemohon_kelValue = pemohon_kelField.getValue();
					pemohon_kecValue = pemohon_kecField.getValue();
					pemohon_nikValue = pemohon_nikField.getValue();
					pemohon_straValue = pemohon_straField.getValue();
					pemohon_surattugasValue = pemohon_surattugasField.getValue();
					pemohon_pekerjaanValue = pemohon_pekerjaanField.getValue();
					pemohon_tempatlahirValue = pemohon_tempatlahirField.getValue();
					pemohon_tanggallahirValue = pemohon_tanggallahirField.getValue();
					pemohon_user_idValue = pemohon_user_idField.getValue();
					pemohon_pendidikanValue = pemohon_pendidikanField.getValue();
					pemohon_tahunlulusValue = pemohon_tahunlulusField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_m_pemohon/switchAction',
						params: {							
							pemohon_id : pemohon_idValue,
							pemohon_nama : pemohon_namaValue,
							pemohon_alamat : pemohon_alamatValue,
							pemohon_telp : pemohon_telpValue,
							pemohon_npwp : pemohon_npwpValue,
							pemohon_rt : pemohon_rtValue,
							pemohon_rw : pemohon_rwValue,
							pemohon_kel : pemohon_kelValue,
							pemohon_kec : pemohon_kecValue,
							pemohon_nik : pemohon_nikValue,
							pemohon_stra : pemohon_straValue,
							pemohon_surattugas : pemohon_surattugasValue,
							pemohon_pekerjaan : pemohon_pekerjaanValue,
							pemohon_tempatlahir : pemohon_tempatlahirValue,
							pemohon_tanggallahir : pemohon_tanggallahirValue,
							pemohon_user_id : pemohon_user_idValue,
							pemohon_pendidikan : pemohon_pendidikanValue,
							pemohon_tahunlulus : pemohon_tahunlulusValue,
							action : pemohon_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									pemohon_dataStore.reload();
									pemohon_resetForm();
									pemohon_switchToGrid();
									pemohon_gridPanel.getSelectionModel().deselectAll();
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
											window.location="index.php";
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
		
		function pemohon_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(pemohon_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = pemohon_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< pemohon_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.pemohon_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_m_pemohon/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									pemohon_dataStore.reload();
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
		
		function pemohon_refresh(){
			pemohon_dbListAction = "GETLIST";
			pemohon_gridSearchField.reset();
			pemohon_searchPanel.getForm().reset();
			pemohon_dataStore.proxy.extraParams = { action : 'GETLIST' };
			pemohon_dataStore.proxy.extraParams.query = "";
			pemohon_dataStore.currentPage = 1;
			pemohon_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function pemohon_confirmFormValid(){
			return pemohon_formPanel.getForm().isValid();
		}
		
		function pemohon_resetForm(){
			pemohon_dbTask = 'CREATE';
			pemohon_dbTaskMessage = 'create';
			pemohon_formPanel.getForm().reset();
			pemohon_idField.setValue(0);
		}
		
		function pemohon_setForm(){
			pemohon_dbTask = 'UPDATE';
            pemohon_dbTaskMessage = 'update';
			
			var record = pemohon_gridPanel.getSelectionModel().getSelection()[0];
			pemohon_idField.setValue(record.data.pemohon_id);
			pemohon_namaField.setValue(record.data.pemohon_nama);
			pemohon_alamatField.setValue(record.data.pemohon_alamat);
			pemohon_telpField.setValue(record.data.pemohon_telp);
			pemohon_npwpField.setValue(record.data.pemohon_npwp);
			pemohon_rtField.setValue(record.data.pemohon_rt);
			pemohon_rwField.setValue(record.data.pemohon_rw);
			pemohon_kelField.setValue(record.data.pemohon_kel);
			pemohon_kecField.setValue(record.data.pemohon_kec);
			pemohon_nikField.setValue(record.data.pemohon_nik);
			pemohon_straField.setValue(record.data.pemohon_stra);
			pemohon_surattugasField.setValue(record.data.pemohon_surattugas);
			pemohon_pekerjaanField.setValue(record.data.pemohon_pekerjaan);
			pemohon_tempatlahirField.setValue(record.data.pemohon_tempatlahir);
			pemohon_tanggallahirField.setValue(record.data.pemohon_tanggallahir);
			pemohon_user_idField.setValue(record.data.pemohon_user_id);
			pemohon_pendidikanField.setValue(record.data.pemohon_pendidikan);
			pemohon_tahunlulusField.setValue(record.data.pemohon_tahunlulus);
					}
		
		function pemohon_showSearchWindow(){
			pemohon_searchWindow.show();
		}
		
		function pemohon_search(){
			pemohon_gridSearchField.reset();
			
			var pemohon_namaValue = '';
			var pemohon_alamatValue = '';
			var pemohon_telpValue = '';
			var pemohon_npwpValue = '';
			var pemohon_rtValue = '';
			var pemohon_rwValue = '';
			var pemohon_kelValue = '';
			var pemohon_kecValue = '';
			var pemohon_nikValue = '';
			var pemohon_straValue = '';
			var pemohon_surattugasValue = '';
			var pemohon_pekerjaanValue = '';
			var pemohon_tempatlahirValue = '';
			var pemohon_tanggallahirValue = '';
			var pemohon_user_idValue = '';
			var pemohon_pendidikanValue = '';
			var pemohon_tahunlulusValue = '';
						
			pemohon_namaValue = pemohon_namaSearchField.getValue();
			pemohon_alamatValue = pemohon_alamatSearchField.getValue();
			pemohon_telpValue = pemohon_telpSearchField.getValue();
			pemohon_npwpValue = pemohon_npwpSearchField.getValue();
			pemohon_rtValue = pemohon_rtSearchField.getValue();
			pemohon_rwValue = pemohon_rwSearchField.getValue();
			pemohon_kelValue = pemohon_kelSearchField.getValue();
			pemohon_kecValue = pemohon_kecSearchField.getValue();
			pemohon_nikValue = pemohon_nikSearchField.getValue();
			pemohon_straValue = pemohon_straSearchField.getValue();
			pemohon_surattugasValue = pemohon_surattugasSearchField.getValue();
			pemohon_pekerjaanValue = pemohon_pekerjaanSearchField.getValue();
			pemohon_tempatlahirValue = pemohon_tempatlahirSearchField.getValue();
			pemohon_tanggallahirValue = pemohon_tanggallahirSearchField.getValue();
			pemohon_user_idValue = pemohon_user_idSearchField.getValue();
			pemohon_pendidikanValue = pemohon_pendidikanSearchField.getValue();
			pemohon_tahunlulusValue = pemohon_tahunlulusSearchField.getValue();
			pemohon_dbListAction = "SEARCH";
			pemohon_dataStore.proxy.extraParams = { 
				pemohon_nama : pemohon_namaValue,
				pemohon_alamat : pemohon_alamatValue,
				pemohon_telp : pemohon_telpValue,
				pemohon_npwp : pemohon_npwpValue,
				pemohon_rt : pemohon_rtValue,
				pemohon_rw : pemohon_rwValue,
				pemohon_kel : pemohon_kelValue,
				pemohon_kec : pemohon_kecValue,
				pemohon_nik : pemohon_nikValue,
				pemohon_stra : pemohon_straValue,
				pemohon_surattugas : pemohon_surattugasValue,
				pemohon_pekerjaan : pemohon_pekerjaanValue,
				pemohon_tempatlahir : pemohon_tempatlahirValue,
				pemohon_tanggallahir : pemohon_tanggallahirValue,
				pemohon_user_id : pemohon_user_idValue,
				pemohon_pendidikan : pemohon_pendidikanValue,
				pemohon_tahunlulus : pemohon_tahunlulusValue,
				action : 'SEARCH'
			};
			pemohon_dataStore.currentPage = 1;
			pemohon_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function pemohon_printExcel(outputType){
			var searchText = "";
			var pemohon_namaValue = '';
			var pemohon_alamatValue = '';
			var pemohon_telpValue = '';
			var pemohon_npwpValue = '';
			var pemohon_rtValue = '';
			var pemohon_rwValue = '';
			var pemohon_kelValue = '';
			var pemohon_kecValue = '';
			var pemohon_nikValue = '';
			var pemohon_straValue = '';
			var pemohon_surattugasValue = '';
			var pemohon_pekerjaanValue = '';
			var pemohon_tempatlahirValue = '';
			var pemohon_tanggallahirValue = '';
			var pemohon_user_idValue = '';
			var pemohon_pendidikanValue = '';
			var pemohon_tahunlulusValue = '';
			
			if(pemohon_dataStore.proxy.extraParams.query!==null){searchText = pemohon_dataStore.proxy.extraParams.query;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_nama!==null){pemohon_namaValue = pemohon_dataStore.proxy.extraParams.pemohon_nama;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_alamat!==null){pemohon_alamatValue = pemohon_dataStore.proxy.extraParams.pemohon_alamat;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_telp!==null){pemohon_telpValue = pemohon_dataStore.proxy.extraParams.pemohon_telp;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_npwp!==null){pemohon_npwpValue = pemohon_dataStore.proxy.extraParams.pemohon_npwp;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_rt!==null){pemohon_rtValue = pemohon_dataStore.proxy.extraParams.pemohon_rt;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_rw!==null){pemohon_rwValue = pemohon_dataStore.proxy.extraParams.pemohon_rw;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_kel!==null){pemohon_kelValue = pemohon_dataStore.proxy.extraParams.pemohon_kel;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_kec!==null){pemohon_kecValue = pemohon_dataStore.proxy.extraParams.pemohon_kec;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_nik!==null){pemohon_nikValue = pemohon_dataStore.proxy.extraParams.pemohon_nik;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_stra!==null){pemohon_straValue = pemohon_dataStore.proxy.extraParams.pemohon_stra;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_surattugas!==null){pemohon_surattugasValue = pemohon_dataStore.proxy.extraParams.pemohon_surattugas;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_pekerjaan!==null){pemohon_pekerjaanValue = pemohon_dataStore.proxy.extraParams.pemohon_pekerjaan;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_tempatlahir!==null){pemohon_tempatlahirValue = pemohon_dataStore.proxy.extraParams.pemohon_tempatlahir;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_tanggallahir!==null){pemohon_tanggallahirValue = pemohon_dataStore.proxy.extraParams.pemohon_tanggallahir;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_user_id!==null){pemohon_user_idValue = pemohon_dataStore.proxy.extraParams.pemohon_user_id;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_pendidikan!==null){pemohon_pendidikanValue = pemohon_dataStore.proxy.extraParams.pemohon_pendidikan;}
			if(pemohon_dataStore.proxy.extraParams.pemohon_tahunlulus!==null){pemohon_tahunlulusValue = pemohon_dataStore.proxy.extraParams.pemohon_tahunlulus;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_m_pemohon/switchAction',
				params : {
					action : outputType,
					query : searchText,
					pemohon_nama : pemohon_namaValue,
					pemohon_alamat : pemohon_alamatValue,
					pemohon_telp : pemohon_telpValue,
					pemohon_npwp : pemohon_npwpValue,
					pemohon_rt : pemohon_rtValue,
					pemohon_rw : pemohon_rwValue,
					pemohon_kel : pemohon_kelValue,
					pemohon_kec : pemohon_kecValue,
					pemohon_nik : pemohon_nikValue,
					pemohon_stra : pemohon_straValue,
					pemohon_surattugas : pemohon_surattugasValue,
					pemohon_pekerjaan : pemohon_pekerjaanValue,
					pemohon_tempatlahir : pemohon_tempatlahirValue,
					pemohon_tanggallahir : pemohon_tanggallahirValue,
					pemohon_user_id : pemohon_user_idValue,
					pemohon_pendidikan : pemohon_pendidikanValue,
					pemohon_tahunlulus : pemohon_tahunlulusValue,
					currentAction : pemohon_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/m_pemohon_list.xls');
							}else{
								window.open('./print/m_pemohon_list.html','pemohonlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		pemohon_dataStore = Ext.create('Ext.data.Store',{
			id : 'pemohon_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_m_pemohon/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'pemohon_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
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
				{ name : 'pemohon_tanggallahir', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'pemohon_tanggallahir' },
				{ name : 'pemohon_user_id', type : 'int', mapping : 'pemohon_user_id' },
				{ name : 'pemohon_pendidikan', type : 'string', mapping : 'pemohon_pendidikan' },
				{ name : 'pemohon_tahunlulus', type : 'int', mapping : 'pemohon_tahunlulus' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		pemohon_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						pemohon_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						pemohon_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						pemohon_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						pemohon_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						pemohon_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						pemohon_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						pemohon_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						pemohon_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var pemohon_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : pemohon_confirmAdd
		});
		var pemohon_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : pemohon_confirmUpdate
		});
		var pemohon_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : pemohon_confirmDelete
		});
		var pemohon_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : pemohon_refresh
		});
		var pemohon_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : pemohon_showSearchWindow
		});
		var pemohon_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				pemohon_printExcel('PRINT');
			}
		});
		var pemohon_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				pemohon_printExcel('EXCEL');
			}
		});
		
		var pemohon_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : pemohon_confirmUpdate
		});
		var pemohon_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : pemohon_confirmDelete
		});
		var pemohon_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : pemohon_refresh
		});
		pemohon_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'pemohon_contextMenu',
			items: [
				pemohon_contextMenuEdit,pemohon_contextMenuDelete,'-',pemohon_contextMenuRefresh
			]
		});
		
		pemohon_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : pemohon_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						pemohon_dataStore.proxy.extraParams = { action : 'GETLIST'};
						pemohon_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		pemohon_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'pemohon_gridPanel',
			constrain : true,
			store : pemohon_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'pemohonGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						pemohon_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : pemohon_shorcut,
			columns : [
				{
					text : 'pemohon_nama',
					dataIndex : 'pemohon_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_alamat',
					dataIndex : 'pemohon_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_telp',
					dataIndex : 'pemohon_telp',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_npwp',
					dataIndex : 'pemohon_npwp',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_rt',
					dataIndex : 'pemohon_rt',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_rw',
					dataIndex : 'pemohon_rw',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_kel',
					dataIndex : 'pemohon_kel',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_kec',
					dataIndex : 'pemohon_kec',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_nik',
					dataIndex : 'pemohon_nik',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_stra',
					dataIndex : 'pemohon_stra',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_surattugas',
					dataIndex : 'pemohon_surattugas',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_pekerjaan',
					dataIndex : 'pemohon_pekerjaan',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_tempatlahir',
					dataIndex : 'pemohon_tempatlahir',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_tanggallahir',
					dataIndex : 'pemohon_tanggallahir',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_user_id',
					dataIndex : 'pemohon_user_id',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_pendidikan',
					dataIndex : 'pemohon_pendidikan',
					width : 100,
					sortable : false
				},
				{
					text : 'pemohon_tahunlulus',
					dataIndex : 'pemohon_tahunlulus',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				pemohon_addButton,
				pemohon_editButton,
				pemohon_deleteButton,
				pemohon_gridSearchField,
				pemohon_searchButton,
				pemohon_refreshButton,
				pemohon_printButton,
				pemohon_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : pemohon_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					pemohon_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		pemohon_idField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_idField',
			name : 'pemohon_id',
			fieldLabel : 'pemohon_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		pemohon_namaField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_namaField',
			name : 'pemohon_nama',
			fieldLabel : 'pemohon_nama',
			maxLength : 50
		});
		pemohon_alamatField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_alamatField',
			name : 'pemohon_alamat',
			fieldLabel : 'pemohon_alamat',
			maxLength : 100
		});
		pemohon_telpField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_telpField',
			name : 'pemohon_telp',
			fieldLabel : 'pemohon_telp',
			maxLength : 20
		});
		pemohon_npwpField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_npwpField',
			name : 'pemohon_npwp',
			fieldLabel : 'pemohon_npwp',
			maxLength : 50
		});
		pemohon_rtField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_rtField',
			name : 'pemohon_rt',
			fieldLabel : 'pemohon_rt',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		pemohon_rwField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_rwField',
			name : 'pemohon_rw',
			fieldLabel : 'pemohon_rw',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		pemohon_kelField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_kelField',
			name : 'pemohon_kel',
			fieldLabel : 'pemohon_kel',
			maxLength : 50
		});
		pemohon_kecField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_kecField',
			name : 'pemohon_kec',
			fieldLabel : 'pemohon_kec',
			maxLength : 50
		});
		pemohon_nikField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_nikField',
			name : 'pemohon_nik',
			fieldLabel : 'pemohon_nik',
			maxLength : 20
		});
		pemohon_straField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_straField',
			name : 'pemohon_stra',
			fieldLabel : 'pemohon_stra',
			maxLength : 50
		});
		pemohon_surattugasField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_surattugasField',
			name : 'pemohon_surattugas',
			fieldLabel : 'pemohon_surattugas',
			maxLength : 50
		});
		pemohon_pekerjaanField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_pekerjaanField',
			name : 'pemohon_pekerjaan',
			fieldLabel : 'pemohon_pekerjaan',
			maxLength : 50
		});
		pemohon_tempatlahirField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_tempatlahirField',
			name : 'pemohon_tempatlahir',
			fieldLabel : 'pemohon_tempatlahir',
			maxLength : 50
		});
		pemohon_tanggallahirField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_tanggallahirField',
			name : 'pemohon_tanggallahir',
			fieldLabel : 'pemohon_tanggallahir',
			maxLength : 0
		});
		pemohon_user_idField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_user_idField',
			name : 'pemohon_user_id',
			fieldLabel : 'pemohon_user_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		pemohon_pendidikanField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_pendidikanField',
			name : 'pemohon_pendidikan',
			fieldLabel : 'pemohon_pendidikan',
			maxLength : 50
		});
		pemohon_tahunlulusField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_tahunlulusField',
			name : 'pemohon_tahunlulus',
			fieldLabel : 'pemohon_tahunlulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var pemohon_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : pemohon_save
		});
		var pemohon_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				pemohon_resetForm();
				pemohon_switchToGrid();
			}
		});
		pemohon_formPanel = Ext.create('Ext.form.Panel', {
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
						pemohon_idField,
						pemohon_namaField,
						pemohon_alamatField,
						pemohon_telpField,
						pemohon_npwpField,
						pemohon_rtField,
						pemohon_rwField,
						pemohon_kelField,
						pemohon_kecField,
						pemohon_nikField,
						pemohon_straField,
						pemohon_surattugasField,
						pemohon_pekerjaanField,
						pemohon_tempatlahirField,
						pemohon_tanggallahirField,
						pemohon_user_idField,
						pemohon_pendidikanField,
						pemohon_tahunlulusField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [pemohon_saveButton,pemohon_cancelButton]
		});
		pemohon_formWindow = Ext.create('Ext.window.Window',{
			id : 'pemohon_formWindow',
			renderTo : 'pemohonSaveWindow',
			title : globalFormAddEditTitle + ' ' + pemohon_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [pemohon_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		pemohon_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_namaSearchField',
			name : 'pemohon_nama',
			fieldLabel : 'pemohon_nama',
			maxLength : 50
		
		});
		pemohon_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_alamatSearchField',
			name : 'pemohon_alamat',
			fieldLabel : 'pemohon_alamat',
			maxLength : 100
		
		});
		pemohon_telpSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_telpSearchField',
			name : 'pemohon_telp',
			fieldLabel : 'pemohon_telp',
			maxLength : 20
		
		});
		pemohon_npwpSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_npwpSearchField',
			name : 'pemohon_npwp',
			fieldLabel : 'pemohon_npwp',
			maxLength : 50
		
		});
		pemohon_rtSearchField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_rtSearchField',
			name : 'pemohon_rt',
			fieldLabel : 'pemohon_rt',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		pemohon_rwSearchField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_rwSearchField',
			name : 'pemohon_rw',
			fieldLabel : 'pemohon_rw',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		pemohon_kelSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_kelSearchField',
			name : 'pemohon_kel',
			fieldLabel : 'pemohon_kel',
			maxLength : 50
		
		});
		pemohon_kecSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_kecSearchField',
			name : 'pemohon_kec',
			fieldLabel : 'pemohon_kec',
			maxLength : 50
		
		});
		pemohon_nikSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_nikSearchField',
			name : 'pemohon_nik',
			fieldLabel : 'pemohon_nik',
			maxLength : 20
		
		});
		pemohon_straSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_straSearchField',
			name : 'pemohon_stra',
			fieldLabel : 'pemohon_stra',
			maxLength : 50
		
		});
		pemohon_surattugasSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_surattugasSearchField',
			name : 'pemohon_surattugas',
			fieldLabel : 'pemohon_surattugas',
			maxLength : 50
		
		});
		pemohon_pekerjaanSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_pekerjaanSearchField',
			name : 'pemohon_pekerjaan',
			fieldLabel : 'pemohon_pekerjaan',
			maxLength : 50
		
		});
		pemohon_tempatlahirSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_tempatlahirSearchField',
			name : 'pemohon_tempatlahir',
			fieldLabel : 'pemohon_tempatlahir',
			maxLength : 50
		
		});
		pemohon_tanggallahirSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_tanggallahirSearchField',
			name : 'pemohon_tanggallahir',
			fieldLabel : 'pemohon_tanggallahir',
			maxLength : 0
		
		});
		pemohon_user_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_user_idSearchField',
			name : 'pemohon_user_id',
			fieldLabel : 'pemohon_user_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		pemohon_pendidikanSearchField = Ext.create('Ext.form.TextField',{
			id : 'pemohon_pendidikanSearchField',
			name : 'pemohon_pendidikan',
			fieldLabel : 'pemohon_pendidikan',
			maxLength : 50
		
		});
		pemohon_tahunlulusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'pemohon_tahunlulusSearchField',
			name : 'pemohon_tahunlulus',
			fieldLabel : 'pemohon_tahunlulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var pemohon_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : pemohon_search
		});
		var pemohon_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				pemohon_searchWindow.hide();
			}
		});
		pemohon_searchPanel = Ext.create('Ext.form.Panel', {
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
						pemohon_namaSearchField,
						pemohon_alamatSearchField,
						pemohon_telpSearchField,
						pemohon_npwpSearchField,
						pemohon_rtSearchField,
						pemohon_rwSearchField,
						pemohon_kelSearchField,
						pemohon_kecSearchField,
						pemohon_nikSearchField,
						pemohon_straSearchField,
						pemohon_surattugasSearchField,
						pemohon_pekerjaanSearchField,
						pemohon_tempatlahirSearchField,
						pemohon_tanggallahirSearchField,
						pemohon_user_idSearchField,
						pemohon_pendidikanSearchField,
						pemohon_tahunlulusSearchField,
						]
				}],
			buttons : [pemohon_searchingButton,pemohon_cancelSearchButton]
		});
		pemohon_searchWindow = Ext.create('Ext.window.Window',{
			id : 'pemohon_searchWindow',
			renderTo : 'pemohonSearchWindow',
			title : globalFormSearchTitle + ' ' + pemohon_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [pemohon_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="pemohonSaveWindow"></div>
<div id="pemohonSearchWindow"></div>
<div class="span12" id="pemohonGrid"></div>