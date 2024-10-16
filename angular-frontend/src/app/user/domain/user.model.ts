import { Post } from "./post.model";
import { Conversation } from "./conversation_model";
import { Notification} from "./notification.model";
import { Subscription } from "./Subscription";

export class User {
  id: number;
  name: string;
  email: string;
  createdAt: Date;
  updatedAt: Date;
  posts: Post[]; // Array of posts for the user
  conversations: Conversation[];
  notifications: Notification[];
  subscriptions: Subscription[];

  constructor(data: any) {
    this.id = data.user.id;
    this.name = data.user.name;
    this.email = data.user.email;
    this.createdAt = new Date(data.user.created_at.date);
    this.updatedAt = new Date(data.user.updated_at.date);

    // Map the posts array
    this.posts = data.posts ? data.posts.map((postData: any) => new Post(postData)) : [];
    this.conversations = data.conversations ? data.conversations.map((conversationData: any) => new Conversation(conversationData)) : [];
    this.notifications = data.notifications ? data.notifications.map((notificationData: any) => new Notification(notificationData)) : [];
    this.subscriptions = data.subscriptions ? data.subscriptions.map((subscriptionData: any) => new Subscription(subscriptionData)) : [];
  }
}
