<?php

namespace Convo\Pckg\MySQLI;

use Convo\Core\Factory\AbstractPackageDefinition;

class MySQLIPackageDefinition extends AbstractPackageDefinition
{
    const NAMESPACE = 'convo-mysqli';

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        parent::__construct($logger, self::NAMESPACE, __DIR__);
    }

    protected function _initDefintions()
    {
        return [
            new \Convo\Core\Factory\ComponentDefinition(
                $this->getNamespace(),
                '\Convo\Pckg\MySQLI\MysqlConnectionComponent',
                'MySQL connection context',
                'Setup connection params for MySQL',
                array(
                    'id' => array(
                        'editor_type' => 'text',
                        'editor_properties' => array(),
                        'defaultValue' => '',
                        'name' => 'Context ID',
                        'description' => 'Unique ID by which this context is referenced',
                        'valueType' => 'string'
                    ),
                    'host' => array(
                        'editor_type' => 'text',
                        'editor_properties' => array(),
                        'defaultValue' => '',
                        'name' => 'Host',
                        'description' => 'Host to connect to',
                        'valueType' => 'string'
                    ),
                    'port' => array(
                        'editor_type' => 'text',
                        'editor_properties' => array(), 'defaultValue' => '',
                        'name' => 'Port',
                        'description' => 'Port to which to connect to on the host',
                        'valueType' => 'string'
                    ),
                    'user' => array(
                        'editor_type' => 'text',
                        'editor_properties' => array(),
                        'defaultValue' => '',
                        'name' => 'Username',
                        'description' => 'Username to authenticate with',
                        'valueType' => 'string'
                    ),
                    'pass' => array(
                        'editor_type' => 'password',
                        'editor_properties' => array(),
                        'defaultValue' => '',
                        'name' => 'Password',
                        'description' => 'Password to use when connecting',
                        'valueType' => 'string'
                    ),
                    'dbName' => array(
                        'editor_type' => 'text',
                        'editor_properties' => array(),
                        'defaultValue' => '',
                        'name' => 'Database name',
                        'description' => 'Name of database to use',
                        'valueType' => 'string'
                    ),
                    '_preview_angular' => array(
                        'type' => 'html',
                        'template' => '<div class="code">' .
                            '<span class="statement">CONNECT TO</span> <b>{{ contextElement.properties.host }}{{ contextElement.properties.port ? \':\'+contextElement.properties.port : \'\' }}</b> <span class="statement">AS</span> {{ contextElement.properties.user }}' .
                            '<br/>' .
                            '<span class="statement">USE DB</span> <b>{{ contextElement.properties.dbName }}</b>' .
                            '</div>'
                    ),
                    '_help' =>  array(
                        'type' => 'file',
                        'filename' => 'mysql-connection-component.html'
                    ),
                    '_workflow' => 'datasource'
                )
            ),
            new \Convo\Core\Factory\ComponentDefinition(
                $this->getNamespace(),
                '\Convo\Pckg\MySQLI\MysqliQueryElement',
                'MySQLI query',
                'Perform an SQL query via a connection',
                array(
                    'name' => array(
                        'editor_type' => 'text',
                        'editor_properties' => array(),
                        'defaultValue' => 'status',
                        'name' => 'Result name',
                        'description' => 'Name under which to save the result in parameters',
                        'valueType' => 'string'
                    ),
                    'conn' => array(
                        'editor_type' => 'text',
                        'editor_properties' => array(),
                        'defaultValue' => '',
                        'name' => 'Connection',
                        'description' => 'Connection to use for executing queries',
                        'valueType' => 'string'
                    ),
                    'query' => array(
                        'editor_type' => 'desc',
                        'editor_properties' => array(),
                        'defaultValue' => '',
                        'name' => 'Query',
                        'description' => 'SQL query to execute',
                        'valueType' => 'string'
                    ),
                    '_preview_angular' => array(
                        'type' => 'html',
                        'template' => '<div class="code">' .
                            '<span class="statement">PERFORM</span> {{ component.properties.query }}' .
                            '</div>'
                    ),
                    '_help' =>  array(
                        'type' => 'file',
                        'filename' => 'mysqli-query-element.html'
                    ),
                    '_workflow' => 'read'
                )
            )
        ];
    }
}
