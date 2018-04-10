SELECT UCASE(user_card.last_name) AS 'NAME', first_name, price
FROM user_card
JOIN member ON member.id_user_card = user_card.id_user
JOIN subscription ON member.id_sub = subscription.id_sub
WHERE subscription.price > 42
ORDER BY user_card.last_name, first_name;
