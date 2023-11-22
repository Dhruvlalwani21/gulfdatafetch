#!/bin/sh
/usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/fetch_rin.php cron:run 2>&1 | mail -s "Fetch_rin" adebayoishola01@gmail.com