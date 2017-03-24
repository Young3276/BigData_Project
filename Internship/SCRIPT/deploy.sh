#! /bin/bash

echo "
#################################################################
[ 각 SERVER에 필요한 기본적인 패키지는 설치 되어 있는 상태 ]

1. WEBSERVER 2대에 CONFIG FILE과 운영될 파일들을 전송 및 배치
2. DBSERVER에 DDL, CSV 파일 IMPORT
#################################################################
"

#WEBSERVER DEPLOYMENT
IP=("10.101.42.161" "10.113.183.44")
DB="10.110.239.148"
echo "WEBSERVER DEPLOYMENT START!!!!!"
for i in "${IP[@]}"
do
	rsync -avz -e ssh /var/www/html/web/* $i:/var/www/html
	ssh -T irteamsu@$i << Exit
	sudo cp /etc/httpd/conf/httpd.conf /etc/httpd/conf/httpd.conf.rep
	sudo cp /var/www/html/CONFIG/httpd.conf /etc/httpd/conf/httpd.conf
	sudo /etc/init.d/httpd restart
	rm -rf /var/www/html/CONFIG
	rm -rf /var/www/html/DATA
Exit
done
echo "WEBSERVER DEPLOYMENT END!!!!"


# DBSESRVER DEPLOYMENT
#echo "DBSERVER DEPLOYMENT START!!!"
rsync -avz -e ssh /var/www/html/web/CONFIG/my.cnf $DB:~/

# IMPORT DDL FILE
echo "Input Mysql Password"
mysql -h 10.110.239.148 -P 8888 -u dyoung -p < /var/www/html/web/DATA/TEST.sql
echo "TEST DDL & DATA INPUT COMPLETED!"

echo "Input Mysql Password"
mysql -h 10.110.239.148 -P 8888 -u dyoung -p < /var/www/html/web/DATA/DATA_v1.sql
echo "DATA_TB2 DDL INPUT COMPLETED!"

# IMPORT CSV FILE
echo "Input Mysql Password"
mysql -h 10.110.239.148 -P 8888 -u dyoung -p -e "LOAD DATA LOCAL INFILE '/var/www/html/web/DATA/DATA_v1.csv' INTO TABLE DATA.DATA_TB2 FIELDS TERMINATED BY ',' (country, code, jan, feb, mar, apr, may, jun) SET idx=NULL;"
echo "DATA_TB2 DATA INPUT COMPLETED!"

ssh -T irteamsu@$DB <<EOF
	sudo cp /etc/my.cnf /etc/my.cnf.ori
	sudo cp ~/my.cnf /etc/my.cnf
	sudo rm ~/my.cnf
	sudo /etc/init.d/mysqld restart
EOF

echo "DBSERVER DEPLOYMENT END!!!!"
