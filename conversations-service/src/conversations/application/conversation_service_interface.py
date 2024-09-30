# src/conversations/application/conversation_service_interface.py
from abc import ABC, abstractmethod
from typing import List, Optional
from src.conversations.domain.conversation import Conversation

class ConversationServiceInterface(ABC):
    @abstractmethod
    def get_conversation(self, conversation_id: int) -> Optional[Conversation]:
        pass

    @abstractmethod
    def create_conversation(self, title: str, participant_user_ids: List[int]) -> Conversation:
        pass

    @abstractmethod
    def list_conversations(self) -> List[Conversation]:
        pass

    @abstractmethod
    def get_conversations_by_user_id(self, user_id: int) -> List[Conversation]:
        pass
