// app/users/User.js

export default function User({ user }) {
    return (
        <li className="mb-2">
            <strong>{user.name}</strong> - {user.email}
        </li>
    );
}
