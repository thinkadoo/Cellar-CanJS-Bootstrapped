<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/12/15
 * Time: 8:40 AM
 */

class WineModel
{

    var $dbo;

    function __construct(){

        $dbo = new Database();
        $this->dbo = $dbo;

    }

    public function getWines() {

        $sql = "select * FROM wine ORDER BY id";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->query($sql);
            $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            return json_encode($wines);
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    public function getWine($id) {
        $sql = "SELECT * FROM wine WHERE id=:id";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $wine = $stmt->fetchObject();
            $db = null;
            return json_encode($wine);
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function addWine($wine) {
        $sql = "INSERT INTO wine (name, grapes, country, region, year, description, picture) VALUES (:name, :grapes, :country, :region, :year, :description, :picture)";
        $defaultImage = "generic.jpg";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("name", $wine->name);
            $stmt->bindParam("grapes", $wine->grapes);
            $stmt->bindParam("country", $wine->country);
            $stmt->bindParam("region", $wine->region);
            $stmt->bindParam("year", $wine->year);
            $stmt->bindParam("description", $wine->description);
            $stmt->bindParam("picture", $defaultImage);
            $stmt->execute();
            $wine->id = $db->lastInsertId();
            $db = null;
            return json_encode($wine);
        } catch(PDOException $e) {
            error_log($e->getMessage(), 3, '/var/tmp/php.log');
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function updateWine($wine,$id) {
        $sql = "UPDATE wine SET name=:name, grapes=:grapes, country=:country, region=:region, year=:year, description=:description WHERE id=:id";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("name", $wine->name);
            $stmt->bindParam("grapes", $wine->grapes);
            $stmt->bindParam("country", $wine->country);
            $stmt->bindParam("region", $wine->region);
            $stmt->bindParam("year", $wine->year);
            $stmt->bindParam("description", $wine->description);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $db = null;
            return json_encode($wine);
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function deleteWine($id) {
        $sql = "DELETE FROM wine WHERE id=:id";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $db = null;
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function findByName($query) {
        $sql = "SELECT * FROM wine WHERE UPPER(name) LIKE :query ORDER BY name";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->prepare($sql);
            $query = "%".$query."%";
            $stmt->bindParam("query", $query);
            $stmt->execute();
            $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            return '{"wine": ' . json_encode($wines) . '}';
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

}
