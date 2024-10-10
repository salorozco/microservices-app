-- src/main/resources/db/migration/V3__Insert_Test_Data.sql

-- Insert test users (if applicable)
-- INSERT INTO users (id, username) VALUES
--   (1, 'user1'),
--   (2, 'user2');

-- Insert test subscriptions
INSERT INTO subscriptions (user_id, target_id, target_type) VALUES
    (1, 2, 'USER'),
    (2, 1, 'USER');

-- Insert test notifications
INSERT INTO notifications (recipient_id, actor_id, entity_id, entity_type, message, type) VALUES
    (1, 2, 100, 'POST', 'User 2 created a post!', 'POST_CREATED'),
    (1, 2, 200, 'POST', 'User 2 created another post!', 'POST_CREATED'),
    (2, 1, 110, 'POST', 'User 1 created a post!', 'POST_CREATED'),
    (2, 1, 120, 'POST', 'User 1 created another post!', 'POST_CREATED');
