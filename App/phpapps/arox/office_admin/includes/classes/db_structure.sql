# Exported Data base File in Mysql
#
# Database Backup For Schools
# Copyright (c) 2009 admin
#
# Database: kalangi_emis162
# Database Server: localhost
#
# Backup Date: 02/02/2009 05:03:48

drop table if exists admin;
create table admin (
  slno int(11) not null auto_increment,
  username varchar(100) not null ,
  password varchar(100) not null ,
  email varchar(100) not null ,
  admintype varchar(50) not null ,
  PRIMARY KEY (slno)
);

drop table if exists es_addstaff;
create table es_addstaff (
  es_addstaffid int(11) not null auto_increment,
  tbl_varchar_teachername varchar(255) not null ,
  tbl_varchar_gender varchar(255) not null ,
  tbl_date_dob date not null ,
  tbl_varchar_designation varchar(255) not null ,
  tbl_varchar_primarysubject varchar(255) not null ,
  tbl_varcahr_secondrysubject varchar(255) not null ,
  tbl_varchar_fathus varchar(255) not null ,
  tbl_varchar_exampassed varchar(255) not null ,
  tbl_varchar_university varchar(255) not null ,
  tbl_varchar_year varchar(255) not null ,
  tbl_varchar_experience varchar(255) not null ,
  tbl_int_noofdughters varchar(255) not null ,
  tbl_int_noofsons varchar(255) not null ,
  tbl_varchar_presentadress varchar(255) not null ,
  tbl_varchar_city varchar(255) not null ,
  tbl_varchar_state varchar(255) not null ,
  tbl_varchar_country varchar(255) not null ,
  tbl_varchar_zipcode varchar(255) not null ,
  tbl_varchar_residenceno varchar(255) not null ,
  tbl_varchar_mobileno varchar(255) not null ,
  tbl_varchar_email varchar(255) not null ,
  tbl_varchar_parmanentadress varchar(255) not null ,
  tbl_varchar_city1 varchar(255) not null ,
  tbl_varchar_state1 varchar(255) not null ,
  tbl_varchar_contry1 varchar(255) not null ,
  tbl_varchar_zipcode1 varchar(255) not null ,
  tbl_varchar_previousemp varchar(255) not null ,
  tbl_varchar_instiname varchar(255) not null ,
  tbl_varchar_period varchar(255) not null ,
  tbl_varchar_designation1 varchar(255) not null ,
  PRIMARY KEY (es_addstaffid)
);

drop table if exists es_admins;
create table es_admins (
  es_adminsid int(11) not null auto_increment,
  admin_username varchar(255) not null ,
  admin_password varchar(255) not null ,
  admin_fname varchar(255) not null ,
  user_type enum('super','admin') not null ,
  user_theme varchar(255) default 'pink.css' not null ,
  admin_lname varchar(255) not null ,
  admin_email varchar(255) not null ,
  admin_phoneno varchar(255) not null ,
  admin_more text not null ,
  admin_permissions text not null ,
  PRIMARY KEY (es_adminsid)
);

drop table if exists es_allowencemaster;
create table es_allowencemaster (
  es_allowencemasterid int(11) not null auto_increment,
  alw_post varchar(255) not null ,
  alw_type varchar(255) not null ,
  alw_fromdate date not null ,
  alw_todate date not null ,
  alw_amount varchar(255) not null ,
  alw_amt_type varchar(255) not null ,
  alw_dept varchar(255) not null ,
  PRIMARY KEY (es_allowencemasterid)
);

drop table if exists es_assignment;
create table es_assignment (
  es_assignmentid int(11) not null auto_increment,
  as_name varchar(255) not null ,
  as_class varchar(255) not null ,
  as_sec varchar(255) not null ,
  as_suject varchar(255) not null ,
  as_lastdate date not null ,
  as_description longtext not null ,
  as_createdon date not null ,
  status enum('active','inactive','deleted') not null ,
  as_marks int(11) not null ,
  PRIMARY KEY (es_assignmentid)
);

drop table if exists es_assignmentmarks;
create table es_assignmentmarks (
  es_assignmentmarksid int(11) not null auto_increment,
  asig_name varchar(255) not null ,
  asig_class varchar(255) not null ,
  asig_subjectname varchar(255) not null ,
  asig_studid varchar(255) not null ,
  asig_marksobtained varchar(255) not null ,
  PRIMARY KEY (es_assignmentmarksid)
);

drop table if exists es_attend_staff;
create table es_attend_staff (
  es_attend_staffid int(11) not null auto_increment,
  at_staff_dept varchar(255) not null ,
  at_staff_date datetime not null ,
  at_staff_id varchar(255) not null ,
  at_staff_name varchar(255) not null ,
  at_staff_desig varchar(255) not null ,
  at_staff_attend varchar(255) not null ,
  at_staff_remarks varchar(255) not null ,
  PRIMARY KEY (es_attend_staffid)
);

drop table if exists es_attend_student;
create table es_attend_student (
  es_attend_studentid int(11) not null auto_increment,
  at_std_group varchar(255) not null ,
  at_std_class varchar(255) not null ,
  at_attendance_date datetime not null ,
  at_std_subject varchar(255) not null ,
  at_std_period int(11) not null ,
  at_period_from int(11) not null ,
  at_period_to int(11) not null ,
  at_reg_no varchar(255) not null ,
  at_stud_name varchar(255) not null ,
  at_attendance varchar(255) not null ,
  at_remarks varchar(255) not null ,
  PRIMARY KEY (es_attend_studentid)
);

drop table if exists es_bookissue;
create table es_bookissue (
  es_bookissueid int(11) not null auto_increment,
  bki_id int(11) not null ,
  bki_bookid int(11) not null ,
  issuetype varchar(255) not null ,
  issuedate date not null ,
  status enum('active','inactive') not null ,
  PRIMARY KEY (es_bookissueid)
);

