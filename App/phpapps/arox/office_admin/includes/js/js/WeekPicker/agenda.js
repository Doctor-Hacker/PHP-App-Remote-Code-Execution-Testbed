function fHoliday(y,m,d) {
	var rE=fGetEvent(y,m,d), r=null;

	// you may have sophisticated holiday calculation set here, following are only simple examples.
	if (m==1&&d==1)
		r=[" Jan 1, "+y+" \n Happy New Year! ",gsAction,"skyblue","red"];
	else if (m==12&&d==25)
		r=[" Dec 25, "+y+" \n Merry X'mas! ",gsAction,"skyblue","red"];
	else if (m==7&&d==1)
		r=[" Jul 1, "+y+" \n Canada Day ",gsAction,"skyblue","red"];
	else if (m==7&&d==4)
		r=[" Jul 4, "+y+" \n Independence Day ",gsAction,"skyblue","red"];
	else if (m==11&&d==11)
		r=[" Nov 11, "+y+" \n Veteran's Day ",gsAction,"skyblue","red"];
	else if (m==1&&d<25) {
		var date=fGetDateByDOW(y,1,3,1);	// Martin Luther King, Jr. Day is the 3rd Monday of Jan
		if (d==date) r=[" Jan "+d+", "+y+" \n Martin Luther King, Jr. Day ",gsAction,"skyblue","red"];
	}
	else if (m==2&&d<20) {
		var date=fGetDateByDOW(y,2,3,1);	// President's Day is the 3rd Monday of Feb
		if (d==date) r=[" Feb "+d+", "+y+" \n President's Day ",gsAction,"skyblue","red"];
	}
	else if (m==9&&d<15) {
		var date=fGetDateByDOW(y,9,1,1);	// Labor Day is the 1st Monday of Sep
		if (d==date) r=[" Sep "+d+", "+y+" \n Labor Day ",gsAction,"skyblue","red"];
	}
	else if (m==10&&d<15) {
		var date=fGetDateByDOW(y,10,2,1);	// Thanksgiving is the 2nd Monday of October
		if (d==date) r=[" Oct "+d+", "+y+" \n Thanksgiving Day (Canada) ",gsAction,"skyblue","red"];
	}
	else if (m==11&&d>15) {
		var date=fGetDateByDOW(y,11,4,4);	// Thanksgiving is the 4th Thursday of November
		if (d==date) r=[" Nov "+d+", "+y+" \n Thanksgiving Day (U.S.) ",gsAction,"skyblue","red"];
	}
	else if (m==5&&d>20) {
		var date=fGetDateByDOW(y,5,5,1);	// Memorial day is the last Monday of May
		if (d==date) r=[" May "+d+", "+y+" \n Memorial Day ",gsAction,"skyblue","red"];
	}	
	return rE?rE:r;	// favor events over holidays
}


