@ECHO OFF
Rem Remotely exploitable PHP/MySQL applications. 
Rem Doctor_Hacker@twitter
Rem 03/08/2019

CLS
ECHO ...............................................................................
ECHO ** Remotely exploitable PHP/MySQL Applications on a USB stick - By Doctor_Hacker.
ECHO ...............................................................................
ECHO This batch file will install a remotely exploitable PHP/MySQL app under UniServerZ.
ECHO (1) The apps can be exploited manually (e.g. by walking through the app and exploiting).
ECHO (2) They can be exploited using exploits that are available on sites such as exploit-db.com and github.
ECHO You could also write your own exploit.  
ECHO Use at your own risk but DO NOT use this on a live system.
ECHO This is for educational purposes only.
ECHO ...............................................................................
ECHO.
ECHO a - Arox School-ERP Pro
ECHO b - Bozon 2.4
ECHO c - Log1 CMS 2.0
ECHO d - Lunarcms 3.3
ECHO e - My Little Forum 2.3.5
ECHO f - Phpcharts 1.0
ECHO g - Phpmyfaq 2.7.0
ECHO h - Ppim 1.0.1
ECHO i - Webcalendar 1.2.4
ECHO j - Webid 1.1.1
ECHO k - Webspell 4.01.02
ECHO l - Zenphoto 1.4.1.4
ECHO x - EXIT
ECHO.


CHOICE /C abcdefghijklx /N /M "Choose the PHP app that you want to install under UniServerZ or press x to EXIT."
IF ERRORLEVEL 1 SET M=arox & SET d=icampus
IF ERRORLEVEL 2 SET M=bozon & SET d=null
IF ERRORLEVEL 3 SET M=log1 & SET d=null
IF ERRORLEVEL 4 SET M=lunar & SET d=lunar
IF ERRORLEVEL 5 SET M=mylittleforum & SET d=mylittleforum
IF ERRORLEVEL 6 SET M=phpcharts & SET d=null
IF ERRORLEVEL 7 SET M=phpmyfaq & SET d=phpmyfaq
IF ERRORLEVEL 8 SET M=ppim & SET d=null
IF ERRORLEVEL 9 SET M=webcalendar & SET d=webcalendar
IF ERRORLEVEL 10 SET M=webid & SET d=webid
IF ERRORLEVEL 11 SET M=webspell & SET d=webspell
IF ERRORLEVEL 12 SET M=zenphoto & SET d=zenphoto
IF ERRORLEVEL 13 GOTO:EOF

Rem Delete everything in the www folder.
echo ***** Deleting and re-creating the www folder.
rmdir www /S /Q
mkdir www

Rem now copy the required folder contents to the www folder.
echo ***** Copying files to www folder. This may take a minute...
xcopy .\phpapps\%M% .\www\  /s /e >nul

echo ***** Ready to run Unicontroller 
Pause

Rem now start Unicontroller if not already started. 
tasklist /nh /fi "imagename eq UniController.exe" | find /i "UniController.exe" > nul || (echo Running Unicontroller - it should start Apache and MySQL automatically - unless another app is running on port 80 && start .\UniController.exe pc_win_start)

echo ***** Ready to import the MySQL database.
Pause
Rem Import the database if needed. Not important that the password is here!
if NOT %d% == null ( 
echo Importing MySQL database....
.\core\mysql\bin\mysql.exe -uroot %d% -phacklab2019 < sql\%d%.sql
)

echo ***** You can now browse to 127.0.0.1 to see the vulnerable application.
pause
