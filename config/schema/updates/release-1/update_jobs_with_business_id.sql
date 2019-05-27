# add Business ID to jobs, pay_periods, payments, contractor_payments, accounts, account_payments
ALTER TABLE jobs
ADD COLUMN `business_id` int(11) NOT NULL;

ALTER TABLE pay_periods
ADD COLUMN `business_id` int(11) NOT NULL;

ALTER TABLE payments
ADD COLUMN `business_id` int(11) NOT NULL;

ALTER TABLE contractor_payments
ADD COLUMN `business_id` int(11) NOT NULL;

ALTER TABLE accounts
ADD COLUMN `business_id` int(11) NOT NULL;

ALTER TABLE account_payments
ADD COLUMN `business_id` int(11) NOT NULL;