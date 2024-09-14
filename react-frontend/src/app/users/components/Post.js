import React from 'react';
import CommentList from "@/app/users/components/CommentList";
import { formatDate } from "@/app/utils/dateUtils";

const Post = ({ post }) => {
    return (
        <div className="post-container">
            <div className="post-header">Posted on: { formatDate( post.created_at.date ) }</div>
            <div className="post-footer">{post.content}</div>

            {post.comments && post.comments.length > 0 && (
                <CommentList comments={post.comments} />
            )}
        </div>
    );
};

export default Post;
