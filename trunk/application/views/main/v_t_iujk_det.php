<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var iujk_det_componentItemTitle="IUJK_DET";
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
				
		var det_iujk_iujk_idSearchField;
		var det_iujk_jenisSearchField;
		var det_iujk_tanggalSearchField;
		var det_iujk_namaSearchField;
		var det_iujk_nomorregSearchField;
		var det_iujk_rekomnomorSearchField;
		var det_iujk_rekomtanggalSearchField;
		var det_iujk_berlakuSearchField;
		var det_iujk_kadaluarsaSearchField;
		var det_iujk_pj1SearchField;
		var det_iujk_pj2SearchField;
		var det_iujk_pj3SearchField;
		var det_iujk_pjteknisSearchField;
		var det_iujk_pjtbuSearchField;
		var det_iujk_surveylulusSearchField;
				
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
					var det_iujk_idValue = '';
					var det_iujk_iujk_idValue = '';
					var det_iujk_jenisValue = '';
					var det_iujk_tanggalValue = '';
					var det_iujk_namaValue = '';
					var det_iujk_nomorregValue = '';
					var det_iujk_rekomnomorValue = '';
					var det_iujk_rekomtanggalValue = '';
					var det_iujk_berlakuValue = '';
					var det_iujk_kadaluarsaValue = '';
					var det_iujk_pj1Value = '';
					var det_iujk_pj2Value = '';
					var det_iujk_pj3Value = '';
					var det_iujk_pjteknisValue = '';
					var det_iujk_pjtbuValue = '';
					var det_iujk_surveylulusValue = '';
										
					det_iujk_idValue = det_iujk_idField.getValue();
					det_iujk_iujk_idValue = det_iujk_iujk_idField.getValue();
					det_iujk_jenisValue = det_iujk_jenisField.getValue();
					det_iujk_tanggalValue = det_iujk_tanggalField.getValue();
					det_iujk_namaValue = det_iujk_namaField.getValue();
					det_iujk_nomorregValue = det_iujk_nomorregField.getValue();
					det_iujk_rekomnomorValue = det_iujk_rekomnomorField.getValue();
					det_iujk_rekomtanggalValue = det_iujk_rekomtanggalField.getValue();
					det_iujk_berlakuValue = det_iujk_berlakuField.getValue();
					det_iujk_kadaluarsaValue = det_iujk_kadaluarsaField.getValue();
					det_iujk_pj1Value = det_iujk_pj1Field.getValue();
					det_iujk_pj2Value = det_iujk_pj2Field.getValue();
					det_iujk_pj3Value = det_iujk_pj3Field.getValue();
					det_iujk_pjteknisValue = det_iujk_pjteknisField.getValue();
					det_iujk_pjtbuValue = det_iujk_pjtbuField.getValue();
					det_iujk_surveylulusValue = det_iujk_surveylulusField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_t_iujk_det/switchAction',
						params: {							
							det_iujk_id : det_iujk_idValue,
							det_iujk_iujk_id : det_iujk_iujk_idValue,
							det_iujk_jenis : det_iujk_jenisValue,
							det_iujk_tanggal : det_iujk_tanggalValue,
							det_iujk_nama : det_iujk_namaValue,
							det_iujk_nomorreg : det_iujk_nomorregValue,
							det_iujk_rekomnomor : det_iujk_rekomnomorValue,
							det_iujk_rekomtanggal : det_iujk_rekomtanggalValue,
							det_iujk_berlaku : det_iujk_berlakuValue,
							det_iujk_kadaluarsa : det_iujk_kadaluarsaValue,
							det_iujk_pj1 : det_iujk_pj1Value,
							det_iujk_pj2 : det_iujk_pj2Value,
							det_iujk_pj3 : det_iujk_pj3Value,
							det_iujk_pjteknis : det_iujk_pjteknisValue,
							det_iujk_pjtbu : det_iujk_pjtbuValue,
							det_iujk_surveylulus : det_iujk_surveylulusValue,
							action : iujk_det_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									iujk_det_dataStore.reload();
									iujk_det_resetForm();
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
			iujk_det_searchPanel.getForm().reset();
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
		}
		
		function iujk_det_setForm(){
			iujk_det_dbTask = 'UPDATE';
            iujk_det_dbTaskMessage = 'update';
			
			var record = iujk_det_gridPanel.getSelectionModel().getSelection()[0];
			det_iujk_idField.setValue(record.data.det_iujk_id);
			det_iujk_iujk_idField.setValue(record.data.det_iujk_iujk_id);
			det_iujk_jenisField.setValue(record.data.det_iujk_jenis);
			det_iujk_tanggalField.setValue(record.data.det_iujk_tanggal);
			det_iujk_namaField.setValue(record.data.det_iujk_nama);
			det_iujk_nomorregField.setValue(record.data.det_iujk_nomorreg);
			det_iujk_rekomnomorField.setValue(record.data.det_iujk_rekomnomor);
			det_iujk_rekomtanggalField.setValue(record.data.det_iujk_rekomtanggal);
			det_iujk_berlakuField.setValue(record.data.det_iujk_berlaku);
			det_iujk_kadaluarsaField.setValue(record.data.det_iujk_kadaluarsa);
			det_iujk_pj1Field.setValue(record.data.det_iujk_pj1);
			det_iujk_pj2Field.setValue(record.data.det_iujk_pj2);
			det_iujk_pj3Field.setValue(record.data.det_iujk_pj3);
			det_iujk_pjteknisField.setValue(record.data.det_iujk_pjteknis);
			det_iujk_pjtbuField.setValue(record.data.det_iujk_pjtbu);
			det_iujk_surveylulusField.setValue(record.data.det_iujk_surveylulus);
					}
		
		function iujk_det_showSearchWindow(){
			iujk_det_searchWindow.show();
		}
		
		function iujk_det_search(){
			iujk_det_gridSearchField.reset();
			
			var det_iujk_iujk_idValue = '';
			var det_iujk_jenisValue = '';
			var det_iujk_tanggalValue = '';
			var det_iujk_namaValue = '';
			var det_iujk_nomorregValue = '';
			var det_iujk_rekomnomorValue = '';
			var det_iujk_rekomtanggalValue = '';
			var det_iujk_berlakuValue = '';
			var det_iujk_kadaluarsaValue = '';
			var det_iujk_pj1Value = '';
			var det_iujk_pj2Value = '';
			var det_iujk_pj3Value = '';
			var det_iujk_pjteknisValue = '';
			var det_iujk_pjtbuValue = '';
			var det_iujk_surveylulusValue = '';
						
			det_iujk_iujk_idValue = det_iujk_iujk_idSearchField.getValue();
			det_iujk_jenisValue = det_iujk_jenisSearchField.getValue();
			det_iujk_tanggalValue = det_iujk_tanggalSearchField.getValue();
			det_iujk_namaValue = det_iujk_namaSearchField.getValue();
			det_iujk_nomorregValue = det_iujk_nomorregSearchField.getValue();
			det_iujk_rekomnomorValue = det_iujk_rekomnomorSearchField.getValue();
			det_iujk_rekomtanggalValue = det_iujk_rekomtanggalSearchField.getValue();
			det_iujk_berlakuValue = det_iujk_berlakuSearchField.getValue();
			det_iujk_kadaluarsaValue = det_iujk_kadaluarsaSearchField.getValue();
			det_iujk_pj1Value = det_iujk_pj1SearchField.getValue();
			det_iujk_pj2Value = det_iujk_pj2SearchField.getValue();
			det_iujk_pj3Value = det_iujk_pj3SearchField.getValue();
			det_iujk_pjteknisValue = det_iujk_pjteknisSearchField.getValue();
			det_iujk_pjtbuValue = det_iujk_pjtbuSearchField.getValue();
			det_iujk_surveylulusValue = det_iujk_surveylulusSearchField.getValue();
			iujk_det_dbListAction = "SEARCH";
			iujk_det_dataStore.proxy.extraParams = { 
				det_iujk_iujk_id : det_iujk_iujk_idValue,
				det_iujk_jenis : det_iujk_jenisValue,
				det_iujk_tanggal : det_iujk_tanggalValue,
				det_iujk_nama : det_iujk_namaValue,
				det_iujk_nomorreg : det_iujk_nomorregValue,
				det_iujk_rekomnomor : det_iujk_rekomnomorValue,
				det_iujk_rekomtanggal : det_iujk_rekomtanggalValue,
				det_iujk_berlaku : det_iujk_berlakuValue,
				det_iujk_kadaluarsa : det_iujk_kadaluarsaValue,
				det_iujk_pj1 : det_iujk_pj1Value,
				det_iujk_pj2 : det_iujk_pj2Value,
				det_iujk_pj3 : det_iujk_pj3Value,
				det_iujk_pjteknis : det_iujk_pjteknisValue,
				det_iujk_pjtbu : det_iujk_pjtbuValue,
				det_iujk_surveylulus : det_iujk_surveylulusValue,
				action : 'SEARCH'
			};
			iujk_det_dataStore.currentPage = 1;
			iujk_det_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function iujk_det_printExcel(outputType){
			var searchText = "";
			var det_iujk_iujk_idValue = '';
			var det_iujk_jenisValue = '';
			var det_iujk_tanggalValue = '';
			var det_iujk_namaValue = '';
			var det_iujk_nomorregValue = '';
			var det_iujk_rekomnomorValue = '';
			var det_iujk_rekomtanggalValue = '';
			var det_iujk_berlakuValue = '';
			var det_iujk_kadaluarsaValue = '';
			var det_iujk_pj1Value = '';
			var det_iujk_pj2Value = '';
			var det_iujk_pj3Value = '';
			var det_iujk_pjteknisValue = '';
			var det_iujk_pjtbuValue = '';
			var det_iujk_surveylulusValue = '';
			
			if(iujk_det_dataStore.proxy.extraParams.query!==null){searchText = iujk_det_dataStore.proxy.extraParams.query;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_iujk_id!==null){det_iujk_iujk_idValue = iujk_det_dataStore.proxy.extraParams.det_iujk_iujk_id;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_jenis!==null){det_iujk_jenisValue = iujk_det_dataStore.proxy.extraParams.det_iujk_jenis;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_tanggal!==null){det_iujk_tanggalValue = iujk_det_dataStore.proxy.extraParams.det_iujk_tanggal;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_nama!==null){det_iujk_namaValue = iujk_det_dataStore.proxy.extraParams.det_iujk_nama;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_nomorreg!==null){det_iujk_nomorregValue = iujk_det_dataStore.proxy.extraParams.det_iujk_nomorreg;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_rekomnomor!==null){det_iujk_rekomnomorValue = iujk_det_dataStore.proxy.extraParams.det_iujk_rekomnomor;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_rekomtanggal!==null){det_iujk_rekomtanggalValue = iujk_det_dataStore.proxy.extraParams.det_iujk_rekomtanggal;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_berlaku!==null){det_iujk_berlakuValue = iujk_det_dataStore.proxy.extraParams.det_iujk_berlaku;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_kadaluarsa!==null){det_iujk_kadaluarsaValue = iujk_det_dataStore.proxy.extraParams.det_iujk_kadaluarsa;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pj1!==null){det_iujk_pj1Value = iujk_det_dataStore.proxy.extraParams.det_iujk_pj1;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pj2!==null){det_iujk_pj2Value = iujk_det_dataStore.proxy.extraParams.det_iujk_pj2;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pj3!==null){det_iujk_pj3Value = iujk_det_dataStore.proxy.extraParams.det_iujk_pj3;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pjteknis!==null){det_iujk_pjteknisValue = iujk_det_dataStore.proxy.extraParams.det_iujk_pjteknis;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_pjtbu!==null){det_iujk_pjtbuValue = iujk_det_dataStore.proxy.extraParams.det_iujk_pjtbu;}
			if(iujk_det_dataStore.proxy.extraParams.det_iujk_surveylulus!==null){det_iujk_surveylulusValue = iujk_det_dataStore.proxy.extraParams.det_iujk_surveylulus;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_t_iujk_det/switchAction',
				params : {
					action : outputType,
					query : searchText,
					det_iujk_iujk_id : det_iujk_iujk_idValue,
					det_iujk_jenis : det_iujk_jenisValue,
					det_iujk_tanggal : det_iujk_tanggalValue,
					det_iujk_nama : det_iujk_namaValue,
					det_iujk_nomorreg : det_iujk_nomorregValue,
					det_iujk_rekomnomor : det_iujk_rekomnomorValue,
					det_iujk_rekomtanggal : det_iujk_rekomtanggalValue,
					det_iujk_berlaku : det_iujk_berlakuValue,
					det_iujk_kadaluarsa : det_iujk_kadaluarsaValue,
					det_iujk_pj1 : det_iujk_pj1Value,
					det_iujk_pj2 : det_iujk_pj2Value,
					det_iujk_pj3 : det_iujk_pj3Value,
					det_iujk_pjteknis : det_iujk_pjteknisValue,
					det_iujk_pjtbu : det_iujk_pjtbuValue,
					det_iujk_surveylulus : det_iujk_surveylulusValue,
					currentAction : iujk_det_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/t_iujk_det_list.xls');
							}else{
								window.open('./print/t_iujk_det_list.html','iujk_detlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
				{ name : 'det_iujk_tanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_iujk_tanggal' },
				{ name : 'det_iujk_nama', type : 'string', mapping : 'det_iujk_nama' },
				{ name : 'det_iujk_nomorreg', type : 'string', mapping : 'det_iujk_nomorreg' },
				{ name : 'det_iujk_rekomnomor', type : 'string', mapping : 'det_iujk_rekomnomor' },
				{ name : 'det_iujk_rekomtanggal', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_iujk_rekomtanggal' },
				{ name : 'det_iujk_berlaku', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_iujk_berlaku' },
				{ name : 'det_iujk_kadaluarsa', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'det_iujk_kadaluarsa' },
				{ name : 'det_iujk_pj1', type : 'string', mapping : 'det_iujk_pj1' },
				{ name : 'det_iujk_pj2', type : 'string', mapping : 'det_iujk_pj2' },
				{ name : 'det_iujk_pj3', type : 'string', mapping : 'det_iujk_pj3' },
				{ name : 'det_iujk_pjteknis', type : 'string', mapping : 'det_iujk_pjteknis' },
				{ name : 'det_iujk_pjtbu', type : 'string', mapping : 'det_iujk_pjtbu' },
				{ name : 'det_iujk_surveylulus', type : 'int', mapping : 'det_iujk_surveylulus' },
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
			id: 'iujk_det_contextMenu',
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
		iujk_det_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'iujk_det_gridPanel',
			constrain : true,
			store : iujk_det_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'iujk_detGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						iujk_det_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : iujk_det_shorcut,
			columns : [
				{
					text : 'det_iujk_iujk_id',
					dataIndex : 'det_iujk_iujk_id',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_jenis',
					dataIndex : 'det_iujk_jenis',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_tanggal',
					dataIndex : 'det_iujk_tanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_nama',
					dataIndex : 'det_iujk_nama',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_nomorreg',
					dataIndex : 'det_iujk_nomorreg',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_rekomnomor',
					dataIndex : 'det_iujk_rekomnomor',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_rekomtanggal',
					dataIndex : 'det_iujk_rekomtanggal',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_berlaku',
					dataIndex : 'det_iujk_berlaku',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_kadaluarsa',
					dataIndex : 'det_iujk_kadaluarsa',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_pj1',
					dataIndex : 'det_iujk_pj1',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_pj2',
					dataIndex : 'det_iujk_pj2',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_pj3',
					dataIndex : 'det_iujk_pj3',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_pjteknis',
					dataIndex : 'det_iujk_pjteknis',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_pjtbu',
					dataIndex : 'det_iujk_pjtbu',
					width : 100,
					sortable : false
				},
				{
					text : 'det_iujk_surveylulus',
					dataIndex : 'det_iujk_surveylulus',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				iujk_det_addButton,
				iujk_det_editButton,
				iujk_det_deleteButton,
				iujk_det_gridSearchField,
				iujk_det_searchButton,
				iujk_det_refreshButton,
				iujk_det_printButton,
				iujk_det_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : iujk_det_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					iujk_det_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		det_iujk_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_idField',
			name : 'det_iujk_id',
			fieldLabel : 'det_iujk_id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		det_iujk_iujk_idField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_iujk_idField',
			name : 'det_iujk_iujk_id',
			fieldLabel : 'det_iujk_iujk_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_iujk_jenisField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_jenisField',
			name : 'det_iujk_jenis',
			fieldLabel : 'det_iujk_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		det_iujk_tanggalField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_tanggalField',
			name : 'det_iujk_tanggal',
			fieldLabel : 'det_iujk_tanggal',
			maxLength : 0
		});
		det_iujk_namaField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_namaField',
			name : 'det_iujk_nama',
			fieldLabel : 'det_iujk_nama',
			maxLength : 50
		});
		det_iujk_nomorregField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_nomorregField',
			name : 'det_iujk_nomorreg',
			fieldLabel : 'det_iujk_nomorreg',
			maxLength : 50
		});
		det_iujk_rekomnomorField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_rekomnomorField',
			name : 'det_iujk_rekomnomor',
			fieldLabel : 'det_iujk_rekomnomor',
			maxLength : 255
		});
		det_iujk_rekomtanggalField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_rekomtanggalField',
			name : 'det_iujk_rekomtanggal',
			fieldLabel : 'det_iujk_rekomtanggal',
			maxLength : 0
		});
		det_iujk_berlakuField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_berlakuField',
			name : 'det_iujk_berlaku',
			fieldLabel : 'det_iujk_berlaku',
			maxLength : 0
		});
		det_iujk_kadaluarsaField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_kadaluarsaField',
			name : 'det_iujk_kadaluarsa',
			fieldLabel : 'det_iujk_kadaluarsa',
			maxLength : 0
		});
		det_iujk_pj1Field = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj1Field',
			name : 'det_iujk_pj1',
			fieldLabel : 'det_iujk_pj1',
			maxLength : 50
		});
		det_iujk_pj2Field = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj2Field',
			name : 'det_iujk_pj2',
			fieldLabel : 'det_iujk_pj2',
			maxLength : 50
		});
		det_iujk_pj3Field = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj3Field',
			name : 'det_iujk_pj3',
			fieldLabel : 'det_iujk_pj3',
			maxLength : 50
		});
		det_iujk_pjteknisField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pjteknisField',
			name : 'det_iujk_pjteknis',
			fieldLabel : 'det_iujk_pjteknis',
			maxLength : 50
		});
		det_iujk_pjtbuField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pjtbuField',
			name : 'det_iujk_pjtbu',
			fieldLabel : 'det_iujk_pjtbu',
			maxLength : 50
		});
		det_iujk_surveylulusField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_surveylulusField',
			name : 'det_iujk_surveylulus',
			fieldLabel : 'det_iujk_surveylulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
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
						det_iujk_idField,
						det_iujk_iujk_idField,
						det_iujk_jenisField,
						det_iujk_tanggalField,
						det_iujk_namaField,
						det_iujk_nomorregField,
						det_iujk_rekomnomorField,
						det_iujk_rekomtanggalField,
						det_iujk_berlakuField,
						det_iujk_kadaluarsaField,
						det_iujk_pj1Field,
						det_iujk_pj2Field,
						det_iujk_pj3Field,
						det_iujk_pjteknisField,
						det_iujk_pjtbuField,
						det_iujk_surveylulusField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
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
/* Start SearchPanel declaration */
		det_iujk_iujk_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_iujk_idSearchField',
			name : 'det_iujk_iujk_id',
			fieldLabel : 'det_iujk_iujk_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_iujk_jenisSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_jenisSearchField',
			name : 'det_iujk_jenis',
			fieldLabel : 'det_iujk_jenis',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		det_iujk_tanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_tanggalSearchField',
			name : 'det_iujk_tanggal',
			fieldLabel : 'det_iujk_tanggal',
			maxLength : 0
		
		});
		det_iujk_namaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_namaSearchField',
			name : 'det_iujk_nama',
			fieldLabel : 'det_iujk_nama',
			maxLength : 50
		
		});
		det_iujk_nomorregSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_nomorregSearchField',
			name : 'det_iujk_nomorreg',
			fieldLabel : 'det_iujk_nomorreg',
			maxLength : 50
		
		});
		det_iujk_rekomnomorSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_rekomnomorSearchField',
			name : 'det_iujk_rekomnomor',
			fieldLabel : 'det_iujk_rekomnomor',
			maxLength : 255
		
		});
		det_iujk_rekomtanggalSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_rekomtanggalSearchField',
			name : 'det_iujk_rekomtanggal',
			fieldLabel : 'det_iujk_rekomtanggal',
			maxLength : 0
		
		});
		det_iujk_berlakuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_berlakuSearchField',
			name : 'det_iujk_berlaku',
			fieldLabel : 'det_iujk_berlaku',
			maxLength : 0
		
		});
		det_iujk_kadaluarsaSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_kadaluarsaSearchField',
			name : 'det_iujk_kadaluarsa',
			fieldLabel : 'det_iujk_kadaluarsa',
			maxLength : 0
		
		});
		det_iujk_pj1SearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj1SearchField',
			name : 'det_iujk_pj1',
			fieldLabel : 'det_iujk_pj1',
			maxLength : 50
		
		});
		det_iujk_pj2SearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj2SearchField',
			name : 'det_iujk_pj2',
			fieldLabel : 'det_iujk_pj2',
			maxLength : 50
		
		});
		det_iujk_pj3SearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pj3SearchField',
			name : 'det_iujk_pj3',
			fieldLabel : 'det_iujk_pj3',
			maxLength : 50
		
		});
		det_iujk_pjteknisSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pjteknisSearchField',
			name : 'det_iujk_pjteknis',
			fieldLabel : 'det_iujk_pjteknis',
			maxLength : 50
		
		});
		det_iujk_pjtbuSearchField = Ext.create('Ext.form.TextField',{
			id : 'det_iujk_pjtbuSearchField',
			name : 'det_iujk_pjtbu',
			fieldLabel : 'det_iujk_pjtbu',
			maxLength : 50
		
		});
		det_iujk_surveylulusSearchField = Ext.create('Ext.form.NumberField',{
			id : 'det_iujk_surveylulusSearchField',
			name : 'det_iujk_surveylulus',
			fieldLabel : 'det_iujk_surveylulus',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var iujk_det_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : iujk_det_search
		});
		var iujk_det_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				iujk_det_searchWindow.hide();
			}
		});
		iujk_det_searchPanel = Ext.create('Ext.form.Panel', {
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
						det_iujk_iujk_idSearchField,
						det_iujk_jenisSearchField,
						det_iujk_tanggalSearchField,
						det_iujk_namaSearchField,
						det_iujk_nomorregSearchField,
						det_iujk_rekomnomorSearchField,
						det_iujk_rekomtanggalSearchField,
						det_iujk_berlakuSearchField,
						det_iujk_kadaluarsaSearchField,
						det_iujk_pj1SearchField,
						det_iujk_pj2SearchField,
						det_iujk_pj3SearchField,
						det_iujk_pjteknisSearchField,
						det_iujk_pjtbuSearchField,
						det_iujk_surveylulusSearchField,
						]
				}],
			buttons : [iujk_det_searchingButton,iujk_det_cancelSearchButton]
		});
		iujk_det_searchWindow = Ext.create('Ext.window.Window',{
			id : 'iujk_det_searchWindow',
			renderTo : 'iujk_detSearchWindow',
			title : globalFormSearchTitle + ' ' + iujk_det_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [iujk_det_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="iujk_detSaveWindow"></div>
<div id="iujk_detSearchWindow"></div>
<div class="span12" id="iujk_detGrid"></div>