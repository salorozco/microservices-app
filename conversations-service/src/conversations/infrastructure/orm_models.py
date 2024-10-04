# src/conversations/infrastructure/orm_models.py

from sqlalchemy import Column, Integer, String, DateTime, ForeignKey
from sqlalchemy.orm import relationship, backref
from datetime import datetime
from sqlalchemy.ext.declarative import declarative_base

# Import domain entities
from src.conversations.domain.conversation import Conversation
from src.conversations.domain.conversation_participant import ConversationParticipant
from src.conversations.domain.message import Message

Base = declarative_base()

# Define ORM models

class ConversationModel(Base):
    __tablename__ = 'conversations'

    id = Column(Integer, primary_key=True)
    title = Column(String)
    created_at = Column(DateTime, default=datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.utcnow)

    participants = relationship(
        'ConversationParticipantModel',
        back_populates='conversation',
        cascade="all, delete-orphan"
    )
    messages = relationship(
        'MessageModel',
        back_populates='conversation',
        cascade="all, delete-orphan"
    )

class ConversationParticipantModel(Base):
    __tablename__ = 'conversation_participants'

    conversation_id = Column(Integer, ForeignKey('conversations.id'), primary_key=True)
    user_id = Column(Integer, primary_key=True)

    conversation = relationship('ConversationModel', back_populates='participants')

class MessageModel(Base):
    __tablename__ = 'messages'

    id = Column(Integer, primary_key=True)
    conversation_id = Column(Integer, ForeignKey('conversations.id'))
    sender_id = Column(Integer)
    content = Column(String)
    sent_at = Column(DateTime, default=datetime.utcnow)

    conversation = relationship('ConversationModel', back_populates='messages')

# Mapping functions between domain entities and ORM models

def map_to_domain_conversation(orm_conversation: ConversationModel) -> Conversation:
    participants = [
        ConversationParticipant(
            conversation_id=cp.conversation_id,
            user_id=cp.user_id
        )
        for cp in orm_conversation.participants
    ]

    messages = [
        Message(
            id=m.id,
            conversation_id=m.conversation_id,
            sender_id=m.sender_id,
            content=m.content,
            sent_at=m.sent_at
        )
        for m in orm_conversation.messages
    ]

    return Conversation(
        id=orm_conversation.id,
        title=orm_conversation.title,
        participants=participants,
        messages=messages,
        created_at=orm_conversation.created_at,
        updated_at=orm_conversation.updated_at
    )

def map_to_orm_conversation(domain_conversation: Conversation) -> ConversationModel:
    orm_conversation = ConversationModel(
        id=domain_conversation.id,
        title=domain_conversation.title,
        created_at=domain_conversation.created_at,
        updated_at=domain_conversation.updated_at
    )

    orm_conversation.participants = [
        ConversationParticipantModel(
            conversation_id=domain_conversation.id,
            user_id=participant.user_id
        )
        for participant in domain_conversation.participants
    ]

    orm_conversation.messages = [
        MessageModel(
            id=message.id,
            conversation_id=message.conversation_id,
            sender_id=message.sender_id,
            content=message.content,
            sent_at=message.sent_at
        )
        for message in domain_conversation.messages
    ]

    return orm_conversation

def map_to_domain_message(orm_message: MessageModel) -> Message:
    return Message(
        id=orm_message.id,
        conversation_id=orm_message.conversation_id,
        sender_id=orm_message.sender_id,
        content=orm_message.content,
        sent_at=orm_message.sent_at
    )

def map_to_orm_message(domain_message: Message) -> MessageModel:
    orm_message = MessageModel(
        id=domain_message.id,
        conversation_id=domain_message.conversation_id,
        sender_id=domain_message.sender_id,
        content=domain_message.content,
        sent_at=domain_message.sent_at
    )
    return orm_message
