<?php
session_start();
include('../../actions/connect.php');

$ename = $_POST['electionname'];

// Insert a new record into the election_name table
$sql = "INSERT INTO election_name (type, active) VALUES('$ename', 0)";
$result = mysqli_query($con, $sql);

if ($result) {
    echo '<script>
        alert("Party registered");
        window.location="../admin_dash.php";
        </script>';
    
    // Create a trigger to automatically add a column to the voter table
    $trigger_sql = "
        CREATE TRIGGER after_election_insert
        AFTER INSERT ON election_name
        FOR EACH ROW
        BEGIN
            SET @column_name = NEW.type;
            SET @query = CONCAT('ALTER TABLE voter ADD COLUMN ', @column_name, ' INT DEFAULT 0');
            PREPARE stmt FROM @query;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        END
    ";

    // Use mysqli_multi_query to execute the trigger creation
    $trigger_result = mysqli_multi_query($con, $trigger_sql);
    
    if (!$trigger_result) {
        echo 'Error creating trigger: ' . mysqli_error($con);
    } else {
        // Fetch any additional results until there are no more
        while (mysqli_next_result($con)) {
            // Consume the result
            if (!mysqli_more_results($con)) {
                break;
            }
        }
    }
} else {
    echo 'Nope';
}
?>
