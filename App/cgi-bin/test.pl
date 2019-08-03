#!perl

print <<END_of_HTML;
Content-type: text/html

<HTML>
 <HEAD>
  <TITLE>Perl Test Page</TITLE>
 </HEAD>

 <BODY>
 <H1>Perl test page</H1>
  <P>Basic Perl test pages.</P>
  <ul>
     <li><a href="http://localhost/cgi-bin/test_1.pl/" target="_blank">test_1.pl - Display Perl environment</a></i>
     <li><a href="http://localhost/cgi-bin/test_2.pl/" target="_blank">test_2.pl - Basic "Hello world" uses here-doc &lt;&lt;END statement:</a></i>
     <li><a href="http://localhost/cgi-bin/test_3.pl/" target="_blank">test_3.pl - Basic "Hello world" uses use CGI qw(:standard)</a></i>
     <li><a href="http://localhost/cgi-bin/test_4.pl/" target="_blank">test_4.pl - Basic user input form 1</a></i>
     <li><a href="http://localhost/cgi-bin/test_5.pl/" target="_blank">test_5.pl - Basic user input form 2</a></i>
  </ul>

<p>The above test pages are located in folder <b>UniServerZ\\cgi-bin</b> after testing these pages can be deleted:<br />
Main Test page test.pl and pages test_1.pl to test_5.pl</p>

 </BODY>

</HTML>
END_of_HTML
