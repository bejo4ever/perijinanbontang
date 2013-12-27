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
		var NO_REGField;
		var NO_SKField;
		var NAMA_DIREKTURField;
		var JENIS_PERMOHONANField;
		var TGL_PERMOHONANField;
		var TGL_AWALField;
		var TGL_AKHIRField;
		var STATUSField;
		var STATUS_SURVEYField;
				
		var ID_IJIN_LINGKUNGAN_INTISearchField;
		var NO_REGSearchField;
		var NO_SKSearchField;
		var NAMA_DIREKTURSearchField;
		var JENIS_PERMOHONANSearchField;
		var TGL_PERMOHONANSearchField;
		var TGL_AWALSearchField;
		var TGL_AKHIRSearchField;
		var STATUSSearchField;
		var STATUS_SURVEYSearchField;
				
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
					var NO_REGValue = '';
					var NO_SKValue = '';
					var NAMA_DIREKTURValue = '';
					var JENIS_PERMOHONANValue = '';
					var TGL_PERMOHONANValue = '';
					var TGL_AWALValue = '';
					var TGL_AKHIRValue = '';
					var STATUSValue = '';
					var STATUS_SURVEYValue = '';
										
					ID_IJIN_LINGUKANGANValue = ID_IJIN_LINGUKANGANField.getValue();
					ID_IJIN_LINGKUNGAN_INTIValue = ID_IJIN_LINGKUNGAN_INTIField.getValue();
					NO_REGValue = NO_REGField.getValue();
					NO_SKValue = NO_SKField.getValue();
					NAMA_DIREKTURValue = NAMA_DIREKTURField.getValue();
					JENIS_PERMOHONANValue = JENIS_PERMOHONANField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					TGL_AWALValue = TGL_AWALField.getValue();
					TGL_AKHIRValue = TGL_AKHIRField.getValue();
					STATUSValue = STATUSField.getValue();
					STATUS_SURVEYValue = STATUS_SURVEYField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_ijin_lingkungan/switchAction',
						params: {							
							ID_IJIN_LINGUKANGAN : ID_IJIN_LINGUKANGANValue,
							ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
							NO_REG : NO_REGValue,
							NO_SK : NO_SKValue,
							NAMA_DIREKTUR : NAMA_DIREKTURValue,
							JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							TGL_AWAL : TGL_AWALValue,
							TGL_AKHIR : TGL_AKHIRValue,
							STATUS : STATUSValue,
							STATUS_SURVEY : STATUS_SURVEYValue,
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
			NO_REGField.setValue(record.data.NO_REG);
			NO_SKField.setValue(record.data.NO_SK);
			NAMA_DIREKTURField.setValue(record.data.NAMA_DIREKTUR);
			JENIS_PERMOHONANField.setValue(record.data.JENIS_PERMOHONAN);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			TGL_AWALField.setValue(record.data.TGL_AWAL);
			TGL_AKHIRField.setValue(record.data.TGL_AKHIR);
			STATUSField.setValue(record.data.STATUS);
			STATUS_SURVEYField.setValue(record.data.STATUS_SURVEY);
					}
		
		function in_lingkungan_showSearchWindow(){
			in_lingkungan_searchWindow.show();
		}
		
		function in_lingkungan_search(){
			in_lingkungan_gridSearchField.reset();
			
			var ID_IJIN_LINGKUNGAN_INTIValue = '';
			var NO_REGValue = '';
			var NO_SKValue = '';
			var NAMA_DIREKTURValue = '';
			var JENIS_PERMOHONANValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_AWALValue = '';
			var TGL_AKHIRValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
						
			ID_IJIN_LINGKUNGAN_INTIValue = ID_IJIN_LINGKUNGAN_INTISearchField.getValue();
			NO_REGValue = NO_REGSearchField.getValue();
			NO_SKValue = NO_SKSearchField.getValue();
			NAMA_DIREKTURValue = NAMA_DIREKTURSearchField.getValue();
			JENIS_PERMOHONANValue = JENIS_PERMOHONANSearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			TGL_AWALValue = TGL_AWALSearchField.getValue();
			TGL_AKHIRValue = TGL_AKHIRSearchField.getValue();
			STATUSValue = STATUSSearchField.getValue();
			STATUS_SURVEYValue = STATUS_SURVEYSearchField.getValue();
			in_lingkungan_dbListAction = "SEARCH";
			in_lingkungan_dataStore.proxy.extraParams = { 
				ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
				NO_REG : NO_REGValue,
				NO_SK : NO_SKValue,
				NAMA_DIREKTUR : NAMA_DIREKTURValue,
				JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				TGL_AWAL : TGL_AWALValue,
				TGL_AKHIR : TGL_AKHIRValue,
				STATUS : STATUSValue,
				STATUS_SURVEY : STATUS_SURVEYValue,
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
			var NO_REGValue = '';
			var NO_SKValue = '';
			var NAMA_DIREKTURValue = '';
			var JENIS_PERMOHONANValue = '';
			var TGL_PERMOHONANValue = '';
			var TGL_AWALValue = '';
			var TGL_AKHIRValue = '';
			var STATUSValue = '';
			var STATUS_SURVEYValue = '';
			
			if(in_lingkungan_dataStore.proxy.extraParams.query!==null){searchText = in_lingkungan_dataStore.proxy.extraParams.query;}
			if(in_lingkungan_dataStore.proxy.extraParams.ID_IJIN_LINGKUNGAN_INTI!==null){ID_IJIN_LINGKUNGAN_INTIValue = in_lingkungan_dataStore.proxy.extraParams.ID_IJIN_LINGKUNGAN_INTI;}
			if(in_lingkungan_dataStore.proxy.extraParams.NO_REG!==null){NO_REGValue = in_lingkungan_dataStore.proxy.extraParams.NO_REG;}
			if(in_lingkungan_dataStore.proxy.extraParams.NO_SK!==null){NO_SKValue = in_lingkungan_dataStore.proxy.extraParams.NO_SK;}
			if(in_lingkungan_dataStore.proxy.extraParams.NAMA_DIREKTUR!==null){NAMA_DIREKTURValue = in_lingkungan_dataStore.proxy.extraParams.NAMA_DIREKTUR;}
			if(in_lingkungan_dataStore.proxy.extraParams.JENIS_PERMOHONAN!==null){JENIS_PERMOHONANValue = in_lingkungan_dataStore.proxy.extraParams.JENIS_PERMOHONAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = in_lingkungan_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(in_lingkungan_dataStore.proxy.extraParams.TGL_AWAL!==null){TGL_AWALValue = in_lingkungan_dataStore.proxy.extraParams.TGL_AWAL;}
			if(in_lingkungan_dataStore.proxy.extraParams.TGL_AKHIR!==null){TGL_AKHIRValue = in_lingkungan_dataStore.proxy.extraParams.TGL_AKHIR;}
			if(in_lingkungan_dataStore.proxy.extraParams.STATUS!==null){STATUSValue = in_lingkungan_dataStore.proxy.extraParams.STATUS;}
			if(in_lingkungan_dataStore.proxy.extraParams.STATUS_SURVEY!==null){STATUS_SURVEYValue = in_lingkungan_dataStore.proxy.extraParams.STATUS_SURVEY;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_ijin_lingkungan/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_IJIN_LINGKUNGAN_INTI : ID_IJIN_LINGKUNGAN_INTIValue,
					NO_REG : NO_REGValue,
					NO_SK : NO_SKValue,
					NAMA_DIREKTUR : NAMA_DIREKTURValue,
					JENIS_PERMOHONAN : JENIS_PERMOHONANValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					TGL_AWAL : TGL_AWALValue,
					TGL_AKHIR : TGL_AKHIRValue,
					STATUS : STATUSValue,
					STATUS_SURVEY : STATUS_SURVEYValue,
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
				{ name : 'NO_REG', type : 'string', mapping : 'NO_REG' },
				{ name : 'NO_SK', type : 'string', mapping : 'NO_SK' },
				{ name : 'NAMA_DIREKTUR', type : 'string', mapping : 'NAMA_DIREKTUR' },
				{ name : 'JENIS_PERMOHONAN', type : 'int', mapping : 'JENIS_PERMOHONAN' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_PERMOHONAN' },
				{ name : 'TGL_AWAL', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_AWAL' },
				{ name : 'TGL_AKHIR', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_AKHIR' },
				{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
				{ name : 'STATUS_SURVEY', type : 'int', mapping : 'STATUS_SURVEY' },
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
					text : 'NO_REG',
					dataIndex : 'NO_REG',
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
					text : 'NAMA_DIREKTUR',
					dataIndex : 'NAMA_DIREKTUR',
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
					text : 'TGL_PERMOHONAN',
					dataIndex : 'TGL_PERMOHONAN',
					width : 100,
					sortable : false
				},
				{
					text : 'TGL_AWAL',
					dataIndex : 'TGL_AWAL',
					width : 100,
					sortable : false
				},
				{
					text : 'TGL_AKHIR',
					dataIndex : 'TGL_AKHIR',
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
		NO_REGField = Ext.create('Ext.form.TextField',{
			id : 'NO_REGField',
			name : 'NO_REG',
			fieldLabel : 'NO_REG',
			maxLength : 50
		});
		NO_SKField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		});
		NAMA_DIREKTURField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKTURField',
			name : 'NAMA_DIREKTUR',
			fieldLabel : 'NAMA_DIREKTUR',
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
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		});
		TGL_AWALField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AWALField',
			name : 'TGL_AWAL',
			fieldLabel : 'TGL_AWAL',
			maxLength : 0
		});
		TGL_AKHIRField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AKHIRField',
			name : 'TGL_AKHIR',
			fieldLabel : 'TGL_AKHIR',
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
						NO_REGField,
						NO_SKField,
						NAMA_DIREKTURField,
						JENIS_PERMOHONANField,
						TGL_PERMOHONANField,
						TGL_AWALField,
						TGL_AKHIRField,
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
		NO_REGSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_REGSearchField',
			name : 'NO_REG',
			fieldLabel : 'NO_REG',
			maxLength : 50
		
		});
		NO_SKSearchField = Ext.create('Ext.form.TextField',{
			id : 'NO_SKSearchField',
			name : 'NO_SK',
			fieldLabel : 'NO_SK',
			maxLength : 50
		
		});
		NAMA_DIREKTURSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_DIREKTURSearchField',
			name : 'NAMA_DIREKTUR',
			fieldLabel : 'NAMA_DIREKTUR',
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
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		TGL_AWALSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AWALSearchField',
			name : 'TGL_AWAL',
			fieldLabel : 'TGL_AWAL',
			maxLength : 0
		
		});
		TGL_AKHIRSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_AKHIRSearchField',
			name : 'TGL_AKHIR',
			fieldLabel : 'TGL_AKHIR',
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
						NO_REGSearchField,
						NO_SKSearchField,
						NAMA_DIREKTURSearchField,
						JENIS_PERMOHONANSearchField,
						TGL_PERMOHONANSearchField,
						TGL_AWALSearchField,
						TGL_AKHIRSearchField,
						STATUSSearchField,
						STATUS_SURVEYSearchField,
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