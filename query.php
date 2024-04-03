<?php
include "includes/connect.php";
class Query
{
    public function execute($id)
    {
        if (method_exists($this, $id)) {
            $this->$id();
        } else {
            $data['data'] = "Function $id does not exist.";
            echo json_encode($data);
        }
    }

    private function addEvent()
    {
        global $con;
        
        // Alter table schema to set default value for deleted column if it's not already set
        $alterTable = "ALTER TABLE events MODIFY COLUMN deleted INT DEFAULT 0";
        $con->query($alterTable);
        
        // Proceed with adding the event
        $addEventQuery = "INSERT INTO events(title, description, start_date, end_date, contacts_ID) VALUES('$_POST[title]', '$_POST[description]', '$_POST[start_date]', '$_POST[end_date]', '$_POST[contact]')";
        if($con->query($addEventQuery)){
            $data['data'] = "success";
            
            // Get the ID of the last inserted event
            $lastEventId = $con->lastInsertId();
            
            // Insert into the activity table
            $addActivityQuery = "INSERT INTO activity(actName, datee, descrip, contacts_ID, edatee, id) VALUES('$_POST[title]', '$_POST[start_date]', '$_POST[description]', '$_POST[contact]', '$_POST[end_date]', $lastEventId)";
            if($con->query($addActivityQuery)){
                // If both event and activity insertion succeed, return success
                $data['data'] = "success";
            } else {
                // If activity insertion fails, return error
                $data['data'] = "error inserting into activity";
            }
        } else {
            // If event insertion fails, return error
            $data['data'] = "error inserting into events";
        }
        
        echo json_encode($data);
    }
    
    
    
    private function getEvents()
    {
        global $con;
        $get = "SELECT events.*, contacts.fName, contacts.lName 
                FROM events
                JOIN contacts ON events.contacts_ID = contacts.contacts_ID
                WHERE events.deleted = '0'";
        if ($events = $con->query($get)) {
            $data = $events->fetchAll();
        } else {
            $data[] = "error";
        }
        echo json_encode($data);
    }

    private function getContacts()
    {
        global $con;
        $getContacts = "SELECT * FROM contacts";
        $contacts = $con->query($getContacts)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($contacts);
    }
    

    private function updateEvent()
{
    global $con;
    
    // Update events table
    $updateEvents = "UPDATE events SET title = '$_POST[title]', description = '$_POST[description]', start_date = '$_POST[start_date]', end_date = '$_POST[end_date]', contacts_ID = '$_POST[contact]' WHERE id = '$_POST[eventId]'";
    
    // Update activity table
    $updateActivity = "UPDATE activity SET actName = '$_POST[title]', descrip= '$_POST[description]', datee = '$_POST[start_date]', edatee = '$_POST[end_date]', contacts_ID = '$_POST[contact]' WHERE id = '$_POST[eventId]'";
    
    $data = array(); // Initialize an array to store response data
    
    // Execute the updates
    if ($con->query($updateEvents) && $con->query($updateActivity)) {
        $data['data'] = "success";
    } else {
        $data['data'] = "error";
    }
    
    echo json_encode($data);
}

    
    private function deleteEvent()
    {
        global $con;
        $deleteevents = "UPDATE events SET deleted = 1 WHERE id = '$_POST[id]'";
        $deleteact = "UPDATE activity SET deleted = 1 WHERE id = '$_POST[id]'";
        if($con->query($deleteevents) && $con->query($deleteact)){
            $data = "success";
        }else{
            $data = "error";
        }   
        echo json_encode($data);
    }
}

if(isset($_GET['id'])){
    $query = new Query();
    echo $query->execute($_GET['id']);

}