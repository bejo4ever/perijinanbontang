<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var otoar_componentItemTitle="OTOAR";
		var otoar_dataStore;
		
		var otoar_shorcut;
		var otoar_contextMenu;
		var otoar_gridSearchField;
		var otoar_gridPanel;
		var otoar_formPanel;
		var otoar_formWindow;
		var otoar_searchPanel;
		var otoar_searchWindow;
		
		var ID_TROTOARField;
		var ID_PEMOHONField;
		var JENIS_PERMOHONANField;
		var NO_SKField;
		var NO_SK_LAMAField;
		var NAMA_PERUSAHAANField;
		var ALAMATField;
		var PERUNTUKANField;
		var ALAMAT_LOKASIField;
		var TGL_PERMOHONANField;
		var TGL_BERLAKUField;
		var TGL_BERAKHIRField;
		var STATUSField;
		var STATUS_SURVEYField;
				
		var ID_PEMOHONSearchField;
		var JENIS_PERMOHONANSearchField;
		var NO_SKSearchField;
		var NO_SK_LAMASearchField;
		var NAMA_PERUSAHAANSearchField;
		var ALAMATSearchField;
		var PERUNTUKANSearchField;
		var ALAMAT_LOKASISearchField;
		var TGL_PERMOHONANSearchField;
		var TGL_BERLAKUSearchField;
		var TGL_BERAKHIRSearchField;
		var STATUSSearchField;
		var STATUS_SURVEYSearchField;
				
		var otoar_dbTask = 'CREATE';
		var otoar_dbTaskMessage = 'Tambah';
		var otoar_dbPermission = 'CRUD';
		var otoar_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function otoar_switchToGrid(){
			otoar_formPanel.setDisabled(true);
			otoar_gridPanel.setDisabled(false);
			otoar_formWindow.hide();
		}
		
		function otoar_switchToForm(){
			otoar_gridPanel.setDisabled(true);
			otoar_formPanel.setDisabled(false);
			otoar_formWindow.show();
		}
		
		function otoar_confirmAdd(){
			otoar_dbTask = 'CREATE';
			otoar_dbTaskMessage = 'created';
			otoar_resetForm();
			otoar_switchToForm();
		}
		
		function otoar_confirmUpdate(){
			if(otoar_gridPanel.selModel.getCount() == 1) {
				otoar_dbTask = 'UPDATE';
				otoar_dbTaskMessage = 'updated';
				otoar_switchToForm();
				otoar_setForm();
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
		
		function otoar_confirmDelete(){
			if(otoar_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, otoar_delete);
			}else if(otoar_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, otoar_delete);
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
		
		function otoar_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(otoar_dbPermission)==false && pattC.test(otoar_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(otoar_confirmFormValid()){
					var ID_TROTOARValue = '';
					var ID_PEMOHONValue = '';
					var JENIS_PERMOHONANValue = '';
					var NO_SKValue = '';
					var NO_SK_LAMAValue = '';
					var NAMA_PERUSAHAANValue = '';
					var ALAMATValue = '';
					var PERUNTUKANValue = '';
					var ALAMAT_LOKASIValue = '';
					var TGL_PERMOHONANValue = '';
					var TGL_BERLAKUValue = '';
					var TGL_BERAKHIRValue = '';
					var STATUSValue = '';
					var STATUS_SURVEYValue = '';
										
					ID_TROTOARValue = ID_TROTOARField.getValue();
					ID_PEMOHONValue = ID_PEMOHONField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					NO_SKValue = NO_SKField.getValue();
					NO_SK_LAMAValue = NO_SK_LAMAField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					ALAMATValue = ALAMATField.getValue();
					PERUNTUKANValue = PERUNTUKANField.getValue();
					ALAMAT_LOKASIValue = ALAMAT_LOKASIField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					TGL_BERLAKUValue = TGL_BERLAKUField.getValue();
					TGL_BERAKHIRValue = TGL_BERAKHIRField.getValue();
					STATUSValue = STATUSField.getValue();
					STATUS_SURVEYValue = STATUS_SURVEYField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_trotoar/switchAction',
						params: {							
							ID_TROTOAR : ID_TROTOARValue,
							ID_PEMOHON : ID_PEMOHONValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							NO_SK : NO_SKValue,
							NO_SK_LAMA : NO_SK_LAMAValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							ALAMAT : ALAMATValue,
							PERUNTUKAN : PERUNTUKANValue,
							ALAMAT_LOKASI : ALAMAT_LOKASIValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							TGL_BERLAKU : TGL_BERLAKUValue,
							TGL_BERAKHIR : TGL_BERAKHIRValue,
							STATUS : STATUSValue,
							STATUS_SURVEY : STATUS_SURVEYValue,
							action : otoar_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									otoar_dataStore.reload();
									otoar_resetForm();
									otoar_switchToGrid();
									otoar_gridPanel.getSelectionModel().deselectAll();
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
		
		function otoar_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(otoar_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = otoar_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< otoar_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_TROTOAR);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_trotoar/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									otoar_dataStore.reload();
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
		
		function otoar_refresh(){
			otoar_dbListAction = "GETLIST";
			otoar_gridSearchField.reset();
			otoar_searchPanel.getForm().reset();
			otoar_dataStore.proxy.extraParams = { action : 'GETLIST' };
			otoar_dataStore.proxy.extraParams.query = "";
			otoar_dataStore.currentPage = 1;
			otoar_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function otoar_confirmFormValid(){
			return otoar_formPanel.getForm().isValid();
		}
		
		function otoar_resetForm(){
			otoar_dbTask = 'CREATE';
			otoar_dbTaskMessage = 'create';
			otoar_formPanel.getForm().reset();
			ID_TROTOARField.setValue(0);
		}
		
		function otoar_setForm(){
			otoar_dbTask = 'UPDATE';
            otoar_dbTaskMessage = 'update';
			
			var record = otoar_gridPanel.getSelectionModel().getSelection()[0];
			ID_TROTOARField.setValue(record.data.ID_TROTOAR);
			ID_PEMOHONField.setValue(record.data.ID_PEMOHON);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			NO_SKField.setValue(record.data.NO_SK);
			NO_SK_LAMAField.setValue(record.data.NO_SK_LAMA);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			ALAMATField.setValue(record.data.ALAMAT);
			PERUNTUKANField.setValue(record.data.PERUNTUKAN);
			ALAMAT_LOKASIField.setValue(record.data.ALAMAT_LOKASI);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			TGL_BERLAKUField.setValue(record.data.TGL_BERLAKU);
			TGL_BERAKHIRField.setValue(record.data.TGL_BERAKHIR);
			STATUSField.setValue(record.data.STATUS);
			STATUS_SURVEYField.setValue(record.data.STATUS_SURVEY);
					}
		
		function otoar_showSearchWindow(){
			otoar_searchWindow.show();
		}
		
		function otoar_search(){
			otoar_gridSearchField.reset();
			
			var ID_PEMOHONValue = '';
			var JENIS_PERMOHONANValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var NAMA_PERUSAHAANValue = '';
			var ALAMATValue = '';
			var PERUNTUKANValue = '';
			var ALAMAT_LOKASIValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_BERLAKUValue = '';
			var TGL_BERAKHIRValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
						
			ID_PEMOHONValue = ID_PEMOHONSearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			NO_SK_LAMAValue = NO_SK_LAMASearchField.getValue();
			NAMA_PERUSAHAANValue = NAMA_PERUSAHAANSearchField.getValue();
			ALAMATValue = ALAMATSearchField.getValue();
			PERUNTUKANValue = PERUNTUKANSearchField.getValue();
			ALAMAT_LOKASIValue = ALAMAT_LOKASISearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			TGL_BERLAKUValue = TGL_BERLAKUSearchField.getValue();
			TGL_BERAKHIRValue = TGL_BERAKHIRSearchField.getValue();
			STATUSValue = STATUSSearchField.getValue();
			STATUS_SURVEYValue = STATUS_SURVEYSearchField.getValue();
			otoar_dbListAction = "SEARCH";
			otoar_dataStore.proxy.extraParams = { 
				ID_PEMOHON : ID_PEMOHONValue,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				NO_SK : NO_SKValue,
				NO_SK_LAMA : NO_SK_LAMAValue,
				NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
				ALAMAT : ALAMATValue,
				PERUNTUKAN : PERUNTUKANValue,
				ALAMAT_LOKASI : ALAMAT_LOKASIValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				TGL_BERLAKU : TGL_BERLAKUValue,
				TGL_BERAKHIR : TGL_BERAKHIRValue,
				STATUS : STATUSValue,
				STATUS_SURVEY : STATUS_SURVEYValue,
				action : 'SEARCH'
			};
			otoar_dataStore.currentPage = 1;
			otoar_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function otoar_printExcel(outputType){
			var searchText = "";
			var ID_PEMOHONValue = '';
			var JENIS_PERMOHONANValue = '';
			var NO_SKValue = '';
			var NO_SK_LAMAValue = '';
			var NAMA_PERUSAHAANValue = '';
			var ALAMATValue = '';
			var PERUNTUKANValue = '';
			var ALAMAT_LOKASIValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_BERLAKUValue = '';
			var TGL_BERAKHIRValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
			
			if(otoar_dataStore.proxy.extraParams.query!==null){searchText = otoar_dataStore.proxy.extraParams.query;}
			if(otoar_dataStore.proxy.extraParams.ID_PEMOHON!==null){ID_PEMOHONValue = otoar_dataStore.proxy.extraParams.ID_PEMOHON;}
			if(otoar_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = otoar_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			if(otoar_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = otoar_dataStore.proxy.extraParams.NO_SK;}
			if(otoar_dataStore.proxy.extraParams.NO_SK_LAMA!==null){NO_SK_LAMAValue = otoar_dataStore.proxy.extraParams.NO_SK_LAMA;}
			if(otoar_dataStore.proxy.extraParams.NAMA_PERUSAHAAN!==null){NAMA_PERUSAHAANValue = otoar_dataStore.proxy.extraParams.NAMA_PERUSAHAAN;}
			if(otoar_dataStore.proxy.extraParams.ALAMAT!==null){ALAMATValue = otoar_dataStore.proxy.extraParams.ALAMAT;}
			if(otoar_dataStore.proxy.extraParams.PERUNTUKAN!==null){PERUNTUKANValue = otoar_dataStore.proxy.extraParams.PERUNTUKAN;}
			if(otoar_dataStore.proxy.extraParams.ALAMAT_LOKASI!==null){ALAMAT_LOKASIValue = otoar_dataStore.proxy.extraParams.ALAMAT_LOKASI;}
			if(otoar_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = otoar_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(otoar_dataStore.proxy.extraParams.TGL_BERLAKU!==null){TGL_BERLAKUValue = otoar_dataStore.proxy.extraParams.TGL_BERLAKU;}
			if(otoar_dataStore.proxy.extraParams.TGL_BERAKHIR!==null){TGL_BERAKHIRValue = otoar_dataStore.proxy.extraParams.TGL_BERAKHIR;}
			if(otoar_dataStore.proxy.extraParams.STATUS!==null){STATUSValue = otoar_dataStore.proxy.extraParams.STATUS;}
			if(otoar_dataStore.proxy.extraParams.STATUS_SURVEY!==null){STATUS_SURVEYValue = otoar_dataStore.proxy.extraParams.STATUS_SURVEY;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_trotoar/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_PEMOHON : ID_PEMOHONValue,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					NO_SK : NO_SKValue,
					NO_SK_LAMA : NO_SK_LAMAValue,
					NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
					ALAMAT : ALAMATValue,
					PERUNTUKAN : PERUNTUKANValue,
					ALAMAT_LOKASI : ALAMAT_LOKASIValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					TGL_BERLAKU : TGL_BERLAKUValue,
					TGL_BERAKHIR : TGL_BERAKHIRValue,
					STATUS : STATUSValue,
					STATUS_SURVEY : STATUS_SURVEYValue,
					currentAction : otoar_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/trotoar_list.xls');
							}else{
								window.open('./print/trotoar_list.html','otoarlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		otoar_dataStore = Ext.create('Ext.data.Store',{
			id : 'otoar_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_trotoar/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_TROTOAR'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_TROTOAR', type : 'int', mapping : 'ID_TROTOAR' },
				{ name : 'ID_PEMOHON', type : 'int', mapping : 'ID_PEMOHON' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'NO_SK_LAMA', type : 'string', mapping : 'NO_SK_LAMA' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'ALAMAT', type : 'string', mapping : 'ALAMAT' },
				{ name : 'PERUNTUKAN', type : 'string', mapping : 'PERUNTUKAN' },
				{ name : 'ALAMAT_LOKASI', type : 'string', mapping : 'ALAMAT_LOKASI' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_PERMOHONAN' },
				{ name : 'TGL_BERLAKU', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_BERLAKU' },
				{ name : 'TGL_BERAKHIR', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_BERAKHIR' },
				{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
				{ name : 'STATUS_SURVEY', type : 'int', mapping : 'STATUS_SURVEY' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		otoar_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						otoar_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						otoar_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						otoar_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						otoar_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						otoar_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						otoar_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						otoar_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						otoar_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var otoar_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : otoar_confirmAdd
		});
		var otoar_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : otoar_confirmUpdate
		});
		var otoar_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : otoar_confirmDelete
		});
		var otoar_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : otoar_refresh
		});
		var otoar_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : otoar_showSearchWindow
		});
		var otoar_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				otoar_printExcel('PRINT');
			}
		});
		var otoar_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				otoar_printExcel('EXCEL');
			}
		});
		
		var otoar_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : otoar_confirmUpdate
		});
		var otoar_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : otoar_confirmDelete
		});
		var otoar_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : otoar_refresh
		});
		otoar_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'otoar_contextMenu',
			items: [
				otoar_contextMenuEdit,otoar_contextMenuDelete,'-',otoar_contextMenuRefresh
			]
		});
		
		otoar_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : otoar_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						otoar_dataStore.proxy.extraParams = { action : 'GETLIST'};
						otoar_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		otoar_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'otoar_gridPanel',
			constrain : true,
			store : otoar_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'otoarGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						otoar_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : otoar_shorcut,
			columns : [
				{
					text : 'ID_PEMOHON',
					dataIndex : 'ID_PEMOHON',
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
					text : 'NAMA_PERUSAHAAN',
					dataIndex : 'NAMA_PERUSAHAAN',
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
					text : 'PERUNTUKAN',
					dataIndex : 'PERUNTUKAN',
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
					text : 'TGL_PERMOHONAN',
					dataIndex : 'TGL_PERMOHONAN',
					width : 100,
					sortable : false
				},
				{
					text : 'TGL_BERLAKU',
					dataIndex : 'TGL_BERLAKU',
					width : 100,
					sortable : false
				},
				{
					text : 'TGL_BERAKHIR',
					dataIndex : 'TGL_BERAKHIR',
					width : 100,
					sortable : false
				},
				{
					text : 'STATUS',
					dataIndex : 'STATUS',
					width : 100,
					sortable : false
				},
				{
					text : 'STATUS_SURVEY',
					dataIndex : 'STATUS_SURVEY',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				otoar_addButton,
				otoar_editButton,
				otoar_deleteButton,
				otoar_gridSearchField,
				otoar_searchButton,
				otoar_refreshButton,
				otoar_printButton,
				otoar_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : otoar_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					otoar_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_TROTOARField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TROTOARField',
			name : 'ID_TROTOAR',
			fieldLabel : 'ID_TROTOAR<font color=red>*</font>',
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
		JENIS_PERMOHONANField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
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
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		});
		ALAMATField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 100
		});
		PERUNTUKANField = Ext.create('Ext.form.TextField',{
			id : 'PERUNTUKANField',
			name : 'PERUNTUKAN',
			fieldLabel : 'PERUNTUKAN',
			maxLength : 50
		});
		ALAMAT_LOKASIField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASIField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'ALAMAT_LOKASI',
			maxLength : 100
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		});
		TGL_BERLAKUField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERLAKUField',
			name : 'TGL_BERLAKU',
			fieldLabel : 'TGL_BERLAKU',
			maxLength : 0
		});
		TGL_BERAKHIRField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERAKHIRField',
			name : 'TGL_BERAKHIR',
			fieldLabel : 'TGL_BERAKHIR',
			maxLength : 0
		});
		STATUSField = Ext.create('Ext.form.NumberField',{
			id : 'STATUSField',
			name : 'STATUS',
			fieldLabel : 'STATUS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		STATUS_SURVEYField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_SURVEYField',
			name : 'STATUS_SURVEY',
			fieldLabel : 'STATUS_SURVEY',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var otoar_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : otoar_save
		});
		var otoar_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				otoar_resetForm();
				otoar_switchToGrid();
			}
		});
		otoar_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_TROTOARField,
						ID_PEMOHONField,
						JENIS_PERMOHONANField,
						NO_SKField,
						NO_SK_LAMAField,
						NAMA_PERUSAHAANField,
						ALAMATField,
						PERUNTUKANField,
						ALAMAT_LOKASIField,
						TGL_PERMOHONANField,
						TGL_BERLAKUField,
						TGL_BERAKHIRField,
						STATUSField,
						STATUS_SURVEYField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [otoar_saveButton,otoar_cancelButton]
		});
		otoar_formWindow = Ext.create('Ext.window.Window',{
			id : 'otoar_formWindow',
			renderTo : 'otoarSaveWindow',
			title : globalFormAddEditTitle + ' ' + otoar_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [otoar_formPanel]
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
		JENIS_PERMOHONANSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JENIS_PERMOHONANSearchField',
			name : 'JENIS_PERMOHONAN',
			fieldLabel : 'JENIS_PERMOHONAN',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
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
		NAMA_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANSearchField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		
		});
		ALAMATSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMATSearchField',
			name : 'ALAMAT',
			fieldLabel : 'ALAMAT',
			maxLength : 100
		
		});
		PERUNTUKANSearchField = Ext.create('Ext.form.TextField',{
			id : 'PERUNTUKANSearchField',
			name : 'PERUNTUKAN',
			fieldLabel : 'PERUNTUKAN',
			maxLength : 50
		
		});
		ALAMAT_LOKASISearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_LOKASISearchField',
			name : 'ALAMAT_LOKASI',
			fieldLabel : 'ALAMAT_LOKASI',
			maxLength : 100
		
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		TGL_BERLAKUSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERLAKUSearchField',
			name : 'TGL_BERLAKU',
			fieldLabel : 'TGL_BERLAKU',
			maxLength : 0
		
		});
		TGL_BERAKHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_BERAKHIRSearchField',
			name : 'TGL_BERAKHIR',
			fieldLabel : 'TGL_BERAKHIR',
			maxLength : 0
		
		});
		STATUSSearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUSSearchField',
			name : 'STATUS',
			fieldLabel : 'STATUS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		STATUS_SURVEYSearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUS_SURVEYSearchField',
			name : 'STATUS_SURVEY',
			fieldLabel : 'STATUS_SURVEY',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var otoar_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : otoar_search
		});
		var otoar_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				otoar_searchWindow.hide();
			}
		});
		otoar_searchPanel = Ext.create('Ext.form.Panel', {
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
						JENIS_PERMOHONANSearchField,
						NO_SKSearchField,
						NO_SK_LAMASearchField,
						NAMA_PERUSAHAANSearchField,
						ALAMATSearchField,
						PERUNTUKANSearchField,
						ALAMAT_LOKASISearchField,
						TGL_PERMOHONANSearchField,
						TGL_BERLAKUSearchField,
						TGL_BERAKHIRSearchField,
						STATUSSearchField,
						STATUS_SURVEYSearchField,
						]
				}],
			buttons : [otoar_searchingButton,otoar_cancelSearchButton]
		});
		otoar_searchWindow = Ext.create('Ext.window.Window',{
			id : 'otoar_searchWindow',
			renderTo : 'otoarSearchWindow',
			title : globalFormSearchTitle + ' ' + otoar_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [otoar_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="otoarSaveWindow"></div>
<div id="otoarSearchWindow"></div>
<div class="span12" id="otoarGrid"></div>