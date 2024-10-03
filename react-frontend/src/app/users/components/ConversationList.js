// components/Conversations/ConversationList.js
import React from 'react';
import PropTypes from 'prop-types';
import styles from '../css/ConversationList.module.css';

const ConversationList = ({ conversations }) => {
    return (
        <ul className={styles.conversationList}>
            {conversations.map((conversation) => (
                <li key={conversation.id} className={styles.conversationItem}>
                    <h4>{conversation.title}</h4>
                    <div className={styles.messages}>
                        {conversation.messages.map((message) => (
                            <div key={message.id} className={styles.message}>
                                <strong>User {message.senderId}:</strong> {message.content}
                                <span className={styles.sentAt}>
                  {new Date(message.sentAt.date).toLocaleString()}
                </span>
                            </div>
                        ))}
                    </div>
                </li>
            ))}
        </ul>
    );
};

ConversationList.propTypes = {
    conversations: PropTypes.arrayOf(
        PropTypes.shape({
            id: PropTypes.number.isRequired,
            title: PropTypes.string.isRequired,
            messages: PropTypes.arrayOf(
                PropTypes.shape({
                    id: PropTypes.number.isRequired,
                    senderId: PropTypes.number.isRequired,
                    content: PropTypes.string.isRequired,
                    sentAt: PropTypes.string.isRequired,
                })
            ).isRequired,
        })
    ).isRequired,
};

export default ConversationList;
