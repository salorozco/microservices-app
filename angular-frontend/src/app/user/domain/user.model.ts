import { Post } from "./post.model";

export class User {
  id: number;
  name: string;
  email: string;
  createdAt: Date;
  updatedAt: Date;
  posts: Post[]; // Array of posts for the user

  constructor(data: any) {
    this.id = data.user.id;
    this.name = data.user.name;
    this.email = data.user.email;
    this.createdAt = new Date(data.user.created_at.date);
    this.updatedAt = new Date(data.user.updated_at.date);

    // Map the posts array
    this.posts = data.posts ? data.posts.map((postData: any) => new Post(postData)) : [];
  }
}
