package com.example.notifications.application.mapper;

import com.example.notifications.domain.Notification;
import com.example.notifications.dto.NotificationDTO;
import org.springframework.stereotype.Component;

@Component
public class NotificationMapper {

    public NotificationDTO toDTO(Notification notification) {
        NotificationDTO dto = new NotificationDTO(
                notification.getId(), // id is set via constructor
                notification.getRecipientId(),
                notification.getActorId(),
                notification.getEntityId(),
                notification.getEntityType(),
                notification.getMessage(),
                notification.getType(),
                notification.getStatus(),
                notification.getCreatedAt()
        );
        // Since all fields are set via constructor, no need for setters here.
        return dto;
    }

}