<?php 
    function get_items_by_category($category_id) {
        global $db;
        if ($category_id == NULL || $category_id == FALSE) {
            $query = 'SELECT T.ItemNum, T.Title, T.Description, C.categoryName FROM todoitems T LEFT JOIN categories C ON T.categoryID = C.categoryID ORDER BY C.categoryID';
        } else {
            $query = 'SELECT T.ItemNum, T.Title, T.Description, C.categoryName FROM todoitems T LEFT JOIN categories C ON T.categoryID = C.categoryID WHERE T.categoryID = :category_id ORDER BY ItemNum';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function get_item($item_id) {
        global $db;
        $query = 'SELECT * FROM todoitems WHERE ItemNum = :item_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':item_id', $item_id);
        $statement->execute();
        $item = $statement->fetch();
        $statement->closeCursor();
        return $item;
    }

    function delete_item($item_id) {
        global $db;
        $query = 'DELETE FROM todoitems WHERE ItemNum = :item_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':item_id', $item_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_item($category_id, $title, $description) {
        global $db;
        $query = 'INSERT INTO todoitems (Title, Description, categoryID)
              VALUES
                 (:title, :descr, :categoryID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':descr', $description);
        $statement->bindValue(':categoryID', $category_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>
