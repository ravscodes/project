-- noinspection SqlDialectInspectionForFile

-- noinspection SqlNoDataSourceInspectionForFile

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_cranetype'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_cranetype (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

  id varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	salesforcetitle varchar(255) DEFAULT '' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	icon int(11) unsigned NOT NULL default '0',
	constructiontype int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_constructiontype'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_constructiontype (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	id varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	icon int(11) unsigned NOT NULL default '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_cranetype_ctype'
#
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_cranetype_ctype (
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);


#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_industry'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_industry (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	image int(11) unsigned NOT NULL default '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_classification'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_classification (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_inquirystep1'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_inquirystep1 (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

  cranetype int(11) unsigned DEFAULT '0' NOT NULL,
	constructiontype int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_inquirystep2'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_inquirystep2 (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

  industry int(11) unsigned DEFAULT '0' NOT NULL,
	customindustry varchar(255) DEFAULT '' NOT NULL,
	purpose varchar(255) DEFAULT '' NOT NULL,
	classification int(11) unsigned DEFAULT '0' NOT NULL,
	containeramount varchar(255) DEFAULT '' NOT NULL,
	containerunit varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_inquirystep3'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_inquirystep3 (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

  payloadmin double DEFAULT 0 NOT NULL,
  payloadmax double DEFAULT 0 NOT NULL,
  gaugemin double DEFAULT 0 NOT NULL,
  gaugemax double DEFAULT 0 NOT NULL,
  reachmin double DEFAULT 0 NOT NULL,
  reachmax double DEFAULT 0 NOT NULL,
  reachsolidsupportmin double DEFAULT 0 NOT NULL,
  reachsolidsupportmax double DEFAULT 0 NOT NULL,
  reachstabilizermin double DEFAULT 0 NOT NULL,
  reachstabilizermax double DEFAULT 0 NOT NULL,
  payloadandreach1 double DEFAULT 0 NOT NULL,
  payloadandreach2 double DEFAULT 0 NOT NULL,
  payloadandreach3 double DEFAULT 0 NOT NULL,
  payloadandreach4 double DEFAULT 0 NOT NULL,
  reachassembly tinyint(4) DEFAULT '0' NOT NULL,
  liftheight double DEFAULT 0 NOT NULL,
  liftheightabove varchar(255) DEFAULT '' NOT NULL,
  liftheightbelow double DEFAULT 0 NOT NULL,
  workingspeed varchar(255) DEFAULT '' NOT NULL,
  workingspeedliftinggear varchar(255) DEFAULT '' NOT NULL,
  workingspeedcatgear varchar(255) DEFAULT '' NOT NULL,
  workingspeedcranegear varchar(255) DEFAULT '' NOT NULL,
  rotatingtrolley tinyint(4) DEFAULT '0' NOT NULL,
  rotatingspreader tinyint(4) DEFAULT '0' NOT NULL,
  steering tinyint(4) DEFAULT '0' NOT NULL,
  hookpath double DEFAULT 0 NOT NULL,
  installationheight double DEFAULT 0 NOT NULL,
  operationarea varchar(255) DEFAULT '' NOT NULL,
  rails varchar(255) DEFAULT '' NOT NULL,
  hall varchar(255) DEFAULT '' NOT NULL,
  conductorrail varchar(255) DEFAULT '' NOT NULL,
  track varchar(255) DEFAULT '' NOT NULL,
  tracktype varchar(255) DEFAULT '' NOT NULL,
  tracksupportdistance double DEFAULT 0 NOT NULL,
  tracklengthexisting double DEFAULT 0 NOT NULL,
  tracklengthplanned double DEFAULT 0 NOT NULL,
  trackinfo varchar(255) DEFAULT '' NOT NULL,
  loadhandlingdevice tinyint(4) DEFAULT '0' NOT NULL,
  loadhandlingdevicegrab tinyint(4) DEFAULT '0' NOT NULL,
  loadhandlingdeviceinfo varchar(255) DEFAULT '' NOT NULL,
  projectphase varchar(255) DEFAULT '' NOT NULL,
  commissioningdate int(11) unsigned DEFAULT '0' NOT NULL,
  projectinformation text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_inquirystep4'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_inquirystep4 (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

  company varchar(255) DEFAULT '' NOT NULL,
  position int(11) unsigned DEFAULT '0' NOT NULL,
  firstname varchar(255) DEFAULT '' NOT NULL,
  lastname varchar(255) DEFAULT '' NOT NULL,
	address varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	country int(11) unsigned DEFAULT '0' NOT NULL,
	phone varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
  privacy tinyint(4) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_teichmanncraneconfigurator_domain_model_inquiry'
