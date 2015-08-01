function threshold($val) {
    if($val <= 3) {
        return false; // So-so.
    } else {
        return true; // Bad.
    }
}

function inquire_evil_value($store_id) {
    try {
        $db_handler = new PDO(
            "mysql:dbname=ripoff_tavern; host=127.0.0.1", 
            "mysql", "borinavi");
        $sql = 'SELECT * FROM evil_stores WHERE store_id = :store_id';
        $statement = $db_handler->prepare($sql);
        $statement->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $statement->execute();
    } catch (PDOException $e) {
        console.log($e->getMessage());
        return -1;
    }

    $evil_value = count($db_handler->fetchAll());
    return threshold($evil_value);
}
