# init_db.py
from src.database import engine
from src.conversations.infrastructure.orm_models import Base

print("Creating database tables...")
Base.metadata.create_all(bind=engine)
print("Database tables created.")
