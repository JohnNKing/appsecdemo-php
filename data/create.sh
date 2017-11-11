#!/bin/bash
cat "$(dirname "$0")"/reinit.sql | sqlite3 "$(dirname "$0")"/db
chmod a+w "$(dirname "$0")" "$(dirname "$0")"/db
