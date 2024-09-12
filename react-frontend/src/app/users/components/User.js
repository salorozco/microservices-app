import React from "react";

export default function User({ user }) {
    return (
        <div>
            <h4 className="text-1xl font-bold ">{user.name}</h4>
            <p> {user.email}</p>
        </div>

    );
}
