import {Component, EventEmitter, Input, Output} from '@angular/core';
import { faTimes } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import {NgForOf} from "@angular/common";
import {ConversationsListComponent} from "../conversations-list/conversations-list.component";
import {Conversation} from "../../domain/conversation_model";

@Component({
  selector: 'app-conversations-modal',
  standalone: true,
  imports: [FontAwesomeModule, NgForOf, ConversationsListComponent],
  templateUrl: './conversations-modal.component.html',
  styleUrl: './conversations-modal.component.css'
})
export class ConversationsModalComponent {
  @Input() conversations: Conversation[] = [];
  @Output() closeModal = new EventEmitter<void>();

  faTimes = faTimes;

  onClose() {
    this.closeModal.emit();
  }

  // Prevent click inside modal from closing it
  stopPropagation(event: Event) {
    event.stopPropagation();
  }
}
