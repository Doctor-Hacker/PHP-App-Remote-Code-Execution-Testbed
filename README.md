# PHP-App-Remote-Code-Execution-Testbed

**Purpose:**
This application has been designed to allow the user to practice remote code execution techniques against real applications without the hassle of installing the apps. It has been build under "Uniform Server" (UniServerZ) which is a free lightweight WAMP (Windows/Apache/MySQL/Php) server solution for Windows. UniServerZ runs from a USB (or in this case, a single folder). The vulnerable PHP apps have been downloaded mainly from https://www.exploit-db.com 

_Note that I use this application to generate different vulnerable applications for student assessment_

The apps can be exploited (1) Using manual techniques (2) Using exploits that are available on the Internet (e.g. exploit-db.com or github). There are exploits available for each of these apps (I have checked to make sure they work). You may also wish to try to create your own exploits.

**Usage:** 
Download the application, extract it to a folder and then run **menu.bat**. The install menu and all the available applications will be shown:-

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu.png)

Choose the PHP application you wish to try to exploit. The www folder will be cleared and a the required application will be copied to the root folder.

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu2.png)

After pressing any key, the UniServerZ app will be executed.

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu3.png)

You should find that UniServerZ is running in the tool bar. PHP and MYSQL should be running. If they are not, check that no other app is using the relevant ports.

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu4.png)

The MySQL database is then installed. 

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu5.png)

You can then browse to 127.0.0.1 to see the installed application.

![alt text](https://github.com/Doctor-Hacker/PHP-App-Remote-Code-Execution-Testbed/blob/master/menu6.png)


Now try to exploit the app.

_If credentials are required then they may be on the webpage someplace or perhaps defaults have been used (e.g. admin/password)._

Note: Use at your own risk and only for legal purposes.  

Doctor_Hacker@twitter.
