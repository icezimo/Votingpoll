FROM mysql:latest

ADD poll_db.sql /docker-entrypoint-initdb.d

##RUN /bin/bash -c "/usr/bin/mysql &" && \
 #sleep 5 && \
RUN /bin/bash -c "mysql -u root -psecret -e 'CREATE DATABASE poll_db'"
RUN /bin/bash -c "mysql -u root -psecret poll_db < /docker-entrypoint-initdb.d/poll_db.sql"


