package com.example.notifications.presentation;

import com.example.notifications.application.NotificationService;
import com.example.notifications.dto.NotificationDTO;
import java.util.List;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/notifications")
public class NotificationController {

    private final NotificationService notificationService;

    public NotificationController(NotificationService notificationService) {
        this.notificationService = notificationService;
    }

    @GetMapping("/byuser/{userId}")
    public List<NotificationDTO> getNotificationsByUser(@PathVariable Integer userId) {
        return notificationService.getNotificationsByUser(userId);
    }

}
