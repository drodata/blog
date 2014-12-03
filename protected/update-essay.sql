ALTER TABLE ts_essay ADD is_lock TINYINT(1) DEFAULT NULL AFTER status;
UPDATE ts_essay SET is_lock = 1;
