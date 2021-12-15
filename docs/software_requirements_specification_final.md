
## Software Requirements

<Describe the structure of this section>
  
## Functional Requirements



### Landing Home Page
| ID | Requirement |
| :-------------: | :----------: |
| FR1 | Home page shall consist of the details about the electronic warehouse, |
| FR2 | Home page shall have the admin login, Customer Sign in and customer signup options |
| FR3 | Admin shall login into the admin dashboard by selecting the admin login option. |
| FR4 | Customer shall login into the customers profile by selecting the customer sign in|
| FR5 | A new customer shall be able to create his/her profile by selecting the customer sign up option |
| … | … | … |

### Admin Login Page
| ID | Requirement |
| :-------------: | :----------: |
| FR6 | Admin Login page shall consist of two fields which are username and password. |
| FR7 | Admin shall enter the admin’s username and password to login |
| FR8 | After entering the credentials, Admin shall be redirected to the admin’s dashboard. |
| FR9 | For incorrect login credentials application shall displayed with an error message – “Invalid username or password”. |
| FR10 | For blank field in username or password column error message “please fill out this field” is displayed|
| … | … | … |

### Customer Login Page
| ID | Requirement |
| :-------------: | :----------: |
| FR11 | Customer Login page shall consist of two fields Username and password. |
| FR12| Customer shall login with his credentials with which he has registered. |
| FR13 | For incorrect credentials a pop-up message “invalid username or password “is displayed. |
| FR14 | If any of the username or the password field are left empty then the error message “please fill out this field” is displayed. |
| FR15 |After successful login the page shall be redirected to customers electronic warehouse account. |
| … | … | … |
  
### Customer Registration
| ID | Requirement |
| :-------------: | :----------: |
| FR16 | User shall be able to create his profile by clicking the register new user. |
| FR17 | The new user shall enter the name, phone number, organization name, contact person, email id etc.   |
| FR18 | The user shall create submit option after filling all the necessary forms fields else there will be a pop up saying missing fields. |
| FR19 | The user’s profile shall be created after successfully submitting the user’s registration form|
| FR20 | The registered user’s name shall be in the database and now the user is ready to login |
| … | … | … |


### Customers Dashboard
| ID | Requirement |
| :-------------: | :----------: |
| FR21 | The customer’s dashboard shall contain welcome note for the customer, Menu, search bar, new arrivals, cart, and logout. |
| FR22 |The customer shall select any of the product by selecting the menu option. |
| FR23 |The customer shall search for any product by using the search bar. |
| FR24 |The customer shall get the notifications about the newly arrival of the products in the new arrivals. |
| FR25 |The customer shall see the items that he/ she has added in the cart menu. |
| FR26 |The customer shall anytime logout of his account. |
| … | … | … |

  
### Admin Dashboard
| ID | Requirement |
| :-------------: | :----------: |
| FR27 |Admin shall find a welcome note to electronic warehouse inventory upon login. |
| FR28| Admin shall find the menu option where he can find the product categories. |
| FR29| Admin shall find the logout option where he/she can logout of his/her profile |
| FR30 | Admin shall add new products into the warehouse inventory.  |
| FR31 | The products added here shall be reflected to the customer profile after adding. |

  




## Non-Functional Requirements



### Usability
| ID | Requirement |
| :-------------: | :----------: |
| NFR1 | The user interface shall be designed so that the ease of search for both the customer and admin is simple. |
| NFR2 | The customers shall have a basic knowledge of how to operate the application |
| NFR3 |   The application shall be very simple to use. |
| NFR4 | The application shall include contact number for any help regarding the application|
| NFR5 |The application shall confront all the consistency standards|


### Reliability
| ID | Requirement |
| :-------------: | :----------: |
| NFR6 | The web application shall be always recoverable. |
| NFR7 |The application shall not be corrupted frequently. |
| NFR8 |The user interface shall acknowledge within no time. |
| NFR9 | The application shall be very quick and easy for both admin and customers to login. |
| NFR10 |The application shall be 100% accurate. |
| … | … | … |


### Security
| ID | Requirement |
| :-------------: | :----------: |
| NFR11 | The application shall identify the user and his credentials provided and recognize them. |
| NFR12 | Login ID and password shall be required for the user to login. |
| NFR13 | Any CRUD operations shall be reflected as quickly as possible. |
| NFR14 | Passwords shall not be seen in text form while they are logging in. |
| NFR15 |Users shall logout of the account if there is an inactivity for a longer period. |

### Maintainability

| ID | Requirement |
| :-------------: | :----------: |
| NFR16 | The database shall accept any number of product details without giving any out of space error. |
| NFR17 | The system shall track the issues as well as keep a log of it. |
| NFR18 | The information presented within the application shall be correct. |
| NFR19 | The application shall be easy to modify if there are any changes or updates. |
| NFR20 | Application shall be thoroughly tested and there shall be regular maintenance needed for preciseness of the application and application free of errors. |

### Performance

| ID | Requirement |
| :-------------: | :----------: |
| NFR21 | Response time for the application shall be very quick. |
| NFR22 | The system shall support at least 100 users at once. |
| NFR23 | The user interface shall acknowledge within five seconds. |
| NFR24 | The application screen shall exhibit no more than 3 seconds response time |
| NFR25 | The system shall be able to manage multiple users without delay. This shows that the application is very scalable and can handle the load as needed. |
| … | … | … |



  
# Change management plan
Electronic warehouse Inventory will help the owners to manage, organize their product availability, and for the customers to navigate and purchase electronic products as per their needs. This website will help the owners to manage, organize their product availability, and for the customers to navigate and purchase electronic products as per their needs. This is For Customers Who want to purchase electronic goods in wholesale The Electronics Warehouse is a web-based store That allows customers to buy electronic goods from the website Unlike the traditional way of purchase from stores Our product will provide a user-friendly interface with ease to purchase products.
  
### How will you train people to use it?

* The workflow of the application must be clearly explained to all the stakeholders and all the potential problems which might arise while implementation must be addressed.
* More working sessions with the stakeholders.
* Creating sample demo videos of the applications for each flow.
* Proper management support and training resources will be provided for the customer to get more involved in the application use.
* Assist customer in fully accepting the new procedures and ensuring that they understand they offer promising ways for providing high-quality customer care.
* The customer will be guided and assisted the execution effort as the new practices are rolled out across the application to effectively manage the change process.

  
  
### How will you ensure it integrates within their ecosystem / software?

The data being added and produced will be stored with in the electronic warehouse system.  This data is also helpful to track all the information of products as well as the customer. We can show the stakeholders the data is being enclosed with in the database of the same server. We can view all the information through the User interface. All the products information customer signup information and product feedback given by the customer can be view through the admin console. From customer console, it is like the online e shopping website. All the information will be integrated with in the software.

### How will you ensure that it any discovered issues are resolved?

We can assure that any discovered issues can be moved to production in the couple days after we got reported on the website. Unfortunately, we don't have any log trackers inside the application. The customers or the stakeholders must report any issues directly to the product owner. We will try to implement the logs inside the application that will be helpful to monitor the application from initial to the end. So, that it will be easy to modify/update any change. If anything goes wrong for the stakeholder, we will roll back the change for time being and work on fixing the issue.