drop table if exists es_candidate;
create table es_candidate (
  es_candidateid int(11) not null auto_increment,
  st_postaplied varchar(255) not null ,
  st_firstname varchar(255) not null ,
  st_lastname varchar(255) not null ,
  st_gender varchar(255) not null ,
  st_dob varchar(255) not null ,
  st_primarysubject varchar(255) not null ,
  st_fatherhusname varchar(255) not null ,
  st_noofdughters int(11) not null ,
  st_noofsons int(11) not null ,
  st_email varchar(255) not null ,
  st_mobilenocomunication varchar(255) not null ,
  st_examp1 varchar(255) not null ,
  st_examp2 varchar(255) not null ,
  st_examp3 varchar(255) not null ,
  st_borduniversity1 varchar(255) not null ,
  st_borduniversity2 varchar(255) not null ,
  st_borduniversity3 varchar(255) not null ,
  st_year1 varchar(255) not null ,
  st_year2 varchar(255) not null ,
  st_year3 varchar(255) not null ,
  st_insititute1 varchar(255) not null ,
  st_insititute2 varchar(255) not null ,
  st_insititute3 varchar(255) not null ,
  st_position1 varchar(255) not null ,
  st_position2 varchar(255) not null ,
  st_position3 varchar(255) not null ,
  st_period1 varchar(255) not null ,
  st_period2 varchar(255) not null ,
  st_period3 varchar(255) not null ,
  st_pradress varchar(255) not null ,
  st_prcity varchar(255) not null ,
  st_prpincode varchar(255) not null ,
  st_prphonecode varchar(255) not null ,
  st_prstate varchar(255) not null ,
  st_prresino varchar(255) not null ,
  st_prcountry varchar(255) not null ,
  st_prmobno varchar(255) not null ,
  st_peadress varchar(255) not null ,
  st_pecity varchar(255) not null ,
  st_pepincode varchar(255) not null ,
  st_pephoneno varchar(255) not null ,
  st_pestate varchar(255) not null ,
  st_peresino varchar(255) not null ,
  st_pecountry varchar(255) not null ,
  st_pemobileno varchar(255) not null ,
  st_refposname1 varchar(255) not null ,
  st_refposname2 varchar(255) not null ,
  st_refposname3 varchar(255) not null ,
  st_refdesignation1 varchar(255) not null ,
  st_refdesignation2 varchar(255) not null ,
  st_refdesignation3 varchar(255) not null ,
  st_refinsititute1 varchar(255) not null ,
  st_refinsititute2 varchar(255) not null ,
  st_refinsititute3 varchar(255) not null ,
  st_refemail1 varchar(255) not null ,
  st_refemail2 varchar(255) not null ,
  st_refemail3 varchar(255) not null ,
  st_writentest varchar(255) not null ,
  st_technicalinterview varchar(255) not null ,
  st_finalinterview varchar(255) not null ,
  status enum('selected','notselected','onhold') not null ,
  st_perviouspackage varchar(255) not null ,
  st_basic varchar(255) not null ,
  st_dateofjoining varchar(255) not null ,
  st_post varchar(255) not null ,
  st_department varchar(255) not null ,
  st_remarks varchar(255) not null ,
  st_qualification varchar(255) not null ,
  st_class varchar(255) not null ,
  PRIMARY KEY (es_candidateid)
);

drop table if exists es_categorylibrary;
create table es_categorylibrary (
  es_categorylibraryid int(11) not null auto_increment,
  lb_categoryname varchar(255) not null ,
  lb_catdesc longtext not null ,
  status enum('active','inactive') default 'active' not null ,
  PRIMARY KEY (es_categorylibraryid)
);

drop table if exists es_classes;
create table es_classes (
  es_classesid int(11) not null auto_increment,
  es_classname varchar(255) not null ,
  es_orderby int(11) not null ,
  es_groupid int(11) not null ,
  PRIMARY KEY (es_classesid)
);

drop table if exists es_classifieds;
create table es_classifieds (
  es_classifiedsid int(11) not null auto_increment,
  cfs_name varchar(255) not null ,
  cfs_modeofadds varchar(255) not null ,
  cfs_posteddate date not null ,
  cfs_details varchar(255) not null ,
  status enum('active','inactive','deleted') default 'active' not null ,
  PRIMARY KEY (es_classifiedsid)
);

drop table if exists es_deductionmaster;
create table es_deductionmaster (
  es_deductionmasterid int(11) not null auto_increment,
  ded_post varchar(255) not null ,
  ded_type varchar(255) not null ,
  ded_fromdate date not null ,
  ded_todate date not null ,
  ded_amount varchar(255) not null ,
  ded_amt_type varchar(255) not null ,
  ded_dept varchar(255) not null ,
  PRIMARY KEY (es_deductionmasterid)
);

drop table if exists es_departments;
create table es_departments (
  es_departmentsid int(11) not null auto_increment,
  es_deptname varchar(255) not null ,
  es_orderby int(11) not null ,
  es_groupid int(11) not null ,
  PRIMARY KEY (es_departmentsid)
);

drop table if exists es_deptposts;
create table es_deptposts (
  es_deptpostsid int(11) not null auto_increment,
  es_postshortname varchar(255) not null ,
  es_postcode varchar(255) not null ,
  es_postname varchar(255) not null ,
  status enum('active','inactive') not null ,
  PRIMARY KEY (es_deptpostsid)
);

drop table if exists es_enquiry;
create table es_enquiry (
  es_enquiryid int(11) not null auto_increment,
  eq_serialno int(11) not null ,
  eq_createdon date not null ,
  eq_name varchar(255) not null ,
  eq_address varchar(255) not null ,
  eq_city varchar(255) not null ,
  eq_wardname varchar(255) not null ,
  eq_sex varchar(255) not null ,
  eq_class varchar(255) not null ,
  eq_phno int(11) not null ,
  eq_mobile int(11) not null ,
  eq_emailid varchar(255) not null ,
  eq_reftype varchar(255) not null ,
  eq_refname varchar(255) not null ,
  eq_description varchar(255) not null ,
  eq_formtype varchar(255) not null ,
  eq_paymode varchar(255) not null ,
  eq_chequeno varchar(255) not null ,
  eq_bankname varchar(255) not null ,
  eq_submitedon date not null ,
  eq_acadamic varchar(255) not null ,
  eq_marksobtain int(11) not null ,
  eq_outof int(11) not null ,
  eq_oralexam varchar(255) not null ,
  eq_familyinteraction varchar(255) not null ,
  eq_percentage double not null ,
  eq_result varchar(255) not null ,
  eq_amountpaid varchar(255) not null ,
  eq_state varchar(255) not null ,
  eq_section varchar(50) not null ,
  PRIMARY KEY (es_enquiryid)
);

