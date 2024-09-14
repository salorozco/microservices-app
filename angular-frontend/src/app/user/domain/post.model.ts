import { Comment } from './comment.model';
export class Post {
  id: number;
  userId: number;
  content: string;
  createdAt: Date;
  updatedAt: Date;
  comments: Comment[];

  constructor(data: any) {
    this.id = data.id;
    this.userId = data.user_id;
    this.content = data.content;
    this.createdAt = new Date(data.created_at.date);
    this.updatedAt = new Date(data.updated_at.date);

    // Map comments array
    this.comments = data.comments ? data.comments.map((commentData: any) => new Comment(commentData)) : [];
  }
}
