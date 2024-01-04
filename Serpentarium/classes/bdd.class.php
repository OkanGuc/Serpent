<?php
class Bdd
{
    private PDO $connection;

    public function __construct(
        string $host = 'localhost',
        string $dbname = 'serpentarium',
        string $user = 'root',
        string $mdp = '',
    )
    {
        $this->connection = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$mdp");
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeRequest($query, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function delete($table, $id): void
    {
        $idUser = "id_" . $table;
        $request = "DELETE FROM $table WHERE $idUser = $id";
        $this->executeRequest($request);
    }

    public function update($table, $id, $colonne, $nouvelleValeur): void
    {
        $nouvelleValeur = addslashes($nouvelleValeur);
        $idTable = "id_" . $table;
        $request = "UPDATE $table SET $colonne = '$nouvelleValeur' WHERE $idTable = $id";
        $this->executeRequest($request);
    }
}


