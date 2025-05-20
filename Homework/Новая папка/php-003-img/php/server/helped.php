<?php

function createTable($conn, $dbName, $tableName, array $columns) {
    // Էսկեյպ անունները
    $escapedDb = mysqli_real_escape_string($conn, $dbName);
    $escapedTable = mysqli_real_escape_string($conn, $tableName);

    // Ստուգել աղյուսակի գոյությունը
    $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES 
            WHERE TABLE_SCHEMA = '$escapedDb' 
            AND TABLE_NAME = '$escapedTable'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        // Ստուգել սյունակները
        $escapedColumns = array_map(function($col) use ($conn) {
            return "'".mysqli_real_escape_string($conn, $col)."'";
        }, array_keys($columns));

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA = '$escapedDb' 
                AND TABLE_NAME = '$escapedTable' 
                AND COLUMN_NAME IN (".implode(",", $escapedColumns).")";

        $result = mysqli_query($conn, $sql);
        $existingColumns = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $existingColumns[] = $row['COLUMN_NAME'];
        }
        $missingColumns = array_diff(array_keys($columns), $existingColumns);

        if(!empty($missingColumns)) {
            // ▶ Գտնել նոր անուն
            $counter = 1;
            do {
                $newTable = $tableName."_v".$counter;
                $escapedNewTable = mysqli_real_escape_string($conn, $newTable);
                $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES 
                        WHERE TABLE_SCHEMA = '$escapedDb' 
                        AND TABLE_NAME = '$escapedNewTable'";
                $result = mysqli_query($conn, $sql);
                $counter++;
            } while(mysqli_num_rows($result) > 0);

            // ▶ Ստեղծել նոր տարբերակ
            $columnsSQL = [];
            foreach($columns as $name => $def) {
                $columnsSQL[] = "`".mysqli_real_escape_string($conn, $name)."` $def";
            }

            $sql = "CREATE TABLE `$escapedDb`.`$escapedNewTable` (
                ".implode(",\n", $columnsSQL)."
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

            if(mysqli_query($conn, $sql)) {
                // echo "Ստեղծված է նոր տարբերակ՝ '$newTable'\n";
                return $newTable; // Վերադարձնել նոր անունը
            } else {
                die("Աղյուսակի սխալ: ".mysqli_error($conn));
            }
        } else {
            // echo "Աղյուսակը '$tableName' վավեր է\n";
            return $tableName;
        }
    } else {
        // ▶ Ստեղծել նոր աղյուսակ
        $columnsSQL = [];
        foreach($columns as $name => $def) {
            $columnsSQL[] = "`".mysqli_real_escape_string($conn, $name)."` $def";
        }

        $sql = "CREATE TABLE `$escapedDb`.`$escapedTable` (
            ".implode(",\n", $columnsSQL)."
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

        if(mysqli_query($conn, $sql)) {
            // echo "Աղյուսակը '$tableName' ստեղծված է\n";
            return $tableName;
        } else {
            die("Աղյուսակի սխալ: ".mysqli_error($conn));
        }
    }
}