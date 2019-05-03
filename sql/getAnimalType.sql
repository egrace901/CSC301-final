SELECT *

FROM animal_type

INNER JOIN 
type

ON (animal_type.typeid = type.typeid)

WHERE animal_type.animalid Like :animalid