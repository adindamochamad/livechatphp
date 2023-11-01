<?php
include "config.php";
session_start();

$sql = "SELECT * FROM message ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$url = "https://fcm.googleapis.com/fcm/send";
$server_key = "AAAAeDdoblw:APA91bF0XXqasVRVG1ighbJaQqu-lK2u98EvAShYLfhLLOu2ideNBlxWSbZmwliCWQ09wtYlSjLnQbbS6hUwV_rU4EHjOlGPaatVvN5_k-inzGhpweGs85acMwwtd63x4U4NuqBbH3rH";
$namaterbaru = $_SESSION["name"];

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['user_id'] == $_SESSION['user_id'] && $row['ref_id'] == $_SESSION['admin']) {
        echo '<div class="user-chat">
            <span> ' . $_SESSION["name"] . ' | ' . $row['time'] . '</span>
            <p class="user">' . $row["message"] . '</p>
        </div>';
        $message = array(
            "data" => array(
                "title" => $namaterbaru,
                "body" => $row['message'],
            ),
            "registration_ids" => [
                "dirHp94sQwWo399Dr_NdP4:APA91bEYT4Svtec72Yla2SufQtwIOIWfiF0MI_yskxaL4gJrFEMLu0lgQ_Patl8pJcZ6hvX2CM9He905zDLvsA_7VA2KRCfNLeN8jJuthn4onJoibjP70SSI7mEcartoidPj6Fgy91ta"
            ],
        );
    }
    if ($row['user_id'] == $_SESSION['admin'] && $row['ref_id'] == $_SESSION['user_id']) {
        echo '<div class = "admin-chat">
            <span> Admin | ' . $row['time'] . '</span>
            <p class="admin">' . $row['message'] . '</p>
        </div>';
        $message = array(
            "data" => array(
                "title" => "Admin",
                "body" => $row['message'],
            ),
            "registration_ids" => [
                "dirHp94sQwWo399Dr_NdP4:APA91bEYT4Svtec72Yla2SufQtwIOIWfiF0MI_yskxaL4gJrFEMLu0lgQ_Patl8pJcZ6hvX2CM9He905zDLvsA_7VA2KRCfNLeN8jJuthn4onJoibjP70SSI7mEcartoidPj6Fgy91ta"
            ],
        );
    }
}

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => array(
        "Authorization: key =" . $server_key,
        "Content-Type: application/json",
    ),
    CURLOPT_POSTFIELDS => json_encode($message),
);

$curl = curl_init();
curl_setopt_array($curl, $options);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
