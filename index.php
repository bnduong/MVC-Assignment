<?php
    require('model/database.php');
    require('model/item_db.php');
    require('model/category_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_items';
        }
    }

    if ($action == 'list_items') {
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        // call the functions
        $category_name = get_category_name($category_id);
        $categories = get_categories();
        $items = get_items_by_category($category_id);
        include('item_list.php');
    } else if ($action == 'list_categories') {
        $categories = get_categories();
        include('category_list.php');
    } else if ($action == 'delete_item') {
        $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
        if ($item_id == NULL || $item_id == FALSE) {
            $error = "Missing or incorrect item id.";
            include('errors/error.php');
        } else {
            delete_item($item_id);
            header("Location: .?category_id=$category_id");
        }
    } else if ($action == 'delete_category') {
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == FALSE) {
            $error = "Missing or incorrect category id.";
            include('errors/error.php');
        } else {
            delete_category($category_id);
            header("Location: .?action=list_categories");
        }
    } else if ($action == 'show_add_form') {
        $categories = get_categories();
        include('add_item_form.php');
    } else if ($action == 'add_item') {
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        if ($category_id == NULL || $category_id == FALSE || $title == NULL || $description == NULL) {
            $error = "Invalid item data. Check all fields and try again.";
            include('errors/error.php');
        } else {
            add_item($category_id, $title, $description);
            header("Location: .?category_id=$category_id");
        }
    } else if ($action == 'add_category') {
        $category_name = filter_input(INPUT_POST, 'category_name');
        add_category($category_name);
        header("Location: .?action=list_categories");
    }
?> 


   