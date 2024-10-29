insert into loan_settings(setting_name,setting_value,created_on,modified_on,modified_by) values('loan_amount','2500000',datetime(),datetime(),'vinay');
insert into loan_settings(setting_name,setting_value,created_on,modified_on,modified_by) values('tenure','25',datetime(),datetime(),'vinay');
insert into loan_settings(setting_name,setting_value,created_on,modified_on,modified_by) values('interest_rate','9.06',datetime(),datetime(),'vinay');

select setting_name,setting_value from loan_settings where setting_name = 'tenure' order by modified_on limit 0,1

