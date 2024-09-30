# src/conversations/domain/conversation.py
from datetime import datetime
from typing import List, Optional
from src.conversations.domain.conversation_participant import ConversationParticipant
from src.conversations.domain.message import Message

class Conversation:
    def __init__(
        self,
        id: Optional[int],
        title: str,
        participants: List[ConversationParticipant] = None,
        messages: List[Message] = None,
        created_at: Optional[datetime] = None,
        updated_at: Optional[datetime] = None
    ):
        self._id = id
        self._title = title
        self._participants = participants if participants else []
        self._messages = messages if messages else []
        self._created_at = created_at if created_at else datetime.utcnow()
        self._updated_at = updated_at if updated_at else datetime.utcnow()

    # Getter methods
    @property
    def id(self) -> Optional[int]:
        return self._id

    @property
    def title(self) -> str:
        return self._title

    @property
    def participants(self) -> List[ConversationParticipant]:
        return self._participants

    @property
    def messages(self) -> List[Message]:
        return self._messages

    @property
    def created_at(self) -> datetime:
        return self._created_at

    @property
    def updated_at(self) -> datetime:
        return self._updated_at

    # Business logic methods can be added here
