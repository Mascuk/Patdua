<?php
require('koneksi.php');

$sql = "SELECT items.name AS product_name, SUM(orders.qty) AS total_quantity
FROM orders
JOIN items ON orders.id_item = items.id_item
GROUP BY items.id_item;";

$result = mysqli_query($conn, $sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($hasil, array(
        "product_name" => $row['product_name'],
        "total_quantity" => $row['total_quantity']
    ));
}

$data = json_encode($hasil);