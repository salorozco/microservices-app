#!/bin/bash
set -e

# Install Angular CLI globally
npm install -g @angular/cli

# Serve the Angular application
ng serve --host 0.0.0.0
