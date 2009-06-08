#!/bin/bash
rootdir=`pwd`

mkdir /tmp/phpdispatch

cp -r lib /tmp/phpdispatch
cp index.php /tmp/phpdispatch
cp .htaccess /tmp/phpdispatch

cd /tmp
tar cfz $rootdir/phpdispatch.tgz phpdispatch

rm -rf phpdispatch

cd $rootdir
