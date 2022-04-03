<?php
/* Smarty version 3.1.39, created on 2021-12-22 12:39:12
  from 'C:\OpenServer\domains\sport\core\components\migx\templates\mgr\cmptab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61c2f2402e0c56_47354830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be5137a8ab03fc5c3edbf214f340a8efd9a2d268' => 
    array (
      0 => 'C:\\OpenServer\\domains\\sport\\core\\components\\migx\\templates\\mgr\\cmptab.tpl',
      1 => 1621160918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c2f2402e0c56_47354830 (Smarty_Internal_Template $_smarty_tpl) {
?>
{
    title: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cmptabcaption']->value, ENT_QUOTES, 'UTF-8', true);?>
',
    defaults: {
        autoHeight: true
    },
    items: [{
        html: '<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cmptabdescription']->value, ENT_QUOTES, 'UTF-8', true);?>
</p>',
        border: false,
        bodyCssClass: 'panel-desc'
    },
    {
        xtype: 'modx-grid-multitvdbgrid-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
',
        preventRender: true,
        id: 'modx-grid-multitvdbgrid-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
',
        configs: '<?php echo $_smarty_tpl->tpl_vars['configs']->value;?>
',
        columns: Ext.util.JSON.decode('<?php echo $_smarty_tpl->tpl_vars['columns']->value;?>
'),
        pathconfigs: Ext.util.JSON.decode('<?php echo $_smarty_tpl->tpl_vars['pathconfigs']->value;?>
'),
        fields: Ext.util.JSON.decode('<?php echo $_smarty_tpl->tpl_vars['fields']->value;?>
'),
        wctx: '<?php echo $_smarty_tpl->tpl_vars['myctx']->value;?>
',
        url: Migx.config.connectorUrl,
        auth: '<?php echo $_smarty_tpl->tpl_vars['auth']->value;?>
',
        resource_id: '<?php echo $_smarty_tpl->tpl_vars['resource']->value['id'];?>
',
        co_id: '<?php echo $_smarty_tpl->tpl_vars['connected_object_id']->value;?>
',
        pageSize: 10,
        object_id: '<?php echo $_smarty_tpl->tpl_vars['object_id']->value;?>
',
        bwrapCfg: {
            cls: 'main-wrapper'
        }       
    }]
}
<?php }
}
