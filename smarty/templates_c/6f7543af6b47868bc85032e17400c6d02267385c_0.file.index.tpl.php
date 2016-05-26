<?php /* Smarty version 3.1.26, created on 2016-05-26 18:32:05
         compiled from "/Users/ellenrsullivan/Sites/AlarmAlert/templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:176078944457472505d45084_99723503%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f7543af6b47868bc85032e17400c6d02267385c' => 
    array (
      0 => '/Users/ellenrsullivan/Sites/AlarmAlert/templates/index.tpl',
      1 => 1464280208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176078944457472505d45084_99723503',
  'variables' => 
  array (
    'dateTime' => 0,
    'sensors' => 0,
    'sensor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.26',
  'unifunc' => 'content_57472505e18426_12666130',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57472505e18426_12666130')) {
function content_57472505e18426_12666130 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '176078944457472505d45084_99723503';
?>
<html>
<head>
    <title>AlarmAlert Home Page</title>
    <style> /* ordinarily would be in included css file */
        table {
            border: double;
        }
        td {
            padding: 5px 10px;
            border: solid 1px black;
        }
        .fail {
            background-color: pink;
        }
        .pass {
            background-color: palegreen;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan = 3>Sensor Status</th>
        <th colspan = 3><?php echo $_smarty_tpl->tpl_vars['dateTime']->value;?>
</th>
    </tr>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>State</th>
        <th>Current Value</th>
        <th>Upper Limit</th>
        <th>Lower Limit</th>
    </tr>
    </thead>
        <?php
$_from = $_smarty_tpl->tpl_vars['sensors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sensor'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sensor']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['sensor']->value) {
$_smarty_tpl->tpl_vars['sensor']->_loop = true;
$foreach_sensor_Sav = $_smarty_tpl->tpl_vars['sensor'];
?>
            <tr class=<?php echo $_smarty_tpl->tpl_vars['sensor']->value->alarm;?>
>
                <td><?php echo $_smarty_tpl->tpl_vars['sensor']->value->name;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['sensor']->value->type;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['sensor']->value->state;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['sensor']->value->currValue;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['sensor']->value->upperLimit;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['sensor']->value->lowerLimit;?>
</td>
            </tr>
        <?php
$_smarty_tpl->tpl_vars['sensor'] = $foreach_sensor_Sav;
}
?>
    </table>
</body>
</html><?php }
}
?>