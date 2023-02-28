-- COP 4710 COLLEGE EVENT APPLICATION WEBSITE

-- Syntax for creating the database
CREATE DATABASE COP4710;

-- Entering into that database
USE COP4710;

-- Syntax for  table "Comments"
create table Comments(User_Id VARCHAR(20),
                      Comments VARCHAR(255),
                      Event_Name VARCHAR(255);
                      Rating FLOAT);
insert into Comments values('tm001', 'The event was fun and entertaining!!', '3.5', 'TechXellence');
insert into Comments values('tm001', 'The event could have more informational', '3.5', 'Technosis');
insert into Comments values('wh006', 'The event was amazing', '3.0', 'Melap');
insert into Comments values('qg008', 'Fun and lots of giveaways', '3.0', 'Endless Love');


-- Syntax for table "Students"
create table Students(User_Id VARCHAR(20),
                      Uid INT,
                      PRIMARY KEY(User_Id));
insert into Students values('tm001', 001);
insert into Students values('vm002', 001);
insert into Students values('mr003', 002);
insert into Students values('td004', 002);
insert into Students values('jh005', 003);
insert into Students values('wh006', 003);
insert into Students values('cs007', 001);
insert into Students values('qg008', 002);
insert into Students values('ld009', 001);
insert into Students values('vw010', 002);



-- Syntax for table "RSO_Event"
create table RSO_Event(User_Id VARCHAR(20),
                      Uid INT, Rid INT,
                      Name CHAR(100),
                      Date DATE, Time TIME,
                      Location VARCHAR(255),
                      Phone INT, Email VARCHAR(255),
                      Category CHAR(200));
insert into RSO_Event values('tm001', 001, 001, 'Endless Love', '2023-08-07', '17:00:00', '4000 Central Florida Blvd, Orlando, FL 32816', '407-850-9876', 'ucflib@knights.ucf.edu', 'Fundraising');


-- Syntax for table "Location"
create table Location(Lid INT,
                      Address VARCHAR(255),
                      Zip_Code INT,
                      Latitude FLOAT, Longitude FLOAT,
                      PRIMARY KEY(Lid));
insert into Location values(001, '4000 Central Florida Blvd, Orlando, FL', '32816', '28.596769','-81.203430');
insert into Location values(002, 'UCF Student Union, Fl', '32816', '49.268509', '-123.249557');
insert into Location values(003, '4101 USF Apple Dr, Tampa, FL', '33620', '28.059610', '-82.412270');


-- Syntax for table "RSO"
create table RSO(User_Id VARCHAR(20),
                Uid INT,
                Aid VARCHAR(20),
                Rid VARCHAR(20),
                Name VARCHAR(255),
                PRIMARY KEY(User_Id));
insert into RSO values('tm001', '001', '001', '001', 'Society of Women Engineers');
insert into RSO values('vm002', '001', '', '001', 'Society of Women Engineers');
insert into RSO values('cs007', '001', '', '001', 'Society of Women Engineers');
insert into RSO values('ld009', '001', '', '001', 'Society of Women Engineers');


-- Syntax for table "Admin"
create table Admin(User_Id VARCHAR(20),
                  Aid VARCHAR(20),
                  Uid INt,
                  PRIMARY KEY(Aid));
insert into Admin values('tm001', 001, 001);
insert into Admin values('mr003', 002, 002);


-- Syntax for table "SuperAdmin"
create table SuperAdmin(User_Id VARCHAR(20),
                        Uid INT,
                        PRIMARY KEY(User_Id));
insert into SuperAdmin values('tm001', 001);
insert into SuperAdmin values('mr003', 002);
insert into SuperAdmin values('jh005', 003);


-- Syntax for table "University"
create table University(Uid INT,
                        Lid INT,
                        University_Name VARCHAR(255),
                        Student_Count INT,
                        PRIMARY KEY(Uid));
insert into University values(001, 001, 'University of Central Florida', 255);
insert into University values(002, 002, 'University of South Florida', 500);
insert into University values(003, 003, 'University of North Florida', 350);




-- Syntax for table "Private_Event"
create table Private_Event(User_Id VARCHAR(20),
                          Uid INT,
                          Name CHAR(100),
                          Date DATE, Time TIME,
                          Location VARCHAR(255),
                          Phone INT, Email VARCHAR(255),
                          Category CHAR(200));
insert into Private_Event values('tm001', '001', 'Melap', '2022-09-23', '13:00:00', 'UCF Student Union, FL 32816', '407-823-3678', 'ucfsu@knights.ucf.edu', 'Social');
insert into Private_Event values('mr003', '002', 'Peaceful Givings', '2022-08-21', '09:00:00', '4101 USF Apple Dr, Tampa, FL 33620', '407-823-2500', 'ucflibusf.edu', 'Fundraising');
insert into Private_Event values('td004', '002', 'Peaceful Givings', '2022-08-21', '09:00:00', '4101 USF Apple Dr, Tampa, FL 33620', '407-823-2500', 'ucflibusf.edu', 'Fundraising');


-- Syntax for table "Public_Event"
create table Public_Event(User_Id VARCHAR(20),
                          Uid INT,
                          Name CHAR(100),
                          Date DATE, Time TIME,
                          Location VARCHAR(255),
                          Phone INT, Email VARCHAR(255),
                          Category CHAR(200));
insert into Public_Event values('tm001', '001', 'Techxellence', '2023-03-03', '11:30:00', 'UCF Student Union, FL 32816', '407-823-3678', 'ucfsu@knights.ucf.edu', 'Technical');
insert into Public_Event values('mr003', '002', 'Technosis', '2023-03-03', '16:30:00', '4101 USF Apple Dr, Tampa,  FL 33620', '407-823-2500','usflibusf.edu','Techincal');


-- Syntax for table "Personal_Info"
create table Personal_Info(User_Id VARCHAR(20),
                          Uid INT,
                          Pass VARCHAR(255),
                          FName CHAR(100), LName CHAR(100),
                          Phone INT, Email VARCHAR(255),
                          PRIMARY KEY(User_Id));
