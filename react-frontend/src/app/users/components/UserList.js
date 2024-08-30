// app/users/UserList.js

"use client";  // Mark this as a Client Component

import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchUsers } from '../slice/userSlice';
import Link from "next/link";

export default function UserList() {
    const dispatch = useDispatch();
    const { users, loading, error } = useSelector((state) => state.users);

    useEffect(() => {
        dispatch(fetchUsers());
    }, [dispatch]);

    if (loading) return <p>Loading users...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1 className="text-4xl font-bold mb-4">User List</h1>
            <ul>
                {users.map(user => (
                    <li key={user.id}>
                        <Link href={`/users/${user.id}`}>
                            {user.name}
                        </Link>
                    </li>
                ))}
            </ul>
        </div>
    );
}
