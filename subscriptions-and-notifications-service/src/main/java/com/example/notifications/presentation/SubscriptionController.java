package com.example.notifications.presentation;

import com.example.notifications.application.SubscriptionService;
import com.example.notifications.domain.Subscription;
import java.util.List;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/subscriptions")
public class SubscriptionController {

    private final SubscriptionService subscriptionService;

    public SubscriptionController(SubscriptionService subscriptionService) {
        this.subscriptionService = subscriptionService;
    }

    @GetMapping("/byuser/{userId}")
    public List<Subscription> getSubscribersByUser(@PathVariable Integer userId) {
        return subscriptionService.getSubscribersByUser(userId);
    }

    // Additional endpoints can be added here
}
