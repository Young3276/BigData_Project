#!/bin/bash

echo "
###########################################################################################
[ git pulling에 필요한 repository 등록은 되어 있는 것으로 가정 ]
Build.sh Tool
1. git으로 형상관리를 하며 개발이 모두 끝난 상태(=build, test, deploy.sh) 만 있는 상태
2. pulling을 통해 build하도록 함   
3. depth=1 수준에서 불필요한 파일(php 제외한 파일) 제거
4. 불필요한 디렉토리(ETC, SCRIPT) 제거 후, 배포가 용이하도록 압축
############################################################################################
";

#MAKE TEMP DIR
echo "INPUT DIR NAME is [[ web ]]"
DIR="web"
mkdir $DIR
cd $DIR
PATHS=$PWD

# git repository 생성 및 pulling
sudo git init
sudo git add ./
sudo git commit -m "commit"
sudo git remote add origin https://Young-ba6020@oss.navercorp.com/NBP-2017-Intern-Program/Young-ba6020.git
echo "INPUT GIT PASSWORD"
sudo git pull origin master

# depth 1인 php파일을 제외한 나머지 파일 제거
RESULT=`find . -maxdepth 1 -type f -not -name "*.php" -print |sed "s/.\///g"`
find . -maxdepth 1 -type f -not -name "*.php" -print0|xargs -0 rm
for TMP in $RESULT
do
	echo "delete $TMP";
done

# Delete ETC DIR
sudo rm -rf ./ETC
echo "delete ETC DIR";

# Delete SCRIPT DIR && SCRIPT DIR
sudo rm -rf ./SCRIPT
sudo rm -rf .git
cd ..

echo "BUILD COMPLETED"
