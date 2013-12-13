<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ster_syarat_componentItemTitle="STER_SYARAT";
		var ster_syarat_dataStore;
		
		var ster_syarat_shorcut;
		var ster_syarat_contextMenu;
		var ster_syarat_gridSearchField;
		var ster_syarat_gridPanel;
		var ster_syarat_formPanel;
		var ster_syarat_formWindow;
		var ster_syarat_searchPanel;
		var ster_syarat_searchWindow;
		
		var ID_SYARATField;
		var NAMA_SYARATField;
				
		var NAMA_SYARATSearchField;
				
		var ster_syarat_dbTask = 'CREATE';
		var ster_syarat_dbTaskMessage = 'Tambah';
		var ster_syarat_dbPermission = 'CRUD';
		var ster_syarat_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ster_syarat_switchToGrid(){
			ster_syarat_formPanel.setDisabled(true);
			ster_syarat_gridPanel.setDisabled(false);
			ster_syarat_formWindow.hide();
		}
		
		function ster_syarat_switchToForm(){
			ster_syarat_gridPanel.setDisabled(true);
			ster_syarat_formPanel.setDisabled(false);
			ster_syarat_formWindow.show();
		}
		
		function ster_syarat_confirmAdd(){
			ster_syarat_dbTask = 'CREATE';
			ster_syarat_dbTaskMessage = 'created';
			ster_syarat_resetForm();
			ster_syarat_switchToForm();
		}
		
		function ster_syarat_confirmUpdate(){
			if(ster_syarat_gridPanel.selModel.getCount() == 1) {
				ster_syarat_dbTask = 'UPDATE';
				ster_syarat_dbTaskMessage = 'updated';
				ster_syarat_switchToForm();
				ster_syarat_setForm();
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
		
		function ster_syarat_confirmDelete(){
			if(ster_syarat_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ster_syarat_delete);
			}else if(ster_syarat_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ster_syarat_delete);
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
		
		function ster_syarat_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ster_syarat_dbPermission)==false && pattC.test(ster_syarat_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ster_syarat_confirmFormValid()){
					var ID_SYARATValue = '';
					var NAMA_SYARATValue = '';
										
					ID_SYARATValue = ID_SYARATField.getValue();
					NAMA_SYARATValue = NAMA_SYARATField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_master_syarat/switchAction',
						params: {							
							ID_SYARAT : ID_SYARATValue,
							NAMA_SYARAT : NAMA_SYARATValue,
							action : ster_syarat_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ster_syarat_dataStore.reload();
									ster_syarat_resetForm();
									ster_syarat_switchToGrid();
									ster_syarat_gridPanel.getSelectionModel().deselectAll();
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
		
		function ster_syarat_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ster_syarat_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ster_syarat_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ster_syarat_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_SYARAT);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_master_syarat/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ster_syarat_dataStore.reload();
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
		
		function ster_syarat_refresh(){
			ster_syarat_dbListAction = "GETLIST";
			ster_syarat_gridSearchField.reset();
			ster_syarat_searchPanel.getForm().reset();
			ster_syarat_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ster_syarat_dataStore.proxy.extraParams.query = "";
			ster_syarat_dataStore.currentPage = 1;
			ster_syarat_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ster_syarat_confirmFormValid(){
			return ster_syarat_formPanel.getForm().isValid();
		}
		
		function ster_syarat_resetForm(){
			ster_syarat_dbTask = 'CREATE';
			ster_syarat_dbTaskMessage = 'create';
			ster_syarat_formPanel.getForm().reset();
			ID_SYARATField.setValue(0);
		}
		
		function ster_syarat_setForm(){
			ster_syarat_dbTask = 'UPDATE';
            ster_syarat_dbTaskMessage = 'update';
			
			var record = ster_syarat_gridPanel.getSelectionModel().getSelection()[0];
			ID_SYARATField.setValue(record.data.ID_SYARAT);
			NAMA_SYARATField.setValue(record.data.NAMA_SYARAT);
					}
		
		function ster_syarat_showSearchWindow(){
			ster_syarat_searchWindow.show();
		}
		
		function ster_syarat_search(){
			ster_syarat_gridSearchField.reset();
			
			var NAMA_SYARATValue = '';
						
			NAMA_SYARATValue = NAMA_SYARATSearchField.getValue();
			ster_syarat_dbListAction = "SEARCH";
			ster_syarat_dataStore.proxy.extraParams = { 
				NAMA_SYARAT : NAMA_SYARATValue,
				action : 'SEARCH'
			};
			ster_syarat_dataStore.currentPage = 1;
			ster_syarat_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ster_syarat_printExcel(outputType){
			var searchText = "";
			var NAMA_SYARATValue = '';
			
			if(ster_syarat_dataStore.proxy.extraParams.query!==null){searchText = ster_syarat_dataStore.proxy.extraParams.query;}
			if(ster_syarat_dataStore.proxy.extraParams.NAMA_SYARAT!==null){NAMA_SYARATValue = ster_syarat_dataStore.proxy.extraParams.NAMA_SYARAT;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_master_syarat/switchAction',
				params : {
					action : outputType,
					query : searchText,
					NAMA_SYARAT : NAMA_SYARATValue,
					currentAction : ster_syarat_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/master_syarat_list.xls');
							}else{
								window.open('./print/master_syarat_list.html','ster_syaratlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ster_syarat_dataStore = Ext.create('Ext.data.Store',{
			id : 'ster_syarat_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_master_syarat/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_SYARAT'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_SYARAT', type : 'int', mapping : 'ID_SYARAT' },
				{ name : 'NAMA_SYARAT', type : 'string', mapping : 'NAMA_SYARAT' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ster_syarat_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ster_syarat_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ster_syarat_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ster_syarat_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ster_syarat_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ster_syarat_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ster_syarat_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ster_syarat_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ster_syarat_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ster_syarat_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ster_syarat_confirmAdd
		});
		var ster_syarat_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ster_syarat_confirmUpdate
		});
		var ster_syarat_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ster_syarat_confirmDelete
		});
		var ster_syarat_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ster_syarat_refresh
		});
		var ster_syarat_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ster_syarat_showSearchWindow
		});
		var ster_syarat_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ster_syarat_printExcel('PRINT');
			}
		});
		var ster_syarat_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ster_syarat_printExcel('EXCEL');
			}
		});
		
		var ster_syarat_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ster_syarat_confirmUpdate
		});
		var ster_syarat_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ster_syarat_confirmDelete
		});
		var ster_syarat_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ster_syarat_refresh
		});
		ster_syarat_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ster_syarat_contextMenu',
			items: [
				ster_syarat_contextMenuEdit,ster_syarat_contextMenuDelete,'-',ster_syarat_contextMenuRefresh
			]
		});
		
		ster_syarat_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ster_syarat_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ster_syarat_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ster_syarat_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ster_syarat_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ster_syarat_gridPanel',
			constrain : true,
			store : ster_syarat_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ster_syaratGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ster_syarat_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ster_syarat_shorcut,
			columns : [
				{
					text : 'NAMA_SYARAT',
					dataIndex : 'NAMA_SYARAT',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				ster_syarat_addButton,
				ster_syarat_editButton,
				ster_syarat_deleteButton,
				ster_syarat_gridSearchField,
				ster_syarat_searchButton,
				ster_syarat_refreshButton,
				ster_syarat_printButton,
				ster_syarat_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ster_syarat_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ster_syarat_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_SYARATField = Ext.create('Ext.form.NumberField',{
			id : 'ID_SYARATField',
			name : 'ID_SYARAT',
			fieldLabel : 'ID_SYARAT<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		NAMA_SYARATField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_SYARATField',
			name : 'NAMA_SYARAT',
			fieldLabel : 'NAMA_SYARAT',
			maxLength : 255
		});
		var ster_syarat_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ster_syarat_save
		});
		var ster_syarat_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ster_syarat_resetForm();
				ster_syarat_switchToGrid();
			}
		});
		ster_syarat_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_SYARATField,
						NAMA_SYARATField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ster_syarat_saveButton,ster_syarat_cancelButton]
		});
		ster_syarat_formWindow = Ext.create('Ext.window.Window',{
			id : 'ster_syarat_formWindow',
			renderTo : 'ster_syaratSaveWindow',
			title : globalFormAddEditTitle + ' ' + ster_syarat_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ster_syarat_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		NAMA_SYARATSearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMA_SYARATSearchField',
			name : 'NAMA_SYARAT',
			fieldLabel : 'NAMA_SYARAT',
			maxLength : 255
		
		});
		var ster_syarat_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ster_syarat_search
		});
		var ster_syarat_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ster_syarat_searchWindow.hide();
			}
		});
		ster_syarat_searchPanel = Ext.create('Ext.form.Panel', {
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
						NAMA_SYARATSearchField,
						]
				}],
			buttons : [ster_syarat_searchingButton,ster_syarat_cancelSearchButton]
		});
		ster_syarat_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ster_syarat_searchWindow',
			renderTo : 'ster_syaratSearchWindow',
			title : globalFormSearchTitle + ' ' + ster_syarat_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ster_syarat_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ster_syaratSaveWindow"></div>
<div id="ster_syaratSearchWindow"></div>
<div class="span12" id="ster_syaratGrid"></div>