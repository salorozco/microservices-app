CREATE TABLE notifications (
                               id SERIAL PRIMARY KEY,
                               recipient_id INTEGER NOT NULL,
                               actor_id INTEGER NOT NULL,
                               entity_id INTEGER NOT NULL,
                               entity_type VARCHAR(50) NOT NULL,
                               message TEXT NOT NULL,
                               type VARCHAR(50) NOT NULL,
                               status VARCHAR(50) NOT NULL DEFAULT 'UNREAD',
                               created_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT now(),
                               updated_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT now()
);