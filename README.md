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
The following queries myst be implemented:
1. Given flight date and flight number, return the delay of departure and landing.  
2. Given a date interval and a minimum delay D, return the description of the flights (id, data, source city, destination city) with a delay of at least D minutes within the time interval specified.
3. Given a time interval and a positive integer n, return the n airports which had the highest percentage of delayed departures (delayed departures/total departures).  
