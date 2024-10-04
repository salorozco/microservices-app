# src/conversations/infrastructure/conversation_repository.py
from typing import List, Optional
from sqlalchemy.orm import joinedload
from src.conversations.domain.conversation_repository_interface import ConversationRepositoryInterface
from src.conversations.domain.conversation import Conversation
from src.conversations.infrastructure.orm_models import (
    ConversationModel,
    ConversationParticipantModel,
    MessageModel,
    map_to_domain_conversation
)
from src.database import SessionLocal

class ConversationRepository(ConversationRepositoryInterface):
    def get_conversation_by_id(self, conversation_id: int) -> Optional[Conversation]:
        with SessionLocal() as db:
            orm_conversation = db.query(ConversationModel).filter(ConversationModel.id == conversation_id).first()
            if orm_conversation:
                return map_to_domain_conversation(orm_conversation)
            return None

    def create_conversation(self, conversation: Conversation) -> Conversation:
        with SessionLocal() as db:
            orm_conversation = map_to_orm_conversation(conversation)
            db.add(orm_conversation)
            db.commit()
            db.refresh(orm_conversation)
            return map_to_domain_conversation(orm_conversation)

    def list_conversations(self) -> List[Conversation]:
        with SessionLocal() as db:
            orm_conversations = db.query(ConversationModel).all()
            return [map_to_domain_conversation(oc) for oc in orm_conversations]

    def get_conversations_by_user_id(self, user_id: int) -> List[Conversation]:
        with SessionLocal() as db:
            orm_conversations = db.query(ConversationModel) \
                .join(ConversationParticipantModel) \
                .filter(ConversationParticipantModel.user_id == user_id) \
                .options(
                joinedload(ConversationModel.participants),
                joinedload(ConversationModel.messages)
            ) \
                .all()

            conversations = [map_to_domain_conversation(orm_conversation) for orm_conversation in orm_conversations]
            return conversations
