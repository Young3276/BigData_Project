#! /bin/bash

echo "
##########################################################################
[ apache 최상위 경로에서 사용 (/var/www/html) ]
2. CONFIG DIR에 있는 Configuration 파일을 위치에 업로드
3. [IP]:[PORT]/PATH 에 따른 php파일들이 status code 200을 반환하는지 체크
4. Status Code가 200이 아니면 에러파일로 출력
###########################################################################
"

# IP와 PORT 파싱
IP=`hostname -I | awk '{print $1;}'`
PORT=`sudo netstat -ntlp|grep httpd |awk '{print $4;}'|sed "s/:/ /g"|awk '{print $2;}'`
#PORT=`sudo netstat -ntlp|grep httpd |awk '{print $4;}'|sed 's/://g'`

# 테스트 디렉토리 [[ web ]]
echo "DIR Name is web"
DIR="web"
PATHS="/var/www/html/$DIR/"
cd $PATHS


# CONFIG 파일 원본 복사 및 설정
sudo cp /etc/httpd/conf/httpd.conf /etc/httpd/conf/httpd.conf.ori
sudo cp $PATHS/CONFIG/httpd.conf /etc/httpd/conf/httpd.conf

sudo cp /etc/my.cnf /etc/my.cnf.ori
sudo cp $PATHS/CONFIG/my.cnf /etc/my.cnf


# PHP파일만을 추출
RESULT=`find . -maxdepth 1 -type f -name "*.php" -print |sed "s/.\///g"`

# INSPECTION PHP Syntax
for t in $RESULT
do
	php -l $t
done

# IP:PORT/PATH를 통해 STATUS CODE 검사 
for i in $RESULT
do
	URL=$IP:$PORT/$DIR/$i
	echo -n $URL "----->"
	STAT=`curl -s --head $URL | head -n 1|awk '{print $2;}'`
	if [ $STAT -ne 200 ]
	then
		echo $URL"--->"$STAT >> ERROR.txt
	fi
	echo $STAT
done
