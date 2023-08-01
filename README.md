# Employee_leave_management_system-for-BAMI
My internship project 
The general objective of the project is to develop a web based application which management of leave application and approval is done online.

Development tools used
•	PHP, CSS, HTML and JavaScript with MySQL database.
•	XAMPP Control Panel as webserver for testing the source code.
•	Visual Studio Code editor for writing the source code.
•	Matrix Admin template for front end web design.
•	PHP Mailer library for sending emails.

![image](https://github.com/SaraFedlu/Employee_leave_management_system-for-BAMI/assets/105264543/671a9364-8cd0-4232-9d90-acc2934bc237)

# Functionality
There are three layers of the leave management system:
1.	Super Administrator ( HR ): 
•	Manage users’ profile.
•	Manage department.
•	Manage department supervisors.
•	Manage all employees.
•	Manage leave approved or applied by department supervisor. 
•	Manage accounts.
•	Has access to every data in the database.
2.	Administrator (Department Supervisor):
•	Manage employees of their respective department.
•	View Leave status of employees under them.
•	Pass leave application of employees of their respective department to the super administrator.
•	Manage Positions of their respective Department.
•	Change Positions of Employees of their respective Department.
•	Retrieve data of their own department.
•	Apply and keep track of their leave application status.
3.	Normal User (Employee):
•	Manage their profile.
•	Change password of their account.
•	Apply leave and track the process.
•	Retrieve their leave history.

Brief overview of the technology used in the web app
Front end:
•	HTML: used for creating and saving the web document.
•	CSS: used for creating attractive layout for the web document.
•	JavaScript: used for making the web application interactive and for client side input validation.
•	Bootstrap: used for creating responsive (mobile friendly) application.
Back end:
•	PHP: used to process and validate the request sent from the web document before allowing access to the database.
•	MySQL: used for accessing querying, updating, and managing data in databases.
Software Requirement
Any of the following:
•	WAMP Server
•	XAMPP Server

Flow chart
![image](https://github.com/SaraFedlu/Employee_leave_management_system-for-BAMI/assets/105264543/8ee3407a-0b0f-4a6f-a059-aa56deef1294)

Site map
![image](https://github.com/SaraFedlu/Employee_leave_management_system-for-BAMI/assets/105264543/1879294e-8e8f-41a6-bc1e-b11535d6d31b)

Use-case diagram
![image](https://github.com/SaraFedlu/Employee_leave_management_system-for-BAMI/assets/105264543/d43a5ee6-5568-4273-a1cf-6b0b85c85661)

# Working principle
The three different actors mentioned above will have a different type of access to the site according to their Role (whether they are supervisors, super admins or normal employees).
But at first, in order to access the system each employee need to be registered through registration form wizard or by super admin.
After registration they can login using their ID no. as username. 
Normal users will not have much to do other than applying request, keep track of progress and view/modify their profile to some extent.
Department supervisors will only have control over their own department employees. 
Their access is limited to approving/rejecting leave requests of employees under them and creating necessary positions under their department.
Super Admins will have relatively unlimited power over everything.
They can modify/delete all users, create new user, assign admins, create/delete department approve/reject leave requests approved or applied by all department supervisors.

# Main features of the system
1.	Apply leave:
This feature enables all type of users to apply for leave provided that they have sufficient amount of days and they don’t have more than one approved leave request in that particular year.
 It has front end as well as back end validation to filter any type of invalid request.
 It also shows amount of available days a user has and total number of days requested in read-only input field. Users can select from the list or write their own reason of leave.
2.	Show leave history:
In this feature users can keep track of their request approval progress. They can delete their rejected or pending leave request to restore the days subtracted or in case they change their mind respectively.
Once the request approved they can’t delete it whoever they are. Whether the request approved or rejected the normal user can see the feedback given from the admins and super admins.
Admins can see the feedback from super admins. Super admins need not to receive feedback.
3.	Edit profile:
All types of users can update their profile. Normal users and admins can only change some information as shown below on the figure.
Super admins can edit any employee’s and their own profile except for ID freely.
4.	Approve leave
Admins (department supervisors) can approve/reject the requests of employees under them. Requests approved by admins will pass to super admins for final decision.
Admins and super admins should give feedback to each approval/rejection. After approval/rejection they can’t reverse their decision.
5.	Manage position:
Department supervisors can add new position, update or delete existing position in that particular department. They can also assign different positions to employees under them.
6.	Manage departments:
Super admins can add new department, update/delete existing departments in the organization.
7.	Manage employees:
Admins and super admins manage employees in different way. Admins can only view and assign positions to their employees, whereas super admins can delete, update or create new employees and modify available leave days of every employee. 
# Additional features
Forgot Password: 
Users can reset their forgotten password easily by using the email they provided during registration. Users that have been registered by super admin can reset their password the same way using reset password option at index page.
Change password
Users can change their password provided that they remember their old password. Users can only change their own password regardless of their role.
Front end and back end validation
Registration, login and other forms in the application are validated both client side and server side to save users energy and to protect the database respectively. Invalid or illegal inputs are detected immediately before the form submission. The validation is made considering every scenario as much as possible.
About app:
There is easy to understand description about how to use the app at the about app option on the Index page.
Log out:
Users can clear their session after they finish accessing their account to prevent illegal access to their account by logging out using logout button.
