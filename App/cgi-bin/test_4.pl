#!perl

use CGI qw(:standard);				# Include standard HTML and CGI functions
use CGI::Carp qw(fatalsToBrowser);      	# Send error messages to browser

#
# Start by printing the content-type, the title of the web page and a heading.
#

print header, start_html("Hello"), h1("Hello");


if (param())	{				# If true, the form has already been filled out.

	$who  = param("myname");   		# Extract the value passed from the form.
	print p("Hello, your name is $who");	# Print the name.
}
else	{  					# Else, first time through so present form.
 
	print start_form();			
	print p("What's your name? ", textfield("myname"));
	print p(submit("Submit form"), reset("Clear form"));
	print end_form();
}

print end_html;
