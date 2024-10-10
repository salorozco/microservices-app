#!/bin/bash

echo "Starting application with auto-reload..."

# Start the application in the background
mvn spring-boot:run -Dspring-boot.run.fork=true &

# Get the PID of the background process
APP_PID=$!

# Monitor the src directory for changes
while inotifywait -e modify,create,delete -r src; do
  echo "Changes detected. Rebuilding application..."

  # Stop the running application
  kill $APP_PID

  # Clean the project
  mvn clean

  # Recompile the code
  mvn compile

  # Restart the application
  mvn spring-boot:run -Dspring-boot.run.fork=true &

  # Update the PID
  APP_PID=$!
done
