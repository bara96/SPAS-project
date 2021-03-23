# SOFTWARE PERFORMANCE AND SCALABILITY Project

## First part
In the first part of the project, you will create a web application that allows users to check the state of the past flights. Data are retrieved from the bureau of transport of USA. 

Each flight must be described by the following fields:

TRANSACTION ID: id of the transaction
YEAR: year the flight took place
DAY_OF_WEEK: 1..7, 1=Sunday
FLIGHT_DATE: yyyymmaa
OP_CARRIER_FL_NUM: flight number
OP_CARRIER_AIRLINE_ID: unique id of the carrier line
ORIGIN_AIRPORT_ID: unique id of the origin airport
ORIGIN: origin airport name
ORIGIN_CITY_NAME: origin city
ORIGIN_STATE_NM: origin state
DEST_AIRPORT_ID: unique id of the destination airport
DEST: destination airport name
DEST_CITY_NAME: destination city,
DEST_STATE_NM: destination state
DEP_TIME: local departure time
DEP_DELAY: departure delay
ARR_TIME: arrival time
ARR_DELAY: arrival delay
CANCELLED: 1=Yes, 0=No
AIR_TIME: length of the flight

The web app must work as a micro service providing a RESTful implementation based on HTTP and JSON. The following queries myst be implemented
Given flight date and flight number, return the delay of departure and landing
Given a date interval and a minimum delay D, return the description of the flights (id, data, source city, destination city) with a delay of at least D minutes within the time interval specified.
Given a time interval and a positive integer n, return the n airports which had the highest percentage of delayed departures (delayed departures/total departures).  
