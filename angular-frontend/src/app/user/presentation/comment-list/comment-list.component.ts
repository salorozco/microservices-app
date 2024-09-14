import {Component, Input} from '@angular/core';
import { Comment } from "../../domain/comment.model";
import {CommentDetailComponent} from "../comment-detail/comment-detail.component";
import {CommonModule} from "@angular/common";

@Component({
  selector: 'app-comment-list',
  standalone: true,
  imports: [CommonModule, CommentDetailComponent],
  templateUrl: './comment-list.component.html',
  styleUrl: './comment-list.component.css'
})
export class CommentListComponent {
  @Input() comments: Comment[] = [];
}
