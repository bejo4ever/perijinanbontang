<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ipmbl_componentItemTitle="IPMBL";
		var ipmbl_dataStore;
		
		var ipmbl_shorcut;
		var ipmbl_contextMenu;
		var ipmbl_gridSearchField;
		var ipmbl_gridPanel;
		var ipmbl_formPanel;
		var ipmbl_formWindow;
		var ipmbl_searchPanel;
		var ipmbl_searchWindow;
		
		var ipmbl_idField;
		var ipmbl_jenisField;
		var ipmbl_tanggalField;
		var ipmbl_luasField;
		var ipmbl_volumeField;
		var ipmbl_keperluanField;
		var ipmbl_alamatField;
		var ipmbl_kelurahanField;
		var ipmbl_kecamatanField;
		var ipmbl_nomoragendaField;
		var ipmbl_statusField;
		var ipmbl_tanggalsurveyField;
		var ipmbl_rekomblhField;
		var ipmbl_rekomblh_tanggalField;
		var ipmbl_rekomkecField;
		var ipmbl_rekomkec_tanggalField;
		var ipmbl_rekomkelField;
		var ipmbl_rekomkel_tanggalField;
		var ipmbl_berlakuField;
		var ipmbl_kadaluarsaField;
		var ipmbl_nomorijinField;
		var ipmbl_nomorurutField;
				
		var ipmbl_jenisSearchField;
		var ipmbl_tanggalSearchField;
		var ipmbl_luasSearchField;
		var ipmbl_volumeSearchField;
		var ipmbl_keperluanSearchField;
		var ipmbl_alamatSearchField;
		var ipmbl_kelurahanSearchField;
		var ipmbl_kecamatanSearchField;
		var ipmbl_nomoragendaSearchField;
		var ipmbl_statusSearchField;
		var ipmbl_tanggalsurveySearchField;
		var ipmbl_rekomblhSearchField;
		var ipmbl_rekomblh_tanggalSearchField;
		var ipmbl_rekomkecSearchField;
		var ipmbl_rekomkec_tanggalSearchField;
		var ipmbl_rekomkelSearchField;
		var ipmbl_rekomkel_tanggalSearchField;
		var ipmbl_berlakuSearchField;
		var ipmbl_kadaluarsaSearchField;
		var ipmbl_nomorijinSearchField;
		var ipmbl_nomorurutSearchField;
				
		var ipmbl_dbTask = 'CREATE';
		var ipmbl_dbTaskMessage = 'Tambah';
		var ipmbl_dbPermission = 'CRUD';
		var ipmbl_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ipmbl_switchToGrid(){
			ipmbl_formPanel.setDisabled(true);
			ipmbl_gridPanel.setDisabled(false);
			ipmbl_formWindow.hide();
		}
		
		function ipmbl_switchToForm(){
			ipmbl_gridPanel.setDisabled(true);
			ipmbl_formPanel.setDisabled(false);
			ipmbl_formWindow.show();
		}
		
		function ipmbl_confirmAdd(){
			ipmbl_dbTask = 'CREATE';
			ipmbl_dbTaskMessage = 'created';
			ipmbl_resetForm();
			ipmbl_switchToForm();
		}
		
		function ipmbl_confirmUpdate(){
			if(ipmbl_gridPanel.selModel.getCount() == 1) {
				ipmbl_dbTask = 'UPDATE';
				ipmbl_dbTaskMessage = 'updated';
				ipmbl_switchToForm();
				ipmbl_setForm();
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
		
		function ipmbl_confirmDelete(){
			if(ipmbl_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ipmbl_delete);
			}else if(ipmbl_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ipmbl_delete);
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
		
		function ipmbl_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ipmbl_dbPermission)==false && pattC.test(ipmbl_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ipmbl_confirmFormValid()){
					var ipmbl_idValue = '';
					var ipmbl_jenisValue = '';
					var ipmbl_tanggalValue = '';
					var ipmbl_luasValue = '';
					var ipmbl_volumeValue = '';
					var ipmbl_keperluanValue = '';
					var ipmbl_alamatValue = '';
					var ipmbl_kelurahanValue = '';
					var ipmbl_kecamatanValue = '';
					var ipmbl_nomoragendaValue = '';
					var ipmbl_statusValue = '';
					var ipmbl_tanggalsurveyValue = '';
					var ipmbl_rekomblhValue = '';
					var ipmbl_rekomblh_tanggalValue = '';
					var ipmbl_rekomkecValue = '';
					var ipmbl_rekomkec_tanggalValue = '';
					var ipmbl_rekomkelValue = '';
					var ipmbl_rekomkel_tanggalValue = '';
					var ipmbl_berlakuValue = '';
					var ipmbl_kadaluarsaValue = '';
					var ipmbl_nomorijinValue = '';
					var ipmbl_nomorurutValue = '';
										
					ipmbl_idValue = ipmbl_idField.getValue();
					ipmbl_jenisValue = ipmbl_jenisField.getValue();
					ipmbl_tanggalValue = ipmbl_tanggalField.getValue();
					ipmbl_luasValue = ipmbl_luasField.getValue();
					ipmbl_volumeValue = ipmbl_volumeField.getValue();
					ipmbl_keperluanValue = ipmbl_keperluanField.getValue();
					ipmbl_alamatValue = ipmbl_alamatField.getValue();
					ipmbl_kelurahanValue = ipmbl_kelurahanField.getValue();
					ipmbl_kecamatanValue = ipmbl_kecamatanField.getValue();
					ipmbl_nomoragendaValue = ipmbl_nomoragendaField.getValue();
					ipmbl_statusValue = ipmbl_statusField.getValue();
					ipmbl_tanggalsurveyValue = ipmbl_tanggalsurveyField.getValue();
					ipmbl_rekomblhValue = ipmbl_rekomblhField.getValue();
					ipmbl_rekomblh_tanggalValue = ipmbl_rekomblh_tanggalField.getValue();
					ipmbl_rekomkecValue = ipmbl_rekomkecField.getValue();
					ipmbl_rekomkec_tanggalValue = ipmbl_rekomkec_tanggalField.getValue();
					ipmbl_rekomkelValue = ipmbl_rekomkelField.getValue();
					ipmbl_rekomkel_tanggalValue = ipmbl_rekomkel_tanggalField.getValue();
					ipmbl_berlakuValue = ipmbl_berlakuField.getValue();
					ipmbl_kadaluarsaValue = ipmbl_kadaluarsaField.getValue();
					ipmbl_nomorijinValue = ipmbl_nomorijinField.getValue();
					ipmbl_nomorurutValue = ipmbl_nomorurutField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_ipmbl/switchAction',
						params: {							
							ipmbl_id : ipmbl_idValue,
							ipmbl_jenis : ipmbl_jenisValue,
							ipmbl_tanggal : ipmbl_tanggalValue,
							ipmbl_luas : ipmbl_luasValue,
							ipmbl_volume : ipmbl_volumeValue,
							ipmbl_keperluan : ipmbl_keperluanValue,
							ipmbl_alamat : ipmbl_alamatValue,
							ipmbl_kelurahan : ipmbl_kelurahanValue,
							ipmbl_kecamatan : ipmbl_kecamatanValue,
							ipmbl_nomoragenda : ipmbl_nomoragendaValue,
							ipmbl_status : ipmbl_statusValue,
							ipmbl_tanggalsurvey : ipmbl_tanggalsurveyValue,
							ipmbl_rekomblh : ipmbl_rekomblhValue,
							ipmbl_rekomblh_tanggal : ipmbl_rekomblh_tanggalValue,
							ipmbl_rekomkec : ipmbl_rekomkecValue,
							ipmbl_rekomkec_tanggal : ipmbl_rekomkec_tanggalValue,
							ipmbl_rekomkel : ipmbl_rekomkelValue,
							ipmbl_rekomkel_tanggal : ipmbl_rekomkel_tanggalValue,
							ipmbl_berlaku : ipmbl_berlakuValue,
							ipmbl_kadaluarsa : ipmbl_kadaluarsaValue,
							ipmbl_nomorijin : ipmbl_nomorijinValue,
							ipmbl_nomorurut : ipmbl_nomorurutValue,
							action : ipmbl_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ipmbl_dataStore.reload();
									ipmbl_resetForm();
									ipmbl_switchToGrid();
									ipmbl_gridPanel.getSelectionModel().deselectAll();
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
		
		function ipmbl_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ipmbl_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ipmbl_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ipmbl_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ipmbl_id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_t_ipmbl/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ipmbl_dataStore.reload();
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
		
		function ipmbl_refresh(){
			ipmbl_dbListAction = "GETLIST";
			ipmbl_gridSearchField.reset();
			ipmbl_searchPanel.getForm().reset();
			ipmbl_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ipmbl_dataStore.proxy.extraParams.query = "";
			ipmbl_dataStore.currentPage = 1;
			ipmbl_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ipmbl_confirmFormValid(){
			return ipmbl_formPanel.getForm().isValid();
		}
		
		function ipmbl_resetForm(){
			ipmbl_dbTask = 'CREATE';
			ipmbl_dbTaskMessage = 'create';
			ipmbl_formPanel.getForm().reset();
			ipmbl_idField.setValue(0);
		}
		
		function ipmbl_setForm(){
			ipmbl_dbTask = 'UPDATE';
            ipmbl_dbTaskMessage = 'update';
			
			var record = ipmbl_gridPanel.getSelectionModel().getSelection()[0];
			ipmbl_idField.setValue(record.data.ipmbl_id);
			ipmbl_jenisField.setValue(record.data.ipmbl_jenis);
			ipmbl_tanggalField.setValue(record.data.ipmbl_tanggal);
			ipmbl_luasField.setValue(record.data.ipmbl_luas);
			ipmbl_volumeField.setValue(record.data.ipmbl_volume);
			ipmbl_keperluanField.setValue(record.data.ipmbl_keperluan);
			ipmbl_alamatField.setValue(record.data.ipmbl_alamat);
			ipmbl_kelurahanField.setValue(record.data.ipmbl_kelurahan);
			ipmbl_kecamatanField.setValue(record.data.ipmbl_kecamatan);
			ipmbl_nomoragendaField.setValue(record.data.ipmbl_nomoragenda);
			ipmbl_statusField.setValue(record.data.ipmbl_status);
			ipmbl_tanggalsurveyField.setValue(record.data.ipmbl_tanggalsurvey);
			ipmbl_rekomblhField.setValue(record.data.ipmbl_rekomblh);
			ipmbl_rekomblh_tanggalField.setValue(record.data.ipmbl_rekomblh_tanggal);
			ipmbl_rekomkecField.setValue(record.data.ipmbl_rekomkec);
			ipmbl_rekomkec_tanggalField.setValue(record.data.ipmbl_rekomkec_tanggal);
			ipmbl_rekomkelField.setValue(record.data.ipmbl_rekomkel);
			ipmbl_rekomkel_tanggalField.setValue(record.data.ipmbl_rekomkel_tanggal);
			ipmbl_berlakuField.setValue(record.data.ipmbl_berlaku);
			ipmbl_kadaluarsaField.setValue(record.data.ipmbl_kadaluarsa);
			ipmbl_nomorijinField.setValue(record.data.ipmbl_nomorijin);
			ipmbl_nomorurutField.setValue(record.data.ipmbl_nomorurut);
					}
		
		function ipmbl_showSearchWindow(){
			ipmbl_searchWindow.show();
		}
		
		function ipmbl_search(){
			ipmbl_gridSearchField.reset();
			
			var ipmbl_jenisValue = '';
			var ipmbl_tanggalValue = '';
			var ipmbl_luasValue = '';
			var ipmbl_volumeValue = '';
			var ipmbl_keperluanValue = '';
			var ipmbl_alamatValue = '';
			var ipmbl_kelurahanValue = '';
			var ipmbl_kecamatanValue = '';
			var ipmbl_nomoragendaValue = '';
			var ipmbl_statusValue = '';
			var ipmbl_tanggalsurveyValue = '';
			var ipmbl_rekomblhValue = '';
			var ipmbl_rekomblh_tanggalValue = '';
			var ipmbl_rekomkecValue = '';
			var ipmbl_rekomkec_tanggalValue = '';
			var ipmbl_rekomkelValue = '';
			var ipmbl_rekomkel_tanggalValue = '';
			var ipmbl_berlakuValue = '';
			var ipmbl_kadaluarsaValue = '';
			var ipmbl_nomorijinValue = '';
			var ipmbl_nomorurutValue = '';
						
			ipmbl_jenisValue = ipmbl_jenisSearchField.getValue();
			ipmbl_tanggalValue = ipmbl_tanggalSearchField.getValue();
			ipmbl_luasValue = ipmbl_luasSearchField.getValue();
			ipmbl_volumeValue = ipmbl_volumeSearchField.getValue();
			ipmbl_keperluanValue = ipmbl_keperluanSearchField.getValue();
			ipmbl_alamatValue = ipmbl_alamatSearchField.getValue();
			ipmbl_kelurahanValue = ipmbl_kelurahanSearchField.getValue();
			ipmbl_kecamatanValue = ipmbl_kecamatanSearchField.getValue();
			ipmbl_nomoragendaValue = ipmbl_nomoragendaSearchField.getValue();
			ipmbl_statusValue = ipmbl_statusSearchField.getValue();
			ipmbl_tanggalsurveyValue = ipmbl_tanggalsurveySearchField.getValue();
			ipmbl_rekomblhValue = ipmbl_rekomblhSearchField.getValue();
			ipmbl_rekomblh_tanggalValue = ipmbl_rekomblh_tanggalSearchField.getValue();
			ipmbl_rekomkecValue = ipmbl_rekomkecSearchField.getValue();
			ipmbl_rekomkec_tanggalValue = ipmbl_rekomkec_tanggalSearchField.getValue();
			ipmbl_rekomkelValue = ipmbl_rekomkelSearchField.getValue();
			ipmbl_rekomkel_tanggalValue = ipmbl_rekomkel_tanggalSearchField.getValue();
			ipmbl_berlakuValue = ipmbl_berlakuSearchField.getValue();
			ipmbl_kadaluarsaValue = ipmbl_kadaluarsaSearchField.getValue();
			ipmbl_nomorijinValue = ipmbl_nomorijinSearchField.getValue();
			ipmbl_nomorurutValue = ipmbl_nomorurutSearchField.getValue();
			ipmbl_dbListAction = "SEARCH";
			ipmbl_dataStore.proxy.extraParams = { 
				ipmbl_jenis : ipmbl_jenisValue,
				ipmbl_tanggal : ipmbl_tanggalValue,
				ipmbl_luas : ipmbl_luasValue,
				ipmbl_volume : ipmbl_volumeValue,
				ipmbl_keperluan : ipmbl_keperluanValue,
				ipmbl_alamat : ipmbl_alamatValue,
				ipmbl_kelurahan : ipmbl_kelurahanValue,
				ipmbl_kecamatan : ipmbl_kecamatanValue,
				ipmbl_nomoragenda : ipmbl_nomoragendaValue,
				ipmbl_status : ipmbl_statusValue,
				ipmbl_tanggalsurvey : ipmbl_tanggalsurveyValue,
				ipmbl_rekomblh : ipmbl_rekomblhValue,
				ipmbl_rekomblh_tanggal : ipmbl_rekomblh_tanggalValue,
				ipmbl_rekomkec : ipmbl_rekomkecValue,
				ipmbl_rekomkec_tanggal : ipmbl_rekomkec_tanggalValue,
				ipmbl_rekomkel : ipmbl_rekomkelValue,
				ipmbl_rekomkel_tanggal : ipmbl_rekomkel_tanggalValue,
				ipmbl_berlaku : ipmbl_berlakuValue,
				ipmbl_kadaluarsa : ipmbl_kadaluarsaValue,
				ipmbl_nomorijin : ipmbl_nomorijinValue,
				ipmbl_nomorurut : ipmbl_nomorurutValue,
				action : 'SEARCH'
			};
			ipmbl_dataStore.currentPage = 1;
			ipmbl_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ipmbl_printExcel(outputType){
			var searchText = "";
			var ipmbl_jenisValue = '';
			var ipmbl_tanggalValue = '';
			var ipmbl_luasValue = '';
			var ipmbl_volumeValue = '';
			var ipmbl_keperluanValue = '';
			var ipmbl_alamatValue = '';
			var ipmbl_kelurahanValue = '';
			var ipmbl_kecamatanValue = '';
			var ipmbl_nomoragendaValue = '';
			var ipmbl_statusValue = '';
			var ipmbl_tanggalsurveyValue = '';
			var ipmbl_rekomblhValue = '';
			var ipmbl_rekomblh_tanggalValue = '';
			var ipmbl_rekomkecValue = '';
			var ipmbl_rekomkec_tanggalValue = '';
			var ipmbl_rekomkelValue = '';
			var ipmbl_rekomkel_tanggalValue = '';
			var ipmbl_berlakuValue = '';
			var ipmbl_kadaluarsaValue = '';
			var ipmbl_nomorijinValue = '';
			var ipmbl_nomorurutValue = '';
			
			if(ipmbl_dataStore.proxy.extraParams.query!==null){searchText = ipmbl_dataStore.proxy.extraParams.query;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_jenis!==null){ipmbl_jenisValue = ipmbl_dataStore.proxy.extraParams.ipmbl_jenis;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_tanggal!==null){ipmbl_tanggalValue = ipmbl_dataStore.proxy.extraParams.ipmbl_tanggal;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_luas!==null){ipmbl_luasValue = ipmbl_dataStore.proxy.extraParams.ipmbl_luas;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_volume!==null){ipmbl_volumeValue = ipmbl_dataStore.proxy.extraParams.ipmbl_volume;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_keperluan!==null){ipmbl_keperluanValue = ipmbl_dataStore.proxy.extraParams.ipmbl_keperluan;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_alamat!==null){ipmbl_alamatValue = ipmbl_dataStore.proxy.extraParams.ipmbl_alamat;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_kelurahan!==null){ipmbl_kelurahanValue = ipmbl_dataStore.proxy.extraParams.ipmbl_kelurahan;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_kecamatan!==null){ipmbl_kecamatanValue = ipmbl_dataStore.proxy.extraParams.ipmbl_kecamatan;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_nomoragenda!==null){ipmbl_nomoragendaValue = ipmbl_dataStore.proxy.extraParams.ipmbl_nomoragenda;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_status!==null){ipmbl_statusValue = ipmbl_dataStore.proxy.extraParams.ipmbl_status;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_tanggalsurvey!==null){ipmbl_tanggalsurveyValue = ipmbl_dataStore.proxy.extraParams.ipmbl_tanggalsurvey;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_rekomblh!==null){ipmbl_rekomblhValue = ipmbl_dataStore.proxy.extraParams.ipmbl_rekomblh;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_rekomblh_tanggal!==null){ipmbl_rekomblh_tanggalValue = ipmbl_dataStore.proxy.extraParams.ipmbl_rekomblh_tanggal;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_rekomkec!==null){ipmbl_rekomkecValue = ipmbl_dataStore.proxy.extraParams.ipmbl_rekomkec;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_rekomkec_tanggal!==null){ipmbl_rekomkec_tanggalValue = ipmbl_dataStore.proxy.extraParams.ipmbl_rekomkec_tanggal;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_rekomkel!==null){ipmbl_rekomkelValue = ipmbl_dataStore.proxy.extraParams.ipmbl_rekomkel;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_rekomkel_tanggal!==null){ipmbl_rekomkel_tanggalValue = ipmbl_dataStore.proxy.extraParams.ipmbl_rekomkel_tanggal;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_berlaku!==null){ipmbl_berlakuValue = ipmbl_dataStore.proxy.extraParams.ipmbl_berlaku;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_kadaluarsa!==null){ipmbl_kadaluarsaValue = ipmbl_dataStore.proxy.extraParams.ipmbl_kadaluarsa;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_nomorijin!==null){ipmbl_nomorijinValue = ipmbl_dataStore.proxy.extraParams.ipmbl_nomorijin;}
			if(ipmbl_dataStore.proxy.extraParams.ipmbl_nomorurut!==null){ipmbl_nomorurutValue = ipmbl_dataStore.proxy.extraParams.ipmbl_nomorurut;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_ipmbl/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ipmbl_jenis : ipmbl_jenisValue,
					ipmbl_tanggal : ipmbl_tanggalValue,
					ipmbl_luas : ipmbl_luasValue,
					ipmbl_volume : ipmbl_volumeValue,
					ipmbl_keperluan : ipmbl_keperluanValue,
					ipmbl_alamat : ipmbl_alamatValue,
					ipmbl_kelurahan : ipmbl_kelurahanValue,
					ipmbl_kecamatan : ipmbl_kecamatanValue,
					ipmbl_nomoragenda : ipmbl_nomoragendaValue,
					ipmbl_status : ipmbl_statusValue,
					ipmbl_tanggalsurvey : ipmbl_tanggalsurveyValue,
					ipmbl_rekomblh : ipmbl_rekomblhValue,
					ipmbl_rekomblh_tanggal : ipmbl_rekomblh_tanggalValue,
					ipmbl_rekomkec : ipmbl_rekomkecValue,
					ipmbl_rekomkec_tanggal : ipmbl_rekomkec_tanggalValue,
					ipmbl_rekomkel : ipmbl_rekomkelValue,
					ipmbl_rekomkel_tanggal : ipmbl_rekomkel_tanggalValue,
					ipmbl_berlaku : ipmbl_berlakuValue,
					ipmbl_kadaluarsa : ipmbl_kadaluarsaValue,
					ipmbl_nomorijin : ipmbl_nomorijinValue,
					ipmbl_nomorurut : ipmbl_nomorurutValue,
					currentAction : ipmbl_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_ipmbl_list.xls');
							}else{
								window.open('./print/t_ipmbl_list.html','ipmbllist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ipmbl_dataStore = Ext.create('Ext.data.Store',{
			id : 'ipmbl_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_ipmbl/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ipmbl_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ipmbl_id', type : 'int', mapping : 'ipmbl_id' },
				{ name : 'ipmbl_jenis', type : 'int', mapping : 'ipmbl_jenis' },
				{ name : 'ipmbl_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_tanggal' },
				{ name : 'ipmbl_luas', type : 'float', mapping : 'ipmbl_luas' },
				{ name : 'ipmbl_volume', type : 'float', mapping : 'ipmbl_volume' },
				{ name : 'ipmbl_keperluan', type : 'string', mapping : 'ipmbl_keperluan' },
				{ name : 'ipmbl_alamat', type : 'string', mapping : 'ipmbl_alamat' },
				{ name : 'ipmbl_kelurahan', type : 'int', mapping : 'ipmbl_kelurahan' },
				{ name : 'ipmbl_kecamatan', type : 'int', mapping : 'ipmbl_kecamatan' },
				{ name : 'ipmbl_nomoragenda', type : 'int', mapping : 'ipmbl_nomoragenda' },
				{ name : 'ipmbl_status', type : 'int', mapping : 'ipmbl_status' },
				{ name : 'ipmbl_tanggalsurvey', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_tanggalsurvey' },
				{ name : 'ipmbl_rekomblh', type : 'string', mapping : 'ipmbl_rekomblh' },
				{ name : 'ipmbl_rekomblh_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_rekomblh_tanggal' },
				{ name : 'ipmbl_rekomkec', type : 'string', mapping : 'ipmbl_rekomkec' },
				{ name : 'ipmbl_rekomkec_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_rekomkec_tanggal' },
				{ name : 'ipmbl_rekomkel', type : 'string', mapping : 'ipmbl_rekomkel' },
				{ name : 'ipmbl_rekomkel_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_rekomkel_tanggal' },
				{ name : 'ipmbl_berlaku', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_berlaku' },
				{ name : 'ipmbl_kadaluarsa', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'ipmbl_kadaluarsa' },
				{ name : 'ipmbl_nomorijin', type : 'string', mapping : 'ipmbl_nomorijin' },
				{ name : 'ipmbl_nomorurut', type : 'int', mapping : 'ipmbl_nomorurut' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ipmbl_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ipmbl_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ipmbl_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ipmbl_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ipmbl_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ipmbl_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ipmbl_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ipmbl_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ipmbl_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ipmbl_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ipmbl_confirmAdd
		});
		var ipmbl_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ipmbl_confirmUpdate
		});
		var ipmbl_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ipmbl_confirmDelete
		});
		var ipmbl_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ipmbl_refresh
		});
		var ipmbl_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ipmbl_showSearchWindow
		});
		var ipmbl_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ipmbl_printExcel('PRINT');
			}
		});
		var ipmbl_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ipmbl_printExcel('EXCEL');
			}
		});
		
		var ipmbl_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ipmbl_confirmUpdate
		});
		var ipmbl_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ipmbl_confirmDelete
		});
		var ipmbl_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ipmbl_refresh
		});
		ipmbl_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ipmbl_contextMenu',
			items: [
				ipmbl_contextMenuEdit,ipmbl_contextMenuDelete,'-',ipmbl_contextMenuRefresh
			]
		});
		
		ipmbl_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ipmbl_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ipmbl_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ipmbl_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ipmbl_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ipmbl_gridPanel',
			constrain : true,
			store : ipmbl_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ipmblGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ipmbl_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ipmbl_shorcut,
			columns : [
				{
					text : 'ipmbl_jenis',
					dataIndex : 'ipmbl_jenis',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_tanggal',
					dataIndex : 'ipmbl_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_luas',
					dataIndex : 'ipmbl_luas',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_volume',
					dataIndex : 'ipmbl_volume',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_keperluan',
					dataIndex : 'ipmbl_keperluan',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_alamat',
					dataIndex : 'ipmbl_alamat',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_kelurahan',
					dataIndex : 'ipmbl_kelurahan',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_kecamatan',
					dataIndex : 'ipmbl_kecamatan',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_nomoragenda',
					dataIndex : 'ipmbl_nomoragenda',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_status',
					dataIndex : 'ipmbl_status',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_tanggalsurvey',
					dataIndex : 'ipmbl_tanggalsurvey',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_rekomblh',
					dataIndex : 'ipmbl_rekomblh',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_rekomblh_tanggal',
					dataIndex : 'ipmbl_rekomblh_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_rekomkec',
					dataIndex : 'ipmbl_rekomkec',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_rekomkec_tanggal',
					dataIndex : 'ipmbl_rekomkec_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_rekomkel',
					dataIndex : 'ipmbl_rekomkel',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_rekomkel_tanggal',
					dataIndex : 'ipmbl_rekomkel_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_berlaku',
					dataIndex : 'ipmbl_berlaku',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_kadaluarsa',
					dataIndex : 'ipmbl_kadaluarsa',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_nomorijin',
					dataIndex : 'ipmbl_nomorijin',
					width : 100,
					sortable : false
				},
				{
					text : 'ipmbl_nomorurut',
					dataIndex : 'ipmbl_nomorurut',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ipmbl_addButton,
				ipmbl_editButton,
				ipmbl_deleteButton,
				ipmbl_gridSearchField,
				ipmbl_searchButton,
				ipmbl_refreshButton,
				ipmbl_printButton,
				ipmbl_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ipmbl_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ipmbl_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ipmbl_idField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_idField',
			name : 'ipmbl_id',
			fieldLabel : 'ipmbl_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ipmbl_jenisField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_jenisField',
			name : 'ipmbl_jenis',
			fieldLabel : 'ipmbl_jenis<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_tanggalField',
			name : 'ipmbl_tanggal',
			fieldLabel : 'ipmbl_tanggal<font color=red>*</font>',
			allowBlank : false,
			maxLength : 0
		});
		ipmbl_luasField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_luasField',
			name : 'ipmbl_luas',
			fieldLabel : 'ipmbl_luas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_volumeField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_volumeField',
			name : 'ipmbl_volume',
			fieldLabel : 'ipmbl_volume',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_keperluanField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_keperluanField',
			name : 'ipmbl_keperluan',
			fieldLabel : 'ipmbl_keperluan',
			maxLength : 255
		});
		ipmbl_alamatField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_alamatField',
			name : 'ipmbl_alamat',
			fieldLabel : 'ipmbl_alamat',
			maxLength : 100
		});
		ipmbl_kelurahanField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_kelurahanField',
			name : 'ipmbl_kelurahan',
			fieldLabel : 'ipmbl_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_kecamatanField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_kecamatanField',
			name : 'ipmbl_kecamatan',
			fieldLabel : 'ipmbl_kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_nomoragendaField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_nomoragendaField',
			name : 'ipmbl_nomoragenda',
			fieldLabel : 'ipmbl_nomoragenda',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_statusField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_statusField',
			name : 'ipmbl_status',
			fieldLabel : 'ipmbl_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ipmbl_tanggalsurveyField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_tanggalsurveyField',
			name : 'ipmbl_tanggalsurvey',
			fieldLabel : 'ipmbl_tanggalsurvey',
			maxLength : 0
		});
		ipmbl_rekomblhField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomblhField',
			name : 'ipmbl_rekomblh',
			fieldLabel : 'ipmbl_rekomblh',
			maxLength : 255
		});
		ipmbl_rekomblh_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomblh_tanggalField',
			name : 'ipmbl_rekomblh_tanggal',
			fieldLabel : 'ipmbl_rekomblh_tanggal',
			maxLength : 0
		});
		ipmbl_rekomkecField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomkecField',
			name : 'ipmbl_rekomkec',
			fieldLabel : 'ipmbl_rekomkec',
			maxLength : 255
		});
		ipmbl_rekomkec_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomkec_tanggalField',
			name : 'ipmbl_rekomkec_tanggal',
			fieldLabel : 'ipmbl_rekomkec_tanggal',
			maxLength : 0
		});
		ipmbl_rekomkelField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomkelField',
			name : 'ipmbl_rekomkel',
			fieldLabel : 'ipmbl_rekomkel',
			maxLength : 255
		});
		ipmbl_rekomkel_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomkel_tanggalField',
			name : 'ipmbl_rekomkel_tanggal',
			fieldLabel : 'ipmbl_rekomkel_tanggal',
			maxLength : 0
		});
		ipmbl_berlakuField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_berlakuField',
			name : 'ipmbl_berlaku',
			fieldLabel : 'ipmbl_berlaku',
			maxLength : 0
		});
		ipmbl_kadaluarsaField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_kadaluarsaField',
			name : 'ipmbl_kadaluarsa',
			fieldLabel : 'ipmbl_kadaluarsa',
			maxLength : 0
		});
		ipmbl_nomorijinField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_nomorijinField',
			name : 'ipmbl_nomorijin',
			fieldLabel : 'ipmbl_nomorijin',
			maxLength : 255
		});
		ipmbl_nomorurutField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_nomorurutField',
			name : 'ipmbl_nomorurut',
			fieldLabel : 'ipmbl_nomorurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var ipmbl_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ipmbl_save
		});
		var ipmbl_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ipmbl_resetForm();
				ipmbl_switchToGrid();
			}
		});
		ipmbl_formPanel = Ext.create('Ext.form.Panel', {
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
						ipmbl_idField,
						ipmbl_jenisField,
						ipmbl_tanggalField,
						ipmbl_luasField,
						ipmbl_volumeField,
						ipmbl_keperluanField,
						ipmbl_alamatField,
						ipmbl_kelurahanField,
						ipmbl_kecamatanField,
						ipmbl_nomoragendaField,
						ipmbl_statusField,
						ipmbl_tanggalsurveyField,
						ipmbl_rekomblhField,
						ipmbl_rekomblh_tanggalField,
						ipmbl_rekomkecField,
						ipmbl_rekomkec_tanggalField,
						ipmbl_rekomkelField,
						ipmbl_rekomkel_tanggalField,
						ipmbl_berlakuField,
						ipmbl_kadaluarsaField,
						ipmbl_nomorijinField,
						ipmbl_nomorurutField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ipmbl_saveButton,ipmbl_cancelButton]
		});
		ipmbl_formWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_formWindow',
			renderTo : 'ipmblSaveWindow',
			title : globalFormAddEditTitle + ' ' + ipmbl_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ipmbl_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ipmbl_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_jenisSearchField',
			name : 'ipmbl_jenis',
			fieldLabel : 'ipmbl_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_tanggalSearchField',
			name : 'ipmbl_tanggal',
			fieldLabel : 'ipmbl_tanggal',
			maxLength : 0
		
		});
		ipmbl_luasSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_luasSearchField',
			name : 'ipmbl_luas',
			fieldLabel : 'ipmbl_luas',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_volumeSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_volumeSearchField',
			name : 'ipmbl_volume',
			fieldLabel : 'ipmbl_volume',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_keperluanSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_keperluanSearchField',
			name : 'ipmbl_keperluan',
			fieldLabel : 'ipmbl_keperluan',
			maxLength : 255
		
		});
		ipmbl_alamatSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_alamatSearchField',
			name : 'ipmbl_alamat',
			fieldLabel : 'ipmbl_alamat',
			maxLength : 100
		
		});
		ipmbl_kelurahanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_kelurahanSearchField',
			name : 'ipmbl_kelurahan',
			fieldLabel : 'ipmbl_kelurahan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_kecamatanSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_kecamatanSearchField',
			name : 'ipmbl_kecamatan',
			fieldLabel : 'ipmbl_kecamatan',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_nomoragendaSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_nomoragendaSearchField',
			name : 'ipmbl_nomoragenda',
			fieldLabel : 'ipmbl_nomoragenda',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_statusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_statusSearchField',
			name : 'ipmbl_status',
			fieldLabel : 'ipmbl_status',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ipmbl_tanggalsurveySearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_tanggalsurveySearchField',
			name : 'ipmbl_tanggalsurvey',
			fieldLabel : 'ipmbl_tanggalsurvey',
			maxLength : 0
		
		});
		ipmbl_rekomblhSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomblhSearchField',
			name : 'ipmbl_rekomblh',
			fieldLabel : 'ipmbl_rekomblh',
			maxLength : 255
		
		});
		ipmbl_rekomblh_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomblh_tanggalSearchField',
			name : 'ipmbl_rekomblh_tanggal',
			fieldLabel : 'ipmbl_rekomblh_tanggal',
			maxLength : 0
		
		});
		ipmbl_rekomkecSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomkecSearchField',
			name : 'ipmbl_rekomkec',
			fieldLabel : 'ipmbl_rekomkec',
			maxLength : 255
		
		});
		ipmbl_rekomkec_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomkec_tanggalSearchField',
			name : 'ipmbl_rekomkec_tanggal',
			fieldLabel : 'ipmbl_rekomkec_tanggal',
			maxLength : 0
		
		});
		ipmbl_rekomkelSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomkelSearchField',
			name : 'ipmbl_rekomkel',
			fieldLabel : 'ipmbl_rekomkel',
			maxLength : 255
		
		});
		ipmbl_rekomkel_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_rekomkel_tanggalSearchField',
			name : 'ipmbl_rekomkel_tanggal',
			fieldLabel : 'ipmbl_rekomkel_tanggal',
			maxLength : 0
		
		});
		ipmbl_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_berlakuSearchField',
			name : 'ipmbl_berlaku',
			fieldLabel : 'ipmbl_berlaku',
			maxLength : 0
		
		});
		ipmbl_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_kadaluarsaSearchField',
			name : 'ipmbl_kadaluarsa',
			fieldLabel : 'ipmbl_kadaluarsa',
			maxLength : 0
		
		});
		ipmbl_nomorijinSearchField = Ext.create('Ext.form.TextField',{
			id : 'ipmbl_nomorijinSearchField',
			name : 'ipmbl_nomorijin',
			fieldLabel : 'ipmbl_nomorijin',
			maxLength : 255
		
		});
		ipmbl_nomorurutSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ipmbl_nomorurutSearchField',
			name : 'ipmbl_nomorurut',
			fieldLabel : 'ipmbl_nomorurut',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var ipmbl_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ipmbl_search
		});
		var ipmbl_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ipmbl_searchWindow.hide();
			}
		});
		ipmbl_searchPanel = Ext.create('Ext.form.Panel', {
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
						ipmbl_jenisSearchField,
						ipmbl_tanggalSearchField,
						ipmbl_luasSearchField,
						ipmbl_volumeSearchField,
						ipmbl_keperluanSearchField,
						ipmbl_alamatSearchField,
						ipmbl_kelurahanSearchField,
						ipmbl_kecamatanSearchField,
						ipmbl_nomoragendaSearchField,
						ipmbl_statusSearchField,
						ipmbl_tanggalsurveySearchField,
						ipmbl_rekomblhSearchField,
						ipmbl_rekomblh_tanggalSearchField,
						ipmbl_rekomkecSearchField,
						ipmbl_rekomkec_tanggalSearchField,
						ipmbl_rekomkelSearchField,
						ipmbl_rekomkel_tanggalSearchField,
						ipmbl_berlakuSearchField,
						ipmbl_kadaluarsaSearchField,
						ipmbl_nomorijinSearchField,
						ipmbl_nomorurutSearchField,
						]
				}],
			buttons : [ipmbl_searchingButton,ipmbl_cancelSearchButton]
		});
		ipmbl_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ipmbl_searchWindow',
			renderTo : 'ipmblSearchWindow',
			title : globalFormSearchTitle + ' ' + ipmbl_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ipmbl_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ipmblSaveWindow"></div>
<div id="ipmblSearchWindow"></div>
<div class="span12" id="ipmblGrid"></div>