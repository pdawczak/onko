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
          iconCls   : 'icon-add',
	  menu      : [
            {
              text      : 'Dietę',
              iconCls   : 'icon-book',
	      <?php if ($badanie->getHasDieta()) :  ?>
              disabled  : true,
	      <?php endif ?>
              handler   : function(){
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
              iconCls   : 'icon-book'
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
