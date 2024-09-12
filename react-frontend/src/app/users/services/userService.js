// app/services/userService.js

export async function fetchUsers() {
    try {
        const response = await fetch('http://localhost/users');
        if (!response.ok) {
            throw new Error('Failed to fetch users');
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

export async function fetchUserById(id) {
    try {
        const response = await fetch(`http://localhost/profile/${id}`);
        if (!response.ok) {
            throw new Error('Failed to fetch user');
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}
