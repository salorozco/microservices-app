# src/conversations/presentation/message_controller.py

from flask import request, jsonify
from flask.views import MethodView
from injector import inject
from src.conversations.application.message_service_interface import MessageServiceInterface
from src.conversations.domain.exceptions import UnauthorizedSenderException, ConversationNotFoundException

class MessageController(MethodView):
    @inject
    def __init__(self, message_service: MessageServiceInterface):
        self.message_service = message_service

    def get(self, conversation_id):
        messages = self.message_service.get_messages(conversation_id)
        messages_serialized = [self.serialize_message(msg) for msg in messages]
        return jsonify(messages_serialized)

    def post(self, conversation_id):
        data = request.get_json()
        sender_id = data.get('sender_id')
        content = data.get('content')

        try:
            message = self.message_service.send_message(conversation_id, sender_id, content)
            return jsonify(self.serialize_message(message)), 201
        except UnauthorizedSenderException as e:
            return jsonify({'error': str(e)}), 403
        except ConversationNotFoundException as e:
            return jsonify({'error': str(e)}), 404
        except Exception as e:
            return jsonify({'error': 'An unexpected error occurred.'}), 500

    def serialize_message(self, message):
        return {
            'id': message.id,
            'conversation_id': message.conversation_id,
            'sender_id': message.sender_id,
            'content': message.content,
            'sent_at': message.sent_at.isoformat() if message.sent_at else None,
        }
