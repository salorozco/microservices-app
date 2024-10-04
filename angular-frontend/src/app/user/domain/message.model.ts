export class Message {
  id: number;
  content: string;
  conversation_id: number;
  sender_id: number;
  sentAt: Date;

  constructor(data: any) {
    this.id = data.id;
    this.content = data.content;
    this.conversation_id = data.conversationId;
    this.sender_id = data.senderId;
    this.sentAt = new Date(data.sentAt.date);
  }
}
