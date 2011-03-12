<?php //include_partial('form', array('form' => $form)) ?>

<script type="text/javascript">
  Ext.onReady(function(){

    Ext.QuickTips.init();
    Ext.BLANK_IMAGE_URL = '/js/ext-3.3.0/resources/images/default/s.gif';

    var defaults = {
      anchor      : '-20',
      allowBlank  : false,
      msgTarget   : 'side'
    };

    var defaults_blank = {
      anchor      : '-20',
      allowBlank  : true,
      msgTarget   : 'side'
    };

    var podstawowe = {
      xtype       : 'fieldset',
      title       : 'Dane podstawowe',
      labelWidth  : 150,
      defaultType : 'textfield',
      defaults    : defaults,
      items       : [
        {
          xtype       : 'hidden',
          name        : 'badanie[pacjent_id]',
          value       : '<?php echo $pacjent->getId() ?>'
        },
        {
          xtype       : 'datefield',
          fieldLabel  : 'Data badania',
          name        : 'badanie[data_badania]'
        },
        {
          xtype       : 'checkbox',
          fieldLabel  : 'W czasie mestruacji?',
          name        : 'badanie[menstruacja]',
          disabled    : <?php echo ($pacjent->getPlec() == 'm') ? 'true' : 'false' ?>
        },
        {
          xtype       : 'textarea',
          fieldLabel  : 'Dodatkowe uwagi',
          name        : 'badanie[inne]',
          allowBlank  : true
        },
        {
          xtype       : 'radiogroup',
          fieldLabel  : 'Papierosy',
          id          : 'papierosy-radiogroup',
          items       : [
            {
              boxLabel    : 'Nie',
              name        : 'papierosy_przelacznik',
              inputValue  : 'np'
            },
            {
              boxLabel    : 'Aktywnie',
              name        : 'papierosy_przelacznik',
              inputValue  : 'ap'
            },
            {
              boxLabel    : 'Biernie',
              name        : 'papierosy_przelacznik',
              inputValue  : 'bp'
            }
          ]
        }
      ]
    };

    var papierosy_aktywnie = {
      xtype       : 'fieldset',
      title       : 'Aktywne palenie',
      labelWidth  : 150,
      defaultType : 'textfield',
      defaults    : defaults_blank,
      id          : 'papierosy_aktywnie_fieldset',
      hidden      : true,
      items       : [
        {
          xtype       : 'hidden',
          name        : 'badanie[Papierosy][typ]',
          value       : 'ap'
        },
        {
          fieldLabel  : 'Ilość sztuk na dzień',
          name        : 'badanie[Papierosy][Cechy][ilosc_sztuk_na_dzien][wartosc]',
          maskRe      : /[0-9]/i
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Papierosy][Cechy][ilosc_sztuk_na_dzien][typ_cechy_id]',
          value       : '<?php echo $typy_cech['ilosc-sztuk-na-dzien']['id'] ?>'
        },
        {
          fieldLabel  : 'Okres palenia [w latach]',
          name        : 'badanie[Papierosy][Cechy][okres_palenia][wartosc]',
          maskRe      : /[0-9]/i
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Papierosy][Cechy][okres_palenia][typ_cechy_id]',
          value       : '<?php echo $typy_cech['okres-palenia']['id'] ?>'
        },
        {
          fieldLabel  : 'Ostatni papieros [H]',
          name        : 'badanie[Papierosy][Cechy][ostatni_papieros][wartosc]',
          maskRe      : /[0-9]/i
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Papierosy][Cechy][ostatni_papieros][typ_cechy_id]',
          value       : '<?php echo $typy_cech['ostatni-papieros']['id'] ?>'
        },
        {
          xtype       : 'datefield',
          fieldLabel  : 'Data zaprzestania',
          name        : 'badanie[Papierosy][Cechy][data_zaprzestania][wartosc]'
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Papierosy][Cechy][data_zaprzestania][typ_cechy_id]',
          value       : '<?php echo $typy_cech['data-zaprzestania']['id'] ?>'
        }
      ]
    };

    var papierosy_biernie = {
      xtype       : 'fieldset',
      title       : 'Bierne palenie',
      labelWidth  : 150,
      defaultType : 'textfield',
      defaults    : defaults_blank,
      id          : 'papierosy_biernie_fieldset',
      hidden      : true,
      items       : [
        {
          xtype       : 'hidden',
          name        : 'badanie[Narazenie][typ]',
          value       : 'bp'
        },
        {
          fieldLabel  : 'Miejsce narażenia',
          name        : 'badanie[Narazenie][Cechy][miejsce_narazenia][wartosc]'
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Narazenie][Cechy][miejsce_narazenia][typ_cechy_id]',
          value       : '<?php echo $typy_cech['miejsce-narazenia']['id'] ?>'
        },
        {
          fieldLabel  : 'Czas ekspozycji [H]',
          name        : 'badanie[Narazenie][Cechy][czas_ekspozycji][wartosc]',
          maskRe      : /[0-9]/i
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Narazenie][Cechy][czas_ekspozycji][typ_cechy_id]',
          value       : '<?php echo $typy_cech['czas-ekspozycji']['id'] ?>'
        },
        {
          xtype       : 'checkbox',
          fieldLabel  : 'Przed badaniem',
          name        : 'badanie[Narazenie][Cechy][przed_badaniem][wartosc]'
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Narazenie][Cechy][przed_badaniem][typ_cechy_id]',
          value       : '<?php echo $typy_cech['przed-badaniem']['id'] ?>'
        }
      ]
    };

    var alkohol = {
      xtype       : 'fieldset',
      title       : 'Alkohol',
      labelWidth  : 150,
      defaultType : 'textfield',
      defaults    : defaults,
      tools       : [
        {
          id      : 'help',
          handler : function() {
            help_window('Jedna jednostka alkoholu to: 250ml piwa, 125ml wina lub 25ml wódki.');
          }
        }
      ],
      items       : [
        {
          xtype       : 'hidden',
          name        : 'badanie[Alkohol][typ]',
          value       : 'aa'
        },
        {
          fieldLabel  : 'Jednostek na tydzień',
          name        : 'badanie[Alkohol][Cechy][jednostek_na_tydzien][wartosc]',
          maskRe      : /[0-9]/i
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Alkohol][Cechy][jednostek_na_tydzien][typ_cechy_id]',
          value       : '<?php echo $typy_cech['jednostek-na-tydzien']['id'] ?>'
        },
        {
          xtype       : 'checkbox',
          fieldLabel  : 'Przed badaniem',
          name        : 'badanie[Alkohol][Cechy][przed_badaniem][wartosc]'
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Alkohol][Cechy][przed_badaniem][typ_cechy_id]',
          value       : '<?php echo $typy_cech['przed-badaniem']['id'] ?>'
        },
        {
          xtype       : 'datefield',
          fieldLabel  : 'Data zaprzestania',
          name        : 'badanie[Alkohol][Cechy][data_zaprzestania][wartosc]'
        },
        {
          xtype       : 'hidden',
          name        : 'badanie[Alkohol][Cechy][data_zaprzestania][typ_cechy_id]',
          value       : '<?php echo $typy_cech['data-zaprzestania']['id'] ?>'
        }
      ]
    };

    var inne_uzywki_list = new Array();

    for (var i = 0; i < 5; i++) {
      var tmp = {
        xtype           : 'fieldset',
        title           : 'Używka nr. ' + (i + 1),
        labelWidth      : 150,
        defaults        : defaults_blank,
        defaultType     : 'textfield',
        border          : false,
        items           : [
          {
            fieldLabel  : 'Rodzaj',
            name        : 'badanie[Inne-' + i +'][Cechy][rodzaj][wartosc]'
          },
          {
            xtype       : 'hidden',
            name        : 'badanie[Inne-' + i +'][Cechy][rodzaj][typ_cechy_id]',
            value       : '<?php echo $typy_cech['rodzaj']['id'] ?>'
          },
          {
            fieldLabel  : 'Częstość zażywania',
            name        : 'badanie[Inne-' + i +'][Cechy][czestosc_zazywania][wartosc]',
            maskRe      : /[0-9]/i
          },
          {
            xtype       : 'hidden',
            name        : 'badanie[Inne-' + i +'][Cechy][czestosc_zazywania][typ_cechy_id]',
            value       : '<?php echo $typy_cech['czestosc-zazywania']['id'] ?>'
          },
          {
            xtype       : 'checkbox',
            fieldLabel  : 'Przed badaniem',
            name        : 'badanie[Inne-' + i +'][Cechy][przed_badaniem][wartosc]'
          },
          {
            xtype       : 'hidden',
            name        : 'badanie[Inne-' + i +'][Cechy][przed_badaniem][typ_cechy_id]',
            value       : '<?php echo $typy_cech['przed-badaniem']['id'] ?>'
          },
          {
            xtype       : 'datefield',
            fieldLabel  : 'Data zaprzestania',
            name        : 'badanie[Inne-' + i +'][Cechy][data_zaprzestania][wartosc]'
          },
          {
            xtype       : 'hidden',
            name        : 'badanie[Inne-' + i +'][Cechy][data_zaprzestania][typ_cechy_id]',
            value       : '<?php echo $typy_cech['data-zaprzestania']['id'] ?>'
          },
          {
            xtype       : 'hidden',
            name        : 'badanie[Inne-' + i +'][typ]',
            value       : 'iu'
          }
        ]
      }

      inne_uzywki_list.push(tmp);
    }

    var inne_uzywki = {
      xtype           : 'fieldset',
      title           : 'Inne używki',
      height          : 200,
      autoScroll      : true,
      style           : 'padding:20px 0 0 0',
      checkboxToggle  : true,
      collapsed       : true,
      items           : inne_uzywki_list
    };

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
          url     : '<?php echo url_for('badanie_submit', $pacjent, true) ?>',
          success : onSuccessOrFail,
          failure : onSuccessOrFail
        });
      }
    }

    var myFormPanel = new Ext.form.FormPanel({
      renderTo      : 'form-wrapper',
      iconCls       : 'icon-application_form',
      title         : 'Badanie',
      frame         : true,
      id            : 'myFormPanel',
      items         : [
        podstawowe,
        papierosy_aktywnie,
        papierosy_biernie,
        alkohol,
        inne_uzywki
      ],
      buttonAlign   : 'center',
      buttons       : [
        {
          text      : 'Anuluj',
          iconCls   : 'icon-cross',
          handler   : function() {
            please_wait_window();
            window.location = '<?php echo url_for('pacjent_show', $pacjent) ?>';
          }
        },
        {
          text      : 'Zapisz',
          iconCls   : 'icon-tick',
          handler   : submitHandler
        }
      ]
    });

    Ext.getCmp('papierosy-radiogroup').on('change', function(rg, radio) {
      var ap = Ext.getCmp('papierosy_aktywnie_fieldset');
      var bp = Ext.getCmp('papierosy_biernie_fieldset');

      if ('ap' == radio.getRawValue()) {
        ap.enable();
        ap.show();
        bp.hide();
        bp.disable();
      }
      else if ('bp' == radio.getRawValue()) {
        bp.enable();
        bp.show();
        ap.hide();
        ap.disable();
      }
      else {
        ap.hide();
        ap.disable();
        bp.hide();
        bp.disable();
      }
    });

    Ext.getCmp('papierosy-radiogroup').setValue('papierosy_przelacznik', true);

  });
</script>

<div style="width:500px;margin:10px auto" id="form-wrapper"></div>
