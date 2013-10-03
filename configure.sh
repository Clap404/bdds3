#!/bin/bash

# Ce script génère le fichier de configuration "config.php"
#
# <?php
# $DB = array(
#     "TYPE" => "mysql" ,
#     "HOST" => "localhost" ,
#     "PORT" => 3306 ,
#     "NAME" => "bdds3" ,
#     "USER" => "bdds3" ,
#     "PASS" => "password"
# );

config_file="config.php"

ask(){
    msg=$1
    default=$2
    property=$3
    data_type=$4
    echo -ne $msg [$default] "\n> "
    read value
    if [ -z $value ]
        then value=$default
    fi
    if [ -z $data_type ]
        then echo "    "\"$property\" "=>" \"$value\" "," >> $config_file
    elif [ $data_type = "num" ]
        then echo "    "\"$property\" "=>" $value "," >> $config_file
    elif [ $data_type = "last" ]
        then echo "    "\"$property\" "=>" \"$value\" >> $config_file
    fi
}

echo "=== paramètres de la base de donnée ==="
echo -e '<?php\n$DB = array(' > $config_file

ask "type de la base de donnée" "mysql" "TYPE"
ask "serveur hôte" "localhost" "HOST"
ask "port de connexion" "3306" "PORT" num
ask "nom de la base de donnée" "bdds3" "NAME"
ask "nom d'utilisateur" "bdds3" "USER"
ask "mot de passe" "password" "PASS" last

echo ');' >> $config_file