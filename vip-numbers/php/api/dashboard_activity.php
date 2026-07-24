<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$sql = "
SELECT *
FROM activity_log
ORDER BY created_at DESC
LIMIT 5
";

$result = mysqli_query($conn,$sql);

$data=[];

while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
}

echo json_encode($data);