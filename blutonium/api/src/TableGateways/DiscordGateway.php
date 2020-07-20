<?php
namespace Src\TableGateways;

class DiscordGateway {
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllPrefixes()
    {
        $statement = "SELECT * FROM prefix;";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchALL(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getprefix($id)
    {
        $statement = "SELECT prefix WHERE id = ?;";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

    }


}