drop table if exists es_exam;
create table es_exam (
  es_examid int(11) not null auto_increment,
  es_examname varchar(255) not null ,
  es_examordby int(11) not null ,
  PRIMARY KEY (es_examid)
);

drop table if exists es_exam_academic;
create table es_exam_academic (
  es_exam_academicid int(11) not null auto_increment,
  exam_id int(11) not null ,
  group_id int(11) not null ,
  class_id int(11) not null ,
  academic_year varchar(255) not null ,
  created_date datetime not null ,
  PRIMARY KEY (es_exam_academicid)
);

drop table if exists es_exam_details;
create table es_exam_details (
  es_exam_detailsid int(11) not null auto_increment,
  academicexam_id int(11) not null ,
  subject_id int(11) not null ,
  exam_date datetime not null ,
  exam_duration varchar(255) not null ,
  total_marks int(11) not null ,
  pass_marks int(11) not null ,
  upload_exam_paper longtext not null ,
  PRIMARY KEY (es_exam_detailsid)
);

drop table if exists es_fa_groups;
create table es_fa_groups (
  es_fa_groupsid int(11) not null auto_increment,
  fa_groupname varchar(255) not null ,
  fa_undergroup varchar(255) not null ,
  fa_display int(5) default '1' not null ,
  PRIMARY KEY (es_fa_groupsid)
);

drop table if exists es_feemaster;
create table es_feemaster (
  es_feemasterid int(11) not null auto_increment,
  fee_particular varchar(255) not null ,
  fee_class int(11) not null ,
  fee_amount double not null ,
  fee_instalments int(11) not null ,
  fee_extra1 varchar(255) not null ,
  fee_extra2 varchar(255) not null ,
  fee_fromdate date not null ,
  fee_todate date not null ,
  PRIMARY KEY (es_feemasterid)
);

drop table if exists es_feepaid;
create table es_feepaid (
  es_feepaidid int(11) not null auto_increment,
  studentid int(11) not null ,
  class varchar(255) not null ,
  particularid int(11) not null ,
  particulartname varchar(255) not null ,
  feeamount float not null ,
  date date not null ,
  academicyear varchar(255) not null ,
  comments varchar(255) not null ,
  es_installment int(11) not null ,
  fi_fromdate date not null ,
  fi_todate date not null ,
  PRIMARY KEY (es_feepaidid)
);

drop table if exists es_finance_master;
create table es_finance_master (
  es_finance_masterid int(11) not null auto_increment,
  fi_startdate date not null ,
  fi_enddate date not null ,
  fi_address text not null ,
  fi_currency varchar(255) not null ,
  fi_symbol varchar(255) not null ,
  fi_email varchar(255) not null ,
  fi_initialbalance float not null ,
  fi_phoneno varchar(255) not null ,
  fi_school_logo varchar(255) not null ,
  fi_website varchar(255) not null ,
  fi_ac_startdate date not null ,
  fi_ac_enddate date not null ,
  fi_schoolname varchar(255) not null ,
  fi_endclass varchar(255) not null ,
  PRIMARY KEY (es_finance_masterid)
);

drop table if exists es_groups;
create table es_groups (
  es_groupsid int(11) not null auto_increment,
  es_groupname varchar(255) not null ,
  es_grouporderby int(11) not null ,
  PRIMARY KEY (es_groupsid)
);

drop table if exists es_hostel_health;
create table es_hostel_health (
  es_hostel_healthid int(11) not null auto_increment,
  health_regno int(11) not null ,
  health_name varchar(255) not null ,
  health_class varchar(255) not null ,
  health_section varchar(255) not null ,
  health_problem varchar(255) not null ,
  health_doctorname varchar(255) not null ,
  health_address varchar(255) not null ,
  health_contactno int(11) not null ,
  health_prescription varchar(255) not null ,
  es_personid int(11) not null ,
  es_persontpe varchar(255) not null ,
  PRIMARY KEY (es_hostel_healthid)
);

drop table if exists es_hostel_item;
create table es_hostel_item (
  es_hostel_itemid int(11) not null auto_increment,
  hostel_itemno int(11) not null ,
  hostel_itemcode varchar(255) not null ,
  hostel_itemname varchar(255) not null ,
  hostel_itemtype varchar(255) not null ,
  hostel_itemqty int(11) not null ,
  es_hostelroomid int(11) not null ,
  PRIMARY KEY (es_hostel_itemid)
);

drop table if exists es_hostelbuld;
create table es_hostelbuld (
  es_hostelbuldid int(11) not null auto_increment,
  buld_name varchar(255) not null ,
  status enum('active','inactive') not null ,
  createdon date not null ,
  PRIMARY KEY (es_hostelbuldid)
);

drop table if exists es_hostelperson_item;
create table es_hostelperson_item (
  es_hostelperson_itemid int(11) not null auto_increment,
  hostelperson_itemno int(11) not null ,
  hostelperson_itemcode int(11) not null ,
  hostelperson_itemname varchar(255) not null ,
  hostelperson_itemtype varchar(255) not null ,
  hostelperson_itemqty int(11) not null ,
  es_personid int(11) not null ,
  hostelperson_itemissued datetime not null ,
  es_persontype varchar(255) not null ,
  PRIMARY KEY (es_hostelperson_itemid)
);

