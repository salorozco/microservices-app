import React from 'react';
import PropTypes from 'prop-types';
import styles from '../css/ConversationList.module.css';

const NotificationsList = ({ notifications }) => {
    return (
        <ul className={styles.notificationList}>
            {notifications.map((notification) => (
                <li key={notification.id} className={styles.notificationItem}>
                    <h4>{notification.message}</h4>
                    <span className={styles.sentAt}> {new Date(notification.createdAt.date).toLocaleString()}</span>
                </li>
            ))}
        </ul>
    );
};

NotificationsList.propTypes = {
    notifications: PropTypes.arrayOf(
        PropTypes.shape({
            id: PropTypes.number.isRequired,
            recipientId: PropTypes.number.isRequired,
            actorId: PropTypes.number.isRequired,
            entityId: PropTypes.number.isRequired,
            entityType: PropTypes.string.isRequired,
            message: PropTypes.string.isRequired,
            type: PropTypes.string.isRequired,
            status: PropTypes.string.isRequired,
            createdAt: PropTypes.instanceOf(Date).isRequired,
            updatedAt: PropTypes.instanceOf(Date).isRequired,
        })
    ).isRequired,
};

export default NotificationsList;
