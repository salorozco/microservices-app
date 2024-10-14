// app/users/[id]/page.js
"use client";

import React, {useEffect, useState} from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchUserById } from '../slice/userSlice';
import User from "@/app/users/components/User";
import PostList from "@/app/users/components/PostList";
import './ProfilePage.css'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faComments, faBell, faUsers } from '@fortawesome/free-solid-svg-icons';
import ConversationsModal from "@/app/users/components/ConversationsModal";
import NotificationsModal from "@/app/users/components/NotificationsModal";
import SubscriptionsModal from "@/app/users/components/SubscriptionsModal";


export default function UserDetail({ params }) {
    const dispatch = useDispatch();
    const { user, loading, error } = useSelector((state) => ({
        user: state.users.user,  // Access the single user object directly
        loading: state.users.loading,
        error: state.users.error,
    }));

    const [isModalVisible, setIsModalVisible] = useState(false);
    const [isNotificationVisible, setIsNotificationVisible] = useState(false);
    const [isSubscriptionVisible, setIsSubscriptionVisible] = useState(false);

    useEffect(() => {
        if (!user || user.id !== Number(params.id)) {  // Fetch only if user is not in state or if the ID doesn't match
            dispatch(fetchUserById(params.id));
        }
    }, [dispatch, user, params.id]);

    if (loading) return <p>Loading user...</p>;
    if (error) return <p>Error: {error}</p>;
    if (!user) return <p>No user data found.</p>;

    // Handler to open the modal
    const showConversations = () => {
        if (user.conversations && user.conversations.length > 0) {
            setIsModalVisible(true);
        } else {
            alert('No conversations to display.');
        }
    };

    // Handler to close the modal
    const closeConversations = () => {
        setIsModalVisible(false);
    };

    const showNotifications = () => {
        if (user.notifications && user.notifications.length > 0) {
            setIsNotificationVisible(true);
        }else {
            alert('No notifications to display.');
        }
    }

    const closeNotifications = () => {
        setIsNotificationVisible(false);
    }

    const showSubscriptions = () => {
        if (user.subscriptions && user.subscriptions.length > 0) {
            setIsSubscriptionVisible(true);
        }else {
            alert('No subscriptions to display.');
        }
    }

    const closeSubscriptions = () => {
        setIsSubscriptionVisible(false);
    }

    return (
        <div className="profile-container">
            <h2 className="profile-header">User Profile
                <div className="icon-container">
                    <button
                        onClick={showSubscriptions}
                        title="View Followers"
                        aria-label="View Followers"
                        className="iconButton">
                        <FontAwesomeIcon icon={faUsers}/>
                    </button>
                    <button
                        onClick={showNotifications}
                        title="View Notifications"
                        aria-label="View Notifications"
                        className="iconButton">
                        <FontAwesomeIcon icon={faBell}/>
                    </button>
                    <button
                        onClick={showConversations}
                        title="View Conversations"
                        aria-label="View Conversations"
                        className="iconButton">
                        <FontAwesomeIcon icon={faComments}/>
                    </button>
                </div>
            </h2>

            <div className="user-details">
                <User user={user}/>
            </div>

            {user.posts ? (
                <PostList posts={user.posts}/>
            ) : (
                <p>Loading posts...</p>
            )}

            <SubscriptionsModal
                visible={isSubscriptionVisible}
                subscriptions={user.subscriptions}
                onClose={closeSubscriptions}
                />

            <NotificationsModal
                visible={isNotificationVisible}
                notifications={user.notifications}
                onClose={closeNotifications}
                />

            <ConversationsModal
                visible={isModalVisible}
                conversations={user.conversations}
                onClose={closeConversations}
            />
        </div>
    );
}
