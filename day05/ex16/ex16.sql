SELECT COUNT(*) AS 'movies'
FROM member_history
WHERE ((member_history.date BETWEEN '2006-10-30' AND '2007-07-27')
OR (EXTRACT(MONTH FROM member_history.date) = '12'
AND EXTRACT(DAY FROM member_history.date) = '24'));
