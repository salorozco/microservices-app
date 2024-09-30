# src/database.py
import os
from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker, scoped_session
from src.conversations.infrastructure.orm_models import Base  # Import Base from ORM models

DATABASE_URL = os.getenv('DATABASE_URL', 'postgresql://user:password@localhost:5432/conversations_db')

engine = create_engine(DATABASE_URL)
SessionLocal = scoped_session(sessionmaker(autocommit=False, autoflush=False, bind=engine))
