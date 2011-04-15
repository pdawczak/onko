<?php /* @var $badanie Badanie */ ?>
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


</style>

<script type="text/javascript">
Ext.onReady(function(){
  
  Ext.QuickTips.init();
  Ext.BLANK_IMAGE_URL = '/js/ext-3.3.0/resources/images/default/s.gif';

//  var wz = new Ext.data.JsonStore({
//      url: '<?php // echo url_for('widma', array('badanie_id' => $badanie->getId(), 'lokalizacja' => 'wz')) ?>',
//      root: 'values',
//      fields: ['skala_ppm', 'widmo', 'linia_bazowa', 'widmo_bazowa']
//  });
//  wz.load();
//  var isp = new Ext.data.JsonStore({
//      url: '<?php // echo url_for('widma', array('badanie_id' => $badanie->getId(), 'lokalizacja' => 'isp')) ?>',
//      root: 'values',
//      fields: ['skala_ppm', 'widmo', 'linia_bazowa', 'widmo_bazowa']
//  });
//  isp.load();
//  var isc = new Ext.data.JsonStore({
//      url: '<?php // echo url_for('widma', array('badanie_id' => $badanie->getId(), 'lokalizacja' => 'isc')) ?>',
//      root: 'values',
//      fields: ['skala_ppm', 'widmo', 'linia_bazowa', 'widmo_bazowa']
//  });
//  isc.load();
  //////////////////////

  function chart(type) {
    return {
                  xtype       : 'linechart',
                  store       : type,
                  yField      : 'widmo',
                  xField      : 'skala_ppm',
                  series  : [
                    {
                      type        : 'line',
                      displayName : 'Linia bazowa',
                      yField      : 'linia_bazowa',
                      style       : {
                        color     : 0x99BBE8
                      }
                    },
                    {
                      type        : 'line',
                      yField      : 'widmo_bazowa',
                      displayName : 'Widmo, linia bazowa',
                      style       : {
                        color     : 0x15428B
                      }
                    },
                    {
                      type        : 'line',
                      displayName : 'Widmo',
                      yField      : 'widmo'
                    }
                  ]
                };
  }

  //////////////////////

  new Ext.Viewport({
    layout          : 'fit',
    items           : new Ext.Panel({
      title         : 'Badanie',
      iconCls       : 'icon-folder_lightbulb',
      border        : false,
      tbar          : [
        {
	  text      : 'Dodaj',
          xtype     : 'tbbutton',
	  menu      : [
            {
              text    : 'Dietę',
	      <?php if ($badanie->getHasDieta()) :  ?>
              disabled: true,
	      <?php endif ?>
              handler : function(){
	        window.location = '<?php echo url_for('badanie_dodaj_diete', $badanie) ?>';
	      }
	    }
          ]
	},
        '->',
        {
          text      : 'Powrót',
          iconCls   : 'icon-arrow_left',
          handler   : function(){
            please_wait_window();
            window.location = '<?php echo url_for('pacjent_show', $pacjent) ?>';
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
          items         : [
            {
              xtype     : 'panel',
              title     : 'Dieta',
              layout    : 'fit',
              html      : '<?php echo myGetPartial('dieta_details', array('badanie' => $badanie)) ?>',
              iconCls   : 'icon-chart_line'
            },
            {
              title     : 'Istota szara potyliczna',
              xtype     : 'panel',
              layout    : 'fit',
 //             items     : chart(isp),
              iconCls   : 'icon-chart_line'
            },
            {
              title     : 'Istota szara czołowa',
              xtype     : 'panel',
              layout    : 'fit',
  //            items     : chart(isc),
              iconCls   : 'icon-chart_line'
            }
          ]
        },
        {
          region      : 'north',
          title       : '',
          iconCls     : 'icon-lightbulb',
          html        : '<?php echo myGetPartial('badanie/badanie_info', array('badanie' => $badanie)) ?>',
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
  // ViewPort
});
</script>
