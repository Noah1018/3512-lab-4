<?php
class DatabaseHelper {
    /* Returns a connection object to a database */
    public static function createConnection($values = []) {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }

    /* 
    Runs the specified SQL query using the passed connection and
    the passed array of parameters (null if none)
    */
    public static function runQuery($connection, $sql, $parameters = null) {
        if ($parameters) {
            // Ensure parameters are in an array
            if (!is_array($parameters)) {
                $parameters = [$parameters];
            }

            $statement = $connection->prepare($sql);
            $executedOk = $statement->execute($parameters);
            if (!$executedOk) throw new PDOException($statement->errorInfo()[2]);
        } else {
            $statement = $connection->query($sql);
            if (!$statement) throw new PDOException($connection->errorInfo()[2]);
        }

        return $statement;
    }
}

class ArtistDB {
    private static $baseSQL = "SELECT * FROM Artists ORDER BY LastName";

    private $pdo;

    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql);
        return $statement->fetchAll();
    }
}

class PaintingDB {
    private static $baseSQL = "SELECT PaintingID, Paintings.ArtistID AS ArtistID, CONCAT(FirstName, ' ', LastName) AS Artist, ImageFileName, Title, Excerpt, YearOfWork 
                           FROM paintings 
                           INNER JOIN artists ON paintings.ArtistID = artists.ArtistID";


    private $pdo;

    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql);
        return $statement->fetchAll();
    }

    public function getAllForArtist($artistID) {
        $sql = self::$baseSQL . " WHERE Paintings.ArtistID=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, [$artistID]);
        return $statement->fetchAll();
    }
    public function getTop20() {
        $sql = self::$baseSQL . " ORDER BY YearOfWork LIMIT 20";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }
    
}

class GalleryDB {
    private $pdo;
    private static $baseSQL = "SELECT GalleryID, GalleryName FROM Galleries ORDER BY GalleryName";

    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }
    public function getAllForGallery($galleryID) {
        $sql = self::$baseSQL . " WHERE GalleryID=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, [$galleryID]);
        return $statement->fetchAll();
    }
    
}

?>



