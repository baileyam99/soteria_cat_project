<?php

function viewPhysEvidence($codename) {
    global $db2;
    $query = "SELECT * FROM physicalinventory WHERE codename = " . "'" . $codename . "'";
    $ev = mysqli_query($db2, $query);
    return $ev;
}


function addPhysEvidence(string $codename, string $identifier, string $description, string $disposition, string $collector)
{           
        global $db; 
        $query = 'INSERT INTO physicalinventory
                     (codename, identifier, description, disposition, collector)
                  VALUES
                     (:codename, :identifier, :description, :disposition, :collector)';
        $statement = $db->prepare($query);
        $statement->bindValue(':codename', $codename);
        $statement->bindValue(':identifier', $identifier);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':disposition', $disposition);
        $statement->bindValue(':collector', $collector);
        $statement->execute();
        $statement->closeCursor();
    
}

function updatePhysEvidence(string $codename, int $idNum, string $identifier, string $description, string $disposition, string $collector)
{           
        global $db; 
        $query = 'UPDATE physicalinventory SET
                     identifier =:identifier, 
                     description= :description, 
                     disposition = :disposition, 
                     collector = :collector
                     WHERE codename = :codename AND idNum = :idNum';

        $statement = $db->prepare($query);
        $statement->bindValue(':codename', $codename);
        $statement->bindValue(':idNum', $idNum);
        $statement->bindValue(':identifier', $identifier);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':disposition', $disposition);
        $statement->bindValue(':collector', $collector);
        $statement->execute();
        $statement->closeCursor();
    
}

function deletePhysEvidence(string $codename, int $idNum){
    global $db;
    $query = 'DELETE FROM physicalinventory
               WHERE codename = :codename AND idNum = :idNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':codename', $codename);
    $statement->bindValue(':idNum', $idNum);
    $statement->execute();
    $statement->closeCursor();
}