# Add payment flag to the jobs table
ALTER TABLE jobs
ADD COLUMN `ah_paid` bool DEFAULT 0;