<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var k_list_lingkungan_componentItemTitle="K_LIST_LINGKUNGAN";
		var k_list_lingkungan_dataStore;
		
		var k_list_lingkungan_shorcut;
		var k_list_lingkungan_contextMenu;
		var k_list_lingkungan_gridSearchField;
		var k_list_lingkungan_gridPanel;
		var k_list_lingkungan_formPanel;
		var k_list_lingkungan_formWindow;
		var k_list_lingkungan_searchPanel;
		var k_list_lingkungan_searchWindow;
		
		var ID_SYARATField;
		var ID_IJINField;
		var STATUSField;
		var KETERANGANField;
				
		var STATUSSearchField;
		var KETERANGANSearchField;
				
		var k_list_lingkungan_dbTask = 'CREATE';
		var k_list_lingkungan_dbTaskMessage = 'Tambah';
		var k_list_lingkungan_dbPermission = 'CRUD';
		var k_list_lingkungan_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function k_list_lingkungan_switchToGrid(){
			k_list_lingkungan_formPanel.setDisabled(true);
			k_list_lingkungan_gridPanel.setDisabled(false);
			k_list_lingkungan_formWindow.hide();
		}
		
		function k_list_lingkungan_switchToForm(){
			k_list_lingkungan_gridPanel.setDisabled(true);
			k_list_lingkungan_formPanel.setDisabled(false);
			k_list_lingkungan_formWindow.show();
		}
		
		function k_list_lingkungan_confirmAdd(){
			k_list_lingkungan_dbTask = 'CREATE';
			k_list_lingkungan_dbTaskMessage = 'created';
			k_list_lingkungan_resetForm();
			k_list_lingkungan_switchToForm();
		}
		
		function k_list_lingkungan_confirmUpdate(){
			if(k_list_lingkungan_gridPanel.selModel.getCount() == 1) {
				k_list_lingkungan_dbTask = 'UPDATE';
				k_list_lingkungan_dbTaskMessage = 'updated';
				k_list_lingkungan_switchToForm();
				k_list_lingkungan_setForm();
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
		
		function k_list_lingkungan_confirmDelete(){
			if(k_list_lingkungan_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, k_list_lingkungan_delete);
			}else if(k_list_lingkungan_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, k_list_lingkungan_delete);
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
		
		function k_list_lingkungan_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(k_list_lingkungan_dbPermission)==false && pattC.test(k_list_lingkungan_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(k_list_lingkungan_confirmFormValid()){
					var ID_SYARATValue = '';
					var ID_IJINValue = '';
					var STATUSValue = '';
					var KETERANGANValue = '';
										
					ID_SYARATValue = ID_SYARATField.getValue();
					ID_IJINValue = ID_IJINField.getValue();
					STATUSValue = STATUSField.getValue();
					KETERANGANValue = KETERANGANField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_cek_list_lingkungan/switchAction',
						params: {							
							ID_SYARAT : ID_SYARATValue,
							ID_IJIN : ID_IJINValue,
							STATUS : STATUSValue,
							KETERANGAN : KETERANGANValue,
							action : k_list_lingkungan_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									k_list_lingkungan_dataStore.reload();
									k_list_lingkungan_resetForm();
									k_list_lingkungan_switchToGrid();
									k_list_lingkungan_gridPanel.getSelectionModel().deselectAll();
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
		
		function k_list_lingkungan_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(k_list_lingkungan_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = k_list_lingkungan_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< k_list_lingkungan_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_SYARATID_IJIN);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_cek_list_lingkungan/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									k_list_lingkungan_dataStore.reload();
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
		
		function k_list_lingkungan_refresh(){
			k_list_lingkungan_dbListAction = "GETLIST";
			k_list_lingkungan_gridSearchField.reset();
			k_list_lingkungan_searchPanel.getForm().reset();
			k_list_lingkungan_dataStore.proxy.extraParams = { action : 'GETLIST' };
			k_list_lingkungan_dataStore.proxy.extraParams.query = "";
			k_list_lingkungan_dataStore.currentPage = 1;
			k_list_lingkungan_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function k_list_lingkungan_confirmFormValid(){
			return k_list_lingkungan_formPanel.getForm().isValid();
		}
		
		function k_list_lingkungan_resetForm(){
			k_list_lingkungan_dbTask = 'CREATE';
			k_list_lingkungan_dbTaskMessage = 'create';
			k_list_lingkungan_formPanel.getForm().reset();
			ID_SYARATField.setValue(0);
ID_IJINField.setValue(0);
		}
		
		function k_list_lingkungan_setForm(){
			k_list_lingkungan_dbTask = 'UPDATE';
            k_list_lingkungan_dbTaskMessage = 'update';
			
			var record = k_list_lingkungan_gridPanel.getSelectionModel().getSelection()[0];
			ID_SYARATField.setValue(record.data.ID_SYARAT);
			ID_IJINField.setValue(record.data.ID_IJIN);
			STATUSField.setValue(record.data.STATUS);
			KETERANGANField.setValue(record.data.KETERANGAN);
					}
		
		function k_list_lingkungan_showSearchWindow(){
			k_list_lingkungan_searchWindow.show();
		}
		
		function k_list_lingkungan_search(){
			k_list_lingkungan_gridSearchField.reset();
			
			var STATUSValue = '';
			var KETERANGANValue = '';
						
			STATUSValue = STATUSSearchField.getValue();
			KETERANGANValue = KETERANGANSearchField.getValue();
			k_list_lingkungan_dbListAction = "SEARCH";
			k_list_lingkungan_dataStore.proxy.extraParams = { 
				STATUS : STATUSValue,
				KETERANGAN : KETERANGANValue,
				action : 'SEARCH'
			};
			k_list_lingkungan_dataStore.currentPage = 1;
			k_list_lingkungan_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function k_list_lingkungan_printExcel(outputType){
			var searchText = "";
			var STATUSValue = '';
			var KETERANGANValue = '';
			
			if(k_list_lingkungan_dataStore.proxy.extraParams.query!==null){searchText = k_list_lingkungan_dataStore.proxy.extraParams.query;}
			if(k_list_lingkungan_dataStore.proxy.extraParams.STATUS!==null){STATUSValue = k_list_lingkungan_dataStore.proxy.extraParams.STATUS;}
			if(k_list_lingkungan_dataStore.proxy.extraParams.KETERANGAN!==null){KETERANGANValue = k_list_lingkungan_dataStore.proxy.extraParams.KETERANGAN;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_cek_list_lingkungan/switchAction',
				params : {
					action : outputType,
					query : searchText,
					STATUS : STATUSValue,
					KETERANGAN : KETERANGANValue,
					currentAction : k_list_lingkungan_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/cek_list_lingkungan_list.xls');
							}else{
								window.open('./print/cek_list_lingkungan_list.html','k_list_lingkunganlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		k_list_lingkungan_dataStore = Ext.create('Ext.data.Store',{
			id : 'k_list_lingkungan_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_cek_list_lingkungan/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_SYARATID_IJIN'
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
				{ name : 'ID_IJIN', type : 'int', mapping : 'ID_IJIN' },
				{ name : 'STATUS', type : 'int', mapping : 'STATUS' },
				{ name : 'KETERANGAN', type : 'string', mapping : 'KETERANGAN' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		k_list_lingkungan_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						k_list_lingkungan_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						k_list_lingkungan_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						k_list_lingkungan_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						k_list_lingkungan_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						k_list_lingkungan_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						k_list_lingkungan_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						k_list_lingkungan_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						k_list_lingkungan_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var k_list_lingkungan_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : k_list_lingkungan_confirmAdd
		});
		var k_list_lingkungan_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : k_list_lingkungan_confirmUpdate
		});
		var k_list_lingkungan_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : k_list_lingkungan_confirmDelete
		});
		var k_list_lingkungan_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : k_list_lingkungan_refresh
		});
		var k_list_lingkungan_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : k_list_lingkungan_showSearchWindow
		});
		var k_list_lingkungan_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				k_list_lingkungan_printExcel('PRINT');
			}
		});
		var k_list_lingkungan_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				k_list_lingkungan_printExcel('EXCEL');
			}
		});
		
		var k_list_lingkungan_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : k_list_lingkungan_confirmUpdate
		});
		var k_list_lingkungan_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : k_list_lingkungan_confirmDelete
		});
		var k_list_lingkungan_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : k_list_lingkungan_refresh
		});
		k_list_lingkungan_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'k_list_lingkungan_contextMenu',
			items: [
				k_list_lingkungan_contextMenuEdit,k_list_lingkungan_contextMenuDelete,'-',k_list_lingkungan_contextMenuRefresh
			]
		});
		
		k_list_lingkungan_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : k_list_lingkungan_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						k_list_lingkungan_dataStore.proxy.extraParams = { action : 'GETLIST'};
						k_list_lingkungan_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		k_list_lingkungan_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'k_list_lingkungan_gridPanel',
			constrain : true,
			store : k_list_lingkungan_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'k_list_lingkunganGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						k_list_lingkungan_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : k_list_lingkungan_shorcut,
			columns : [
				{
					text : 'STATUS',
					dataIndex : 'STATUS',
					width : 100,
					sortable : false
				},
				{
					text : 'KETERANGAN',
					dataIndex : 'KETERANGAN',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				k_list_lingkungan_addButton,
				k_list_lingkungan_editButton,
				k_list_lingkungan_deleteButton,
				k_list_lingkungan_gridSearchField,
				k_list_lingkungan_searchButton,
				k_list_lingkungan_refreshButton,
				k_list_lingkungan_printButton,
				k_list_lingkungan_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : k_list_lingkungan_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					k_list_lingkungan_dataStore.reload({params: {start: 0, limit: globalPageSize}});
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
		ID_IJINField = Ext.create('Ext.form.NumberField',{
			id : 'ID_IJINField',
			name : 'ID_IJIN',
			fieldLabel : 'ID_IJIN<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		STATUSField = Ext.create('Ext.form.NumberField',{
			id : 'STATUSField',
			name : 'STATUS',
			fieldLabel : 'STATUS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		KETERANGANField = Ext.create('Ext.form.TextField',{
			id : 'KETERANGANField',
			name : 'KETERANGAN',
			fieldLabel : 'KETERANGAN',
			maxLength : 255
		});
		var k_list_lingkungan_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : k_list_lingkungan_save
		});
		var k_list_lingkungan_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				k_list_lingkungan_resetForm();
				k_list_lingkungan_switchToGrid();
			}
		});
		k_list_lingkungan_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJINField,
						STATUSField,
						KETERANGANField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [k_list_lingkungan_saveButton,k_list_lingkungan_cancelButton]
		});
		k_list_lingkungan_formWindow = Ext.create('Ext.window.Window',{
			id : 'k_list_lingkungan_formWindow',
			renderTo : 'k_list_lingkunganSaveWindow',
			title : globalFormAddEditTitle + ' ' + k_list_lingkungan_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [k_list_lingkungan_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		STATUSSearchField = Ext.create('Ext.form.NumberField',{
			id : 'STATUSSearchField',
			name : 'STATUS',
			fieldLabel : 'STATUS',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		KETERANGANSearchField = Ext.create('Ext.form.TextField',{
			id : 'KETERANGANSearchField',
			name : 'KETERANGAN',
			fieldLabel : 'KETERANGAN',
			maxLength : 255
		
		});
		var k_list_lingkungan_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : k_list_lingkungan_search
		});
		var k_list_lingkungan_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				k_list_lingkungan_searchWindow.hide();
			}
		});
		k_list_lingkungan_searchPanel = Ext.create('Ext.form.Panel', {
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
						STATUSSearchField,
						KETERANGANSearchField,
						]
				}],
			buttons : [k_list_lingkungan_searchingButton,k_list_lingkungan_cancelSearchButton]
		});
		k_list_lingkungan_searchWindow = Ext.create('Ext.window.Window',{
			id : 'k_list_lingkungan_searchWindow',
			renderTo : 'k_list_lingkunganSearchWindow',
			title : globalFormSearchTitle + ' ' + k_list_lingkungan_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [k_list_lingkungan_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="k_list_lingkunganSaveWindow"></div>
<div id="k_list_lingkunganSearchWindow"></div>
<div class="span12" id="k_list_lingkunganGrid"></div>