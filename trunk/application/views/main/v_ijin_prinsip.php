<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var in_prinsip_componentItemTitle="IN_PRINSIP";
		var in_prinsip_dataStore;
		
		var in_prinsip_shorcut;
		var in_prinsip_contextMenu;
		var in_prinsip_gridSearchField;
		var in_prinsip_gridPanel;
		var in_prinsip_formPanel;
		var in_prinsip_formWindow;
		var in_prinsip_searchPanel;
		var in_prinsip_searchWindow;
		
		var ID_IJIN_PRINSIPField;
		var ID_PEMOHONField;
		var NAMA_PERUSAHAANField;
		var NO_SKField;
		var NO_SK_LAMAField;
		var JENIS_PERMOHONANField;
		var NAMA_LOKASIField;
		var LONGITUDEField;
		var LATITUDEField;
		var ALAMAT_LOKASIField;
		var JENIS_TOWERField;
		var FUNGSI_BANGUNANField;
		var JENIS_BANGUNANField;
		var UKURAN_BANGUNANField;
		var TINGGI_BANGUNANField;
		var TIANG_BANGUNANField;
		var PONDASI_BANGUNANField;
				
		var ID_PEMOHONSearchField;
		var NAMA_PERUSAHAANSearchField;
		var NO_SKSearchField;
		var NO_SK_LAMASearchField;
		var JENIS_PERMOHONANSearchField;
		var NAMA_LOKASISearchField;
		var LONGITUDESearchField;
		var LATITUDESearchField;
		var ALAMAT_LOKASISearchField;
		var JENIS_TOWERSearchField;
		var FUNGSI_BANGUNANSearchField;
		var JENIS_BANGUNANSearchField;
		var UKURAN_BANGUNANSearchField;
		var TINGGI_BANGUNANSearchField;
		var TIANG_BANGUNANSearchField;
		var PONDASI_BANGUNANSearchField;
				
		var in_prinsip_dbTask = 'CREATE';
		var in_prinsip_dbTaskMessage = 'Tambah';
		var in_prinsip_dbPermission = 'CRUD';
		var in_prinsip_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function in_prinsip_switchToGrid(){
			in_prinsip_formPanel.setDisabled(true);
			in_prinsip_gridPanel.setDisabled(false);
			in_prinsip_formWindow.hide();
		}
		
		function in_prinsip_switchToForm(){
			in_prinsip_gridPanel.setDisabled(true);
			in_prinsip_formPanel.setDisabled(false);
			in_prinsip_formWindow.show();
		}
		
		function in_prinsip_confirmAdd(){
			in_prinsip_dbTask = 'CREATE';
			in_prinsip_dbTaskMessage = 'created';
			in_prinsip_resetForm();
			in_prinsip_switchToForm();
		}
		
		function in_prinsip_confirmUpdate(){
			if(in_prinsip_gridPanel.selModel.getCount() == 1) {
				in_prinsip_dbTask = 'UPDATE';
				in_prinsip_dbTaskMessage = 'updated';
				in_prinsip_switchToForm();
				in_prinsip_setForm();
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
		
		function in_prinsip_confirmDelete(){
			if(in_prinsip_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, in_prinsip_delete);
			}else if(in_prinsip_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, in_prinsip_delete);
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
		
		function in_prinsip_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(in_prinsip_dbPermission)==false && pattC.test(in_prinsip_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(in_prinsip_confirmFormValid()){
					var ID_IJIN_PRINSIPValue = '';
					var ID_PEMOHONValue = '';
					var NAMA_PERUSAHAANValue = '';
					var NO_SKValue = '';
					var NO_SK_LAMAValue = '';
					var JENIS_PERMOHONANValue = '';
					var NAMA_LOKASIValue = '';
					var LONGITUDEValue = '';
					var LATITUDEValue = '';
					var ALAMAT_LOKASIValue = '';
					var JENIS_TOWERValue = '';
					var FUNGSI_BANGUNANValue = '';
					var JENIS_BANGUNANValue = '';
					var UKURAN_BANGUNANValue = '';
					var TINGGI_BANGUNANValue = '';
					var TIANG_BANGUNANValue = '';
					var PONDASI_BANGUNANValue = '';
										
					ID_IJIN_PRINSIPValue = ID_IJIN_PRINSIPField.getValue();
					ID_PEMOHONValue = ID_PEMOHONField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					NO_SKValue = NO_SKField.getValue();
					NO_SK_LAMAValue = NO_SK_LAMAField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					NAMA_LOKASIValue = NAMA_LOKASIField.getValue();
					LONGITUDEValue = LONGITUDEField.getValue();
					LATITUDEValue = LATITUDEField.getValue();
					ALAMAT_LOKASIValue = ALAMAT_LOKASIField.getValue();
					JENIS_TOWERValue = JENIS_TOWERField.getValue();
					FUNGSI_BANGUNANValue = FUNGSI_BANGUNANField.getValue();
					JENIS_BANGUNANValue = JENIS_BANGUNANField.getValue();
					UKURAN_BANGUNANValue = UKURAN_BANGUNANField.getValue();
					TINGGI_BANGUNANValue = TINGGI_BANGUNANField.getValue();
					TIANG_BANGUNANValue = TIANG_BANGUNANField.getValue();
					PONDASI_BANGUNANValue = PONDASI_BANGUNANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_prinsip/switchAction',
						params: {							
							ID_IJIN_PRINSIP : ID_IJIN_PRINSIPValue,
							ID_PEMOHON : ID_PEMOHONValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							NO_SK : NO_SKValue,
							NO_SK_LAMA : NO_SK_LAMAValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							NAMA_LOKASI : NAMA_LOKASIValue,
							LONGITUDE : LONGITUDEValue,
							LATITUDE : LATITUDEValue,
							ALAMAT_LOKASI : ALAMAT_LOKASIValue,
							JENIS_TOWER : JENIS_TOWERValue,
							FUNGSI_BANGUNAN : FUNGSI_BANGUNANValue,
							JENIS_BANGUNAN : JENIS_BANGUNANValue,
							UKURAN_BANGUNAN : UKURAN_BANGUNANValue,
							TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
							TIANG_BANGUNAN : TIANG_BANGUNANValue,
							PONDASI_BANGUNAN : PONDASI_BANGUNANValue,
							action : in_prinsip_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									in_prinsip_dataStore.reload();
									in_prinsip_resetForm();
									in_prinsip_switchToGrid();
									in_prinsip_gridPanel.getSelectionModel().deselectAll();
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
		
		function in_prinsip_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(in_prinsip_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = in_prinsip_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< in_prinsip_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJIN_PRINSIP);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_ijin_prinsip/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									in_prinsip_dataStore.reload();
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
		
		function in_prinsip_refresh(){
			in_prinsip_dbListAction = "GETLIST";
			in_prinsip_gridSearchField.reset();
			in_prinsip_searchPanel.getForm().reset();
			in_prinsip_dataStore.proxy.extraParams = { action : 'GETLIST' };
			in_prinsip_dataStore.proxy.extraParams.query = "";
			in_prinsip_dataStore.currentPage = 1;
			in_prinsip_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function in_prinsip_confirmFormValid(){
			return in_prinsip_formPanel.getForm().isValid();
		}
		
		function in_prinsip_resetForm(){
			in_prinsip_dbTask = 'CREATE';
			in_prinsip_dbTaskMessage = 'create';
			in_prinsip_formPanel.getForm().reset();
			ID_IJIN_PRINSIPField.setValue(0);
		}
		
		function in_prinsip_setForm(){
			in_prinsip_dbTask = 'UPDATE';
            in_prinsip_dbTaskMessage = 'update';
			
			var record = in_prinsip_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJIN_PRINSIPField.setValue(record.data.ID_IJIN_PRINSIP);
			ID_PEMOHONField.setValue(record.data.ID_PEMOHON);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			NO_SKField.setValue(record.data.NO_SK);
			NO_SK_LAMAField.setValue(record.data.NO_SK_LAMA);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			NAMA_LOKASIField.setValue(record.data.NAMA_LOKASI);
			LONGITUDEField.setValue(record.data.LONGITUDE);
			LATITUDEField.setValue(record.data.LATITUDE);
			ALAMAT_LOKASIField.setValue(record.data.ALAMAT_LOKASI);
			JENIS_TOWERField.setValue(record.data.JENIS_TOWER);
			FUNGSI_BANGUNANField.setValue(record.data.FUNGSI_BANGUNAN);
			JENIS_BANGUNANField.setValue(record.data.JENIS_BANGUNAN);
			UKURAN_BANGUNANField.setValue(record.data.UKURAN_BANGUNAN);
			TINGGI_BANGUNANField.setValue(record.data.TINGGI_BANGUNAN);
			TIANG_BANGUNANField.setValue(record.data.TIANG_BANGUNAN);
			PONDASI_BANGUNANField.setValue(record.data.PONDASI_BANGUNAN);
					}
		
		function in_prinsip_showSearchWindow(){
			in_prinsip_searchWindow.show();
		}
		
		function in_prinsip_search(){
			in_prinsip_gridSearchField.reset();
			
			var ID_PEMOHONValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var JENIS_PERMOHONANValue = '';
			var NAMA_LOKASIValue = '';
			var LONGITUDEValue = '';
			var LATITUDEValue = '';
			var ALAMAT_LOKASIValue = '';
			var JENIS_TOWERValue = '';
			var FUNGSI_BANGUNANValue = '';
			var JENIS_BANGUNANValue = '';
			var UKURAN_BANGUNANValue = '';
			var TINGGI_BANGUNANValue = '';
			var TIANG_BANGUNANValue = '';
			var PONDASI_BANGUNANValue = '';
						
			ID_PEMOHONValue = ID_PEMOHONSearchField.getValue();
			NAMA_PERUSAHAANValue = NAMA_PERUSAHAANSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			NO_SK_LAMAValue = NO_SK_LAMASearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			NAMA_LOKASIValue = NAMA_LOKASISearchField.getValue();
			LONGITUDEValue = LONGITUDESearchField.getValue();
			LATITUDEValue = LATITUDESearchField.getValue();
			ALAMAT_LOKASIValue = ALAMAT_LOKASISearchField.getValue();
			JENIS_TOWERValue = JENIS_TOWERSearchField.getValue();
			FUNGSI_BANGUNANValue = FUNGSI_BANGUNANSearchField.getValue();
			JENIS_BANGUNANValue = JENIS_BANGUNANSearchField.getValue();
			UKURAN_BANGUNANValue = UKURAN_BANGUNANSearchField.getValue();
			TINGGI_BANGUNANValue = TINGGI_BANGUNANSearchField.getValue();
			TIANG_BANGUNANValue = TIANG_BANGUNANSearchField.getValue();
			PONDASI_BANGUNANValue = PONDASI_BANGUNANSearchField.getValue();
			in_prinsip_dbListAction = "SEARCH";
			in_prinsip_dataStore.proxy.extraParams = { 
				ID_PEMOHON : ID_PEMOHONValue,
				NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
				NO_SK : NO_SKValue,
				NO_SK_LAMA : NO_SK_LAMAValue,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				NAMA_LOKASI : NAMA_LOKASIValue,
				LONGITUDE : LONGITUDEValue,
				LATITUDE : LATITUDEValue,
				ALAMAT_LOKASI : ALAMAT_LOKASIValue,
				JENIS_TOWER : JENIS_TOWERValue,
				FUNGSI_BANGUNAN : FUNGSI_BANGUNANValue,
				JENIS_BANGUNAN : JENIS_BANGUNANValue,
				UKURAN_BANGUNAN : UKURAN_BANGUNANValue,
				TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
				TIANG_BANGUNAN : TIANG_BANGUNANValue,
				PONDASI_BANGUNAN : PONDASI_BANGUNANValue,
				action : 'SEARCH'
			};
			in_prinsip_dataStore.currentPage = 1;
			in_prinsip_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function in_prinsip_printExcel(outputType){
			var searchText = "";
			var ID_PEMOHONValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var JENIS_PERMOHONANValue = '';
			var NAMA_LOKASIValue = '';
			var LONGITUDEValue = '';
			var LATITUDEValue = '';
			var ALAMAT_LOKASIValue = '';
			var JENIS_TOWERValue = '';
			var FUNGSI_BANGUNANValue = '';
			var JENIS_BANGUNANValue = '';
			var UKURAN_BANGUNANValue = '';
			var TINGGI_BANGUNANValue = '';
			var TIANG_BANGUNANValue = '';
			var PONDASI_BANGUNANValue = '';
			
			if(in_prinsip_dataStore.proxy.extraParams.query!==null){searchText = in_prinsip_dataStore.proxy.extraParams.query;}
			if(in_prinsip_dataStore.proxy.extraParams.ID_PEMOHON!==null){ID_PEMOHONValue = in_prinsip_dataStore.proxy.extraParams.ID_PEMOHON;}
			if(in_prinsip_dataStore.proxy.extraParams.NAMA_PERUSAHAAN!==null){NAMA_PERUSAHAANValue = in_prinsip_dataStore.proxy.extraParams.NAMA_PERUSAHAAN;}
			if(in_prinsip_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = in_prinsip_dataStore.proxy.extraParams.NO_SK;}
			if(in_prinsip_dataStore.proxy.extraParams.NO_SK_LAMA!==null){NO_SK_LAMAValue = in_prinsip_dataStore.proxy.extraParams.NO_SK_LAMA;}
			if(in_prinsip_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = in_prinsip_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			if(in_prinsip_dataStore.proxy.extraParams.NAMA_LOKASI!==null){NAMA_LOKASIValue = in_prinsip_dataStore.proxy.extraParams.NAMA_LOKASI;}
			if(in_prinsip_dataStore.proxy.extraParams.LONGITUDE!==null){LONGITUDEValue = in_prinsip_dataStore.proxy.extraParams.LONGITUDE;}
			if(in_prinsip_dataStore.proxy.extraParams.LATITUDE!==null){LATITUDEValue = in_prinsip_dataStore.proxy.extraParams.LATITUDE;}
			if(in_prinsip_dataStore.proxy.extraParams.ALAMAT_LOKASI!==null){ALAMAT_LOKASIValue = in_prinsip_dataStore.proxy.extraParams.ALAMAT_LOKASI;}
			if(in_prinsip_dataStore.proxy.extraParams.JENIS_TOWER!==null){JENIS_TOWERValue = in_prinsip_dataStore.proxy.extraParams.JENIS_TOWER;}
			if(in_prinsip_dataStore.proxy.extraParams.FUNGSI_BANGUNAN!==null){FUNGSI_BANGUNANValue = in_prinsip_dataStore.proxy.extraParams.FUNGSI_BANGUNAN;}
			if(in_prinsip_dataStore.proxy.extraParams.JENIS_BANGUNAN!==null){JENIS_BANGUNANValue = in_prinsip_dataStore.proxy.extraParams.JENIS_BANGUNAN;}
			if(in_prinsip_dataStore.proxy.extraParams.UKURAN_BANGUNAN!==null){UKURAN_BANGUNANValue = in_prinsip_dataStore.proxy.extraParams.UKURAN_BANGUNAN;}
			if(in_prinsip_dataStore.proxy.extraParams.TINGGI_BANGUNAN!==null){TINGGI_BANGUNANValue = in_prinsip_dataStore.proxy.extraParams.TINGGI_BANGUNAN;}
			if(in_prinsip_dataStore.proxy.extraParams.TIANG_BANGUNAN!==null){TIANG_BANGUNANValue = in_prinsip_dataStore.proxy.extraParams.TIANG_BANGUNAN;}
			if(in_prinsip_dataStore.proxy.extraParams.PONDASI_BANGUNAN!==null){PONDASI_BANGUNANValue = in_prinsip_dataStore.proxy.extraParams.PONDASI_BANGUNAN;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_ijin_prinsip/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_PEMOHON : ID_PEMOHONValue,
					NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
					NO_SK : NO_SKValue,
					NO_SK_LAMA : NO_SK_LAMAValue,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					NAMA_LOKASI : NAMA_LOKASIValue,
					LONGITUDE : LONGITUDEValue,
					LATITUDE : LATITUDEValue,
					ALAMAT_LOKASI : ALAMAT_LOKASIValue,
					JENIS_TOWER : JENIS_TOWERValue,
					FUNGSI_BANGUNAN : FUNGSI_BANGUNANValue,
					JENIS_BANGUNAN : JENIS_BANGUNANValue,
					UKURAN_BANGUNAN : UKURAN_BANGUNANValue,
					TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
					TIANG_BANGUNAN : TIANG_BANGUNANValue,
					PONDASI_BANGUNAN : PONDASI_BANGUNANValue,
					currentAction : in_prinsip_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/ijin_prinsip_list.xls');
							}else{
								window.open('./print/ijin_prinsip_list.html','in_prinsiplist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		in_prinsip_dataStore = Ext.create('Ext.data.Store',{
			id : 'in_prinsip_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_prinsip/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN_PRINSIP'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN_PRINSIP', type : 'int', mapping : 'ID_IJIN_PRINSIP' },
				{ name : 'ID_PEMOHON', type : 'int', mapping : 'ID_PEMOHON' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'NO_SK_LAMA', type : 'string', mapping : 'NO_SK_LAMA' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				{ name : 'NAMA_LOKASI', type : 'string', mapping : 'NAMA_LOKASI' },
				{ name : 'LONGITUDE', type : 'string', mapping : 'LONGITUDE' },
				{ name : 'LATITUDE', type : 'string', mapping : 'LATITUDE' },
				{ name : 'ALAMAT_LOKASI', type : 'string', mapping : 'ALAMAT_LOKASI' },
				{ name : 'JENIS_TOWER', type : 'string', mapping : 'JENIS_TOWER' },
				{ name : 'FUNGSI_BANGUNAN', type : 'string', mapping : 'FUNGSI_BANGUNAN' },
				{ name : 'JENIS_BANGUNAN', type : 'string', mapping : 'JENIS_BANGUNAN' },
				{ name : 'UKURAN_BANGUNAN', type : 'string', mapping : 'UKURAN_BANGUNAN' },
				{ name : 'TINGGI_BANGUNAN', type : 'float', mapping : 'TINGGI_BANGUNAN' },
				{ name : 'TIANG_BANGUNAN', type : 'string', mapping : 'TIANG_BANGUNAN' },
				{ name : 'PONDASI_BANGUNAN', type : 'string', mapping : 'PONDASI_BANGUNAN' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		in_prinsip_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						in_prinsip_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						in_prinsip_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						in_prinsip_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						in_prinsip_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						in_prinsip_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						in_prinsip_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						in_prinsip_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						in_prinsip_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var in_prinsip_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : in_prinsip_confirmAdd
		});
		var in_prinsip_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : in_prinsip_confirmUpdate
		});
		var in_prinsip_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : in_prinsip_confirmDelete
		});
		var in_prinsip_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : in_prinsip_refresh
		});
		var in_prinsip_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : in_prinsip_showSearchWindow
		});
		var in_prinsip_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				in_prinsip_printExcel('PRINT');
			}
		});
		var in_prinsip_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				in_prinsip_printExcel('EXCEL');
			}
		});
		
		var in_prinsip_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : in_prinsip_confirmUpdate
		});
		var in_prinsip_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : in_prinsip_confirmDelete
		});
		var in_prinsip_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : in_prinsip_refresh
		});
		in_prinsip_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'in_prinsip_contextMenu',
			items: [
				in_prinsip_contextMenuEdit,in_prinsip_contextMenuDelete,'-',in_prinsip_contextMenuRefresh
			]
		});
		
		in_prinsip_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : in_prinsip_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						in_prinsip_dataStore.proxy.extraParams = { action : 'GETLIST'};
						in_prinsip_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		in_prinsip_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'in_prinsip_gridPanel',
			constrain : true,
			store : in_prinsip_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'in_prinsipGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						in_prinsip_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : in_prinsip_shorcut,
			columns : [
				{
					text : 'ID_PEMOHON',
					dataIndex : 'ID_PEMOHON',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_PERUSAHAAN',
					dataIndex : 'NAMA_PERUSAHAAN',
					width : 100,
					sortable : false
				},
				{
					text : 'NO_SK',
					dataIndex : 'NO_SK',
					width : 100,
					sortable : false
				},
				{
					text : 'NO_SK_LAMA',
					dataIndex : 'NO_SK_LAMA',
					width : 100,
					sortable : false
				},
				{
					text : 'JENIS_PERMOHONAN',
					dataIndex : 'JENIS_PERMOHONAN',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_LOKASI',
					dataIndex : 'NAMA_LOKASI',
					width : 100,
					sortable : false
				},
				{
					text : 'LONGITUDE',
					dataIndex : 'LONGITUDE',
					width : 100,
					sortable : false
				},
				{
					text : 'LATITUDE',
					dataIndex : 'LATITUDE',
					width : 100,
					sortable : false
				},
				{
					text : 'ALAMAT_LOKASI',
					dataIndex : 'ALAMAT_LOKASI',
					width : 100,
					sortable : false
				},
				{
					text : 'JENIS_TOWER',
					dataIndex : 'JENIS_TOWER',
					width : 100,
					sortable : false
				},
				{
					text : 'FUNGSI_BANGUNAN',
					dataIndex : 'FUNGSI_BANGUNAN',
					width : 100,
					sortable : false
				},
				{
					text : 'JENIS_BANGUNAN',
					dataIndex : 'JENIS_BANGUNAN',
					width : 100,
					sortable : false
				},
				{
					text : 'UKURAN_BANGUNAN',
					dataIndex : 'UKURAN_BANGUNAN',
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
					text : 'TIANG_BANGUNAN',
					dataIndex : 'TIANG_BANGUNAN',
					width : 100,
					sortable : false
				},
				{
					text : 'PONDASI_BANGUNAN',
					dataIndex : 'PONDASI_BANGUNAN',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				in_prinsip_addButton,
				in_prinsip_editButton,
				in_prinsip_deleteButton,
				in_prinsip_gridSearchField,
				in_prinsip_searchButton,
				in_prinsip_refreshButton,
				in_prinsip_printButton,
				in_prinsip_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : in_prinsip_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					in_prinsip_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_IJIN_PRINSIPField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_PRINSIPField',
			name : 'ID_IJIN_PRINSIP',
			fieldLabel : 'ID_IJIN_PRINSIP<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_PEMOHONField = Ext.create('Ext.form.NumberField',{
			id : 'ID_PEMOHONField',
			name : 'ID_PEMOHON',
			fieldLabel : 'ID_PEMOHON',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		});
		NO_SKField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		});
		NO_SK_LAMAField = Ext.create('Ext.form.TextField',{
			id : 'NO_SK_LAMAField',
			name : 'NO_SK_LAMA',
			fieldLabel : 'NO_SK_LAMA',
			maxLength : 50
		});
		JENIS_PERMOHONANField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NAMA_LOKASIField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_LOKASIField',
			name : 'NAMA_LOKASI',
			fieldLabel : 'NAMA_LOKASI',
			maxLength : 50
		});
		LONGITUDEField = Ext.create('Ext.form.TextField',{
			id : 'LONGITUDEField',
			name : 'LONGITUDE',
			fieldLabel : 'LONGITUDE',
			maxLength : 50
		});
		LATITUDEField = Ext.create('Ext.form.TextField',{
			id : 'LATITUDEField',
			name : 'LATITUDE',
			fieldLabel : 'LATITUDE',
			maxLength : 50
		});
		ALAMAT_LOKASIField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASIField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'ALAMAT_LOKASI',
			maxLength : 100
		});
		JENIS_TOWERField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_TOWERField',
			name : 'JENIS_TOWER',
			fieldLabel : 'JENIS_TOWER',
			maxLength : 50
		});
		FUNGSI_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'FUNGSI_BANGUNANField',
			name : 'FUNGSI_BANGUNAN',
			fieldLabel : 'FUNGSI_BANGUNAN',
			maxLength : 50
		});
		JENIS_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_BANGUNANField',
			name : 'JENIS_BANGUNAN',
			fieldLabel : 'JENIS_BANGUNAN',
			maxLength : 50
		});
		UKURAN_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'UKURAN_BANGUNANField',
			name : 'UKURAN_BANGUNAN',
			fieldLabel : 'UKURAN_BANGUNAN',
			maxLength : 50
		});
		TINGGI_BANGUNANField = Ext.create('Ext.form.NumberField',{
			id : 'TINGGI_BANGUNANField',
			name : 'TINGGI_BANGUNAN',
			fieldLabel : 'TINGGI_BANGUNAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TIANG_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'TIANG_BANGUNANField',
			name : 'TIANG_BANGUNAN',
			fieldLabel : 'TIANG_BANGUNAN',
			maxLength : 50
		});
		PONDASI_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'PONDASI_BANGUNANField',
			name : 'PONDASI_BANGUNAN',
			fieldLabel : 'PONDASI_BANGUNAN',
			maxLength : 50
		});
		var in_prinsip_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : in_prinsip_save
		});
		var in_prinsip_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				in_prinsip_resetForm();
				in_prinsip_switchToGrid();
			}
		});
		in_prinsip_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJIN_PRINSIPField,
						ID_PEMOHONField,
						NAMA_PERUSAHAANField,
						NO_SKField,
						NO_SK_LAMAField,
						JENIS_PERMOHONANField,
						NAMA_LOKASIField,
						LONGITUDEField,
						LATITUDEField,
						ALAMAT_LOKASIField,
						JENIS_TOWERField,
						FUNGSI_BANGUNANField,
						JENIS_BANGUNANField,
						UKURAN_BANGUNANField,
						TINGGI_BANGUNANField,
						TIANG_BANGUNANField,
						PONDASI_BANGUNANField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [in_prinsip_saveButton,in_prinsip_cancelButton]
		});
		in_prinsip_formWindow = Ext.create('Ext.window.Window',{
			id : 'in_prinsip_formWindow',
			renderTo : 'in_prinsipSaveWindow',
			title : globalFormAddEditTitle + ' ' + in_prinsip_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [in_prinsip_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_PEMOHONSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_PEMOHONSearchField',
			name : 'ID_PEMOHON',
			fieldLabel : 'ID_PEMOHON',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NAMA_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANSearchField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		
		});
		NO_SKSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKSearchField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		
		});
		NO_SK_LAMASearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SK_LAMASearchField',
			name : 'NO_SK_LAMA',
			fieldLabel : 'NO_SK_LAMA',
			maxLength : 50
		
		});
		JENIS_PERMOHONANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANSearchField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NAMA_LOKASISearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_LOKASISearchField',
			name : 'NAMA_LOKASI',
			fieldLabel : 'NAMA_LOKASI',
			maxLength : 50
		
		});
		LONGITUDESearchField = Ext.create('Ext.form.TextField',{
			id : 'LONGITUDESearchField',
			name : 'LONGITUDE',
			fieldLabel : 'LONGITUDE',
			maxLength : 50
		
		});
		LATITUDESearchField = Ext.create('Ext.form.TextField',{
			id : 'LATITUDESearchField',
			name : 'LATITUDE',
			fieldLabel : 'LATITUDE',
			maxLength : 50
		
		});
		ALAMAT_LOKASISearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASISearchField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'ALAMAT_LOKASI',
			maxLength : 100
		
		});
		JENIS_TOWERSearchField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_TOWERSearchField',
			name : 'JENIS_TOWER',
			fieldLabel : 'JENIS_TOWER',
			maxLength : 50
		
		});
		FUNGSI_BANGUNANSearchField = Ext.create('Ext.form.TextField',{
			id : 'FUNGSI_BANGUNANSearchField',
			name : 'FUNGSI_BANGUNAN',
			fieldLabel : 'FUNGSI_BANGUNAN',
			maxLength : 50
		
		});
		JENIS_BANGUNANSearchField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_BANGUNANSearchField',
			name : 'JENIS_BANGUNAN',
			fieldLabel : 'JENIS_BANGUNAN',
			maxLength : 50
		
		});
		UKURAN_BANGUNANSearchField = Ext.create('Ext.form.TextField',{
			id : 'UKURAN_BANGUNANSearchField',
			name : 'UKURAN_BANGUNAN',
			fieldLabel : 'UKURAN_BANGUNAN',
			maxLength : 50
		
		});
		TINGGI_BANGUNANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'TINGGI_BANGUNANSearchField',
			name : 'TINGGI_BANGUNAN',
			fieldLabel : 'TINGGI_BANGUNAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TIANG_BANGUNANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TIANG_BANGUNANSearchField',
			name : 'TIANG_BANGUNAN',
			fieldLabel : 'TIANG_BANGUNAN',
			maxLength : 50
		
		});
		PONDASI_BANGUNANSearchField = Ext.create('Ext.form.TextField',{
			id : 'PONDASI_BANGUNANSearchField',
			name : 'PONDASI_BANGUNAN',
			fieldLabel : 'PONDASI_BANGUNAN',
			maxLength : 50
		
		});
		var in_prinsip_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : in_prinsip_search
		});
		var in_prinsip_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				in_prinsip_searchWindow.hide();
			}
		});
		in_prinsip_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_PEMOHONSearchField,
						NAMA_PERUSAHAANSearchField,
						NO_SKSearchField,
						NO_SK_LAMASearchField,
						JENIS_PERMOHONANSearchField,
						NAMA_LOKASISearchField,
						LONGITUDESearchField,
						LATITUDESearchField,
						ALAMAT_LOKASISearchField,
						JENIS_TOWERSearchField,
						FUNGSI_BANGUNANSearchField,
						JENIS_BANGUNANSearchField,
						UKURAN_BANGUNANSearchField,
						TINGGI_BANGUNANSearchField,
						TIANG_BANGUNANSearchField,
						PONDASI_BANGUNANSearchField,
						]
				}],
			buttons : [in_prinsip_searchingButton,in_prinsip_cancelSearchButton]
		});
		in_prinsip_searchWindow = Ext.create('Ext.window.Window',{
			id : 'in_prinsip_searchWindow',
			renderTo : 'in_prinsipSearchWindow',
			title : globalFormSearchTitle + ' ' + in_prinsip_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [in_prinsip_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="in_prinsipSaveWindow"></div>
<div id="in_prinsipSearchWindow"></div>
<div class="span12" id="in_prinsipGrid"></div>