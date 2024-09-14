// app/users/[id]/page.js
"use client";

import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchUserById } from '../slice/userSlice';
import User from "@/app/users/components/User";
import PostList from "@/app/users/components/PostList";
import './ProfilePage.css'

export default function UserDetail({ params }) {
    const dispatch = useDispatch();
    const { user, loading, error } = useSelector((state) => ({
        user: state.users.user,  // Access the single user object directly
        loading: state.users.loading,
        error: state.users.error,
    }));

    useEffect(() => {
        if (!user || user.id !== Number(params.id)) {  // Fetch only if user is not in state or if the ID doesn't match
            dispatch(fetchUserById(params.id));
        }
    }, [dispatch, user, params.id]);

    if (loading) return <p>Loading user...</p>;
    if (error) return <p>Error: {error}</p>;
    if (!user) return <p>No user data found.</p>;

    return (
        <div className="profile-container">
            <h2 className="profile-header">User Profile</h2>

            <div className="user-details">
                <User user={user}/>
            </div>

            {user.posts ? (
                <PostList posts={user.posts}/>
            ) : (
                <p>Loading posts...</p>
            )}
        </div>
    );
}
