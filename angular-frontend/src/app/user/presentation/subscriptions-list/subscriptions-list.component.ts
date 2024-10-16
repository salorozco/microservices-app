import {Component, Input} from '@angular/core';
import { Subscription} from "../../domain/Subscription";
import {NgForOf, NgIf} from "@angular/common";

@Component({
  selector: 'app-subscriptions-list',
  standalone: true,
  imports: [
    NgIf,
    NgForOf
  ],
  templateUrl: './subscriptions-list.component.html',
  styleUrl: './subscriptions-list.component.css'
})
export class SubscriptionsListComponent {
  @Input() subscriptions: Subscription[] = [];
}
