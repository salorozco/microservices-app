// app/users/[id]/page.js
"use client";

import React, {useEffect, useState} from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchUserById } from '../slice/userSlice';
import User from "@/app/users/components/User";
import PostList from "@/app/users/components/PostList";
import styles from './ProfilePage.css'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faComments } from '@fortawesome/free-solid-svg-icons';
import ConversationsModal from "@/app/users/components/ConversationsModal";


export default function UserDetail({ params }) {
    const dispatch = useDispatch();
    const { user, loading, error } = useSelector((state) => ({
        user: state.users.user,  // Access the single user object directly
        loading: state.users.loading,
        error: state.users.error,
    }));

    const [isModalVisible, setIsModalVisible] = useState(false);

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
        console.log('showConversations called');
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

    return (
        <div className="profile-container">
            <h2 className="profile-header">User Profile
                <button
                    onClick={showConversations}
                    title="View Conversations"
                    aria-label="View Conversations"
                    className={styles.iconButton}
                    >
                    <FontAwesomeIcon icon={faComments}/>
                </button>
            </h2>

            <div className="user-details">
                <User user={user}/>
            </div>

            {user.posts ? (
                <PostList posts={user.posts}/>
            ) : (
                <p>Loading posts...</p>
            )}

            <ConversationsModal
                visible={isModalVisible}
                conversations={user.conversations}
                onClose={closeConversations}
            />
        </div>
    );
}
