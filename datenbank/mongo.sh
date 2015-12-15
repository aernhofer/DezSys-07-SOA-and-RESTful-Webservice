#!/bin/sh

php generatormongo.php

mongo test --eval "db.data.remove({})"
mongoimport --host localhost  --db test --collection data --jsonArray --type json  --file data.json

echo "Would you like to log in iknow [y/n]?"
read ans

if [ $ans = y -o $ans = Y -o $ans = yes -o $ans = Yes -o $ans = YES ]
then
    mongo --host localhost
fi
