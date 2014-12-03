ALTER TABLE ts_essay ADD category_id BIGINT(20) DEFAULT NULL AFTER content;

/* essay */
DROP TABLE ts_essay;
\. essay.sql
RENAME TABLE essay TO ts_essay;
ALTER TABLE ts_essay ADD status_n int(1) DEFAULT NULL AFTER status;
UPDATE ts_essay SET status_n = 1 WHERE (status = 'draft');
UPDATE ts_essay SET status_n = 2 WHERE (status = 'private');
UPDATE ts_essay SET status_n = 3 WHERE (status = 'publish');
ALTER TABLE ts_essay DROP COLUMN status;
ALTER TABLE ts_essay CHANGE status_n status int(1) DEFAULT NULL;

/* category */
DROP TABLE ts_category;
\. category.sql
RENAME TABLE essay_categories TO ts_category;
ALTER TABLE ts_category CHANGE cat_id id INT(4) unsigned NOT NULL auto_increment;
ALTER TABLE ts_category CHANGE cat_name name VARCHAR(40) DEFAULT NULL;
ALTER TABLE ts_category CHANGE cat_slug slug VARCHAR(40) DEFAULT NULL;

/* label */
DROP TABLE ts_label;
\. tag.sql
RENAME TABLE essay_tags TO ts_label;
ALTER TABLE ts_label CHANGE tag_id id BIGINT(20) unsigned NOT NULL auto_increment;
ALTER TABLE ts_label CHANGE tag_name name VARCHAR(200) DEFAULT NULL;

/* essay category mapping */
DROP TABLE ts_essay_category;
\. essay2cat.sql
RENAME TABLE essay2cat TO ts_essay_category;
ALTER TABLE ts_essay_category CHANGE rel_id id BIGINT(20) unsigned NOT NULL auto_increment;

/* essay label mapping */
\. essay2tag.sql
RENAME TABLE essay2tag TO ts_essay_label;
ALTER TABLE ts_essay_label CHANGE rel_id id BIGINT(20) unsigned NOT NULL auto_increment;

