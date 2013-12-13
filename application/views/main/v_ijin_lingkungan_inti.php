<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var in_lingkungan_inti_componentItemTitle="IN_LINGKUNGAN_INTI";
		var in_lingkungan_inti_dataStore;
		
		var in_lingkungan_inti_shorcut;
		var in_lingkungan_inti_contextMenu;
		var in_lingkungan_inti_gridSearchField;
		var in_lingkungan_inti_gridPanel;
		var in_lingkungan_inti_formPanel;
		var in_lingkungan_inti_formWindow;
		var in_lingkungan_inti_searchPanel;
		var in_lingkungan_inti_searchWindow;
		
		var ID_IJIN_LINGKUNGAN_INTIField;
		var NO_REGField;
		var JENIS_USAHAField;
		var ALAMATField;
		var ID_KELURAHANField;
		var ID_KECAMATANField;
		var ID_KOTAField;
		var STATUS_LOKASIField;
		var LUAS USAHAField;
		var LUAS_BAHANField;
		var LUAS_BANGUNANField;
		var LUAS_RUANG_USAHAField;
		var KAPASITASField;
		var IZIN_SKTRField;
		var IZIN_LOKASIField;
				
		var NO_REGSearchField;
		var JENIS_USAHASearchField;
		var ALAMATSearchField;
		var ID_KELURAHANSearchField;
		var ID_KECAMATANSearchField;
		var ID_KOTASearchField;
		var STATUS_LOKASISearchField;
		var LUAS USAHASearchField;
		var LUAS_BAHANSearchField;
		var LUAS_BANGUNANSearchField;
		var LUAS_RUANG_USAHASearchField;
		var KAPASITASSearchField;
		var IZIN_SKTRSearchField;
		var IZIN_LOKASISearchField;
				
		var in_lingkungan_inti_dbTask = 'CREATE';
		var in_lingkungan_inti_dbTaskMessage = 'Tambah';
		var in_lingkungan_inti_dbPermission = 'CRUD';
		var in_lingkungan_inti_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function in_lingkungan_inti_switchToGrid(){
			in_lingkungan_inti_formPanel.setDisabled(true);
			in_lingkungan_inti_gridPanel.setDisabled(false);
			in_lingkungan_inti_formWindow.hide();
		}
		
		function in_lingkungan_inti_switchToForm(){
			in_lingkungan_inti_gridPanel.setDisabled(true);
			in_lingkungan_inti_formPanel.setDisabled(false);
			in_lingkungan_inti_formWindow.show();
		}
		
		function in_lingkungan_inti_confirmAdd(){
			in_lingkungan_inti_dbTask = 'CREATE';
			in_lingkungan_inti_dbTaskMessage = 'created';
			in_lingkungan_inti_resetForm();
			in_lingkungan_inti_switchToForm();
		}
		
		function in_lingkungan_inti_confirmUpdate(){
			if(in_lingkungan_inti_gridPanel.selModel.getCount() == 1) {
				in_lingkungan_inti_dbTask = 'UPDATE';
				in_lingkungan_inti_dbTaskMessage = 'updated';
				in_lingkungan_inti_switchToForm();
				in_lingkungan_inti_setForm();
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
		
		function in_lingkungan_inti_confirmDelete(){
			if(in_lingkungan_inti_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, in_lingkungan_inti_delete);
			}else if(in_lingkungan_inti_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, in_lingkungan_inti_delete);
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
		
		function in_lingkungan_inti_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(in_lingkungan_inti_dbPermission)==false && pattC.test(in_lingkungan_inti_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(in_lingkungan_inti_confirmFormValid()){
					var ID_IJIN_LINGKUNGAN_INTIValue = '';
					var NO_REGValue = '';
					var JENIS_USAHAValue = '';
					var ALAMATValue = '';
					var ID_KELURAHANValue = '';
					var ID_KECAMATANValue = '';
					var ID_KOTAValue = '';
					var STATUS_LOKASIValue = '';
					var LUAS USAHAValue = '';
					var LUAS_BAHANValue = '';
					var LUAS_BANGUNANValue = '';
					var LUAS_RUANG_USAHAValue = '';
					var KAPASITASValue = '';
					var IZIN_SKTRValue = '';
					var IZIN_LOKASIValue = '';
										
					ID_IJIN_LINGKUNGAN_INTIValue = ID_IJIN_LINGKUNGAN_INTIField.getValue();
					NO_REGValue = NO_REGField.getValue();
					JENIS_USAHAValue = JENIS_USAHAField.getValue();
					ALAMATValue = ALAMATField.getValue();
					ID_KELURAHANValue = ID_KELURAHANField.getValue();
					ID_KECAMATANValue = ID_KECAMATANField.getValue();
					ID_KOTAValue = ID_KOTAField.getValue();
					STATUS_LOKASIValue = STATUS_LOKASIField.getValue();
					LUAS USAHAValue = LUAS USAHAField.getValue();
					LUAS_BAHANValue = LUAS_BAHANField.getValue();
					LUAS_BANGUNANValue = LUAS_BANGUNANField.getValue();
					LUAS_RUANG_USAHAValue = LUAS_RUANG_USAHAField.getValue();
					KAPASITASValue = KAPASITASField.getValue();
					IZIN_SKTRValue = IZIN_SKTRField.getValue();
					IZIN_LOKASIValue = IZIN_LOKASIField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_lingkungan_inti/switchAction',
						params: {							
							ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
							NO_REG : NO_REGValue,
							JENIS_USAHA : JENIS_USAHAValue,
							ALAMAT : ALAMATValue,
							ID_KELURAHAN : ID_KELURAHANValue,
							ID_KECAMATAN : ID_KECAMATANValue,
							ID_KOTA : ID_KOTAValue,
							STATUS_LOKASI : STATUS_LOKASIValue,
							LUAS USAHA : LUAS USAHAValue,
							LUAS_BAHAN : LUAS_BAHANValue,
							LUAS_BANGUNAN : LUAS_BANGUNANValue,
							LUAS_RUANG_USAHA : LUAS_RUANG_USAHAValue,
							KAPASITAS : KAPASITASValue,
							IZIN_SKTR : IZIN_SKTRValue,
							IZIN_LOKASI : IZIN_LOKASIValue,
							action : in_lingkungan_inti_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									in_lingkungan_inti_dataStore.reload();
									in_lingkungan_inti_resetForm();
									in_lingkungan_inti_switchToGrid();
									in_lingkungan_inti_gridPanel.getSelectionModel().deselectAll();
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
		
		function in_lingkungan_inti_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(in_lingkungan_inti_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = in_lingkungan_inti_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< in_lingkungan_inti_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJIN_LINGKUNGAN_INTI);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_ijin_lingkungan_inti/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									in_lingkungan_inti_dataStore.reload();
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
		
		function in_lingkungan_inti_refresh(){
			in_lingkungan_inti_dbListAction = "GETLIST";
			in_lingkungan_inti_gridSearchField.reset();
			in_lingkungan_inti_searchPanel.getForm().reset();
			in_lingkungan_inti_dataStore.proxy.extraParams = { action : 'GETLIST' };
			in_lingkungan_inti_dataStore.proxy.extraParams.query = "";
			in_lingkungan_inti_dataStore.currentPage = 1;
			in_lingkungan_inti_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function in_lingkungan_inti_confirmFormValid(){
			return in_lingkungan_inti_formPanel.getForm().isValid();
		}
		
		function in_lingkungan_inti_resetForm(){
			in_lingkungan_inti_dbTask = 'CREATE';
			in_lingkungan_inti_dbTaskMessage = 'create';
			in_lingkungan_inti_formPanel.getForm().reset();
			ID_IJIN_LINGKUNGAN_INTIField.setValue(0);
		}
		
		function in_lingkungan_inti_setForm(){
			in_lingkungan_inti_dbTask = 'UPDATE';
            in_lingkungan_inti_dbTaskMessage = 'update';
			
			var record = in_lingkungan_inti_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJIN_LINGKUNGAN_INTIField.setValue(record.data.ID_IJIN_LINGKUNGAN_INTI);
			NO_REGField.setValue(record.data.NO_REG);
			JENIS_USAHAField.setValue(record.data.JENIS_USAHA);
			ALAMATField.setValue(record.data.ALAMAT);
			ID_KELURAHANField.setValue(record.data.ID_KELURAHAN);
			ID_KECAMATANField.setValue(record.data.ID_KECAMATAN);
			ID_KOTAField.setValue(record.data.ID_KOTA);
			STATUS_LOKASIField.setValue(record.data.STATUS_LOKASI);
			LUAS USAHAField.setValue(record.data.LUAS USAHA);
			LUAS_BAHANField.setValue(record.data.LUAS_BAHAN);
			LUAS_BANGUNANField.setValue(record.data.LUAS_BANGUNAN);
			LUAS_RUANG_USAHAField.setValue(record.data.LUAS_RUANG_USAHA);
			KAPASITASField.setValue(record.data.KAPASITAS);
			IZIN_SKTRField.setValue(record.data.IZIN_SKTR);
			IZIN_LOKASIField.setValue(record.data.IZIN_LOKASI);
					}
		
		function in_lingkungan_inti_showSearchWindow(){
			in_lingkungan_inti_searchWindow.show();
		}
		
		function in_lingkungan_inti_search(){
			in_lingkungan_inti_gridSearchField.reset();
			
			var NO_REGValue = '';
			var JENIS_USAHAValue = '';
			var ALAMATValue = '';
			var ID_KELURAHANValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var STATUS_LOKASIValue = '';
			var LUAS USAHAValue = '';
			var LUAS_BAHANValue = '';
			var LUAS_BANGUNANValue = '';
			var LUAS_RUANG_USAHAValue = '';
			var KAPASITASValue = '';
			var IZIN_SKTRValue = '';
			var IZIN_LOKASIValue = '';
						
			NO_REGValue = NO_REGSearchField.getValue();
			JENIS_USAHAValue = JENIS_USAHASearchField.getValue();
			ALAMATValue = ALAMATSearchField.getValue();
			ID_KELURAHANValue = ID_KELURAHANSearchField.getValue();
			ID_KECAMATANValue = ID_KECAMATANSearchField.getValue();
			ID_KOTAValue = ID_KOTASearchField.getValue();
			STATUS_LOKASIValue = STATUS_LOKASISearchField.getValue();
			LUAS USAHAValue = LUAS USAHASearchField.getValue();
			LUAS_BAHANValue = LUAS_BAHANSearchField.getValue();
			LUAS_BANGUNANValue = LUAS_BANGUNANSearchField.getValue();
			LUAS_RUANG_USAHAValue = LUAS_RUANG_USAHASearchField.getValue();
			KAPASITASValue = KAPASITASSearchField.getValue();
			IZIN_SKTRValue = IZIN_SKTRSearchField.getValue();
			IZIN_LOKASIValue = IZIN_LOKASISearchField.getValue();
			in_lingkungan_inti_dbListAction = "SEARCH";
			in_lingkungan_inti_dataStore.proxy.extraParams = { 
				NO_REG : NO_REGValue,
				JENIS_USAHA : JENIS_USAHAValue,
				ALAMAT : ALAMATValue,
				ID_KELURAHAN : ID_KELURAHANValue,
				ID_KECAMATAN : ID_KECAMATANValue,
				ID_KOTA : ID_KOTAValue,
				STATUS_LOKASI : STATUS_LOKASIValue,
				LUAS USAHA : LUAS USAHAValue,
				LUAS_BAHAN : LUAS_BAHANValue,
				LUAS_BANGUNAN : LUAS_BANGUNANValue,
				LUAS_RUANG_USAHA : LUAS_RUANG_USAHAValue,
				KAPASITAS : KAPASITASValue,
				IZIN_SKTR : IZIN_SKTRValue,
				IZIN_LOKASI : IZIN_LOKASIValue,
				action : 'SEARCH'
			};
			in_lingkungan_inti_dataStore.currentPage = 1;
			in_lingkungan_inti_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function in_lingkungan_inti_printExcel(outputType){
			var searchText = "";
			var NO_REGValue = '';
			var JENIS_USAHAValue = '';
			var ALAMATValue = '';
			var ID_KELURAHANValue = '';
			var ID_KECAMATANValue = '';
			var ID_KOTAValue = '';
			var STATUS_LOKASIValue = '';
			var LUAS USAHAValue = '';
			var LUAS_BAHANValue = '';
			var LUAS_BANGUNANValue = '';
			var LUAS_RUANG_USAHAValue = '';
			var KAPASITASValue = '';
			var IZIN_SKTRValue = '';
			var IZIN_LOKASIValue = '';
			
			if(in_lingkungan_inti_dataStore.proxy.extraParams.query!==null){searchText = in_lingkungan_inti_dataStore.proxy.extraParams.query;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.NO_REG!==null){NO_REGValue = in_lingkungan_inti_dataStore.proxy.extraParams.NO_REG;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.JENIS_USAHA!==null){JENIS_USAHAValue = in_lingkungan_inti_dataStore.proxy.extraParams.JENIS_USAHA;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.ALAMAT!==null){ALAMATValue = in_lingkungan_inti_dataStore.proxy.extraParams.ALAMAT;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.ID_KELURAHAN!==null){ID_KELURAHANValue = in_lingkungan_inti_dataStore.proxy.extraParams.ID_KELURAHAN;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.ID_KECAMATAN!==null){ID_KECAMATANValue = in_lingkungan_inti_dataStore.proxy.extraParams.ID_KECAMATAN;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.ID_KOTA!==null){ID_KOTAValue = in_lingkungan_inti_dataStore.proxy.extraParams.ID_KOTA;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.STATUS_LOKASI!==null){STATUS_LOKASIValue = in_lingkungan_inti_dataStore.proxy.extraParams.STATUS_LOKASI;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.LUAS USAHA!==null){LUAS USAHAValue = in_lingkungan_inti_dataStore.proxy.extraParams.LUAS USAHA;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.LUAS_BAHAN!==null){LUAS_BAHANValue = in_lingkungan_inti_dataStore.proxy.extraParams.LUAS_BAHAN;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.LUAS_BANGUNAN!==null){LUAS_BANGUNANValue = in_lingkungan_inti_dataStore.proxy.extraParams.LUAS_BANGUNAN;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.LUAS_RUANG_USAHA!==null){LUAS_RUANG_USAHAValue = in_lingkungan_inti_dataStore.proxy.extraParams.LUAS_RUANG_USAHA;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.KAPASITAS!==null){KAPASITASValue = in_lingkungan_inti_dataStore.proxy.extraParams.KAPASITAS;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.IZIN_SKTR!==null){IZIN_SKTRValue = in_lingkungan_inti_dataStore.proxy.extraParams.IZIN_SKTR;}
			if(in_lingkungan_inti_dataStore.proxy.extraParams.IZIN_LOKASI!==null){IZIN_LOKASIValue = in_lingkungan_inti_dataStore.proxy.extraParams.IZIN_LOKASI;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_ijin_lingkungan_inti/switchAction',
				params : {
					action : outputType,
					query : searchText,
					NO_REG : NO_REGValue,
					JENIS_USAHA : JENIS_USAHAValue,
					ALAMAT : ALAMATValue,
					ID_KELURAHAN : ID_KELURAHANValue,
					ID_KECAMATAN : ID_KECAMATANValue,
					ID_KOTA : ID_KOTAValue,
					STATUS_LOKASI : STATUS_LOKASIValue,
					LUAS USAHA : LUAS USAHAValue,
					LUAS_BAHAN : LUAS_BAHANValue,
					LUAS_BANGUNAN : LUAS_BANGUNANValue,
					LUAS_RUANG_USAHA : LUAS_RUANG_USAHAValue,
					KAPASITAS : KAPASITASValue,
					IZIN_SKTR : IZIN_SKTRValue,
					IZIN_LOKASI : IZIN_LOKASIValue,
					currentAction : in_lingkungan_inti_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/ijin_lingkungan_inti_list.xls');
							}else{
								window.open('./print/ijin_lingkungan_inti_list.html','in_lingkungan_intilist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		in_lingkungan_inti_dataStore = Ext.create('Ext.data.Store',{
			id : 'in_lingkungan_inti_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_ijin_lingkungan_inti/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN_LINGKUNGAN_INTI'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN_LINGKUNGAN_INTI', type : 'int', mapping : 'ID_IJIN_LINGKUNGAN_INTI' },
				{ name : 'NO_REG', type : 'int', mapping : 'NO_REG' },
				{ name : 'JENIS_USAHA', type : 'string', mapping : 'JENIS_USAHA' },
				{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
				{ name : 'ID_KELURAHAN', type : 'int', mapping : 'ID_KELURAHAN' },
				{ name : 'ID_KECAMATAN', type : 'int', mapping : 'ID_KECAMATAN' },
				{ name : 'ID_KOTA', type : 'int', mapping : 'ID_KOTA' },
				{ name : 'STATUS_LOKASI', type : 'int', mapping : 'STATUS_LOKASI' },
				{ name : 'LUAS USAHA', type : 'float', mapping : 'LUAS USAHA' },
				{ name : 'LUAS_BAHAN', type : 'float', mapping : 'LUAS_BAHAN' },
				{ name : 'LUAS_BANGUNAN', type : 'float', mapping : 'LUAS_BANGUNAN' },
				{ name : 'LUAS_RUANG_USAHA', type : 'float', mapping : 'LUAS_RUANG_USAHA' },
				{ name : 'KAPASITAS', type : 'float', mapping : 'KAPASITAS' },
				{ name : 'IZIN_SKTR', type : 'int', mapping : 'IZIN_SKTR' },
				{ name : 'IZIN_LOKASI', type : 'int', mapping : 'IZIN_LOKASI' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		in_lingkungan_inti_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						in_lingkungan_inti_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						in_lingkungan_inti_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						in_lingkungan_inti_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						in_lingkungan_inti_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						in_lingkungan_inti_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						in_lingkungan_inti_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						in_lingkungan_inti_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						in_lingkungan_inti_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var in_lingkungan_inti_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : in_lingkungan_inti_confirmAdd
		});
		var in_lingkungan_inti_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : in_lingkungan_inti_confirmUpdate
		});
		var in_lingkungan_inti_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : in_lingkungan_inti_confirmDelete
		});
		var in_lingkungan_inti_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : in_lingkungan_inti_refresh
		});
		var in_lingkungan_inti_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : in_lingkungan_inti_showSearchWindow
		});
		var in_lingkungan_inti_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				in_lingkungan_inti_printExcel('PRINT');
			}
		});
		var in_lingkungan_inti_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				in_lingkungan_inti_printExcel('EXCEL');
			}
		});
		
		var in_lingkungan_inti_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : in_lingkungan_inti_confirmUpdate
		});
		var in_lingkungan_inti_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : in_lingkungan_inti_confirmDelete
		});
		var in_lingkungan_inti_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : in_lingkungan_inti_refresh
		});
		in_lingkungan_inti_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'in_lingkungan_inti_contextMenu',
			items: [
				in_lingkungan_inti_contextMenuEdit,in_lingkungan_inti_contextMenuDelete,'-',in_lingkungan_inti_contextMenuRefresh
			]
		});
		
		in_lingkungan_inti_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : in_lingkungan_inti_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						in_lingkungan_inti_dataStore.proxy.extraParams = { action : 'GETLIST'};
						in_lingkungan_inti_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		in_lingkungan_inti_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'in_lingkungan_inti_gridPanel',
			constrain : true,
			store : in_lingkungan_inti_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'in_lingkungan_intiGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						in_lingkungan_inti_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : in_lingkungan_inti_shorcut,
			columns : [
				{
					text : 'NO_REG',
					dataIndex : 'NO_REG',
					width : 100,
					sortable : false
				},
				{
					text : 'JENIS_USAHA',
					dataIndex : 'JENIS_USAHA',
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
					text : 'STATUS_LOKASI',
					dataIndex : 'STATUS_LOKASI',
					width : 100,
					sortable : false
				},
				{
					text : 'LUAS USAHA',
					dataIndex : 'LUAS USAHA',
					width : 100,
					sortable : false
				},
				{
					text : 'LUAS_BAHAN',
					dataIndex : 'LUAS_BAHAN',
					width : 100,
					sortable : false
				},
				{
					text : 'LUAS_BANGUNAN',
					dataIndex : 'LUAS_BANGUNAN',
					width : 100,
					sortable : false
				},
				{
					text : 'LUAS_RUANG_USAHA',
					dataIndex : 'LUAS_RUANG_USAHA',
					width : 100,
					sortable : false
				},
				{
					text : 'KAPASITAS',
					dataIndex : 'KAPASITAS',
					width : 100,
					sortable : false
				},
				{
					text : 'IZIN_SKTR',
					dataIndex : 'IZIN_SKTR',
					width : 100,
					sortable : false
				},
				{
					text : 'IZIN_LOKASI',
					dataIndex : 'IZIN_LOKASI',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				in_lingkungan_inti_addButton,
				in_lingkungan_inti_editButton,
				in_lingkungan_inti_deleteButton,
				in_lingkungan_inti_gridSearchField,
				in_lingkungan_inti_searchButton,
				in_lingkungan_inti_refreshButton,
				in_lingkungan_inti_printButton,
				in_lingkungan_inti_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : in_lingkungan_inti_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					in_lingkungan_inti_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_IJIN_LINGKUNGAN_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJIN_LINGKUNGAN_INTIField',
			name : 'ID_IJIN_LINGKUNGAN_INTI',
			fieldLabel : 'ID_IJIN_LINGKUNGAN_INTI<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		NO_REGField = Ext.create('Ext.form.NumberField',{
			id : 'NO_REGField',
			name : 'NO_REG',
			fieldLabel : 'NO_REG',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		JENIS_USAHAField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_USAHAField',
			name : 'JENIS_USAHA',
			fieldLabel : 'JENIS_USAHA',
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
		STATUS_LOKASIField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_LOKASIField',
			name : 'STATUS_LOKASI',
			fieldLabel : 'STATUS_LOKASI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS USAHAField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS USAHAField',
			name : 'LUAS USAHA',
			fieldLabel : 'LUAS USAHA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		LUAS_BAHANField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_BAHANField',
			name : 'LUAS_BAHAN',
			fieldLabel : 'LUAS_BAHAN',
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
		LUAS_RUANG_USAHAField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_RUANG_USAHAField',
			name : 'LUAS_RUANG_USAHA',
			fieldLabel : 'LUAS_RUANG_USAHA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		KAPASITASField = Ext.create('Ext.form.NumberField',{
			id : 'KAPASITASField',
			name : 'KAPASITAS',
			fieldLabel : 'KAPASITAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		IZIN_SKTRField = Ext.create('Ext.form.NumberField',{
			id : 'IZIN_SKTRField',
			name : 'IZIN_SKTR',
			fieldLabel : 'IZIN_SKTR',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		IZIN_LOKASIField = Ext.create('Ext.form.NumberField',{
			id : 'IZIN_LOKASIField',
			name : 'IZIN_LOKASI',
			fieldLabel : 'IZIN_LOKASI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var in_lingkungan_inti_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : in_lingkungan_inti_save
		});
		var in_lingkungan_inti_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				in_lingkungan_inti_resetForm();
				in_lingkungan_inti_switchToGrid();
			}
		});
		in_lingkungan_inti_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJIN_LINGKUNGAN_INTIField,
						NO_REGField,
						JENIS_USAHAField,
						ALAMATField,
						ID_KELURAHANField,
						ID_KECAMATANField,
						ID_KOTAField,
						STATUS_LOKASIField,
						LUAS USAHAField,
						LUAS_BAHANField,
						LUAS_BANGUNANField,
						LUAS_RUANG_USAHAField,
						KAPASITASField,
						IZIN_SKTRField,
						IZIN_LOKASIField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [in_lingkungan_inti_saveButton,in_lingkungan_inti_cancelButton]
		});
		in_lingkungan_inti_formWindow = Ext.create('Ext.window.Window',{
			id : 'in_lingkungan_inti_formWindow',
			renderTo : 'in_lingkungan_intiSaveWindow',
			title : globalFormAddEditTitle + ' ' + in_lingkungan_inti_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [in_lingkungan_inti_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		NO_REGSearchField = Ext.create('Ext.form.NumberField',{
			id : 'NO_REGSearchField',
			name : 'NO_REG',
			fieldLabel : 'NO_REG',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		JENIS_USAHASearchField = Ext.create('Ext.form.TextField',{
			id : 'JENIS_USAHASearchField',
			name : 'JENIS_USAHA',
			fieldLabel : 'JENIS_USAHA',
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
		STATUS_LOKASISearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_LOKASISearchField',
			name : 'STATUS_LOKASI',
			fieldLabel : 'STATUS_LOKASI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		LUAS USAHASearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS USAHASearchField',
			name : 'LUAS USAHA',
			fieldLabel : 'LUAS USAHA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		LUAS_BAHANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_BAHANSearchField',
			name : 'LUAS_BAHAN',
			fieldLabel : 'LUAS_BAHAN',
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
		LUAS_RUANG_USAHASearchField = Ext.create('Ext.form.NumberField',{
			id : 'LUAS_RUANG_USAHASearchField',
			name : 'LUAS_RUANG_USAHA',
			fieldLabel : 'LUAS_RUANG_USAHA',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		KAPASITASSearchField = Ext.create('Ext.form.NumberField',{
			id : 'KAPASITASSearchField',
			name : 'KAPASITAS',
			fieldLabel : 'KAPASITAS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		IZIN_SKTRSearchField = Ext.create('Ext.form.NumberField',{
			id : 'IZIN_SKTRSearchField',
			name : 'IZIN_SKTR',
			fieldLabel : 'IZIN_SKTR',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		IZIN_LOKASISearchField = Ext.create('Ext.form.NumberField',{
			id : 'IZIN_LOKASISearchField',
			name : 'IZIN_LOKASI',
			fieldLabel : 'IZIN_LOKASI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var in_lingkungan_inti_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : in_lingkungan_inti_search
		});
		var in_lingkungan_inti_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				in_lingkungan_inti_searchWindow.hide();
			}
		});
		in_lingkungan_inti_searchPanel = Ext.create('Ext.form.Panel', {
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
						NO_REGSearchField,
						JENIS_USAHASearchField,
						ALAMATSearchField,
						ID_KELURAHANSearchField,
						ID_KECAMATANSearchField,
						ID_KOTASearchField,
						STATUS_LOKASISearchField,
						LUAS USAHASearchField,
						LUAS_BAHANSearchField,
						LUAS_BANGUNANSearchField,
						LUAS_RUANG_USAHASearchField,
						KAPASITASSearchField,
						IZIN_SKTRSearchField,
						IZIN_LOKASISearchField,
						]
				}],
			buttons : [in_lingkungan_inti_searchingButton,in_lingkungan_inti_cancelSearchButton]
		});
		in_lingkungan_inti_searchWindow = Ext.create('Ext.window.Window',{
			id : 'in_lingkungan_inti_searchWindow',
			renderTo : 'in_lingkungan_intiSearchWindow',
			title : globalFormSearchTitle + ' ' + in_lingkungan_inti_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [in_lingkungan_inti_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="in_lingkungan_intiSaveWindow"></div>
<div id="in_lingkungan_intiSearchWindow"></div>
<div class="span12" id="in_lingkungan_intiGrid"></div>