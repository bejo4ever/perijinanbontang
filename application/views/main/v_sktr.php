<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var tr_componentItemTitle="TR";
		var tr_dataStore;
		
		var tr_shorcut;
		var tr_contextMenu;
		var tr_gridSearchField;
		var tr_gridPanel;
		var tr_formPanel;
		var tr_formWindow;
		var tr_searchPanel;
		var tr_searchWindow;
		
		var ID_SKTRField;
		var ID_USERField;
		var NAMA_PEMOHONField;
		var NO_TELPField;
		var HAK_MILIKField;
		var NAMA_PEMILIKField;
		var NO_SURAT_TANAHField;
		var ALAMAT_BANGUNANField;
		var RENCANA_PERUNTUKANField;
		var TINGGI_BANGUNANField;
		var LUAS_PERSILField;
		var LUAS_BANGUNANField;
		var BATAS_KIRIField;
		var BATAS_KANANField;
		var BATAS_DEPANField;
		var BATAS_BELAKANGField;
		var TGL_PERMOHONANField;
				
		var ID_USERSearchField;
		var NAMA_PEMOHONSearchField;
		var NO_TELPSearchField;
		var HAK_MILIKSearchField;
		var NAMA_PEMILIKSearchField;
		var NO_SURAT_TANAHSearchField;
		var ALAMAT_BANGUNANSearchField;
		var RENCANA_PERUNTUKANSearchField;
		var TINGGI_BANGUNANSearchField;
		var LUAS_PERSILSearchField;
		var LUAS_BANGUNANSearchField;
		var BATAS_KIRISearchField;
		var BATAS_KANANSearchField;
		var BATAS_DEPANSearchField;
		var BATAS_BELAKANGSearchField;
		var TGL_PERMOHONANSearchField;
				
		var tr_dbTask = 'CREATE';
		var tr_dbTaskMessage = 'Tambah';
		var tr_dbPermission = 'CRUD';
		var tr_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function tr_switchToGrid(){
			tr_formPanel.setDisabled(true);
			tr_gridPanel.setDisabled(false);
			tr_formWindow.hide();
		}
		
		function tr_switchToForm(){
			tr_gridPanel.setDisabled(true);
			tr_formPanel.setDisabled(false);
			tr_formWindow.show();
		}
		
		function tr_confirmAdd(){
			tr_dbTask = 'CREATE';
			tr_dbTaskMessage = 'created';
			tr_resetForm();
			tr_switchToForm();
		}
		
		function tr_confirmUpdate(){
			if(tr_gridPanel.selModel.getCount() == 1) {
				tr_dbTask = 'UPDATE';
				tr_dbTaskMessage = 'updated';
				tr_switchToForm();
				tr_setForm();
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
		
		function tr_confirmDelete(){
			if(tr_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, tr_delete);
			}else if(tr_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, tr_delete);
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
		
		function tr_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(tr_dbPermission)==false && pattC.test(tr_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(tr_confirmFormValid()){
					var ID_SKTRValue = '';
					var ID_USERValue = '';
					var NAMA_PEMOHONValue = '';
					var NO_TELPValue = '';
					var HAK_MILIKValue = '';
					var NAMA_PEMILIKValue = '';
					var NO_SURAT_TANAHValue = '';
					var ALAMAT_BANGUNANValue = '';
					var RENCANA_PERUNTUKANValue = '';
					var TINGGI_BANGUNANValue = '';
					var LUAS_PERSILValue = '';
					var LUAS_BANGUNANValue = '';
					var BATAS_KIRIValue = '';
					var BATAS_KANANValue = '';
					var BATAS_DEPANValue = '';
					var BATAS_BELAKANGValue = '';
					var TGL_PERMOHONANValue = '';
										
					ID_SKTRValue = ID_SKTRField.getValue();
					ID_USERValue = ID_USERField.getValue();
					NAMA_PEMOHONValue = NAMA_PEMOHONField.getValue();
					NO_TELPValue = NO_TELPField.getValue();
					HAK_MILIKValue = HAK_MILIKField.getValue();
					NAMA_PEMILIKValue = NAMA_PEMILIKField.getValue();
					NO_SURAT_TANAHValue = NO_SURAT_TANAHField.getValue();
					ALAMAT_BANGUNANValue = ALAMAT_BANGUNANField.getValue();
					RENCANA_PERUNTUKANValue = RENCANA_PERUNTUKANField.getValue();
					TINGGI_BANGUNANValue = TINGGI_BANGUNANField.getValue();
					LUAS_PERSILValue = LUAS_PERSILField.getValue();
					LUAS_BANGUNANValue = LUAS_BANGUNANField.getValue();
					BATAS_KIRIValue = BATAS_KIRIField.getValue();
					BATAS_KANANValue = BATAS_KANANField.getValue();
					BATAS_DEPANValue = BATAS_DEPANField.getValue();
					BATAS_BELAKANGValue = BATAS_BELAKANGField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_sktr/switchAction',
						params: {							
							ID_SKTR : ID_SKTRValue,
							ID_USER : ID_USERValue,
							NAMA_PEMOHON : NAMA_PEMOHONValue,
							NO_TELP : NO_TELPValue,
							HAK_MILIK : HAK_MILIKValue,
							NAMA_PEMILIK : NAMA_PEMILIKValue,
							NO_SURAT_TANAH : NO_SURAT_TANAHValue,
							ALAMAT_BANGUNAN : ALAMAT_BANGUNANValue,
							RENCANA_PERUNTUKAN : RENCANA_PERUNTUKANValue,
							TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
							LUAS_PERSIL : LUAS_PERSILValue,
							LUAS_BANGUNAN : LUAS_BANGUNANValue,
							BATAS_KIRI : BATAS_KIRIValue,
							BATAS_KANAN : BATAS_KANANValue,
							BATAS_DEPAN : BATAS_DEPANValue,
							BATAS_BELAKANG : BATAS_BELAKANGValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							action : tr_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									tr_dataStore.reload();
									tr_resetForm();
									tr_switchToGrid();
									tr_gridPanel.getSelectionModel().deselectAll();
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
		
		function tr_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(tr_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = tr_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< tr_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_SKTR);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_sktr/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									tr_dataStore.reload();
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
		
		function tr_refresh(){
			tr_dbListAction = "GETLIST";
			tr_gridSearchField.reset();
			tr_searchPanel.getForm().reset();
			tr_dataStore.proxy.extraParams = { action : 'GETLIST' };
			tr_dataStore.proxy.extraParams.query = "";
			tr_dataStore.currentPage = 1;
			tr_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function tr_confirmFormValid(){
			return tr_formPanel.getForm().isValid();
		}
		
		function tr_resetForm(){
			tr_dbTask = 'CREATE';
			tr_dbTaskMessage = 'create';
			tr_formPanel.getForm().reset();
			ID_SKTRField.setValue(0);
		}
		
		function tr_setForm(){
			tr_dbTask = 'UPDATE';
            tr_dbTaskMessage = 'update';
			
			var record = tr_gridPanel.getSelectionModel().getSelection()[0];
			ID_SKTRField.setValue(record.data.ID_SKTR);
			ID_USERField.setValue(record.data.ID_USER);
			NAMA_PEMOHONField.setValue(record.data.NAMA_PEMOHON);
			NO_TELPField.setValue(record.data.NO_TELP);
			HAK_MILIKField.setValue(record.data.HAK_MILIK);
			NAMA_PEMILIKField.setValue(record.data.NAMA_PEMILIK);
			NO_SURAT_TANAHField.setValue(record.data.NO_SURAT_TANAH);
			ALAMAT_BANGUNANField.setValue(record.data.ALAMAT_BANGUNAN);
			RENCANA_PERUNTUKANField.setValue(record.data.RENCANA_PERUNTUKAN);
			TINGGI_BANGUNANField.setValue(record.data.TINGGI_BANGUNAN);
			LUAS_PERSILField.setValue(record.data.LUAS_PERSIL);
			LUAS_BANGUNANField.setValue(record.data.LUAS_BANGUNAN);
			BATAS_KIRIField.setValue(record.data.BATAS_KIRI);
			BATAS_KANANField.setValue(record.data.BATAS_KANAN);
			BATAS_DEPANField.setValue(record.data.BATAS_DEPAN);
			BATAS_BELAKANGField.setValue(record.data.BATAS_BELAKANG);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
					}
		
		function tr_showSearchWindow(){
			tr_searchWindow.show();
		}
		
		function tr_search(){
			tr_gridSearchField.reset();
			
			var ID_USERValue = '';
			var NAMA_PEMOHONValue = '';
			var NO_TELPValue = '';
			var HAK_MILIKValue = '';
			var NAMA_PEMILIKValue = '';
			var NO_SURAT_TANAHValue = '';
			var ALAMAT_BANGUNANValue = '';
			var RENCANA_PERUNTUKANValue = '';
			var TINGGI_BANGUNANValue = '';
			var LUAS_PERSILValue = '';
			var LUAS_BANGUNANValue = '';
			var BATAS_KIRIValue = '';
			var BATAS_KANANValue = '';
			var BATAS_DEPANValue = '';
			var BATAS_BELAKANGValue = '';
			var TGL_PERMOHONANValue = '';
						
			ID_USERValue = ID_USERSearchField.getValue();
			NAMA_PEMOHONValue = NAMA_PEMOHONSearchField.getValue();
			NO_TELPValue = NO_TELPSearchField.getValue();
			HAK_MILIKValue = HAK_MILIKSearchField.getValue();
			NAMA_PEMILIKValue = NAMA_PEMILIKSearchField.getValue();
			NO_SURAT_TANAHValue = NO_SURAT_TANAHSearchField.getValue();
			ALAMAT_BANGUNANValue = ALAMAT_BANGUNANSearchField.getValue();
			RENCANA_PERUNTUKANValue = RENCANA_PERUNTUKANSearchField.getValue();
			TINGGI_BANGUNANValue = TINGGI_BANGUNANSearchField.getValue();
			LUAS_PERSILValue = LUAS_PERSILSearchField.getValue();
			LUAS_BANGUNANValue = LUAS_BANGUNANSearchField.getValue();
			BATAS_KIRIValue = BATAS_KIRISearchField.getValue();
			BATAS_KANANValue = BATAS_KANANSearchField.getValue();
			BATAS_DEPANValue = BATAS_DEPANSearchField.getValue();
			BATAS_BELAKANGValue = BATAS_BELAKANGSearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			tr_dbListAction = "SEARCH";
			tr_dataStore.proxy.extraParams = { 
				ID_USER : ID_USERValue,
				NAMA_PEMOHON : NAMA_PEMOHONValue,
				NO_TELP : NO_TELPValue,
				HAK_MILIK : HAK_MILIKValue,
				NAMA_PEMILIK : NAMA_PEMILIKValue,
				NO_SURAT_TANAH : NO_SURAT_TANAHValue,
				ALAMAT_BANGUNAN : ALAMAT_BANGUNANValue,
				RENCANA_PERUNTUKAN : RENCANA_PERUNTUKANValue,
				TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
				LUAS_PERSIL : LUAS_PERSILValue,
				LUAS_BANGUNAN : LUAS_BANGUNANValue,
				BATAS_KIRI : BATAS_KIRIValue,
				BATAS_KANAN : BATAS_KANANValue,
				BATAS_DEPAN : BATAS_DEPANValue,
				BATAS_BELAKANG : BATAS_BELAKANGValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				action : 'SEARCH'
			};
			tr_dataStore.currentPage = 1;
			tr_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function tr_printExcel(outputType){
			var searchText = "";
			var ID_USERValue = '';
			var NAMA_PEMOHONValue = '';
			var NO_TELPValue = '';
			var HAK_MILIKValue = '';
			var NAMA_PEMILIKValue = '';
			var NO_SURAT_TANAHValue = '';
			var ALAMAT_BANGUNANValue = '';
			var RENCANA_PERUNTUKANValue = '';
			var TINGGI_BANGUNANValue = '';
			var LUAS_PERSILValue = '';
			var LUAS_BANGUNANValue = '';
			var BATAS_KIRIValue = '';
			var BATAS_KANANValue = '';
			var BATAS_DEPANValue = '';
			var BATAS_BELAKANGValue = '';
			var TGL_PERMOHONANValue = '';
			
			if(tr_dataStore.proxy.extraParams.query!==null){searchText = tr_dataStore.proxy.extraParams.query;}
			if(tr_dataStore.proxy.extraParams.ID_USER!==null){ID_USERValue = tr_dataStore.proxy.extraParams.ID_USER;}
			if(tr_dataStore.proxy.extraParams.NAMA_PEMOHON!==null){NAMA_PEMOHONValue = tr_dataStore.proxy.extraParams.NAMA_PEMOHON;}
			if(tr_dataStore.proxy.extraParams.NO_TELP!==null){NO_TELPValue = tr_dataStore.proxy.extraParams.NO_TELP;}
			if(tr_dataStore.proxy.extraParams.HAK_MILIK!==null){HAK_MILIKValue = tr_dataStore.proxy.extraParams.HAK_MILIK;}
			if(tr_dataStore.proxy.extraParams.NAMA_PEMILIK!==null){NAMA_PEMILIKValue = tr_dataStore.proxy.extraParams.NAMA_PEMILIK;}
			if(tr_dataStore.proxy.extraParams.NO_SURAT_TANAH!==null){NO_SURAT_TANAHValue = tr_dataStore.proxy.extraParams.NO_SURAT_TANAH;}
			if(tr_dataStore.proxy.extraParams.ALAMAT_BANGUNAN!==null){ALAMAT_BANGUNANValue = tr_dataStore.proxy.extraParams.ALAMAT_BANGUNAN;}
			if(tr_dataStore.proxy.extraParams.RENCANA_PERUNTUKAN!==null){RENCANA_PERUNTUKANValue = tr_dataStore.proxy.extraParams.RENCANA_PERUNTUKAN;}
			if(tr_dataStore.proxy.extraParams.TINGGI_BANGUNAN!==null){TINGGI_BANGUNANValue = tr_dataStore.proxy.extraParams.TINGGI_BANGUNAN;}
			if(tr_dataStore.proxy.extraParams.LUAS_PERSIL!==null){LUAS_PERSILValue = tr_dataStore.proxy.extraParams.LUAS_PERSIL;}
			if(tr_dataStore.proxy.extraParams.LUAS_BANGUNAN!==null){LUAS_BANGUNANValue = tr_dataStore.proxy.extraParams.LUAS_BANGUNAN;}
			if(tr_dataStore.proxy.extraParams.BATAS_KIRI!==null){BATAS_KIRIValue = tr_dataStore.proxy.extraParams.BATAS_KIRI;}
			if(tr_dataStore.proxy.extraParams.BATAS_KANAN!==null){BATAS_KANANValue = tr_dataStore.proxy.extraParams.BATAS_KANAN;}
			if(tr_dataStore.proxy.extraParams.BATAS_DEPAN!==null){BATAS_DEPANValue = tr_dataStore.proxy.extraParams.BATAS_DEPAN;}
			if(tr_dataStore.proxy.extraParams.BATAS_BELAKANG!==null){BATAS_BELAKANGValue = tr_dataStore.proxy.extraParams.BATAS_BELAKANG;}
			if(tr_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = tr_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_sktr/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_USER : ID_USERValue,
					NAMA_PEMOHON : NAMA_PEMOHONValue,
					NO_TELP : NO_TELPValue,
					HAK_MILIK : HAK_MILIKValue,
					NAMA_PEMILIK : NAMA_PEMILIKValue,
					NO_SURAT_TANAH : NO_SURAT_TANAHValue,
					ALAMAT_BANGUNAN : ALAMAT_BANGUNANValue,
					RENCANA_PERUNTUKAN : RENCANA_PERUNTUKANValue,
					TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
					LUAS_PERSIL : LUAS_PERSILValue,
					LUAS_BANGUNAN : LUAS_BANGUNANValue,
					BATAS_KIRI : BATAS_KIRIValue,
					BATAS_KANAN : BATAS_KANANValue,
					BATAS_DEPAN : BATAS_DEPANValue,
					BATAS_BELAKANG : BATAS_BELAKANGValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					currentAction : tr_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/sktr_list.xls');
							}else{
								window.open('./print/sktr_list.html','trlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		tr_dataStore = Ext.create('Ext.data.Store',{
			id : 'tr_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_sktr/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_SKTR'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_SKTR', type : 'int', mapping : 'ID_SKTR' },
				{ name : 'ID_USER', type : 'int', mapping : 'ID_USER' },
				{ name : 'NAMA_PEMOHON', type : 'string', mapping : 'NAMA_PEMOHON' },
				{ name : 'NO_TELP', type : 'string', mapping : 'NO_TELP' },
				{ name : 'HAK_MILIK', type : 'int', mapping : 'HAK_MILIK' },
				{ name : 'NAMA_PEMILIK', type : 'string', mapping : 'NAMA_PEMILIK' },
				{ name : 'NO_SURAT_TANAH', type : 'string', mapping : 'NO_SURAT_TANAH' },
				{ name : 'ALAMAT_BANGUNAN', type : 'string', mapping : 'ALAMAT_BANGUNAN' },
				{ name : 'RENCANA_PERUNTUKAN', type : 'string', mapping : 'RENCANA_PERUNTUKAN' },
				{ name : 'TINGGI_BANGUNAN', type : 'float', mapping : 'TINGGI_BANGUNAN' },
				{ name : 'LUAS_PERSIL', type : 'float', mapping : 'LUAS_PERSIL' },
				{ name : 'LUAS_BANGUNAN', type : 'float', mapping : 'LUAS_BANGUNAN' },
				{ name : 'BATAS_KIRI', type : 'string', mapping : 'BATAS_KIRI' },
				{ name : 'BATAS_KANAN', type : 'string', mapping : 'BATAS_KANAN' },
				{ name : 'BATAS_DEPAN', type : 'string', mapping : 'BATAS_DEPAN' },
				{ name : 'BATAS_BELAKANG', type : 'string', mapping : 'BATAS_BELAKANG' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d', mapping : 'TGL_PERMOHONAN' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		tr_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						tr_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						tr_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						tr_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						tr_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						tr_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						tr_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						tr_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						tr_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var tr_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : tr_confirmAdd
		});
		var tr_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : tr_confirmUpdate
		});
		var tr_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : tr_confirmDelete
		});
		var tr_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : tr_refresh
		});
		var tr_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : tr_showSearchWindow
		});
		var tr_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				tr_printExcel('PRINT');
			}
		});
		var tr_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				tr_printExcel('EXCEL');
			}
		});
		
		var tr_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : tr_confirmUpdate
		});
		var tr_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : tr_confirmDelete
		});
		var tr_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : tr_refresh
		});
		tr_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'tr_contextMenu',
			items: [
				tr_contextMenuEdit,tr_contextMenuDelete,'-',tr_contextMenuRefresh
			]
		});
		
		tr_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : tr_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						tr_dataStore.proxy.extraParams = { action : 'GETLIST'};
						tr_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		tr_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'tr_gridPanel',
			constrain : true,
			store : tr_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'trGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						tr_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : tr_shorcut,
			columns : [
				{
					text : 'ID_USER',
					dataIndex : 'ID_USER',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_PEMOHON',
					dataIndex : 'NAMA_PEMOHON',
					width : 100,
					sortable : false
				},
				{
					text : 'NO_TELP',
					dataIndex : 'NO_TELP',
					width : 100,
					sortable : false
				},
				{
					text : 'HAK_MILIK',
					dataIndex : 'HAK_MILIK',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_PEMILIK',
					dataIndex : 'NAMA_PEMILIK',
					width : 100,
					sortable : false
				},
				{
					text : 'NO_SURAT_TANAH',
					dataIndex : 'NO_SURAT_TANAH',
					width : 100,
					sortable : false
				},
				{
					text : 'ALAMAT_BANGUNAN',
					dataIndex : 'ALAMAT_BANGUNAN',
					width : 100,
					sortable : false
				},
				{
					text : 'RENCANA_PERUNTUKAN',
					dataIndex : 'RENCANA_PERUNTUKAN',
					width : 100,
					sortable : false
				},
				{
					text : 'TINGGI_BANGUNAN',
					dataIndex : 'TINGGI_BANGUNAN',
					width : 100,
					sortable : false
				},
				{
					text : 'LUAS_PERSIL',
					dataIndex : 'LUAS_PERSIL',
					width : 100,
					sortable : false
				},
				{
					text : 'LUAS_BANGUNAN',
					dataIndex : 'LUAS_BANGUNAN',
					width : 100,
					hidden:true,
					sortable : false
				},
				{
					text : 'BATAS_KIRI',
					dataIndex : 'BATAS_KIRI',
					width : 100,
					hidden:true,
					sortable : false
				},
				{
					text : 'BATAS_KANAN',
					dataIndex : 'BATAS_KANAN',
					width : 100,
					hidden:true,
					sortable : false
				},
				{
					text : 'BATAS_DEPAN',
					dataIndex : 'BATAS_DEPAN',
					width : 100,
					sortable : false,
					hidden:true
				},
				{
					text : 'BATAS_BELAKANG',
					dataIndex : 'BATAS_BELAKANG',
					width : 100,
					sortable : false,
					sortable : false,
					hidden:true
				},
				{
					text : 'TGL_PERMOHONAN',
					dataIndex : 'TGL_PERMOHONAN',
					width : 100,
					sortable : false,
					renderer : Ext.util.Format.dateRenderer('d-m-Y')
				},
							
			],
			tbar : [
				tr_addButton,
				tr_editButton,
				tr_deleteButton,
				tr_gridSearchField,
				tr_searchButton,
				tr_refreshButton,
				tr_printButton,
				tr_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : tr_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					tr_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_SKTRField = Ext.create('Ext.form.NumberField',{
			id : 'ID_SKTRField',
			name : 'ID_SKTR',
			fieldLabel : 'ID_SKTR<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_USERField = Ext.create('Ext.form.NumberField',{
			id : 'ID_USERField',
			name : 'ID_USER',
			fieldLabel : 'ID_USER',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NAMA_PEMOHONField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMOHONField',
			name : 'NAMA_PEMOHON',
			fieldLabel : 'NAMA_PEMOHON',
			maxLength : 50
		});
		NO_TELPField = Ext.create('Ext.form.TextField',{
			id : 'NO_TELPField',
			name : 'NO_TELP',
			fieldLabel : 'NO_TELP',
			maxLength : 20
		});
		HAK_MILIKField = Ext.create('Ext.form.NumberField',{
			id : 'HAK_MILIKField',
			name : 'HAK_MILIK',
			fieldLabel : 'HAK_MILIK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NAMA_PEMILIKField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMILIKField',
			name : 'NAMA_PEMILIK',
			fieldLabel : 'NAMA_PEMILIK',
			maxLength : 50
		});
		NO_SURAT_TANAHField = Ext.create('Ext.form.TextField',{
			id : 'NO_SURAT_TANAHField',
			name : 'NO_SURAT_TANAH',
			fieldLabel : 'NO_SURAT_TANAH',
			maxLength : 100
		});
		ALAMAT_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_BANGUNANField',
			name : 'ALAMAT_BANGUNAN',
			fieldLabel : 'ALAMAT_BANGUNAN',
			maxLength : 100
		});
		RENCANA_PERUNTUKANField = Ext.create('Ext.form.TextField',{
			id : 'RENCANA_PERUNTUKANField',
			name : 'RENCANA_PERUNTUKAN',
			fieldLabel : 'RENCANA_PERUNTUKAN',
			maxLength : 100
		});
		TINGGI_BANGUNANField = Ext.create('Ext.form.NumberField',{
			id : 'TINGGI_BANGUNANField',
			name : 'TINGGI_BANGUNAN',
			fieldLabel : 'TINGGI_BANGUNAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_PERSILField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_PERSILField',
			name : 'LUAS_PERSIL',
			fieldLabel : 'LUAS_PERSIL',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_BANGUNANField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_BANGUNANField',
			name : 'LUAS_BANGUNAN',
			fieldLabel : 'LUAS_BANGUNAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		BATAS_KIRIField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_KIRIField',
			name : 'BATAS_KIRI',
			fieldLabel : 'BATAS_KIRI',
			maxLength : 100
		});
		BATAS_KANANField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_KANANField',
			name : 'BATAS_KANAN',
			fieldLabel : 'BATAS_KANAN',
			maxLength : 100
		});
		BATAS_DEPANField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_DEPANField',
			name : 'BATAS_DEPAN',
			fieldLabel : 'BATAS_DEPAN',
			maxLength : 100
		});
		BATAS_BELAKANGField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_BELAKANGField',
			name : 'BATAS_BELAKANG',
			fieldLabel : 'BATAS_BELAKANG',
			maxLength : 100
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.Date',{
			id : 'TGL_PERMOHONANField',
			name : 'TGL_PERMOHONAN',
			format : 'd-m-Y',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		});
		var tr_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : tr_save
		});
		var tr_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				tr_resetForm();
				tr_switchToGrid();
			}
		});
		tr_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_SKTRField,
						ID_USERField,
						NAMA_PEMOHONField,
						NO_TELPField,
						HAK_MILIKField,
						NAMA_PEMILIKField,
						NO_SURAT_TANAHField,
						ALAMAT_BANGUNANField,
						RENCANA_PERUNTUKANField,
						TINGGI_BANGUNANField,
						LUAS_PERSILField,
						LUAS_BANGUNANField,
						BATAS_KIRIField,
						BATAS_KANANField,
						BATAS_DEPANField,
						BATAS_BELAKANGField,
						TGL_PERMOHONANField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [tr_saveButton,tr_cancelButton]
		});
		tr_formWindow = Ext.create('Ext.window.Window',{
			id : 'tr_formWindow',
			renderTo : 'trSaveWindow',
			title : globalFormAddEditTitle + ' ' + tr_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [tr_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_USERSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_USERSearchField',
			name : 'ID_USER',
			fieldLabel : 'ID_USER',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NAMA_PEMOHONSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMOHONSearchField',
			name : 'NAMA_PEMOHON',
			fieldLabel : 'NAMA_PEMOHON',
			maxLength : 50
		
		});
		NO_TELPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_TELPSearchField',
			name : 'NO_TELP',
			fieldLabel : 'NO_TELP',
			maxLength : 20
		
		});
		HAK_MILIKSearchField = Ext.create('Ext.form.NumberField',{
			id : 'HAK_MILIKSearchField',
			name : 'HAK_MILIK',
			fieldLabel : 'HAK_MILIK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NAMA_PEMILIKSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMILIKSearchField',
			name : 'NAMA_PEMILIK',
			fieldLabel : 'NAMA_PEMILIK',
			maxLength : 50
		
		});
		NO_SURAT_TANAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SURAT_TANAHSearchField',
			name : 'NO_SURAT_TANAH',
			fieldLabel : 'NO_SURAT_TANAH',
			maxLength : 100
		
		});
		ALAMAT_BANGUNANSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_BANGUNANSearchField',
			name : 'ALAMAT_BANGUNAN',
			fieldLabel : 'ALAMAT_BANGUNAN',
			maxLength : 100
		
		});
		RENCANA_PERUNTUKANSearchField = Ext.create('Ext.form.TextField',{
			id : 'RENCANA_PERUNTUKANSearchField',
			name : 'RENCANA_PERUNTUKAN',
			fieldLabel : 'RENCANA_PERUNTUKAN',
			maxLength : 100
		
		});
		TINGGI_BANGUNANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'TINGGI_BANGUNANSearchField',
			name : 'TINGGI_BANGUNAN',
			fieldLabel : 'TINGGI_BANGUNAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		LUAS_PERSILSearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_PERSILSearchField',
			name : 'LUAS_PERSIL',
			fieldLabel : 'LUAS_PERSIL',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		LUAS_BANGUNANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_BANGUNANSearchField',
			name : 'LUAS_BANGUNAN',
			fieldLabel : 'LUAS_BANGUNAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		BATAS_KIRISearchField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_KIRISearchField',
			name : 'BATAS_KIRI',
			fieldLabel : 'BATAS_KIRI',
			maxLength : 100
		
		});
		BATAS_KANANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_KANANSearchField',
			name : 'BATAS_KANAN',
			fieldLabel : 'BATAS_KANAN',
			maxLength : 100
		
		});
		BATAS_DEPANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_DEPANSearchField',
			name : 'BATAS_DEPAN',
			fieldLabel : 'BATAS_DEPAN',
			maxLength : 100
		
		});
		BATAS_BELAKANGSearchField = Ext.create('Ext.form.TextField',{
			id : 'BATAS_BELAKANGSearchField',
			name : 'BATAS_BELAKANG',
			fieldLabel : 'BATAS_BELAKANG',
			maxLength : 100
		
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		var tr_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : tr_search
		});
		var tr_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				tr_searchWindow.hide();
			}
		});
		tr_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_USERSearchField,
						NAMA_PEMOHONSearchField,
						NO_TELPSearchField,
						HAK_MILIKSearchField,
						NAMA_PEMILIKSearchField,
						NO_SURAT_TANAHSearchField,
						ALAMAT_BANGUNANSearchField,
						RENCANA_PERUNTUKANSearchField,
						TINGGI_BANGUNANSearchField,
						LUAS_PERSILSearchField,
						LUAS_BANGUNANSearchField,
						BATAS_KIRISearchField,
						BATAS_KANANSearchField,
						BATAS_DEPANSearchField,
						BATAS_BELAKANGSearchField,
						TGL_PERMOHONANSearchField,
						]
				}],
			buttons : [tr_searchingButton,tr_cancelSearchButton]
		});
		tr_searchWindow = Ext.create('Ext.window.Window',{
			id : 'tr_searchWindow',
			renderTo : 'trSearchWindow',
			title : globalFormSearchTitle + ' ' + tr_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [tr_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="trSaveWindow"></div>
<div id="trSearchWindow"></div>
<div class="span12" id="trGrid"></div>