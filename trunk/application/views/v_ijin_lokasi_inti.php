<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var in_lokasi_inti_componentItemTitle="IN_LOKASI_INTI";
		var in_lokasi_inti_dataStore;
		
		var in_lokasi_inti_shorcut;
		var in_lokasi_inti_contextMenu;
		var in_lokasi_inti_gridSearchField;
		var in_lokasi_inti_gridPanel;
		var in_lokasi_inti_formPanel;
		var in_lokasi_inti_formWindow;
		var in_lokasi_inti_searchPanel;
		var in_lokasi_inti_searchWindow;
		
		var ID_IJIN_LOKASI_INTIField;
		var NPWPDField;
		var NAMA_PERUSAHAANField;
		var NO_AKTEField;
		var BENTUK_PERUSAHAANField;
		var ALAMATField;
		var ID_DESAField;
		var ID_KECAMATANField;
		var ID_KOTAField;
		var TELEPONField;
		var PERUNTUKANField;
		var STATUS_TANAHField;
		var KETERANGAN_STATUSField;
		var LUAS_TANAHField;
		var ALAMAT_LETAK_TANAHField;
		var ID_DESA_LETAKField;
		var ID_KECAMATAN_LETAKField;
				
		var NPWPDSearchField;
		var NAMA_PERUSAHAANSearchField;
		var NO_AKTESearchField;
		var BENTUK_PERUSAHAANSearchField;
		var ALAMATSearchField;
		var ID_DESASearchField;
		var ID_KECAMATANSearchField;
		var ID_KOTASearchField;
		var TELEPONSearchField;
		var PERUNTUKANSearchField;
		var STATUS_TANAHSearchField;
		var KETERANGAN_STATUSSearchField;
		var LUAS_TANAHSearchField;
		var ALAMAT_LETAK_TANAHSearchField;
		var ID_DESA_LETAKSearchField;
		var ID_KECAMATAN_LETAKSearchField;
				
		var in_lokasi_inti_dbTask = 'CREATE';
		var in_lokasi_inti_dbTaskMessage = 'Tambah';
		var in_lokasi_inti_dbPermission = 'CRUD';
		var in_lokasi_inti_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function in_lokasi_inti_switchToGrid(){
			in_lokasi_inti_formPanel.setDisabled(true);
			in_lokasi_inti_gridPanel.setDisabled(false);
			in_lokasi_inti_formWindow.hide();
		}
		
		function in_lokasi_inti_switchToForm(){
			in_lokasi_inti_gridPanel.setDisabled(true);
			in_lokasi_inti_formPanel.setDisabled(false);
			in_lokasi_inti_formWindow.show();
		}
		
		function in_lokasi_inti_confirmAdd(){
			in_lokasi_inti_dbTask = 'CREATE';
			in_lokasi_inti_dbTaskMessage = 'created';
			in_lokasi_inti_resetForm();
			in_lokasi_inti_switchToForm();
		}
		
		function in_lokasi_inti_confirmUpdate(){
			if(in_lokasi_inti_gridPanel.selModel.getCount() == 1) {
				in_lokasi_inti_dbTask = 'UPDATE';
				in_lokasi_inti_dbTaskMessage = 'updated';
				in_lokasi_inti_switchToForm();
				in_lokasi_inti_setForm();
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
		
		function in_lokasi_inti_confirmDelete(){
			if(in_lokasi_inti_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, in_lokasi_inti_delete);
			}else if(in_lokasi_inti_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, in_lokasi_inti_delete);
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
		
		function in_lokasi_inti_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(in_lokasi_inti_dbPermission)==false && pattC.test(in_lokasi_inti_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(in_lokasi_inti_confirmFormValid()){
					var ID_IJIN_LOKASI_INTIValue = '';
					var NPWPDValue = '';
					var NAMA_PERUSAHAANValue = '';
					var NO_AKTEValue = '';
					var BENTUK_PERUSAHAANValue = '';
					var ALAMATValue = '';
					var ID_DESAValue = '';
					var ID_KECAMATANValue = '';
					var ID_KOTAValue = '';
					var TELEPONValue = '';
					var PERUNTUKANValue = '';
					var STATUS_TANAHValue = '';
					var KETERANGAN_STATUSValue = '';
					var LUAS_TANAHValue = '';
					var ALAMAT_LETAK_TANAHValue = '';
					var ID_DESA_LETAKValue = '';
					var ID_KECAMATAN_LETAKValue = '';
										
					ID_IJIN_LOKASI_INTIValue = ID_IJIN_LOKASI_INTIField.getValue();
					NPWPDValue = NPWPDField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					NO_AKTEValue = NO_AKTEField.getValue();
					BENTUK_PERUSAHAANValue = BENTUK_PERUSAHAANField.getValue();
					ALAMATValue = ALAMATField.getValue();
					ID_DESAValue = ID_DESAField.getValue();
					ID_KECAMATANValue = ID_KECAMATANField.getValue();
					ID_KOTAValue = ID_KOTAField.getValue();
					TELEPONValue = TELEPONField.getValue();
					PERUNTUKANValue = PERUNTUKANField.getValue();
					STATUS_TANAHValue = STATUS_TANAHField.getValue();
					KETERANGAN_STATUSValue = KETERANGAN_STATUSField.getValue();
					LUAS_TANAHValue = LUAS_TANAHField.getValue();
					ALAMAT_LETAK_TANAHValue = ALAMAT_LETAK_TANAHField.getValue();
					ID_DESA_LETAKValue = ID_DESA_LETAKField.getValue();
					ID_KECAMATAN_LETAKValue = ID_KECAMATAN_LETAKField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_lokasi_inti/switchAction',
						params: {							
							ID_IJIN_LOKASI_INTI : ID_IJIN_LOKASI_INTIValue,
							NPWPD : NPWPDValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							NO_AKTE : NO_AKTEValue,
							BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
							ALAMAT : ALAMATValue,
							ID_DESA : ID_DESAValue,
							ID_KECAMATAN : ID_KECAMATANValue,
							ID_KOTA : ID_KOTAValue,
							TELEPON : TELEPONValue,
							PERUNTUKAN : PERUNTUKANValue,
							STATUS_TANAH : STATUS_TANAHValue,
							KETERANGAN_STATUS : KETERANGAN_STATUSValue,
							LUAS_TANAH : LUAS_TANAHValue,
							ALAMAT_LETAK_TANAH : ALAMAT_LETAK_TANAHValue,
							ID_DESA_LETAK : ID_DESA_LETAKValue,
							ID_KECAMATAN_LETAK : ID_KECAMATAN_LETAKValue,
							action : in_lokasi_inti_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									in_lokasi_inti_dataStore.reload();
									in_lokasi_inti_resetForm();
									in_lokasi_inti_switchToGrid();
									in_lokasi_inti_gridPanel.getSelectionModel().deselectAll();
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
		
		function in_lokasi_inti_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(in_lokasi_inti_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = in_lokasi_inti_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< in_lokasi_inti_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJIN_LOKASI_INTI);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_ijin_lokasi_inti/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									in_lokasi_inti_dataStore.reload();
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
		
		function in_lokasi_inti_refresh(){
			in_lokasi_inti_dbListAction = "GETLIST";
			in_lokasi_inti_gridSearchField.reset();
			in_lokasi_inti_searchPanel.getForm().reset();
			in_lokasi_inti_dataStore.proxy.extraParams = { action : 'GETLIST' };
			in_lokasi_inti_dataStore.proxy.extraParams.query = "";
			in_lokasi_inti_dataStore.currentPage = 1;
			in_lokasi_inti_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function in_lokasi_inti_confirmFormValid(){
			return in_lokasi_inti_formPanel.getForm().isValid();
		}
		
		function in_lokasi_inti_resetForm(){
			in_lokasi_inti_dbTask = 'CREATE';
			in_lokasi_inti_dbTaskMessage = 'create';
			in_lokasi_inti_formPanel.getForm().reset();
			ID_IJIN_LOKASI_INTIField.setValue(0);
		}
		
		function in_lokasi_inti_setForm(){
			in_lokasi_inti_dbTask = 'UPDATE';
            in_lokasi_inti_dbTaskMessage = 'update';
			
			var record = in_lokasi_inti_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJIN_LOKASI_INTIField.setValue(record.data.ID_IJIN_LOKASI_INTI);
			NPWPDField.setValue(record.data.NPWPD);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			NO_AKTEField.setValue(record.data.NO_AKTE);
			BENTUK_PERUSAHAANField.setValue(record.data.BENTUK_PERUSAHAAN);
			ALAMATField.setValue(record.data.ALAMAT);
			ID_DESAField.setValue(record.data.ID_DESA);
			ID_KECAMATANField.setValue(record.data.ID_KECAMATAN);
			ID_KOTAField.setValue(record.data.ID_KOTA);
			TELEPONField.setValue(record.data.TELEPON);
			PERUNTUKANField.setValue(record.data.PERUNTUKAN);
			STATUS_TANAHField.setValue(record.data.STATUS_TANAH);
			KETERANGAN_STATUSField.setValue(record.data.KETERANGAN_STATUS);
			LUAS_TANAHField.setValue(record.data.LUAS_TANAH);
			ALAMAT_LETAK_TANAHField.setValue(record.data.ALAMAT_LETAK_TANAH);
			ID_DESA_LETAKField.setValue(record.data.ID_DESA_LETAK);
			ID_KECAMATAN_LETAKField.setValue(record.data.ID_KECAMATAN_LETAK);
					}
		
		function in_lokasi_inti_showSearchWindow(){
			in_lokasi_inti_searchWindow.show();
		}
		
		function in_lokasi_inti_search(){
			in_lokasi_inti_gridSearchField.reset();
			
			var NPWPDValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NO_AKTEValue = '';
			var BENTUK_PERUSAHAANValue = '';
			var ALAMATValue = '';
			var ID_DESAValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var TELEPONValue = '';
			var PERUNTUKANValue = '';
			var STATUS_TANAHValue = '';
			var KETERANGAN_STATUSValue = '';
			var LUAS_TANAHValue = '';
			var ALAMAT_LETAK_TANAHValue = '';
			var ID_DESA_LETAKValue = '';
			var ID_KECAMATAN_LETAKValue = '';
						
			NPWPDValue = NPWPDSearchField.getValue();
			NAMA_PERUSAHAANValue = NAMA_PERUSAHAANSearchField.getValue();
			NO_AKTEValue = NO_AKTESearchField.getValue();
			BENTUK_PERUSAHAANValue = BENTUK_PERUSAHAANSearchField.getValue();
			ALAMATValue = ALAMATSearchField.getValue();
			ID_DESAValue = ID_DESASearchField.getValue();
			ID_KECAMATANValue = ID_KECAMATANSearchField.getValue();
			ID_KOTAValue = ID_KOTASearchField.getValue();
			TELEPONValue = TELEPONSearchField.getValue();
			PERUNTUKANValue = PERUNTUKANSearchField.getValue();
			STATUS_TANAHValue = STATUS_TANAHSearchField.getValue();
			KETERANGAN_STATUSValue = KETERANGAN_STATUSSearchField.getValue();
			LUAS_TANAHValue = LUAS_TANAHSearchField.getValue();
			ALAMAT_LETAK_TANAHValue = ALAMAT_LETAK_TANAHSearchField.getValue();
			ID_DESA_LETAKValue = ID_DESA_LETAKSearchField.getValue();
			ID_KECAMATAN_LETAKValue = ID_KECAMATAN_LETAKSearchField.getValue();
			in_lokasi_inti_dbListAction = "SEARCH";
			in_lokasi_inti_dataStore.proxy.extraParams = { 
				NPWPD : NPWPDValue,
				NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
				NO_AKTE : NO_AKTEValue,
				BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
				ALAMAT : ALAMATValue,
				ID_DESA : ID_DESAValue,
				ID_KECAMATAN : ID_KECAMATANValue,
				ID_KOTA : ID_KOTAValue,
				TELEPON : TELEPONValue,
				PERUNTUKAN : PERUNTUKANValue,
				STATUS_TANAH : STATUS_TANAHValue,
				KETERANGAN_STATUS : KETERANGAN_STATUSValue,
				LUAS_TANAH : LUAS_TANAHValue,
				ALAMAT_LETAK_TANAH : ALAMAT_LETAK_TANAHValue,
				ID_DESA_LETAK : ID_DESA_LETAKValue,
				ID_KECAMATAN_LETAK : ID_KECAMATAN_LETAKValue,
				action : 'SEARCH'
			};
			in_lokasi_inti_dataStore.currentPage = 1;
			in_lokasi_inti_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function in_lokasi_inti_printExcel(outputType){
			var searchText = "";
			var NPWPDValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NO_AKTEValue = '';
			var BENTUK_PERUSAHAANValue = '';
			var ALAMATValue = '';
			var ID_DESAValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var TELEPONValue = '';
			var PERUNTUKANValue = '';
			var STATUS_TANAHValue = '';
			var KETERANGAN_STATUSValue = '';
			var LUAS_TANAHValue = '';
			var ALAMAT_LETAK_TANAHValue = '';
			var ID_DESA_LETAKValue = '';
			var ID_KECAMATAN_LETAKValue = '';
			
			if(in_lokasi_inti_dataStore.proxy.extraParams.query!==null){searchText = in_lokasi_inti_dataStore.proxy.extraParams.query;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.NPWPD!==null){NPWPDValue = in_lokasi_inti_dataStore.proxy.extraParams.NPWPD;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.NAMA_PERUSAHAAN!==null){NAMA_PERUSAHAANValue = in_lokasi_inti_dataStore.proxy.extraParams.NAMA_PERUSAHAAN;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.NO_AKTE!==null){NO_AKTEValue = in_lokasi_inti_dataStore.proxy.extraParams.NO_AKTE;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.BENTUK_PERUSAHAAN!==null){BENTUK_PERUSAHAANValue = in_lokasi_inti_dataStore.proxy.extraParams.BENTUK_PERUSAHAAN;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.ALAMAT!==null){ALAMATValue = in_lokasi_inti_dataStore.proxy.extraParams.ALAMAT;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.ID_DESA!==null){ID_DESAValue = in_lokasi_inti_dataStore.proxy.extraParams.ID_DESA;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.ID_KECAMATAN!==null){ID_KECAMATANValue = in_lokasi_inti_dataStore.proxy.extraParams.ID_KECAMATAN;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.ID_KOTA!==null){ID_KOTAValue = in_lokasi_inti_dataStore.proxy.extraParams.ID_KOTA;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.TELEPON!==null){TELEPONValue = in_lokasi_inti_dataStore.proxy.extraParams.TELEPON;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.PERUNTUKAN!==null){PERUNTUKANValue = in_lokasi_inti_dataStore.proxy.extraParams.PERUNTUKAN;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.STATUS_TANAH!==null){STATUS_TANAHValue = in_lokasi_inti_dataStore.proxy.extraParams.STATUS_TANAH;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.KETERANGAN_STATUS!==null){KETERANGAN_STATUSValue = in_lokasi_inti_dataStore.proxy.extraParams.KETERANGAN_STATUS;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.LUAS_TANAH!==null){LUAS_TANAHValue = in_lokasi_inti_dataStore.proxy.extraParams.LUAS_TANAH;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.ALAMAT_LETAK_TANAH!==null){ALAMAT_LETAK_TANAHValue = in_lokasi_inti_dataStore.proxy.extraParams.ALAMAT_LETAK_TANAH;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.ID_DESA_LETAK!==null){ID_DESA_LETAKValue = in_lokasi_inti_dataStore.proxy.extraParams.ID_DESA_LETAK;}
			if(in_lokasi_inti_dataStore.proxy.extraParams.ID_KECAMATAN_LETAK!==null){ID_KECAMATAN_LETAKValue = in_lokasi_inti_dataStore.proxy.extraParams.ID_KECAMATAN_LETAK;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_ijin_lokasi_inti/switchAction',
				params : {
					action : outputType,
					query : searchText,
					NPWPD : NPWPDValue,
					NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
					NO_AKTE : NO_AKTEValue,
					BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
					ALAMAT : ALAMATValue,
					ID_DESA : ID_DESAValue,
					ID_KECAMATAN : ID_KECAMATANValue,
					ID_KOTA : ID_KOTAValue,
					TELEPON : TELEPONValue,
					PERUNTUKAN : PERUNTUKANValue,
					STATUS_TANAH : STATUS_TANAHValue,
					KETERANGAN_STATUS : KETERANGAN_STATUSValue,
					LUAS_TANAH : LUAS_TANAHValue,
					ALAMAT_LETAK_TANAH : ALAMAT_LETAK_TANAHValue,
					ID_DESA_LETAK : ID_DESA_LETAKValue,
					ID_KECAMATAN_LETAK : ID_KECAMATAN_LETAKValue,
					currentAction : in_lokasi_inti_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/ijin_lokasi_inti_list.xls');
							}else{
								window.open('./print/ijin_lokasi_inti_list.html','in_lokasi_intilist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		in_lokasi_inti_dataStore = Ext.create('Ext.data.Store',{
			id : 'in_lokasi_inti_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_lokasi_inti/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN_LOKASI_INTI'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN_LOKASI_INTI', type : 'int', mapping : 'ID_IJIN_LOKASI_INTI' },
				{ name : 'NPWPD', type : 'string', mapping : 'NPWPD' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'NO_AKTE', type : 'string', mapping : 'NO_AKTE' },
				{ name : 'BENTUK_PERUSAHAAN', type : 'string', mapping : 'BENTUK_PERUSAHAAN' },
				{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
				{ name : 'ID_DESA', type : 'int', mapping : 'ID_DESA' },
				{ name : 'ID_KECAMATAN', type : 'int', mapping : 'ID_KECAMATAN' },
				{ name : 'ID_KOTA', type : 'int', mapping : 'ID_KOTA' },
				{ name : 'TELEPON', type : 'string', mapping : 'TELEPON' },
				{ name : 'PERUNTUKAN', type : , mapping : 'PERUNTUKAN' },
				{ name : 'STATUS_TANAH', type : 'int', mapping : 'STATUS_TANAH' },
				{ name : 'KETERANGAN_STATUS', type : , mapping : 'KETERANGAN_STATUS' },
				{ name : 'LUAS_TANAH', type : 'float', mapping : 'LUAS_TANAH' },
				{ name : 'ALAMAT_LETAK_TANAH', type : 'string', mapping : 'ALAMAT_LETAK_TANAH' },
				{ name : 'ID_DESA_LETAK', type : 'int', mapping : 'ID_DESA_LETAK' },
				{ name : 'ID_KECAMATAN_LETAK', type : 'int', mapping : 'ID_KECAMATAN_LETAK' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		in_lokasi_inti_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						in_lokasi_inti_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						in_lokasi_inti_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						in_lokasi_inti_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						in_lokasi_inti_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						in_lokasi_inti_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						in_lokasi_inti_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						in_lokasi_inti_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						in_lokasi_inti_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var in_lokasi_inti_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : in_lokasi_inti_confirmAdd
		});
		var in_lokasi_inti_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : in_lokasi_inti_confirmUpdate
		});
		var in_lokasi_inti_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : in_lokasi_inti_confirmDelete
		});
		var in_lokasi_inti_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : in_lokasi_inti_refresh
		});
		var in_lokasi_inti_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : in_lokasi_inti_showSearchWindow
		});
		var in_lokasi_inti_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				in_lokasi_inti_printExcel('PRINT');
			}
		});
		var in_lokasi_inti_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				in_lokasi_inti_printExcel('EXCEL');
			}
		});
		
		var in_lokasi_inti_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : in_lokasi_inti_confirmUpdate
		});
		var in_lokasi_inti_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : in_lokasi_inti_confirmDelete
		});
		var in_lokasi_inti_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : in_lokasi_inti_refresh
		});
		in_lokasi_inti_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'in_lokasi_inti_contextMenu',
			items: [
				in_lokasi_inti_contextMenuEdit,in_lokasi_inti_contextMenuDelete,'-',in_lokasi_inti_contextMenuRefresh
			]
		});
		
		in_lokasi_inti_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : in_lokasi_inti_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						in_lokasi_inti_dataStore.proxy.extraParams = { action : 'GETLIST'};
						in_lokasi_inti_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		in_lokasi_inti_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'in_lokasi_inti_gridPanel',
			constrain : true,
			store : in_lokasi_inti_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'in_lokasi_intiGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						in_lokasi_inti_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : in_lokasi_inti_shorcut,
			columns : [
				{
					text : 'NPWPD',
					dataIndex : 'NPWPD',
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
					text : 'NO_AKTE',
					dataIndex : 'NO_AKTE',
					width : 100,
					sortable : false
				},
				{
					text : 'BENTUK_PERUSAHAAN',
					dataIndex : 'BENTUK_PERUSAHAAN',
					width : 100,
					sortable : false
				},
				{
					text : 'ALAMAT',
					dataIndex : 'ALAMAT',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_DESA',
					dataIndex : 'ID_DESA',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_KECAMATAN',
					dataIndex : 'ID_KECAMATAN',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_KOTA',
					dataIndex : 'ID_KOTA',
					width : 100,
					sortable : false
				},
				{
					text : 'TELEPON',
					dataIndex : 'TELEPON',
					width : 100,
					sortable : false
				},
				{
					text : 'PERUNTUKAN',
					dataIndex : 'PERUNTUKAN',
					width : 100,
					sortable : false
				},
				{
					text : 'STATUS_TANAH',
					dataIndex : 'STATUS_TANAH',
					width : 100,
					sortable : false
				},
				{
					text : 'KETERANGAN_STATUS',
					dataIndex : 'KETERANGAN_STATUS',
					width : 100,
					sortable : false
				},
				{
					text : 'LUAS_TANAH',
					dataIndex : 'LUAS_TANAH',
					width : 100,
					sortable : false
				},
				{
					text : 'ALAMAT_LETAK_TANAH',
					dataIndex : 'ALAMAT_LETAK_TANAH',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_DESA_LETAK',
					dataIndex : 'ID_DESA_LETAK',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_KECAMATAN_LETAK',
					dataIndex : 'ID_KECAMATAN_LETAK',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				in_lokasi_inti_addButton,
				in_lokasi_inti_editButton,
				in_lokasi_inti_deleteButton,
				in_lokasi_inti_gridSearchField,
				in_lokasi_inti_searchButton,
				in_lokasi_inti_refreshButton,
				in_lokasi_inti_printButton,
				in_lokasi_inti_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : in_lokasi_inti_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					in_lokasi_inti_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_IJIN_LOKASI_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LOKASI_INTIField',
			name : 'ID_IJIN_LOKASI_INTI',
			fieldLabel : 'ID_IJIN_LOKASI_INTI<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		NPWPDField = Ext.create('Ext.form.TextField',{
			id : 'NPWPDField',
			name : 'NPWPD',
			fieldLabel : 'NPWPD',
			maxLength : 50
		});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		});
		NO_AKTEField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTEField',
			name : 'NO_AKTE',
			fieldLabel : 'NO_AKTE',
			maxLength : 50
		});
		BENTUK_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'BENTUK_PERUSAHAANField',
			name : 'BENTUK_PERUSAHAAN',
			fieldLabel : 'BENTUK_PERUSAHAAN',
			maxLength : 50
		});
		ALAMATField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 200
		});
		ID_DESAField = Ext.create('Ext.form.NumberField',{
			id : 'ID_DESAField',
			name : 'ID_DESA',
			fieldLabel : 'ID_DESA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KECAMATANField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATANField',
			name : 'ID_KECAMATAN',
			fieldLabel : 'ID_KECAMATAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KOTAField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTAField',
			name : 'ID_KOTA',
			fieldLabel : 'ID_KOTA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TELEPONField = Ext.create('Ext.form.TextField',{
			id : 'TELEPONField',
			name : 'TELEPON',
			fieldLabel : 'TELEPON',
			maxLength : 20
		});
		PERUNTUKANField = Ext.create('Ext.form.TextField',{
			id : 'PERUNTUKANField',
			name : 'PERUNTUKAN',
			fieldLabel : 'PERUNTUKAN',
			maxLength : 65535
		});
		STATUS_TANAHField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_TANAHField',
			name : 'STATUS_TANAH',
			fieldLabel : 'STATUS_TANAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		KETERANGAN_STATUSField = Ext.create('Ext.form.TextField',{
			id : 'KETERANGAN_STATUSField',
			name : 'KETERANGAN_STATUS',
			fieldLabel : 'KETERANGAN_STATUS',
			maxLength : 65535
		});
		LUAS_TANAHField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_TANAHField',
			name : 'LUAS_TANAH',
			fieldLabel : 'LUAS_TANAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ALAMAT_LETAK_TANAHField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LETAK_TANAHField',
			name : 'ALAMAT_LETAK_TANAH',
			fieldLabel : 'ALAMAT_LETAK_TANAH',
			maxLength : 200
		});
		ID_DESA_LETAKField = Ext.create('Ext.form.NumberField',{
			id : 'ID_DESA_LETAKField',
			name : 'ID_DESA_LETAK',
			fieldLabel : 'ID_DESA_LETAK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KECAMATAN_LETAKField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATAN_LETAKField',
			name : 'ID_KECAMATAN_LETAK',
			fieldLabel : 'ID_KECAMATAN_LETAK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var in_lokasi_inti_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : in_lokasi_inti_save
		});
		var in_lokasi_inti_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				in_lokasi_inti_resetForm();
				in_lokasi_inti_switchToGrid();
			}
		});
		in_lokasi_inti_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJIN_LOKASI_INTIField,
						NPWPDField,
						NAMA_PERUSAHAANField,
						NO_AKTEField,
						BENTUK_PERUSAHAANField,
						ALAMATField,
						ID_DESAField,
						ID_KECAMATANField,
						ID_KOTAField,
						TELEPONField,
						PERUNTUKANField,
						STATUS_TANAHField,
						KETERANGAN_STATUSField,
						LUAS_TANAHField,
						ALAMAT_LETAK_TANAHField,
						ID_DESA_LETAKField,
						ID_KECAMATAN_LETAKField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [in_lokasi_inti_saveButton,in_lokasi_inti_cancelButton]
		});
		in_lokasi_inti_formWindow = Ext.create('Ext.window.Window',{
			id : 'in_lokasi_inti_formWindow',
			renderTo : 'in_lokasi_intiSaveWindow',
			title : globalFormAddEditTitle + ' ' + in_lokasi_inti_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [in_lokasi_inti_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		NPWPDSearchField = Ext.create('Ext.form.TextField',{
			id : 'NPWPDSearchField',
			name : 'NPWPD',
			fieldLabel : 'NPWPD',
			maxLength : 50
		
		});
		NAMA_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANSearchField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		
		});
		NO_AKTESearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTESearchField',
			name : 'NO_AKTE',
			fieldLabel : 'NO_AKTE',
			maxLength : 50
		
		});
		BENTUK_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'BENTUK_PERUSAHAANSearchField',
			name : 'BENTUK_PERUSAHAAN',
			fieldLabel : 'BENTUK_PERUSAHAAN',
			maxLength : 50
		
		});
		ALAMATSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATSearchField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 200
		
		});
		ID_DESASearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_DESASearchField',
			name : 'ID_DESA',
			fieldLabel : 'ID_DESA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KECAMATANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATANSearchField',
			name : 'ID_KECAMATAN',
			fieldLabel : 'ID_KECAMATAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KOTASearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTASearchField',
			name : 'ID_KOTA',
			fieldLabel : 'ID_KOTA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TELEPONSearchField = Ext.create('Ext.form.TextField',{
			id : 'TELEPONSearchField',
			name : 'TELEPON',
			fieldLabel : 'TELEPON',
			maxLength : 20
		
		});
		PERUNTUKANSearchField = Ext.create('Ext.form.TextField',{
			id : 'PERUNTUKANSearchField',
			name : 'PERUNTUKAN',
			fieldLabel : 'PERUNTUKAN',
			maxLength : 65535
		
		});
		STATUS_TANAHSearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_TANAHSearchField',
			name : 'STATUS_TANAH',
			fieldLabel : 'STATUS_TANAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		KETERANGAN_STATUSSearchField = Ext.create('Ext.form.TextField',{
			id : 'KETERANGAN_STATUSSearchField',
			name : 'KETERANGAN_STATUS',
			fieldLabel : 'KETERANGAN_STATUS',
			maxLength : 65535
		
		});
		LUAS_TANAHSearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_TANAHSearchField',
			name : 'LUAS_TANAH',
			fieldLabel : 'LUAS_TANAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ALAMAT_LETAK_TANAHSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LETAK_TANAHSearchField',
			name : 'ALAMAT_LETAK_TANAH',
			fieldLabel : 'ALAMAT_LETAK_TANAH',
			maxLength : 200
		
		});
		ID_DESA_LETAKSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_DESA_LETAKSearchField',
			name : 'ID_DESA_LETAK',
			fieldLabel : 'ID_DESA_LETAK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KECAMATAN_LETAKSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATAN_LETAKSearchField',
			name : 'ID_KECAMATAN_LETAK',
			fieldLabel : 'ID_KECAMATAN_LETAK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var in_lokasi_inti_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : in_lokasi_inti_search
		});
		var in_lokasi_inti_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				in_lokasi_inti_searchWindow.hide();
			}
		});
		in_lokasi_inti_searchPanel = Ext.create('Ext.form.Panel', {
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
						NPWPDSearchField,
						NAMA_PERUSAHAANSearchField,
						NO_AKTESearchField,
						BENTUK_PERUSAHAANSearchField,
						ALAMATSearchField,
						ID_DESASearchField,
						ID_KECAMATANSearchField,
						ID_KOTASearchField,
						TELEPONSearchField,
						PERUNTUKANSearchField,
						STATUS_TANAHSearchField,
						KETERANGAN_STATUSSearchField,
						LUAS_TANAHSearchField,
						ALAMAT_LETAK_TANAHSearchField,
						ID_DESA_LETAKSearchField,
						ID_KECAMATAN_LETAKSearchField,
						]
				}],
			buttons : [in_lokasi_inti_searchingButton,in_lokasi_inti_cancelSearchButton]
		});
		in_lokasi_inti_searchWindow = Ext.create('Ext.window.Window',{
			id : 'in_lokasi_inti_searchWindow',
			renderTo : 'in_lokasi_intiSearchWindow',
			title : globalFormSearchTitle + ' ' + in_lokasi_inti_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [in_lokasi_inti_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="in_lokasi_intiSaveWindow"></div>
<div id="in_lokasi_intiSearchWindow"></div>
<div class="span12" id="in_lokasi_intiGrid"></div>