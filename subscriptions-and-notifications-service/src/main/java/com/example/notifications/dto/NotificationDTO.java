package com.example.notifications.dto;

import com.example.notifications.domain.EntityType;
import com.example.notifications.domain.NotificationStatus;
import com.example.notifications.domain.NotificationType;
import lombok.Getter;

import java.time.ZonedDateTime;

@Getter
public class NotificationDTO {

    private Integer id;
    private Integer recipientId;
    private Integer actorId;
    private Integer entityId;
    private EntityType entityType;
    private String message;
    private NotificationType type;
    private NotificationStatus status;
    private ZonedDateTime createdAt;

    public NotificationDTO(Integer id, Integer recipientId, Integer actorId, Integer entityId,
                           EntityType entityType, String message, NotificationType type,
                           NotificationStatus status, ZonedDateTime createdAt) {
        this.id = id;
        this.recipientId = recipientId;
        this.actorId = actorId;
        this.entityId = entityId;
        this.entityType = entityType;
        this.message = message;
        this.type = type;
        this.status = status;
        this.createdAt = createdAt;
    }

}
