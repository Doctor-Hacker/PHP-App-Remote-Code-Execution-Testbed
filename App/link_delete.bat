@echo off
cls
COLOR B0
mode con:cols=60 lines=10
TITLE UNIFORM SERVER - Delete symbolic link

rem #################################################################
rem # Name: link_delete.bat
rem # Created By: The Uniform Server Development Team
rem # Edited Last By: Mike Gleaves (ric)
rem # V 1.0 17-12-2014
rem # This script deletes the link created with link_create.bat
rem #################################################################


rem ### working directory current folder
pushd %~dp0

rem save us path
set us_path=%cd%

rem change to top level
cd \

rem delete link
rd usr

rem restore original
popd
pause
