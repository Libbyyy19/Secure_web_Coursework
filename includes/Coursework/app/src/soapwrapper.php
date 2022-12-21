<?php

namespace Data;

class soapwrapper
{

    public function __construct() {}
    public function __destruct() {}

    public function createSoapClient()
    {
        $soap_client_handle = false;
        $soap_client_parameters = array();
        $exception = '';
        $wsdl = 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl';
        $wsdl = WSDL;

        $soap_client_parameters = ['trace' => true, 'exception' => true];

        try
        {
            $soap_client_handle = new \SoapClient($wsdl, $soap_client_parameters);
            var_dump($soap_client_handle->__getFunctions());
            var_dump($soap_client_handle->__getTypes());
            $soap_server_connection_result = true;
        }
        catch (\SoapFault $exception)
        {
            $soap_client_handle = 'Error - Something went wrong connecting to the database';
        }
        return $soap_client_handle;
    }

    public function getSoapData($soap_client, $webservicefunction, $webservice_call_parameters, $webservice_value)
    {
        $soap_Call_result = null;
        $raw_xml = '';

        if(soap_client)
        {
            try
            {
               $webservice_call_result = $soap_client->{$webservicefunction}($webservice_call_parameters);
               var_dump($webservice_call_result);
               $raw_xml = $webservice_call_result->{$webservice_value};
            }
            catch (\SoapFault $exception)
            {
                var_dump($exception);
                $soap_server_get_data_result = $exception;
            }
        }

        var_dump($raw_xml);
    }
}