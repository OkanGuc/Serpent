<?php

class Serpent
{


    public function __construct(
        private $id = null,
        private $table = "serpent",
        private $colonnes = ['Id_Serpent', 'nom', 'poids', 'dureeDeVie', 'heureDateNaissance', 'genre', 'id_Race','Mort']

    )
    {
    }


    public function selectAll()
    {
        $sql = new Bdd();
        return $sql->executeRequest("SELECT * FROM " . $this->table . " WHERE Mort = 0");
    }



    public function set($colonne, $value): void
    {
        $sql = new Bdd();
        $sql->update($this->table, $this->id, $colonne, $value);
    }

    public function delete(): void
    {
        $sql = new Bdd();
        $sql->delete($this->table, $this->id);
    }

    public function insert($nom, $poids, $dureeDeVie, $heureDateNaissance, $genre, $id_Race,$Mort)
    {
        $sql = new Bdd();
        $query = "INSERT INTO serpent (nom, poids, dureeDeVie, heureDateNaissance, genre, id_Race, Mort) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $sql->executeRequest($query, [$nom, $poids, $dureeDeVie, $heureDateNaissance, $genre, $id_Race,$Mort]);
    }


    public function countSerpents()
    {
        $sql = new Bdd();
        $result = $sql->executeRequest("SELECT COUNT(*) as total FROM $this->table  WHERE Mort = 0");
        if (is_array($result) && count($result) > 0) {
            return $result[0]['total'];
        } else {

            return 0;
        }
    }

    public function selectSerpentsByPage($premier, $serpentsParPage)
    {
        $sql = new Bdd();
        $query = "SELECT * FROM $this->table LIMIT $premier, $serpentsParPage";
        return $sql->executeRequest($query);
    }

    public function getSerpentById($Id_Serpent)
    {
        $sql = new Bdd();
        $query = "SELECT * FROM $this->table WHERE Id_Serpent = :Id_Serpent";
        $params = [':Id_Serpent' => $Id_Serpent];
        return $sql->executeRequest($query, $params);
    }
    public function countSerpentsByGenre($genre) {
        $sql = new Bdd();
        $query = "SELECT COUNT(*) as total FROM $this->table WHERE genre = :genre";
        $params = [':genre' => $genre];
        $result = $sql->executeRequest($query, $params);
        return $result[0]['total'];
    }
    public function selectSerpentsByGenre($premier, $serpentsParPage, $genre)
    {
        $sql = new Bdd();
        $query = "SELECT * FROM $this->table WHERE genre = :genre LIMIT $premier, $serpentsParPage";
        $params = [':genre' => $genre];
        return $sql->executeRequest($query, $params);
    }
    public function generateAndInsertRandomSerpents($nombre) {
        for ($i = 0; $i < $nombre; $i++) {

            $nom = 'Serpent_' . rand(1000, 9999);
            $poids = rand(1, 10);
            $dureeDeVie = rand(1, 20);
            $heureDateNaissance = date('Y-m-d H:i:s');
            $genre = rand(0, 1);
            $id_Race = rand(1, 10);
            $Mort = 0;

            $this->insert($nom, $poids, $dureeDeVie, $heureDateNaissance, $genre, $id_Race , $Mort);
        }
    }
    public function getMales() {
        $sql = new Bdd();
        $query = "SELECT * FROM $this->table WHERE genre = 1 AND Mort = 0";
        return $sql->executeRequest($query);
    }
    public function getFemales() {
        $sql = new Bdd();
        $query = "SELECT * FROM $this->table WHERE genre = 0 AND Mort = 0";
        return $sql->executeRequest($query);
    }

    public function countMales() {
        $sql = new Bdd();
        $query = "SELECT COUNT(*) as total FROM $this->table WHERE genre = 1 AND Mort = 0";
        $result = $sql->executeRequest($query);
        return $result[0]['total'];
    }

    public function countFemales() {
        $sql = new Bdd();
        $query = "SELECT COUNT(*) as total FROM $this->table WHERE genre = 0 AND Mort = 0";
        $result = $sql->executeRequest($query);
        return $result[0]['total'];
    }
    public function tuerSerpent($idSerpent) {
        $sql = new Bdd();
        $query = "UPDATE $this->table SET Mort = 1 WHERE Id_Serpent = :Id_Serpent";
        $params = [':Id_Serpent' => $idSerpent];
        $sql->executeRequest($query, $params);
    }


}