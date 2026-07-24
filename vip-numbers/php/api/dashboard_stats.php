<?php

header("Content-Type: application/json");

require_once("../lib/db.php");

// ---------- Current Month ----------
$currentStart = date("Y-m-01 00:00:00");
$currentEnd   = date("Y-m-t 23:59:59");

// ---------- Last Month ----------
$lastStart = date("Y-m-01 00:00:00", strtotime("first day of last month"));
$lastEnd   = date("Y-m-t 23:59:59", strtotime("last day of last month"));

function getCount($conn, $where = "")
{
    $sql = "SELECT COUNT(*) AS total FROM vip_numbers";

    if ($where != "") {
        $sql .= " WHERE $where";
    }

    return (int)$conn->query($sql)->fetch_assoc()['total'];
}

function getMonthCount($conn, $where = "")
{
    global $currentStart,$currentEnd;

    $sql = "SELECT COUNT(*) AS total
            FROM vip_numbers
            WHERE created_at BETWEEN '$currentStart' AND '$currentEnd'";

    if($where!=""){
        $sql.=" AND $where";
    }

    return (int)$conn->query($sql)->fetch_assoc()['total'];
}

function getLastMonthCount($conn,$where="")
{
    global $lastStart,$lastEnd;

    $sql="SELECT COUNT(*) AS total
          FROM vip_numbers
          WHERE created_at BETWEEN '$lastStart' AND '$lastEnd'";

    if($where!=""){
        $sql.=" AND $where";
    }

    return (int)$conn->query($sql)->fetch_assoc()['total'];
}

function percentage($current,$last)
{
    if($last==0){
        return $current>0 ? 100 : 0;
    }

    return round((($current-$last)/$last)*100,1);
}

$response=[
    "total"=>[
        "count"=>getCount($conn),
        "percent"=>percentage(
            getMonthCount($conn),
            getLastMonthCount($conn)
        )
    ],

    "available"=>[
        "count"=>getCount($conn,"status='Available'"),
        "percent"=>percentage(
            getMonthCount($conn,"status='Available'"),
            getLastMonthCount($conn,"status='Available'")
        )
    ],

    "premium"=>[
        "count"=>getCount($conn,"category='Premium'"),
        "percent"=>percentage(
            getMonthCount($conn,"category='Premium'"),
            getLastMonthCount($conn,"category='Premium'")
        )
    ],

    "reserved"=>[
        "count"=>getCount($conn,"status='Reserved'"),
        "percent"=>percentage(
            getMonthCount($conn,"status='Reserved'"),
            getLastMonthCount($conn,"status='Reserved'")
        )
    ]
];

echo json_encode($response);