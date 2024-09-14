import {Component, Input} from '@angular/core';
import { Comment } from "../../domain/comment.model";
import {CommonModule} from "@angular/common";
@Component({
  selector: 'app-comment-detail',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './comment-detail.component.html',
  styleUrl: './comment-detail.component.css'
})
export class CommentDetailComponent {
  @Input() comment: Comment | undefined;
}
