# Add the PayPeriod to the account_payments table
ALTER TABLE account_payments
ADD COLUMN `pay_period_id` int(11) NOT NULL;