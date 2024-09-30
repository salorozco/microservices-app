# src/conversations/domain/conversation_participant.py

class ConversationParticipant:
    def __init__(self, conversation_id: int, user_id: int):
        self._conversation_id = conversation_id
        self._user_id = user_id

    @property
    def conversation_id(self) -> int:
        return self._conversation_id

    @property
    def user_id(self) -> int:
        return self._user_id
