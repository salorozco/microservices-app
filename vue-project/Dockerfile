# Use the official Node.js image as a base
FROM node:latest AS build-stage

# Set the working directory
WORKDIR /app
# Install Nginx
RUN apt-get update && apt-get install -y nginx
EXPOSE 5173
# Run the development server
CMD ["npm", "run", "dev"]