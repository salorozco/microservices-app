package com.example.notifications.application;

import com.example.notifications.domain.Subscription;
import com.example.notifications.infrastructure.SubscriptionRepository;
import java.util.List;
import org.springframework.stereotype.Service;

@Service
public class SubscriptionService {

    private final SubscriptionRepository subscriptionRepository;

    public SubscriptionService(SubscriptionRepository subscriptionRepository) {
        this.subscriptionRepository = subscriptionRepository;
    }

    public List<Subscription> getSubscribersByUser(Integer userId) {
        return subscriptionRepository.findByTargetId(userId);
    }

}
