package com.example.notifications.application;

import com.example.notifications.domain.Notification;
import com.example.notifications.dto.NotificationDTO;
import com.example.notifications.infrastructure.NotificationRepository;
import com.example.notifications.application.mapper.NotificationMapper;
import java.util.List;
import java.util.stream.Collectors;
import org.springframework.stereotype.Service;

@Service
public class NotificationService {

    private final NotificationRepository notificationRepository;
    private final NotificationMapper notificationMapper;

    public NotificationService(NotificationRepository notificationRepository,
                               NotificationMapper notificationMapper) {
        this.notificationRepository = notificationRepository;
        this.notificationMapper = notificationMapper;
    }

    public List<NotificationDTO> getNotificationsByUser(Integer userId) {
        List<Notification> notifications = notificationRepository.findByRecipientId(userId);
        return notifications.stream()
                .map(notificationMapper::toDTO)
                .collect(Collectors.toList());
    }

}