#
CREATE TABLE tx_teichmanncraneconfigurator_domain_model_inquiry (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

  cranetype int(11) unsigned DEFAULT '0' NOT NULL,
  constructiontype int(11) unsigned DEFAULT '0' NOT NULL,

  industry int(11) unsigned DEFAULT '0' NOT NULL,
	customindustry varchar(255) DEFAULT '' NOT NULL,
	purpose varchar(255) DEFAULT '' NOT NULL,
	classification int(11) unsigned DEFAULT '0' NOT NULL,
	containeramount varchar(255) DEFAULT '' NOT NULL,
	containerunit varchar(255) DEFAULT '' NOT NULL,

	payloadmin double DEFAULT 0 NOT NULL,
  payloadmax double DEFAULT 0 NOT NULL,
  gaugemin double DEFAULT 0 NOT NULL,
  gaugemax double DEFAULT 0 NOT NULL,
  reachmin double DEFAULT 0 NOT NULL,
  reachmax double DEFAULT 0 NOT NULL,
  reachsolidsupportmin double DEFAULT 0 NOT NULL,
  reachsolidsupportmax double DEFAULT 0 NOT NULL,
  reachstabilizermin double DEFAULT 0 NOT NULL,
  reachstabilizermax double DEFAULT 0 NOT NULL,
  reachassembly tinyint(4) DEFAULT '0' NOT NULL,
  liftheight double DEFAULT 0 NOT NULL,
  liftheightabove varchar(255) DEFAULT '' NOT NULL,
  liftheightbelow double DEFAULT 0 NOT NULL,
  workingspeed varchar(255) DEFAULT '' NOT NULL,
  workingspeedliftinggear varchar(255) DEFAULT '' NOT NULL,
  workingspeedcatgear varchar(255) DEFAULT '' NOT NULL,
  workingspeedcranegear varchar(255) DEFAULT '' NOT NULL,
  rotatingtrolley tinyint(4) DEFAULT '0' NOT NULL,
  rotatingspreader tinyint(4) DEFAULT '0' NOT NULL,
  steering tinyint(4) DEFAULT '0' NOT NULL,
  hookpath double DEFAULT 0 NOT NULL,
  installationheight double DEFAULT 0 NOT NULL,
  operationarea varchar(255) DEFAULT '' NOT NULL,
  rails varchar(255) DEFAULT '' NOT NULL,
  hall varchar(255) DEFAULT '' NOT NULL,
  conductorrail varchar(255) DEFAULT '' NOT NULL,
  track varchar(255) DEFAULT '' NOT NULL,
  tracklengthexisting double DEFAULT 0 NOT NULL,
  tracklengthplanned double DEFAULT 0 NOT NULL,
  trackinfo varchar(255) DEFAULT '' NOT NULL,
  loadhandlingdevice tinyint(4) DEFAULT '0' NOT NULL,
  loadhandlingdevicegrab tinyint(4) DEFAULT '0' NOT NULL,
  loadhandlingdeviceinfo varchar(255) DEFAULT '' NOT NULL,
  projectphase varchar(255) DEFAULT '' NOT NULL,
  commissioningdate int(11) unsigned DEFAULT '0' NOT NULL,
  projectinformation text NOT NULL,

	company varchar(255) DEFAULT '' NOT NULL,
  position int(11) unsigned DEFAULT '0' NOT NULL,
  lastname varchar(255) DEFAULT '' NOT NULL,
	firstname varchar(255) DEFAULT '' NOT NULL,
	address varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	country int(11) unsigned DEFAULT '0' NOT NULL,
	phone varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	privacy tinyint(4) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);
