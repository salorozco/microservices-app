import React from 'react';
import {formatDate} from "@/app/utils/dateUtils";

const Comment = ({ comment }) => {
    return (
        <div className="comment-container">
            <div className="comment-date">Commented on: { formatDate( comment.createdAt.date)}</div>
            <div className="comment-content">{comment.content}</div>
        </div>
    );
};

export default Comment;
