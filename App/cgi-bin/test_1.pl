#!perl

print "Content-type: text/html\r\n\r\n";
print "<HTML>\n";
print "<HEAD><TITLE>Test Script!</TITLE></HEAD>\n";
print "<BODY>\n";
print "<H2>Hello World!</H2>\n";
print "$_ = '$ENV{ $_ }'<br>" for sort keys %ENV;
print "</BODY>\n";
print "</HTML>\n";

exit (0);
