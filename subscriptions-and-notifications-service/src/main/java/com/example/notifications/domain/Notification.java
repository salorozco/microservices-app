package com.example.notifications.domain;

import lombok.Getter;
import java.time.ZonedDateTime;
import jakarta.persistence.*;

@Getter
@Entity
@Table(name = "notifications")
public class Notification {

    @Id
    private Integer id;

    @Column(name = "recipient_id", nullable = false)
    private Integer recipientId;

    @Column(name = "actor_id", nullable = false)
    private Integer actorId;

    @Column(name = "entity_id", nullable = false)
    private Integer entityId;

    @Enumerated(EnumType.STRING)
    @Column(name = "entity_type", nullable = false)
    private EntityType entityType;

    @Column(nullable = false)
    private String message;

    @Enumerated(EnumType.STRING)
    @Column(nullable = false)
    private NotificationType type;

    @Enumerated(EnumType.STRING)
    @Column(nullable = false)
    private NotificationStatus status = NotificationStatus.UNREAD;

    @Column(name = "created_at", nullable = false)
    private ZonedDateTime createdAt = ZonedDateTime.now();

    @Column(name = "updated_at", nullable = false)
    private ZonedDateTime updatedAt = ZonedDateTime.now();

    protected Notification() {
    }

}
