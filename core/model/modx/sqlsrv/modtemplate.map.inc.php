<?php
/**
 * @package modx
 * @subpackage sqlsrv
 */
$xpdo_meta_map['modTemplate']= array (
  'package' => 'modx',
  'version' => '1.1',
  'table' => 'site_templates',
  'extends' => 'modElement',
  'fields' => 
  array (
    'templatename' => '',
    'description' => 'Template',
    'editor_type' => 0,
    'category' => 0,
    'icon' => '',
    'template_type' => 0,
    'content' => '',
    'locked' => 0,
    'properties' => NULL,
    'static' => 0,
    'static_file' => '',
  ),
  'fieldMeta' => 
  array (
    'templatename' => 
    array (
      'dbtype' => 'nvarchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
      'index' => 'unique',
    ),
    'description' => 
    array (
      'dbtype' => 'nvarchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => 'Template',
    ),
    'editor_type' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'category' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'fk',
    ),
    'icon' => 
    array (
      'dbtype' => 'nvarchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'template_type' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'content' => 
    array (
      'dbtype' => 'nvarchar',
      'precision' => 'max',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'locked' => 
    array (
      'dbtype' => 'bit',
      'phptype' => 'boolean',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'properties' => 
    array (
      'dbtype' => 'nvarchar',
      'precision' => 'max',
      'phptype' => 'array',
      'null' => true,
    ),
    'static' => 
    array (
      'dbtype' => 'bit',
      'phptype' => 'boolean',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'static_file' => 
    array (
      'dbtype' => 'nvarchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
  ),
  'indexes' => 
  array (
    'templatename' => 
    array (
      'alias' => 'templatename',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'templatename' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'category' => 
    array (
      'alias' => 'category',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'category' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'locked' => 
    array (
      'alias' => 'locked',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'locked' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'static' => 
    array (
      'alias' => 'static',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'static' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'composites' => 
  array (
    'PropertySets' => 
    array (
      'class' => 'modElementPropertySet',
      'local' => 'id',
      'foreign' => 'element',
      'owner' => 'local',
      'cardinality' => 'many',
      'criteria' => 
      array (
        'foreign' => 
        array (
          'element_class' => 'modTemplate',
        ),
      ),
    ),
    'TemplateVarTemplates' => 
    array (
      'class' => 'modTemplateVarTemplate',
      'local' => 'id',
      'foreign' => 'templateid',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
  'aggregates' => 
  array (
    'Category' => 
    array (
      'class' => 'modCategory',
      'local' => 'category',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Resources' => 
    array (
      'class' => 'modResource',
      'local' => 'id',
      'foreign' => 'template',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
  'validation' => 
  array (
    'rules' => 
    array (
      'templatename' => 
      array (
        'invalid' => 
        array (
          'type' => 'preg_match',
          'rule' => '/^(?!\\s)[a-zA-Z0-9\\x23-\\x2f\\x3a\\x5b-\\x5d\\x7f-\\xff-_\\s]+(?<!\\s)$/',
          'message' => 'template_err_invalid_name',
        ),
      ),
    ),
  ),
);
