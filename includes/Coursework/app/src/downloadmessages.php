<?php

namespace Data;

class downloadmessages
{
    private $download_messages;
    private $database_handle;
    private $soap_response;
    private $database_connection;

    public function __construct()
    {
        $this->database_handle = null;
        $this->soap_response = null;
        $this->database_connection = array();
        $this->download_messages = array();
    }

    public function __destruct()
    {
    }

    public function set_database_handle($p_obj_database_handle)
    {
        $this->database_handle = $p_obj_database_handle;
    }

    public function do_get_database_connection_result()
    {
        $this->database_connection = $this->database_handle->get_connectin_messages();
    }

    public function set_soap_response($soap_response)
    {
        $this->soap_response = $this->soap_response->get_soap_response();
    }

    public function do_download_stock_data()
    {
        $this->do_create_soap_client();
        $this->getData();

        if($this->download_messages['soap-server-get-result'])
        {
            $this->checkDataAvailable();
        }
    }

    public function get_downloaded_data_result()
    {
        return $this->download_messages;
    }

    private function checkDataAvailable()
    {
        $download_messages_available = true;
        if($this->download_messages['download-messages']['LAST'] == '0.00')
        {
            $download_messages_available = false;
        }
        $this->download_messages['data-available'] = $download_messages_available;
    }

    public function storeDownloadedMessages()
    {
        if($this->download_messages['soap-server-get-result'])
        {
            if($this->download_messages['data-available'])
            {
                $this->prepareData();
                if(!$this->doesDataExist()) {
                    $this->storeDownloadedMessages();
                }
            }
        }
    }

    private function doesDataExist()
    {

    }
}