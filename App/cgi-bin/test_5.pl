#!perl

use CGI qw(:standard);				# Include standard HTML and CGI functions
use CGI::Carp qw(fatalsToBrowser);      	# Send error messages to browser


&printheader;
if (param()) { 
	&displayorder
		}
&printform;	
&printtail;	


sub printheader {

  print header(), 
  	start_html(-title=>"Pizza Order Form", -bgcolor=>"#00ccff"), 
  	h1("Mikey's Pizza Delivery Service"),
	hr;
}


sub printtail {

  print address("pizzaman\@pizza.co.uk"),
  	end_html(); 
}


sub printform {

  print h1("Order your food here"),

	start_form(),			

	"What's your name? ",
	textfield("name"),

	p,
	"What's your phone? ",
	textfield("phone"),

	p,
	"Food order? ",
	checkbox_group(-name=>'food',
                   -values=>['Pizza','Garlic Bread','Apple Pie','Ice Cream'],
                   -defaults=>['Pizza']),
	p,
	"Drink order? ",
   	scrolling_list(-name=>'drink',
                       -values=>['Coke','Pepsi','Orange Juice','Beer'],
                       -size=>4,
		       -defaults=>['Coke'],
                       -multiple=>'true'),

	p,
	"How are you paying? ",
	radio_group(-name=>'payment',
		    -values=>['cash','cheque','credit card'],
 		    -default=>'cash'),
		    
	p,	    
	"What do you think of our service? ",
	popup_menu(-name=>'service',
                            -Values=>['Excellent','Good','Average','Poor'],
                            -default=>'Excellent'),	    
	p,
	"How can we improve it? ",
	br,
	textarea(-name=>'comments',
                          -rows=>5,
                          -columns=>50),
			    
	p,
	submit("Submit form"), reset("Clear form"),
	
  end_form();

}


sub displayorder {

	print h1("You have ordered...");
	
	print "<UL>";

	    foreach $key (param) {
		@values = param($key);
		print "<LI><B>$key:</B> ";
	        print join(", ",@values),"</LI>\n";
	    }

	print "</UL><HR>";
}
