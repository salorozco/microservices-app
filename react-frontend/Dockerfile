# Use the official Node.js image as a base
FROM node:latest AS build-stage

# Set the working directory
WORKDIR /app

# Install Nginx
RUN apt-get update && apt-get install -y nginx

EXPOSE 3000

# Set entrypoint to run the entrypoint.sh script
ENTRYPOINT ["/bin/bash", "/app/bin/entrypoint.sh"]