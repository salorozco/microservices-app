# src/conversations/domain/message_repository_interface.py
from abc import ABC, abstractmethod
from typing import List
from src.conversations.domain.message import Message
from src.conversations.domain.conversation import Conversation

class MessageRepositoryInterface(ABC):
    @abstractmethod
    def get_messages_by_conversation_id(self, conversation_id: int) -> List[Message]:
        pass

    @abstractmethod
    def create_message(self, message: Message) -> Message:
        pass

    @abstractmethod
    def get_conversations_by_user_id(self, user_id: int) -> List[Conversation]:
        pass
