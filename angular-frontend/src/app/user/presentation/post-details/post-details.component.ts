import {Component, Input, SimpleChanges} from '@angular/core';
import {Post} from "../../domain/post.model";
import {CommentListComponent} from "../comment-list/comment-list.component";
import {CommonModule} from "@angular/common";

@Component({
  selector: 'app-post-details',
  standalone: true,
  imports: [CommonModule, CommentListComponent],
  templateUrl: './post-details.component.html',
  styleUrl: './post-details.component.css'
})
export class PostDetailsComponent {
  @Input() post: Post | undefined;
}
