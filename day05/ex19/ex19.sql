SELECT ABS(DATEDIFF(LEAST(MIN(date_last_film),MIN(date )),
GREATEST(MAX(date_last_film),MAX(date )))) AS ‘uptime’
FROM member_history, member;
