#!/bin/sh

php generator.php

PGPASSWORD=iknow psql -U iknow -h localhost -d iknow < start.sql

echo "Would you like to log in iknow [y/n]?"
read ans


if [ $ans = y -o $ans = Y -o $ans = yes -o $ans = Yes -o $ans = YES ]
then
./login.sh
fi
