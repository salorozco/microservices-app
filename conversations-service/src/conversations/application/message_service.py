# src/conversations/application/message_service.py
from typing import List
from injector import inject
from src.conversations.application.message_service_interface import MessageServiceInterface
from src.conversations.domain.message_repository_interface import MessageRepositoryInterface
from src.conversations.domain.message import Message
from datetime import datetime

class MessageService(MessageServiceInterface):
    @inject
    def __init__(self, message_repository: MessageRepositoryInterface):
        self.message_repository = message_repository

    def get_messages(self, conversation_id: int) -> List[Message]:
        return self.message_repository.get_messages_by_conversation_id(conversation_id)

    def send_message(self, conversation_id: int, sender_id: int, content: str) -> Message:
        message = Message(
            id=None,
            conversation_id=conversation_id,
            sender_id=sender_id,
            content=content,
            sent_at=datetime.utcnow()
        )
        return self.message_repository.create_message(message)
