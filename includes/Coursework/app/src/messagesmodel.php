<?php

namespace Data;

class messagesmodel
{
    private $c_server_type;
    private $c_arr_storage_result;
    private $c_obj_wrapper_session_file;
    private $c_obj_wrapper_session_db;
    private $c_obj_db_handle;
    private $c_obj_sql_queries;

    public function __construct()
    {
        $this->c_arr_storage_result = null;
        $this->c_obj_wrapper_session_file = null;
        $this->c_obj_wrapper_session_db = null;
        $this->c_obj_db_handle = null;
        $this->c_obj_sql_queries = null;
        $this->c_server_type = null;
    }

    public function __destruct() { }

    public function set_server_type($server_type)
    {
        $this->c_server_type = $server_type;
    }

    public function set_wrapper_session_file($obj_wrapper_session)
    {
        $this->c_obj_wrapper_session_file = $obj_wrapper_session;
    }

    public function set_wrapper_session_db($obj_wrapper_db)
    {
        $this->c_obj_wrapper_session_db = $obj_wrapper_db;
    }

    public function set_db_handle($obj_db_handle)
    {
        $this->c_obj_db_handle = $obj_db_handle;
    }

    public function set_sql_queries($obj_sql_queries)
    {
        $this->c_obj_sql_queries = $obj_sql_queries;
    }

    public function store_data()
    {
        switch ($this->c_server_type) {
            case 'database':
                $this->c_arr_storage_result['database'] = $this->store_data_in_database();
                break;
                case 'file';
            default:
                $this->c_arr_storage_result['file'] = $this->store_data_in_session_file();
        }
    }

    public function get_storage_result()
    {
        return $this->c_arr_storage_result;
    }

    private function store_data_in_database()
    {
        $store_result = false;

        $this->c_obj_wrapper_session_db->set_db_handle($this->c_obj_db_handle);
        $this->c_obj_wrapper_session_db->set_sql_queries($this->c_obj_sql_queries);

        $store_result = $this->c_obj_wrapper_session_db->store_session_var();
        $store_result = $this->c_obj_wrapper_session_db->store_session_var();

        return $store_result;
    }
}