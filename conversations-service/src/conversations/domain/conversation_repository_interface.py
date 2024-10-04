# src/conversations/domain/conversation_repository_interface.py
from abc import ABC, abstractmethod
from typing import List, Optional
from src.conversations.domain.conversation import Conversation

class ConversationRepositoryInterface(ABC):
    @abstractmethod
    def get_conversation_by_id(self, conversation_id: int) -> Optional[Conversation]:
        pass

    @abstractmethod
    def create_conversation(self, conversation: Conversation) -> Conversation:
        pass

    @abstractmethod
    def list_conversations(self) -> List[Conversation]:
        pass
