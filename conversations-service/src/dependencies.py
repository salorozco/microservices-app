# src/dependencies.py
from injector import Binder, singleton
from src.conversations.domain.conversation_repository_interface import ConversationRepositoryInterface
from src.conversations.domain.message_repository_interface import MessageRepositoryInterface
from src.conversations.infrastructure.conversation_repository import ConversationRepository
from src.conversations.infrastructure.message_repository import MessageRepository
from src.conversations.application.conversation_service_interface import ConversationServiceInterface
from src.conversations.application.conversation_service import ConversationService
from src.conversations.application.message_service_interface import MessageServiceInterface
from src.conversations.application.message_service import MessageService

def configure_dependencies(binder: Binder):
    # Repositories
    binder.bind(ConversationRepositoryInterface, to=ConversationRepository, scope=singleton)
    binder.bind(MessageRepositoryInterface, to=MessageRepository, scope=singleton)

    # Services
    binder.bind(ConversationServiceInterface, to=ConversationService, scope=singleton)
    binder.bind(MessageServiceInterface, to=MessageService, scope=singleton)
