# PHP-App-Remote-Code-Execution-Testbed

_Abertay students note that this app will be used to generate a different remotely exploitable web app for the 2nd year Network investigation coursework. **The aim is for the students to find a working exploit to gain a shell**. The exploits I have found or written work under PHP, Python 2.6 and Python 3.x (search in exploit-db.com) and github This app is a testbed for students to investigate the PHP app before exploiting. Feedback to me would be useful!!_


Purpose: 
This application has been designed to allow the user to practice remote code execution techniques against real applications without the hassle of installing the apps. It has been build under "Uniform Server" (UniServerZ) which is a free lightweight WAMP (Windows/Apache/MySQL/Php) server solution for Windows. UniServerZ runs from a USB (or in this case, a single folder). The vulnerable PHP apps have been downloaded mainly from https://www.exploit-db.com 

Note that I use this application to generate different vulnerable applications for student assessment.

The apps can be exploited (1) Using manual techniques (2) Using exploits that are available on the Internet (e.g. exploit-db.com or github). There are exploits available for each of these apps (I have checked to make sure they work). My students also create their own exploits as part of an exploit writing module.

Usage: 
Download the application to a folder and run **menu.bat**. The install menu and all the available applications will be shown:-

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu.png)

Choose the PHP application you wish to try to exploit. The www folder will be cleared and a the required application will be copied to the root folder.

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu2.png)

After pressing any key, the UniServerZ app will be executed.

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu3.png)

You should find that UniServerZ is running in the tool bar. PHP and MYSQL should be running.

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu4.png)

The MySQL database is then installed. 

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu5.png)

You can then browse to 127.0.0.1 to see the installed application.

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu6.png)


Note: Use at your own risk and only for legal purposes.

Doctor_Hacker@twitter.
