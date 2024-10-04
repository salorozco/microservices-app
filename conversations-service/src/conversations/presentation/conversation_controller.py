# src/conversations/presentation/conversation_controller.py
from flask import request, jsonify, Response
from flask.views import MethodView
from injector import inject
from typing import Optional
from src.conversations.application.conversation_service_interface import ConversationServiceInterface
from src.conversations.domain.conversation import Conversation

class ConversationController(MethodView):
    @inject
    def __init__(self, conversation_service: ConversationServiceInterface):
        self.conversation_service = conversation_service

    def get(self, conversation_id=None, user_id=None):
        if user_id is not None:
            # Handle GET /users/<int:user_id>/conversations
            conversations = self.conversation_service.get_conversations_by_user_id(user_id)
            conversations_serialized = [self.serialize_conversation(conversation) for conversation in conversations]
            return jsonify(conversations_serialized)
        elif conversation_id is not None:
            # Handle GET /conversations/<int:conversation_id>
            conversation = self.conversation_service.get_conversation(conversation_id)
            if conversation:
                return jsonify(self.serialize_conversation(conversation))
            else:
                return jsonify({'error': 'Conversation not found'}), 404
        else:
            # Handle GET /conversations/
            conversations = self.conversation_service.list_conversations()
            conversations_serialized = [self.serialize_conversation(conversation) for conversation in conversations]
            return jsonify(conversations_serialized)

    def post(self):
        data = request.get_json()
        title = data.get('title')
        participants = data.get('participants', [])
        conversation = self.conversation_service.create_conversation(title, participants)
        return jsonify(self.serialize_conversation(conversation)), 201

    def get_conversations_by_user(self, user_id):
        conversations = self.conversation_service.get_conversations_by_user_id(user_id)
        conversations_serialized = [self.serialize_conversation(conversation) for conversation in conversations]
        return jsonify(conversations_serialized)

    def serialize_conversation(self, conversation: Conversation):
        return {
            'id': conversation.id,
            'title': conversation.title,
            'created_at': conversation.created_at.isoformat() if conversation.created_at else None,
            'updated_at': conversation.updated_at.isoformat() if conversation.updated_at else None,
            'participants': [participant.user_id for participant in conversation.participants],
            'messages': [self.serialize_message(message) for message in conversation.messages]
        }

    def serialize_message(self, message):
        return {
            'id': message.id,
            'conversation_id': message.conversation_id,
            'sender_id': message.sender_id,
            'content': message.content,
            'sent_at': message.sent_at.isoformat() if message.sent_at else None,
        }
