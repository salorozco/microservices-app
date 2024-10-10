package com.example.notifications.domain;

import lombok.Getter;

import java.time.ZonedDateTime;
import jakarta.persistence.*;

@Getter
@Entity
@Table(name = "subscriptions")
public class Subscription {
    @Id
    private Integer id;

    @Column(name = "user_id", nullable = false)
    private Integer userId;

    @Column(name = "target_id", nullable = false)
    private Integer targetId;

    @Enumerated(EnumType.STRING)
    @Column(name = "target_type", nullable = false)
    private TargetType targetType;

    @Column(name = "created_at", nullable = false)
    private ZonedDateTime createdAt = ZonedDateTime.now();

    @Column(name = "updated_at", nullable = false)
    private ZonedDateTime updatedAt = ZonedDateTime.now();

    protected Subscription() {
    }

}
