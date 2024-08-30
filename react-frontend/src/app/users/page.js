// app/users/page.js (Server Component)

import React from 'react';
import UserList from './components/UserList';  // Import the Client Component

export default function UsersPage() {
    return (
        <main className="p-10">
            <UserList />
        </main>
    );
}