drop table if exists es_hostelroom;
create table es_hostelroom (
  es_hostelroomid int(11) not null auto_increment,
  room_type varchar(255) not null ,
  room_capacity int(11) not null ,
  room_vacancy int(11) not null ,
  room_no varchar(255) not null ,
  status enum('active','inactive') default 'active' not null ,
  buld_name varchar(255) not null ,
  es_hostelbuldid int(11) ,
  PRIMARY KEY (es_hostelroomid)
);

drop table if exists es_in_category;
create table es_in_category (
  es_in_categoryid int(11) not null auto_increment,
  in_category_name varchar(255) not null ,
  in_description varchar(255) not null ,
  status enum('active','inactive','deleted') not null ,
  PRIMARY KEY (es_in_categoryid)
);

drop table if exists es_in_goods_issue;
create table es_in_goods_issue (
  es_in_goods_issueid int(11) not null auto_increment,
  in_issue_date datetime not null ,
  in_issue_to varchar(255) not null ,
  in_inventory_id int(11) not null ,
  in_issued_items longtext not null ,
  in_returned_items longtext not null ,
  in_department_id int(11) not null ,
  in_issue_status enum('notreturned','partialreturned','returned') not null ,
  status enum('active','inactive','deleted') not null ,
  PRIMARY KEY (es_in_goods_issueid)
);

drop table if exists es_in_item_master;
create table es_in_item_master (
  es_in_item_masterid int(11) not null auto_increment,
  in_item_code varchar(255) not null ,
  in_item_name varchar(255) not null ,
  in_inventory_id int(11) not null ,
  in_category_id int(11) not null ,
  in_qty_available float not null ,
  in_reorder_level float not null ,
  in_quantity_issued float default '0' not null ,
  in_last_recieved_date datetime not null ,
  in_last_issued_date datetime not null ,
  status enum('active','inactive','deleted') default 'active' not null ,
  in_units varchar(255) not null ,
  PRIMARY KEY (es_in_item_masterid)
);

drop table if exists es_in_orders;
create table es_in_orders (
  es_in_ordersid int(11) not null auto_increment,
  in_suplier_name varchar(255) not null ,
  in_items_purchased longtext not null ,
  order_date datetime not null ,
  in_rec_note_no int(11) not null ,
  in_rec_date datetime not null ,
  in_rec_bill_no varchar(255) not null ,
  in_items_recieved longtext not null ,
  in_tot_amnt float not null ,
  in_ord_status enum('pending','complete') not null ,
  status enum('active','inactive','deleted') not null ,
  PRIMARY KEY (es_in_ordersid)
);

drop table if exists es_in_supplier_master;
create table es_in_supplier_master (
  es_in_supplier_masterid int(11) not null auto_increment,
  in_name varchar(255) not null ,
  in_address varchar(255) not null ,
  in_city varchar(255) not null ,
  in_state varchar(255) not null ,
  in_country varchar(255) not null ,
  in_office_no varchar(255) not null ,
  in_mobile_no varchar(255) not null ,
  in_email varchar(255) not null ,
  in_fax varchar(255) not null ,
  in_description varchar(255) not null ,
  status enum('active','inactive','deleted') not null ,
  PRIMARY KEY (es_in_supplier_masterid)
);

drop table if exists es_inventory;
create table es_inventory (
  es_inventoryid int(11) not null auto_increment,
  in_inventory_name varchar(255) not null ,
  in_short_name varchar(255) not null ,
  in_description varchar(255) not null ,
  status enum('active','inactive','deleted') default 'active' not null ,
  PRIMARY KEY (es_inventoryid)
);

drop table if exists es_issueloan;
create table es_issueloan (
  es_issueloanid int(11) not null auto_increment,
  es_staffid int(11) not null ,
  es_loanmasterid int(11) not null ,
  loan_intrestrate float not null ,
  loan_amount float not null ,
  loan_instalments int(11) not null ,
  deductionmonth date not null ,
  dud_amount float not null ,
  amountpaidtillnow float not null ,
  noofinstalmentscompleted int(11) not null ,
  PRIMARY KEY (es_issueloanid)
);

drop table if exists es_knowledge_articles;
create table es_knowledge_articles (
  es_knowledge_articlesid int(11) not null auto_increment,
  kb_category_id int(11) not null ,
  kb_article_name varchar(255) not null ,
  kb_article_desc text not null ,
  kb_article_date datetime not null ,
  status enum('active','inactive','deleted') not null ,
  kb_priority varchar(255) not null ,
  kb_views bigint(20) not null ,
  PRIMARY KEY (es_knowledge_articlesid)
);

drop table if exists es_knowledge_base;
create table es_knowledge_base (
  es_knowledge_baseid int(11) not null auto_increment,
  kb_category varchar(255) not null ,
  kb_description text not null ,
  kb_date datetime not null ,
  status enum('active','inactive','deleted') not null ,
  parent_id int(11) default '0' not null ,
  PRIMARY KEY (es_knowledge_baseid)
);

drop table if exists es_leaveleter;
create table es_leaveleter (
  es_leaveleterid int(11) not null auto_increment,
  leave_msg longtext not null ,
  PRIMARY KEY (es_leaveleterid)
);

drop table if exists es_leavemaster;
create table es_leavemaster (
  es_leavemasterid int(11) not null auto_increment,
  lev_post varchar(255) not null ,
  lev_type varchar(255) not null ,
  lev_leavescount varchar(255) not null ,
  lev_carryforward varchar(255) not null ,
  lev_days varchar(255) not null ,
  lev_enchashable varchar(255) not null ,
  lev_dept varchar(255) not null ,
  lev_from_date date not null ,
  lev_to_date date not null ,
  PRIMARY KEY (es_leavemasterid)
);

drop table if exists es_ledger;
create table es_ledger (
  es_ledgerid int(11) not null auto_increment,
  lg_name varchar(255) not null ,
  lg_groupname varchar(255) not null ,
  lg_openingbalance float not null ,
  lg_createdon date not null ,
  lg_amounttype varchar(255) not null ,
  PRIMARY KEY (es_ledgerid)
);

