# src/conversations/application/conversation_service.py
from typing import List, Optional
from injector import inject
from src.conversations.application.conversation_service_interface import ConversationServiceInterface
from src.conversations.domain.conversation_repository_interface import ConversationRepositoryInterface
from src.conversations.domain.conversation import Conversation
from src.conversations.domain.conversation_participant import ConversationParticipant
from datetime import datetime

class ConversationService(ConversationServiceInterface):
    @inject
    def __init__(self, conversation_repository: ConversationRepositoryInterface):
        self.conversation_repository = conversation_repository

    def get_conversation(self, conversation_id: int) -> Optional[Conversation]:
        return self.conversation_repository.get_conversation_by_id(conversation_id)

    def create_conversation(self, title: str, participant_user_ids: List[int]) -> Conversation:
        participants = [ConversationParticipant(None, user_id) for user_id in participant_user_ids]
        conversation = Conversation(
            id=None,
            title=title,
            participants=participants,
            messages=[],
            created_at=datetime.utcnow(),
            updated_at=datetime.utcnow()
        )
        return self.conversation_repository.create_conversation(conversation)

    def list_conversations(self) -> List[Conversation]:
        return self.conversation_repository.list_conversations()

    def get_conversations_by_user_id(self, user_id: int) -> List[Conversation]:
        return self.conversation_repository.get_conversations_by_user_id(user_id)
