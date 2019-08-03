#!perl
use CGI qw(:standard);

print header, start_html("Hello"), h1("Hello World"), p("Hello everybody."), end_html;
