@echo off
cls
COLOR B0
mode con:cols=60 lines=10
TITLE UNIFORM SERVER - Create symbolic link

rem #################################################################
rem # Name: link_create.bat
rem # Created By: The Uniform Server Development Team
rem # Edited Last By: Mike Gleaves (ric)
rem # V 1.0 17-12-2014
rem # This script creates a symbolic link allowing Perl scripts 
rem # to be run with a Unix Shebang.
rem # 
rem # The mklink command is an internal command that is available
rem # in the following operating systems:
rem # Windows 7, Windows Vista, Windows 8 and Windows 10
rem # 
rem # Run link_create.bat (right click on file link_create.bat and run
rem # as administrator) allow program to make changes. This creates a
rem # symbolic link to the Perl executable.
rem # Start UniController. From the Perl tab run "Force Unix Shebang"
rem # you only need to perform this once.
rem #################################################################


rem ### working directory current folder
pushd %~dp0

rem save us path
set us_path=%cd%

rem change to top level
cd \

rem create link
mklink /D usr %us_path%\core\perl

rem restore original
popd
pause