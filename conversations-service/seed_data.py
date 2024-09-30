# seed_data.py

from src.database import SessionLocal
from src.conversations.infrastructure.orm_models import (
    ConversationModel,
    ConversationParticipantModel,
    MessageModel
)
from datetime import datetime

def seed_data():
    session = SessionLocal()

    # Check if the conversation already exists
    existing_conversation = session.query(ConversationModel).filter_by(id=1).first()
    if existing_conversation:
        print("Conversation already exists. Skipping seeding.")
        session.close()
        return

    # Create a conversation
    conversation = ConversationModel(
        id=1,
        title='Conversation between users 1 and 2',
        created_at=datetime.utcnow(),
        updated_at=datetime.utcnow()
    )

    # Add participants
    participant1 = ConversationParticipantModel(
        conversation_id=1,
        user_id=1
    )
    participant2 = ConversationParticipantModel(
        conversation_id=1,
        user_id=2
    )

    # Add messages
    messages = [
        MessageModel(
            id=1,
            conversation_id=1,
            sender_id=1,
            content='Hi User 2, how are you?',
            sent_at=datetime.utcnow()
        ),
        MessageModel(
            id=2,
            conversation_id=1,
            sender_id=2,
            content='Hello User 1, I am fine. Thanks for asking!',
            sent_at=datetime.utcnow()
        ),
        MessageModel(
            id=3,
            conversation_id=1,
            sender_id=1,
            content='Glad to hear that! Are you available for a meeting tomorrow?',
            sent_at=datetime.utcnow()
        ),
        MessageModel(
            id=4,
            conversation_id=1,
            sender_id=2,
            content='Yes, I am. Let me know the time.',
            sent_at=datetime.utcnow()
        )
    ]

    # Add all to session
    session.add(conversation)
    session.add(participant1)
    session.add(participant2)
    session.add_all(messages)

    # Commit the session
    session.commit()
    session.close()
    print("Data seeded successfully.")

if __name__ == '__main__':
    seed_data()
