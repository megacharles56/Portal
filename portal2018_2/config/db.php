<?php

return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'firebird:host=localhost;dbname=/home/develop/Documentos/D/FBdb/portal18.fdb',
//    'username' => 'sysdba',
//    'password' => 'masterkey',
    'charset' => 'utf8',

'class' => 'edgardmessias\db\firebird\Connection',
      //      'dsn' => 'firebird:dbname=/home/develop/Documentos/D/FBdb/portal18.fdb',
          'dsn' => 'firebird:dbname=/var/www/html/portal2018/portal18.fdb',
    'username' => 'sysdba',
    'password' => 'masterkey',


    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
