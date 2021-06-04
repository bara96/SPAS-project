# SOFTWARE PERFORMANCE AND SCALABILITY Project

## First part
In the first part of the project, you will create a web application that allows users to check the state of the past flights. Data are retrieved from the bureau of transport of USA. 

Each flight must be described by the following fields:  

- _TRANSACTION ID_: id of the transaction
- _YEAR_: year the flight took place
- _DAY_OF_WEEK_: 1..7, 1=Sunday
- _FLIGHT_DATE_: yyyymmaa
- _OP_CARRIER_FL_NUM_: flight number
- _OP_CARRIER_AIRLINE_ID_: unique id of the carrier line
- _ORIGIN_AIRPORT_ID_: unique id of the origin airport
- _ORIGIN_: origin airport name
- _ORIGIN_CITY_NAME_: origin city
- _ORIGIN_STATE_NM_: origin state
- _DEST_AIRPORT_ID_: unique id of the destination airport
- _DEST_: destination airport name
- _DEST_CITY_NAME_: destination city,
- _DEST_STATE_NM_: destination state
- _DEP_TIME_: local departure time
- _DEP_DELAY_: departure delay
- _ARR_TIME_: arrival time
- _ARR_DELAY_: arrival delay
- _CANCELLED_: 1=Yes, 0=No
- _AIR_TIME_: length of the flight

The web app must work as a micro service providing a RESTful implementation based on HTTP and JSON.  
The following queries must be implemented:
1. Given flight date and flight number, return the delay of departure and landing.  
2. Given a date interval and a minimum delay D, return the description of the flights (id, data, source city, destination city) with a delay of at least D minutes within the time interval specified.
3. Given a time interval and a positive integer n, return the n airports which had the highest percentage of delayed departures (delayed departures/total departures). 

## Second Part  

### TASK1: Identify the components of your application.  
If you are building your applications as a monolithic software running on a single PC, you may identify for sure the CPU and the disk with will be used both by your front end (the web server) and your backend (database of backend application). If your application is more intriguing and has more disks or run on more than one machine, spot the key-components accordingly.  

### TASK2: Identify the service time and service demand.  
Set up a closed-loop benchmarking test with a single customer. For each type of query required by the previous assignment, identify the resource demand (relative visit ratio and service time).  
How do you do it? Since you have a single request, you assume that the expected response time measured by Tsung is the expected  service time. The relative visit ratio, e.g., at the disk, may be derived by counting the disk accesses during the experiment and divide them by the number of requests.  
Pay attention that no other demanding application is running on your system during this benchmarking! top command allows you to monitor system utilization and at https://www.opsdash.com/blog/disk-monitoring-linux.html you may find some tool descriptions.

### TASK 3: Validate your model.  
In this part, you will study the response time and the throughput of the system as function of the number of users. Model the system as an interactive system and compare the measurements obtained with Tsung and the solution of the queueing network model obtained with JMT.  You may choose only two types of requests and consider them in isolation.  

### TASK4: Optimal number of jobs: determine the scalability of your application  
Use operational analysis to determine the bottleneck od the system and the optimal number of users assuming that all the queries are the same (i.e., single class model) for each query type.  

### TASK5: Propose an improvement of the scalability level  
Modify the model to increase the number of parallel customers that it can serve. Motivate your choices and show the optimal number of users obtained thanks to the operational analysis before and after your modifications.  

## TASK6 (Optional): study the system with a mixture of requests  
Change your model to a multi-chain one, in which each chain corresponds to one query type. Queries with similar demands can be merged together to form one chain. Use JMT to study a mixture traffic, i.e., given a certain configuration find the saturation point for different percentage of jobs in the chains.  
