<?php
session_start();
include('../../actions/connect.php');

$name = $_POST['name'];
$aadhar = $_POST['aadhar'];
$constituency = $_POST['constituency'];
$party = $_SESSION['leader']['pname'];
$type = $_SESSION['type'];

// Define the stored procedure
$sqlProcedurels = "
CREATE PROCEDURE RegisterCandidateLS(
    IN p_name VARCHAR(100),
    IN p_aadhar VARCHAR(100),
    IN p_constituency VARCHAR(100),
    IN p_party VARCHAR(100)
)
BEGIN
    DECLARE candidatesExist INT;

    SELECT COUNT(*) INTO candidatesExist
    FROM ls
    WHERE party = p_party AND constituency = p_constituency;

    IF candidatesExist > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Candidates already exist for this party and constituency';
    ELSE
        IF (SELECT active FROM party WHERE pname = p_party) != 0 THEN
            INSERT INTO ls (name, aadhaar, party, constituency, count)
            VALUES (p_name, p_aadhar, p_party, p_constituency, 0);
        ELSE
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'CANNOT ADD';
        END IF;
    END IF;
END;
";

// comment after once
// mysqli_multi_query($con, $sqlProcedurels);
$sqlProcedurevs = "
CREATE PROCEDURE RegisterCandidateVS(
    IN p_name VARCHAR(100),
    IN p_aadhar VARCHAR(100),
    IN p_constituency VARCHAR(100),
    IN p_party VARCHAR(100)
)
BEGIN
    DECLARE candidatesExist INT;

    SELECT COUNT(*) INTO candidatesExist
    FROM vs
    WHERE party = p_party AND constituency = p_constituency;

    IF candidatesExist > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Candidates already exist for this party and constituency';
    ELSE
        IF (SELECT active FROM party WHERE pname = p_party) != 0 THEN
            INSERT INTO vs (name, aadhaar, party, constituency, count)
            VALUES (p_name, p_aadhar, p_party, p_constituency, 0);
        ELSE
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'CANNOT ADD';
        END IF;
    END IF;
END;
";

// comment after once
//mysqli_multi_query($con, $sqlProcedurevs);

// Call the stored procedure
try {
    
    if($type=='LS'){
        $sqlCallProcedure = "CALL RegisterCandidateLS('$name', '$aadhar', '$constituency', '$party')";
    }
    else{
        $sqlCallProcedure = "CALL RegisterCandidateVS('$name', '$aadhar', '$constituency', '$party')";
    }

    $result = mysqli_query($con, $sqlCallProcedure);

    if ($result) {
        echo '<script>
            alert("Candidate registered in '.$type.' Elections");
            window.location="../leader_dash.php";
        </script>';
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
} catch (mysqli_sql_exception $e) {
    // Check if the error message matches the expected message
    if ($e->getCode() == 1644 && strpos($e->getMessage(), 'Candidates already exist for this party and constituency') !== false) {
        echo '<script>
            alert("Candidates already exist for this party and constituency");
            window.location="../leader_dash.php";
        </script>';
        exit;
    } elseif($e->getCode() == 1644 && strpos($e->getMessage(), 'CANNOT ADD') !== false){
        echo '<script>
            alert("Not the time to add candidates!");
            window.location="../leader_dash.php";
        </script>';
        exit;
    }
    
    else {
        // Rethrow the exception if it's not the expected one
        throw $e;
    }
}

mysqli_close($con);
?>
