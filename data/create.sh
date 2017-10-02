#!/bin/bash
cat reinit.sql | sqlite3 db
chmod a+w db ./
