import { Component, Input } from '@angular/core';
import { Notification } from "../../domain/notification.model";
import {NgForOf, NgIf} from "@angular/common";

@Component({
  selector: 'app-notifications-list',
  standalone: true,
  imports: [
    NgIf,
    NgForOf
  ],
  templateUrl: './notifications-list.component.html',
  styleUrl: './notifications-list.component.css'
})
export class NotificationsListComponent {
    @Input() public notifications: Notification[] = [];
}
