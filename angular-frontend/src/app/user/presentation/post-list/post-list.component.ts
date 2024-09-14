import {Component, Input} from '@angular/core';
import {Post} from "../../domain/post.model";
import {NgForOf, NgIf} from "@angular/common";
import {PostDetailsComponent} from "../post-details/post-details.component";

@Component({
  selector: 'app-post-list',
  standalone: true,
  imports: [
    NgIf,
    NgForOf,
    PostDetailsComponent
  ],
  templateUrl: './post-list.component.html',
  styleUrl: './post-list.component.css'
})
export class PostListComponent {
  @Input() posts: Post[] = [];
}
