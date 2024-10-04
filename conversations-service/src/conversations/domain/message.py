# src/conversations/domain/message.py
from datetime import datetime
from typing import Optional

class Message:
    def __init__(
        self,
        id: Optional[int],
        conversation_id: int,
        sender_id: int,
        content: str,
        sent_at: Optional[datetime] = None
    ):
        self._id = id
        self._conversation_id = conversation_id
        self._sender_id = sender_id
        self._content = content
        self._sent_at = sent_at if sent_at else datetime.utcnow()

    @property
    def id(self) -> Optional[int]:
        return self._id

    @property
    def conversation_id(self) -> int:
        return self._conversation_id

    @property
    def sender_id(self) -> int:
        return self._sender_id

    @property
    def content(self) -> str:
        return self._content

    @property
    def sent_at(self) -> datetime:
        return self._sent_at
