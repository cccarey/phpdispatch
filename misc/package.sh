#!/bin/bash
rootdir=`pwd`

mkdir /tmp/phpdispatch
mkdir /tmp/phpdispatch/fw

cp -r fw/dispatcher /tmp/phpdispatch/fw
cp index.php /tmp/phpdispatch
cp .htaccess /tmp/phpdispatch

cd /tmp/phpdispatch
tar cfz $rootdir/phpdispatch.tgz .
cd ..

rm -rf phpdispatch

cd $rootdir
