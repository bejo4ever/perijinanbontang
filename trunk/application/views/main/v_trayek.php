<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ayek_componentItemTitle="AYEK";
		var ayek_dataStore;
		
		var ayek_shorcut;
		var ayek_contextMenu;
		var ayek_gridSearchField;
		var ayek_gridPanel;
		var ayek_formPanel;
		var ayek_formWindow;
		var ayek_searchPanel;
		var ayek_searchWindow;
		
		var ID_TRAYEKField;
		var ID_TRAYEK_INTIField;
		var KODE_TRAYEKField;
		var NOMOR_UBField;
		var TGL_PERMOHONANField;
		var NAMA_PERUSAHAANField;
		var NAMA_PEMOHONField;
				
		var ID_TRAYEK_INTISearchField;
		var KODE_TRAYEKSearchField;
		var NOMOR_UBSearchField;
		var TGL_PERMOHONANSearchField;
		var NAMA_PERUSAHAANSearchField;
		var NAMA_PEMOHONSearchField;
				
		var ayek_dbTask = 'CREATE';
		var ayek_dbTaskMessage = 'Tambah';
		var ayek_dbPermission = 'CRUD';
		var ayek_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ayek_switchToGrid(){
			ayek_formPanel.setDisabled(true);
			ayek_gridPanel.setDisabled(false);
			ayek_formWindow.hide();
		}
		
		function ayek_switchToForm(){
			ayek_gridPanel.setDisabled(true);
			ayek_formPanel.setDisabled(false);
			ayek_formWindow.show();
		}
		
		function ayek_confirmAdd(){
			ayek_dbTask = 'CREATE';
			ayek_dbTaskMessage = 'created';
			ayek_resetForm();
			ayek_switchToForm();
		}
		
		function ayek_confirmUpdate(){
			if(ayek_gridPanel.selModel.getCount() == 1) {
				ayek_dbTask = 'UPDATE';
				ayek_dbTaskMessage = 'updated';
				ayek_switchToForm();
				ayek_setForm();
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
		
		function ayek_confirmDelete(){
			if(ayek_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ayek_delete);
			}else if(ayek_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ayek_delete);
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
		
		function ayek_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ayek_dbPermission)==false && pattC.test(ayek_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ayek_confirmFormValid()){
					var ID_TRAYEKValue = '';
					var ID_TRAYEK_INTIValue = '';
					var KODE_TRAYEKValue = '';
					var NOMOR_UBValue = '';
					var TGL_PERMOHONANValue = '';
					var NAMA_PERUSAHAANValue = '';
					var NAMA_PEMOHONValue = '';
										
					ID_TRAYEKValue = ID_TRAYEKField.getValue();
					ID_TRAYEK_INTIValue = ID_TRAYEK_INTIField.getValue();
					KODE_TRAYEKValue = KODE_TRAYEKField.getValue();
					NOMOR_UBValue = NOMOR_UBField.getValue();
					TGL_PERMOHONANValue = TGL_PERMOHONANField.getValue();
					NAMA_PERUSAHAANValue = NAMA_PERUSAHAANField.getValue();
					NAMA_PEMOHONValue = NAMA_PEMOHONField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_trayek/switchAction',
						params: {							
							ID_TRAYEK : ID_TRAYEKValue,
							ID_TRAYEK_INTI : ID_TRAYEK_INTIValue,
							KODE_TRAYEK : KODE_TRAYEKValue,
							NOMOR_UB : NOMOR_UBValue,
							TGL_PERMOHONAN : TGL_PERMOHONANValue,
							NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
							NAMA_PEMOHON : NAMA_PEMOHONValue,
							action : ayek_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ayek_dataStore.reload();
									ayek_resetForm();
									ayek_switchToGrid();
									ayek_gridPanel.getSelectionModel().deselectAll();
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
		
		function ayek_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ayek_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ayek_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ayek_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_TRAYEK);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_trayek/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ayek_dataStore.reload();
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
		
		function ayek_refresh(){
			ayek_dbListAction = "GETLIST";
			ayek_gridSearchField.reset();
			ayek_searchPanel.getForm().reset();
			ayek_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ayek_dataStore.proxy.extraParams.query = "";
			ayek_dataStore.currentPage = 1;
			ayek_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ayek_confirmFormValid(){
			return ayek_formPanel.getForm().isValid();
		}
		
		function ayek_resetForm(){
			ayek_dbTask = 'CREATE';
			ayek_dbTaskMessage = 'create';
			ayek_formPanel.getForm().reset();
			ID_TRAYEKField.setValue(0);
		}
		
		function ayek_setForm(){
			ayek_dbTask = 'UPDATE';
            ayek_dbTaskMessage = 'update';
			
			var record = ayek_gridPanel.getSelectionModel().getSelection()[0];
			ID_TRAYEKField.setValue(record.data.ID_TRAYEK);
			ID_TRAYEK_INTIField.setValue(record.data.ID_TRAYEK_INTI);
			KODE_TRAYEKField.setValue(record.data.KODE_TRAYEK);
			NOMOR_UBField.setValue(record.data.NOMOR_UB);
			TGL_PERMOHONANField.setValue(record.data.TGL_PERMOHONAN);
			NAMA_PERUSAHAANField.setValue(record.data.NAMA_PERUSAHAAN);
			NAMA_PEMOHONField.setValue(record.data.NAMA_PEMOHON);
					}
		
		function ayek_showSearchWindow(){
			ayek_searchWindow.show();
		}
		
		function ayek_search(){
			ayek_gridSearchField.reset();
			
			var ID_TRAYEK_INTIValue = '';
			var KODE_TRAYEKValue = '';
			var NOMOR_UBValue = '';
			var TGL_PERMOHONANValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NAMA_PEMOHONValue = '';
						
			ID_TRAYEK_INTIValue = ID_TRAYEK_INTISearchField.getValue();
			KODE_TRAYEKValue = KODE_TRAYEKSearchField.getValue();
			NOMOR_UBValue = NOMOR_UBSearchField.getValue();
			TGL_PERMOHONANValue = TGL_PERMOHONANSearchField.getValue();
			NAMA_PERUSAHAANValue = NAMA_PERUSAHAANSearchField.getValue();
			NAMA_PEMOHONValue = NAMA_PEMOHONSearchField.getValue();
			ayek_dbListAction = "SEARCH";
			ayek_dataStore.proxy.extraParams = { 
				ID_TRAYEK_INTI : ID_TRAYEK_INTIValue,
				KODE_TRAYEK : KODE_TRAYEKValue,
				NOMOR_UB : NOMOR_UBValue,
				TGL_PERMOHONAN : TGL_PERMOHONANValue,
				NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
				NAMA_PEMOHON : NAMA_PEMOHONValue,
				action : 'SEARCH'
			};
			ayek_dataStore.currentPage = 1;
			ayek_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ayek_printExcel(outputType){
			var searchText = "";
			var ID_TRAYEK_INTIValue = '';
			var KODE_TRAYEKValue = '';
			var NOMOR_UBValue = '';
			var TGL_PERMOHONANValue = '';
			var NAMA_PERUSAHAANValue = '';
			var NAMA_PEMOHONValue = '';
			
			if(ayek_dataStore.proxy.extraParams.query!==null){searchText = ayek_dataStore.proxy.extraParams.query;}
			if(ayek_dataStore.proxy.extraParams.ID_TRAYEK_INTI!==null){ID_TRAYEK_INTIValue = ayek_dataStore.proxy.extraParams.ID_TRAYEK_INTI;}
			if(ayek_dataStore.proxy.extraParams.KODE_TRAYEK!==null){KODE_TRAYEKValue = ayek_dataStore.proxy.extraParams.KODE_TRAYEK;}
			if(ayek_dataStore.proxy.extraParams.NOMOR_UB!==null){NOMOR_UBValue = ayek_dataStore.proxy.extraParams.NOMOR_UB;}
			if(ayek_dataStore.proxy.extraParams.TGL_PERMOHONAN!==null){TGL_PERMOHONANValue = ayek_dataStore.proxy.extraParams.TGL_PERMOHONAN;}
			if(ayek_dataStore.proxy.extraParams.NAMA_PERUSAHAAN!==null){NAMA_PERUSAHAANValue = ayek_dataStore.proxy.extraParams.NAMA_PERUSAHAAN;}
			if(ayek_dataStore.proxy.extraParams.NAMA_PEMOHON!==null){NAMA_PEMOHONValue = ayek_dataStore.proxy.extraParams.NAMA_PEMOHON;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_trayek/switchAction',
				params : {
					action : outputType,
					query : searchText,
					ID_TRAYEK_INTI : ID_TRAYEK_INTIValue,
					KODE_TRAYEK : KODE_TRAYEKValue,
					NOMOR_UB : NOMOR_UBValue,
					TGL_PERMOHONAN : TGL_PERMOHONANValue,
					NAMA_PERUSAHAAN : NAMA_PERUSAHAANValue,
					NAMA_PEMOHON : NAMA_PEMOHONValue,
					currentAction : ayek_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/trayek_list.xls');
							}else{
								window.open('./print/trayek_list.html','ayeklist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ayek_dataStore = Ext.create('Ext.data.Store',{
			id : 'ayek_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_trayek/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_TRAYEK'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_TRAYEK', type : 'int', mapping : 'ID_TRAYEK' },
				{ name : 'ID_TRAYEK_INTI', type : 'int', mapping : 'ID_TRAYEK_INTI' },
				{ name : 'KODE_TRAYEK', type : 'string', mapping : 'KODE_TRAYEK' },
				{ name : 'NOMOR_UB', type : 'string', mapping : 'NOMOR_UB' },
				{ name : 'TGL_PERMOHONAN', type : 'date', dateFormat : 'Y-m-d H:i:s', mapping : 'TGL_PERMOHONAN' },
				{ name : 'NAMA_PERUSAHAAN', type : 'string', mapping : 'NAMA_PERUSAHAAN' },
				{ name : 'NAMA_PEMOHON', type : 'string', mapping : 'NAMA_PEMOHON' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ayek_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ayek_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ayek_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ayek_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ayek_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ayek_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ayek_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ayek_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ayek_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ayek_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ayek_confirmAdd
		});
		var ayek_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ayek_confirmUpdate
		});
		var ayek_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ayek_confirmDelete
		});
		var ayek_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ayek_refresh
		});
		var ayek_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ayek_showSearchWindow
		});
		var ayek_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ayek_printExcel('PRINT');
			}
		});
		var ayek_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ayek_printExcel('EXCEL');
			}
		});
		
		var ayek_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ayek_confirmUpdate
		});
		var ayek_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ayek_confirmDelete
		});
		var ayek_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ayek_refresh
		});
		ayek_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ayek_contextMenu',
			items: [
				ayek_contextMenuEdit,ayek_contextMenuDelete,'-',ayek_contextMenuRefresh
			]
		});
		
		ayek_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ayek_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ayek_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ayek_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ayek_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ayek_gridPanel',
			constrain : true,
			store : ayek_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ayekGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ayek_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ayek_shorcut,
			columns : [
				{
					text : 'ID_TRAYEK_INTI',
					dataIndex : 'ID_TRAYEK_INTI',
					width : 100,
					sortable : false
				},
				{
					text : 'KODE_TRAYEK',
					dataIndex : 'KODE_TRAYEK',
					width : 100,
					sortable : false
				},
				{
					text : 'NOMOR_UB',
					dataIndex : 'NOMOR_UB',
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
					text : 'NAMA_PERUSAHAAN',
					dataIndex : 'NAMA_PERUSAHAAN',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA_PEMOHON',
					dataIndex : 'NAMA_PEMOHON',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ayek_addButton,
				ayek_editButton,
				ayek_deleteButton,
				ayek_gridSearchField,
				ayek_searchButton,
				ayek_refreshButton,
				ayek_printButton,
				ayek_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ayek_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ayek_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_TRAYEKField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TRAYEKField',
			name : 'ID_TRAYEK',
			fieldLabel : 'ID_TRAYEK<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		ID_TRAYEK_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TRAYEK_INTIField',
			name : 'ID_TRAYEK_INTI',
			fieldLabel : 'ID_TRAYEK_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		KODE_TRAYEKField = Ext.create('Ext.form.TextField',{
			id : 'KODE_TRAYEKField',
			name : 'KODE_TRAYEK',
			fieldLabel : 'KODE_TRAYEK',
			maxLength : 50
		});
		NOMOR_UBField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_UBField',
			name : 'NOMOR_UB',
			fieldLabel : 'NOMOR_UB',
			maxLength : 50
		});
		TGL_PERMOHONANField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		});
		NAMA_PERUSAHAANField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		});
		NAMA_PEMOHONField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMOHONField',
			name : 'NAMA_PEMOHON',
			fieldLabel : 'NAMA_PEMOHON',
			maxLength : 50
		});
		var ayek_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ayek_save
		});
		var ayek_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ayek_resetForm();
				ayek_switchToGrid();
			}
		});
		ayek_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_TRAYEKField,
						ID_TRAYEK_INTIField,
						KODE_TRAYEKField,
						NOMOR_UBField,
						TGL_PERMOHONANField,
						NAMA_PERUSAHAANField,
						NAMA_PEMOHONField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ayek_saveButton,ayek_cancelButton]
		});
		ayek_formWindow = Ext.create('Ext.window.Window',{
			id : 'ayek_formWindow',
			renderTo : 'ayekSaveWindow',
			title : globalFormAddEditTitle + ' ' + ayek_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ayek_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		ID_TRAYEK_INTISearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_TRAYEK_INTISearchField',
			name : 'ID_TRAYEK_INTI',
			fieldLabel : 'ID_TRAYEK_INTI',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		KODE_TRAYEKSearchField = Ext.create('Ext.form.TextField',{
			id : 'KODE_TRAYEKSearchField',
			name : 'KODE_TRAYEK',
			fieldLabel : 'KODE_TRAYEK',
			maxLength : 50
		
		});
		NOMOR_UBSearchField = Ext.create('Ext.form.TextField',{
			id : 'NOMOR_UBSearchField',
			name : 'NOMOR_UB',
			fieldLabel : 'NOMOR_UB',
			maxLength : 50
		
		});
		TGL_PERMOHONANSearchField = Ext.create('Ext.form.TextField',{
			id : 'TGL_PERMOHONANSearchField',
			name : 'TGL_PERMOHONAN',
			fieldLabel : 'TGL_PERMOHONAN',
			maxLength : 0
		
		});
		NAMA_PERUSAHAANSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PERUSAHAANSearchField',
			name : 'NAMA_PERUSAHAAN',
			fieldLabel : 'NAMA_PERUSAHAAN',
			maxLength : 50
		
		});
		NAMA_PEMOHONSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_PEMOHONSearchField',
			name : 'NAMA_PEMOHON',
			fieldLabel : 'NAMA_PEMOHON',
			maxLength : 50
		
		});
		var ayek_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ayek_search
		});
		var ayek_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ayek_searchWindow.hide();
			}
		});
		ayek_searchPanel = Ext.create('Ext.form.Panel', {
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
						ID_TRAYEK_INTISearchField,
						KODE_TRAYEKSearchField,
						NOMOR_UBSearchField,
						TGL_PERMOHONANSearchField,
						NAMA_PERUSAHAANSearchField,
						NAMA_PEMOHONSearchField,
						]
				}],
			buttons : [ayek_searchingButton,ayek_cancelSearchButton]
		});
		ayek_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ayek_searchWindow',
			renderTo : 'ayekSearchWindow',
			title : globalFormSearchTitle + ' ' + ayek_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ayek_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ayekSaveWindow"></div>
<div id="ayekSearchWindow"></div>
<div class="span12" id="ayekGrid"></div>