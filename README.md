First Page: ( Login)
There will not be a sign up in this tool , only predefined users will login.

So the first database need to be created is the database of the users which will have:
Name:
Email:
Password:
 
Second Page:
The second page need to be created is the landing page of the app which will contain the following :
 
Third Page ( Home):
This is will present the list of schools that has been added before and all grades that the school has and the final price for each grade … like a table

School name:
Grades:
KG1 >> final price for Citizen - final price for Non Citizen 
KG2 >> final price for Citizen - final price for Non Citizen
KG3 >> final price for Citizen - final price for Non Citizen 
Grade 1 >> final price for Citizen - final price for Non Citizen
Grade 2 >> final price for Citizen - final price for Non Citizen
Grade 3 >> final price for Citizen - final price for Non Citizen
Grade 4 >> final price for Citizen - final price for Non Citizen
Grade 5 >> final price for Citizen - final price for Non Citizen
Grade 6 >> final price for Citizen - final price for Non Citizen
Grade 7 >> final price for Citizen - final price for Non Citizen
Grade 8 >> final price for Citizen - final price for Non Citizen
Grade 9 >> final price for Citizen - final price for Non Citizen
Grade 10 >> final price for Citizen - final price for Non Citizen
Grade 11 >> final price for Citizen - final price for Non Citizen
Grade 12 >> final price for Citizen - final price for Non Citizen

The price will be calculated based on the algorithm that will be shared with you

 
Fourth Page ( Schools actual price):
in this page the user will have the list of schools that already been added in the database and can see all grades for each schools and can add the actual price for each grade and number of seats available for each grade:

Schools Name:
Grades:
KG 1 – available seats – actual price
KG 2 – available seats – actual price
KG 3 – available seats – actual price

Grade 1 – available seats – actual price
Grade 2 – available seats – actual price
Grade 3 – available seats – actual price
Grade 4 – available seats – actual price
Grade 5 – available seats – actual price
Grade 6 – available seats – actual price
Grade 7 – available seats – actual price
Grade 8 – available seats – actual price
Grade 9 – available seats – actual price
Grade 10 – available seats – actual price
Grade 11 – available seats – actual price
Grade 12 – available seats – actual price


 
fifth Page ( Schools price limit):
this the schools price limit that set by us for all levels as we have 4 levels based on the following:

level 1 is ( KG ) and that has the following grades:
KG1 
KG2 
KG3 
The price limit for this level is : 15,000

level 2 is ( Elementary  ) and that has the following grades:
Grade 1 
Grade 2 
Grade 3 
Grade 4 
Grade 5 
Grade 6 
The price limit for this level is : 18,000

level 3 is ( intermediate  ) and that has the following grades:
Grade 7
Grade 8 
Grade 9 
The price limit for this level is : 23,000

level 4 is ( High school  ) and that has the following grades:
Grade 10
Grade 11
Grade 12
The price limit for this level is : 26,000
last Page ( discount matrix ):
This page is the configuration of the discount matrix which we might change and if we change it the final price should change based on that:

We will take discount from the schools based of the available seats because we will be going to pay for that seats

Its 3 level of discount like the following 


From 1 to 10 seats will take 10% discount
From 11 to 29 seats will take 20% discount
30 seats and more we will take 30% discount
 
Key Features
User Input Form: A form to input the necessary data for calculation:

Grade Level (KG, Elementary, Intermediate, High School)
Citizenship status (Citizen / Non-Citizen)
Number of seats being negotiated
Actual price that all student paying right now
Price Calculation Logic: Based on the input, the tool should:

Select the appropriate price limit for the grade level.
Apply a discount rate based on the number of seats (10% for 10 seats, 20% for 20, 30% for 30+).
Adjust the price limit for Citizen students by excluding VAT (15%).
For non-Citzen students, include VAT in the final price if applicable.
Results Display: Show the calculated final price along with a breakdown of how it was determined.

Responsive Design: Ensure the tool is accessible and functional across various devices including desktops, tablets, and smartphones.
 
Algorithm for Calculating Final Negotiated School Price
Inputs
Educational Level: The grade level being negotiated (KG, Elementary, Intermediate, High School).
Citizenship Status: Determines if the student is a citizen (no VAT applied) or a non-citizen (VAT applied).
Number of Seats Offered: Used to calculate the discount rate.
Constants
Price Limits by Educational Level: Defined limits for each educational level.
VAT Rate: The additional charge applied for non-citizens, set at 15%.

Process
Retrieve the Base Limit: Obtain the price limit for the specified educational level from the predefined limits.
Determine the Discount Rate:
10% for 1-10 seats.
20% for 11-29 seats.
30% for 30+ seats.
Calculate the Discounted Price: Multiply the base limit by (1 - discount rate).
Adjust for VAT (If Non-Citizen):
For non-citizens, multiply the discounted price by 1.15 to include VAT.
Ensure that this adjusted price does not exceed the base limit before applying VAT.
Apply the price Limit:
The final price, after applying discounts and VAT (for non-citizens), must not exceed the base limit for the educational level.
Use the minimum of the calculated price and the base limit as the final price.

Outputs
Final Negotiated Price: The calculated price that adheres to the ministry limit, including any discounts and VAT adjustments.

Notes
The algorithm ensures fairness and compliance with our guidelines by strictly applying the price limit for both citizens and non-citizens.
The calculation sequence carefully considers discounts and VAT adjustments to ensure the final price does not exceed the established limit.
It provides a clear, step-by-step procedure for developers to implement the required functionality in the negotiation tool, ensuring that all financial calculations align with the provided guidelines and constraints.


#comment
https://drive.google.com/file/d/1eN5xEPWVu2S-BTc6zVFz8cQSMv6pCgf5/view
https://drive.google.com/file/d/1bE9zf5g8RELm6IyCTkc6-UjdN1obuFj8/view?usp=sharing
https://drive.google.com/file/d/1zr3FjeucEXH5EEeJLZXemJxui7yeJrTD/view?usp=sharing
https://drive.google.com/file/d/1FaoUKGuNWvLdzDU7uClF1js5YL5XWuDe/view?usp=sharing
https://drive.google.com/file/d/17hivjPZDeDbRuSzJIMR7riKX8887Mlog/view?usp=sharing
https://drive.google.com/file/d/1GehcIW85zn_J2WiWkQASPy-GRsQxcIl1/view?usp=sharing
