SELECT route, count(route) FROM Celebrity GROUP BY route HAVING count(route) > 1;

DELETE c1 FROM Celebrity c1, Celebrity c2 WHERE c1.id < c2.id AND c1.route = c2.route;

