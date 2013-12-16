<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var in_lingkungan_componentItemTitle="IN_LINGKUNGAN";
		var in_lingkungan_dataStore;
		
		var in_lingkungan_shorcut;
		var in_lingkungan_contextMenu;
		var in_lingkungan_gridSearchField;
		var in_lingkungan_gridPanel;
		var in_lingkungan_formPanel;
		var in_lingkungan_formWindow;
		var in_lingkungan_searchPanel;
		var in_lingkungan_searchWindow;
		
		var ID_IJIN_LINGUKANGANField;
		var ID_IJIN_LINGKUNGAN_INTIField;
		var NO_KTPField;
		var NAMA_LENGKAPField;
		var TEMPAT_LAHIRField;
		var TANGGAL_LAHIRField;
		var KEWARGANEGARAANField;
		var ALAMATField;
		var ID_KELURAHANField;
		var ID_KECAMATANField;
		var ID_KOTAField;
		var TELPField;
		var NPWPField;
		var NAMA_PERUSAHAANField;
		var NAMA_DIREKTURField;
		var NO_AKTEField;
		var BENTUK_PERUSAHAANField;
		var ALAMAT_PERUSAHAANField;
		var ID_KELURAHAN2Field;
		var ID_KECAMATAN2Field;
		var ID_KOTA2Field;
		var TELP2Field;
		var JENIS_PERMOHONANField;
				
		var ID_IJIN_LINGKUNGAN_INTISearchField;
		var NO_KTPSearchField;
		var NAMA_LENGKAPSearchField;
		var TEMPAT_LAHIRSearchField;
		var TANGGAL_LAHIRSearchField;
		var KEWARGANEGARAANSearchField;
		var ALAMATSearchField;
		var ID_KELURAHANSearchField;
		var ID_KECAMATANSearchField;
		var ID_KOTASearchField;
		var TELPSearchField;
		var NPWPSearchField;
		var NAMA_PERUSAHAANSearchField;
		var NAMA_DIREKTURSearchField;
		var NO_AKTESearchField;
		var BENTUK_PERUSAHAANSearchField;
		var ALAMAT_PERUSAHAANSearchField;
		var ID_KELURAHAN2SearchField;
		var ID_KECAMATAN2SearchField;
		var ID_KOTA2SearchField;
		var TELP2SearchField;
		var JENIS_PERMOHONANSearchField;
				
		var in_lingkungan_dbTask = 'CREATE';
		var in_lingkungan_dbTaskMessage = 'Tambah';
		var in_lingkungan_dbPermission = 'CRUD';
		var in_lingkungan_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function in_lingkungan_switchToGrid(){
			in_lingkungan_formPanel.setDisabled(true);
			in_lingkungan_gridPanel.setDisabled(false);
			in_lingkungan_formWindow.hide();
		}
		
		function in_lingkungan_switchToForm(){
			in_lingkungan_gridPanel.setDisabled(true);
			in_lingkungan_formPanel.setDisabled(false);
			in_lingkungan_formWindow.show();
		}
		
		function in_lingkungan_confirmAdd(){
			in_lingkungan_dbTask = 'CREATE';
			in_lingkungan_dbTaskMessage = 'created';
			in_lingkungan_resetForm();
			in_lingkungan_switchToForm();
		}
		
		function in_lingkungan_confirmUpdate(){
			if(in_lingkungan_gridPanel.selModel.getCount() == 1) {
				in_lingkungan_dbTask = 'UPDATE';
				in_lingkungan_dbTaskMessage = 'updated';
				in_lingkungan_switchToForm();
				in_lingkungan_setForm();
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
		
		function in_lingkungan_confirmDelete(){
			if(in_lingkungan_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, in_lingkungan_delete);
			}else if(in_lingkungan_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, in_lingkungan_delete);
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
		
		function in_lingkungan_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(in_lingkungan_dbPermission)==false && pattC.test(in_lingkungan_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(in_lingkungan_confirmFormValid()){
					var ID_IJIN_LINGUKANGANValue = '';
					var ID_IJIN_LINGKUNGAN_INTIValue = '';
					var NO_KTPValue = '';
					var NAMA_LENGKAPValue = '';
					var TEMPAT_LAHIRValue = '';
					var TANGGAL_LAHIRValue = '';
					var KEWARGANEGARAANValue = '';
					var ALAMATValue = '';
					var ID_KELURAHANValue = '';
					var ID_KECAMATANValue = '';
					var ID_KOTAValue = '';
					var TELPValue = '';
					var NPWPValue = '';
					var NAMA_PERUSAHAANValue = '';
					var NAMA_DIREKTURValue = '';
					var NO_AKTEValue = '';
					var BENTUK_PERUSAHAANValue = '';
					var ALAMAT_PERUSAHAANValue = '';
					var ID_KELURAHAN2Value = '';
					var ID_KECAMATAN2Value = '';
					var ID_KOTA2Value = '';
					var TELP2Value = '';
					var JENIS_PERMOHONANValue = '';
										
					ID_IJIN_LINGUKANGANValue = ID_IJIN_LINGUKANGANField.getValue();
					ID_IJIN_LINGKUNGAN_INTIValue = ID_IJIN_LINGKUNGAN_INTIField.getValue();
					NO_KTPValue = NO_KTPField.getValue();
					NAMA_LENGKAPValue = NAMA_LENGKAPField.getValue();
					TEMPAT_LAHIRValue = TEMPAT_LAHIRField.getValue();
					TANGGAL_LAHIRValue = TANGGAL_LAHIRField.getValue();
					KEWARGANEGARAANValue = KEWARGANEGARAANField.getValue();
					ALAMATValue = ALAMATField.getValue();
					ID_KELURAHANValue = ID_KELURAHANField.getValue();
					ID_KECAMATANValue = ID_KECAMATANField.getValue();
					ID_KOTAValue = ID_KOTAField.getValue();
					TELPValue = TELPField.getValue();
					NPWPValue = NPWPField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					NAMA_DIREKTURValue = NAMA_DIREKTURField.getValue();
					NO_AKTEValue = NO_AKTEField.getValue();
					BENTUK_PERUSAHAANValue = BENTUK_PERUSAHAANField.getValue();
					ALAMAT_PERUSAHAANValue = ALAMAT_PERUSAHAANField.getValue();
					ID_KELURAHAN2Value = ID_KELURAHAN2Field.getValue();
					ID_KECAMATAN2Value = ID_KECAMATAN2Field.getValue();
					ID_KOTA2Value = ID_KOTA2Field.getValue();
					TELP2Value = TELP2Field.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_lingkungan/switchAction',
						params: {							
							ID_IJIN_LINGUKANGAN : ID_IJIN_LINGUKANGANValue,
							ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
							NO_KTP : NO_KTPValue,
							NAMA_LENGKAP : NAMA_LENGKAPValue,
							TEMPAT_LAHIR : TEMPAT_LAHIRValue,
							TANGGAL_LAHIR : TANGGAL_LAHIRValue,
							KEWARGANEGARAAN : KEWARGANEGARAANValue,
							ALAMAT : ALAMATValue,
							ID_KELURAHAN : ID_KELURAHANValue,
							ID_KECAMATAN : ID_KECAMATANValue,
							ID_KOTA : ID_KOTAValue,
							TELP : TELPValue,
							NPWP : NPWPValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							NAMA_DIREKTUR : NAMA_DIREKTURValue,
							NO_AKTE : NO_AKTEValue,
							BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
							ALAMAT_PERUSAHAAN : ALAMAT_PERUSAHAANValue,
							ID_KELURAHAN2 : ID_KELURAHAN2Value,
							ID_KECAMATAN2 : ID_KECAMATAN2Value,
							ID_KOTA2 : ID_KOTA2Value,
							TELP2 : TELP2Value,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							action : in_lingkungan_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									in_lingkungan_dataStore.reload();
									in_lingkungan_resetForm();
									in_lingkungan_switchToGrid();
									in_lingkungan_gridPanel.getSelectionModel().deselectAll();
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
		
		function in_lingkungan_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(in_lingkungan_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = in_lingkungan_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< in_lingkungan_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJIN_LINGUKANGAN);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_ijin_lingkungan/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									in_lingkungan_dataStore.reload();
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
		
		function in_lingkungan_refresh(){
			in_lingkungan_dbListAction = "GETLIST";
			in_lingkungan_gridSearchField.reset();
			in_lingkungan_searchPanel.getForm().reset();
			in_lingkungan_dataStore.proxy.extraParams = { action : 'GETLIST' };
			in_lingkungan_dataStore.proxy.extraParams.query = "";
			in_lingkungan_dataStore.currentPage = 1;
			in_lingkungan_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function in_lingkungan_confirmFormValid(){
			return in_lingkungan_formPanel.getForm().isValid();
		}
		
		function in_lingkungan_resetForm(){
			in_lingkungan_dbTask = 'CREATE';
			in_lingkungan_dbTaskMessage = 'create';
			in_lingkungan_formPanel.getForm().reset();
			ID_IJIN_LINGUKANGANField.setValue(0);
		}
		
		function in_lingkungan_setForm(){
			in_lingkungan_dbTask = 'UPDATE';
            in_lingkungan_dbTaskMessage = 'update';
			
			var record = in_lingkungan_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJIN_LINGUKANGANField.setValue(record.data.ID_IJIN_LINGUKANGAN);
			ID_IJIN_LINGKUNGAN_INTIField.setValue(record.data.ID_IJIN_LINGKUNGAN_INTI);
			NO_KTPField.setValue(record.data.NO_KTP);
			NAMA_LENGKAPField.setValue(record.data.NAMA_LENGKAP);
			TEMPAT_LAHIRField.setValue(record.data.TEMPAT_LAHIR);
			TANGGAL_LAHIRField.setValue(record.data.TANGGAL_LAHIR);
			KEWARGANEGARAANField.setValue(record.data.KEWARGANEGARAAN);
			ALAMATField.setValue(record.data.ALAMAT);
			ID_KELURAHANField.setValue(record.data.ID_KELURAHAN);
			ID_KECAMATANField.setValue(record.data.ID_KECAMATAN);
			ID_KOTAField.setValue(record.data.ID_KOTA);
			TELPField.setValue(record.data.TELP);
			NPWPField.setValue(record.data.NPWP);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			NAMA_DIREKTURField.setValue(record.data.NAMA_DIREKTUR);
			NO_AKTEField.setValue(record.data.NO_AKTE);
			BENTUK_PERUSAHAANField.setValue(record.data.BENTUK_PERUSAHAAN);
			ALAMAT_PERUSAHAANField.setValue(record.data.ALAMAT_PERUSAHAAN);
			ID_KELURAHAN2Field.setValue(record.data.ID_KELURAHAN2);
			ID_KECAMATAN2Field.setValue(record.data.ID_KECAMATAN2);
			ID_KOTA2Field.setValue(record.data.ID_KOTA2);
			TELP2Field.setValue(record.data.TELP2);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
					}
		
		function in_lingkungan_showSearchWindow(){
			in_lingkungan_searchWindow.show();
		}
		
		function in_lingkungan_search(){
			in_lingkungan_gridSearchField.reset();
			
			var ID_IJIN_LINGKUNGAN_INTIValue = '';
			var NO_KTPValue = '';
			var NAMA_LENGKAPValue = '';
			var TEMPAT_LAHIRValue = '';
			var TANGGAL_LAHIRValue = '';
			var KEWARGANEGARAANValue = '';
			var ALAMATValue = '';
			var ID_KELURAHANValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var TELPValue = '';
			var NPWPValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NAMA_DIREKTURValue = '';
			var NO_AKTEValue = '';
			var BENTUK_PERUSAHAANValue = '';
			var ALAMAT_PERUSAHAANValue = '';
			var ID_KELURAHAN2Value = '';
			var ID_KECAMATAN2Value = '';
			var ID_KOTA2Value = '';
			var TELP2Value = '';
			var JENIS_PERMOHONANValue = '';
						
			ID_IJIN_LINGKUNGAN_INTIValue = ID_IJIN_LINGKUNGAN_INTISearchField.getValue();
			NO_KTPValue = NO_KTPSearchField.getValue();
			NAMA_LENGKAPValue = NAMA_LENGKAPSearchField.getValue();
			TEMPAT_LAHIRValue = TEMPAT_LAHIRSearchField.getValue();
			TANGGAL_LAHIRValue = TANGGAL_LAHIRSearchField.getValue();
			KEWARGANEGARAANValue = KEWARGANEGARAANSearchField.getValue();
			ALAMATValue = ALAMATSearchField.getValue();
			ID_KELURAHANValue = ID_KELURAHANSearchField.getValue();
			ID_KECAMATANValue = ID_KECAMATANSearchField.getValue();
			ID_KOTAValue = ID_KOTASearchField.getValue();
			TELPValue = TELPSearchField.getValue();
			NPWPValue = NPWPSearchField.getValue();
			NAMA_PERUSAHAANValue = NAMA_PERUSAHAANSearchField.getValue();
			NAMA_DIREKTURValue = NAMA_DIREKTURSearchField.getValue();
			NO_AKTEValue = NO_AKTESearchField.getValue();
			BENTUK_PERUSAHAANValue = BENTUK_PERUSAHAANSearchField.getValue();
			ALAMAT_PERUSAHAANValue = ALAMAT_PERUSAHAANSearchField.getValue();
			ID_KELURAHAN2Value = ID_KELURAHAN2SearchField.getValue();
			ID_KECAMATAN2Value = ID_KECAMATAN2SearchField.getValue();
			ID_KOTA2Value = ID_KOTA2SearchField.getValue();
			TELP2Value = TELP2SearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			in_lingkungan_dbListAction = "SEARCH";
			in_lingkungan_dataStore.proxy.extraParams = { 
				ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
				NO_KTP : NO_KTPValue,
				NAMA_LENGKAP : NAMA_LENGKAPValue,
				TEMPAT_LAHIR : TEMPAT_LAHIRValue,
				TANGGAL_LAHIR : TANGGAL_LAHIRValue,
				KEWARGANEGARAAN : KEWARGANEGARAANValue,
				ALAMAT : ALAMATValue,
				ID_KELURAHAN : ID_KELURAHANValue,
				ID_KECAMATAN : ID_KECAMATANValue,
				ID_KOTA : ID_KOTAValue,
				TELP : TELPValue,
				NPWP : NPWPValue,
				NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
				NAMA_DIREKTUR : NAMA_DIREKTURValue,
				NO_AKTE : NO_AKTEValue,
				BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
				ALAMAT_PERUSAHAAN : ALAMAT_PERUSAHAANValue,
				ID_KELURAHAN2 : ID_KELURAHAN2Value,
				ID_KECAMATAN2 : ID_KECAMATAN2Value,
				ID_KOTA2 : ID_KOTA2Value,
				TELP2 : TELP2Value,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				action : 'SEARCH'
			};
			in_lingkungan_dataStore.currentPage = 1;
			in_lingkungan_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function in_lingkungan_printExcel(outputType){
			var searchText = "";
			var ID_IJIN_LINGKUNGAN_INTIValue = '';
			var NO_KTPValue = '';
			var NAMA_LENGKAPValue = '';
			var TEMPAT_LAHIRValue = '';
			var TANGGAL_LAHIRValue = '';
			var KEWARGANEGARAANValue = '';
			var ALAMATValue = '';
			var ID_KELURAHANValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var TELPValue = '';
			var NPWPValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NAMA_DIREKTURValue = '';
			var NO_AKTEValue = '';
			var BENTUK_PERUSAHAANValue = '';
			var ALAMAT_PERUSAHAANValue = '';
			var ID_KELURAHAN2Value = '';
			var ID_KECAMATAN2Value = '';
			var ID_KOTA2Value = '';
			var TELP2Value = '';
			var JENIS_PERMOHONANValue = '';
			
			if(in_lingkungan_dataStore.proxy.extraParams.query!==null){searchText = in_lingkungan_dataStore.proxy.extraParams.query;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_IJIN_LINGKUNGAN_INTI!==null){ID_IJIN_LINGKUNGAN_INTIValue = in_lingkungan_dataStore.proxy.extraParams.ID_IJIN_LINGKUNGAN_INTI;}
			if(in_lingkungan_dataStore.proxy.extraParams.NO_KTP!==null){NO_KTPValue = in_lingkungan_dataStore.proxy.extraParams.NO_KTP;}
			if(in_lingkungan_dataStore.proxy.extraParams.NAMA_LENGKAP!==null){NAMA_LENGKAPValue = in_lingkungan_dataStore.proxy.extraParams.NAMA_LENGKAP;}
			if(in_lingkungan_dataStore.proxy.extraParams.TEMPAT_LAHIR!==null){TEMPAT_LAHIRValue = in_lingkungan_dataStore.proxy.extraParams.TEMPAT_LAHIR;}
			if(in_lingkungan_dataStore.proxy.extraParams.TANGGAL_LAHIR!==null){TANGGAL_LAHIRValue = in_lingkungan_dataStore.proxy.extraParams.TANGGAL_LAHIR;}
			if(in_lingkungan_dataStore.proxy.extraParams.KEWARGANEGARAAN!==null){KEWARGANEGARAANValue = in_lingkungan_dataStore.proxy.extraParams.KEWARGANEGARAAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.ALAMAT!==null){ALAMATValue = in_lingkungan_dataStore.proxy.extraParams.ALAMAT;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_KELURAHAN!==null){ID_KELURAHANValue = in_lingkungan_dataStore.proxy.extraParams.ID_KELURAHAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_KECAMATAN!==null){ID_KECAMATANValue = in_lingkungan_dataStore.proxy.extraParams.ID_KECAMATAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_KOTA!==null){ID_KOTAValue = in_lingkungan_dataStore.proxy.extraParams.ID_KOTA;}
			if(in_lingkungan_dataStore.proxy.extraParams.TELP!==null){TELPValue = in_lingkungan_dataStore.proxy.extraParams.TELP;}
			if(in_lingkungan_dataStore.proxy.extraParams.NPWP!==null){NPWPValue = in_lingkungan_dataStore.proxy.extraParams.NPWP;}
			if(in_lingkungan_dataStore.proxy.extraParams.NAMA_PERUSAHAAN!==null){NAMA_PERUSAHAANValue = in_lingkungan_dataStore.proxy.extraParams.NAMA_PERUSAHAAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.NAMA_DIREKTUR!==null){NAMA_DIREKTURValue = in_lingkungan_dataStore.proxy.extraParams.NAMA_DIREKTUR;}
			if(in_lingkungan_dataStore.proxy.extraParams.NO_AKTE!==null){NO_AKTEValue = in_lingkungan_dataStore.proxy.extraParams.NO_AKTE;}
			if(in_lingkungan_dataStore.proxy.extraParams.BENTUK_PERUSAHAAN!==null){BENTUK_PERUSAHAANValue = in_lingkungan_dataStore.proxy.extraParams.BENTUK_PERUSAHAAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.ALAMAT_PERUSAHAAN!==null){ALAMAT_PERUSAHAANValue = in_lingkungan_dataStore.proxy.extraParams.ALAMAT_PERUSAHAAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_KELURAHAN2!==null){ID_KELURAHAN2Value = in_lingkungan_dataStore.proxy.extraParams.ID_KELURAHAN2;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_KECAMATAN2!==null){ID_KECAMATAN2Value = in_lingkungan_dataStore.proxy.extraParams.ID_KECAMATAN2;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_KOTA2!==null){ID_KOTA2Value = in_lingkungan_dataStore.proxy.extraParams.ID_KOTA2;}
			if(in_lingkungan_dataStore.proxy.extraParams.TELP2!==null){TELP2Value = in_lingkungan_dataStore.proxy.extraParams.TELP2;}
			if(in_lingkungan_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = in_lingkungan_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_ijin_lingkungan/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
					NO_KTP : NO_KTPValue,
					NAMA_LENGKAP : NAMA_LENGKAPValue,
					TEMPAT_LAHIR : TEMPAT_LAHIRValue,
					TANGGAL_LAHIR : TANGGAL_LAHIRValue,
					KEWARGANEGARAAN : KEWARGANEGARAANValue,
					ALAMAT : ALAMATValue,
					ID_KELURAHAN : ID_KELURAHANValue,
					ID_KECAMATAN : ID_KECAMATANValue,
					ID_KOTA : ID_KOTAValue,
					TELP : TELPValue,
					NPWP : NPWPValue,
					NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
					NAMA_DIREKTUR : NAMA_DIREKTURValue,
					NO_AKTE : NO_AKTEValue,
					BENTUK_PERUSAHAAN : BENTUK_PERUSAHAANValue,
					ALAMAT_PERUSAHAAN : ALAMAT_PERUSAHAANValue,
					ID_KELURAHAN2 : ID_KELURAHAN2Value,
					ID_KECAMATAN2 : ID_KECAMATAN2Value,
					ID_KOTA2 : ID_KOTA2Value,
					TELP2 : TELP2Value,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					currentAction : in_lingkungan_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/ijin_lingkungan_list.xls');
							}else{
								window.open('./print/ijin_lingkungan_list.html','in_lingkunganlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		in_lingkungan_dataStore = Ext.create('Ext.data.Store',{
			id : 'in_lingkungan_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_lingkungan/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN_LINGUKANGAN'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN_LINGUKANGAN', type : 'int', mapping : 'ID_IJIN_LINGUKANGAN' },
				{ name : 'ID_IJIN_LINGKUNGAN_INTI', type : 'int', mapping : 'ID_IJIN_LINGKUNGAN_INTI' },
				{ name : 'NO_KTP', type : 'string', mapping : 'NO_KTP' },
				{ name : 'NAMA_LENGKAP', type : 'string', mapping : 'NAMA_LENGKAP' },
				{ name : 'TEMPAT_LAHIR', type : 'string', mapping : 'TEMPAT_LAHIR' },
				{ name : 'TANGGAL_LAHIR', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TANGGAL_LAHIR' },
				{ name : 'KEWARGANEGARAAN', type : 'string', mapping : 'KEWARGANEGARAAN' },
				{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
				{ name : 'ID_KELURAHAN', type : 'int', mapping : 'ID_KELURAHAN' },
				{ name : 'ID_KECAMATAN', type : 'int', mapping : 'ID_KECAMATAN' },
				{ name : 'ID_KOTA', type : 'int', mapping : 'ID_KOTA' },
				{ name : 'TELP', type : 'string', mapping : 'TELP' },
				{ name : 'NPWP', type : 'string', mapping : 'NPWP' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'NAMA_DIREKTUR', type : 'string', mapping : 'NAMA_DIREKTUR' },
				{ name : 'NO_AKTE', type : 'string', mapping : 'NO_AKTE' },
				{ name : 'BENTUK_PERUSAHAAN', type : 'int', mapping : 'BENTUK_PERUSAHAAN' },
				{ name : 'ALAMAT_PERUSAHAAN', type : 'string', mapping : 'ALAMAT_PERUSAHAAN' },
				{ name : 'ID_KELURAHAN2', type : 'int', mapping : 'ID_KELURAHAN2' },
				{ name : 'ID_KECAMATAN2', type : 'int', mapping : 'ID_KECAMATAN2' },
				{ name : 'ID_KOTA2', type : 'int', mapping : 'ID_KOTA2' },
				{ name : 'TELP2', type : 'string', mapping : 'TELP2' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		in_lingkungan_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						in_lingkungan_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						in_lingkungan_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						in_lingkungan_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						in_lingkungan_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						in_lingkungan_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						in_lingkungan_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						in_lingkungan_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						in_lingkungan_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var in_lingkungan_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : in_lingkungan_confirmAdd
		});
		var in_lingkungan_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : in_lingkungan_confirmUpdate
		});
		var in_lingkungan_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : in_lingkungan_confirmDelete
		});
		var in_lingkungan_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : in_lingkungan_refresh
		});
		var in_lingkungan_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : in_lingkungan_showSearchWindow
		});
		var in_lingkungan_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				in_lingkungan_printExcel('PRINT');
			}
		});
		var in_lingkungan_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				in_lingkungan_printExcel('EXCEL');
			}
		});
		
		var in_lingkungan_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : in_lingkungan_confirmUpdate
		});
		var in_lingkungan_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : in_lingkungan_confirmDelete
		});
		var in_lingkungan_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : in_lingkungan_refresh
		});
		in_lingkungan_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'in_lingkungan_contextMenu',
			items: [
				in_lingkungan_contextMenuEdit,in_lingkungan_contextMenuDelete,'-',in_lingkungan_contextMenuRefresh
			]
		});
		
		in_lingkungan_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : in_lingkungan_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						in_lingkungan_dataStore.proxy.extraParams = { action : 'GETLIST'};
						in_lingkungan_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		in_lingkungan_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'in_lingkungan_gridPanel',
			constrain : true,
			store : in_lingkungan_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'in_lingkunganGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						in_lingkungan_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : in_lingkungan_shorcut,
			columns : [
				{
					text : 'ID_IJIN_LINGKUNGAN_INTI',
					dataIndex : 'ID_IJIN_LINGKUNGAN_INTI',
					width : 100,
					sortable : false
				},
				{
					text : 'NO_KTP',
					dataIndex : 'NO_KTP',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_LENGKAP',
					dataIndex : 'NAMA_LENGKAP',
					width : 100,
					sortable : false
				},
				{
					text : 'TEMPAT_LAHIR',
					dataIndex : 'TEMPAT_LAHIR',
					width : 100,
					sortable : false
				},
				{
					text : 'TANGGAL_LAHIR',
					dataIndex : 'TANGGAL_LAHIR',
					width : 100,
					sortable : false
				},
				{
					text : 'KEWARGANEGARAAN',
					dataIndex : 'KEWARGANEGARAAN',
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
					text : 'ID_KELURAHAN',
					dataIndex : 'ID_KELURAHAN',
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
					text : 'TELP',
					dataIndex : 'TELP',
					width : 100,
					sortable : false
				},
				{
					text : 'NPWP',
					dataIndex : 'NPWP',
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
					text : 'NAMA_DIREKTUR',
					dataIndex : 'NAMA_DIREKTUR',
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
					text : 'ALAMAT_PERUSAHAAN',
					dataIndex : 'ALAMAT_PERUSAHAAN',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_KELURAHAN2',
					dataIndex : 'ID_KELURAHAN2',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_KECAMATAN2',
					dataIndex : 'ID_KECAMATAN2',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_KOTA2',
					dataIndex : 'ID_KOTA2',
					width : 100,
					sortable : false
				},
				{
					text : 'TELP2',
					dataIndex : 'TELP2',
					width : 100,
					sortable : false
				},
				{
					text : 'JENIS_PERMOHONAN',
					dataIndex : 'JENIS_PERMOHONAN',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				in_lingkungan_addButton,
				in_lingkungan_editButton,
				in_lingkungan_deleteButton,
				in_lingkungan_gridSearchField,
				in_lingkungan_searchButton,
				in_lingkungan_refreshButton,
				in_lingkungan_printButton,
				in_lingkungan_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : in_lingkungan_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					in_lingkungan_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_IJIN_LINGUKANGANField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LINGUKANGANField',
			name : 'ID_IJIN_LINGUKANGAN',
			fieldLabel : 'ID_IJIN_LINGUKANGAN<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_IJIN_LINGKUNGAN_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LINGKUNGAN_INTIField',
			name : 'ID_IJIN_LINGKUNGAN_INTI',
			fieldLabel : 'ID_IJIN_LINGKUNGAN_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		NO_KTPField = Ext.create('Ext.form.TextField',{
			id : 'NO_KTPField',
			name : 'NO_KTP',
			fieldLabel : 'NO_KTP',
			maxLength : 50
		});
		NAMA_LENGKAPField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_LENGKAPField',
			name : 'NAMA_LENGKAP',
			fieldLabel : 'NAMA_LENGKAP',
			maxLength : 100
		});
		TEMPAT_LAHIRField = Ext.create('Ext.form.TextField',{
			id : 'TEMPAT_LAHIRField',
			name : 'TEMPAT_LAHIR',
			fieldLabel : 'TEMPAT_LAHIR',
			maxLength : 100
		});
		TANGGAL_LAHIRField = Ext.create('Ext.form.TextField',{
			id : 'TANGGAL_LAHIRField',
			name : 'TANGGAL_LAHIR',
			fieldLabel : 'TANGGAL_LAHIR',
			maxLength : 0
		});
		KEWARGANEGARAANField = Ext.create('Ext.form.TextField',{
			id : 'KEWARGANEGARAANField',
			name : 'KEWARGANEGARAAN',
			fieldLabel : 'KEWARGANEGARAAN',
			maxLength : 50
		});
		ALAMATField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 100
		});
		ID_KELURAHANField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KELURAHANField',
			name : 'ID_KELURAHAN',
			fieldLabel : 'ID_KELURAHAN',
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
		TELPField = Ext.create('Ext.form.TextField',{
			id : 'TELPField',
			name : 'TELP',
			fieldLabel : 'TELP',
			maxLength : 20
		});
		NPWPField = Ext.create('Ext.form.TextField',{
			id : 'NPWPField',
			name : 'NPWP',
			fieldLabel : 'NPWP',
			maxLength : 50
		});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		});
		NAMA_DIREKTURField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKTURField',
			name : 'NAMA_DIREKTUR',
			fieldLabel : 'NAMA_DIREKTUR',
			maxLength : 50
		});
		NO_AKTEField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTEField',
			name : 'NO_AKTE',
			fieldLabel : 'NO_AKTE',
			maxLength : 50
		});
		BENTUK_PERUSAHAANField = Ext.create('Ext.form.NumberField',{
			id : 'BENTUK_PERUSAHAANField',
			name : 'BENTUK_PERUSAHAAN',
			fieldLabel : 'BENTUK_PERUSAHAAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ALAMAT_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_PERUSAHAANField',
			name : 'ALAMAT_PERUSAHAAN',
			fieldLabel : 'ALAMAT_PERUSAHAAN',
			maxLength : 100
		});
		ID_KELURAHAN2Field = Ext.create('Ext.form.NumberField',{
			id : 'ID_KELURAHAN2Field',
			name : 'ID_KELURAHAN2',
			fieldLabel : 'ID_KELURAHAN2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KECAMATAN2Field = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATAN2Field',
			name : 'ID_KECAMATAN2',
			fieldLabel : 'ID_KECAMATAN2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		ID_KOTA2Field = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTA2Field',
			name : 'ID_KOTA2',
			fieldLabel : 'ID_KOTA2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		TELP2Field = Ext.create('Ext.form.TextField',{
			id : 'TELP2Field',
			name : 'TELP2',
			fieldLabel : 'TELP2',
			maxLength : 20
		});
		JENIS_PERMOHONANField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var in_lingkungan_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : in_lingkungan_save
		});
		var in_lingkungan_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				in_lingkungan_resetForm();
				in_lingkungan_switchToGrid();
			}
		});
		in_lingkungan_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJIN_LINGUKANGANField,
						ID_IJIN_LINGKUNGAN_INTIField,
						NO_KTPField,
						NAMA_LENGKAPField,
						TEMPAT_LAHIRField,
						TANGGAL_LAHIRField,
						KEWARGANEGARAANField,
						ALAMATField,
						ID_KELURAHANField,
						ID_KECAMATANField,
						ID_KOTAField,
						TELPField,
						NPWPField,
						NAMA_PERUSAHAANField,
						NAMA_DIREKTURField,
						NO_AKTEField,
						BENTUK_PERUSAHAANField,
						ALAMAT_PERUSAHAANField,
						ID_KELURAHAN2Field,
						ID_KECAMATAN2Field,
						ID_KOTA2Field,
						TELP2Field,
						JENIS_PERMOHONANField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [in_lingkungan_saveButton,in_lingkungan_cancelButton]
		});
		in_lingkungan_formWindow = Ext.create('Ext.window.Window',{
			id : 'in_lingkungan_formWindow',
			renderTo : 'in_lingkunganSaveWindow',
			title : globalFormAddEditTitle + ' ' + in_lingkungan_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [in_lingkungan_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_IJIN_LINGKUNGAN_INTISearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LINGKUNGAN_INTISearchField',
			name : 'ID_IJIN_LINGKUNGAN_INTI',
			fieldLabel : 'ID_IJIN_LINGKUNGAN_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		NO_KTPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_KTPSearchField',
			name : 'NO_KTP',
			fieldLabel : 'NO_KTP',
			maxLength : 50
		
		});
		NAMA_LENGKAPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_LENGKAPSearchField',
			name : 'NAMA_LENGKAP',
			fieldLabel : 'NAMA_LENGKAP',
			maxLength : 100
		
		});
		TEMPAT_LAHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TEMPAT_LAHIRSearchField',
			name : 'TEMPAT_LAHIR',
			fieldLabel : 'TEMPAT_LAHIR',
			maxLength : 100
		
		});
		TANGGAL_LAHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TANGGAL_LAHIRSearchField',
			name : 'TANGGAL_LAHIR',
			fieldLabel : 'TANGGAL_LAHIR',
			maxLength : 0
		
		});
		KEWARGANEGARAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'KEWARGANEGARAANSearchField',
			name : 'KEWARGANEGARAAN',
			fieldLabel : 'KEWARGANEGARAAN',
			maxLength : 50
		
		});
		ALAMATSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATSearchField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 100
		
		});
		ID_KELURAHANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KELURAHANSearchField',
			name : 'ID_KELURAHAN',
			fieldLabel : 'ID_KELURAHAN',
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
		TELPSearchField = Ext.create('Ext.form.TextField',{
			id : 'TELPSearchField',
			name : 'TELP',
			fieldLabel : 'TELP',
			maxLength : 20
		
		});
		NPWPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NPWPSearchField',
			name : 'NPWP',
			fieldLabel : 'NPWP',
			maxLength : 50
		
		});
		NAMA_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANSearchField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		
		});
		NAMA_DIREKTURSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKTURSearchField',
			name : 'NAMA_DIREKTUR',
			fieldLabel : 'NAMA_DIREKTUR',
			maxLength : 50
		
		});
		NO_AKTESearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_AKTESearchField',
			name : 'NO_AKTE',
			fieldLabel : 'NO_AKTE',
			maxLength : 50
		
		});
		BENTUK_PERUSAHAANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'BENTUK_PERUSAHAANSearchField',
			name : 'BENTUK_PERUSAHAAN',
			fieldLabel : 'BENTUK_PERUSAHAAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ALAMAT_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_PERUSAHAANSearchField',
			name : 'ALAMAT_PERUSAHAAN',
			fieldLabel : 'ALAMAT_PERUSAHAAN',
			maxLength : 100
		
		});
		ID_KELURAHAN2SearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KELURAHAN2SearchField',
			name : 'ID_KELURAHAN2',
			fieldLabel : 'ID_KELURAHAN2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KECAMATAN2SearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KECAMATAN2SearchField',
			name : 'ID_KECAMATAN2',
			fieldLabel : 'ID_KECAMATAN2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		ID_KOTA2SearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_KOTA2SearchField',
			name : 'ID_KOTA2',
			fieldLabel : 'ID_KOTA2',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		TELP2SearchField = Ext.create('Ext.form.TextField',{
			id : 'TELP2SearchField',
			name : 'TELP2',
			fieldLabel : 'TELP2',
			maxLength : 20
		
		});
		JENIS_PERMOHONANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANSearchField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var in_lingkungan_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : in_lingkungan_search
		});
		var in_lingkungan_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				in_lingkungan_searchWindow.hide();
			}
		});
		in_lingkungan_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJIN_LINGKUNGAN_INTISearchField,
						NO_KTPSearchField,
						NAMA_LENGKAPSearchField,
						TEMPAT_LAHIRSearchField,
						TANGGAL_LAHIRSearchField,
						KEWARGANEGARAANSearchField,
						ALAMATSearchField,
						ID_KELURAHANSearchField,
						ID_KECAMATANSearchField,
						ID_KOTASearchField,
						TELPSearchField,
						NPWPSearchField,
						NAMA_PERUSAHAANSearchField,
						NAMA_DIREKTURSearchField,
						NO_AKTESearchField,
						BENTUK_PERUSAHAANSearchField,
						ALAMAT_PERUSAHAANSearchField,
						ID_KELURAHAN2SearchField,
						ID_KECAMATAN2SearchField,
						ID_KOTA2SearchField,
						TELP2SearchField,
						JENIS_PERMOHONANSearchField,
						]
				}],
			buttons : [in_lingkungan_searchingButton,in_lingkungan_cancelSearchButton]
		});
		in_lingkungan_searchWindow = Ext.create('Ext.window.Window',{
			id : 'in_lingkungan_searchWindow',
			renderTo : 'in_lingkunganSearchWindow',
			title : globalFormSearchTitle + ' ' + in_lingkungan_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [in_lingkungan_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="in_lingkunganSaveWindow"></div>
<div id="in_lingkunganSearchWindow"></div>
<div class="span12" id="in_lingkunganGrid"></div>