#!/bin/sh

# Wait for the database to be ready using Python
echo "Waiting for the database to be ready..."
python -c "
import time
import os
import psycopg2
from psycopg2 import OperationalError

DATABASE_URL = os.getenv('DATABASE_URL')

while True:
    try:
        conn = psycopg2.connect(DATABASE_URL)
        conn.close()
        break
    except OperationalError:
        time.sleep(1)
"
echo "Database is ready!"

# Initialize the database
echo "Initializing the database..."
python init_db.py

# Seed initial data
echo "Seeding initial data..."
python seed_data.py

# Run the Flask application
echo "Starting the Flask application..."
flask run --host=0.0.0.0 --port=5000
