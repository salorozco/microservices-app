# src/bootstrap.py
from flask import Flask
from flask_injector import FlaskInjector
from src.routes import configure_routes
from src.dependencies import configure_dependencies

def create_app():
    app = Flask(__name__)

    # Configure routes
    configure_routes(app)

    # Configure dependencies
    FlaskInjector(app=app, modules=[configure_dependencies])

    return app
