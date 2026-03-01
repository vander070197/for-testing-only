<?php
require_once __DIR__ . "/../functions.php";

$user = new UserFunctions();

$action = $_GET['action'] ?? '';

if ($action == "add") {

    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($user->addUser($name, $email)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }

}

if ($action == "delete") {

    $id = $_POST['id'];

    if ($user->deleteUser($id)) {
        echo json_encode(["status" => "deleted"]);
    }

}

if ($action == "views") {

    $result = $user->getUsers();

    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
}