drop table if exists es_libaraypublisher;
create table es_libaraypublisher (
  es_libaraypublisherid int(11) not null auto_increment,
  library_publishername varchar(255) not null ,
  library_pulisheradress varchar(255) not null ,
  library_city varchar(255) not null ,
  libaray_state varchar(255) not null ,
  libarary_country varchar(255) not null ,
  libaray_phoneno varchar(255) not null ,
  librray_mobileno varchar(255) not null ,
  library_fax varchar(255) not null ,
  libarary_email varchar(255) not null ,
  libarary_aditinalinformation varchar(255) not null ,
  status enum('active','inactive') not null ,
  PRIMARY KEY (es_libaraypublisherid)
);

drop table if exists es_libbook;
create table es_libbook (
  es_libbookid int(11) not null auto_increment,
  lbook_dateofpurchase date not null ,
  lbook_aceesnofrom int(11) not null ,
  lbook_accessnoto int(11) not null ,
  lbook_bookfromno int(11) not null ,
  lbook_booktono int(11) not null ,
  lbook_author varchar(255) not null ,
  lbook_title varchar(255) not null ,
  lbook_publishername varchar(255) not null ,
  lbook_publisherplace varchar(255) not null ,
  lbook_booksubject varchar(255) not null ,
  lbook_bookedition varchar(255) not null ,
  lbook_year varchar(255) not null ,
  lbook_cost varchar(255) not null ,
  lbook_sourse varchar(255) not null ,
  lbook_aditinalbookinfo varchar(255) not null ,
  lbook_bookstatus varchar(255) not null ,
  lbook_category varchar(255) not null ,
  lbook_class varchar(255) not null ,
  lbook_booksubcategory varchar(255) not null ,
  lbook_ref varchar(255) not null ,
  lbook_statusstatus varchar(255) not null ,
  lbook_pages varchar(255) not null ,
  lbook_volume varchar(255) not null ,
  lbook_bilnumber varchar(255) not null ,
  status enum('active','inactive') not null ,
  issuestatus enum('issued','notissued') not null ,
  PRIMARY KEY (es_libbookid)
);

drop table if exists es_libbookfinedet;
create table es_libbookfinedet (
  es_libbookfinedetid int(11) not null auto_increment,
  es_libbooksid varchar(255) not null ,
  es_libbookbwid varchar(255) not null ,
  es_libbookfine varchar(255) not null ,
  es_libbookdate varchar(255) not null ,
  es_type varchar(255) not null ,
  status enum('active','inactive') default 'active' not null ,
  es_issuetype varchar(255) not null ,
  PRIMARY KEY (es_libbookfinedetid)
);


drop table if exists es_libfine;
create table es_libfine (
  es_libfineid int(11) not null auto_increment,
  es_libfinenoofdays varchar(255) not null ,
  es_libfineamount varchar(255) not null ,
  es_libfineduration varchar(255) not null ,
  es_libfinefor varchar(255) not null ,
  status enum('active','inactive') default 'active' not null ,
  PRIMARY KEY (es_libfineid)
);

drop table if exists es_libstaffadd;
create table es_libstaffadd (
  es_libstaffaddid int(11) not null auto_increment,
  staffadd_id int(11) not null ,
  staffadd_name varchar(255) not null ,
  staffadd_sex varchar(255) not null ,
  staffadd_qulification varchar(255) not null ,
  staffadd_adress varchar(255) not null ,
  staffadd_phone varchar(255) not null ,
  staffadd_subject varchar(255) not null ,
  staffadd_designation varchar(255) not null ,
  staffadd_deaprtment varchar(255) not null ,
  staffadd_addtinalinfo varchar(255) not null ,
  staffadd_issuedfromdate date not null ,
  staffadd_issuedtodate date not null ,
  staffadd_status enum('active','inactive') not null ,
  PRIMARY KEY (es_libstaffaddid)
);

drop table if exists es_libstudentadd;
create table es_libstudentadd (
  es_libstudentaddid int(11) not null auto_increment,
  student_id int(11) not null ,
  student_name varchar(255) not null ,
  student_sex varchar(255) not null ,
  student_fathername varchar(255) not null ,
  student_classname varchar(255) not null ,
  student_section varchar(255) not null ,
  student_adress varchar(255) not null ,
  student_phoneno varchar(255) not null ,
  student_aditinalinfo varchar(255) not null ,
  student_issuedfrom varchar(255) not null ,
  student_issuedto varchar(255) not null ,
  status varchar(255) not null ,
  PRIMARY KEY (es_libstudentaddid)
);

drop table if exists es_loanmaster;
create table es_loanmaster (
  es_loanmasterid int(11) not null auto_increment,
  loan_post varchar(255) not null ,
  loan_type varchar(255) not null ,
  loan_name varchar(255) not null ,
  loan_fromdate date not null ,
  loan_todate date not null ,
  loan_intrestrate varchar(255) not null ,
  loan_maxlimit varchar(255) not null ,
  loan_dept varchar(255) not null ,
  PRIMARY KEY (es_loanmasterid)
);

drop table if exists es_loanpayment;
create table es_loanpayment (
  es_loanpaymentid int(11) not null auto_increment,
  es_issueloanid int(11) not null ,
  inst_amount float not null ,
  onmonth date not null ,
  PRIMARY KEY (es_loanpaymentid)
);

drop table if exists es_marks;
create table es_marks (
  es_marksid int(11) not null auto_increment,
  es_examdetailsid int(11) not null ,
  es_marksstudentid int(11) not null ,
  es_marksobtined int(11) default '0' not null ,
  status enum('active','inactive') default 'active' not null ,
  PRIMARY KEY (es_marksid)
);

drop table if exists es_notice;
create table es_notice (
  es_noticeid int(11) not null auto_increment,
  es_title varchar(255) not null ,
  es_message longtext not null ,
  es_date date not null ,
  es_subject varchar(255) not null ,
  PRIMARY KEY (es_noticeid)
);

drop table if exists es_offerletter;
create table es_offerletter (
  es_offerletterid int(11) not null auto_increment,
  ofr_message longtext not null ,
  PRIMARY KEY (es_offerletterid)
);

