import React from 'react';
import Comment from './Comment';

const CommentList = ({ comments }) => {
    if (!comments || comments.length === 0) {
        return null; // Return nothing if there are no comments
    }

    return (
        <div>
            {comments.map((comment) => (
                <Comment key={comment.id} comment={comment} />
            ))}
        </div>
    );
};

export default CommentList;
