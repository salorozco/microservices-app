# src/routes.py
from src.conversations.presentation.conversation_controller import ConversationController
from src.conversations.presentation.message_controller import MessageController

def configure_routes(app):
    # Conversations routes
    conversation_view = ConversationController.as_view('conversation_api')

    # List all conversations or create a new one
    app.add_url_rule(
        '/conversations/',
        defaults={'conversation_id': None, 'user_id': None},
        view_func=conversation_view,
        methods=['GET', 'POST']
    )

    # Get a specific conversation
    app.add_url_rule(
        '/conversations/<int:conversation_id>',
        view_func=conversation_view,
        methods=['GET']
    )

    # Get conversations for a specific user
    app.add_url_rule(
        '/users/<int:user_id>/conversations',
        defaults={'conversation_id': None},
        view_func=conversation_view,
        methods=['GET']
    )

    # Messages routes
    message_view = MessageController.as_view('message_api')
    app.add_url_rule(
        '/conversations/<int:conversation_id>/messages',
        view_func=message_view,
        methods=['GET', 'POST']
    )
