import {Component, EventEmitter, Input, Output} from '@angular/core';
import { faTimes } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { NgForOf } from "@angular/common";
import { SubscriptionsListComponent } from "../subscriptions-list/subscriptions-list.component";
import { Subscription } from "../../domain/Subscription";


@Component({
  selector: 'app-subscriptions-modal',
  standalone: true,
  imports: [FontAwesomeModule, NgForOf, SubscriptionsListComponent],
  templateUrl: './subscriptions-modal.component.html',
  styleUrl: './subscriptions-modal.component.css'
})
export class SubscriptionsModalComponent {
  @Input() subscriptions: Subscription[] = [];
  @Output() closeModal = new EventEmitter<void>();

  faTimes = faTimes;

  onClose() {
    this.closeModal.emit();
  }

  stopPropagation(event: Event) {
    event.stopPropagation();
  }
}
