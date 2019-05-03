SELECT *
FROM animal_reviews
INNER JOIN 
type
ON (animal_reviews.animalid = animal.animalid)

WHERE animal_reviews.animalid Like :animalid