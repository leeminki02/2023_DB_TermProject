<?php
echo "Hello World!";
header("Location: main.php");

?>

<!-- How the DB should be implemented:
    PATIENTS table
    pid (primary key), name, age, address, phone, height, weight, doctor
    - functions
        - patients should be able to read their own records
        - patients should be able to read their own schedule
    
    DOCTORS table
    did (primary key), name, phone, specialty(=department)
    - functions
        - crud of SCHEDULE
        - doctor can crud of patients
        - doctor should be able to find patients by name or phone
        - doctor can access to RECORDS of specific patient
        - doctor can crud RECORDS to specific patient

    DEPARTMENTS table
    name (primary key), list of doctors with this speciality
    - functions
        - anyone should be able to see the list of doctors in a department
    
    RECORDS table
    rid (primary key), pid (foreign key), did (foreign key), date, time, description
    - functions
        - one record can be linked to single patient, one or many doctors
        - should be able to be searched and filtered by specific patient or doctor
        - should be able to be searched and filtered by date and time
    
    SCHEDULE table
    sid (primary key), did (foreign key), pid (foreign key), date, time, description

    
 -->

