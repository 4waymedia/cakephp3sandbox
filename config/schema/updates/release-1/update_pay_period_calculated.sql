#AH-1 pay periods
# Change calculated Default to all NULL
ALTER TABLE pay_periods
MODIFY COLUMN `calculated` date DEFAULT NULL;

ALTER TABLE pay_periods
ADD COLUMN `job_payments` int(11) DEFAULT 0;