<?php
try {
    if (isset($_GET['day'])) {
        $sql = "SELECT DAY(created_time) AS day,
               SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS status1_count,
               SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) AS status2_count
        FROM orders
        WHERE MONTH(created_time) = MONTH(CURRENT_DATE()) AND YEAR(created_time) = YEAR(CURRENT_DATE())
        GROUP BY DAY(created_time)";
        $stmt = $GLOBALS['conn']->query($sql);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $days = range(1, date('t', strtotime(date('Y-m-01'))));
        $status1 = array_fill(0, count($days), 0);
        $status2 = array_fill(0, count($days), 0);

        foreach ($datas as $row) {
            $dayIndex = $row['day'] - 1;
            $status1[$dayIndex] = $row['status1_count'];
            $status2[$dayIndex] = $row['status2_count'];
        }

        $days_json = json_encode($days);
        $status1_json = json_encode($status1);
        $status2_json = json_encode($status2);
    } else {
        $sql = "SELECT MONTH(created_time) AS month, SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS status_count 
                FROM orders 
                GROUP BY MONTH(created_time)";
        $stmt = $GLOBALS['conn']->query($sql);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $months = range(1, 12);
        $status1 = array_fill(0, 12, 0);

        foreach ($datas as $row) {
            $monthIndex = $row['month'] - 1;
            $status1[$monthIndex] = $row['status_count'];
        }

        $months_json = json_encode($months);
        $status1_json = json_encode($status1);

        $sql2 = "SELECT MONTH(created_time) AS month, SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) AS status_count 
                FROM orders 
                GROUP BY MONTH(created_time)";
        $stmt2 = $GLOBALS['conn']->query($sql2);
        $rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $status2 = array_fill(0, 12, 0);

        foreach ($rows as $row) {
            $monthIndex = $row['month'] - 1;
            $status2[$monthIndex] = $row['status_count'];
        }

        $status2_json = json_encode($status2);
    }
} catch (\Throwable $th) {
    die('lỗi');
}
