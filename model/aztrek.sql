USE aztrek;

SELECT *
FROM sejours
INNER JOIN depart ON depart.sejours_id = sejours.id
GROUP BY date_depart DESC;