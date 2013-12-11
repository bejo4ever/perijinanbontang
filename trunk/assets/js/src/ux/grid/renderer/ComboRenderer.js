Ext.define('Ext.ux.grid.renderer.ComboRenderer', {
	constructor: function(combo) {
		var me = this;
        return function(value, meta, record) {
			return me.renderer({value: value, meta: meta, record: record, combo: combo});
		};
    },
	
	renderer: function(options){
		var value = options.value;
		var combo = options.combo;
		
		var returnValue = value;
		var valueField = combo.valueField;
			
		var idx = combo.store.findBy(function(record) {
			if(record.get(valueField) == value) {
				returnValue = record.get(combo.displayField);
				return true;
			}else{
				return false;
			}
		});
		
		// This is our application specific and might need to be removed for your apps
		if(idx < 0 && value == 0) {
			returnValue = '';
		}
		
		return returnValue;
	}
});