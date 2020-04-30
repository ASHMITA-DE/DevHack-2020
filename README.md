## KALI_TORJAN - TRANSPORT

The participants are required to use this repository as a template and create a private Github repository under their own username (Single repository per team). The following created sections in this README.md need to be duly filled, highlighting the denoted points for the solution/implementation. Please feel free to create further sub-sections in this markdown, the idea is to understand the gist of the components in a singular document.

### Project Overview
----------------------------------

Problem Statement-How to make people use public transport more and also promote carpooling
PROPOSED SOLUTION 1-Website that facilitates the submission and request of information to the database server.
PROPOSED SOLUTION 2- An open source android application which helps people in offering/selecting rides to destination. 

### Solution Description
----------------------------------

FOR WEBSITE-
Everyone is in hurry to reach their destination in this fast life. In this case waiting for the buses is not reliable. As the numbers of vehicles are increasing day by day,which leads to a serious problem of traffic congestion which leads to low accessibility, loss of travel time and pollution. The solution to this is to improve and expand the use of public transportation system. 
Hence, through our model, with the help of GPS, passengers will be able to get information about the arrival time of the transit vehicle. 
Thus, for providing real time information, we find average travel time that is derived from the historical data. 
Our model uses Location based services to get the passenger’s current GPS coordinates. These coordinates are sent to the server side where it is coordinated with the nearest bus stop. 
The passenger selects the Bus number from the drop down and request is sent to the server. After processing, server sends the arrival time also passenger can locate the bus’s current location on the map.
FOR APP-
In today’s increasing population, it has become really necessary to use carpooling to not only save petrol, but also to reduce pollution.
Our app provides users with mainly three options-
Update Profile
Offer Rides
Search Rides
On frequently using the app to avail carpooling facility, rewards will be given to user in form of income tax rebate, thus, increasing the market.

#### Architecture Diagram


Affix an image of the flow diagram/architecture diagram of the solution

#### Technical Description

An overview of
What technologies/versions were used
Setup/Installations required to run the solution
FOR WEBSITE- Technologies used for real time bus monitoring system-
Gps tracking 
Gps device 
Gprs device real time user navigation tracking distance and ETA calculation between two pushpins
For central database php 7.4.4 (Mysql https://phpmyadmin.net )
Installation xampp with php version 7.4.4
Microsoft bing map key for user navigation and distance between two pushpins
Setups required-
Setup localhost place the folder in htdocs
Import database file(change the line of code in dbcon.php(db folder) according to the name of your database)
Go to localhost/foldername for user view
Localhost/foldername/admib for admin view
FOR ANDROID APP-
Technology used-
This app is developed in Android version 3.6 and will work on version greater than 26 API level
Google firebase and firebase database
Google maps on emulator
No setups required as such


### Team Members
----------------------------------
List of team member names and email IDs
SINJAN ROY - 1805529@kiit.ac.in
SWAGATO BAG-1805537@kiit.ac.in
GARGI SAHA- 1805485@kiit.ac.in
ASHMITA DE- 1805474@kiit.ac.in
List of team member names and email IDs
