function add_evil_store($store_id) {
    try {
        $db_handler = new PDO(
            "mysql:dbname=ripoff_tavern; host=127.0.0.1", 
            "mysql", "borinavi");
        $sql = "INSERT INTO evil_stores (store_id) VALUES(:store_id)";
        $statement = $db_handler->prepare($sql);
        $statement->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $response = $statement->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }


    if($response) {
        echo "Registration completed.";
        return true;
    } else {
        echo "Registration failed.";
        return false;
    }
}
