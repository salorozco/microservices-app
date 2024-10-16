import {Component, EventEmitter, Input, Output} from '@angular/core';
import { faTimes } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { NgForOf } from "@angular/common";
import { NotificationsListComponent } from "../notifications-list/notifications-list.component";
import { Notification } from "../../domain/notification.model";

@Component({
  selector: 'app-notifications-modal',
  standalone: true,
  imports: [FontAwesomeModule, NgForOf, NotificationsListComponent ],
  templateUrl: './notifications-modal.component.html',
  styleUrl: './notifications-modal.component.css'
})
export class NotificationsModalComponent {
  @Input() notifications: Notification[] = [];
  @Output() closeModal = new EventEmitter<void>();

  faTimes = faTimes;

  onClose() {
    this.closeModal.emit();
  }

  stopPropagation(event: Event) {
    event.stopPropagation();
  }

}
