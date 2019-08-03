
:: Name of the database user with rights to all tables
set dbuser=root

:: Password for the database user
set dbpass=hacklab2019

:: MySQL EXE Path
set mysqldumpexe="C:\Users\hacklab\Desktop\UniServerZ\core\mysql\bin\mysqldump.exe"

:: Path to data folder which may differ from install dir
set datafldr="C:\Users\hacklab\Desktop\UniServerZ\core\mysql\data"


:: Error log path
set backupfldr=C:\Users\hacklab\Desktop\UniServerZ\sql


:: GO FORTH AND BACKUP EVERYTHING!

:: Switch to the data directory to enumerate the folders
pushd %datafldr%

echo "Pass each name to mysqldump.exe and output an individual .sql file for each"

:: Thanks to Radek Dolezel for adding the support for dashes in the db name
:: Added --routines thanks for the suggestion Angel

:: turn on if you are debugging
@echo off

FOR /D %%F IN (*) DO (

IF NOT [%%F]==[performance_schema] (
SET %%F=!%%F:@002d=-!
%mysqldumpexe% --user=%dbuser% --password=%dbpass% --databases %%F --routines > "%%F.sql"
) ELSE (
echo Skipping DB backup for performance_schema
)
)

echo "done"

::return to the main script dir on end
popd