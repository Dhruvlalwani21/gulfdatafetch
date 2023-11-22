#!/bin/sh

# Change to the directory where your PHP files are located
cd /kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/

# List all PHP files in the directory and execute them one by one
for file in *.php; do
    /usr/bin/php "$file" cron:run >/dev/null 2>&1
done
