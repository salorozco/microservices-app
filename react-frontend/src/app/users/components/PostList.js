import React from 'react';
import Post from './Post';
const PostList = ({ posts }) => {
    if (!posts || posts.length === 0) {
        return <p>No posts available.</p>;
    }

    return (
        <div className="post-list">
            {posts.map((post) => (
                <div key={post.id}>
                    <Post post={post} />
                </div>
            ))}
        </div>
    );
};

export default PostList;
