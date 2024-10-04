# src/conversations/domain/exceptions.py

class UnauthorizedSenderException(Exception):
    """Exception raised when a sender is not authorized to send messages to a conversation."""
    pass

class ConversationNotFoundException(Exception):
    """Exception raised when a conversation is not found."""
    pass
