'use client';

import React, { useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';
import PropTypes from 'prop-types';
import { faTimes } from '@fortawesome/free-solid-svg-icons';
import styles from '../css/ConversationsModal.module.css';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import SubscriptionsList from "@/app/users/components/SubscriptionsList";


const SubscriptionsModal = ({ visible, subscriptions, onClose }) => {
    const modalRef = useRef(null);

    // Close modal on ESC key press
    useEffect(() => {
        const handleEsc = (event) => {
            if (event.key === 'Escape') {
                onClose();
            }
        };
        window.addEventListener('keydown', handleEsc);
        return () => {
            window.removeEventListener('keydown', handleEsc);
        };
    }, [onClose]);

    // Prevent scrolling when modal is open
    useEffect(() => {
        if (visible) {
            document.body.style.overflow = 'hidden';
            // Focus the modal for accessibility
            if (modalRef.current) {
                modalRef.current.focus();
            }
        } else {
            document.body.style.overflow = 'auto';
        }
    }, [visible]);

    if (!visible) return null;

    return ReactDOM.createPortal(
        <div
            className={styles.modalOverlay}
            onClick={onClose}
            role="dialog"
            aria-modal="true"
            aria-labelledby="modal-title">
            <div
                className={styles.modalContent}
                onClick={(e) => e.stopPropagation()}
                tabIndex="-1"
                ref={modalRef}>
                <div className={styles.modalHeader}>
                    <h1 id="modal-title" className={styles.modalTitle} >Followers</h1>
                    <span
                        className={styles.closeButton}
                        onClick={onClose}
                        aria-label="Close"
                        >
                        <FontAwesomeIcon icon={faTimes} />
                    </span>
                </div>
                <div className={styles.modalBody}>
                    <SubscriptionsList subscriptions={subscriptions}/>
                </div>
            </div>
        </div>,
        document.body
    );
};

SubscriptionsModal.propTypes = {
    visible: PropTypes.bool.isRequired,
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
    onClose: PropTypes.func.isRequired,
};

export default SubscriptionsModal;