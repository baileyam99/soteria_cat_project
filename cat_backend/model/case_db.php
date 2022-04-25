<?php

function view(){
    global $db2;
    $query = "SELECT * FROM caseList";
    $cases = mysqli_query($db2, $query);
    return $cases;
}

function openCase(string $codename, string $clientName, string $caseType, string $lead, string $description, string $date)
{           
        global $db; 
        $query = 'INSERT INTO caseList
                     (codename, clientName, caseType, description, lead, caseStatus, openDate)
                  VALUES
                     (:codename, :clientname, :caseType, :description, :lead, :caseStatus, :openDate)';
        $statement = $db->prepare($query);
        $statement->bindValue(':codename', $codename);
        $statement->bindValue(':clientname', $clientName);
        $statement->bindValue(':caseType', $caseType);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':lead', $lead);
        $statement->bindValue(':caseStatus', true);
        $statement->bindValue(':openDate', $date);
        $statement->execute();
        $statement->closeCursor();
    
}

function updateCase(string $codename, string $clientName, string $caseType, string $lead, string $description)
{           
        global $db; 
        $query = "UPDATE caseList 
        SET codename = :codename,
            clientName = :clientname,
            caseType = :caseType,
            description = :description,
            lead = :lead
        WHERE codename = :codename";
        $statement = $db->prepare($query);
        $statement->bindValue(':codename', $codename);
        $statement->bindValue(':clientname', $clientName);
        $statement->bindValue(':caseType', $caseType);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':lead', $lead);
        $statement->execute();
        $statement->closeCursor();
}

function selectCase($codename) {
    global $db2;
    $query = "SELECT * FROM caselist WHERE codename = " . "'" . $codename . "'";
    $case = mysqli_query($db2, $query);
    return $case;
}

function getNotes($codename){
    global $db2;
    $query = "SELECT * FROM notes WHERE codename = " . "'" . $codename . "'" . " ORDER BY submitDate DESC";
    $result = mysqli_query($db2, $query);
    return $result;
}

function addNote(string $codename, string $username, string $date, string $body){
       global $db; 
       $query = 'INSERT INTO notes
                     (codename, username, submitDate, body)
                  VALUES
                     (:codename, :username, :date, :body)';
        $statement = $db->prepare($query);
        $statement->bindValue(':codename', $codename);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':body', $body);
        $statement->execute();
        $statement->closeCursor();
}

function search_case($param, $srch){
    global $db2;
    $query = "SELECT * FROM caselist WHERE " . $param . " = '" . $srch . "'";
    $result = mysqli_query($db2, $query);
    return $result;
}

function getTypes() {
    global $db2;
    $query = "SELECT caseType FROM casetypes";
    $types = mysqli_query($db2, $query);
    return $types;
}

function getUsernames() {
    global $db2;
    $query = "SELECT username FROM users";
    $usernames = mysqli_query($db2, $query);
    return $usernames;
}
?>