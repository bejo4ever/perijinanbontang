<h4>LAPORAN</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var laporan_dataStore;
		
		var laporan_formPanel;
		
		var laporan_tanggalAwalField;
		var laporan_tanggalAkhirField;
		var laporan_bulanField;
		var laporan_tahunField;
		var laporan_kelurahanField;
		var laporan_kecamatanField;
		var laporan_jenisField;
/* End variabel declaration */
		function laporan_save(){
			if(laporan_confirmFormValid()){
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_laporan/switchAction',
					params: {							
						
					},
					success: function(response){
						ajaxWaitMessage.hide();
						var result = response.responseText;
						switch(result){
							case 'success':
								
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
		
		function laporan_confirmFormValid(){
			return laporan_formPanel.getForm().isValid();
		}
		
		function laporan_resetForm(){
			laporan_formPanel.getForm().reset();
		}
/* Start DataStore declaration */
		laporan_dataStore = Ext.create('Ext.data.Store',{
			id : 'laporan_dataStore',
			pageSize : globalPageSize,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_t_laporan/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'laporan_id'
				},
				actionMethods : {
					read : 'POST'
				},
				extraParams : {
					action : 'GETLIST'
				}
			}),
			fields : [
				{ name : 'laporan_id', type : 'int', mapping : 'laporan_id' },
			]
		});
/* End DataStore declaration */
/* Start FormPanel declaration */
		laporan_bulanField=Ext.create('Ext.form.ComboBox',{
			fieldLabel:' ',
			store:new Ext.data.SimpleStore({
				fields:['value', 'display'],
				data:[['01','Januari'],['02','Pebruari'],['03','Maret'],['04','April'],['05','Mei'],['06','Juni'],['07','Juli'],['08','Agustus'],['09','September'],['10','Oktober'],['11','Nopember'],['12','Desember']]
			}),
			mode: 'local',
			displayField: 'display',
			valueField: 'value',
			value: Ext.Date.format(new Date(),'m'),
			width: 150,
			triggerAction: 'all',
			labelWidth : 25
		});

		laporan_tahunField=Ext.create('Ext.form.ComboBox',{
			fieldLabel:' ',
			store:new Ext.data.SimpleStore({
				fields:['tahun'],
				data: [['2013'], ['2014'], ['2015'], ['2016'], ['2017'], ['2018']]
			}),
			mode: 'local',
			displayField: 'tahun',
			valueField: 'tahun',
			value: Ext.Date.format(new Date(),'Y'),
			width: 150,
			triggerAction: 'all',
			labelWidth : 25
		});

		laporan_opsitglField=Ext.create('Ext.form.Radio',{
			boxLabel:'Tanggal',
			width:100,
			name: 'filter_opsi',
			checked: true,
			listeners: {
				check: function(){
					if(laporan_opsitglField.getValue()==true){
						laporan_tanggalAwalField.allowBlank=false;
						laporan_tanggalAkhirField.allowBlank=false;
					}else{
						laporan_tanggalAwalField.allowBlank=true;
						laporan_tanggalAkhirField.allowBlank=true;
					}
				}
			}
		});
		laporan_opsiblnField=Ext.create('Ext.form.Radio',{
			boxLabel:'Bulan',
			width:100,
			name: 'filter_opsi'
		});
		laporan_tanggalAwalField=Ext.create('Ext.form.Date',{
			fieldLabel: ' ',
			format : 'Y-m-d',
			name: 'laporan_tanggalAwalField',
			allowBlank: true,
			width: 150,
			value: new Date(),
			labelWidth : 25
		});

		laporan_tanggalAkhirField=Ext.create('Ext.form.Date',{
			fieldLabel: 's/d',
			format : 'Y-m-d',
			allowBlank: true,
			width: 150,
			value: new Date(),
			labelWidth : 25
		});
		
		laporan_jenisField=Ext.create('Ext.form.ComboBox',{
			fieldLabel:'<b>Jenis Cetak </b>',
			store : new Ext.data.SimpleStore({
				fields:['value', 'display'],
				data:[['1','Laporan Permohonan'],['2','Rekap Permohonan'],['3','Laporan SK Keluar']]
			}),
			mode: 'local',
			displayField: 'display',
			valueField: 'value',
			width: 100,
			triggerAction: 'all',
			labelWidth : 135
		});
		
		laporan_formPanel = Ext.create('Ext.FormPanel', {
			renderTo : 'laporanSaveWindow',
			width : 450,
			frame : true,
			autoHeight : true,
			layout : 'form',
			items: [
				laporan_jenisField,
				Ext.create('Ext.form.Label',{ html : '<br>Periode : ' }),
				{
					xtype : 'fieldset',
					layout : 'column',
					border: false,
					items : [
						laporan_opsitglField,
						laporan_tanggalAwalField,
						laporan_tanggalAkhirField,
					]
				},{
					xtype : 'fieldset',
					layout: 'column',
					border: false,
					items:[laporan_opsiblnField,laporan_bulanField,laporan_tahunField]
				}
			],
			buttons : [
				{
					text : 'Cetak',
					tooltip : 'Cetak Laporan',
					handler : function(){
						console.log("cetak");
					}
				},
				{
					text : 'Excel',
					tooltip : 'Export Laporan ke Excel',
					handler : function(){
						console.log("excel");
					}
				}
			]
		});
/* End FormPanel declaration */
});
</script>
<div id="laporanSaveWindow"></div>