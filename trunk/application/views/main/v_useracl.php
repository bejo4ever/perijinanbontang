<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var eracl_componentItemTitle="ERACL";
		var eracl_dataStore;
		
		var eracl_shorcut;
		var eracl_contextMenu;
		var eracl_gridSearchField;
		var eracl_gridPanel;
		var eracl_formPanel;
		var eracl_formWindow;
		var eracl_searchPanel;
		var eracl_searchWindow;
		
		var idField;
		var user_idField;
		var acl_idField;
				
		var user_idSearchField;
		var acl_idSearchField;
				
		var eracl_dbTask = 'CREATE';
		var eracl_dbTaskMessage = 'Tambah';
		var eracl_dbPermission = 'CRUD';
		var eracl_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function eracl_switchToGrid(){
			eracl_formPanel.setDisabled(true);
			eracl_gridPanel.setDisabled(false);
			eracl_formWindow.hide();
		}
		
		function eracl_switchToForm(){
			eracl_gridPanel.setDisabled(true);
			eracl_formPanel.setDisabled(false);
			eracl_formWindow.show();
		}
		
		function eracl_confirmAdd(){
			eracl_dbTask = 'CREATE';
			eracl_dbTaskMessage = 'created';
			eracl_resetForm();
			eracl_switchToForm();
		}
		
		function eracl_confirmUpdate(){
			if(eracl_gridPanel.selModel.getCount() == 1) {
				eracl_dbTask = 'UPDATE';
				eracl_dbTaskMessage = 'updated';
				eracl_switchToForm();
				eracl_setForm();
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
		
		function eracl_confirmDelete(){
			if(eracl_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, eracl_delete);
			}else if(eracl_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, eracl_delete);
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
		
		function eracl_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(eracl_dbPermission)==false && pattC.test(eracl_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(eracl_confirmFormValid()){
					var idValue = '';
					var user_idValue = '';
					var acl_idValue = '';
										
					idValue = idField.getValue();
					user_idValue = user_idField.getValue();
					acl_idValue = acl_idField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_useracl/switchAction',
						params: {							
							id : idValue,
							user_id : user_idValue,
							acl_id : acl_idValue,
							action : eracl_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									eracl_dataStore.reload();
									eracl_resetForm();
									eracl_switchToGrid();
									eracl_gridPanel.getSelectionModel().deselectAll();
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
		
		function eracl_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(eracl_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = eracl_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< eracl_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.id);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_useracl/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									eracl_dataStore.reload();
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
		
		function eracl_refresh(){
			eracl_dbListAction = "GETLIST";
			eracl_gridSearchField.reset();
			eracl_searchPanel.getForm().reset();
			eracl_dataStore.proxy.extraParams = { action : 'GETLIST' };
			eracl_dataStore.proxy.extraParams.query = "";
			eracl_dataStore.currentPage = 1;
			eracl_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function eracl_confirmFormValid(){
			return eracl_formPanel.getForm().isValid();
		}
		
		function eracl_resetForm(){
			eracl_dbTask = 'CREATE';
			eracl_dbTaskMessage = 'create';
			eracl_formPanel.getForm().reset();
			idField.setValue(0);
		}
		
		function eracl_setForm(){
			eracl_dbTask = 'UPDATE';
            eracl_dbTaskMessage = 'update';
			
			var record = eracl_gridPanel.getSelectionModel().getSelection()[0];
			idField.setValue(record.data.id);
			user_idField.setValue(record.data.user_id);
			acl_idField.setValue(record.data.acl_id);
					}
		
		function eracl_showSearchWindow(){
			eracl_searchWindow.show();
		}
		
		function eracl_search(){
			eracl_gridSearchField.reset();
			
			var user_idValue = '';
			var acl_idValue = '';
						
			user_idValue = user_idSearchField.getValue();
			acl_idValue = acl_idSearchField.getValue();
			eracl_dbListAction = "SEARCH";
			eracl_dataStore.proxy.extraParams = { 
				user_id : user_idValue,
				acl_id : acl_idValue,
				action : 'SEARCH'
			};
			eracl_dataStore.currentPage = 1;
			eracl_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function eracl_printExcel(outputType){
			var searchText = "";
			var user_idValue = '';
			var acl_idValue = '';
			
			if(eracl_dataStore.proxy.extraParams.query!==null){searchText = eracl_dataStore.proxy.extraParams.query;}
			if(eracl_dataStore.proxy.extraParams.user_id!==null){user_idValue = eracl_dataStore.proxy.extraParams.user_id;}
			if(eracl_dataStore.proxy.extraParams.acl_id!==null){acl_idValue = eracl_dataStore.proxy.extraParams.acl_id;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_useracl/switchAction',
				params : {
					action : outputType,
					query : searchText,
					user_id : user_idValue,
					acl_id : acl_idValue,
					currentAction : eracl_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/useracl_list.xls');
							}else{
								window.open('./print/useracl_list.html','eracllist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		eracl_dataStore = Ext.create('Ext.data.Store',{
			id : 'eracl_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : '<?php echo site_url(); ?>/c_useracl/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST',
					id : '<?php echo $id; ?>'
				}
			}),
			fields : [
				{ name : 'id', type : 'int', mapping : 'id' },
				{ name : 'nama', type : 'int', mapping : 'user_id'},
				{ name : 'acl_id', type : 'int', mapping : 'acl_id'},
				{ name : 'nama', type : 'string', mapping : 'nama'},
				{ name : 'link', type : 'string', mapping : 'link'},
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		eracl_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						eracl_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						eracl_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						eracl_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						eracl_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						eracl_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						eracl_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						eracl_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						eracl_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var eracl_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : eracl_confirmAdd
		});
		var eracl_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : eracl_confirmUpdate
		});
		var eracl_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : eracl_confirmDelete
		});
		var eracl_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : eracl_refresh
		});
		var eracl_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : eracl_showSearchWindow
		});
		var eracl_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				eracl_printExcel('PRINT');
			}
		});
		var eracl_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				eracl_printExcel('EXCEL');
			}
		});
		
		var eracl_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : eracl_confirmUpdate
		});
		var eracl_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : eracl_confirmDelete
		});
		var eracl_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : eracl_refresh
		});
		eracl_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'eracl_contextMenu',
			items: [
				eracl_contextMenuEdit,eracl_contextMenuDelete,'-',eracl_contextMenuRefresh
			]
		});
		
		eracl_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : eracl_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						eracl_dataStore.proxy.extraParams = { action : 'GETLIST'};
						eracl_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		eracl_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'eracl_gridPanel',
			constrain : true,
			store : eracl_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'eraclGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						eracl_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : eracl_shorcut,
			columns : [
				{
					text : 'user_id',
					dataIndex : 'user_id',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'acl_id',
					dataIndex : 'acl_id',
					width : 100,
					sortable : false,
					hidden : true
				},
				{
					text : 'Nama Menu',
					dataIndex : 'nama',
					width : 100,
					sortable : false
				},
				{
					text : 'Link Menu',
					dataIndex : 'link',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				eracl_addButton,
				eracl_editButton,
				eracl_deleteButton,
				eracl_gridSearchField,
				eracl_searchButton,
				eracl_refreshButton,
				eracl_printButton,
				eracl_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : eracl_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					eracl_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		idField = Ext.create('Ext.form.NumberField',{
			id : 'idField',
			name : 'id',
			fieldLabel : 'id<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		user_idField = Ext.create('Ext.form.NumberField',{
			id : 'user_idField',
			name : 'user_id',
			fieldLabel : 'user_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			value : <?php echo $id; ?>,
			maskRe : /([0-9]+)$/});
		var acl_idField = Ext.create('Ext.form.ComboBox',{
			name : 'acl_idField',
			fieldLabel : 'Nama Menu',
			store : Ext.create('Ext.data.Store',{
				pageSize : globalPageSize,
				proxy : Ext.create('Ext.data.HttpProxy',{
					url : '<?php echo site_url(); ?>/c_acl/switchAction',
					reader : {
						type : 'json', root : 'results', rootProperty : 'results', totalProperty : 'total', idProperty : 'id'
					},
					actionMethods : { read : 'POST' },
					extraParams : { action : 'SEARCH' }
				}),
				fields : [
					{ name : 'id', type : 'int', mapping : 'id' },
					{ name : 'nama', type : 'string', mapping : 'nama' }
				]
			}),
			displayField : 'nama',
			valueField : 'id',
			queryMode : 'remote',
			triggerAction : 'query',
			repeatTriggerClick : true,
			minChars : 100,
			triggerCls : 'x-form-search-trigger',
			forceSelection : false,
			onTriggerClick: function(event){
				var store = acl_idField.getStore();
				var val = acl_idField.getRawValue();
				store.proxy.extraParams = {action : 'SEARCH',nama : val};
				store.load();
				acl_idField.expand();
				acl_idField.fireEvent("ontriggerclick", this, event);
			},  
			tpl: Ext.create('Ext.XTemplate',
				'<tpl for=".">',
					'<div class="x-boundlist-item">Nama Menu : {nama}</div>',
				'</tpl>'
			),
		});
		// acl_idField = Ext.create('Ext.form.TextField',{
			// id : 'acl_idField',
			// name : 'acl_id',
			// fieldLabel : 'Nama Menu',
			// maxLength : 10
		// });
		var eracl_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : eracl_save
		});
		var eracl_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				eracl_resetForm();
				eracl_switchToGrid();
			}
		});
		eracl_formPanel = Ext.create('Ext.form.Panel', {
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
						idField,
						user_idField,
						acl_idField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [eracl_saveButton,eracl_cancelButton]
		});
		eracl_formWindow = Ext.create('Ext.window.Window',{
			id : 'eracl_formWindow',
			renderTo : 'eraclSaveWindow',
			title : globalFormAddEditTitle + ' ' + eracl_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [eracl_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		user_idSearchField = Ext.create('Ext.form.NumberField',{
			id : 'user_idSearchField',
			name : 'user_id',
			fieldLabel : 'user_id',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		acl_idSearchField = Ext.create('Ext.form.TextField',{
			id : 'acl_idSearchField',
			name : 'acl_id',
			fieldLabel : 'acl_id',
			maxLength : 0
		
		});
		var eracl_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : eracl_search
		});
		var eracl_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				eracl_searchWindow.hide();
			}
		});
		eracl_searchPanel = Ext.create('Ext.form.Panel', {
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
						user_idSearchField,
						acl_idSearchField,
						]
				}],
			buttons : [eracl_searchingButton,eracl_cancelSearchButton]
		});
		eracl_searchWindow = Ext.create('Ext.window.Window',{
			id : 'eracl_searchWindow',
			renderTo : 'eraclSearchWindow',
			title : globalFormSearchTitle + ' ' + eracl_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [eracl_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="eraclSaveWindow"></div>
<div id="eraclSearchWindow"></div>
<div class="span12" id="eraclGrid"></div>