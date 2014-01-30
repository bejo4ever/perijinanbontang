<style>
	.magnifier{
		background-image:url(../assets/images/icons/magnifier.png) !important;
		margin:auto;
	}
</style>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var ster_user_componentItemTitle="STER_USER";
		var ster_user_dataStore;
		
		var ster_user_shorcut;
		var ster_user_contextMenu;
		var ster_user_gridSearchField;
		var ster_user_gridPanel;
		var ster_user_formPanel;
		var ster_user_formWindow;
		var ster_user_searchPanel;
		var ster_user_searchWindow;
		
		var ID_USERField;
		var USERField;
		var PASSField;
		var NAMAField;
		var NIPField;
		var TELPField;
		var EMAILField;
		var ID_HAKField;
				
		var USERSearchField;
		var PASSSearchField;
		var NAMASearchField;
		var NIPSearchField;
		var TELPSearchField;
		var EMAILSearchField;
		var ID_HAKSearchField;
				
		var ster_user_dbTask = 'CREATE';
		var ster_user_dbTaskMessage = 'Tambah';
		var ster_user_dbPermission = 'CRUD';
		var ster_user_dbListAction = 'GETLIST';
/* End variabel declaration */
/* Start function declaration */
		function ster_user_switchToGrid(){
			ster_user_formPanel.setDisabled(true);
			ster_user_gridPanel.setDisabled(false);
			ster_user_formWindow.hide();
		}
		
		function ster_user_switchToForm(){
			ster_user_gridPanel.setDisabled(true);
			ster_user_formPanel.setDisabled(false);
			ster_user_formWindow.show();
		}
		
		function ster_user_confirmAdd(){
			ster_user_dbTask = 'CREATE';
			ster_user_dbTaskMessage = 'created';
			ster_user_resetForm();
			ster_user_switchToForm();
		}
		
		function ster_user_confirmUpdate(){
			if(ster_user_gridPanel.selModel.getCount() == 1) {
				ster_user_dbTask = 'UPDATE';
				ster_user_dbTaskMessage = 'updated';
				ster_user_switchToForm();
				ster_user_setForm();
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
		
		function ster_user_confirmDelete(){
			if(ster_user_gridPanel.selModel.getCount() == 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalDeleteConfirmation, ster_user_delete);
			}else if(ster_user_gridPanel.selModel.getCount() > 1){
				Ext.MessageBox.confirm(globalConfirmationTitle,globalMultiDeleteConfirmation, ster_user_delete);
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
		
		function ster_user_save(){
			var pattU=new RegExp("U");
			var pattC=new RegExp("C");
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			if(pattU.test(ster_user_dbPermission)==false && pattC.test(ster_user_dbPermission)==false){
				Ext.MessageBox.show({
					title : 'Warning',
					msg : globalFailedPermission,
					buttons : Ext.MessageBox.OK,
					animEl : 'security',
					icon : Ext.MessageBox.WARNING
				});
			}else{
				if(ster_user_confirmFormValid()){
					var ID_USERValue = '';
					var USERValue = '';
					var PASSValue = '';
					var NAMAValue = '';
					var NIPValue = '';
					var TELPValue = '';
					var EMAILValue = '';
					var ID_HAKValue = '';
										
					ID_USERValue = ID_USERField.getValue();
					USERValue = USERField.getValue();
					PASSValue = PASSField.getValue();
					NAMAValue = NAMAField.getValue();
					NIPValue = NIPField.getValue();
					TELPValue = TELPField.getValue();
					EMAILValue = EMAILField.getValue();
					ID_HAKValue = ID_HAKField.getValue();
										
					Ext.Ajax.request({
						waitMsg: 'Please wait...',
						url: 'c_master_user/switchAction',
						params: {							
							ID_USER : ID_USERValue,
							USER : USERValue,
							PASS : PASSValue,
							NAMA : NAMAValue,
							NIP : NIPValue,
							TELP : TELPValue,
							EMAIL : EMAILValue,
							ID_HAK : ID_HAKValue,
							action : ster_user_dbTask
						},
						success: function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									Ext.MessageBox.alert(globalSuccessSaveTitle,globalSuccessSave);
									ster_user_dataStore.reload();
									ster_user_resetForm();
									ster_user_switchToGrid();
									ster_user_gridPanel.getSelectionModel().deselectAll();
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
		
		function ster_user_delete(btn){
			if(btn=='yes'){
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				var patt = new RegExp("D");
				if(patt.test(ster_user_dbPermission)==false){
					Ext.MessageBox.show({
						title : 'Warning',
						msg : globalFailedPermission,
						buttons : Ext.MessageBox.OK,
						animEl : 'security',
						icon : Ext.MessageBox.WARNING
					});
				}else{
					var selections = ster_user_gridPanel.selModel.getSelection();
					var arrayId = [];
					for(i = 0; i< ster_user_gridPanel.selModel.getCount(); i++){
						arrayId.push(selections[i].data.ID_USER);
					}
					var encoded_arrayId = Ext.encode(arrayId);
					Ext.Ajax.request({
						waitMsg: 'Please Wait',
						url : 'c_master_user/switchAction',
						params : { action : "DELETE", ids : encoded_arrayId },
						success : function(response){
							ajaxWaitMessage.hide();
							var result = response.responseText;
							switch(result){
								case 'success':
									ster_user_dataStore.reload();
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
		
		function ster_user_refresh(){
			ster_user_dbListAction = "GETLIST";
			ster_user_gridSearchField.reset();
			ster_user_searchPanel.getForm().reset();
			ster_user_dataStore.proxy.extraParams = { action : 'GETLIST' };
			ster_user_dataStore.proxy.extraParams.query = "";
			ster_user_dataStore.currentPage = 1;
			ster_user_gridPanel.store.reload({params: {start: 0, limit: globalPageSize, page : 1, query : ''}});
		}
		
		function ster_user_confirmFormValid(){
			return ster_user_formPanel.getForm().isValid();
		}
		
		function ster_user_resetForm(){
			ster_user_dbTask = 'CREATE';
			ster_user_dbTaskMessage = 'create';
			ster_user_formPanel.getForm().reset();
			ID_USERField.setValue(0);
		}
		
		function ster_user_setForm(){
			ster_user_dbTask = 'UPDATE';
            ster_user_dbTaskMessage = 'update';
			
			var record = ster_user_gridPanel.getSelectionModel().getSelection()[0];
			ID_USERField.setValue(record.data.ID_USER);
			USERField.setValue(record.data.USER);
			PASSField.setValue(record.data.PASS);
			NAMAField.setValue(record.data.NAMA);
			NIPField.setValue(record.data.NIP);
			TELPField.setValue(record.data.TELP);
			EMAILField.setValue(record.data.EMAIL);
			ID_HAKField.setValue(record.data.ID_HAK);
					}
		
		function ster_user_showSearchWindow(){
			ster_user_searchWindow.show();
		}
		
		function ster_user_search(){
			ster_user_gridSearchField.reset();
			
			var USERValue = '';
			var PASSValue = '';
			var NAMAValue = '';
			var NIPValue = '';
			var TELPValue = '';
			var EMAILValue = '';
			var ID_HAKValue = '';
						
			USERValue = USERSearchField.getValue();
			PASSValue = PASSSearchField.getValue();
			NAMAValue = NAMASearchField.getValue();
			NIPValue = NIPSearchField.getValue();
			TELPValue = TELPSearchField.getValue();
			EMAILValue = EMAILSearchField.getValue();
			ID_HAKValue = ID_HAKSearchField.getValue();
			ster_user_dbListAction = "SEARCH";
			ster_user_dataStore.proxy.extraParams = { 
				USER : USERValue,
				PASS : PASSValue,
				NAMA : NAMAValue,
				NIP : NIPValue,
				TELP : TELPValue,
				EMAIL : EMAILValue,
				ID_HAK : ID_HAKValue,
				action : 'SEARCH'
			};
			ster_user_dataStore.currentPage = 1;
			ster_user_gridPanel.store.reload({
				params : {
					start : 0,
					limit : globalPageSize
				}
			});
		}
		
		function ster_user_printExcel(outputType){
			var searchText = "";
			var USERValue = '';
			var PASSValue = '';
			var NAMAValue = '';
			var NIPValue = '';
			var TELPValue = '';
			var EMAILValue = '';
			var ID_HAKValue = '';
			
			if(ster_user_dataStore.proxy.extraParams.query!==null){searchText = ster_user_dataStore.proxy.extraParams.query;}
			if(ster_user_dataStore.proxy.extraParams.USER!==null){USERValue = ster_user_dataStore.proxy.extraParams.USER;}
			if(ster_user_dataStore.proxy.extraParams.PASS!==null){PASSValue = ster_user_dataStore.proxy.extraParams.PASS;}
			if(ster_user_dataStore.proxy.extraParams.NAMA!==null){NAMAValue = ster_user_dataStore.proxy.extraParams.NAMA;}
			if(ster_user_dataStore.proxy.extraParams.NIP!==null){NIPValue = ster_user_dataStore.proxy.extraParams.NIP;}
			if(ster_user_dataStore.proxy.extraParams.TELP!==null){TELPValue = ster_user_dataStore.proxy.extraParams.TELP;}
			if(ster_user_dataStore.proxy.extraParams.EMAIL!==null){EMAILValue = ster_user_dataStore.proxy.extraParams.EMAIL;}
			if(ster_user_dataStore.proxy.extraParams.ID_HAK!==null){ID_HAKValue = ster_user_dataStore.proxy.extraParams.ID_HAK;}
			var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
			Ext.Ajax.request({
				waitMsg : 'Please Wait...',
				url : 'c_master_user/switchAction',
				params : {
					action : outputType,
					query : searchText,
					USER : USERValue,
					PASS : PASSValue,
					NAMA : NAMAValue,
					NIP : NIPValue,
					TELP : TELPValue,
					EMAIL : EMAILValue,
					ID_HAK : ID_HAKValue,
					currentAction : ster_user_dbListAction
				},
				success: function(response){
					ajaxWaitMessage.hide();
					var result = response.responseText;
					switch(result){
						case 'success':
							if(outputType == 'EXCEL'){
								window.open('./print/master_user_list.xls');
							}else{
								window.open('./print/master_user_list.html','ster_userlist','height=600,width=800,resizable=1,scrollbars=1, menubar=0');
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
		ster_user_dataStore = Ext.create('Ext.data.Store',{
			id : 'ster_user_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_master_user/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_USER'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'ID_USER', type : 'int', mapping : 'ID_USER' },
				{ name : 'USER', type : 'string', mapping : 'USER' },
				{ name : 'PASS', type : 'string', mapping : 'PASS' },
				{ name : 'NAMA', type : 'string', mapping : 'NAMA' },
				{ name : 'NIP', type : 'string', mapping : 'NIP' },
				{ name : 'TELP', type : 'string', mapping : 'TELP' },
				{ name : 'EMAIL', type : 'string', mapping : 'EMAIL' },
				{ name : 'ID_HAK', type : 'int', mapping : 'ID_HAK' },
				]
		});
/* End DataStore declaration */
/* Start Shorcut Declaration */
		ster_user_shorcut = {
			binding : [
				{
					key : 'a',
					alt : true,
					fn : function(e, f){
						ster_user_confirmAdd();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : false,
					fn : function(e, f){
						ster_user_showSearchWindow();
						f.stopEvent();
					}
				},{
					key : 'f',
					alt : true,
					shift : true,
					fn : function(e, f){
						ster_user_gridSearchField.focus(true, 1000);
						f.stopEvent();
					}
				},{
					key : 'e',
					alt : true,
					fn : function(e, f){
						ster_user_confirmUpdate();
						f.stopEvent();
					}
				},{
					key : 'd',
					alt : true,
					fn : function(e, f){
						ster_user_confirmDelete();
						f.stopEvent();
					}
				},{
					key : 'r',
					alt : true,
					fn : function(e, f){
						ster_user_refresh();
						f.stopEvent();
					}
				},{
					key : 'p',
					alt : true,
					fn : function(e, f){
						ster_user_printExcel('PRINT');
						f.stopEvent();
					}
				},{
					key : 'x',
					alt : true,
					fn : function(e, f){
						ster_user_printExcel('EXCEL');
						f.stopEvent();
					}
				}
			]
		};
/* End Shorcut Declaration */
/* Start GridPanel declaration */
		var ster_user_addButton = Ext.create('Ext.Button',{
			text : globalAddButtonTitle,
			tooltip : globalAddTooltip,
			iconCls : 'icon16x16-add',
			handler : ster_user_confirmAdd
		});
		var ster_user_editButton = Ext.create('Ext.Button',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls : 'icon16x16-edit',
			handler : ster_user_confirmUpdate
		});
		var ster_user_deleteButton = Ext.create('Ext.Button',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls : 'icon16x16-delete',
			handler : ster_user_confirmDelete
		});
		var ster_user_refreshButton = Ext.create('Ext.Button',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls : 'icon16x16-refresh',
			handler : ster_user_refresh
		});
		var ster_user_searchButton = Ext.create('Ext.Button',{
			text : globalSearchButtonTitle,
			tooltip : globalSearchTooltip,
			iconCls : 'icon16x16-search',
			handler : ster_user_showSearchWindow
		});
		var ster_user_printButton = Ext.create('Ext.Button',{
			text : globalPrintButtonTitle,
			tooltip : globalPrintTooltip,
			iconCls : 'icon16x16-print',
			handler : function(){
				ster_user_printExcel('PRINT');
			}
		});
		var ster_user_excelButton = Ext.create('Ext.Button',{
			text : globalExportButtonTitle,
			tooltip : globalExportTooltip,
			iconCls : 'icon16x16-table',
			handler : function(){
				ster_user_printExcel('EXCEL');
			}
		});
		
		var ster_user_contextMenuEdit = Ext.create('Ext.menu.Item',{
			text : globalEditButtonTitle,
			tooltip : globalEditTooltip,
			iconCls :'icon16x16-edit',
			handler : ster_user_confirmUpdate
		});
		var ster_user_contextMenuDelete = Ext.create('Ext.menu.Item',{
			text : globalDeleteButtonTitle,
			tooltip : globalDeleteTooltip,
			iconCls :'icon16x16-delete',
			handler : ster_user_confirmDelete
		});
		var ster_user_contextMenuRefresh = Ext.create('Ext.menu.Item',{
			text : globalRefreshButtonTitle,
			tooltip : globalRefreshTooltip,
			iconCls :'icon16x16-refresh',
			handler : ster_user_refresh
		});
		ster_user_contextMenu = Ext.create('Ext.menu.Menu',{
			id: 'ster_user_contextMenu',
			items: [
				ster_user_contextMenuEdit,ster_user_contextMenuDelete,'-',ster_user_contextMenuRefresh
			]
		});
		
		ster_user_gridSearchField = Ext.create('Ext.ux.form.SearchField', {
			store : ster_user_dataStore,
			listeners : {
				specialkey: function(f,e){
					if(e.getKey() == e.ENTER){
						ster_user_dataStore.proxy.extraParams = { action : 'GETLIST'};
						ster_user_dbListAction = 'GETLIST';
					}
				},
				render: function(c){
					Ext.get(this.id).set({qtitle : globalSimpleSearchTooltip});
				}
			},
			width: 150
		});
		ster_user_gridPanel = Ext.create('Ext.grid.Panel',{
			id : 'ster_user_gridPanel',
			constrain : true,
			store : ster_user_dataStore,
			loadMask : true,
            enableColLock : false,
			renderTo : 'ster_userGrid',
			width : '95%',
			selModel : Ext.selection.Model(),
			viewConfig : { 
				forceFit:true,
				listeners: {
					itemcontextmenu: function(view, rec, node, index, e) {
						e.stopEvent();
						ster_user_contextMenu.showAt(e.getXY());
						return false;
					}
				}
			},
			multiSelect : true,
			keys : ster_user_shorcut,
			columns : [
				{
					text : 'USER',
					dataIndex : 'USER',
					width : 100,
					sortable : false
				},
				{
					text : 'PASS',
					dataIndex : 'PASS',
					width : 100,
					sortable : false
				},
				{
					text : 'NAMA',
					dataIndex : 'NAMA',
					width : 100,
					sortable : false
				},
				{
					text : 'NIP',
					dataIndex : 'NIP',
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
					text : 'EMAIL',
					dataIndex : 'EMAIL',
					width : 100,
					sortable : false
				},
				{
					text : 'ID_HAK',
					dataIndex : 'ID_HAK',
					width : 100,
					sortable : false
				},
				{
					xtype:'actioncolumn',
					width:100,
					text : 'Lihat Hak Akses',
					items: [{
						iconCls : 'magnifier',
						tooltip : 'Ubah Status',
						handler: function(grid, rowIndex, colIndex, node, e) {
							grid.getSelectionModel().select(rowIndex);
							var record = grid.getSelectionModel().getSelection()[0];
							user_id = record.get('ID_USER');
							window.location = "<?php echo site_url(); ?>/";
						}
					}],
					<?//php echo ($_SESSION["IDHAK"] == 2) ? ("hidden:true") : (""); ?>
				}	
							
			],
			tbar : [
				ster_user_addButton,
				ster_user_editButton,
				ster_user_deleteButton,
				ster_user_gridSearchField,
				ster_user_searchButton,
				ster_user_refreshButton,
				ster_user_printButton,
				ster_user_excelButton
			],
			bbar : Ext.create('Ext.PagingToolbar', {
				store : ster_user_dataStore,
				displayInfo : true
			}),
			listeners : {
				afterrender : function(){
					ster_user_dataStore.reload({params: {start: 0, limit: globalPageSize}});
				}
			}
		});
/* End GridPanel declaration */
/* Start FormPanel declaration */
		ID_USERField = Ext.create('Ext.form.NumberField',{
			id : 'ID_USERField',
			name : 'ID_USER',
			fieldLabel : 'ID_USER<font color=red>*</font>',
			allowBlank : false,
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			hidden : true,
			maskRe : /([0-9]+)$/});
		USERField = Ext.create('Ext.form.TextField',{
			id : 'USERField',
			name : 'USER',
			fieldLabel : 'USER',
			maxLength : 100
		});
		PASSField = Ext.create('Ext.form.TextField',{
			id : 'PASSField',
			name : 'PASS',
			fieldLabel : 'PASS',
			maxLength : 100
		});
		NAMAField = Ext.create('Ext.form.TextField',{
			id : 'NAMAField',
			name : 'NAMA',
			fieldLabel : 'NAMA',
			maxLength : 100
		});
		NIPField = Ext.create('Ext.form.TextField',{
			id : 'NIPField',
			name : 'NIP',
			fieldLabel : 'NIP',
			maxLength : 100
		});
		TELPField = Ext.create('Ext.form.TextField',{
			id : 'TELPField',
			name : 'TELP',
			fieldLabel : 'TELP',
			maxLength : 20
		});
		EMAILField = Ext.create('Ext.form.TextField',{
			id : 'EMAILField',
			name : 'EMAIL',
			fieldLabel : 'EMAIL',
			maxLength : 100
		});
		ID_HAKField = Ext.create('Ext.form.NumberField',{
			id : 'ID_HAKField',
			name : 'ID_HAK',
			fieldLabel : 'ID_HAK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,
			maskRe : /([0-9]+)$/});
		var ster_user_saveButton = Ext.create('Ext.Button',{
			text : globalSaveButtonTitle,
			handler : ster_user_save
		});
		var ster_user_cancelButton = Ext.create('Ext.Button',{
			text : globalCancelButtonTitle,
			handler : function(){
				ster_user_resetForm();
				ster_user_switchToGrid();
			}
		});
		ster_user_formPanel = Ext.create('Ext.form.Panel', {
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
						ID_USERField,
						USERField,
						PASSField,
						NAMAField,
						NIPField,
						TELPField,
						EMAILField,
						ID_HAKField,
											]
				}, {
					xtype : 'splitter'
				}, {
					bodyPadding : 5,
					items : [Ext.create('Ext.form.Label',{ html : 'Keterangan : ' + globalRequiredInfo })],
					flex : 2
				}],
			buttons : [ster_user_saveButton,ster_user_cancelButton]
		});
		ster_user_formWindow = Ext.create('Ext.window.Window',{
			id : 'ster_user_formWindow',
			renderTo : 'ster_userSaveWindow',
			title : globalFormAddEditTitle + ' ' + ster_user_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			modal : true,
			closable : false,
			items : [ster_user_formPanel]
		});
/* End FormPanel declaration */
/* Start SearchPanel declaration */
		USERSearchField = Ext.create('Ext.form.TextField',{
			id : 'USERSearchField',
			name : 'USER',
			fieldLabel : 'USER',
			maxLength : 100
		
		});
		PASSSearchField = Ext.create('Ext.form.TextField',{
			id : 'PASSSearchField',
			name : 'PASS',
			fieldLabel : 'PASS',
			maxLength : 100
		
		});
		NAMASearchField = Ext.create('Ext.form.TextField',{
			id : 'NAMASearchField',
			name : 'NAMA',
			fieldLabel : 'NAMA',
			maxLength : 100
		
		});
		NIPSearchField = Ext.create('Ext.form.TextField',{
			id : 'NIPSearchField',
			name : 'NIP',
			fieldLabel : 'NIP',
			maxLength : 100
		
		});
		TELPSearchField = Ext.create('Ext.form.TextField',{
			id : 'TELPSearchField',
			name : 'TELP',
			fieldLabel : 'TELP',
			maxLength : 20
		
		});
		EMAILSearchField = Ext.create('Ext.form.TextField',{
			id : 'EMAILSearchField',
			name : 'EMAIL',
			fieldLabel : 'EMAIL',
			maxLength : 100
		
		});
		ID_HAKSearchField = Ext.create('Ext.form.NumberField',{
			id : 'ID_HAKSearchField',
			name : 'ID_HAK',
			fieldLabel : 'ID_HAK',
			allowNegatife : false,
			blankText : '0',
			allowDecimals : false,maskRe : /([0-9]+)$/
		});
		var ster_user_searchingButton = Ext.create('Ext.Button',{
			text : globalSearchingButtonTitle,
			handler : ster_user_search
		});
		var ster_user_cancelSearchButton = Ext.create('Ext.Button',{
			text : globalSearchCloseButtonTitle,
			handler : function(){
				ster_user_searchWindow.hide();
			}
		});
		ster_user_searchPanel = Ext.create('Ext.form.Panel', {
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
						USERSearchField,
						PASSSearchField,
						NAMASearchField,
						NIPSearchField,
						TELPSearchField,
						EMAILSearchField,
						ID_HAKSearchField,
						]
				}],
			buttons : [ster_user_searchingButton,ster_user_cancelSearchButton]
		});
		ster_user_searchWindow = Ext.create('Ext.window.Window',{
			id : 'ster_user_searchWindow',
			renderTo : 'ster_userSearchWindow',
			title : globalFormSearchTitle + ' ' + ster_user_componentItemTitle,
			width : 500,
			minHeight : 300,
			autoHeight : true,
			constrain : true,
			closeAction : 'hide',
			items : [ster_user_searchPanel]
		});
/* End SearchPanel declaration */
});
</script>
<div id="ster_userSaveWindow"></div>
<div id="ster_userSearchWindow"></div>
<div class="span12" id="ster_userGrid"></div>