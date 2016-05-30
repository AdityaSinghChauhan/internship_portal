#Internship Portal

This project is a very simple internship portal having following features: 
1. There are two users 'Student' and 'Employer'.
2. The student user and the employer user can register on the website by hovering the curser on 'Register Tab' and then clicking on 'As Student' and 'As Employer' respectively.
3. Page 'reg_student.php' is for student registration.
4. Page 'reg_employer.php' is for Employer Rehistration.
5. After successfull registration, the suers can log in the sytem by hovering their curser on 'login' tab on the menu and selecting either 'as Student' or 'As Employer'.

Features for Students:
1. After successful registration and Login, the students can view all the internships and apply.
2. Students are not allowed to apply for an internship they are already applied.

Features for employers:
1. After successful registration and Login, the employers can do the following:
	a. View already posted internships
	b. Publish internships (Hover curser to publish tab and then select)
	c. View applications for already published internships. (Hover curser to publish tab and then select)
2. Employers are not allowed to apply for the published internships.

Features for normal users:
1. Normal users can view all the internships but can't apply unless they are registered and login. 

Features of the application:
1. Both client side and server side validations applied due to avoiding risk of script bypassing.
2. Database can be imported using the file 'internship.sql' in the sql folder.
3. Character and Numeric filters applied to prevent input of characters in fileds like mobile and input of integers in field like name.

