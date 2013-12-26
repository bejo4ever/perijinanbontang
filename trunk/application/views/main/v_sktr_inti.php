<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var tr_inti_componentItemTitle="TR_INTI";
		var tr_inti_dataStore;
		
		var tr_inti_shorcut;
		var tr_inti_contextMenu;
		var tr_inti_gridSearchField;
		var tr_inti_gridPanel;
		var tr_inti_formPanel;
		var tr_inti_formWindow;
		var tr_inti_searchPanel;
		var tr_inti_searchWindow;
		
		var ID_SKTR_INTIField;
		var FUNGSIField;
		var ALAMAT_BANGUNANField;
		var TINGGI_BANGUNANField;
		var LUAS_PERSILField;
		var LUAS_BANGUNANField;
				
		var FUNGSISearchField;
		var ALAMAT_BANGUNANSearchField;
		var TINGGI_BANGUNANSearchField;
		var LUAS_PERSILSearchField;
		var LUAS_BANGUNANSearchField;
				
		var tr_inti_dbTask = 'CREATE';
		var tr_inti_dbTaskMessage = 'Tambah';
		var tr_inti_dbPermission = 'CRUD';
		var tr_inti_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function tr_inti_switchToGrid(){
			tr_inti_formPanel.setDisabled(true);
			tr_inti_gridPanel.setDisabled(false);
			tr_inti_formWindow.hide();
		}
		
		function tr_inti_switchToForm(){
			tr_inti_gridPanel.setDisabled(true);
			tr_inti_formPanel.setDisabled(false);
			tr_inti_formWindow.show();
		}
		
		function tr_inti_confirmAdd(){
			tr_inti_dbTask = 'CREATE';
			tr_inti_dbTaskMessage = 'created';
			tr_inti_resetForm();
			tr_inti_switchToForm();
		}
		
		function tr_inti_confirmUpdate(){
			if(tr_inti_gridPanel.selModel.getCount() == 1) {
				tr_inti_dbTask = 'UPDATE';
				tr_inti_dbTaskMessage = 'updated';
				tr_inti_switchToForm();
				tr_inti_setForm();
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
		
		function tr_inti_confirmDelete(){
			if(tr_inti_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, tr_inti_delete);
			}else if(tr_inti_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, tr_inti_delete);
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
		
		function tr_inti_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(tr_inti_dbPermission)==false && pattC.test(tr_inti_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(tr_inti_confirmFormValid()){
					var ID_SKTR_INTIValue = '';
					var FUNGSIValue = '';
					var ALAMAT_BANGUNANValue = '';
					var TINGGI_BANGUNANValue = '';
					var LUAS_PERSILValue = '';
					var LUAS_BANGUNANValue = '';
										
					ID_SKTR_INTIValue = ID_SKTR_INTIField.getValue();
					FUNGSIValue = FUNGSIField.getValue();
					ALAMAT_BANGUNANValue = ALAMAT_BANGUNANField.getValue();
					TINGGI_BANGUNANValue = TINGGI_BANGUNANField.getValue();
					LUAS_PERSILValue = LUAS_PERSILField.getValue();
					LUAS_BANGUNANValue = LUAS_BANGUNANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_sktr_inti/switchAction',
						params: {							
							ID_SKTR_INTI : ID_SKTR_INTIValue,
							FUNGSI : FUNGSIValue,
							ALAMAT_BANGUNAN : ALAMAT_BANGUNANValue,
							TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
							LUAS_PERSIL : LUAS_PERSILValue,
							LUAS_BANGUNAN : LUAS_BANGUNANValue,
							action : tr_inti_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									tr_inti_dataStore.reload();
									tr_inti_resetForm();
									tr_inti_switchToGrid();
									tr_inti_gridPanel.getSelectionModel().deselectAll();
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
		
		function tr_inti_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(tr_inti_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = tr_inti_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< tr_inti_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_SKTR_INTI);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_sktr_inti/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									tr_inti_dataStore.reload();
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
		
		function tr_inti_refresh(){
			tr_inti_dbListAction = "GETLIST";
			tr_inti_gridSearchField.reset();
			tr_inti_searchPanel.getForm().reset();
			tr_inti_dataStore.proxy.extraParams = { action : 'GETLIST' };
			tr_inti_dataStore.proxy.extraParams.query = "";
			tr_inti_dataStore.currentPage = 1;
			tr_inti_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function tr_inti_confirmFormValid(){
			return tr_inti_formPanel.getForm().isValid();
		}
		
		function tr_inti_resetForm(){
			tr_inti_dbTask = 'CREATE';
			tr_inti_dbTaskMessage = 'create';
			tr_inti_formPanel.getForm().reset();
			ID_SKTR_INTIField.setValue(0);
		}
		
		function tr_inti_setForm(){
			tr_inti_dbTask = 'UPDATE';
            tr_inti_dbTaskMessage = 'update';
			
			var record = tr_inti_gridPanel.getSelectionModel().getSelection()[0];
			ID_SKTR_INTIField.setValue(record.data.ID_SKTR_INTI);
			FUNGSIField.setValue(record.data.FUNGSI);
			ALAMAT_BANGUNANField.setValue(record.data.ALAMAT_BANGUNAN);
			TINGGI_BANGUNANField.setValue(record.data.TINGGI_BANGUNAN);
			LUAS_PERSILField.setValue(record.data.LUAS_PERSIL);
			LUAS_BANGUNANField.setValue(record.data.LUAS_BANGUNAN);
					}
		
		function tr_inti_showSearchWindow(){
			tr_inti_searchWindow.show();
		}
		
		function tr_inti_search(){
			tr_inti_gridSearchField.reset();
			
			var FUNGSIValue = '';
			var ALAMAT_BANGUNANValue = '';
			var TINGGI_BANGUNANValue = '';
			var LUAS_PERSILValue = '';
			var LUAS_BANGUNANValue = '';
						
			FUNGSIValue = FUNGSISearchField.getValue();
			ALAMAT_BANGUNANValue = ALAMAT_BANGUNANSearchField.getValue();
			TINGGI_BANGUNANValue = TINGGI_BANGUNANSearchField.getValue();
			LUAS_PERSILValue = LUAS_PERSILSearchField.getValue();
			LUAS_BANGUNANValue = LUAS_BANGUNANSearchField.getValue();
			tr_inti_dbListAction = "SEARCH";
			tr_inti_dataStore.proxy.extraParams = { 
				FUNGSI : FUNGSIValue,
				ALAMAT_BANGUNAN : ALAMAT_BANGUNANValue,
				TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
				LUAS_PERSIL : LUAS_PERSILValue,
				LUAS_BANGUNAN : LUAS_BANGUNANValue,
				action : 'SEARCH'
			};
			tr_inti_dataStore.currentPage = 1;
			tr_inti_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function tr_inti_printExcel(outputType){
			var searchText = "";
			var FUNGSIValue = '';
			var ALAMAT_BANGUNANValue = '';
			var TINGGI_BANGUNANValue = '';
			var LUAS_PERSILValue = '';
			var LUAS_BANGUNANValue = '';
			
			if(tr_inti_dataStore.proxy.extraParams.query!==null){searchText = tr_inti_dataStore.proxy.extraParams.query;}
			if(tr_inti_dataStore.proxy.extraParams.FUNGSI!==null){FUNGSIValue = tr_inti_dataStore.proxy.extraParams.FUNGSI;}
			if(tr_inti_dataStore.proxy.extraParams.ALAMAT_BANGUNAN!==null){ALAMAT_BANGUNANValue = tr_inti_dataStore.proxy.extraParams.ALAMAT_BANGUNAN;}
			if(tr_inti_dataStore.proxy.extraParams.TINGGI_BANGUNAN!==null){TINGGI_BANGUNANValue = tr_inti_dataStore.proxy.extraParams.TINGGI_BANGUNAN;}
			if(tr_inti_dataStore.proxy.extraParams.LUAS_PERSIL!==null){LUAS_PERSILValue = tr_inti_dataStore.proxy.extraParams.LUAS_PERSIL;}
			if(tr_inti_dataStore.proxy.extraParams.LUAS_BANGUNAN!==null){LUAS_BANGUNANValue = tr_inti_dataStore.proxy.extraParams.LUAS_BANGUNAN;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_sktr_inti/switchAction',
				params : {
					action : outputType,
					query : searchText,
					FUNGSI : FUNGSIValue,
					ALAMAT_BANGUNAN : ALAMAT_BANGUNANValue,
					TINGGI_BANGUNAN : TINGGI_BANGUNANValue,
					LUAS_PERSIL : LUAS_PERSILValue,
					LUAS_BANGUNAN : LUAS_BANGUNANValue,
					currentAction : tr_inti_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/sktr_inti_list.xls');
							}else{
								window.open('./print/sktr_inti_list.html','tr_intilist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		tr_inti_dataStore = Ext.create('Ext.data.Store',{
			id : 'tr_inti_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_sktr_inti/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_SKTR_INTI'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_SKTR_INTI', type : 'int', mapping : 'ID_SKTR_INTI' },
				{ name : 'FUNGSI', type : 'string', mapping : 'FUNGSI' },
				{ name : 'ALAMAT_BANGUNAN', type : 'string', mapping : 'ALAMAT_BANGUNAN' },
				{ name : 'TINGGI_BANGUNAN', type : 'float', mapping : 'TINGGI_BANGUNAN' },
				{ name : 'LUAS_PERSIL', type : 'float', mapping : 'LUAS_PERSIL' },
				{ name : 'LUAS_BANGUNAN', type : 'float', mapping : 'LUAS_BANGUNAN' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		tr_inti_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						tr_inti_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						tr_inti_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						tr_inti_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						tr_inti_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						tr_inti_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						tr_inti_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						tr_inti_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						tr_inti_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var tr_inti_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : tr_inti_confirmAdd
		});
		var tr_inti_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : tr_inti_confirmUpdate
		});
		var tr_inti_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : tr_inti_confirmDelete
		});
		var tr_inti_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : tr_inti_refresh
		});
		var tr_inti_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : tr_inti_showSearchWindow
		});
		var tr_inti_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				tr_inti_printExcel('PRINT');
			}
		});
		var tr_inti_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				tr_inti_printExcel('EXCEL');
			}
		});
		
		var tr_inti_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : tr_inti_confirmUpdate
		});
		var tr_inti_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : tr_inti_confirmDelete
		});
		var tr_inti_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : tr_inti_refresh
		});
		tr_inti_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'tr_inti_contextMenu',
			items: [
				tr_inti_contextMenuEdit,tr_inti_contextMenuDelete,'-',tr_inti_contextMenuRefresh
			]
		});
		
		tr_inti_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : tr_inti_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						tr_inti_dataStore.proxy.extraParams = { action : 'GETLIST'};
						tr_inti_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		tr_inti_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'tr_inti_gridPanel',
			constrain : true,
			store : tr_inti_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'tr_intiGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						tr_inti_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : tr_inti_shorcut,
			columns : [
				{
					text : 'FUNGSI',
					dataIndex : 'FUNGSI',
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
					sortable : false
				},
							
			],
			tbar : [
				tr_inti_addButton,
				tr_inti_editButton,
				tr_inti_deleteButton,
				tr_inti_gridSearchField,
				tr_inti_searchButton,
				tr_inti_refreshButton,
				tr_inti_printButton,
				tr_inti_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : tr_inti_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					tr_inti_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_SKTR_INTIField = Ext.create('Ext.form.NumberField',{
			id : 'ID_SKTR_INTIField',
			name : 'ID_SKTR_INTI',
			fieldLabel : 'ID_SKTR_INTI<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		FUNGSIField = Ext.create('Ext.form.TextField',{
			id : 'FUNGSIField',
			name : 'FUNGSI',
			fieldLabel : 'FUNGSI',
			maxLength : 100
		});
		ALAMAT_BANGUNANField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_BANGUNANField',
			name : 'ALAMAT_BANGUNAN',
			fieldLabel : 'ALAMAT_BANGUNAN',
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
		var tr_inti_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : tr_inti_save
		});
		var tr_inti_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				tr_inti_resetForm();
				tr_inti_switchToGrid();
			}
		});
		tr_inti_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_SKTR_INTIField,
						FUNGSIField,
						ALAMAT_BANGUNANField,
						TINGGI_BANGUNANField,
						LUAS_PERSILField,
						LUAS_BANGUNANField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [tr_inti_saveButton,tr_inti_cancelButton]
		});
		tr_inti_formWindow = Ext.create('Ext.window.Window',{
			id : 'tr_inti_formWindow',
			renderTo : 'tr_intiSaveWindow',
			title : globalFormAddEditTitle + ' ' + tr_inti_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [tr_inti_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		FUNGSISearchField = Ext.create('Ext.form.TextField',{
			id : 'FUNGSISearchField',
			name : 'FUNGSI',
			fieldLabel : 'FUNGSI',
			maxLength : 100
		
		});
		ALAMAT_BANGUNANSearchField = Ext.create('Ext.form.TextField',{
			id : 'ALAMAT_BANGUNANSearchField',
			name : 'ALAMAT_BANGUNAN',
			fieldLabel : 'ALAMAT_BANGUNAN',
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
		var tr_inti_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : tr_inti_search
		});
		var tr_inti_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				tr_inti_searchWindow.hide();
			}
		});
		tr_inti_searchPanel = Ext.create('Ext.form.Panel', {
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
						FUNGSISearchField,
						ALAMAT_BANGUNANSearchField,
						TINGGI_BANGUNANSearchField,
						LUAS_PERSILSearchField,
						LUAS_BANGUNANSearchField,
						]
				}],
			buttons : [tr_inti_searchingButton,tr_inti_cancelSearchButton]
		});
		tr_inti_searchWindow = Ext.create('Ext.window.Window',{
			id : 'tr_inti_searchWindow',
			renderTo : 'tr_intiSearchWindow',
			title : globalFormSearchTitle + ' ' + tr_inti_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [tr_inti_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="tr_intiSaveWindow"></div>
<div id="tr_intiSearchWindow"></div>
<div class="span12" id="tr_intiGrid"></div>