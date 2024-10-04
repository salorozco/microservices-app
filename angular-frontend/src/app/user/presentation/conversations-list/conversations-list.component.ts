import {Component, Input} from '@angular/core';
import {Conversation} from "../../domain/conversation_model";
import {DatePipe, NgForOf, NgIf} from "@angular/common";

@Component({
  selector: 'app-conversations-list',
  standalone: true,
  imports: [
    NgIf,
    NgForOf
  ],
  templateUrl: './conversations-list.component.html',
  styleUrl: './conversations-list.component.css'
})
export class ConversationsListComponent {
  @Input() conversations: Conversation[] = [];
}
