Drop database if exists PatientsDB;
Show databases;
create database PatientsDB CHARACTER SET utf8 COLLATE UTF8_GENERAL_CI ;



Use PatientsDB;
Show tables;
Drop table if exists PatientDetails;


create table PatientDetails (
  patientNo tinyint unsigned NOT NULL auto_increment,  
  firstName varchar(45) NOT NULL, 
  lastName varchar(45) NOT NULL,
  DOB date NOT NULL,
  email varchar(45) NOT NULL,
  billAddress varchar(45) NOT NULL,
  appointmentNo tinyint unsigned NOT NULL,
  specializeIn ENUM ('Orthadontist','Periodontist','Prosthodontist') NOT NULL,
  billId tinyint unsigned NOT NULL,
  patientImage LONGBLOB DEFAULT NULL,           # Picture in DATABASE as BLOB (up to 4.2GB)
  Picture_Path varchar(20) DEFAULT NULL,   # Path to where picture is stored in file system
 
  PRIMARY KEY (patientNo),
  FOREIGN KEY (appointmentNo) REFERENCES appointment(appointmentNo),
  FOREIGN KEY (billId) REFERENCES bill(billId)
  ); 
   

Insert into PatientDetails values (1, 'Keelan', 'Duddy','1996-11-02', 'Keelan@gmail.com','Derry',1,'Orthadontist',1,load_file('c:/patients/patient1.jpeg'),'/patient1.jpeg'),
( 2,'Julie', 'Bennett','1998-08-21','Julie@gmail.com','Laois',2,'Periodontist',2,load_file('c:/patients/patient2.jpeg'),'/patient2.jpeg'),
( 3,'Nicole', 'Duddy','1998-7-12','Nicole@gmail.com','Galway',3,'Orthadontist',3,load_file('c:/patients/patient3.jpeg'),'/patient3.jpeg'),
( 4,'Jo', 'Jo','1989-3-1','Jojo@gmail.com','Antrim',4,'Orthadontist',4,load_file('c:/patients/patient4.jpeg'), '/patient4.jpeg');



Drop table if exists appointment;
Show databases;
Use PatientsDB;

create table appointment(
  appointmentNo tinyint unsigned NOT NULL auto_increment,
  patientNo tinyint unsigned NOT NULL,
  appointmentDate date NOT NULL,
  specialistNo tinyint unsigned NOT NULL ,
  primary key (appointmentNo),
  FOREIGN KEY (patientNo) REFERENCES PatientDetails(patientNo),
  FOREIGN KEY (specialistNo) REFERENCES specialists(specialistNo)
); 


INSERT INTO appointment (appointmentNo, patientNo, appointmentDate, specialistNo) VALUES(1,1,'2022-07-12',1),
(2,2,'2022-02-13',2),
(3,3,'2022-02-19',3),
(4,4,'2022-02-23',2);



Drop table if exists payment;
Show databases;
Use PatientsDB;

create table payment(
  paymentId tinyint unsigned NOT NULL auto_increment,
  billId tinyint unsigned NOT NULL,
  method ENUM('Cash','Cheque','Mastercard','Visa','Installments'),
  recievedBy ENUM('Post','handedIn','Upfront'),
  primary key (paymentId),
  FOREIGN KEY (billId) REFERENCES bill(billId)  
); 


INSERT INTO payment (paymentId, billId, method, recievedBy) VALUES(1,1,'Cash','Post'),(2,2,'Mastercard','Upfront'),(3,3,'Visa','handedIn'),(4,4,'Cheque','Post');



Drop table if exists bill;
Show databases;
Use PatientsDB;

create table bill(
  billId tinyint unsigned NOT NULL auto_increment,
  patientNo tinyint unsigned NOT NULL,
  paymentId tinyint unsigned NOT NULL,
  cost double NOT NULL,
  primary key (billId),
  FOREIGN KEY (patientNo) REFERENCES PatientDetails(patientNo),  
  FOREIGN KEY (paymentId) REFERENCES payment(paymentId) 
); 


INSERT INTO bill (billId, patientNo, paymentId, cost) VALUES(1,1,1,100.50),(2,2,2,56.60),(3,3,3,41.70),(4,4,4,172.60);



Drop table if exists specialist;
Show databases;
Use PatientsDB;

create table specialist(
 
  specialistNo tinyint unsigned NOT NULL auto_increment,
  specializeIn ENUM('Orthadontist','Periodontist','Prosthodontist') NOT NULL,
  specialistFirstName varchar(45),
  specialistLastName varchar(45),
  primary key (specialistNo) 
); 


INSERT INTO specialist (specialistNo, specializeIn, specialistFirstName, specialistLastName) VALUES(1,'Orthadontist','Jason','maxine'),(2,'Periodontist','Mary','toland'),(3,'Prosthodontist','Tom','Kent');



Drop table if exists treatment;
Show databases;
Use PatientsDB;

create table treatment(
  treatmentNo tinyint unsigned NOT NULL auto_increment,
  specialistNo tinyint unsigned NOT NULL,
  treatmentDetails varchar(200),
  status ENUM('Complete','onGoing','NotStarted'),
  primary key (treatmentNo),
  FOREIGN KEY (specialistNo) REFERENCES specialist(specialistNo) 
); 


INSERT INTO treatment (treatmentNo, specialistNo, treatmentDetails, status) VALUES(1,1,'Tooth removal','Complete'),(2,2,'Cleaned Teeth','COMPLETE'),(3,3,'Teeth replacement','onGoing');

show warnings;