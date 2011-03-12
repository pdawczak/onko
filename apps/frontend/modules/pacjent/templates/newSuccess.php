<script type="text/javascript">
  Ext.onReady(function(){
    
    Ext.QuickTips.init();
    Ext.BLANK_IMAGE_URL = '/js/ext-3.3.0/resources/images/default/s.gif';

    var fields = [
      {
        fieldLabel  : 'Imię',
        name        : 'pacjent[imie]'
      },
      {
        fieldLabel  : 'Nazwisko',
        name        : 'pacjent[nazwisko]'
      },
      {
        fieldLabel  : 'PESEL',
        name        : 'pacjent[pesel]',
        maskRe      : /[0-9]/i,
        minLength   : 11,
        maxLength   : 11
      },
      {
        fieldLabel  : 'Data urodzenia',
        name        : 'pacjent[data_urodzenia]',
        xtype       : 'datefield'
      },
      {
        fieldLabel  : 'Płeć',
        xtype       : 'radiogroup',
        id          : 'plec_radiogroup',
        items       : [
          {
            boxLabel  : 'Mężczyzna',
            name      : 'pacjent[plec]',
            inputValue: 'm'
          },
          {
            boxLabel  : 'Kobieta',
            name      : 'pacjent[plec]',
            inputValue: 'k'
          }
        ]
      },
      {
        fieldLabel  : 'Wzrost [cm]',
        name        : 'pacjent[wzrost]',
        xtype       : 'numberfield'
      },
      {
        fieldLabel  : 'Waga [kg]',
        name        : 'pacjent[waga]',
        xtype       : 'numberfield'
      },
      {
        fieldLabel  : 'Ręka dominująca',
        xtype       : 'radiogroup',
        id          : 'reka_radiogroup',
        items       : [
          {
            boxLabel  : 'Lewa',
            name      : 'pacjent[reka]',
            inputValue: 'l'
          },
          {
            boxLabel  : 'Prawa',
            name      : 'pacjent[reka]',
            inputValue: 'p'
          },
          {
            boxLabel  : 'Obóręczny',
            name      : 'pacjent[reka]',
            inputValue: 'o'
          }
        ]
      }
    ];

    var onSuccessOrFail = function(form, action) {
      var formPanel = Ext.getCmp('myFormPanel');

      var result = action.result;
      if (result.success) {
        window.location = result.url;
      }
      else {
        formPanel.el.unmask();
        Ext.MessageBox.alert('Błąd', action.result.msg);
      }
    }

    var submitHandler = function() {
      var formPanel = Ext.getCmp('myFormPanel');

      if (formPanel.getForm().isValid()) {
        formPanel.el.mask('Proszę czekać', 'x-mask-loading');

        formPanel.getForm().submit({
          url     : '<?php echo url_for('@pacjent_submit') ?>',
          success : onSuccessOrFail,
          failure : onSuccessOrFail
        });
      }
    }

    var myFormPanel = new Ext.form.FormPanel({
      renderTo      : 'form-wrapper',
      iconCls       : 'icon-application_form',
      title         : 'Dodawanie nowego pacjenta',
      frame         : true,
      id            : 'myFormPanel',
      defaultType   : 'textfield',
      labelWidth    : 150,
      defaults      : {
        allowBlank  : false,
        anchor      : '-20',
        msgTarget   : 'side'
      },
      items         : fields,
      buttonAlign   : 'center',
      buttons       : [
        {
          text      : 'Anuluj',
          iconCls   : 'icon-cross',
          handler   : function() {
            please_wait_window();
            window.location = '<?php echo url_for('@homepage') ?>';
          }
        },
        {
          text      : 'Zapisz',
          iconCls   : 'icon-tick',
          handler   : submitHandler
        }
      ]
    });

  });
</script>

<div style="width:500px;margin:10px auto" id="form-wrapper"></div>