drop table if exists es_payslipdetails;
create table es_payslipdetails (
  es_payslipdetailsid int(11) not null auto_increment,
  staff_id int(11) not null ,
  pay_month date not null ,
  basic_salary float not null ,
  tot_allowance float not null ,
  tot_deductions float not null ,
  net_salary float not null ,
  PRIMARY KEY (es_payslipdetailsid)
);

drop table if exists es_pfmaster;
create table es_pfmaster (
  es_pfmasterid int(11) not null auto_increment,
  pf_post varchar(255) not null ,
  pf_empcont float not null ,
  pf_empconttype varchar(255) not null ,
  pf_empycont float not null ,
  pf_empyconttype varchar(255) not null ,
  pf_dept varchar(255) not null ,
  pf_from_date date not null ,
  pf_to_date date not null ,
  PRIMARY KEY (es_pfmasterid)
);

drop table if exists es_preadmission;
create table es_preadmission (
  es_preadmissionid int(11) not null auto_increment,
  pre_serialno varchar(255) not null ,
  pre_student_username varchar(255) not null ,
  pre_student_password varchar(255) not null ,
  pre_dateofbirth date not null ,
  pre_fathername varchar(255) not null ,
  pre_mothername varchar(255) not null ,
  pre_fathersoccupation varchar(255) not null ,
  pre_motheroccupation varchar(255) not null ,
  pre_contactname1 varchar(255) not null ,
  pre_contactno1 varchar(255) not null ,
  pre_contactno2 varchar(255) not null ,
  pre_contactname2 varchar(255) not null ,
  pre_address1 varchar(255) not null ,
  pre_city1 varchar(255) not null ,
  pre_state1 varchar(255) not null ,
  pre_country1 varchar(255) not null ,
  pre_phno1 varchar(255) not null ,
  pre_mobile1 varchar(255) not null ,
  pre_prev_acadamicname varchar(255) not null ,
  pre_prev_class varchar(255) not null ,
  pre_prev_university varchar(255) not null ,
  pre_prev_percentage varchar(255) not null ,
  pre_prev_tcno varchar(255) not null ,
  pre_current_acadamicname varchar(255) not null ,
  pre_current_class1 varchar(255) not null ,
  pre_current_percentage1 varchar(255) not null ,
  pre_current_result1 varchar(255) not null ,
  pre_current_class2 varchar(255) not null ,
  pre_current_percentage2 varchar(255) not null ,
  pre_current_result2 varchar(255) not null ,
  pre_current_class3 varchar(255) not null ,
  pre_current_percentage3 varchar(255) not null ,
  pre_current_result3 varchar(255) not null ,
  pre_physical_details varchar(255) not null ,
  pre_height varchar(255) not null ,
  pre_weight varchar(255) not null ,
  pre_alerge varchar(255) not null ,
  pre_physical_status varchar(255) not null ,
  pre_special_care varchar(255) not null ,
  pre_class varchar(255) not null ,
  pre_sec varchar(255) not null ,
  pre_name varchar(255) not null ,
  pre_age int(11) not null ,
  pre_address varchar(255) not null ,
  pre_city varchar(255) not null ,
  pre_state varchar(255) not null ,
  pre_country varchar(255) not null ,
  pre_phno varchar(255) not null ,
  pre_mobile varchar(255) not null ,
  pre_resno varchar(255) not null ,
  pre_resno1 varchar(255) not null ,
  pre_image varchar(255) not null ,
  test1 varchar(255) not null ,
  test2 varchar(255) not null ,
  test3 int(11) not null ,
  pre_pincode1 varchar(255) not null ,
  pre_pincode varchar(255) not null ,
  pre_emailid varchar(255) not null ,
  pre_fromdate date not null ,
  pre_todate date not null ,
  status enum('pass','fail','resultawaiting','inactive') not null ,
  pre_status enum('inactive','active') not null ,
  es_user_theme varchar(255) not null ,
  pre_hobbies varchar(255) not null ,
  pre_blood_group varchar(255) not null ,
  pre_gender enum('male','female') not null ,
  PRIMARY KEY (es_preadmissionid)
);

drop table if exists es_preadmission_details;
create table es_preadmission_details (
  es_preadmission_detailsid int(11) not null auto_increment,
  es_preadmissionid int(11) not null ,
  pre_class varchar(255) not null ,
  pre_fromdate date not null ,
  pre_todate date not null ,
  status enum('pass','fail','resultawaiting','inactive') not null ,
  PRIMARY KEY (es_preadmission_detailsid)
);

drop table if exists es_receipt;
create table es_receipt (
  es_receiptid int(11) not null auto_increment,
  es_receiptname varchar(255) not null ,
  PRIMARY KEY (es_receiptid)
);

drop table if exists es_requirement;
create table es_requirement (
  es_requirementid int(11) not null auto_increment,
  es_post varchar(255) not null ,
  es_depatname varchar(255) not null ,
  es_qualification varchar(255) not null ,
  es_experience varchar(255) not null ,
  es_noofpositions int(11) not null ,
  es_date_posteddate date not null ,
  status enum('active','inactive','deleted') default 'active' not null ,
  PRIMARY KEY (es_requirementid)
);

drop table if exists es_resignation;
create table es_resignation (
  es_resignationid int(11) not null auto_increment,
  res_letter longtext not null ,
  PRIMARY KEY (es_resignationid)
);

drop table if exists es_roomallotment;
create table es_roomallotment (
  es_roomallotmentid int(11) not null auto_increment,
  es_hostelroomid int(11) not null ,
  es_personid int(11) not null ,
  es_persontype varchar(255) not null ,
  PRIMARY KEY (es_roomallotmentid)
);

drop table if exists es_schooltimings;
create table es_schooltimings (
  es_schooltimingsid int(11) not null auto_increment,
  es_startfrom varchar(255) not null ,
  es_endto varchar(255) not null ,
  es_breakfrom varchar(255) not null ,
  es_breakto varchar(255) not null ,
  es_lunchfrom varchar(255) not null ,
  es_lunchto varchar(255) not null ,
  es_periodduration varchar(255) not null ,
  PRIMARY KEY (es_schooltimingsid)
);

