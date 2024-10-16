import React from 'react';
import PropTypes from 'prop-types';
import styles from '../css/ConversationList.module.css';

const SubscriptionsList = ({ subscriptions }) => {
    return (
        <ul className={styles.subscriptionList}>
            {subscriptions.map((subscription) => (
                <li key={subscription.id} className={styles.subscriptionItem}>
                    <h4>User {subscription.targetId}</h4>
                    <span className={styles.sentAt}> {new Date(subscription.createdAt.date).toLocaleString()}</span>
                </li>
            ))}
        </ul>
    );
};

SubscriptionsList.propTypes = {
    subscriptions: PropTypes.arrayOf(
        PropTypes.shape({
            id: PropTypes.number.isRequired,
            userId: PropTypes.number.isRequired,
            targetId: PropTypes.number.isRequired,
            targetType: PropTypes.string.isRequired,
            createdAt: PropTypes.instanceOf(Date).isRequired,
            updatedAt: PropTypes.instanceOf(Date).isRequired,
        })
    ).isRequired,
};

export default SubscriptionsList;
