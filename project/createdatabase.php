<?php

$query = "CREATE TABLE IF NOT EXISTS company (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    size VARCHAR(255),
    introduction TEXT NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)";
$table = mysqli_query($conn,$query);







$query = "CREATE TABLE IF NOT EXISTS interviewer (
    id INT NOT NULL AUTO_INCREMENT, 
    name VARCHAR(255) NOT NULL, 
    email VARCHAR(255) NOT NULL, 
    phone_number VARCHAR(20) NOT NULL, 
    available_time_slots DATETIME, 
    PRIMARY KEY(id)
 )";
$table = mysqli_query($conn,$query);




$query = "CREATE TABLE IF NOT EXISTS job_specialization (
    specialization_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (specialization_name)
)";
$table= mysqli_query($conn,$query);
$query = "SELECT * FROM job_specialization";
$rowlast = mysqli_query($conn,$query);
$lastrow = mysqli_fetch_assoc($rowlast);
if(!$lastrow){
    $query = "INSERT INTO job_specialization (specialization_name, description)
    VALUES
        ('Software Engineer', 'This is Software Engineer'),
        ('Web Developer', 'This is Web Developer'),
        ('Data Analyst', 'This is Data Analyst')";
    $table = mysqli_query($conn,$query);
}



$query = "CREATE TABLE IF NOT EXISTS job_posting (
    id INT NOT NULL AUTO_INCREMENT,
    company_id INT NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    application_deadline DATE NOT NULL,
    salary VARCHAR(255) NOT NULL,
    working_location VARCHAR(255) NOT NULL,
    scope_of_work TEXT NOT NULL,
    experience_requirement TEXT NOT NULL,
    benefits TEXT NOT NULL,
    company_introduction TEXT NOT NULL,
    specialization_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (company_id) REFERENCES company (id),
    FOREIGN KEY (specialization_name) REFERENCES job_specialization (specialization_name)
)";
$table = mysqli_query($conn,$query);




$query = "CREATE TABLE IF NOT EXISTS candidate (
    id  INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    resume_link VARCHAR(255) NOT NULL,
    experience_years INT NOT NULL,
    education_level VARCHAR(255) NOT NULL,
    specialization_name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (specialization_name) REFERENCES job_specialization (specialization_name)
)";
$table = mysqli_query($conn,$query);





$query = "CREATE TABLE IF NOT EXISTS job_application (
    id INT NOT NULL AUTO_INCREMENT,
    job_posting_id INT NOT NULL,
    candidate_id INT NOT NULL,
    applied_date DATE NOT NULL,
    interviewer_id INT,
    specialization_name VARCHAR(255) NOT NULL,
    job_action VARCHAR(20),
    PRIMARY KEY (id),
    FOREIGN KEY (job_posting_id) REFERENCES job_posting (id),
    FOREIGN KEY (candidate_id) REFERENCES candidate (id),
    FOREIGN KEY (interviewer_id) REFERENCES interviewer (id),
    FOREIGN KEY (specialization_name) REFERENCES job_specialization (specialization_name)
)";
$table = mysqli_query($conn,$query);





$query = "CREATE TABLE IF NOT EXISTS interview_waitlist (
    id INT NOT NULL AUTO_INCREMENT,
    job_application_id INT NOT NULL,
    available_time_slots DATETIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (job_application_id) REFERENCES job_application (id)
)";
$table = mysqli_query($conn,$query);




$query = "CREATE TABLE IF NOT EXISTS interview_on_the_go (
    id INT NOT NULL AUTO_INCREMENT, 
    interview_waitlist_id INT NOT NULL,
    candidate_id INT NOT NULL, 
    interviewer_id INT NOT NULL, 
    interview_date_time DATETIME, 
    job_description TEXT NOT NULL, 
    meeting_link VARCHAR(255) NOT NULL, 
    resume_link VARCHAR(255) NOT NULL,
    PRIMARY KEY(id), 
    FOREIGN KEY(interview_waitlist_id) REFERENCES interview_waitlist(id),
    FOREIGN KEY(interviewer_id) REFERENCES interviewer(id), 
    FOREIGN KEY(candidate_id) REFERENCES candidate(id)
 )";
$table = mysqli_query($conn,$query);








?>