drop table if exists es_security;
create table es_security (
  es_securityid int(11) not null auto_increment,
  sec_name varchar(255) not null ,
  sec_address varchar(255) not null ,
  sec_contact_person varchar(255) not null ,
  sec_vehicle_no varchar(255) not null ,
  sec_purpose varchar(255) not null ,
  sec_mode_app varchar(255) not null ,
  sec_time_out datetime not null ,
  sec_remarks varchar(255) not null ,
  status enum('active','inactive','deleted') not null ,
  sec_time_in datetime not null ,
  sec_colour varchar(255) not null ,
  sec_make_vehicle varchar(255) not null ,
  sec_reg_no varchar(255) not null ,
  PRIMARY KEY (es_securityid)
);

drop table if exists es_shortlisted;
create table es_shortlisted (
  es_shortlistedid int(11) not null auto_increment,
  stl_message longtext not null ,
  PRIMARY KEY (es_shortlistedid)
);

drop table if exists es_staff;
create table es_staff (
  es_staffid int(11) not null auto_increment,
  st_postaplied varchar(255) not null ,
  st_firstname varchar(255) not null ,
  st_lastname varchar(255) not null ,
  st_gender varchar(255) not null ,
  st_dob varchar(255) not null ,
  st_primarysubject varchar(255) not null ,
  st_fatherhusname varchar(255) not null ,
  st_noofdughters int(11) not null ,
  st_noofsons int(11) not null ,
  st_email varchar(255) not null ,
  st_mobilenocomunication varchar(255) not null ,
  st_examp1 varchar(255) not null ,
  st_examp2 varchar(255) not null ,
  st_examp3 varchar(255) not null ,
  st_borduniversity1 varchar(255) not null ,
  st_borduniversity2 varchar(255) not null ,
  st_borduniversity3 varchar(255) not null ,
  st_year1 varchar(255) not null ,
  st_year2 varchar(255) not null ,
  st_year3 varchar(255) not null ,
  st_insititute1 varchar(255) not null ,
  st_insititute2 varchar(255) not null ,
  st_insititute3 varchar(255) not null ,
  st_position1 varchar(255) not null ,
  st_position2 varchar(255) not null ,
  st_position3 varchar(255) not null ,
  st_period1 varchar(255) not null ,
  st_period2 varchar(255) not null ,
  st_period3 varchar(255) not null ,
  st_pradress varchar(255) not null ,
  st_prcity varchar(255) not null ,
  st_prpincode varchar(255) not null ,
  st_prphonecode varchar(255) not null ,
  st_prstate varchar(255) not null ,
  st_prresino varchar(255) not null ,
  st_prcountry varchar(255) not null ,
  st_prmobno varchar(255) not null ,
  st_peadress varchar(255) not null ,
  st_pecity varchar(255) not null ,
  st_pepincode varchar(255) not null ,
  st_pephoneno varchar(255) not null ,
  st_pestate varchar(255) not null ,
  st_peresino varchar(255) not null ,
  st_pecountry varchar(255) not null ,
  st_pemobileno varchar(255) not null ,
  st_refposname1 varchar(255) not null ,
  st_refposname2 varchar(255) not null ,
  st_refposname3 varchar(255) not null ,
  st_refdesignation1 varchar(255) not null ,
  st_refdesignation2 varchar(255) not null ,
  st_refdesignation3 varchar(255) not null ,
  st_refinsititute1 varchar(255) not null ,
  st_refinsititute2 varchar(255) not null ,
  st_refinsititute3 varchar(255) not null ,
  st_refemail1 varchar(255) not null ,
  st_refemail2 varchar(255) not null ,
  st_refemail3 varchar(255) not null ,
  st_writentest varchar(255) not null ,
  st_technicalinterview varchar(255) not null ,
  st_finalinterview varchar(255) not null ,
  status enum('selected','notselected','onhold','added','dismisied') not null ,
  st_perviouspackage varchar(255) not null ,
  st_basic varchar(255) not null ,
  st_dateofjoining varchar(255) not null ,
  st_post varchar(255) not null ,
  st_department varchar(255) not null ,
  st_remarks varchar(255) not null ,
  intdate date not null ,
  image varchar(255) not null ,
  selstatus enum('issued','notissued','accepted','notaccepted') not null ,
  tcstatus enum('notissued','issued') not null ,
  st_username varchar(255) not null ,
  st_password varchar(255) not null ,
  st_theme varchar(255) not null ,
  st_class varchar(255) not null ,
  st_subject varchar(255) not null ,
  st_qualification varchar(255) not null ,
  PRIMARY KEY (es_staffid)
);

drop table if exists es_subcategory;
create table es_subcategory (
  es_subcategoryid int(11) not null auto_increment,
  subcat_catname int(11) not null ,
  subcat_scatname varchar(255) not null ,
  subcat_scatdesc longtext not null ,
  subcat_status enum('active','inactive') not null ,
  PRIMARY KEY (es_subcategoryid)
);

drop table if exists es_subject;
create table es_subject (
  es_subjectid int(11) not null auto_increment,
  es_subjectname varchar(255) not null ,
  es_subjectcode varchar(255) not null ,
  es_subjectshortname varchar(255) not null ,
  PRIMARY KEY (es_subjectid)
);

drop table if exists es_taxmaster;
create table es_taxmaster (
  es_taxmasterid int(11) not null auto_increment,
  tax_name varchar(255) not null ,
  tax_percentage_type varchar(255) not null ,
  tax_to varchar(255) not null ,
  tax_from varchar(255) not null ,
  tax_rate varchar(255) not null ,
  tax_from_date date not null ,
  tax_to_date date not null ,
  PRIMARY KEY (es_taxmasterid)
);

drop table if exists es_tcmaster;
create table es_tcmaster (
  es_tcmasterid int(11) not null auto_increment,
  tcm_description longtext not null ,
  PRIMARY KEY (es_tcmasterid)
);

