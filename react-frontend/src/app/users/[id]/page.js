// app/users/[id]/page.js
"use client";

import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchUserById } from '../slice/userSlice';

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
        <div className="p-10">
            <h1 className="text-4xl font-bold mb-4">{user.name}</h1>
            <p>Email: {user.email}</p>
            <p>Created At: {user.createdAt}</p>
        </div>
    );
}
