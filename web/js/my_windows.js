var please_wait_window = function() {
    Ext.MessageBox.show({
      msg           : '<center>Proszę czekać...</center>',
      width         : 300,
      closable      : false,
      modal         : true,
      iconCls       : 'icon-clock'
    });
}

var help_window = function(help_text) {
    Ext.MessageBox.show({
        msg             : help_text,
        width           : 500,
        modal           : true,
        icon            : Ext.MessageBox.QUESTION,
        buttons         : Ext.MessageBox.OK,
        title           : 'Pomoc',
        iconCls         : 'icon-help'
    });
}