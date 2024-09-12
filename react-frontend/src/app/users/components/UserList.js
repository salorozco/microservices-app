"use client";  // Mark this as a Client Component

import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchUsers } from '../slice/userSlice';
import Link from "next/link";
import User from "@/app/users/components/User";
import '../css/UserLIst.css'

export default function UserList() {
    const dispatch = useDispatch();
    const { users, loading, error } = useSelector((state) => state.users);

    useEffect(() => {
        dispatch(fetchUsers());
    }, [dispatch]);

    if (loading) return <p>Loading users...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div className="user-list-container">
            <h1 className="text-3xl font-bold mb-4">User List</h1>
            <ul className="user-list">
                {users.map(user => (
                    <li key={user.id} className="user-list-item">
                        <Link href={`/users/${user.id}`} className="user-link">
                            <User user={user} />
                        </Link>
                    </li>
                ))}
            </ul>
        </div>
    );
}
