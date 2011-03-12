<!--<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $badanie->getId() ?></td>
    </tr>
    <tr>
      <th>Pacjent:</th>
      <td><?php echo $badanie->getPacjentId() ?></td>
    </tr>
    <tr>
      <th>Data badania:</th>
      <td><?php echo $badanie->getDataBadania() ?></td>
    </tr>
    <tr>
      <th>Inne:</th>
      <td><?php echo $badanie->getInne() ?></td>
    </tr>
    <tr>
      <th>Menstruacja:</th>
      <td><?php echo $badanie->getMenstruacja() ?></td>
    </tr>
  </tbody>
</table>
<hr />

<a href="<?php echo url_for('badanie/edit?id='.$badanie->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('badanie/index') ?>">List</a>
-->
<?php /* @var $badanie Badanie */ ?>
<?php use_helper('myHelpers') ?>

<style type="text/css">

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
              title     : 'Wzgórze',
              layout    : 'fit',
//              items     : dv,
              html      : 'WZGÓRZE',
              iconCls   : 'icon-chart_line'
            },
            {
              title     : 'Istota szara potyliczna',
              xtype     : 'panel',
              layout    : 'fit',
              html      : 'ISTOTA SZARA POTYLICZNA',
              iconCls   : 'icon-chart_line'
            },
            {
              title     : 'Istota szara czołowa',
              xtype     : 'panel',
              layout    : 'fit',
              html      : '<?php //echo $badanie->getWynikBadania()->getWidmo(Widmo::WZGORZE)->getSkalaPpm() ?>',
              iconCls   : 'icon-chart_line'
            }
          ]
        },
        {
          region      : 'north',
          title       : '',
          iconCls     : 'icon-lightbulb',
          html        : '<?php //echo myGetPartial('badanie/badanie_info', array('badanie' => $badanie)) ?>',
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
