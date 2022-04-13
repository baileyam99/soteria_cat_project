<?php


function viewEvidence(string $codename){
    global $db;
    $query = "SELECT * FROM evidencelog WHERE codename = :codename";
    $statement = $db->prepare($query);
    $statement->bindValue(':codename', $codename);
    $statement->execute();
    $evidenceList = $statement->fetchAll();
    $statement->closeCursor();
    return $evidenceList;
}




function addEvidence(string $codename, string $filename, string $descriptor, string $size, string $modDate, string $hash, string $collector)
{           
        global $db; 
        $query = 'INSERT INTO evidencelog
                     (codename, fileName, descriptor, size, dateModified, itemHash, collector)
                  VALUES
                     (:codename, :fileName, :descriptor, :size, :dateModified, :itemHash, :collector)';
        $statement = $db->prepare($query);
        $statement->bindValue(':codename', $codename);
        $statement->bindValue(':fileName', $filename);
        $statement->bindValue(':descriptor', $descriptor);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':dateModified', $modDate);
        $statement->bindValue(':itemHash', $hash);
        $statement->bindValue(':collector', $collector);
        $statement->execute();
        $statement->closeCursor();
    
}

function updateEvidence(string $codename, int $idNum, string $filename, string $descriptor, string $size, string $modDate, string $hash, string $collector)
{           
        global $db; 
        $query = 'UPDATE evidencelog SET
                     fileName =:fileName, 
                     descriptor= :descriptor, 
                     size = :size, 
                     dateModified = :dateModified,
                     itemHash = :itemHash,
                     collector = :collector
                     WHERE codename = :codename AND idNum = :idNum';

        $statement = $db->prepare($query);
        $statement->bindValue(':codename', $codename);
        $statement->bindValue(':idNum', $idNum);
        $statement->bindValue(':fileName', $filename);
        $statement->bindValue(':descriptor', $descriptor);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':dateModified', $modDate);
        $statement->bindValue(':itemHash', $hash);
        $statement->bindValue(':collector', $collector);
        $statement->execute();
        $statement->closeCursor();
    
}

function deleteEvidence(string $codename, int $idNum){
    global $db;
    $query = 'DELETE FROM evidencelog
               WHERE codename = :codename AND idNum = :idNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':codename', $codename);
    $statement->bindValue(':idNum', $idNum);
    $statement->execute();
    $statement->closeCursor();
}