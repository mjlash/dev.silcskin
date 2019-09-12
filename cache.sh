#!/bin/bash

# VARIABLES
CONFIG_FILE="./app/etc/local.xml"

# USAGE
function usage()
{
cat <<EOF
Usage:     $0 [OPTIONS]
Version:   1.01
Author:    Sean Grünböck / studio19.at
Changedate: 29.06.2015
Use this script to disable, enable and / or clean magento cache
OPTIONS:
      -d             Disable & Clean Cache
      -e             Enable & Clean Cache
      -c             Clean Cache
      -s             Clean SessionCache
EOF
}

# MESSAGE FUNCTION
function message()
{
  STRIP=$(for i in {1..38}; do echo -n "#"; done)
  echo -e "$STRIP\n$1\n$STRIP"
}

# GET OPTIONS
while getopts ":dechs" OPTION; do
  case $OPTION in
    h)
      usage
      exit 0
      ;;
    *)
      [[ "$OPTARG" == "" ]] && OPTARG='"-'$OPTION' 1"'
      OPTION="OPT_$OPTION"
      eval ${OPTION}=$OPTARG
      ;;
  esac
done

# EXIT IF NO OPTIONS
[[ "$OPT_d$OPT_e$OPT_d$OPT_c$OPT_s" == "" ]] && usage && exit 1

# GET PARAMETERS FROM LOCAL.XML
function getParam()
{
  RETVAL=$(grep -Eoh "<$1>(<!\[CDATA\[)?(.*)(\]\]>)?<\/$1>" $TMP_FILE | sed "s#<$1><!\[CDATA\[##g;s#\]\]><\/$1>##g")
  if [[ "$2" == "sanitise" ]]; then
    RETVAL=$(echo "$RETVAL" | sed 's/"/\\\"/g')
  fi
  echo -e "$RETVAL"
}

which mktemp >/dev/null 2>&1
[ $? -eq 0 ] && TMP_FILE=$(mktemp ./var/local.xml.XXXXX) || TMP_FILE="./var/.tmp.local.xml"
sed -ne '/default_setup/,/\/default_setup/p' $CONFIG_FILE > $TMP_FILE

IGNORE_STRING=""
DBHOST=$(getParam "host")
DBUSER=$(getParam "username")
DBPASS=$(getParam "password" "sanitise" )
DBNAME=$(getParam "dbname")
TABLE_PREFIX=$(getParam "table_prefix")
[ -f $TMP_FILE ] && rm $TMP_FILE

# DO THE MAGIC
if [[ ! "$OPT_d" == "" ]]; then

  mysql -h $DBHOST -u $DBUSER -p$DBPASS -e "UPDATE core_cache_option SET value=0;" $DBNAME
  rm -rf var/cache/*
  message "Cache Disabled"

elif [[ ! "$OPT_e" == "" ]]; then
  
  mysql -h $DBHOST -u $DBUSER -p$DBPASS -e "UPDATE core_cache_option SET value=1;" $DBNAME
  rm -rf var/cache/*
  message "Cache Enabled"

elif [[ ! "$OPT_c" == "" ]]; then
  
  rm -rf var/cache/*
  message "Cache Cleaned"
  
elif [[ ! "$OPT_s" == "" ]]; then
  
  rm -rf var/session/*
  message "Session Cache Cleaned"
 
fi