drop table if exists es_tcstudent;
create table es_tcstudent (
  es_tcstudentid int(11) not null auto_increment,
  tcm_description longtext not null ,
  PRIMARY KEY (es_tcstudentid)
);

drop table if exists es_timetable;
create table es_timetable (
  es_timetableid int(11) not null auto_increment,
  es_class varchar(255) not null ,
  es_m1 varchar(255) not null ,
  es_m2 varchar(255) not null ,
  es_m3 varchar(255) not null ,
  es_m4 varchar(255) not null ,
  es_m5 varchar(255) not null ,
  es_m6 varchar(255) not null ,
  es_m7 varchar(255) not null ,
  es_m8 varchar(255) not null ,
  es_m9 varchar(255) not null ,
  es_subject varchar(255) not null ,
  es_staffid varchar(255) not null ,
  es_t1 varchar(255) not null ,
  es_t2 varchar(255) not null ,
  es_t3 varchar(255) not null ,
  es_t4 varchar(255) not null ,
  es_t5 varchar(255) not null ,
  es_t6 varchar(255) not null ,
  es_t7 varchar(255) not null ,
  es_t8 varchar(255) not null ,
  es_t9 varchar(255) not null ,
  es_w1 varchar(255) not null ,
  es_w2 varchar(255) not null ,
  es_w3 varchar(255) not null ,
  es_w4 varchar(255) not null ,
  es_w5 varchar(255) not null ,
  es_w6 varchar(255) not null ,
  es_w7 varchar(255) not null ,
  es_w8 varchar(255) not null ,
  es_w9 varchar(255) not null ,
  es_th1 varchar(255) not null ,
  es_th2 varchar(255) not null ,
  es_th3 varchar(255) not null ,
  es_th4 varchar(255) not null ,
  es_th5 varchar(255) not null ,
  es_th6 varchar(255) not null ,
  es_th7 varchar(255) not null ,
  es_th8 varchar(255) not null ,
  es_th9 varchar(255) not null ,
  es_f1 varchar(255) not null ,
  es_f2 varchar(255) not null ,
  es_f3 varchar(255) not null ,
  es_f4 varchar(255) not null ,
  es_f5 varchar(255) not null ,
  es_f6 varchar(255) not null ,
  es_f7 varchar(255) not null ,
  es_f8 varchar(255) not null ,
  es_f9 varchar(255) not null ,
  es_s1 varchar(255) not null ,
  es_s2 varchar(255) not null ,
  es_s3 varchar(255) not null ,
  es_s4 varchar(255) not null ,
  es_s5 varchar(255) not null ,
  es_s6 varchar(255) not null ,
  es_s7 varchar(255) not null ,
  es_s8 varchar(255) not null ,
  es_s9 varchar(255) not null ,
  es_startfrom time default '09:00:00' ,
  es_endto int(11) default '9' ,
  es_breakfrom int(11) default '20' ,
  es_breakto int(11) default '1' ,
  es_lunchfrom int(11) default '20' ,
  es_lunchto int(11) default '2' ,
  es_duration int(11) default '45' not null ,
  PRIMARY KEY (es_timetableid)
);

drop table if exists es_timetablemaster;
create table es_timetablemaster (
  es_timetablemasterid int(11) not null auto_increment,
  es_class varchar(255) not null ,
  es_staffid varchar(255) not null ,
  es_subject varchar(255) not null ,
  es_teachername varchar(255) not null ,
  PRIMARY KEY (es_timetablemasterid)
);

drop table if exists es_transport;
create table es_transport (
  es_transportid int(11) not null auto_increment,
  tr_transport_type enum('bus','Car(Manual)','Car(Auto)','coach','minibus','van','other') not null ,
  tr_purchase_date datetime not null ,
  tr_transport_no varchar(255) not null ,
  tr_transport_name varchar(255) not null ,
  tr_vehicle_no varchar(255) not null ,
  tr_insurance_date datetime not null ,
  tr_ins_renewal_date datetime not null ,
  tr_seating_capacity int(11) not null ,
  tr_route varchar(255) not null ,
  tr_route_from varchar(255) not null ,
  tr_route_to varchar(255) not null ,
  tr_route_via varchar(255) not null ,
  status enum('active','inactive','deleted') not null ,
  PRIMARY KEY (es_transportid)
);

drop table if exists es_transport_maintenance;
create table es_transport_maintenance (
  es_transport_maintenanceid int(11) not null auto_increment,
  tr_transportid varchar(255) not null ,
  tr_maintenance_type varchar(255) not null ,
  tr_date_of_maintenance datetime not null ,
  tr_amount_paid float not null ,
  tr_remarks varchar(255) not null ,
  status enum('active','inactive','deleted') not null ,
  tr_transportno varchar(255) not null ,
  tr_transportname varchar(255) not null ,
  PRIMARY KEY (es_transport_maintenanceid)
);

drop table if exists es_voucher;
create table es_voucher (
  es_voucherid int(11) not null auto_increment,
  voucher_type varchar(255) not null ,
  voucher_mode varchar(255) not null ,
  PRIMARY KEY (es_voucherid)
);

drop table if exists es_voucherentry;
create table es_voucherentry (
  es_voucherentryid int(11) not null auto_increment,
  es_vouchertype varchar(255) not null ,
  es_receiptno varchar(255) not null ,
  es_receiptdate date not null ,
  es_paymentmode varchar(255) not null ,
  es_bankacc varchar(255) not null ,
  es_particulars varchar(255) not null ,
  es_amount double not null ,
  es_narration longtext not null ,
  es_vouchermode varchar(255) not null ,
  es_checkno varchar(255) not null ,
  es_teller_number bigint(20) not null ,
  es_bank_pin bigint(20) not null ,
  es_bank_name varchar(255) not null ,
  ve_fromfinance date not null ,
  ve_tofinance date not null ,
  PRIMARY KEY (es_voucherentryid)
);

drop table if exists smartschool_content;
create table smartschool_content (
  page_id int(11) not null auto_increment,
  title varchar(100) not null ,
  left_text text not null ,
  top_text text not null ,
  PRIMARY KEY (page_id)
);

