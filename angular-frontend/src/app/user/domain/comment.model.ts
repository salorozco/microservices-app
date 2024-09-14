export class Comment {
  id: number;
  postId: number;
  content: string;
  createdAt: Date;
  updatedAt: Date;

  constructor(data: any) {
    this.id = data.id;
    this.postId = data.postId;
    this.content = data.content;
    this.createdAt = new Date(data.createdAt.date);
    this.updatedAt = new Date(data.updatedAt.date);
  }
}
