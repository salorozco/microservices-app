# src/conversations/infrastructure/message_repository.py
from typing import List
from src.conversations.domain.message_repository_interface import MessageRepositoryInterface
from src.conversations.domain.message import Message
from src.conversations.infrastructure.orm_models import (
    MessageModel,
    map_to_domain_message,
    map_to_orm_message
)
from src.database import SessionLocal

class MessageRepository(MessageRepositoryInterface):
    def get_messages_by_conversation_id(self, conversation_id: int) -> List[Message]:
        with SessionLocal() as db:
            orm_messages = db.query(MessageModel).filter(MessageModel.conversation_id == conversation_id).all()
            return [map_to_domain_message(om) for om in orm_messages]

    def create_message(self, message: Message) -> Message:
        with SessionLocal() as db:
            orm_message = map_to_orm_message(message)
            db.add(orm_message)
            db.commit()
            db.refresh(orm_message)
            return map_to_domain_message(orm_message)
