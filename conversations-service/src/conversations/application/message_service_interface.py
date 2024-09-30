# src/conversations/application/message_service_interface.py
from abc import ABC, abstractmethod
from typing import List
from src.conversations.domain.message import Message

class MessageServiceInterface(ABC):
    @abstractmethod
    def get_messages(self, conversation_id: int) -> List[Message]:
        pass

    @abstractmethod
    def send_message(self, conversation_id: int, sender_id: int, content: str) -> Message:
        pass
