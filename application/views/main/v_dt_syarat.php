<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var _syarat_componentItemTitle="_SYARAT";
		var _syarat_dataStore;
		
		var _syarat_shorcut;
		var _syarat_contextMenu;
		var _syarat_gridSearchField;
		var _syarat_gridPanel;
		var _syarat_formPanel;
		var _syarat_formWindow;
		var _syarat_searchPanel;
		var _syarat_searchWindow;
		
		var ID_IJINField;
		var ID_SYARATField;
		var JUMLAHField;
				
		var JUMLAHSearchField;
				
		var _syarat_dbTask = 'CREATE';
		var _syarat_dbTaskMessage = 'Tambah';
		var _syarat_dbPermission = 'CRUD';
		var _syarat_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function _syarat_switchToGrid(){
			_syarat_formPanel.setDisabled(true);
			_syarat_gridPanel.setDisabled(false);
			_syarat_formWindow.hide();
		}
		
		function _syarat_switchToForm(){
			_syarat_gridPanel.setDisabled(true);
			_syarat_formPanel.setDisabled(false);
			_syarat_formWindow.show();
		}
		
		function _syarat_confirmAdd(){
			_syarat_dbTask = 'CREATE';
			_syarat_dbTaskMessage = 'created';
			_syarat_resetForm();
			_syarat_switchToForm();
		}
		
		function _syarat_confirmUpdate(){
			if(_syarat_gridPanel.selModel.getCount() == 1) {
				_syarat_dbTask = 'UPDATE';
				_syarat_dbTaskMessage = 'updated';
				_syarat_switchToForm();
				_syarat_setForm();
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
		
		function _syarat_confirmDelete(){
			if(_syarat_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, _syarat_delete);
			}else if(_syarat_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, _syarat_delete);
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
		
		function _syarat_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(_syarat_dbPermission)==false && pattC.test(_syarat_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(_syarat_confirmFormValid()){
					var ID_IJINValue = '';
					var ID_SYARATValue = '';
					var JUMLAHValue = '';
										
					ID_IJINValue = ID_IJINField.getValue();
					ID_SYARATValue = ID_SYARATField.getValue();
					JUMLAHValue = JUMLAHField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_dt_syarat/switchAction',
						params: {							
							ID_IJIN : ID_IJINValue,
							ID_SYARAT : ID_SYARATValue,
							JUMLAH : JUMLAHValue,
							action : _syarat_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									_syarat_dataStore.reload();
									_syarat_resetForm();
									_syarat_switchToGrid();
									_syarat_gridPanel.getSelectionModel().deselectAll();
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
		
		function _syarat_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(_syarat_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = _syarat_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< _syarat_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_IJINID_SYARAT);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_dt_syarat/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									_syarat_dataStore.reload();
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
		
		function _syarat_refresh(){
			_syarat_dbListAction = "GETLIST";
			_syarat_gridSearchField.reset();
			_syarat_searchPanel.getForm().reset();
			_syarat_dataStore.proxy.extraParams = { action : 'GETLIST' };
			_syarat_dataStore.proxy.extraParams.query = "";
			_syarat_dataStore.currentPage = 1;
			_syarat_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function _syarat_confirmFormValid(){
			return _syarat_formPanel.getForm().isValid();
		}
		
		function _syarat_resetForm(){
			_syarat_dbTask = 'CREATE';
			_syarat_dbTaskMessage = 'create';
			_syarat_formPanel.getForm().reset();
			ID_IJINField.setValue(0);
ID_SYARATField.setValue(0);
		}
		
		function _syarat_setForm(){
			_syarat_dbTask = 'UPDATE';
            _syarat_dbTaskMessage = 'update';
			
			var record = _syarat_gridPanel.getSelectionModel().getSelection()[0];
			ID_IJINField.setValue(record.data.ID_IJIN);
			ID_SYARATField.setValue(record.data.ID_SYARAT);
			JUMLAHField.setValue(record.data.JUMLAH);
					}
		
		function _syarat_showSearchWindow(){
			_syarat_searchWindow.show();
		}
		
		function _syarat_search(){
			_syarat_gridSearchField.reset();
			
			var JUMLAHValue = '';
						
			JUMLAHValue = JUMLAHSearchField.getValue();
			_syarat_dbListAction = "SEARCH";
			_syarat_dataStore.proxy.extraParams = { 
				JUMLAH : JUMLAHValue,
				action : 'SEARCH'
			};
			_syarat_dataStore.currentPage = 1;
			_syarat_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function _syarat_printExcel(outputType){
			var searchText = "";
			var JUMLAHValue = '';
			
			if(_syarat_dataStore.proxy.extraParams.query!==null){searchText = _syarat_dataStore.proxy.extraParams.query;}
			if(_syarat_dataStore.proxy.extraParams.JUMLAH!==null){JUMLAHValue = _syarat_dataStore.proxy.extraParams.JUMLAH;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_dt_syarat/switchAction',
				params : {
					action : outputType,
					query : searchText,
					JUMLAH : JUMLAHValue,
					currentAction : _syarat_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/dt_syarat_list.xls');
							}else{
								window.open('./print/dt_syarat_list.html','_syaratlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		_syarat_dataStore = Ext.create('Ext.data.Store',{
			id : '_syarat_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_dt_syarat/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJINID_SYARAT'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_IJIN', type : 'int', mapping : 'ID_IJIN' },
				{ name : 'ID_SYARAT', type : 'int', mapping : 'ID_SYARAT' },
				{ name : 'JUMLAH', type : 'int', mapping : 'JUMLAH' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		_syarat_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						_syarat_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						_syarat_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						_syarat_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						_syarat_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						_syarat_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						_syarat_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						_syarat_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						_syarat_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var _syarat_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : _syarat_confirmAdd
		});
		var _syarat_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : _syarat_confirmUpdate
		});
		var _syarat_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : _syarat_confirmDelete
		});
		var _syarat_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : _syarat_refresh
		});
		var _syarat_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : _syarat_showSearchWindow
		});
		var _syarat_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				_syarat_printExcel('PRINT');
			}
		});
		var _syarat_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				_syarat_printExcel('EXCEL');
			}
		});
		
		var _syarat_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : _syarat_confirmUpdate
		});
		var _syarat_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : _syarat_confirmDelete
		});
		var _syarat_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : _syarat_refresh
		});
		_syarat_contextMenu = Ext.create('Ext.menu.Menu',{
			id: '_syarat_contextMenu',
			items: [
				_syarat_contextMenuEdit,_syarat_contextMenuDelete,'-',_syarat_contextMenuRefresh
			]
		});
		
		_syarat_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : _syarat_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						_syarat_dataStore.proxy.extraParams = { action : 'GETLIST'};
						_syarat_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		_syarat_gridPanel = Ext.create('Ext.grid.Panel',{
			id : '_syarat_gridPanel',
			constrain : true,
			store : _syarat_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : '_syaratGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						_syarat_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : _syarat_shorcut,
			columns : [
				{
					text : 'JUMLAH',
					dataIndex : 'JUMLAH',
					width : 100,
					sortable : false
				},
							
			],
			tbar : [
				_syarat_addButton,
				_syarat_editButton,
				_syarat_deleteButton,
				_syarat_gridSearchField,
				_syarat_searchButton,
				_syarat_refreshButton,
				_syarat_printButton,
				_syarat_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : _syarat_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					_syarat_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
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
		JUMLAHField = Ext.create('Ext.form.NumberField',{
			id : 'JUMLAHField',
			name : 'JUMLAH',
			fieldLabel : 'JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var _syarat_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : _syarat_save
		});
		var _syarat_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				_syarat_resetForm();
				_syarat_switchToGrid();
			}
		});
		_syarat_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_IJINField,
						ID_SYARATField,
						JUMLAHField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [_syarat_saveButton,_syarat_cancelButton]
		});
		_syarat_formWindow = Ext.create('Ext.window.Window',{
			id : '_syarat_formWindow',
			renderTo : '_syaratSaveWindow',
			title : globalFormAddEditTitle + ' ' + _syarat_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [_syarat_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		JUMLAHSearchField = Ext.create('Ext.form.NumberField',{
			id : 'JUMLAHSearchField',
			name : 'JUMLAH',
			fieldLabel : 'JUMLAH',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var _syarat_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : _syarat_search
		});
		var _syarat_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				_syarat_searchWindow.hide();
			}
		});
		_syarat_searchPanel = Ext.create('Ext.form.Panel', {
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
						JUMLAHSearchField,
						]
				}],
			buttons : [_syarat_searchingButton,_syarat_cancelSearchButton]
		});
		_syarat_searchWindow = Ext.create('Ext.window.Window',{
			id : '_syarat_searchWindow',
			renderTo : '_syaratSearchWindow',
			title : globalFormSearchTitle + ' ' + _syarat_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [_syarat_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="_syaratSaveWindow"></div>
<div id="_syaratSearchWindow"></div>
<div class="span12" id="_syaratGrid"></div>