<style type="text/css">
.combo-result-item {
  padding:  2px;
  border:   1px solid #FFFFFF;
  font-size: 120%;
}
.show-pacjent-result {
  color: blue;
}
.show-pacjent-result:hover {
  text-decoration: none;
}
</style>

<script type="text/javascript">

Ext.onReady(function(){
  
  Ext.QuickTips.init();
  Ext.BLANK_IMAGE_URL = '/js/ext-3.3.0/resources/images/default/s.gif';

  /********************************SMART COMBO**********************************/
  var tpl = new Ext.XTemplate(
    '<tpl for=".">',
      '<div class="combo-result-item">',
        '<div class="combo-pesel">PESEL: {pesel}</div>',
        '<div class="combo-name">{nazwisko_imie_highlight} {lata} l.</div>',
      '</div>',
    '</tpl>'
  );

  var searchJsonStore = new Ext.data.JsonStore({
    root          : 'records',
    fields        : [
      {
        name      : 'nazwisko_imie',
        mapping   : 'nazwisko_imie'
      },
      {
        name      : 'nazwisko_imie_highlight',
        mapping   : 'nazwisko_imie_highlight'
      },
      {
        name      : 'lata',
        mapping   : 'lata'
      },
      {
        name      : 'pesel',
        mapping   : 'pesel'
      },
      {
        name      : 'id',
        mapping   : 'id'
      }
    ],
    proxy         : new Ext.data.HttpProxy({
      url         : '<?php echo url_for('@pacjent_search') ?>'
    }),
    totalProperty : 'totalCount'
  });

  var smart_combo = {
    xtype         : 'combo',
    forceSelection: true,
    displayField  : 'nazwisko_imie',
    valueField    : 'id',
    loadingText   : 'Pobieranie danych...',
    minChars      : 3,
    triggerAction : 'name',
    store         : searchJsonStore,
    pageSize      : 2,
    tpl           : tpl,
    itemSelector  : 'div.combo-result-item',
    width         : 300,
    emptyText     : 'Zacznij wpisywać PESEL, albo Nazwisko',
    id            : 'mySmartCombo'
  }
  /********************************SMART COMBO**********************************/
  /***********************************GRID*************************************/
  var page_size = 100;

  var recordFields = [
    { name: 'id',       mapping: 'id' },
    { name: 'imie',     mapping: 'imie' },
    { name: 'nazwisko', mapping: 'nazwisko' },
    { name: 'pesel',    mapping: 'pesel' }
  ];

  var remoteJsonStore = new Ext.data.JsonStore({
    fields        : recordFields,
    url           : '<?php echo url_for('@pacjenci') ?>',
    totalProperty : 'totalCount',
    root          : 'records',
    id            : 'ourRemoteStore',
    autoLoad      : false,
    remoteSort    : true
  });

  var columns = [
    { header: 'id',         width: 50,  fixed: true,  dataIndex: 'id',        align: 'right' },
    { header: 'Imię',       width: 200, fixed: false, dataIndex: 'imie',      sortable: true },
    { header: 'Nazwisko',   width: 250, fixed: false, dataIndex: 'nazwisko',  sortable: true, id: 'nazwisko_column' },
    { header: 'PESEL',      width: 100, fixed: true,  dataIndex: 'pesel' },
    { header: 'Szczegóły',  width: 100, fixed: true,  dataIndex: 'id',        align: 'center', renderer: function(value){ return '<a class="show-pacjent-result" href="/pacjent/'+value+'">Szczegóły</a>'; } }
  ];

  var pagingToolbar = {
    xtype         : 'paging',
    store         : remoteJsonStore,
    pageSize      : page_size,
    displayInfo   : true
  };

  var grid = {
    xtype           : 'grid',
    columns         : columns,
    store           : remoteJsonStore,
    loadMask        : true,
    bbar            : pagingToolbar,
    stripeRows      : true,
    border          : false,
    autoExpandColumn: 'nazwisko_column'
  };
  /***********************************GRID*************************************/
  new Ext.Viewport({
    layout      : 'fit',
    items       : new Ext.Panel({
      items     : grid,
      title     : 'Lista pacjentów',
      iconCls   : 'icon-application',
      border    : false,
      layout    : 'fit',
        tbar      : [
          {
            text    : 'Dodaj nowego pacjenta',
            iconCls : 'icon-add',
            handler : function() {
              please_wait_window();
              window.location = '<?php echo url_for('pacjent_new') ?>';
            }
          }, '->',
          {
            iconCls : 'icon-zoom',
            disabled : true
          },
          smart_combo
        ]
    })
  });

  Ext.getCmp('mySmartCombo').on('select', function(combo, record, index){ please_wait_window(); window.location = '/pacjent/'+record.get('id'); });
  
  Ext.select('a.show-pacjent-result').on('click', function(){ alert('Kliknąłś!'); return false; });

  Ext.StoreMgr.get('ourRemoteStore').load({
    params    : {
      start   : 0,
      limit   : page_size
    }
  });

});

</script>
