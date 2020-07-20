<?php
namespace Src\Controller;

use Src\TableGateways\DiscordGateway;

class DiscordController {
    private $db;
    private $requestMethod;
    private $guildid;

    private $DiscordGateway;

    public function __construct($db, $requestMethod, $guildid)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->userId = $guildid;

        $this->personGateway = new DiscordGateway($db);
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->guildid) {
                    $response = $this->getPrefix($this->guildid);
                } else {
                    $response = $this->getallPrefixez();
                };
        }
    }

    private function getPrefix($id)
    {  
        $result = $this->DiscordGateway->getprefix($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;

    }

    private function getallPrefixez()
    {
        $result = $this->DiscordGateway->getAllPrefixes();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function noutFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}