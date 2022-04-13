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

function getNotes(string $codename){
    global $db;
    $query = "SELECT * FROM notes WHERE codename= :codename ORDER BY submitDate";
    $statement = $db->prepare($query);
    $statement->bindValue(':codename', $codename);
    $statement->execute();
    $notes = $statement->fetchAll();
    $statement->closeCursor();

    return $notes;
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
?>