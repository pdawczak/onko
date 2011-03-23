<?php use_helper('myHelpers') ?>

<style type="text/css">
.cell-result-item {
  float: left;
  padding: 10px 0;
  font: 11px/13px arial,tahoma,helvetica,sans-serif;
}
.cell-result-cleaner {
  clear: both;
}
.my-link {
  color: blue;
}
.my-link:hover {
  text-decoration: none;
}
.result-item-date,
.result-item-result {
  font-size: 120%;
}
</style>

<script type="text/javascript">
Ext.onReady(function(){
  
  Ext.QuickTips.init();
  Ext.BLANK_IMAGE_URL = '/js/ext-3.3.0/resources/images/default/s.gif';

  var oceny = { 'wz': 'Wznowa', 'stg': 'Stagnacja', 'pr': 'Progresja', 'bcg': 'Brak cech guza' };

  var help = new Array();
  help['badanie'] = 'Tutaj znajdje się lista badań, jakie przeszedł pacjent. W celu przejżenia szczegółów, lub wyników badanie, proszę kliknąć "Szczegóły"';
  help['notatki'] = 'W tym polu można zostawiać, bądź odczytać notatki dotyczące pacjenta';

  var store = new Ext.data.JsonStore({
      url: '<?php echo url_for('badania_pacjent', $pacjent) ?>',
      root: 'records',
      fields: ['id', {name:'data_badania', type: 'date'}, 'ocena']
  });
  store.load();

  var tpl = new Ext.XTemplate(
    '<tpl for=".">',
      '<div class="cell-result-item">',
        '<div class="result-item-date">Data badania: {data_badania}</div>',
        '<div class="result-item-result">Ocena stanu guza: {ocena}</div>',
        '<div><a class="my-link" href="/badanie/{id}/<?php echo $pacjent->getId() ?>">Szczegóły</a></div>',
        
      '</div>',
      '<div class="cell-result-cleaner"></div>',
    '</tpl>'
  );

  var dv = new Ext.DataView({
    store       : store,
    tpl         : tpl,
    autoHeight  : true,
    emptyText   : 'Brak badań',
    prepareData : function(data) {

      if (data.ocena == null) {
        data.ocena = 'Brak wyników';
      }
      else {
        data.ocena = oceny[data.ocena];
      }

      data.data_badania = data.data_badania.format("d-m-Y");
      return data;
    }
  });

  new Ext.Viewport({
    layout          : 'fit',
    items           : new Ext.Panel({
      title         : 'Kartoteka pacjenta',
//      iconCls       : 'icon-application_double',
      iconCls       : 'icon-folder_user',
      border        : false,
      tbar          : [
        {
          xtype     : 'tbbutton',
          text      : 'Dodaj',
          iconCls   : 'icon-add',
          menu      : [
            {
              text    : 'Badanie',
              iconCls : 'icon-lightbulb',
              handler : function() {
                please_wait_window();
                window.location = '<?php echo url_for('badanie_new', $pacjent) ?>';
              }
            },
            {
              text    : 'Radioterapię',
              iconCls : 'icon-lightbulb',
              handler : function() {
                please_wait_window();
                window.location = '<?php echo url_for('pacjent_dodaj_radioterapie', $pacjent) ?>';
              }
            }
          ]
        },
        {
          xtype     : 'tbbutton',
          text      : 'Eksport danych',
//          iconCls   : 'icon-printer',
          iconCls   : 'icon-folder_page',
          menu      : [
            {
              text    : 'Dane pacjenta',
              iconCls : 'icon-vcard',
              menu    : [
                {
                  text    : 'csv',
                  iconCls : 'icon-page_excel',
                  handler : function() {
                    window.location = '<?php echo url_for('pacjent_export', array('id' => $pacjent->getId(), 'sf_format' => 'csv')) ?>';
                  }
                },
                {
                  text    : 'txt',
                  iconCls : 'icon-page',
                  handler : function() {
                    window.location = '<?php echo url_for('pacjent_export', array('id' => $pacjent->getId(), 'sf_format' => 'txt')) ?>';
                  }
                }
              ]
            },
            {
              text    : 'Badania',
              iconCls : 'icon-lightbulb',
              menu    : [
                {
                  text    : 'csv',
                  iconCls : 'icon-page_excel'
                },
                {
                  text    : 'txt',
                  iconCls : 'icon-page'
                }
              ]
            },
            {
              text    : 'txt',
              iconCls : 'icon-page'
            }
          ]
        },
        '->',
        {
          text      : 'Powrót',
          iconCls   : 'icon-arrow_left',
          handler   : function(){
            please_wait_window();
            window.location = '<?php echo url_for('@homepage') ?>';
          }
        }
      ],
      layout            : 'border',
      defaults          : {
        split           : true
      },
      items             : [
        {
          region        : 'center',
          layout        : 'accordion',
          layoutConfig  : {
            animate : true
          },
          defaults      : {
            autoScroll  : true,
            bodyStyle   : 'padding:0 20px;',
            border      : false
          },
//          margins       : {
//            right       : 5,
//            left        : 5,
//            bottom      : 5
//          },
          items         : [
            {
              xtype     : 'panel',
              title     : 'Badania',
              layout    : 'fit',
              items     : dv,
              iconCls   : 'icon-lightbulb',
              tools     : [
                {
                  id      : 'help',
                  handler : function() {
                    help_window(help['badanie']);
                  }
                }
              ]
            },
//            {
//              title     : 'Leki',
//              html      : 'tutaj poczutasz o jego lekach...'
//            },
//            {
//              title     : 'Alergie',
//              html      : 'Łoch, a tukej bedzie o alergiach... aaaaaa psiiiik...'
//            },
            /*{
              title     : 'Informacje / notatki',
              xtype     : 'panel',
              layout    : 'fit',
              bodyStyle : 'padding:0',
              iconCls   : 'icon-note',
              tools     : [
                {
                  id      : 'help',
                  handler : function() {
                    help_window(help['notatki']);
                  }
                }
              ],
              items     : [
                {
                  xtype : 'textarea',
                  id    : 'myEditor',
                  value : 'To tylko test',
                  style : 'padding:5px;border:0'
                }
              ]
            }*/
          ]
        },
        {
          region      : 'north',
          title       : 'Dane pacjenta',
          iconCls     : 'icon-vcard',
          html        : '<?php echo myGetPartial('pacjent/details', array('pacjent' => $pacjent)) ?>',
          collapsible : true,
          frame       : true,
          margins     : {
            top       : 5,
            left      : 5,
            right     : 5
          }
        }
      ]
    })
  });

  var html = Ext.getCmp('myEditor');
  html.on('blur', function(field) {
    if (field.isDirty()) {
      Ext.MessageBox.confirm('Zapisać zmiany?', 'Czy zapisać zmiany wprowadzone w tym polu?', function(button) {
        if ('yes' == button) {
          var value = field.getValue();
          Ext.MessageBox.alert('Zapiszywanie', 'Trwa zapisywanie, proszę czekać...');
        }
      });
    }
  });
});
</script>
