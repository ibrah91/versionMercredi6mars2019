<?php
namespace Classes\Database;
/**
 * Class Connection
 * Permet d'établir une connexion avec la base de données ...
 * ... et de lancer des requêtes SQL
 */
class Connection
{
    /**
     * @var \PDO
     */
    private $pdo;
    public function __construct()
    {
        // Infos nécessaires
        $dsn = 'mysql:host=localhost;dbname=bdd_mysql_command';
        $user = 'php_user_bdd';
        $pass = 'ib';

        $this->connect($dsn, $user, $pass);
    }

    /**
     * Etablit une connexion avec la base de données
     * @param string $dsn
     * @param string $user
     * @param string $pass
     */
    private function connect(string $dsn, string $user, string $pass): void
    {
        try {
            $this->pdo = new \PDO($dsn, $user, $pass,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        

        } catch (\PDOException $e) {
            echo "Erreur lors de la connexion : " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query(string $query)
    {//Appel de "query" de PDO (execution de la requête Sql)
        
        $pdoStatement = $this->pdo->query($query);

        //Appel de fetchAll de PDOStatement(renvoie toutes les données dans un tableau)

        //On retourne le tableau
        return $pdoStatement->fetchAll();
    }

    public function preparedQuery():array
    {
        
        $query =" SELECT * FROM product WHERE id= :id";

        

        $statement = $this ->pdo->prepare($query);
        
        //Execution
        $id = 1 ; 
        $statement->bindParam(':id',$id);
        $statement->execute();

        return $statement->fetchAll();

    }
}











