<?php

namespace Data;

class DatabaseWrapper
{
    private $db_handle;
    private $sql_queries;
    private $prepared_statement;
    private $errors;
    private $database_connection_settings;

    public function __construct()
    {
        $this->db_handle = null;
        $this->sql_queries = null;
        $this->prepared_statement = null;
        $this->errors = [];
    }

    public function __destruct() { }

    public function setDatabaseConnectionSettings($database_connection_settings)
    {
        $this->database_connection_settings = $database_connection_settings;
    }

    public function makeDatabaseConnection()
    {
        $pdo = false;
        $pdo_error = '';

        $database_settings = $this->database_connection_settings;
        $host_name = $database_settings['rdbms'] . ':host=' . $database_settings['host'];
        $port_number = ';port=' . '3306';
        $user_database = ';p2610018db=' . $database_settings['p2610018db'];
        $host_details = $host_name . $port_number . $user_database;
        $user_name = $database_settings['user_name'];
        $user_password = $database_settings['user_password'];
        $pdo_attributes = $database_settings['options'];

        try
        {
            $pdo_handle = new \PDO($host_details, $user_name, $user_password, $pdo_attributes);
            $this->db_handle = $pdo_handle;
        }
        catch (\PDOException $exception_object)
        {
            trigger_error('error connecting to database');
            $pdo_error = 'error connecting to database';
        }

        return $pdo_error;
    }
}