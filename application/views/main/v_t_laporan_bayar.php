<h4>Laporan Bayar</h4>
<script>
	Ext.onReady(function(){
/* Start variabel declaration */
		var laporan_bayar_dataStore;
		
		var laporan_bayar_formPanel;
		
		var laporan_bayar_tanggalAwalField;
		var laporan_bayar_tanggalAkhirField;
		var laporan_bayar_bulanField;
		var laporan_bayar_tahunField;
		var laporan_bayar_kelurahanField;
		var laporan_bayar_kecamatanField;
		var laporan_bayar_ijinField;
/* End variabel declaration */
		function laporan_bayar_save(outputType){
			if(laporan_bayar_confirmFormValid()){
				var laporan_bayar_ijinValue=laporan_bayar_ijinField.getValue();
				var laporan_bayar_ijin_namaValue=laporan_bayar_ijinField.getRawValue();
				var laporan_bayar_bulanValue=laporan_bayar_bulanField.getValue();
				var laporan_bayar_tahunValue=laporan_bayar_tahunField.getValue();
				var laporan_bayar_tanggalAwalValue=Ext.Date.format(laporan_bayar_tanggalAwalField.getValue(),'Y-m-d');
				var laporan_bayar_tanggalAkhirValue=Ext.Date.format(laporan_bayar_tanggalAkhirField.getValue(),'Y-m-d');
				var laporan_bayar_opsitglValue=laporan_bayar_opsitglField.getValue();
				var laporan_bayar_opsiblnValue=laporan_bayar_opsiblnField.getValue();
				if(laporan_bayar_opsitglField.getValue() == true){
					laporan_bayar_opsiValue = 'tanggal';
				}else{
					laporan_bayar_opsiValue = 'bulan';
				}
				var ajaxWaitMessage = Ext.MessageBox.wait(globalWaitMessage, globalWaitMessageTitle);
				Ext.Ajax.request({
					waitMsg: 'Please wait...',
					url: 'c_t_laporan_bayar/cetaklaporan_bayar',
					params: {	
						laporan_bayar_ijin : laporan_bayar_ijinValue,
						laporan_bayar_ijin_nama : laporan_bayar_ijin_namaValue,
						laporan_bayar_bulan : laporan_bayar_bulanValue,
						laporan_bayar_tahun : laporan_bayar_tahunValue,
						laporan_bayar_tanggalAwal : laporan_bayar_tanggalAwalValue,
						laporan_bayar_tanggalAkhir : laporan_bayar_tanggalAkhirValue,
						laporan_bayar_opsi : laporan_bayar_opsiValue,
						outputType : outputType
					},
					success: function(response){
						ajaxWaitMessage.hide();
						var result = response.responseText;
						window.open('<?php echo base_url(); ?>print/' + result);
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
		
		function laporan_bayar_confirmFormValid(){
			return laporan_bayar_formPanel.getForm().isValid();
		}
		
		function laporan_bayar_resetForm(){
			laporan_bayar_formPanel.getForm().reset();
		}
/* Start DataStore declaration */
		laporan_bayar_ijindataStore = Ext.create('Ext.data.Store',{
			pageSize : globalPageSize,
			autoLoad : true,
			proxy : Ext.create('Ext.data.HttpProxy',{
				url : 'c_master_ijin/switchAction',
				reader : {
					type : 'json',
					root : 'results',
					rootProperty : 'results',
					totalProperty : 'total',
					idProperty : 'ID_IJIN'
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
				{ name : 'NAMA_IJIN', type : 'string', mapping : 'NAMA_IJIN' }
			]
		});
/* End DataStore declaration */
/* Start FormPanel declaration */
		laporan_bayar_ijinField=Ext.create('Ext.form.ComboBox',{
			fieldLabel:'<b>Perijinan </b>',
			store : laporan_bayar_ijindataStore,
			mode: 'local',
			displayField: 'NAMA_IJIN',
			valueField: 'ID_IJIN',
			width: 100,
			triggerAction: 'all',
			labelWidth : 135
		});
		laporan_bayar_bulanField=Ext.create('Ext.form.ComboBox',{
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

		laporan_bayar_tahunField=Ext.create('Ext.form.ComboBox',{
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
			labelWidth : 25,
			labelSeparator : ' '
		});
		laporan_bayar_tanggalAwalField=Ext.create('Ext.form.Date',{
			fieldLabel: ' ',
			format : 'Y-m-d',
			name: 'laporan_bayar_tanggalAwalField',
			allowBlank: true,
			width: 150,
			value: new Date(),
			labelWidth : 25
		});

		laporan_bayar_tanggalAkhirField=Ext.create('Ext.form.Date',{
			fieldLabel: 's/d',
			format : 'Y-m-d',
			allowBlank: true,
			width: 150,
			value: new Date(),
			labelWidth : 25,
			labelSeparator : ' '
		});

		laporan_bayar_opsitglField=Ext.create('Ext.form.Radio',{
			boxLabel:'Tanggal',
			width:100,
			name: 'filter_opsi',
			checked: true,
			listeners: {
				check: function(){
					if(laporan_bayar_opsitglField.getValue()==true){
						laporan_bayar_tanggalAwalField.allowBlank=false;
						laporan_bayar_tanggalAkhirField.allowBlank=false;
					}else{
						laporan_bayar_tanggalAwalField.allowBlank=true;
						laporan_bayar_tanggalAkhirField.allowBlank=true;
					}
				}
			}
		});
		laporan_bayar_opsiblnField=Ext.create('Ext.form.Radio',{
			boxLabel:'Bulan',
			width:100,
			name: 'filter_opsi'
		});
		
		laporan_bayar_formPanel = Ext.create('Ext.FormPanel', {
			renderTo : 'laporan_bayarSaveWindow',
			width : 450,
			frame : true,
			autoHeight : true,
			layout : 'form',
			items: [
				laporan_bayar_ijinField,
				Ext.create('Ext.form.Label',{ html : '<br>' }),
				{
					xtype : 'fieldset',
					layout : 'column',
					border: false,
					items : [
						laporan_bayar_opsitglField,
						laporan_bayar_tanggalAwalField,
						laporan_bayar_tanggalAkhirField,
					]
				},{
					xtype : 'fieldset',
					layout: 'column',
					border: false,
					items:[laporan_bayar_opsiblnField,laporan_bayar_bulanField,laporan_bayar_tahunField]
				}
			],
			buttons : [
				{
					text : 'Cetak',
					tooltip : 'Cetak laporan_bayar',
					handler : function(){
						laporan_bayar_save('PRINT');
					}
				},
				{
					text : 'Excel',
					tooltip : 'Export laporan_bayar ke Excel',
					handler : function(){
						laporan_bayar_save('EXCEL');
					}
				}
			]
		});
/* End FormPanel declaration */
});
</script>
<div id="laporan_bayarSaveWindow"></div>