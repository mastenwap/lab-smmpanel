docker-compose up -d
docker exec -i db mysql -uwebaji -pt3st3r12345! smmpanel -e "SHOW TABLES;" | grep -v '^Tables_in' | xargs -I {} docker exec -i db mysql -uwebaji -pt3st3r12345! smmpanel -e "DROP TABLE {};"
docker exec -i db mysql -uwebaji -pt3st3r12345! smmpanel < php/src/database.sql
